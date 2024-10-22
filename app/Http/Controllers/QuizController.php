<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Interest;
use App\Models\QuizPoints;

class QuizController extends Controller
{
    public function generateQuiz()
    {
        $user = Auth::user();
        // Step 1: Get user interests
        $userInterests = Interest::where('user_id', $user->id)->pluck('interest_name')->toArray();

        // dump($userInterests); 


        foreach ($userInterests as $interest) {
            echo "Interest: " . $interest . "<br>";
        }   
        // Define questions for each interest category
        $questionBank = [
            'programming' => [
                [   
                    'question' => 'What is the primary purpose of a constructor in Object-Oriented Programming?',
                    'options' => [
                        'To destroy objects',
                        'To initialize object properties',
                        'To define class methods',
                        'To create inheritance'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which data structure uses LIFO (Last In, First Out)?',
                    'options' => [
                        'Queue',
                        'Stack',
                        'Array',
                        'Tree'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is not a programming language?',
                    'options' => [
                        'Python',
                        'Java',
                        'HTML',
                        'C++'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What does the acronym API stand for?',
                    'options' => [
                        'Application Programming Interface',
                        'Advanced Programming Interface',
                        'Application Protocol Interface',
                        'Automated Programming Interface'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a valid C++ data type?',
                    'options' => [
                        'integer',
                        'boolean',
                        'int',
                        'decimal'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'In Java, which keyword is used to define a constant?',
                    'options' => [
                        'final',
                        'const',
                        'static',
                        'immutable'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is NOT a loop structure in C?',
                    'options' => [
                        'while',
                        'for',
                        'do-while',
                        'reapet-until'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'Which of these languages is considered a functional programming language?',
                    'options' => [
                        'python',
                        'lisp',
                        'java',
                        'c++'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which operator is used for pointer dereferencing in C?',
                    'options' => [
                        '&',
                        '*',
                        '->',
                        '**'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'WWhich keyword is used to inherit a class in Java?',
                    'options' => [
                        'inherit',
                        'extends',
                        'implements',
                        'inherits'
                    ],
                    'correct_answer' => 1
                ],
            ],
            '3D-Animation' => [
                [
                    'question' => 'What is keyframing in animation?',
                    'options' => [
                        'A technique for creating motion between two points',
                        'A file format for 3D models',
                        'A rendering method',
                        'A texturing technique'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which principle of animation refers to the squash and stretch of objects?',
                    'options' => [
                        'Timing',
                        'Staging',
                        'Deformation',
                        'Squash and Stretch'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'What is the purpose of rigging in 3D animation?',
                    'options' => [
                        'To apply textures',
                        'To create a control system for animating characters',
                        'To render final images',
                        'To import 3D models'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which software is commonly used for 3D animation?',
                    'options' => [
                        'Adobe Photoshop',
                        'Blender',
                        'Microsoft Word',
                        'Sublime Text'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'Artifical_Intelligence' => [
                [
                    'question' => 'What is the primary goal of supervised learning?',
                    'options' => [
                        'To find patterns in unlabeled data',
                        'To learn from labeled data to make predictions',
                        'To optimize reward functions',
                        'To cluster similar data points'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which algorithm is commonly used for image classification?',
                    'options' => [
                        'Linear Regression',
                        'K-means Clustering',
                        'Convolutional Neural Networks',
                        'Decision Trees'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is a neural network?',
                    'options' => [
                        'A physical network of computers',
                        'A system modeled after the human brain',
                        'A database for storing information',
                        'A programming language'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is a type of unsupervised learning?',
                    'options' => [
                        'Linear Regression',
                        'K-means Clustering',
                        'Decision Trees',
                        'Support Vector Machines'
                    ],
                    'correct_answer' => 1
                ],
            ],
            '3D-Modeling' => [
                [
                    'question' => 'What is a polygon in 3D modeling?',
                    'options' => [
                        'A single point in 3D space',
                        'A flat shape with straight sides',
                        'A texture applied to models',
                        'A type of light source'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is a common file format for 3D models?',
                    'options' => [
                        '.jpg',
                        '.mp4',
                        '.obj',
                        '.pdf'
                    ],
                    'correct_answer' => 2
                ],
            ],
            'GameDevelopment' => [
                [
                    'question' => 'What is the primary purpose of a game engine?',
                    'options' => [
                        'To create graphics',
                        'To handle game physics and logic',
                        'To write scripts for games',
                        'To compile code'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which programming language is widely used in game development?',
                    'options' => [
                        'HTML',
                        'JavaScript',
                        'C#',
                        'SQL'
                    ],
                    'correct_answer' => 2
                ],
            ],
            'Ui/Ux' => [
                [
                    'question' => 'What does UI stand for in design?',
                    'options' => [
                        'User Interface',
                        'Universal Interface',
                        'Unique Interface',
                        'User Interaction'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the main focus of UX design?',
                    'options' => [
                        'Visual aesthetics',
                        'User experience and satisfaction',
                        'Technical performance',
                        'Content creation'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'Data_Analytics' => [
                [
                    'question' => 'What is the primary goal of data analytics?',
                    'options' => [
                        'To store data',
                        'To visualize data',
                        'To extract insights and support decision-making',
                        'To perform data entry'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'Which of the following tools is commonly used for data analysis?',
                    'options' => [
                        'Microsoft Word',
                        'Excel',
                        'PowerPoint',
                        'Notepad'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'DataScience' => [
                [
                    'question' => 'What is the main programming language used in data science?',
                    'options' => [
                        'Java',
                        'C++',
                        'Python',
                        'Ruby'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'Which of the following is a common data visualization library in Python?',
                    'options' => [
                        'NumPy',
                        'Matplotlib',
                        'TensorFlow',
                        'Scikit-learn'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'Networking' => [
                [
                    'question' => 'What does TCP stand for?',
                    'options' => [
                        'Transfer Control Protocol',
                        'Transmission Control Protocol',
                        'Total Control Protocol',
                        'Technical Control Protocol'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which layer of the OSI model is responsible for end-to-end communication?',
                    'options' => [
                        'Physical',
                        'Data Link',
                        'Network',
                        'Transport'
                    ],
                    'correct_answer' => 3
                ],
            ],
            'database' => [
                [
                    'question' => 'What does SQL stand for?',
                    'options' => [
                        'Structured Query Language',
                        'Simple Query Language',
                        'Standard Query Language',
                        'Secure Query Language'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which type of database is designed to store unstructured data?',
                    'options' => [
                        'Relational Database',
                        'NoSQL Database',
                        'Hierarchical Database',
                        'Network Database'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'Web_Design' => [
                [
                    'question' => 'What does HTML stand for?',
                    'options' => [
                        'Hyper Text Markup Language',
                        'High Text Markup Language',
                        'Hyperlink Text Markup Language',
                        'Hyper Text Markup Logic'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which CSS property controls the text size?',
                    'options' => [
                        'font-weight',
                        'text-size',
                        'font-size',
                        'text-style'
                    ],
                    'correct_answer' => 2
                ],
            ],
            'Multimedia' => [
                [
                    'question' => 'What is the primary purpose of multimedia in presentations?',
                    'options' => [
                        'To simplify data',
                        'To enhance engagement and understanding',
                        'To reduce text',
                        'To focus on audio'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which format is commonly used for audio files?',
                    'options' => [
                        '.mp4',
                        '.wav',
                        '.doc',
                        '.jpg'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'Graphic_Design' => [
                [
                    'question' => 'Which software is widely used for graphic design?',
                    'options' => [
                        'Microsoft Word',
                        'Adobe Photoshop',
                        'Notepad',
                        'Excel'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does RGB stand for in color theory?',
                    'options' => [
                        'Red Green Blue',
                        'Red Green Bright',
                        'Red Grey Blue',
                        'Rich Green Blue'
                    ],
                    'correct_answer' => 0
                ],
            ],
           'Software_Development' => [
                [
                    'question' => 'What is Agile software development?',
                    'options' => [
                        'A methodology focused on iterative development',
                        'A programming language',
                        'A software development tool',
                        'A type of project management'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is NOT a software development lifecycle model?',
                    'options' => [
                        'Waterfall',
                        'Spiral',
                        'V-Model',
                        'Database Model'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'What does CI/CD stand for in software development?',
                    'options' => [
                        'Continuous Integration/Continuous Deployment',
                        'Critical Integration/Critical Deployment',
                        'Constant Improvement/Constant Development',
                        'Collaborative Integration/Collaborative Deployment'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'Cloud_Computing' => [
                [
                    'question' => 'What is cloud computing?',
                    'options' => [
                        'Storing and accessing data over the internet',
                        'Storing data on a local server',
                        'Using cloud-based applications for desktop',
                        'None of the above'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a type of cloud service model?',
                    'options' => [
                        'IaaS',
                        'PaaS',
                        'SaaS',
                        'All of the above'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'What is an advantage of using cloud storage?',
                    'options' => [
                        'Data is accessible from anywhere',
                        'It is more expensive than local storage',
                        'Requires physical hardware',
                        'None of the above'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'web_development' => [
                [
                    'question' => 'Which of the following languages is primarily used for styling web pages?',
                    'options' => [
                        'HTML',
                        'CSS',
                        'JavaScript',
                        'PHP'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the acronym "HTTP" stand for?',
                    'options' => [
                        'HyperText Transfer Protocol',
                        'HyperText Transmission Protocol',
                        'High Transfer Text Protocol',
                        'HyperTransfer Text Protocol'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which framework is commonly used for front-end development?',
                    'options' => [
                        'Django',
                        'Laravel',
                        'React',
                        'Node.js'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'Which HTTP method is used to submit form data to a server?',
                    'options' => [
                        'GET',
                        'POST',
                        'PUT',
                        'DELETE'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the default port for HTTP?',
                    'options' => [
                        '21',
                        '80',
                        '8080',
                        '443'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which HTML element is used to define the header of a webpage?',
                    'options' => [
                        '<header>',
                        '<head>',
                        '<h1>',
                        '<nav>'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'In JavaScript, which keyword is used to declare a variable that can be reassigned?',
                    'options' => [
                        'var',
                        'let',
                        'const',
                        'final'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which CSS property is used to change the background color of an element?',
                    'options' => [
                        'background-color',
                        'color',
                        'bg-color',
                        'fill'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a JavaScript framework?',
                    'options' => [
                        'Laravel',
                        'Angular',
                        'Rails',
                        'Django'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the <div> tag in HTML represent?',
                    'options' => [
                        'A block-level container',
                        'An inline container',
                        'A hyperlink',
                        'A form field'
                    ],
                    'correct_answer' => 0
                ],
            ],
            // Add more categories and questions as needed
        ];
        
        
        $quizQuestions = [];
        
        // Select questions for each user interest
        foreach ($userInterests as $interest) {
            if (isset($questionBank[strtolower($interest)])) {
                $interestQuestions = $questionBank[strtolower($interest)];
                // Evenly distribute questions based on interests
                $questionsToSelect = min(
                    ceil(10 / count($userInterests)), 
                    count($interestQuestions)
                );
                $selectedQuestions = collect($interestQuestions)
                    ->random($questionsToSelect)
                    ->toArray();
                foreach ($selectedQuestions as $question) {
                    $question['category'] = $interest;
                    $quizQuestions[] = $question;
                }
            }
        }
        // Shuffle the questions
        shuffle($quizQuestions);

        // If we have more than 10 questions, take only 10
        $quizQuestions = collect($quizQuestions)->random(min(10, count($quizQuestions)))->toArray();
        
        // Store the questions and correct answers in the session
        session(['quiz_questions' => $quizQuestions]);
        
        return view('quiz.quiz', [
            'questions' => $quizQuestions,
            'total_questions' => count($quizQuestions)
        ]);
    }

    public function submitQuizAnswer(Request $request)
    {
        // Validate the incoming answers array
        $request->validate([
            'answers' => 'required|array'
        ]);

        $answers = $request->input('answers');
        $quizQuestions = session('quiz_questions');
        
        if (!$quizQuestions) {
            return response()->json(['error' => 'No quiz in progress'], 400);
        }

        $results = [];
        foreach ($answers as $index => $answer) {
            if (isset($quizQuestions[$index])) {
                $results[$index] = [
                    'user_answer' => (int)$answer,
                    'correct' => (int)$answer === $quizQuestions[$index]['correct_answer']
                ];
            }
        }

        // Store results in session
        session(['quiz_answers' => $results]);
        
        return response()->json(['success' => true]);
    }

    public function getQuizResults()
    {
        $answers = session('quiz_answers');
        $questions = session('quiz_questions');
        
        if (empty($questions) || empty($answers)) {
            return redirect()->route('quiz')->with('error', 'No quiz results found');
        }
        
        $totalQuestions = count($questions);
        $correctAnswers = count(array_filter($answers, fn($answer) => $answer['correct']));
        $score = round(($correctAnswers / $totalQuestions) * 100, 1);
        
        // Calculate points (5 points per correct answer)
        $points = $correctAnswers * 5;
        

        // Store the quiz points in the database
            QuizPoints::create([
                'user_id' => Auth::id(),
                'points' => $points
            ]);

        // Call the UserController to update points
        // $userController = new UserController();
        // $totalPoints = $userController->calculatePoints();
        
        // Clear quiz session data after generating results
        session()->forget(['quiz_questions', 'quiz_answers']);
        
        return view('quiz.results', compact('score', 'correctAnswers', 'totalQuestions', 'questions', 'answers', 'points'));
    }
}
