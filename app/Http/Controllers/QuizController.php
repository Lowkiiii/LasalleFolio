<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizPoints;
use App\Models\CareerAssessment;
use Carbon\Carbon;

class QuizController extends Controller
{
    private $questionBank = [

        [
            'question' => 'When solving complex problems, I prefer to:',
            'options' => [
                'Build systematic, structured solutions',
                'Analyze patterns and find hidden connections',
                'Explore innovative and creative approaches',
                'Follow established procedures'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ],
        [
            'question' => 'In a team project, I naturally go toward:',
            'options' => [
                'Creating reliable systems and processes',
                'Investigating and explaining findings',
                'Experimenting with cutting-edge solutions',
                'Supporting existing team workflows'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ],
        [
            'question' => 'When learning something new, I prefer to:',
            'options' => [
                'Understand how everything connects and works together',
                'Dive deep into the underlying principles',
                'Push boundaries and try new approaches',
                'Follow tutorials step by step'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ],
        [
            'question' => 'I feel most energized when:',
            'options' => [
                'Making things more efficient and reliable',
                'Discovering insights from complex information',
                'Creating innovative solutions to problems',
                'Following established routines'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ],
        [
            'question' => 'When faced with a challenge, I typically:',
            'options' => [
                'Break it down into manageable, structured parts',
                'Look for patterns and underlying causes',
                'Think outside the box for novel solutions',
                'Seek guidance from others'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ],
        [
            'question' => 'I find it most satisfying to:',
            'options' => [
                'Build something reliable that others can depend on',
                'Uncover meaningful insights from data',
                'Create something entirely new and innovative',
                'Help maintain existing systems'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ],
        [
            'question' => 'In group discussions, I often:',
            'options' => [
                'Focus on practical implementation details',
                'Ask probing questions to understand deeper patterns',
                'Suggest innovative and unconventional approaches',
                'Help keep things on track'
            ],
            'category' => ['data_engineering' => [3, 1, 1, 0], 'data_science' => [1, 3, 1, 0], 'ai_engineering' => [1, 1, 3, 0]]
        ]
        
    ];

    public function generateQuiz()
    {
        $user = Auth::user();
        
        // Get all questions (no longer based on interests)
        $quizQuestions = $this->questionBank;
        
        // Store the questions in session
        session(['quiz_questions' => $quizQuestions]);
        
        return view('quiz.quiz', [
            'questions' => $quizQuestions,
            'total_questions' => count($quizQuestions),
            'user' => $user
        ]);
    }

    public function submitQuizAnswer(Request $request)
    {
        $request->validate([
            'answers' => 'required|array'
        ]);

        $answers = $request->input('answers');
        $quizQuestions = session('quiz_questions');
        
        if (!$quizQuestions) {
            return response()->json(['error' => 'No quiz in progress'], 400);
        }

        // Calculate career scores
        $careerScores = [
            'data_engineering' => 0,
            'data_science' => 0,
            'ai_engineering' => 0
        ];

        foreach ($answers as $index => $answer) {
            if (isset($quizQuestions[$index])) {
                foreach ($careerScores as $career => &$score) {
                    $score += $quizQuestions[$index]['category'][$career][(int)$answer];
                }
            }
        }

        // Calculate percentages
        $total = array_sum($careerScores);
        $careerPercentages = array_map(function($score) use ($total) {
            return round(($score / $total) * 100, 1);
        }, $careerScores);

        // Store results in session
        session(['quiz_career_scores' => $careerPercentages]);
        
        return response()->json(['success' => true]);
    }

    private function getUserTodayPoints()
    {
        $today = Carbon::today();
        return QuizPoints::where('user_id', Auth::id())
            ->whereDate('created_at', $today)
            ->sum('points');
    }

    private function getRemainingPointsLimit()
    {
        $todayPoints = $this->getUserTodayPoints();
        $maxDailyPoints = 50;
        return max(0, $maxDailyPoints - $todayPoints);
    }

    public function getQuizResults()
    {
        $user = Auth::user();
        $careerPercentages = session('quiz_career_scores');
        
        if (empty($careerPercentages)) {
            return redirect()->route('quiz')->with('error', 'No quiz results found');
        }
        
        // Award 50 points for completing the quiz (if within daily limit)
        $remainingLimit = $this->getRemainingPointsLimit();
        $pointsToAward = min(50, $remainingLimit);

        if ($pointsToAward > 0) {
            QuizPoints::create([
                'user_id' => Auth::id(),
                'points' => $pointsToAward
            ]);
        }

        // Get total points earned today
        $todayTotalPoints = $this->getUserTodayPoints();

        // Store career assessment results
        CareerAssessment::create([
            'user_id' => Auth::id(),
            'data_engineering_score' => $careerPercentages['data_engineering'],
            'data_science_score' => $careerPercentages['data_science'],
            'ai_engineering_score' => $careerPercentages['ai_engineering']
        ]);

        // Clear quiz session data
        session()->forget(['quiz_questions', 'quiz_career_scores']);
        
        return view('quiz.results', [
            'user' => $user,
            'careerPercentages' => $careerPercentages,
            'pointsAwarded' => $pointsToAward,
            'todayTotalPoints' => $todayTotalPoints,
            'remainingLimit' => $remainingLimit
        ]);
    }
}