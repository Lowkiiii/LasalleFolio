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
    <div class="mt-20 py-12">
        <div class="top-8 max-w-7xl mx-auto px-4">
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

                        <!-- Career Path Insights -->
                        <div class="border rounded-lg p-6 bg-white">
                            <h3 class="text-xl font-semibold mb-4">Career Path Insights</h3>
                            @php
                                $topCareer = array_search(max($careerPercentages), $careerPercentages);
                                $descriptions = [
                                    'data_engineering' =>
                                        'You excel in roles that involve building and maintaining robust data systems. Data Engineers focus on creating scalable data pipelines, managing databases, and ensuring efficient data processing. They play a crucial role in enabling businesses to access and utilize data effectively.',
                                    'data_science' =>
                                        'Your analytical mindset and problem-solving skills align well with Data Scientist roles. Data Scientists analyze large datasets, uncover patterns, and build predictive models to drive data-driven decisions. They bridge the gap between business needs and technical solutions.',
                                    'ai_engineering' =>
                                        'Your interest in artificial intelligence and machine learning highlights a strong fit for AI Engineer roles. AI Engineers design and deploy intelligent systems, develop machine learning algorithms, and work on cutting-edge AI technologies to solve complex challenges and innovate processes.',
                                ];
                            @endphp
                            
                            <div class="bg-green-50 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold mb-2">Your Top Match: 
                                    {{ ucwords(str_replace('_', ' ', $topCareer)) }}</h4>
                                <p>{{ $descriptions[$topCareer] }}</p>
                            </div>
                        </div>

                        <!-- Career Path Progression -->
                        <div class="border rounded-lg p-6 bg-white overflow-x-auto">
                            <h3 class="text-xl font-semibold mb-6">Career Map</h3>
                            <div class="flex min-w-max">
                                <!-- Level Labels Column -->
                                <div class="w-48 flex-shrink-0 pr-4">
                                    <br><br><br>
                                    <div class="h-16 mb-3 flex items-center justify-center pr-2 text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        C-Level
                                    </div>
                                    <div class="h-32 mb-3 flex flex-col items-center justify-center text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        <span>Senior Director</span>
                                        <hr class="w-3/4 border-gray-400 my-2">
                                        <span>Director</span>
                                    </div>                                                                      
                                    <div class="h-32 mb-3 flex flex-col items-center justify-center text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        <span>Senior Manager</span>
                                        <hr class="w-3/4 border-gray-400 my-2">
                                        <span>Manager</span>
                                    </div> 
                                    <div class="h-16 mb-3 flex items-center justify-center pr-2 text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        Senior Professional / <br> Supervisor
                                    </div>
                                    <div class="h-16 mb-3 flex items-center justify-center pr-2 text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        Professional
                                    </div>
                                    <div class="h-16 mb-3 flex items-center justify-center pr-2 text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        Senior Associate
                                    </div>
                                    <div class="h-16 mb-3 flex items-center justify-center pr-2 text-sm font-medium rounded-l-lg bg-gray-600 text-white">
                                        Associate
                                    </div>
                                </div>

                                <!-- Career Paths Grid -->
                                <div class="flex gap-6">
                                    <!-- Data Engineering Column -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">Data Engineering</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Information Officer
                                            </div>
                                            {{-- <div class="h-16 bg-gray-50 p-3 rounded border border-dashed border-gray-300 text-sm font-medium text-gray-700 flex items-center justify-center"></div> --}}
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Data Architect
                                            </div>
                                            {{-- <div class="h-16 bg-gray-50 p-3 rounded border border-dashed border-gray-300 text-sm font-medium text-gray-700 flex items-center justify-center"></div> --}}
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Data Architect
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior Data Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Data Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate Data Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate Data Analyst
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Data Science Column -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">Data Science</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Analytics Officer
                                            </div>
                                            {{-- <div class="h-16 bg-gray-50 p-3 rounded border border-dashed border-gray-300 text-sm font-medium text-gray-700 flex items-center justify-center"></div> --}}
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Data Scientist
                                            </div>
                                            {{-- <div class="h-16 bg-gray-50 p-3 rounded border border-dashed border-gray-300 text-sm font-medium text-gray-700 flex items-center justify-center"></div> --}}
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior Data Scientist
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Data Scientist
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Machine Learning Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate Data Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate Data Analyst
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AI Engineering Column -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">AI Engineering</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Technology Officer
                                            </div>
                                            {{-- <div class="h-16 bg-gray-50 p-3 rounded border border-dashed border-gray-300 text-sm font-medium text-gray-700 flex items-center justify-center"></div> --}}
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief AI Engineer
                                            </div>
                                            {{-- <div class="h-16 bg-gray-50 p-3 rounded border border-dashed border-gray-300 text-sm font-medium text-gray-700 flex items-center justify-center"></div> --}}
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior AI Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                AI Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Machine Learning Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate Data Engineer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate Data Analyst
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script>
    window.onload = function() {
        confetti({
            particleCount: 200,
            spread: 150,
            origin: {
                y: .9
            }
        });
    };
</script>

</html>