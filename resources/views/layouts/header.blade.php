<div class="fixed top-0 left-0 right-0 z-50  border-b bg-[#F8F8F8] border-[#D4D4D4] shadow-sm h-15">
    <div class="mx-auto max-w-[89rem] px-4 sm:px-6 lg:px-8 ">
        <div class="flex h-16 items-center justify-between ">
            <div class="flex items-center">
                <div class="block">
                    <button id="viewProfile" class="flex space-x-2 mr-12" onclick="toggle">
                        <img src='/image/logo.png' class="size-8 items-center" />
                        <div class="items-center justify-center m-auto text-sm font-bold text-[#006634]">
                            LASALLEFOLIO
                        </div>
                    </button>
                </div>
            </div>


            <div class="relative w-full">
                <form action="" method="GET" id="searchForm">
                    <input id="searchBar" name="query" type="text"
                        class="outline-none text-sm w-1/2 py-2 px-3 pl-10 border border-[#D4D4D4] rounded-2xl"
                        placeholder="Search">
                    <i class="absolute left-3 top-1/2 transform -translate-y-1/2 opacity-60">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 30 30">
                            <path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                            </path>
                        </svg>
                    </i>
                </form>
            
                <div id="searchResults"
                    class="absolute hidden left-0 transform mt-2 py-2 px-1 w-1/2 items-center justify-center bg-[#F8F8F8] border border-[#D4D4D4] rounded-lg">
                    <!-- Initially empty, will be populated by JavaScript -->
                </div>
            </div>
            
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchBar = document.getElementById('searchBar');
                const searchResults = document.getElementById('searchResults');
                const users = @json($authUser); // Pass users data from PHP to JavaScript
            
                searchBar.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const filteredUsers = users.filter(user => 
                        user.first_name.toLowerCase().includes(searchTerm) || 
                        user.last_name.toLowerCase().includes(searchTerm)
                    );
            
                    displayResults(filteredUsers);
                });
            
                function displayResults(users) {
                    searchResults.innerHTML = '';
                    if (users.length > 0) {
                        users.forEach(user => {
                            const userDiv = document.createElement('div');
                            userDiv.className = 'w-full py-2 px-4 rounded-xl hover:bg-[#efefef]';
                            userDiv.innerHTML = `
                                <div class="flex">
                                    <label class="cursor-pointer flex items-center justify-center">
                                        <img src="image/kersch.png" alt="Profile" class="rounded-full object-cover w-10 h-10">
                                        <div class="flex ml-4 text-md font-bold text-black truncate">
                                            <div>${user.first_name} ${user.last_name}</div>
                                        </div>
                                    </label>
                                </div>
                            `;
                            searchResults.appendChild(userDiv);
                        });
                        searchResults.classList.remove('hidden');
                    } else {
                        searchResults.classList.add('hidden');
                    }
                }
            
                // Hide results when clicking outside
                document.addEventListener('click', function(event) {
                    if (!searchBar.contains(event.target) && !searchResults.contains(event.target)) {
                        searchResults.classList.add('hidden');
                    }
                });
            });
            </script>
            <div class="flex">

                <div class="flex flex-row">

                    <div class="relative flex  ">

                        <button type="button" class="flex flex-col items-center mx-auto mr-8 " id="viewLeaderBoard">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#939393" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    fill="{{ request()->routeIs('student.studentLeaderboard') ? '#006634' : '#939393' }}"
                                    d="M5.166 2.621v.858c-1.035.148-2.059.33-3.071.543a.75.75 0 0 0-.584.859 6.753 6.753 0 0 0 6.138 5.6 6.73 6.73 0 0 0 2.743 1.346A6.707 6.707 0 0 1 9.279 15H8.54c-1.036 0-1.875.84-1.875 1.875V19.5h-.75a2.25 2.25 0 0 0-2.25 2.25c0 .414.336.75.75.75h15a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-2.25-2.25h-.75v-2.625c0-1.036-.84-1.875-1.875-1.875h-.739a6.706 6.706 0 0 1-1.112-3.173 6.73 6.73 0 0 0 2.743-1.347 6.753 6.753 0 0 0 6.139-5.6.75.75 0 0 0-.585-.858 47.077 47.077 0 0 0-3.07-.543V2.62a.75.75 0 0 0-.658-.744 49.22 49.22 0 0 0-6.093-.377c-2.063 0-4.096.128-6.093.377a.75.75 0 0 0-.657.744Zm0 2.629c0 1.196.312 2.32.857 3.294A5.266 5.266 0 0 1 3.16 5.337a45.6 45.6 0 0 1 2.006-.343v.256Zm13.5 0v-.256c.674.1 1.343.214 2.006.343a5.265 5.265 0 0 1-2.863 3.207 6.72 6.72 0 0 0 .857-3.294Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div class="text-xs flex relative font-normal ">LeaderBoard</div>
                        </button>
                    </div>



                    <div class="relative flex">
                        <button id="ReqButton" class="flex flex-col items-center mx-auto mr-8 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#939393"
                                class="w-6 h-6  ReqIcon">
                                <path fill-rule="evenodd"
                                    d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="text-xs flex relative font-normal truncate">Request</div>
                        </button>

                        <div id="ReqMenu"
                            class="absolute hidden bg-[#F8F8F8] p-1 border border-[#D4D4D4] turncate rounded-lg shadow-lg w-[25rem] transform translate-y-full  bottom-[-.5rem] left-1/4 -translate-x-[11.4rem] z-30">

                            <div class="flex flex-row justify-center items-center py-2 px-3 text-black mb-4 ">
                                <ul class="p-1 w-full  font-semibold ">
                                    <div class="text-black mb-4">Requesting to View</div>

                                    <div class="flex "> <label for="file_input"
                                            class="cursor-pointer flex  items-center justify-center ">
                                            <img src="image/Kersch.png" alt="Profile"
                                                class="rounded-full object-cover w-9 h-9">
                                            <div class="flex flex-col ml-4 text-sm font-bold text-black">
                                                <div>Kerschtine Billones</div>
                                                <div class="text-xs font-semibold text-black opacity-45">BSCS 3A
                                                    S.Y.
                                                    2023-2024 </div>
                                            </div>


                                        </label>
                                        <div class="ml-auto flex-row mr-2">
                                            <div class=" flex items-center justify-center h-full ">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="#006634" class="w-6 h-6">
                                                    <path fill-rule="evenodd"
                                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-row">
                                            <div class=" flex items-center justify-center h-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="#dd1100" class="w-6 h-6">
                                                    <path fill-rule="evenodd"
                                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>

                 
                    </div>

                    <div class="flex justify-center">
                        <button type="button" class="flex flex-col items-center mx-auto mr-8" id="viewDashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill class="w-6 h-6">
                                <path
                                    fill="{{ request()->routeIs('student.studentDashboard') ? '#006634' : '#939393' }}"
                                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                <path
                                    fill="{{ request()->routeIs('student.studentDashboard') ? '#006634' : '#939393' }}"
                                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                            </svg>
                            <div class="text-xs flex relative font-normal ">Home</div>
                        </button>
                    </div>


                    <div class="relative flex">
                 
                    <button class="w-10 h-10 rounded-full overflow-hidden " id="menuButton">
                        <div class="relative group">
                            <label for="file_input" class="cursor-pointer">
                                <img src="image/dog.jpg" alt="Profile"
                                    class="w-full h-full rounded-full object-cover">
                            </label>


                        </div>

                    </button>

                    <div id="menu"
                        class="absolute hidden  bg-white space-x-3 p-1 border border-[#D4D4D4] rounded-lg shadow-lg w-55  transform translate-y-full  bottom-[-.5rem] left-1/2 -translate-x-1/2 z-30">

                        <div
                            class="flex flex-row justify-center items-center py-1 px-3 text-blackQ hover:text-[#0066FF]" id="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                class="fill-current" height="15" width="15" version="1.1" id="Capa_1"
                                viewBox="0 0 384.971 384.971" xml:space="preserve">
                                <path
                                    d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03    C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03    C192.485,366.299,187.095,360.91,180.455,360.91z" />
                                <path
                                    d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279    c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179    c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                            </svg>

                            <ul class="p-1 w-auto font-semibold">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>


        </div>

    </div>
</div>
</div>
</div>


<script>
    const ReqButton = document.getElementById('ReqButton');
    const ReqMenu = document.getElementById('ReqMenu');
    const ReqIcon = ReqButton.querySelector('.ReqIcon');

    ReqButton.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        ReqMenu.classList.toggle('hidden');
        ReqIcon.classList.toggle('ReqIconColor');
    });

    document.addEventListener('click', function(event) {
        if (!ReqMenu.contains(event.target)) {
            ReqMenu.classList.add('hidden ');
            ReqIcon.classList.remove('ReqIconColor');
        }
    });

    function toggleReqColor(element) {
        element.querySelector('.ReqIconColor').classList.toggle('ReqIconColorTrue');
    }



    const menuButton = document.getElementById('menuButton');
    const menu = document.getElementById('menu');

    menuButton.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        menu.classList.toggle('hidden');
    });
    document.addEventListener('click', function(event) {
        if (!menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
    


    const searchBar = document.getElementById('searchBar');
    const search = document.getElementById('search');

    searchBar.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        search.classList.toggle('hidden');
    });
    document.addEventListener('click', function(event) {
        if (!search.contains(event.target)) {
            search.classList.add('hidden');
        }
    });


    document.getElementById("viewProfile").addEventListener("click", function() {
        window.location.href = "{{ route('student.studentProf') }}";
    });
    

    document.getElementById("viewLeaderBoard").addEventListener("click", function() {
        window.location.href = "{{ route('student.studentLeaderboard') }}";
    });


    document.getElementById("viewDashboard").addEventListener("click", function() {
        window.location.href = "{{ route('student.studentDashboard') }}";
    });
</script>



