<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Quiz Game</title>
</head>
<body>
    @include('layouts.header')
    <section class="w-screen bg-[#F8F8F8]">
        <div class="flex row min-h-full justify-center relative">
            <div class="flex h-screen flex-col justify-center relative">
                <h1 class="text-2xl font-bold text-[#006634]">Interest-Based Quiz</h1>
                <div class="text-center w-full justify-center mx-auto">
                    <form id="quiz-form" method="POST" action="{{ route('quiz.submit') }}">
                        @csrf
                        <div class="mx-auto" id="quiz-container">
                            <div class="text-lg font-bold text-[#006634] p-8">
                                <ul id="question-list" class="space-y-4">
                                    @foreach($questions as $index => $question)
                                        <li class="question" data-index="{{ $index }}" style="display: {{ $index === 0 ? 'list-item' : 'none' }}">
                                            <div class="mb-2 text-sm text-gray-500">Category: {{ $question['category'] }}</div>
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
                                    @foreach($questions as $index => $question)
                                        <div class="options-group" data-question="{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                                            @foreach($question['options'] as $optionIndex => $option)
                                                <div class="inline-flex items-center mb-2">
                                                    <label class="relative flex items-center cursor-pointer">
                                                        <input name="answers[{{ $index }}]" type="radio" 
                                                               class="answer-option peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all"
                                                               value="{{ $optionIndex }}">
                                                        <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                                    </label>
                                                    <label class="ml-2 text-slate-600 cursor-pointer text-sm">{{ $option }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex text-center justify-center gap-4">
                                <button type="button" id="prevButton" class="px-4 py-2 bg-gray-200 rounded-md" style="display: none;">
                                    Previous Question
                                </button>
                                <button type="button" id="nextButton" class="px-4 py-2 bg-[#006634] text-white rounded-md">
                                    Next Question
                                </button>
                                <button type="submit" id="submitButton" class="px-4 py-2 bg-[#006634] text-white rounded-md" style="display: none;">
                                    Submit Quiz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
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
            
            prevButton.style.display = currentQuestion > 0 ? 'inline-block' : 'none';
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
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
