@extends('layouts.app')

@section('webtitle')
    Profile
@endsection

@section('content')
    <div id="viewImageModal"
         tabindex="-1"
         class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-white rounded-lg p-4 relative">
            <button id="closeModal"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            <img id="modalImage"
                 src=""
                 alt="Full-Size Profile Image"
                 class="max-w-full max-h-screen rounded-lg">
        </div>
    </div>
    <section class="h-screen bg-[#F8F8F8]">

        <div class="flex row min-h-full mt-24 justify-center relative bg-[#F8F8F8]">

            <div class=" mx-auto  max-w-[85rem] mt-4  animate-blink">
                <div class="flex flex-row border-InputGray rounded-xl w-full">
                    <div class=" container">
                        <img src='/image/profileBG.png'
                             class="w-full h-[20rem] object-cover rounded-xl  " />
                    </div>
                </div>
                <div class="z-20  mx-auto max-w-full -translate-y-24">
                    <div class="justify-center items-center">
                        <div
                             class="w-36 h-36 bg-white border-4 border-[#F8F8F8] rounded-full justify-center mx-auto max-w-lg flex items-center relative">
                            <div class="relative group w-full h-full">
                                @if ($user->image)
                                    <img id="profileImage"
                                         src="{{ asset('storage/' . $user->image) }}"
                                         alt="Profile"
                                         class="w-full h-full rounded-full object-cover cursor-pointer">
                                @else
                                    <img id="profileImage"
                                         src="{{ asset('image/default-profile.png') }}"
                                         alt="Profile"
                                         class="w-full h-full rounded-full object-cover cursor-pointer">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- JavaScript for Modal Interaction -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const profileImage = document.getElementById('profileImage');
                            const modalImage = document.getElementById('modalImage');
                            const viewImageModal = document.getElementById('viewImageModal');
                            const closeModal = document.getElementById('closeModal');

                            profileImage.addEventListener('click', (event) => {
                                // Prevent triggering the file input
                                event.preventDefault();

                                // Set the modal image source
                                modalImage.src = profileImage.src;

                                // Show the modal
                                viewImageModal.classList.remove('hidden');
                            });

                            closeModal.addEventListener('click', () => {
                                // Hide the modal
                                viewImageModal.classList.add('hidden');
                            });

                            // Close modal when clicking outside the modal content
                            viewImageModal.addEventListener('click', (event) => {
                                if (event.target === viewImageModal) {
                                    viewImageModal.classList.add('hidden');
                                }
                            });
                        });
                    </script>
                    <h1
                        class="flex flex-row mx-auto max-y-md max-w-lg  items-center justify-center text-center text-lg pt-2 font-bold text-black">

                        {{ $user->first_name }} {{ $user->last_name }}

                        <div class="ml-1">
                            <div class="items-start text-start flex flex-row">
                                @props(['badge'])
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     fill="{{ $badge == 'Gold' ? '#FFD700' : ($badge == 'Silver' ? '#9a9a9a' : ($badge == 'Bronze' ? '#964B00' : '#f0f0f0')) }}"
                                     height="22"
                                     width="22"
                                     version="1.1"
                                     id="Capa_1"
                                     viewBox="0 0 296.084 296.084"
                                     xml:space="preserve"
                                     {{ $attributes->merge(['class' => 'shadow-xl']) }}>
                                    <g>
                                        <path
                                              d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689 C168.709,77.51,180.064,80.221,191.27,84.676z" />
                                        <path
                                              d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428 c11.508-4.574,24.302-7.307,36.302-8.045V0z" />
                                        <path
                                              d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334 c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627 c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z" />
                                        <path
                                              d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627 c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z" />
                                    </g>
                                </svg>

                            </div>
                        </div>
                        <div class="ml-1">
                            <div class="items-start text-start flex fle-row"
                                 data-twe-toggle="tooltip"
                                 title="This user is Not Verified">
                                {{-- 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#006634" class="size-5 ">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg> --}}

                                {{-- <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24"
                                     fill="currentColor"
                                     class="size-6 opacity-30">
                                    <path fill-rule="evenodd"
                                          d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                          clip-rule="evenodd" />
                                </svg> --}}

                            </div>
                        </div>

                    </h1>
                    <p class="text-xs mx-auto max-y-md max-w-lg flex items-center justify-center">
                        {{ Auth::user()->full_address }}
                    </p>
                    <br>

                    {{-- PAU PA EDIT --}}
                    {{-- <p class="text-xs mx-auto max-y-md max-w-lg flex items-center justify-center">
                        Interests:
                        {{ $user->interests->pluck('interest_name')->join(', ') }}
                    </p> --}}

                    <div class="flex items-center justify-center mx-auto p-2">
                        <div class="text-xs text-center mx-auto justify-center font-semibold text-black opacity-80">
                            @php
                                $studentInterests = $user->interests->pluck('interest_name')->map(function ($interest) {
                                    return str_replace('_', ' ', $interest);
                                });
                            @endphp

                            <p class="text-base font-bold text-black">Interests:
                                {{-- <button class="opacity-70"
                                        onclick="toggleModal('modal-idInterests')">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="13"
                                         height="13"
                                         viewBox="0 0 24 24"
                                         class="fill-current text-[#909090] hover:text-[#006634]">
                                        <path
                                              d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                    </svg>
                                </button> --}}
                            </p>

                            <div>
                                <span class=""
                                      id="limitedInterests">
                                    {{ $studentInterests->take(3)->join(', ') }}
                                    @if ($studentInterests->count() > 3)
                                        <a href="javascript:void(0);"
                                           id="toggleInterestMore"
                                           class="text-[#006634] underline">See More</a>
                                    @endif

                                </span>
                                <span class="hidden items-center justify-center  "
                                      id="fullInterests"">

                                    {{ $studentInterests->join(', ') }}
                                    <a class="text-[#006634] underline"
                                       href="javascript:void(0);"
                                       id="toggleInterestLess">See Less</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-sm font-d mx-auto max-y-md max-w-lg flex items-center justify-center mt-2 mb-2"
                         id="btn-ConnectContainer">
                        <div>
                            <script>
                                document.getElementById("toggleInterestMore")?.addEventListener("click", function() {
                                    const limitedInterests = document.getElementById("limitedInterests");
                                    const fullInterests = document.getElementById("fullInterests");

                                    limitedInterests.classList.add("hidden");
                                    fullInterests.classList.remove("hidden");
                                });

                                document.getElementById("toggleInterestLess")?.addEventListener("click", function() {
                                    const limitedInterests = document.getElementById("limitedInterests");
                                    const fullInterests = document.getElementById("fullInterests");

                                    limitedInterests.classList.remove("hidden");
                                    fullInterests.classList.add("hidden");
                                });


                                // lazyload
                                document.addEventListener("DOMContentLoaded", function() {
                                    var lazyloadImages = document.querySelectorAll("img.lazyload");
                                    var lazyloadThrottleTimeout;

                                    function lazyload() {
                                        if (lazyloadThrottleTimeout) {
                                            clearTimeout(lazyloadThrottleTimeout);
                                        }

                                        lazyloadThrottleTimeout = setTimeout(function() {
                                            var scrollTop = window.pageYOffset;
                                            lazyloadImages.forEach(function(img) {
                                                if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                                    img.src = img.dataset.src;
                                                    img.classList.remove('lazyload');
                                                }
                                            });
                                            if (lazyloadImages.length == 0) {
                                                document.removeEventListener("scroll", lazyload);
                                                window.removeEventListener("resize", lazyload);
                                                window.removeEventListener("orientationChange", lazyload);
                                            }
                                        }, 20);
                                    }

                                    document.addEventListener("scroll", lazyload);
                                    window.addEventListener("resize", lazyload);
                                    window.addEventListener("orientationChange", lazyload);
                                });

                                const ConnectBtn = document.querySelector('#btn-ConnectContainer button');

                                ConnectBtn.addEventListener('click', (event) => {
                                    const btn = event.target;
                                    event.preventDefault();
                                    if (btn.style.backgroundColor === 'rgb(217, 217, 217)') {
                                        btn.style.backgroundColor = '#006634';
                                        btn.innerText = 'Connect +'
                                        btn.style.color = "white";
                                    } else {
                                        btn.style.backgroundColor = '#D9D9D9';
                                        btn.innerText = 'Connected';
                                        btn.style.color = "#444444";
                                    }
                                });
                            </script>
                        </div>
                    </div>

                    {{-- Friend/Connect/Unfriend button --}}
                    <div class="flex items-center justify-center ml-5">
                        <div class="text-xs font-bold">
                            @php
                                $friendRequest = \App\Models\FriendRequest::where(function ($query) use ($user) {
                                    $query->where('sender_id', auth()->id())->where('receiver_id', $user->id);
                                })
                                    ->orWhere(function ($query) use ($user) {
                                        $query->where('receiver_id', auth()->id())->where('sender_id', $user->id);
                                    })
                                    ->first();
                            @endphp

                            @if ($friendRequest && $friendRequest->status === 'accepted')
                                <form action="{{ route('friend-request.unfriend', $user->id) }}"
                                      method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="inline-block rounded-md bg-[#FF0000] px-2 py-1 text-xs font-bold leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#990000] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#990000] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#990000] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                        Unfriend
                                    </button>
                                </form>
                            @elseif($friendRequest && $friendRequest->status === 'pending' && $friendRequest->receiver_id === auth()->id())
                                <form action="{{ route('friendRequest.accept', $friendRequest->id) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    <button type="submit"
                                            class="inline-block rounded-md bg-[#006634] px-2 py-1 text-xs font-bold leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                        Accept
                                    </button>
                                </form>
                                <form action="{{ route('friendRequest.reject', $friendRequest->id) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    <button type="submit"
                                            class="inline-block rounded-md bg-[#FF0000] px-2 py-1 text-xs font-bold leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#990000] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#990000] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#990000] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                        Reject
                                    </button>
                                </form>
                            @elseif($friendRequest && $friendRequest->status === 'pending' && $friendRequest->sender_id === auth()->id())
                                <button disabled
                                        class="inline-block rounded-md bg-gray-500 px-2 py-1 text-xs font-bold leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] w-full">
                                    Pending
                                </button>
                            @else
                                <form action="{{ route('friend-request.send', $user->id) }}"
                                      method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="inline-block rounded-md bg-[#006634] px-2 py-1 text-xs font-bold leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(
                                                                dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                        Connect +
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-center py-6 px-6">
                        <div class="flex">
                            <div class="flex flex-col items-center mr-32 ">
                                <div class="font-bold text-xl text-[#006634] ">{{ $points }}</div>
                                <div class="text-xs  text-center truncate text-[#444444] font-medium">Points
                                    Garnered</div>
                            </div>

                            <div class="flex flex-col items-center mx-32 text-[#006634]">
                                <div class="font-bold text-xl">{{ $connectedStudentsCount }}</div>
                                <div class="text-xs  text-center truncate text-[#444444] font-medium">
                                    Students Connected
                                </div>
                            </div>

                            <div class="flex flex-col items-center ml-32 text-[#006634] ">
                                <div class="font-bold text-xl">{{ $projectCount }}</div>
                                <div class="text-xs  text-center truncate text-[#444444] font-medium">
                                    Projects Posted</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-xs font-medium text-center justify-center ">
                        <div class=" mt-4 text-black font-bold text-lg"> About Me </div>
                        <div class="flex mt-2 text-sm font-medium text-center justify-center">
                            <div class=" text-black">
                                {{ $bio->bio ?? 'No bio available.' }}
                            </div>
                        </div>
                    </div>
                    <div class="mr-10 mt-10 w-full ">
                        <div class="flex flex-row">
                            <h1 class="font-bold text-xl text-black py-2">Pinned Project Showcase</h1>

                        </div>
                        <div class="flex  animate-blink animation-delay-100">
                            <div class="grid gap-4 grid-cols-3 flex-col w-full ">
                                @foreach ($pinnedProjects as $pinnedProject)
                                    <div
                                         class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#D4D4D4] rounded-lg shadow-lg">
                                        <div class="absolute right-0 top-0 z-20">

                                            {{-- <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#909090] hover:text-[#006634]  "onclick="toggleModal('modal-idEditShowcase')">
                                                <path d=" M7.127 22.562l-7.127 1.438 1.438-7.128 5.689
                                                        5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816
                                                        2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button> --}}
                                        </div>

                                        <div class="relative">
                                            <div class="text-xl font-bold text-[#006634]">

                                                <div>
                                                    <div class="flex flex-row gap-1">
                                                        <button class="hover:text-[#004423]">
                                                            ·
                                                            {{ $pinnedProject->project->project ?? 'Project Name Not Available' }}
                                                        </button>
                                                        {{-- <form action="{{ route('pinnedProjects.remove', $pinnedProject->id) }}"
                                                              method="POST"
                                                              class="inline-block">
                                                            @csrf
                                                            <button type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     x="0px"
                                                                     y="0px"
                                                                     width="14"
                                                                     height="14"
                                                                     viewBox="0 0 30 30"
                                                                     class="fill-current mx-auto my-auto text-[#909090] opacity-80 hover:text-[#ff0000]">
                                                                    <path
                                                                          d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form> --}}
                                                    </div>
                                                    <div class="py-3 text-sm font-medium text-black items-start w-11/12">
                                                        {{ $pinnedProject->project->description ?? 'No description available' }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if (count($pinnedProjects) < 3)
                                    <div
                                         class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#D4D4D4] rounded-lg shadow-lg">
                                        <div class="my-auto p-4 mx-auto">
                                            @if (count($pinnedProjects) == 0)
                                                <div>No Projects</div>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                @endif

                            </div>

                            {{-- Add Button for Projects --}}

                            {{-- <div class="flex flex-col w-full">
                                <div class="relative flex flex-wrap w-full items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#D4D4D4] rounded-lg  shadow-lg hover:bg-gray-200 "
                                    onclick="toggleModal('modal-idAddShowcase')">

                                    <div class="justify-center mx-auto max-y-md max-w-lg flex items-center ">
                                        <div class="  justify-center mx-auto max-y-md max-w-lg flex items-center">
                                            <div class="text-xl font-bold  opacity-70">
                                                <button class="p-4 fill-current text-[#909090] hover:text-[#006634]">

                                                    <!DOCTYPE svg
                                                        PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                                    <svg enable-background="new 0 0 512 512" height="18px" id="Layer_1"
                                                        version="1.1" viewBox="0 0 512 512" width="18px"
                                                        xml:space="preserve" onclick=""
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <path
                                                            d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button onclick="toggleModal('modal-idAddShowcase')"
                                class="text-sm font-medium text-black py-4 hover:text-[#006634] ">Customize
                            Showcase</button>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex animate-blink animation-delay-200">
                            <!-- Project section -->
                            <div class="flex flex-col w-full mr-2">
                                <div class="container mx-auto">
                                    <div
                                         class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-4 border border-[#939393] rounded-lg shadow-lg mb-2">
                                        <div class="relative">
                                            <div class="relative text-xl font-bold text-[#006634]">
                                                <div class="text-black">Project</div>
                                            </div>

                                            @forelse ($userProjects as $projects)
                                                <div class="flex flex-col">
                                                    <div class="flex items-center pb-1">
                                                        <div
                                                             class="flex items-center justify-center rounded-lg w-12 h-12 bg-gray-200">
                                                            <x-icon icon="notebook" />
                                                        </div>

                                                        <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                            <div class="font-bold text-base">
                                                                {{ $projects->project }}
                                                            </div>

                                                            <div class="font-normal text-sm">{{ $projects->description }}
                                                            </div>

                                                            <div class="flex flex-row">
                                                                <p class="flex text-xs font-normal opacity-70 pr-1">Start
                                                                    Date:
                                                                    {{ \Carbon\Carbon::parse($projects->date_started)->format('d/m/Y') }}
                                                                    |</p>
                                                                <p class="flex text-xs font-normal opacity-70">End Date:
                                                                    {{ $projects->date_ended ? \Carbon\Carbon::parse($projects->date_ended)->format('d/m/Y') : 'Not set' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>No projects found.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Skills section -->
                            <div class="flex flex-col w-full">
                                <div
                                     class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-4 border border-[#939393] rounded-lg shadow-lg">
                                    <div class="relative w-full">
                                        <div class="relative text-xl font-bold text-[#006634]">
                                            <div class="text-black">Skills</div>
                                        </div>

                                        @forelse ($userSkills as $skills)
                                            <div class="flex flex-col">
                                                <div class="flex items-center pb-1  ">
                                                    <div
                                                         class="flex mr-3 items-center justify-center rounded-lg w-12 h-12 bg-gray-200">
                                                        <x-icon icon="wrench" />

                                                    </div>

                                                    <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                        <div class="font-bold text-base">
                                                            {{ $skills->skills }}
                                                        </div>
                                                        <div class="font-normal text-sm">{{ $skills->description }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>No Skills found.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row w-full mt-4 space-x-4">
                            <!-- Academics section -->
                            <div
                                 class="w-1/2 relative flex flex-wrap items-start space-x-3 py-[1.8rem] px-4 border border-[#939393] rounded-lg mb-2 shadow-lg">
                                <div class="relative w-full">
                                    <div class="relative text-xl font-bold text-[#006634]">
                                        <div class="text-black">Academics</div>
                                    </div>

                                    @forelse ($userAcademics as $academics)
                                        <div class="flex flex-col mt-2">
                                            <div class="flex items-center pb-1">
                                                <div
                                                     class="flex items-center justify-center rounded-lg w-12 h-12 bg-gray-200">

                                                    <x-icon icon="acads" />
                                                </div>

                                                <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                    <div class="font-bold text-base">
                                                        {{ $academics->academics }}
                                                        {{ $academics->education_insitution }}
                                                    </div>

                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Course: </h1>
                                                        {{ $academics->course }}
                                                    </div>

                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Major: </h1>
                                                        {{ $academics->major }}
                                                    </div>

                                                    <div class="flex flex-row">
                                                        <p class="flex text-xs font-normal opacity-70 pr-1">Start Date:
                                                            {{ \Carbon\Carbon::parse($academics->date_started)->format('d/m/Y') }}
                                                            | </p>
                                                        <p class="flex text-xs font-normal opacity-70">End Date:
                                                            {{ $academics->date_ended ? \Carbon\Carbon::parse($academics->date_ended)->format('d/m/Y') : 'Not set' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Academics found.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Awards and Honors section -->
                            <div
                                 class="w-1/2 relative flex flex-wrap items-start space-x-3 py-[1.8rem] px-4 border border-[#939393] rounded-lg mb-2 shadow-lg">
                                <div class="relative w-full">
                                    <div class="relative text-xl font-bold text-[#006634]">
                                        <div class="text-black">Honors and Awards</div>
                                    </div>

                                    @forelse ($userHonorsAndAwards as $honorsandawards)
                                        <div class="flex flex-col mt-2">
                                            <div class="flex items-center pb-1">
                                                <div
                                                     class="flex items-center justify-center rounded-lg w-12 h-12 bg-gray-200">

                                                    <x-icon icon="certs" />
                                                </div>

                                                <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                    <div class="font-bold text-base">
                                                        {{ $honorsandawards->honorsandawards }}
                                                        {{ $honorsandawards->title }}
                                                    </div>

                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Issuer: </h1>
                                                        {{ $honorsandawards->issuer }}
                                                    </div>

                                                    <div class="font-normal text-sm">
                                                        {{ $honorsandawards->description }}
                                                    </div>

                                                    <div class="flex flex-row">
                                                        <p class="flex text-xs font-normal opacity-70 pr-1">Date Issued:
                                                            {{ \Carbon\Carbon::parse($honorsandawards->date_issue)->format('d/m/Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Honors and Awards found.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-7 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />

                    @forelse ($userPosts as $post)
                        <div class="py-1 px-40">
                            <div class="w-full mb-4 relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                                @auth
                                    @if ($post->user_id === Auth::user()->id)
                                        <div class="post relative">
                                            <div class="absolute right-0 top-0 z-20">
                                                <div class="p-4">

                                                    <button class="editButton">
                                                        <label for="file_input"
                                                               class="cursor-pointer shadow-md rounded-full opacity-70">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 fill="#000000"
                                                                 height="20"
                                                                 width="20"
                                                                 version="1.1"
                                                                 id="Capa_1"
                                                                 viewBox="0 0 32.055 32.055"
                                                                 xml:space="preserve">
                                                                <g>
                                                                    <path
                                                                          d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967   C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967   s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967   c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z" />
                                                                </g>
                                                            </svg>
                                                        </label>
                                                    </button>

                                                </div>
                                                <div
                                                     class="editMenu hidden absolute bg-white space-x-2 py-2 px-5 border border-[#D4D4D4] rounded-lg shadow-lg w-55 transform translate-y-full bottom-5 left-1/2 -translate-x-1/2 z-10">
                                                    <ul class="text-sm font-semibold text-black w-auto">
                                                        <div class="flex flex-row hover:text-[#0066FF]"
                                                             onclick="toggleModal('modal-idPostEditText-{{ $post->id }}')">
                                                            <button class="py-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     width="14"
                                                                     height="14"
                                                                     viewBox="0 0 24 24"
                                                                     class="fill-current opacity-80">
                                                                    <path
                                                                          d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                                </svg>
                                                            </button>
                                                            <div class="ml-2 mr-2">
                                                                <button type="submit"
                                                                        class="py-2">Edit</button>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-row hover:text-[#FF0000]"
                                                             onclick="toggleModal('modal-idPostDelete-{{ $post->id }}')">
                                                            <button type="submit"
                                                                    class="py-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     x="0px"
                                                                     y="0px"
                                                                     width="14"
                                                                     height="14"
                                                                     viewBox="0 0 30 30"
                                                                     class="fill-current opacity-80">
                                                                    <path
                                                                          d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                            <div class="ml-2 mr-2">
                                                                <button type="submit"
                                                                        class="py-2">Delete</button>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endauth

                                <div class="flex flex-grow items-center mt-3">
                                    <div class="w-12 h-12 rounded-full mr-2">
                                        <div class="relative group">
                                            @if ($user->image)
                                                <div class="mt-2">
                                                    <img src="/api/placeholder/48/48"
                                                         data-src="{{ asset('storage/' . $post->user->image) }}"
                                                         alt="{{ $post->user->name }}'s Profile Image"
                                                         class="w-full h-full rounded-full object-cover lazyload">
                                                </div>
                                            @else
                                                <img src="{{ asset('image/default-profile.png') }}"
                                                     alt="Profile"
                                                     class="w-full h-full rounded-full object-cover">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="text-sm font-bold text-black flex flex-col">
                                        <div class="flex items-center">
                                            <span>{{ $post->user->name }}</span>

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 fill="{{ $post->user->badge == 'Gold' ? '#FFD700' : ($post->user->badge == 'Silver' ? '#9a9a9a' : ($post->user->badge == 'Bronze' ? '#964B00' : '#f0f0f0')) }}"
                                                 height="22"
                                                 width="22"
                                                 version="1.1"
                                                 id="Capa_1"
                                                 viewBox="0 0 296.084 296.084"
                                                 xml:space="preserve"
                                                 {{ $attributes->merge(['class' => 'shadow-xl']) }}>
                                                <g>
                                                    <path
                                                          d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689 C168.709,77.51,180.064,80.221,191.27,84.676z" />
                                                    <path
                                                          d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428 c11.508-4.574,24.302-7.307,36.302-8.045V0z" />
                                                    <path
                                                          d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334 c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627 c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z" />
                                                    <path
                                                          d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627 c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="text-xs font-semibold opacity-70">
                                            {{ $post->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>

                                <div class="py-4 text-black">{{ $post->user_posts }}</div>
                                {{-- Check if the post has an image and display it --}}
                                @if ($post->image_path)
                                    <div class="mt-2">
                                        <img src="/api/placeholder/48/48"
                                             data-src="{{ asset('storage/' . $post->image_path) }}"
                                             alt="Post Image"
                                             class="w-auto h-64 rounded-lg lazyload">
                                    </div>
                                @else
                                @endif
                                {{-- Display Post Category --}}
                                <p class="mt-2 text-gray-600">Category: {{ $post->category }}</p>

                                <div class="flex flex-row items-start justify-start">
                                    <!-- Heart Reaction Feature -->
                                    <button onclick="toggleReaction({{ $post->id }}, this)"
                                            class="flex flex-row justify-center items-center text-s mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="23"
                                             height="23"
                                             viewBox="0 0 47.5 47.5"
                                             id="heart">
                                            <defs>
                                                <clipPath id="a">
                                                    <path d="M0 38h38V0H0v38Z" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#a)"
                                               transform="matrix(1.25 0 0 -1.25 0 47.5)">
                                                <path class="heart-path {{ $post->user_reacted ? 'reacted' : '' }}"
                                                      fill="{{ $post->user_reacted ? '#FF0000' : '#C6C6C6' }}"
                                                      d="M3.067 25.68c0 8.799 12.184 12.06 15.933 1.874 3.749 10.186 15.933 6.925 15.933-1.874C34.933 16.12 19 3.999 19 3.999S3.067 16.12 3.067 25.68" />
                                            </g>
                                        </svg>
                                        <div
                                             class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            <span class="reaction-count">{{ $post->reaction_count }}</span>
                                        </div>
                                    </button>

                                </div>

                                <hr class="my-4 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />

                                <!-- Example Comment -->
                                <div>
                                    <!-- (Error Comment ) -->
                                    @if ($post->comments->isNotEmpty())
                                        @foreach ($post->comments as $comment)
                                            <div class="flex items-center py-2">
                                                <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
                                                    <label for="file_input"
                                                           class="cursor-pointer w-full h-full">
                                                        @if ($comment->user->image)
                                                            <img src="/api/placeholder/48/48"
                                                                 data-src="{{ asset('storage/' . $comment->user->image) }}"
                                                                 alt="Profile"
                                                                 class="w-full h-full rounded-full object-cover lazyload">
                                                        @else
                                                            <img src="{{ asset('image/default-profile.png') }}"
                                                                 alt="Profile"
                                                                 class="w-full h-full rounded-full object-cover">
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="text-sm font-bold text-black">
                                                    <div class="flex">
                                                        {{ $comment->user->name }}
                                                        <!-- Display the name of the comment's user -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             fill="{{ $comment->user->badge == 'Gold' ? '#FFD700' : ($comment->user->badge == 'Silver' ? '#9a9a9a' : ($comment->user->badge == 'Bronze' ? '#964B00' : '#f0f0f0')) }}"
                                                             height="22"
                                                             width="22"
                                                             version="1.1"
                                                             id="Capa_1"
                                                             viewBox="0 0 296.084 296.084"
                                                             xml:space="preserve"
                                                             {{ $attributes->merge(['class' => 'shadow-xl']) }}>
                                                            <g>
                                                                <path
                                                                      d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689 C168.709,77.51,180.064,80.221,191.27,84.676z" />
                                                                <path
                                                                      d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428 c11.508-4.574,24.302-7.307,36.302-8.045V0z" />
                                                                <path
                                                                      d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334 c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627 c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z" />
                                                                <path
                                                                      d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627 c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="text-sm font-medium text-black">{{ $comment->content }}
                                                    </div> <!-- Display comment content -->
                                                    {{-- <div class="flex flex-row py-1">
                                                        <button class="flex flex-row text-xs opacity-70" onclick="toggleReply()">Reply</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        {{-- <p>No comments yet.</p> --}}
                                    @endif

                                    <!-- Reply Input (Initially Hidden) -->
                                    <div class="flex flex-col mt-4 mb-4 hidden"
                                         id="replyInput">
                                        <div class="flex pl-10">
                                            <div class="w-7 h-7 rounded-full mr-1 flex-row">
                                                <div class="relative group">
                                                    <label for="file_input"
                                                           class="cursor-pointer">
                                                        <img src="image/dog.jpg"
                                                             alt="Profile"
                                                             class="w-full h-full rounded-full object-cover">
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="replyInput"
                                                 class="justify-center items-center flex-grow">
                                                <input type="text"
                                                       placeholder="Reply"
                                                       class="outline-none justify-center items-center text-xs w-full py-2 px-3 bg-gray-200 rounded-2xl">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    // Function to toggle reaction
                                    function toggleReaction(postId, element) {
                                        $.ajax({
                                            url: '/posts/' + postId + '/react',
                                            type: 'POST',
                                            data: {
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                // Update reaction count
                                                $(element).find('.reaction-count').text(response.count);

                                                // Toggle heart color
                                                if (response.reacted) {
                                                    $(element).find('.heart-path').addClass('reacted').attr('fill', '#FF0000');
                                                } else {
                                                    $(element).find('.heart-path').removeClass('reacted').attr('fill', '#C6C6C6');
                                                }
                                            },
                                            error: function() {
                                                alert('An error occurred. Please try again.');
                                            }
                                        });
                                    }

                                    function postComment(postId) {
                                        let commentContent = document.getElementById('commentInput' + postId).value;

                                        $.ajax({
                                            url: '/posts/' + postId + '/comments',
                                            type: 'POST',
                                            data: {
                                                _token: '{{ csrf_token() }}',
                                                content: commentContent
                                            },
                                            success: function(response) {
                                                let commentsContainer = $('#commentsContainer' + postId);
                                                commentsContainer.prepend(`
                                                     <div class="flex items-start mt-2">
                                                       <div class="w-10 h-10 rounded-full  overflow-hidden shadow-lg mr-2">
                                                            <img src="image/Kersch.png" alt="Profile" class="w-full h-full object-cover">
                                                        </div>
                                                        <div class="text-sm font-medium text-black">
                                                            ${response.user}
                                                            <div>${response.content}</div>
                                                            <div class="text-xs opacity-70">Just Now</div>
                                                        </div>
                                                    </div>
                                                `);

                                                // Clear the comment input field
                                                document.getElementById('commentInput' + postId).value = '';
                                            },
                                            error: function() {
                                                alert('An error occurred. Please try again.');
                                            }
                                        });
                                    }


                                    // Function to toggle reply input visibility
                                    function toggleReply() {
                                        let replyInput = document.getElementById('replyInput');
                                        if (replyInput.style.display === 'none' || replyInput.style.display === '') {
                                            replyInput.style.display = 'flex';
                                        } else {
                                            replyInput.style.display = 'none';
                                        }
                                    }
                                </script>

                                <style>
                                    .heart-path.reacted {
                                        fill: #FF0000;
                                    }
                                </style>

                                <div class=" flex items-center mt-2">

                                    <div class="w-10 h-10 rounded-full mr-2  ">
                                        <div class="relative group">
                                            <label for="file_input"
                                                   class="cursor-pointer">

                                                @if ($authUser->image)
                                                    <div class="mt-2">
                                                        <img src="/api/placeholder/48/48"
                                                             data-src="{{ asset('storage/' . $authUser->image) }}"
                                                             alt="{{ $authUser->name }}'s Profile Image"
                                                             class="w-full h-full rounded-full object-cover lazyload">
                                                    </div>
                                                @else
                                                    <img src="{{ asset('image/default-profile.png') }}"
                                                         alt="Profile"
                                                         class="w-full h-full rounded-full object-cover">
                                                @endif
                                            </label>

                                        </div>

                                    </div>

                                    <div class="flex-grow">
                                        <input type="text"
                                               id="commentInput{{ $post->id }}"
                                               placeholder="Add a comment..."
                                               class="outline-none text-xs w-full py-2 px-3 bg-gray-200 rounded-2xl">
                                    </div>
                                    <x-button id="postButton"
                                              type="secondary"
                                              onclick="postComment({{ $post->id }})">
                                        Post
                                    </x-button>

                                </div>

                            </div>
                        </div>
                    @empty
                        <p></p>
                    @endforelse

                </div>

            </div>
        </div>

        @include('modal.modalPanels')

    @endsection
</section>
