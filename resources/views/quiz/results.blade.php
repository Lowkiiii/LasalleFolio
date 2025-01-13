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

                            <!-- Junior Programmer -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Junior Programmer</span>
                                    <span>{{ $careerPercentages['junior_programmer'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full"
                                        style="width: {{ $careerPercentages['junior_programmer'] }}%"></div>
                                </div>
                            </div>

                            <!-- Junior Programmer -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Junior Technical Artist</span>
                                    <span>{{ $careerPercentages['junior_technical_artist'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full"
                                        style="width: {{ $careerPercentages['junior_technical_artist'] }}%"></div>
                                </div>
                            </div>

                            <!-- Junior Programmer -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Junior Game Designer</span>
                                    <span>{{ $careerPercentages['junior_game_designer'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full"
                                        style="width: {{ $careerPercentages['junior_game_designer'] }}%"></div>
                                </div>
                            </div>

                            <!-- Junior Programmer -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">UI/UX Designer</span>
                                    <span>{{ $careerPercentages['ui_ux_designer'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full"
                                        style="width: {{ $careerPercentages['ui_ux_designer'] }}%"></div>
                                </div>
                            </div>

                            <!-- Junior Programmer -->
                            <div class="mb-4">
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">QA Tester</span>
                                    <span>{{ $careerPercentages['qa_tester'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-[#006634] h-2 rounded-full"
                                        style="width: {{ $careerPercentages['qa_tester'] }}%"></div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Career Path Insights -->
                        <div class="border rounded-lg p-6 bg-white">
                            <h3 class="text-xl font-semibold mb-4">Career Path Insights</h3>
                            @php
                                $topCareer = array_search(max($careerPercentages), $careerPercentages);
                                $descriptions = [
                                    'junior_programmer' =>
                                        'You excel in game programming and coding. Junior Programmers develop game logic, create efficient code for gameplay, user interfaces, and AI, and troubleshoot technical issues to ensure smooth performance.',
                                    'junior_technical_artist' =>
                                        'Your blend of technical and artistic skills makes you ideal for the Technical Artist role. Junior Technical Artists optimize production workflows, develop tools for artists, and enhance game asset performance.',
                                    'junior_game_designer' =>
                                        'Your creativity and problem-solving abilities align strongly with Game Design. Junior Game Designers conceptualize engaging gameplay mechanics, design immersive experiences, and refine game features based on feedback.',
                                    'ui_ux_designer' =>
                                        'You have a talent for designing intuitive and visually appealing user interfaces. UI/UX Designers create seamless experiences through wireframes, mockups, and user feedback analysis.',
                                    'qa_tester' =>
                                        'Your keen eye for detail and structured approach are perfect for Quality Assurance. QA Testers ensure games meet high standards by executing thorough testing, identifying issues, and driving quality improvements.'
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
                                {{-- <div class="w-48 flex-shrink-0 pr-4">
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
                                </div> --}}

                                <!-- Career Paths Grid -->
                                <div class="flex gap-6">
                                    <!-- Junior Programmer Path -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">Game Programmer</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Technology Officer
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Technical Director
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Lead Programmer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior Programmer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Programmer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Junior Programmer
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Junior Technical Artist Path -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">Game Technical Artist</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Creative Officer
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Technical Art Director
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior Technical Artist
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Technical Artist
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Junior Technical Artist
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Junior Game Designer Path -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">Game Designer</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Chief Game Designer
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Creative Director
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Lead Game Designer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior Game Designer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Game Designer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Junior Game Designer
                                            </div>
                                        </div>
                                    </div>

                                    <!-- UI/UX Designer Path -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">UI/UX Designer</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Lead UI/UX Designer
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior UI/UX Designer
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                UI/UX Designer
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate UI/UX Designer
                                            </div>
                                        </div>
                                    </div>

                                    <!-- QA Tester Path -->
                                    <div class="w-80">
                                        <div class="bg-[#006634] text-white p-3 rounded-t-lg mb-3">
                                            <h4 class="font-semibold text-center">QA Tester</h4>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Lead QA Tester
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Senior QA Tester
                                            </div>
                                            <div class="h-32 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                QA Tester
                                            </div>
                                            <div class="h-16 bg-white p-3 rounded border border-gray-200 text-sm font-medium text-gray-700 flex items-center justify-center">
                                                Associate QA Tester
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