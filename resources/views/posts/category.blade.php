@extends('layouts.app')
@section('webtitle')
    Posts
@endsection

@section('content')
    {{-- @include('modal/Interest')  --}}
    <div class="mt-24">
        @if ($category)
            <div class="w-full text-center text-black">Based on your search: <span
                      class="font-bold">"{{ $category }}"</span></div>
        @else
            Nothing
        @endif

        @forelse ($userPosts as $post)

            <div class="flex px-[30rem] mt-4">
                <div class="w-full  relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">

                    @auth
                        @if ($post->user_id === Auth::user()->id)
                            <div class="post relative">
                                <div class="absolute right-0 top-0 z-20">
                                    <div class="p-4">

                                        <button class="editButton">
                                            <label class="cursor-pointer shadow-md rounded-full opacity-70">
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
                            {{-- line385 --}}
                            @if ($post->user->image)
                                <div class="mt-2">
                                    <img src="/api/placeholder/48/48"
                                         data-src="{{ asset('storage/' . $post->user->image) }}"
                                         alt="{{ $post->user->name }}'s Profile Image"
                                         class="w-full h-full rounded-full object-cover lazyload">
                                </div>
                            @else
                                <div class="bg-[#e1e1e1] rounded-full">
                                    <img src="{{ asset('image/default-profile.png') }}"
                                         alt="Profile"
                                         class="w-full h-full rounded-full object-cover"
                                         loading="lazy">
                                </div>
                            @endif
                        </div>

                        <div class="text-sm font-bold text-black flex flex-col">
                            <div class="flex items-center ">
                                <span>{{ $post->user->name }}</span>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="{{ $post->badge == 'Gold' ? '#FFD700' : ($post->badge == 'Silver' ? '#9a9a9a' : ($post->badge == 'Bronze' ? '#964B00' : '#000000')) }}"
                            height="15"
                            width="15"
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
                        </svg> --}}
                            </div>
                            <div class="text-xs font-semibold opacity-70">
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>

                    <div class="py-4 text-black">{{ $post->user_posts }}</div>
                    {{-- Check if the post has an image and display it --}}
                    @if ($post->image_path)
                        <div class="mt-2 ">
                            <img src="/api/placeholder/48/48"
                                 data-src="{{ asset('storage/' . $post->image_path) }}"
                                 alt="Post Image"
                                 class="w-full h-auto rounded-lg lazyload">
                        </div>
                    @else
                    @endif
                    {{-- Display Post Category --}}
                    <p class="mt-2 mb-2 text-sm text-gray-600">Category: {{ $post->category }}</p>

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
                            <div class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
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
                                <div class="flex items-center  py-2">
                                    <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
                                        <label for="file_input"
                                               class="cursor-pointer w-full h-full">
                                            @if ($comment->user->image)
                                                <img src="/api/placeholder/48/48"
                                                     data-src="{{ asset('storage/' . $comment->user->image) }}"
                                                     alt="Profile"
                                                     class="w-10 h-10 rounded-full object-cover lazyload">
                                            @else
                                                <div class="bg-[#e1e1e1] rounded-full">
                                                    <img src="{{ asset('image/default-profile.png') }}"
                                                         alt="Profile"
                                                         class="w-10 h-10 rounded-full object-cover"
                                                         loading="lazy">
                                                </div>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="text-sm font-bold text-black">
                                        <div class="flex">
                                            {{ $comment->user->name }}
                                            <!-- Display the name of the comment's user -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="#7A601D"
                                                 height="15"
                                                 width="15"
                                                 viewBox="0 0 296.084 296.084"
                                                 class="shadow-xl">
                                                <g>
                                                    <path
                                                          d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689C168.709,77.51,180.064,80.221,191.27,84.676z" />
                                                    <path
                                                          d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428c11.508-4.574,24.302-7.307,36.302-8.045V0z" />
                                                    <path
                                                          d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z" />
                                                    <path
                                                          d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="text-sm font-medium text-black">{{ $comment->content }}
                                        </div> <!-- Display comment content -->
                                        {{-- <div class="flex flex-row py-1">
                                    <button class="flex flex-row text-xs opacity-70"
                                            onclick="toggleReply()">Reply</button>
                                </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="w-full mx-auto text-center">No comments yet.</p>
                        @endif

                        <!-- Reply Input (Initially Hidden) -->
                        {{-- <div class="flex flex-col mt-4 mb-4 hidden"
                    id="replyInput">
                    <div class="flex pl-10">
                        <div class="w-7 h-7 rounded-full mr-1 flex-row">
                            <div class="relative group">
                                <label for="file_input"
                                    class="cursor-pointer">
                                    <img src="image/dog.jpg"
                                        alt="Profile"
                                        class="w-full h-full rounded-full object-cover" loading="lazy">
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
                </div> --}}
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
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
                                    @if ($user->image)
                                        <img src="/api/placeholder/48/48"
                                             data-src="{{ asset('storage/' . $user->image) }}"
                                             alt="Profile"
                                             class="w-full h-full rounded-full object-cover lazyload"
                                             loading="lazy">
                                    @else
                                        <div></div>
                                        <div class="bg-[#e1e1e1] rounded-full">
                                            <img src="{{ asset('image/default-profile.png') }}"
                                                 alt="Profile"
                                                 class="w-full h-full rounded-full object-cover"
                                                 loading="lazy">
                                        </div>
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="flex-grow mr-2">
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
            <p class="w-full text-center text-black py-4">No Comments Found</p>
        @endforelse

    </div>
