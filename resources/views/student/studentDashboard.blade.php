@extends('layouts.app')
@section('webtitle')
    Dashboard
@endsection
@section('content')
    {{-- @include('modal/Interest')  --}}
    <section class="h-screen bg-[#F8F8F8]">
        <div class="flex row min-h-full justify-center relative">
            <div class=" mt-24 flex mx-auto max-w-[90rem]">
                <div class="flex flex-row ">
                    <div class="flex sticky top-10 flex-col w-2/5 ml-10 mr-10 animate-blink">
                        <div class="sticky top-20">
                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 p-6 border border-[#D4D4D4] rounded-xl shadow-lg ">
                                <div class="justify-center items-center mx-auto max-y-md max-w-lg flex ">
                                    <div class="justify-center mx-auto max-y-md max-w-lg w-auto ">
                                        <div class=" container">
                                            <img src='/image/profileBG.png'
                                                class="w-full h-[8rem] object-cover rounded-xl " />
                                        </div>
                                        <div
                                            class="  justify-center mx-auto max-w-lg flex-col flex items-center  -translate-y-[3rem]">
                                            <label for="file_input" class="cursor-pointer shadow-md rounded-full">
                                                <img src="image/dog.jpg" alt="Profile"
                                                    class="rounded-full object-cover w-20 h-20  ">
                                            </label>
                                            <div class="w-full mt-2">
                                                <div
                                                    class="flex text-sm text-black font-bold items-center justify-center w-full mx-auto max-w-lg truncate">
                                                    {{ Auth::user()->name }}
                                                    <div class="ml-1">
                                                        <div class="items-start text-start">
                                                            <x-ri-medal-fill class="w-5 h-5 text-[#EBC351]" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-center text-xs font-medium">
                                                    Bacolod City
                                                </div>
                                            </div>
                                            <div
                                                class="flex flex-row w-full  items-center text-[#006634] font-bold text-xl mt-10">
                                                <div class="mr-20 items-center text-center  ">
                                                    {{ $connectedStudentsCount }}
                                                    <div
                                                        class="text-xs font-regular text-center text-[#444444] font-medium">
                                                        Student Connected
                                                    </div>
                                                </div>
                                                <div class="mx-auto items-center text-center">
                                                    {{ $points }}
                                                    <div
                                                        class="text-xs font-regular text-center text-[#444444] font-medium">
                                                        Points Garnered
                                                    </div>
                                                </div>
                                                <div class="ml-20 items-center text-center">
                                                    {{ $projectCount }}
                                                    <div
                                                        class="text-xs font-regular text-center text-[#444444] font-medium">
                                                        Projects Posted
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <x-button id="viewProfileBtn" type="primary">
                                            View Profile
                                        </x-button>
                                        <script>
                                            document.getElementById("viewProfileBtn").addEventListener("click", function() {
                                                window.location.href = "{{ route('student.studentProf') }}";
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div
                            class="w-full relative flex flex-wrap items-start space-x-3 p-6 border border-[#D4D4D4] rounded-xl shadow-lg mt-5 ">
                            <div class="w-full ">
                                <div class="justify-center mx-auto max-w-lg w-auto ">

                                    <div class="font-bold text-black justify-center text-center">
                                        Top 3 Students
                                        <div class="font-medium text-xs text-[#444444]">That has Garnered Points</div>
                                    </div>
                                    
                                    <div class="flex flex-col w-full  items-start text-[#006634] font-bold text-xl  ">
                                        
                                        @foreach ($topUsers as $index => $topUser)
                                        <div class="flex flex-row w-full">
                                            
                                            <div class=" items-center text-start  pt-6 w-full flex flex-row">
                                                <div class="items-start text-start flex flex-row">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#EBC351" height="30" width="30" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class=" ">
                                                        <g>
                                                            <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                            <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                            <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                            <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                        </g>
                                                        </svg>
                                                </div>

                                                <div class="w-10 h-10 rounded-full mx-4 shadow-lg">
                                                    <div class="relative group">
                                                        <label for="file_input" class="cursor-pointer">
                                                            <img src="image/dog.jpg" alt="Profile"
                                                                class="w-full h-full rounded-full object-cover">
                                                        </label>


                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="w-full mt-4">
                                            <div class="flex justify-center items-center">
                                                <button type="button" id="viewLeaderboardBtn"
                                                    class="text-black text-sm hover:text-[#006634]">
                                                    View More...
                                                </button>
                                                
                                                <div class=" flex flex-row text-xs text-black flex-wrap">
                                                    {{ $topUser->name }} </div>
                                                <div class="ml-auto flex flex-col">
                                                    {{ $topUser->points }}
                                                    <div
                                                        class="flex flex-row justify-end font-normal text-[#444444] text-xs">
                                                        Points</div>
                                                </div>
                                          

                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById("viewLeaderboardBtn").addEventListener("click", function() {
                                                window.location.href = "{{ route('student.studentLeaderboard') }}";
                                            });
                                        </script>
                                    </div>
                                </div>`
                            </div>
                        </div>
                    </div>
                    <div class="z-20 flex flex-col animate-blink animation-delay-100 w-6/12">
                        <div class="w-full relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                            <div class=" flex items-center">
                                <div class="w-12 h-12 rounded-full mr-2  ">
                                    <div class="relative group">
                                        <label for="file_input" class="cursor-pointer">
                                            <img src="image/dog.jpg" alt="Profile"
                                                class="w-full h-full rounded-full object-cover">
                                        </label>
                                    </div>
                                </div>
                                <div class=" flex-grow">
                                    <button type="" class=" text-sm w-full py-2 px-3 bg-gray-200 rounded-2xl "
                                        onclick="toggleModal('modal-idPostText')" placeholder="Share something...">
                                        <div class="text-start opacity-60">
                                            Share your thoughts...
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-row w-full  items-center text-[#006634] font-bold text-xl mt-6 ">
                                <button class="mr-auto" onclick="toggleModal('')">
                                    <div class=" items-center text-center flex px-8 ">
                                        <x-bi-image-fill class="text-[#D40000] w-6 h-6" />
                                        <div class="text-sm text-center text-[#D40000] font-bold flex px-2"
                                            {{-- onclick="toggleModal('modal-idPostImage')" --}}>
                                            Image
                                        </div>
                                    </div>
                                </button>
                                <button class="mx-auto">
                                    <div class=" items-center text-center flex px-8 text-[#424242]">
                                        <x-ionicon-document-sharp class="h-6 w-6 text-[#424242]" />
                                        <div class="text-sm text-center  font-bold flex px-2" {{-- onclick="toggleModal('modal-idPostDocument')" --}}>
                                            Document
                                        </div>
                                    </div>
                                </button>
                                <div class="ml-auto">
                                    <div class=" items-center justify-center text-center flex px-8 text-[#0066FF]">
                                        <x-eva-video class="w-6 h-6 text-[#0066FF] " />
                                        <div class="text-sm text-center font-bold flex px-2">
                                            Video
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-7 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />
                        @forelse ($userPosts as $post)
                            <div class="w-full mb-4 relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                                @auth
                                    @if ($post->user_id === Auth::user()->id)
                                        <div class="post relative">
                                            <div class="absolute right-0 top-0 z-20">
                                                <div class="p-4">
                                                    <button class="editButton">
                                                        <label for="file_input"
                                                            class="cursor-pointer shadow-md rounded-full opacity-70">
                                                            <x-bi-three-dots class="text-[#000000] w-7 h-7" />
                                                        </label>
                                                    </button>
                                                </div>
                                                <div
                                                    class="editMenu hidden absolute bg-white space-x-2 py-2 px-5 border border-[#D4D4D4] rounded-lg shadow-lg w-55 transform translate-y-full bottom-5 left-1/2 -translate-x-1/2 z-10">
                                                    <ul class="text-sm font-semibold text-black w-auto">
                                                        <div class="flex flex-row hover:text-[#0066FF]"
                                                            onclick="toggleModal('modal-idPostEditText-{{ $post->id }}')">
                                                            <button class="py-2">
                                                                <x-heroicon-s-pencil class="w-5 h-5" />
                                                            </button>
                                                            <div class="ml-2 mr-2">
                                                                <button type="submit" class="py-2">Edit</button>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-row hover:text-[#FF0000]"
                                                            onclick="toggleModal('modal-idPostDelete-{{ $post->id }}')">
                                                            <button type="submit" class="py-2">
                                                                <x-heroicon-s-trash class="w-5 h-5" />
                                                            </button>
                                                            <div class="ml-2 mr-2">
                                                                <button type="submit" class="py-2">Delete</button>
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
                                            <img src="{{ asset('image/dog.jpg') }}" alt="Profile"
                                                class="w-full h-full rounded-full object-cover">
                                        </div>
                                    </div>
                                    <div class="text-sm font-bold text-black flex flex-col">
                                        <div class="flex items-center">
                                            <span>{{ $post->user->name }}</span>
                                            <x-ri-medal-fill class="w-5 h-5 text-[#EBC351]" />
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
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image"
                                            class="w-full h-auto rounded-lg">
                                    </div>
                                @else
                                @endif
                                {{-- Display Post Category --}}
                                <p class="mt-2 text-gray-600">Category: {{ $post->category }}</p>
                                <div class="flex flex-row items-start justify-start">
                                    <!-- Heart Reaction Feature -->
                                    <button onclick="toggleReaction({{ $post->id }}, this)"
                                        class="flex flex-row justify-center items-center text-s mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                            viewBox="0 0 47.5 47.5" id="heart">
                                            <defs>
                                                <clipPath id="a">
                                                    <path d="M0 38h38V0H0v38Z" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#a)" transform="matrix(1.25 0 0 -1.25 0 47.5)">
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
                                            <div class="flex items-center mt-2 ">
                                                <div>
                                                    <div class="w-9 h-9 rounded-full overflow-hidden shadow-lg mr-2">
                                                        <label for="file_input" class="cursor-pointer w-full h-full">
                                                            <img src="image/Kersch.png" alt="Profile"
                                                                class="w-full h-full object-cover">
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="text-sm font-bold text-black bg-gray-200 rounded-lg p-2">
                                                    <div class="flex">
                                                        {{ $comment->user->name }}
                                                        <!-- Display the name of the comment's user -->
                                                        <x-ri-medal-fill class="w-5 h-5 text-[#7A601D]" />
                                                    </div>
                                                    <div class="text-sm font-medium text-black">{{ $comment->content }}
                                                    </div> <!-- Display comment content -->
                                                    {{-- <div class="flex flex-row py-1">

                                                    <div class="text-sm font-medium text-black">{{ $comment->content }}</div> <!-- Display comment content -->

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
                                    <div class="flex flex-col mt-4 mb-4 hidden" id="replyInput">
                                        <div class="flex pl-10">
                                            <div class="w-7 h-7 rounded-full mr-1 flex-row">
                                                <div class="relative group">
                                                    <label for="file_input" class="cursor-pointer">
                                                        <img src="image/dog.jpg" alt="Profile"
                                                            class="w-full h-full rounded-full object-cover">
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="replyInput" class="justify-center items-center flex-grow">
                                                <input type="text" placeholder="Reply"
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
                                        event.preventDefault();
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
                                                        <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
                                                            <img src="image/Kersch.png" alt="Profile" class="w-full h-full object-cover">
                                                        </div>
                                                        <div class="text-sm font-medium text-black bg-gray-200 rounded-md">
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
                                <div class=" flex items-center mt-2 ">
                                    <div class="w-9 h-9 rounded-full mr-2  ">
                                        <div class="relative group">
                                            <label for="file_input" class="cursor-pointer">
                                                <img src="image/dog.jpg" alt="Profile"
                                                    class="w-full h-full rounded-full object-cover">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex-grow mr-2">
                                        <input type="text" id="commentInput{{ $post->id }}"
                                            placeholder="Add a comment..."
                                            class="outline-none text-xs w-full py-2 px-3 bg-gray-200 rounded-lg">
                                    </div>
                                    <x-button id="postButton" type="secondary"
                                        onclick="postComment({{ $post->id }})">
                                        Post
                                    </x-button>
                                </div>
                            </div>
                        @empty
                            <p></p>
                        @endforelse
                    </div>
                    <div class="flex flex-col w-2/5 ml-10 mr-10 z-20 animate-blink animation-delay-200">
                        <div class="sticky top-20">
                            <div
                                class="w-full relative flex flex-col items-start  p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                                <div>
                                    <p class="flex-grow flex-col  ext-lg font-bold text-black"> Suggested Students
                                    </p>
                                    @foreach ($studentInterest as $student)
                                        <div class="flex mt-3">
                                            <div>
                                                <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg">
                                                    <div class="relative group">
                                                        <label for="file_input" class="cursor-pointer">
                                                            @if ($student->profile_image)
                                                                <img src="{{ $student->profile_image }}" alt="Profile"
                                                                    class="w-full h-full object-cover">
                                                            @else
                                                                <img src="{{ asset('image/default-profile.png') }}"
                                                                    alt="Profile"
                                                                    class="w-full h-full object-cover bg-gray-300">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow flex-col ml-2 text-sm font-bold text-black">
                                                <div class="flex">
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                    <div class="ml-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#B7B7B7"
                                                            height="18" width="18" version="1.1"
                                                            viewBox="0 0 296.084 296.084" class="shadow-xl">
                                                            <!-- SVG content -->
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="text-xs font-semibold text-black opacity-45">
                                                    Interests:
                                                    {{ $student->interests->pluck('interest_name')->join(', ') }}
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-center my-auto">
                                                @php
                                                    $friendRequest = \App\Models\FriendRequest::where(function (
                                                        $query,
                                                    ) use ($student) {
                                                        $query
                                                            ->where('sender_id', auth()->id())
                                                            ->where('receiver_id', $student->id);
                                                    })
                                                        ->orWhere(function ($query) use ($student) {
                                                            $query
                                                                ->where('receiver_id', auth()->id())
                                                                ->where('sender_id', $student->id);
                                                        })
                                                        ->first();
                                                @endphp
                                                @if ($friendRequest && $friendRequest->status === 'accepted')
                                                    <form action="{{ route('friend-request.unfriend', $student->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class=" inline-flex items-center rounded-md bg-[#006634] px-4 py-2 text-xs font-bold text-white whitespace-nowrap">
                                                            Unfriend
                                                        </button>
                                                    </form>
                                                @elseif($friendRequest && $friendRequest->status === 'pending' && $friendRequest->receiver_id === auth()->id())
                                                    <form action="{{ route('friendRequest.accept', $friendRequest->id) }}"
                                                        method="POST" class="inline-block">
                                                        @csrf
                                                        <button type="submit"
                                                            class=" inline-flex items-center rounded-md bg-[#006634] px-4 py-2 text-xs font-bold text-white whitespace-nowrap">
                                                            Accept
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('friendRequest.reject', $friendRequest->id) }}"
                                                        method="POST" class="inline-block">
                                                        @csrf
                                                        <button type="submit"
                                                            class=" inline-flex items-center rounded-md bg-[#006634] px-4 py-2 text-xs font-bold text-white whitespace-nowrap">
                                                            Reject
                                                        </button>
                                                    </form>
                                                @elseif($friendRequest && $friendRequest->status === 'pending' && $friendRequest->sender_id === auth()->id())
                                                    <button disabled
                                                        class=" inline-flex items-center rounded-md bg-[#006634] px-4 py-2 text-xs font-bold text-white whitespace-nowrap">
                                                        Pending
                                                    </button>
                                                @else
                                                    <form action="{{ route('friend-request.send', $student->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class=" inline-flex items-center rounded-md bg-[#006634] px-4 py-2 text-xs font-bold text-white whitespace-nowrap">
                                                            Connect +
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div
                                class="w-full relative flex flex-col items-start  p-6 border border-[#D4D4D4] rounded-xl shadow-lg mt-5">
                                <div class="max-y-md max-w-lg flex">
                                    <div class="max-y-md max-w-lg w-full font-bold text-black">
                                        Posts by Suggested Students
                                        <div class="flex mt-3 ">
                                            <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg">
                                                <div class="relative group">
                                                    <label for="file_input" class="cursor-pointer ">
                                                        <img src="image/Kersch.png" alt="Profile"
                                                            class="w-full h-full object-cover">

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="flex-grow flex-col ml-4 text-sm font-bold text-black ">
                                                <div>Kerschtine Billones</div>
                                                <div class="text-xs font-semibold text-black opacity-45"> Kerschtine Posted
                                                    an
                                                    Image!
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-center ml-3 ">
                                                <div class="text-xs font-bold  ">
                                                    <div class="w-14 h-14">
                                                        <img src="image/art.jpg" alt=""
                                                            class=" rounded-lg object-cover mb-2 border border-[#D4D4D4] shadow-lg ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</section>
