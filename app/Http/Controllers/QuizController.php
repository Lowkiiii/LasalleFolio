<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Interest;
use App\Models\QuizPoints;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function generateQuiz()
    {
        $user = Auth::user(); // Retrieve the authenticated user
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
            '3d-animation' => [
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
                [
                    'question' => 'What is the term for the 3D model that is used as a skeleton to control a character?',
                    'options' => [
                        'Mesh',
                        'Bone',
                        'Rig',
                        'UV Map'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is a texture map in 3D animation?',
                    'options' => [
                        'A visual effect used for shading models',
                        'A method to create 3D models',
                        'A surface detail applied to a 3D model',
                        'A lighting technique'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is the difference between a polygon and a NURBS surface?',
                    'options' => [
                        'Polygons are used for organic shapes, NURBS for hard surface modeling',
                        'Polygons are made of vertices, NURBS are made of curves',
                        'Polygons are better for animation, NURBS are static models',
                        'There is no difference'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is motion capture in 3D animation?',
                    'options' => [
                        'A technique for recording sound effects',
                        'A process of recording live movements to animate characters',
                        'A method of rendering 3D models',
                        'A lighting technique'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the term "UV mapping" refer to in 3D animation?',
                    'options' => [
                        'The process of creating texture maps for models',
                        'A technique to animate textures',
                        'The process of modeling organic shapes',
                        'A lighting setup for 3D environments'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is used to simulate realistic movement of fluids in 3D animation?',
                    'options' => [
                        'Fluid Simulation',
                        'Baking',
                        'Cloth Simulation',
                        'Rigging'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'artifical_intelligence' => [
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
                [
                    'question' => 'What does the term "overfitting" refer to in machine learning?',
                    'options' => [
                        'The model performs well on training data but poorly on unseen data',
                        'The model performs equally well on both training and testing data',
                        'The model generalizes too much from training data',
                        'The model has too few features'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is reinforcement learning?',
                    'options' => [
                        'A type of machine learning where an agent learns to make decisions by interacting with an environment',
                        'A learning technique that uses labeled data to train models',
                        'A method of clustering data into groups based on similarity',
                        'A supervised learning algorithm used for regression tasks'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is an example of a generative model?',
                    'options' => [
                        'Support Vector Machine',
                        'K-means Clustering',
                        'Generative Adversarial Network (GAN)',
                        'Decision Tree'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is the purpose of backpropagation in neural networks?',
                    'options' => [
                        'To update the weights in the network by minimizing the error',
                        'To initialize the network with random weights',
                        'To increase the size of the training dataset',
                        'To split data into training and test sets'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does "gradient descent" aim to achieve in machine learning?',
                    'options' => [
                        'To find the minimum value of a cost function',
                        'To split data into training and testing sets',
                        'To improve model accuracy using more data',
                        'To prevent overfitting'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a popular framework for building neural networks?',
                    'options' => [
                        'TensorFlow',
                        'Excel',
                        'MySQL',
                        'Jupyter Notebook'
                    ],
                    'correct_answer' => 0
                ],
            ],
            '3d-modeling' => [
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
                [
                    'question' => 'What is UV mapping in 3D modeling?',
                    'options' => [
                        'The process of applying textures to 3D models',
                        'The technique used to add color to 3D models',
                        'The creation of 3D environments',
                        'The method of rendering 3D models'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which software is commonly used for 3D modeling?',
                    'options' => [
                        'Adobe Photoshop',
                        'Blender',
                        'Microsoft Word',
                        'Sublime Text'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a 3D mesh?',
                    'options' => [
                        'A three-dimensional grid of vertices and faces that define a shape',
                        'A type of light used in 3D environments',
                        'A texture applied to 3D models',
                        'A camera setting in 3D software'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does the term "rigging" refer to in 3D modeling?',
                    'options' => [
                        'The process of creating a skeleton for a 3D model for animation',
                        'The application of materials and textures to a model',
                        'The process of lighting a 3D scene',
                        'The technique of modeling the environment'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the primary purpose of a texture map in 3D modeling?',
                    'options' => [
                        'To add surface detail to a 3D model',
                        'To create lighting effects',
                        'To generate 3D animations',
                        'To control the shape of a 3D model'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the term for the 3D model that defines the surface of an object?',
                    'options' => [
                        'Mesh',
                        'Texture',
                        'UV Map',
                        'Rig'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is used to smooth the surface of a 3D model?',
                    'options' => [
                        'Subdivision surface',
                        'Rigging',
                        'Baking',
                        'Cloth simulation'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the purpose of normal maps in 3D modeling?',
                    'options' => [
                        'To create the illusion of surface detail without adding more polygons',
                        'To apply realistic textures to 3D models',
                        'To control the lighting of a scene',
                        'To simulate depth and shadows in a 3D environment'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'gamedevelopment' => [
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
                [
                    'question' => 'What does the term "game loop" refer to?',
                    'options' => [
                        'The process of rendering graphics',
                        'The main sequence of events in a game that runs continuously during gameplay',
                        'The code used to create menus in a game',
                        'A system used to manage game files'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is a popular game development platform?',
                    'options' => [
                        'Unity',
                        'WordPress',
                        'Excel',
                        'Photoshop'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the role of a "Collider" in game development?',
                    'options' => [
                        'To simulate sound effects',
                        'To detect and manage collisions between objects',
                        'To create player animations',
                        'To generate lighting effects'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does "AI" in game development typically refer to?',
                    'options' => [
                        'The artificial intelligence used to create NPC (non-player character) behaviors',
                        'The code used to improve graphics rendering',
                        'The animation system in the game',
                        'The input system for player controls'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is a "sprite" in game development?',
                    'options' => [
                        'A 3D object in a scene',
                        'A 2D graphic or image used for characters or objects',
                        'A background texture in a game',
                        'A sound effect used in a game'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the function of "pathfinding" in game development?',
                    'options' => [
                        'To allow objects to find their way from one point to another in a game world',
                        'To generate random events or challenges in a game',
                        'To create random levels or maps in a game',
                        'To track player performance'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is "debugging" in game development?',
                    'options' => [
                        'The process of creating game assets',
                        'The process of testing and fixing errors or bugs in the game code',
                        'The process of rendering the final game environment',
                        'The process of publishing the game'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is "multiplayer networking" in game development?',
                    'options' => [
                        'The process of adding extra levels to a game',
                        'The system that allows players to connect and interact with each other in online games',
                        'The process of managing player inventory systems',
                        'The technique used to create visual effects in the game'
                    ],
                    'correct_answer' => 1
                ],
            ],
            'ui/ux' => [
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
                [
                    'question' => 'What is wireframing in UX design?',
                    'options' => [
                        'Creating detailed animations for a website',
                        'Creating a simple layout to structure content before development',
                        'Designing final visuals for a website',
                        'Building complex back-end code for websites'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the difference between UI and UX?',
                    'options' => [
                        'UI focuses on visual elements, while UX focuses on the user experience',
                        'UI is for developers, while UX is for designers',
                        'UX focuses on coding, while UI focuses on content writing',
                        'There is no difference'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a key principle in UX design?',
                    'options' => [
                        'Functionality over aesthetics',
                        'User-centered design and usability',
                        'Choosing the cheapest design tools',
                        'Focus on adding as many features as possible'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the purpose of usability testing in UX design?',
                    'options' => [
                        'To test the technical performance of a website',
                        'To gather feedback on how users interact with a product',
                        'To create visually appealing designs',
                        'To ensure the product is SEO-friendly'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a "persona" in UX design?',
                    'options' => [
                        'A fictional character representing a user group',
                        'A type of navigation menu',
                        'A design pattern for buttons',
                        'A tool for coding UI components'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does the term "responsive design" mean in UI/UX?',
                    'options' => [
                        'Designing websites to automatically adapt to different screen sizes',
                        'Designing websites to load faster',
                        'Designing for a single device type',
                        'Designing based on SEO principles'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is "interaction design" in UX?',
                    'options' => [
                        'Designing how users interact with a website or app',
                        'Designing the layout of a page',
                        'Designing the back-end database structure',
                        'Designing marketing campaigns for the product'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the purpose of a "call to action" (CTA) in UI design?',
                    'options' => [
                        'To provide clear instructions to users on what to do next',
                        'To create the visual design of a website',
                        'To display important background information',
                        'To enhance the SEO of a page'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'data_analytics' => [
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
                [
                    'question' => 'What is the process of cleaning data in analytics?',
                    'options' => [
                        'Removing irrelevant or incorrect data from the dataset',
                        'Generating random data for testing purposes',
                        'Storing data in a cloud database',
                        'Performing calculations on data'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does "Big Data" refer to?',
                    'options' => [
                        'Small data sets for analysis',
                        'Large volumes of complex data',
                        'Data that is only used for marketing',
                        'Data stored in small databases'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a "pivot table" in Excel?',
                    'options' => [
                        'A table used for sorting and organizing data',
                        'A table used to summarize, analyze, explore, and present data',
                        'A type of chart used to display data',
                        'A form of data encryption'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is an example of descriptive analytics?',
                    'options' => [
                        'Predicting future trends based on data',
                        'Understanding past behaviors and trends through data',
                        'Automating decision-making processes',
                        'Visualizing data in dashboards'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the role of a data analyst?',
                    'options' => [
                        'To design and implement software applications',
                        'To analyze data and provide insights to guide decision-making',
                        'To manage a company’s IT infrastructure',
                        'To create marketing campaigns'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a "data visualization"?',
                    'options' => [
                        'A data entry tool',
                        'A graphical representation of data to identify patterns and trends',
                        'A statistical model for analyzing data',
                        'A method of sorting data'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is a common type of data analysis technique?',
                    'options' => [
                        'Clustering',
                        'HTML coding',
                        'Image editing',
                        '3D modeling'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is regression analysis used for in data analytics?',
                    'options' => [
                        'Predicting the relationship between variables',
                        'Summarizing historical data',
                        'Visualizing data trends',
                        'Organizing data into groups'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'datascience' => [
                [
                    'question' => 'What is the primary purpose of data science?',
                    'options' => [
                        'To clean data',
                        'To create machine learning algorithms',
                        'To extract actionable insights from structured and unstructured data',
                        'To store large volumes of data'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'Which programming language is widely used in data science?',
                    'options' => [
                        'Python',
                        'JavaScript',
                        'C#',
                        'HTML'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the main goal of supervised learning?',
                    'options' => [
                        'To find hidden patterns in data',
                        'To predict outcomes based on labeled data',
                        'To cluster similar data points',
                        'To optimize business strategies'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a "decision tree" in machine learning?',
                    'options' => [
                        'A hierarchical structure used for classification and regression tasks',
                        'A type of neural network used for image recognition',
                        'A method of visualizing data distributions',
                        'A tool for cleaning datasets'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which algorithm is commonly used in unsupervised learning?',
                    'options' => [
                        'K-means clustering',
                        'Linear regression',
                        'Logistic regression',
                        'Support vector machines'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is overfitting in machine learning?',
                    'options' => [
                        'When a model performs well on training data but poorly on unseen data',
                        'When a model performs well on test data but poorly on training data',
                        'When a model is trained too quickly',
                        'When data is not cleaned properly'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is feature engineering in data science?',
                    'options' => [
                        'Selecting relevant features from raw data to improve model performance',
                        'Choosing the best algorithm for a given dataset',
                        'Cleaning data to remove inconsistencies',
                        'Visualizing data trends and patterns'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is a confusion matrix used for?',
                    'options' => [
                        'Evaluating the performance of classification models',
                        'Visualizing large datasets',
                        'Processing natural language data',
                        'Cleaning missing values in datasets'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a common tool used for data science?',
                    'options' => [
                        'Microsoft Excel',
                        'R',
                        'Python',
                        'All of the above'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'What is deep learning in the context of data science?',
                    'options' => [
                        'A subset of machine learning that uses neural networks with many layers',
                        'A method for cleaning large datasets',
                        'A statistical model for predicting data trends',
                        'A technique for visualizing data'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'networking' => [
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
                [
                    'question' => 'What does DNS stand for?',
                    'options' => [
                        'Domain Name System',
                        'Data Network Service',
                        'Dynamic Network Server',
                        'Digital Name Service'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which protocol is used to assign IP addresses dynamically to devices on a network?',
                    'options' => [
                        'FTP',
                        'DHCP',
                        'HTTP',
                        'DNS'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the function of a router in a network?',
                    'options' => [
                        'To forward data packets between different networks',
                        'To store data locally for quick access',
                        'To encrypt sensitive data during transmission',
                        'To monitor network traffic for security'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does a firewall do?',
                    'options' => [
                        'It filters traffic to prevent unauthorized access',
                        'It boosts the internet connection speed',
                        'It manages IP address allocation',
                        'It monitors the physical health of network cables'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is an example of an IP address?',
                    'options' => [
                        '192.168.1.1',
                        'www.google.com',
                        'ftp://ftp.example.com',
                        'mydomain.local'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the maximum length of a CAT5 Ethernet cable without signal degradation?',
                    'options' => [
                        '50 meters',
                        '100 meters',
                        '200 meters',
                        '500 meters'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which device is used to connect different networks and direct traffic between them?',
                    'options' => [
                        'Hub',
                        'Router',
                        'Switch',
                        'Bridge'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is an IP address?',
                    'options' => [
                        'A physical address of a network device',
                        'A unique identifier for a device on a network',
                        'A name assigned to a network device',
                        'A security protocol for encrypting data'
                    ],
                    'correct_answer' => 1
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
                [
                    'question' => 'What is the purpose of a primary key in a relational database?',
                    'options' => [
                        'To link two tables together',
                        'To ensure data integrity and uniqueness in a table',
                        'To increase query speed',
                        'To store large amounts of data'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is a type of NoSQL database?',
                    'options' => [
                        'MySQL',
                        'MongoDB',
                        'PostgreSQL',
                        'Oracle Database'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the acronym CRUD stand for in database operations?',
                    'options' => [
                        'Create, Read, Update, Delete',
                        'Count, Run, Update, Delete',
                        'Create, Retrieve, Update, Delete',
                        'Create, Read, Use, Delete'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is NOT a type of join in SQL?',
                    'options' => [
                        'INNER JOIN',
                        'LEFT JOIN',
                        'RIGHT JOIN',
                        'TOP JOIN'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'Which command is used to delete a table in SQL?',
                    'options' => [
                        'DROP TABLE',
                        'DELETE TABLE',
                        'REMOVE TABLE',
                        'TRUNCATE TABLE'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is an index in a database?',
                    'options' => [
                        'A collection of stored procedures',
                        'A type of table for storing data',
                        'A data structure that improves the speed of data retrieval',
                        'A command for sorting data'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is normalization in database design?',
                    'options' => [
                        'The process of removing redundant data',
                        'The process of creating more backups',
                        'The process of indexing data',
                        'The process of encrypting data'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which SQL statement is used to retrieve data from a database?',
                    'options' => [
                        'SELECT',
                        'FETCH',
                        'GET',
                        'RETRIEVE'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'web_design' => [
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
                [
                    'question' => 'Which HTML tag is used to create a hyperlink?',
                    'options' => [
                        '<a>',
                        '<link>',
                        '<href>',
                        '<button>'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which property is used in CSS to change the background color of an element?',
                    'options' => [
                        'bg-color',
                        'background-color',
                        'color',
                        'background'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the CSS property "float" do?',
                    'options' => [
                        'Moves an element to the left or right within its container',
                        'Changes the color of text',
                        'Adjusts the height of an element',
                        'Centers an element on the page'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is used to define a container for content in HTML?',
                    'options' => [
                        '<div>',
                        '<section>',
                        '<span>',
                        '<content>'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the purpose of the "box-sizing" property in CSS?',
                    'options' => [
                        'Defines the padding and border inside an element\'s width and height',
                        'Adjusts the width of a text box',
                        'Controls the size of images',
                        'Sets the size of a button'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is the "alt" attribute used for in an <img> tag?',
                    'options' => [
                        'It provides alternative text for images if they cannot be displayed',
                        'It adds animation to images',
                        'It defines the image border',
                        'It changes the image source'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which HTML tag is used to display a list of items?',
                    'options' => [
                        '<ol>',
                        '<ul>',
                        '<list>',
                        '<li>'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the CSS "position" property control?',
                    'options' => [
                        'The positioning of an element relative to its normal position',
                        'The color of an element',
                        'The display style of an element',
                        'The size of an element'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'multimedia' => [
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
                [
                    'question' => 'Which of the following is a popular video file format?',
                    'options' => [
                        '.mp4',
                        '.png',
                        '.jpg',
                        '.gif'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does the term "resolution" refer to in multimedia?',
                    'options' => [
                        'The frame rate of video',
                        'The clarity or detail of an image or video',
                        'The duration of the media',
                        'The amount of color in an image'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which software is commonly used for editing videos?',
                    'options' => [
                        'Adobe Photoshop',
                        'Adobe Premiere Pro',
                        'Microsoft Word',
                        'Visual Studio'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which file format is typically used for compressed image files?',
                    'options' => [
                        '.bmp',
                        '.gif',
                        '.jpg',
                        '.txt'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is the primary use of an animation in multimedia?',
                    'options' => [
                        'To display text',
                        'To create a visual impact and tell a story',
                        'To improve file size',
                        'To control sound volume'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is an audio-visual multimedia tool?',
                    'options' => [
                        'Photoshop',
                        'PowerPoint',
                        'Notepad',
                        'Visual Studio'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does the term "frame rate" refer to in video production?',
                    'options' => [
                        'The number of frames per second in a video',
                        'The resolution of the video',
                        'The duration of the video',
                        'The type of video format'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is commonly used for interactive multimedia?',
                    'options' => [
                        'Flash',
                        'JPEG',
                        'WordPress',
                        'Notepad'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'graphic_design' => [
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
                [
                    'question' => 'What is the purpose of the "pen tool" in graphic design software?',
                    'options' => [
                        'To create pixel-based shapes',
                        'To draw and manipulate vector paths',
                        'To apply filters',
                        'To resize images'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a vector graphic?',
                    'options' => [
                        'A type of image composed of pixels',
                        'An image created using mathematical equations and paths',
                        'An image with limited color',
                        'A 3D-rendered image'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'Which of the following is a commonly used file format for vector graphics?',
                    'options' => [
                        '.jpg',
                        '.png',
                        '.ai',
                        '.bmp'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'Which of these is a key principle of graphic design?',
                    'options' => [
                        'Balance',
                        'Symmetry only',
                        'Randomness',
                        'None of the above'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does CMYK stand for in color theory?',
                    'options' => [
                        'Cyan, Magenta, Yellow, Key (Black)',
                        'Color Mix Yellow, Key Magenta',
                        'Cobalt, Mint, Yellow, Key',
                        'Color Mode Yellow, Key Magenta'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is an example of raster graphics?',
                    'options' => [
                        'Photoshop (.psd)',
                        'Illustrator (.ai)',
                        'SVG (.svg)',
                        'EPS (.eps)'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which graphic design principle refers to the arrangement of elements within a design?',
                    'options' => [
                        'Contrast',
                        'Alignment',
                        'Balance',
                        'Proximity'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is a common use for typography in graphic design?',
                    'options' => [
                        'To manipulate images',
                        'To create web animations',
                        'To convey text messages effectively',
                        'To create 3D graphics'
                    ],
                    'correct_answer' => 2
                ],
            ],
           'software_development' => [
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
                [
                    'question' => 'Which programming language is commonly used for web development?',
                    'options' => [
                        'C#',
                        'JavaScript',
                        'Swift',
                        'Python'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is version control in software development?',
                    'options' => [
                        'A method to ensure correct syntax in code',
                        'A system to track changes in code over time',
                        'A tool for debugging code',
                        'A framework for building software applications'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What is the purpose of a unit test?',
                    'options' => [
                        'To test individual units or components of the software',
                        'To test the entire software system',
                        'To verify the software’s performance under load',
                        'To check the software’s security vulnerabilities'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a popular version control system?',
                    'options' => [
                        'Git',
                        'NPM',
                        'Jenkins',
                        'Docker'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What does the term "refactoring" mean in software development?',
                    'options' => [
                        'Changing the software’s functionality',
                        'Rewriting the entire code from scratch',
                        'Improving the code without changing its behavior',
                        'Adding new features to the software'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'Which of the following is an example of a front-end framework?',
                    'options' => [
                        'Node.js',
                        'Django',
                        'React',
                        'Ruby on Rails'
                    ],
                    'correct_answer' => 2
                ],
                [
                    'question' => 'What is the purpose of a RESTful API?',
                    'options' => [
                        'To connect the front-end to the back-end of an application',
                        'To encrypt data sent between clients and servers',
                        'To manage databases in an application',
                        'To perform security audits on applications'
                    ],
                    'correct_answer' => 0
                ],
            ],
            'cloud_computing' => [
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
                [
                    'question' => 'What does SaaS stand for?',
                    'options' => [
                        'Software as a Service',
                        'System as a Service',
                        'Server as a Service',
                        'Storage as a Service'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is an example of a public cloud service provider?',
                    'options' => [
                        'Amazon Web Services (AWS)',
                        'Microsoft Azure',
                        'Google Cloud',
                        'All of the above'
                    ],
                    'correct_answer' => 3
                ],
                [
                    'question' => 'What is the primary difference between IaaS and PaaS?',
                    'options' => [
                        'IaaS provides virtualized computing resources, PaaS provides platforms for building and deploying applications',
                        'IaaS is for storage, PaaS is for processing data',
                        'IaaS includes hardware, PaaS includes software',
                        'There is no difference'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is cloud scalability?',
                    'options' => [
                        'The ability to increase or decrease resources based on demand',
                        'The ability to store data in multiple locations',
                        'The ability to use multiple servers simultaneously',
                        'The ability to use cloud applications offline'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'What is an example of a private cloud?',
                    'options' => [
                        'A cloud infrastructure dedicated to a single organization',
                        'A shared cloud service that anyone can use',
                        'A cloud service managed by a third-party vendor',
                        'A cloud service only for educational institutions'
                    ],
                    'correct_answer' => 0
                ],
                [
                    'question' => 'Which of the following is a disadvantage of cloud computing?',
                    'options' => [
                        'Dependence on internet connection',
                        'Data privacy and security concerns',
                        'Limited scalability options',
                        'All of the above'
                    ],
                    'correct_answer' => 1
                ],
                [
                    'question' => 'What does IaaS stand for?',
                    'options' => [
                        'Infrastructure as a Service',
                        'Internet as a Service',
                        'Integrated as a Service',
                        'Information as a Service'
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
            'total_questions' => count($quizQuestions),
            'user'=> $user
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
                    'correct' => (int)$answer === $quizQuestions[$index]['correct_answer'],
                ];
            }
        }

        // Store results in session
        session(['quiz_answers' => $results]);
        
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
        $user = Auth::user(); // Add this line to get user data
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

        // Check remaining points limit for today
        $remainingLimit = $this->getRemainingPointsLimit();
        
        // Adjust points based on daily limit
        $pointsToAward = min($points, $remainingLimit);

        if ($pointsToAward > 0) {
            // Store the quiz points in the database
            QuizPoints::create([
                'user_id' => Auth::id(),
                'points' => $pointsToAward
            ]);
        }

        // Get total points earned today for display
        $todayTotalPoints = $this->getUserTodayPoints();

        // Clear quiz session data after generating results
        session()->forget(['quiz_questions', 'quiz_answers']);
        
        return view('quiz.results', compact('user','score', 'correctAnswers', 'totalQuestions', 'questions', 'answers', 'points', 'pointsToAward', 'todayTotalPoints', 'remainingLimit'));
    }
}
