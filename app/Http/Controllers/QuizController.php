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
            'question' => 'Which type of work most appeals to you?',
            'options' => [
                'Write programming code for user interface, AI, sound, and physics',
                'Support in developing effective tools to maximize production flow',
                'Detail the game\'s high-level design goals and features',
                'Design graphic user interface elements',
                'Lead the design and implementation of testing frameworks'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'What kind of problem-solving approach interests you most?',
            'options' => [
                'Debug identified issues for the program to run smoothly',
                'Support the creation of custom tools to improve team efficiency',
                'Develop use cases to resolve design roadblocks',
                'Develop, test, and troubleshoot solutions to solve UI design issues',
                'Review user-reported issues and recommend solutions to complex problems'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'How would you prefer to collaborate with others?',
            'options' => [
                'Collaborate with artists and designers to utilize existing tools',
                'Provide regular support to Art and Technical teams',
                'Guide technical development teams in interpreting game design',
                'Work with creative leadership to incorporate visual identity',
                'Lead project teams and coordinate with other departments'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'What type of documentation work interests you?',
            'options' => [
                'Create low-level design documents for coding requirements',
                'Support the development of training materials and best practices',
                'Manage the creation of full game design documents',
                'Develop a UI style guide incorporating industry best practices',
                'Establish policy for documentation of procedures'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'Which optimization task appeals to you most?',
            'options' => [
                'Optimize gameplay coding for better performance',
                'Help clear production bottlenecks',
                'Recommend adjustments to reflect technical constraints',
                'Analyze user feedback to propose UX improvements',
                'Drive continuous improvement in quality assurance processes'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'What kind of creative work excites you?',
            'options' => [
                'Write programming code for gameplay and technical aspects',
                'Develop prototypes for production pipelines',
                'Conceive user experience through sketches and wireframes',
                'Design intuitive and responsive interface experiences',
                'Develop quality assurance metrics and guidelines'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'How would you prefer to handle user feedback?',
            'options' => [
                'Implement changes based on community manager feedback',
                'Support Art team in improving efficiency',
                'Track game feedback to plan design changes',
                'Analyze user feedback for UX improvements',
                'Collate and research improvements from playtesting feedback'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'Which technical responsibility interests you most?',
            'options' => [
                'Write code to port games to other platforms',
                'Develop custom tools for modeling and animation packages',
                'Provide insights on technical workflow issues',
                'Evaluate technical specifications for UI platforms',
                'Research and recommend automated testing tools'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'What kind of planning work appeals to you?',
            'options' => [
                'Create test cases for software development',
                'Plan production pipeline implementations',
                'Layout high-level aspects of game concepts',
                'Determine business and player requirements for UI',
                'Develop timeline and budget estimates for testing'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ],
        [
            'question' => 'Which type of maintenance work would you prefer?',
            'options' => [
                'Conduct regular debugging of code and performance',
                'Provide ongoing support for production tools',
                'Participate in ongoing critical reviews of games',
                'Translate and update content for user interfaces',
                'Oversee execution of tests for each release cycle'
            ],
            'category' => [
                'junior_programmer' => [10, 0, 0, 0, 0],
                'junior_technical_artist' => [0, 10, 0, 0, 0],
                'junior_game_designer' => [0, 0, 10, 0, 0],
                'ui_ux_designer' => [0, 0, 0, 10, 0],
                'qa_tester' => [0, 0, 0, 0, 10]
            ]
        ]
    ];

    public function generateQuiz()
    {
        $user = Auth::user();
        
        // Get all questions
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
            'junior_programmer' => 0,
            'junior_technical_artist' => 0,
            'junior_game_designer' => 0,
            'ui_ux_designer' => 0,
            'qa_tester' => 0
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
        
        // Award points for completing the quiz (if within daily limit)
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
            'junior_programmer_score' => $careerPercentages['junior_programmer'],
            'junior_technical_artist_score' => $careerPercentages['junior_technical_artist'],
            'junior_game_designer_score' => $careerPercentages['junior_game_designer'],
            'ui_ux_designer_score' => $careerPercentages['ui_ux_designer'],
            'qa_tester_score' => $careerPercentages['qa_tester']
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