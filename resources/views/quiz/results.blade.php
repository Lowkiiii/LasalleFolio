<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Quiz Results</title>
</head>
<body class="bg-gray-100">
    @include('layouts.header')
    <div class="min-h-screen py-8">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold text-[#006634] mb-6">Quiz Results</h1>
                
                <!-- Score Card -->
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-[#006634] mb-2">Your Score: {{ $score }}%</h2>
                        <p class="text-lg">
                            Points earned: <span class="font-bold text-[#006634]">{{ $points }}</span>
                            <br>
                            <span class="text-sm text-gray-600">(5 points per correct answer)</span>
                        </p>
                        <p class="text-gray-600">
                            You got <span class="font-bold text-[#006634]">{{ $correctAnswers }}</span> 
                            out of <span class="font-bold text-[#006634]">{{ $totalQuestions }}</span> questions correct
                        </p>
                    </div>
                </div>

                <!-- Answer Review -->
                <h3 class="text-xl font-semibold mb-4">Review Your Answers:</h3>
                <div class="space-y-6">
                    @foreach($questions as $index => $question)
                        <div class="border rounded-lg p-4 {{ $answers[$index]['correct'] ? 'bg-green-50' : 'bg-red-50' }}">
                            <div class="flex items-start gap-2">
                                <span class="bg-gray-200 rounded-full w-6 h-6 flex items-center justify-center text-sm font-medium">
                                    {{ $index + 1 }}
                                </span>
                                <div class="flex-1">
                                    <p class="font-medium mb-2">{{ $question['question'] }}</p>
                                    <div class="space-y-1 text-sm">
                                        <p>
                                            <span class="font-medium">Your answer:</span> 
                                            <span class="{{ $answers[$index]['correct'] ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $question['options'][$answers[$index]['user_answer']] }}
                                            </span>
                                        </p>
                                        @if(!$answers[$index]['correct'])
                                            <p>
                                                <span class="font-medium">Correct answer:</span> 
                                                <span class="text-green-600">
                                                    {{ $question['options'][$question['correct_answer']] }}
                                                </span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 text-center">
                    <a href="{{ route('quiz') }}" 
                       class="inline-block px-6 py-2 bg-[#006634] text-white rounded-lg hover:bg-[#005528] transition-colors">
                        Try Another Quiz
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>