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
    <div class="min-h-screen top-30 py-12">
        <div class="top-20 max-w-3xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold text-[#006634] mb-6">Quiz Results</h1>
                
                <!-- Score Card -->
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-[#006634] mb-4">Your Career Assessment Results</h2>
                        <p class="text-lg mb-6">
                            Points earned: <span class="font-bold text-[#006634]">{{ $pointsAwarded }}</span>
                            <br>
                            <span class="text-sm text-gray-600">(for completing the assessment)</span>
                        </p>
                    </div>
            
                    <!-- Career Path Matches -->
                    <div class="space-y-6">
                        <div class="border rounded-lg p-6 bg-white">
                            <h3 class="text-xl font-semibold mb-4">Career Path Matches</h3>
                            
                            <!-- Data Engineering -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Data Engineering</span>
                                    <span>{{ $careerPercentages['data_engineering'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full" 
                                         style="width: {{ $careerPercentages['data_engineering'] }}%"></div>
                                </div>
                            </div>
            
                            <!-- Data Science -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Data Science</span>
                                    <span>{{ $careerPercentages['data_science'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full" 
                                         style="width: {{ $careerPercentages['data_science'] }}%"></div>
                                </div>
                            </div>
            
                            <!-- AI Engineering -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">AI Engineering</span>
                                    <span>{{ $careerPercentages['ai_engineering'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full" 
                                         style="width: {{ $careerPercentages['ai_engineering'] }}%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Career Path Descriptions -->
                        <div class="border rounded-lg p-6 bg-white">
                            <h3 class="text-xl font-semibold mb-4">Career Path Insights</h3>
                            
                            @php
                                $topCareer = array_search(max($careerPercentages), $careerPercentages);
                                $descriptions = [
                                    'data_engineering' => 'You show a strong aptitude for building and maintaining data infrastructure. Data Engineers design and construct data pipelines, ensure data quality, and optimize data systems.',
                                    'data_science' => 'Your responses indicate strength in analytical thinking and statistical analysis. Data Scientists extract insights from data, build predictive models, and solve complex business problems.',
                                    'ai_engineering' => 'You demonstrate interest in machine learning and AI systems. AI Engineers develop intelligent systems, implement neural networks, and create cutting-edge AI solutions.'
                                ];
                            @endphp
            
                            <div class="bg-green-50 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold mb-2">Your Top Match: {{ ucwords(str_replace('_', ' ', $topCareer)) }}</h4>
                                <p>{{ $descriptions[$topCareer] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Points Summary -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <p class="text-sm text-gray-600">
                        Today's total points: <span class="font-bold">{{ $todayTotalPoints }}</span><br>
                        Remaining points available today: <span class="font-bold">{{ $remainingLimit }}</span>
                    </p>
                </div>
            
                <!-- Action Buttons -->
                <div class="mt-8 text-center">
                    <a href="{{ route('quiz') }}" 
                       class="inline-block px-6 py-2 bg-[#006634] text-white rounded-lg hover:bg-[#005528] transition-colors">
                        Take Another Assessment
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>