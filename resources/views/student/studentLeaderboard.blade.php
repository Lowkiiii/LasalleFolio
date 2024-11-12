@extends('layouts.app')
@section('webtitle')
    Leaderboard
@endsection

@section('content')
    <section class="h-screen bg-[#F8F8F8]">
        <div class="flex  row min-h-full justify-center relative ">

            <div class=" mx-auto max-w-[85rem] mt-20 w-full">

                <div class="w-full mr-10 mt-10 ">

                    <div class="flex flex-row justify-between items-center">
                        <div class="font-bold text-2xl text-black">Leaderboard</div>
                        <div class="text-end font-bold">
                            Current students: {{ $userCount - 1 }}
                        </div>
                    </div>

                    <div class="w-full mt-6 animate-blink animation-delay-200">
                        <form method="GET"
                              action="{{ route('student.leaderboard') }}">
                            <div class="relative mb-6">
                                <input type="text"
                                       name="query"
                                       {{-- Ensure you add the name attribute --}}
                                       class="outline-none text-sm w-1/3 py-2 px-3 pl-10 border border-[#D4D4D4] rounded-2xl"
                                       placeholder="Search">
                                <i class="absolute left-2 top-[0.4rem] opacity-60">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         x="0px"
                                         y="0px"
                                         width="26"
                                         height="26"
                                         viewBox="0 0 30 30">
                                        <path
                                              d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                        </path>
                                    </svg>
                                </i>
                            </div>
                        </form>

                        <div class="border  rounded-xl border-[#D4D4D4]">
                            <table class="w-full table-auto text-center ">
                                <thead>
                                    <tr class="border-b text-[#808080] border-[#D4D4D4] py-4 ">
                                        <th class="font-bold text-sm  py-4">Rank</th>
                                        <th class="font-bold text-sm py-4">Name</th>
                                        <th class="font-bold text-sm py-4">Projects Posted</th>
                                        <th class="font-bold text-sm py-4">Total XP</th>
                                    </tr>
                                </thead>
                                <tbody class="border-b rounded-xl">
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td class="py-4 text-[#006634] text-xl font-bold">
                                                <div class="items-center justify-center flex">

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         fill="{{ $user->badge == 'Gold' ? '#FFD700' : ($user->badge == 'Silver' ? '#C0C0C0' : ($user->badge == 'Bronze' ? '#CD7F32' : '#000000')) }}"
                                                         height="25"
                                                         width="25"
                                                         version="1.1"
                                                         id="Capa_1"
                                                         viewBox="0 0 296.084 296.084"
                                                         xml:space="preserve"
                                                         class="shadow-xl">
                                                        <g>
                                                            <path
                                                                  d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z" />
                                                            <path
                                                                  d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z" />
                                                            <path
                                                                  d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z" />
                                                            <path
                                                                  d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z" />
                                                        </g>
                                                    </svg>
                                                    {{-- overall rank of users --}}
                                                    <div class="ml-2">{{ $user->rank }}</div>
                                                    <div>
                                                    @if ($user->badge)
                                                    <span>{{ $user->badge }}</span>
                                                    @else
                                                        <span>No badge</span>
                                                    @endif
                                                </div>
                                                </div>
                                            </td>
                                            <td class="py-4 font-bold text-black w-1/3">

                                                <div class="relative flex  justify-center items-center text-center ">
                                                    <div
                                                         class="w-12 h-12 rounded-full mx-5 flex mt-auto mb-auto overflow-hidden shadow-lg">
                                                        <div class="relative group">
                                                            <label for="file_input"
                                                                   class="cursor-pointer ">

                                                                @if ($user->image)
                                                                    <img src="{{ asset('storage/' . $user->image) }}"
                                                                         alt="{{ $user->name }}'s Profile Image"
                                                                         class="w-full h-full object-cover block">
                                                                @else
                                                                    <img src="{{ asset('image/default-profile.png') }}"
                                                                         alt="Profile"
                                                                         class="w-full h-full object-cover block">
                                                                @endif

                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-col relative justify-start items-start  ">
                                                        <div class="text-center font-bold text-black text-xl">
                                                            {{ $user->name }}</div>
                                                        <div
                                                             class="flex items-center text-xs font-bold text-black justify-center ">
                                                            <div class="flex items-center text-[#006634]">
                                                                {{-- number of connected users or connections --}}
                                                                {{ $user->connectedUsersCount }}
                                                                <div
                                                                     class="items-center ml-1 text-[#808080] text-xs font-semibold truncate">
                                                                    Connection | </div>
                                                            </div>
                                                            <div class="flex items-center ml-1 text-[#006634]">
                                                                {{-- number of likes gathered --}}
                                                                {{-- {{ $user->userPosts->count() }} --}}
                                                                {{ $user->totalLikes }}
                                                                <div
                                                                     class="items-center ml-1 text-[#808080] text-xs font-semibold">
                                                                    Engagements </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- projects posted --}}
                                            <td class="py-4 font-bold text-black">{{ $user->userPosts->count() }}</td>
                                            {{-- total exp or points --}}
                                            <td class="py-4 font-bold text-black ">{{ $user->points }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="w-full">
                                <div class="p-4 grid grid-cols-3 gap-4">
                                    <div class="col-span-3 flex justify-between items-center">
                                        <!-- Previous Button -->
                                        <button id="prev" type="button" class="p-3 rounded-xl {{ $users->onFirstPage() ? 'pointer-events-none text-white bg-[#A3C8B8]' : 'text-white bg-[#006634]' }}">
                                            <a href="{{ $users->previousPageUrl() }}" class="">Previous</a>
                                        </button>
                            
                                        <!-- Page Information -->
                                        <p class="p-2 text-center flex-grow">
                                            Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
                                        </p>
                            
                                        <!-- Next Button -->
                                        <button id="next" type="button" class="px-6 py-3 rounded-xl {{ $users->hasMorePages() ? 'text-white bg-[#006634]' : 'text-white bg-[#A3C8B8] pointer-events-none' }}">
                                            <a href="{{ $users->nextPageUrl() }}" class="">Next</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
   
            <script>
                 document.getElementById("prev").addEventListener("click", function() {
        window.location.href = "{{ $users->previousPageUrl() }}";
    });
    document.getElementById("next").addEventListener("click", function() {
        window.location.href = "{{ $users->nextPageUrl() }}";
    });
            </script>

        </div>
    @endsection
