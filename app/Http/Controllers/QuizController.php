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
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'In a team project, I naturally go toward:',
            'options' => [
                'Creating reliable systems and processes',
                'Investigating and explaining findings',
                'Experimenting with cutting-edge solutions',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When learning something new, I prefer to:',
            'options' => [
                'Understand how everything connects and works together',
                'Dive deep into the underlying principles',
                'Push boundaries and try new approaches',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I feel most energized when:',
            'options' => [
                'Making things more efficient and reliable',
                'Discovering insights from complex information',
                'Creating innovative solutions to problems',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When faced with a challenge, I typically:',
            'options' => [
                'Break it down into manageable, structured parts',
                'Look for patterns and underlying causes',
                'Think outside the box for novel solutions',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I find it most satisfying to:',
            'options' => [
                'Build something reliable that others can depend on',
                'Uncover meaningful insights from data',
                'Create something entirely new and innovative',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'In group discussions, I often:',
            'options' => [
                'Focus on practical implementation details',
                'Ask probing questions to understand deeper patterns',
                'Suggest innovative and unconventional approaches',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I feel most excited about: ',
            'options' => [
                'Designing scalable data pipelines',
                'Extracting meaningful insights from data',
                'Developing intelligent systems that learn over time',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When approaching a project, my priority is to: ',
            'options' => [
                'Ensure the foundation and infrastructure are solid',
                'Ask questions to uncover underlying patterns',
                'Focus on automation and self-improving systems',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'In terms of tools, I feel most confident working with: ',
            'options' => [
                'Big data platforms like Hadoop or Spark',
                'Data analysis tools like Python or R',
                'AI frameworks like TensorFlow or PyTorch',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When presented with a dataset, I am most likely to: ',
            'options' => [
                'Prepare and organize the data for efficient processing',
                'Analyze and visualize trends and patterns',
                'Develop models that can predict outcomes or classify data',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'Which type of task do you find most appealing?',
            'options' => [
                'Optimizing data storage and retrieval',
                'Designing experiments and interpreting results',
                'Building and training machine learning models',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I prefer projects where I can: ',
            'options' => [
                'Design robust and scalable infrastructure',
                'Find patterns and stories hidden within data',
                'Create intelligent systems with minimal human intervention',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'My preferred work environment is: ',
            'options' => [
                'Focused on building and maintaining large systems',
                'Collaborative and driven by curiosity',
                'Fast-paced and innovation-focused',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When working on a technical problem, I enjoy: ',
            'options' => [
                'Designing efficient workflows and pipelines',
                'Digging into the data to uncover insights',
                'Building systems that can learn and improve automatically',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I feel a sense of achievement when I: ',
            'options' => [
                'Successfully optimize system performance',
                'Discover patterns that drive decisions',
                'Create a model that solves complex problems',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When tackling a large project, my focus is on: ',
            'options' => [
                'Ensuring the foundation is scalable and efficient',
                'Deriving meaningful insights at each step',
                'Incorporating intelligent systems for automation',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'The type of problem I enjoy solving the most is: ',
            'options' => [
                'Making systems faster and more efficient',
                'Turning raw data into actionable insights',
                'Developing models that predict or classify data',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'My ideal career path involves: ',
            'options' => [
                'Building and managing large-scale data systems',
                'Understanding and interpreting data to guide decisions',
                'Innovating with artificial intelligence technologies',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I would prefer to specialize in: ',
            'options' => [
                'Data architecture and infrastructure',
                'Statistical analysis and visualization',
                'Artificial intelligence and machine learning',
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When solving complex problems, I prefer to:',
            'options' => [
                'Build systematic, structured solutions',
                'Analyze patterns and find hidden connections',
                'Explore innovative and creative approaches'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'In a team project, I naturally go toward:',
            'options' => [
                'Creating reliable systems and processes',
                'Investigating and explaining findings',
                'Experimenting with cutting-edge solutions'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        // ... (Other existing questions omitted for brevity)
    
        // Additional questions
        [
            'question' => 'When collaborating on a project, I enjoy:',
            'options' => [
                'Organizing data into manageable components',
                'Discovering unique patterns and insights in the data',
                'Experimenting with advanced technologies to create solutions'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When approaching a large dataset, I prefer to:',
            'options' => [
                'Clean and structure it for seamless use',
                'Explore relationships and trends hidden within',
                'Develop algorithms to process and learn from the data'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'My idea of success in a technical role involves:',
            'options' => [
                'Creating systems that are robust and scalable',
                'Making impactful discoveries using data analysis',
                'Developing cutting-edge AI tools and applications'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When working on a technical problem, I focus on:',
            'options' => [
                'Building solutions that are efficient and reusable',
                'Understanding the underlying data trends',
                'Designing innovative machine learning models'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I am most motivated by:',
            'options' => [
                'Streamlining processes and improving efficiency',
                'Gaining knowledge from analyzing datasets',
                'Pioneering new technologies and concepts in AI'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'When thinking about the future, I see myself:',
            'options' => [
                'Building infrastructure for scalable systems',
                'Solving complex problems with data-driven insights',
                'Innovating AI solutions to transform industries'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'I enjoy tasks that involve:',
            'options' => [
                'Designing data pipelines and optimizing workflows',
                'Performing detailed statistical analysis',
                'Programming intelligent systems for decision-making'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        [
            'question' => 'In my ideal role, I would focus on:',
            'options' => [
                'Developing efficient systems and tools',
                'Extracting meaningful insights from raw data',
                'Creating AI-driven solutions for complex challenges'
            ],
            'category' => ['data_engineering' => [3, 1, 1], 'data_science' => [1, 3, 1], 'ai_engineering' => [1, 1, 3]]
        ],
        
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