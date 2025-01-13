<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Quiz Game</title>
</head>

<body>
    @include('layouts.header')
    <section class="w-screen bg-[#F8F8F8]">
        <div class="animate-blink flex row min-h-full justify-center relative">

            <div class="flex h-[45rem] flex-col justify-center relative animate-blink">
                <div>
                    <div class="absolute left-[53rem] top-[11rem] ">
                        <img src="/image/Assistance.png"
                             alt=""
                             class=" w-auto  h-[16rem]">
                    </div>
                    <div class="absolute top-[13rem] left-[18rem]"><img src="/image/self.png"
                        alt=""
                        class="w-auto h-[13rem] ">
                    </div>

                        <h1 class="text-2xl text-center font-bold text-[#006634]">🧠 Career Assessment 🧠</h1>
                        <div class="text-center w-full justify-center mx-auto ">
                            <form id="quiz-form"
                                  method="POST"
                                  action="{{ route('quiz.submit') }}">
                                @csrf
                                <div class="mx-auto animate-blink"
                                     id="quiz-container">
                                    <div class="text-lg font-bold text-[#006634] p-8">
                                        <ul id="question-list"
                                            class="space-y-4">
                                            @foreach ($questions as $index => $question)
                                                <li class="question"
                                                    data-index="{{ $index }}"
                                                    style="display: {{ $index === 0 ? 'list-item' : 'none' }}">
                                                    <div class="mb-2 text-sm text-gray-500">Career Assessment Question
                                                    </div>
                                                    {{ $question['question'] }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="container">
                                        <div class="justify-center mx-auto text-center flex py-2 flex-row gap-2">
                                            <p id="questionNumber">Question 1</p>
                                            <p>of</p>
                                            <p id="totalQuestions">{{ $total_questions }}</p>
                                        </div>
                                        <div class="px-4 py-8 flex flex-col gap-2">
                                            @foreach ($questions as $index => $question)
                                                <div class="options-group rounded-xl border bg-white border-[#D4D4D4] rounded-xl shadow-lg shadow-5"
                                                     data-question="{{ $index }}"
                                                     style="display: {{ $index === 0 ? 'block' : 'none' }}">
                                                    @foreach ($question['options'] as $optionIndex => $option)
                                                        <div
                                                             class="inline-flex items-center mb-2 w-[16rem] h-[6rem] p-4">
                                                            <label class="relative flex items-center cursor-pointer">
                                                                <input name="answers[{{ $index }}]"
                                                                       type="radio"
                                                                       class="answer-option peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-black checked:border-[#006634] transition-all"
                                                                       value="{{ $optionIndex }}">
                                                                <span
                                                                      class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                                            </label>
                                                            <label
                                                                   class="ml-2 font-semibold text-black cursor-pointer text-sm">{{ $option }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="flex text-center justify-center gap-4">
                                        <button type="button"
                                                id="prevButton"
                                                class="px-4 py-2 bg-white border-2 shadow-lg text-gray-200 rounded-md"
                                                style="">
                                            Previous Question
                                        </button>
                                        <button type="button"
                                                id="nextButton"
                                                class=".playButtonPress px-4 py-2 bg-[#006634] text-white rounded-md hover:bg-[#004423]">
                                            Next Question
                                        </button>
                                        <button type="submit"
                                                id="submitButton"
                                                class="px-4 py-2 bg-[#006634] text-white rounded-md"
                                                style="display: none;">
                                            Submit Assessment
                                        </button>
                                        {{-- <button type="button"
                                                onclick="launchConfetti()">
                                            Launch Confetti
                                        </button> --}} {{-- debug for launching confetti --}}
                                    </div>
                                </div>
                                <!-- Add the audio element for SFX -->
                                <audio id="sfx-audio"
                                       src="{{ asset('sfx/checkbox.mp3') }}"
                                       preload="auto"></audio>

                                <audio id="buttonPress"
                                       src="{{ asset('sfx/ButtonPress.mp3') }}"
                                       preload="auto"></audio>

                                <!-- Add JavaScript to handle the click event and play the sound -->
                                <script>
                                    // Get the audio element
                                    const audio = document.getElementById('sfx-audio');
                                    const buttonPress = document.getElementById('buttonPress');



                                    nextButton.addEventListener('click', function() {
                                        console.log('Button pressed');
                                        buttonPress.play();
                                    });

                                    prevButton.addEventListener('click', function() {
                                        console.log('Button pressed');
                                        buttonPress.play();
                                    });

                                    // Add an event listener to play the sound when any answer option is clicked
                                    const options = document.querySelectorAll('.answer-option');
                                    options.forEach(option => {
                                        option.addEventListener('click', function() {
                                            audio.play();
                                        });
                                    });
                                </script>
                                <script>
                                    function launchConfetti() {
                                        console.log('Launching confetti...');
                                        confetti({
                                            particleCount: 100,
                                            spread: 70,
                                            origin: {
                                                y: 0.6
                                            }
                                        });
                                    }
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @include('layouts.footer') --}}
    </section>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questions = document.querySelectorAll('.question');
        const optionsGroups = document.querySelectorAll('.options-group');
        const nextButton = document.getElementById('nextButton');
        const prevButton = document.getElementById('prevButton');
        const submitButton = document.getElementById('submitButton');
        const quizForm = document.getElementById('quiz-form');
        let currentQuestion = 0;
        const totalQuestions = questions.length;

        function updateQuestion(newIndex) {
            questions[currentQuestion].style.display = 'none';
            optionsGroups[currentQuestion].style.display = 'none';
            currentQuestion = newIndex;
            questions[currentQuestion].style.display = 'list-item';
            optionsGroups[currentQuestion].style.display = 'block';
            document.getElementById("questionNumber").innerText = `Question ${currentQuestion + 1}`;

            prevButton.disable = currentQuestion > 0 ? true : false;

            if (currentQuestion > 0) {
                prevButton.classList.add("text-black")
                prevButton.classList.remove("text-gray-200");
            } else {
                prevButton.classList.remove("text-black");
                prevButton.classList.add("text-gray-200")
            }

            if (currentQuestion === totalQuestions - 1) {

                nextButton.style.display = 'none';
                submitButton.style.display = 'inline-block';
            } else {
                nextButton.style.display = 'inline-block';
                submitButton.style.display = 'none';
            }
        }

        nextButton.addEventListener('click', () => {
            if (currentQuestion < totalQuestions - 1) {
                updateQuestion(currentQuestion + 1);
            }
        });

        prevButton.addEventListener('click', () => {
            if (currentQuestion > 0) {
                updateQuestion(currentQuestion - 1);
            }

        });

        quizForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Check if all questions are answered
            let allQuestionsAnswered = true;
            for (let i = 0; i < totalQuestions; i++) {
                const answered = document.querySelector(`input[name="answers[${i}]"]:checked`);
                if (!answered) {
                    allQuestionsAnswered = false;
                    break;
                }
            }

            if (!allQuestionsAnswered) {
                alert('Please answer all questions before submitting.');
                return;
            }

            // Create FormData object
            const formData = new FormData(quizForm);

            // Convert FormData to a regular object
            const formObject = {};
            formData.forEach((value, key) => {
                formObject[key] = value;
            });

            try {
                const response = await fetch(quizForm.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json'
                    },
                    body: new URLSearchParams(formData)
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const result = await response.json();
                if (result.success) {
                    window.location.href = '/quiz/results';
                } else {
                    throw new Error(result.error || 'Unknown error occurred');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('There was an error submitting your quiz. Please try again.');
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
