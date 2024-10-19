<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Quiz Game</title>
</head>

<body>
    @include('layouts.header')
    <section class="w-screen bg-[#F8F8F8]">
        <div class="flex row min-h-full justify-center relative">
            <div class="flex h-screen flex-col justify-center relative">
                <h1 class="text-2xl font-bold text-[#006634]">Quiz Game</h1>
                <div class="text-center w-full justify-center mx-auto">
                    <div class="mx-auto" id="quiz-container">
                        <div class="text-lg font-bold text-[#006634] p-8">
                            <ul id="question-list" class="space-y-4">
                                <li class="question" data-index="0" style="display: list-item;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                <li class="question" data-index="1" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                <li class="question" data-index="2" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                            </ul>
                        </div>
                        <div class="container">
                        <div class="justify-center mx-auto text-center flex py-2 flex-row gap-2">
                        <p id="questionNumber">Question 1</p>
                        <p>of</p>
                        <p id="totalQuestions"></p>
                    </div>
                    <div class="px-4 py-8 flex flex-col gap-2">
                        <div class="inline-flex items-center">
                            <label class="relative flex items-center cursor-pointer" for="html">
                              <input name="framework" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all" id="html">
                              <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                              </span>
                            </label>
                            <label class="ml-2 text-slate-600 cursor-pointer text-sm" for="html">ANSWER 1</label>
                          </div>
                          <div class="inline-flex items-center">
                            <label class="relative flex items-center cursor-pointer" for="html">
                              <input name="framework" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all" id="html">
                              <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                              </span>
                            </label>
                            <label class="ml-2 text-slate-600 cursor-pointer text-sm" for="html">ANSWER 1</label>
                          </div>
                          <div class="inline-flex items-center">
                            <label class="relative flex items-center cursor-pointer" for="html">
                              <input name="framework" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all" id="html">
                              <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                              </span>
                            </label>
                            <label class="ml-2 text-slate-600 cursor-pointer text-sm" for="html">ANSWER 1</label>
                          </div>
                          <div class="inline-flex items-center">
                            <label class="relative flex items-center cursor-pointer" for="html">
                              <input name="framework" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all" id="html">
                              <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                              </span>
                            </label>
                            <label class="ml-2 text-slate-600 cursor-pointer text-sm" for="html">ANSWER 1</label>
                          </div>
                    </div>
                </div>
                        <div class="flex text-center justify-center gap-4">
                            <x-button type="secondary" id="nextButton">
                                Next Question
                            </x-button>
                            <x-button type="secondary" id="prevButton" style="display: none;">
                                Previous Question
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const questions = document.querySelectorAll('.question');
        const nextButton = document.getElementById('nextButton');
        const prevButton = document.getElementById('prevButton');
        const totalQuestionsElement  = document.getElementById('totalQuestions')
        let currentQuestion = 0;


        const totalQuestions = questions.length;
        totalQuestionsElement.innerText = ` ${totalQuestions}`;
        // Show the first question
        questions[currentQuestion].style.display = 'list-item';

        // Next button functionality
        nextButton.addEventListener('click', function () {
            questions[currentQuestion].style.display = 'none'; // Hide current question
            currentQuestion++;
            if (currentQuestion < questions.length) {
                questions[currentQuestion].style.display = 'list-item'; // Show next question
                document.getElementById("questionNumber").innerText = `Question ${currentQuestion + 1}`; // Update question number
            }
            toggleButtons();
        });

        // Previous button functionality
        prevButton.addEventListener('click', function () {
            questions[currentQuestion].style.display = 'none'; // Hide current question
            currentQuestion--;
            if (currentQuestion >= 0) {
                questions[currentQuestion].style.display = 'list-item'; // Show previous question
                document.getElementById("questionNumber").innerText = `Question ${currentQuestion + 1}`; // Update question number
            }
            toggleButtons();
        });

        // Toggle button visibility
        function toggleButtons() {
            prevButton.style.display = currentQuestion > 0 ? 'inline-block' : 'none'; // Hide back 
            nextButton.style.display = currentQuestion < questions.length - 1 ? 'inline-block' : 'none'; // Hide next button on the last question
        }

        // Initialize button visibility
        toggleButtons();
    </script>
    @include('layouts.footer')
</body>

</html>
