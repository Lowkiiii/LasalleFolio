<div class="min-h-full border-b  border-[#D4D4D4] shadow-lg">
    <div class="mx-auto max-w-[89rem] px-4 sm:px-6 lg:px-8 ">
        <div class="flex h-16 items-center justify-between ">
            <div class="flex items-center">
                <div class="block">
                    <div class="flex space-x-2 mr-12">
                        <img src='/image/logo.png' class="size-8 items-center" />
                        <div class="items-center justify-center m-auto text-sm font-bold text-[#006634]">
                            LASALLEFOLIO
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="relative">
                        <input type=""
                            class="outline-none text-sm w-full py-2 px-3 pl-10 border border-[#D4D4D4] rounded-2xl"
                            placeholder="Search">
                        <i class="absolute left-2 top-[0.4rem]  opacity-60">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26"
                                viewBox="0 0 30 30">
                                <path
                                    d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                </path>
                            </svg>
                        </i>
                    </div>

                </div>



            </div>
            <div class="flex">

                <div class="flex flex-row ">
                    <div class="flex justify-center">
                        <button type="button" class="flex flex-col items-center mx-auto mr-6" id="viewDashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.0" id="Layer_1" width="20" height="20" viewBox="0 0 64 64"
                                enable-background="new 0 0 64 64" xml:space="preserve" class="">
                                <path
                                    fill="{{ request()->routeIs('student.studentDashboard') ? '#006634' : '#939393' }} "
                                    d="M62.79,29.172l-28-28C34.009,0.391,32.985,0,31.962,0s-2.047,0.391-2.828,1.172l-28,28  c-1.562,1.566-1.484,4.016,0.078,5.578c1.566,1.57,3.855,1.801,5.422,0.234L8,33.617V60c0,2.211,1.789,4,4,4h16V48h8v16h16  c2.211,0,4-1.789,4-4V33.695l1.195,1.195c1.562,1.562,3.949,1.422,5.516-0.141C64.274,33.188,64.356,30.734,62.79,29.172z" />
                            </svg>
                            <div class="text-xs flex relative font-normal text-[#006634]">Home</div>
                        </button>
                    </div>
                    {{-- <div class="flex justify-center">
                        <button type="button" class="flex flex-col items-center mx-auto mr-8" id="viewDashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.0" id="Layer_1" width="25" height="25" viewBox="0 0 64 64"
                                enable-background="new 0 0 64 64" xml:space="preserve" class="">
                                <path fill="{{ request()->routeIs('student.studentDashboard') ? '#006634' : '#939393' }} "
                                    d="M62.79,29.172l-28-28C34.009,0.391,32.985,0,31.962,0s-2.047,0.391-2.828,1.172l-28,28  c-1.562,1.566-1.484,4.016,0.078,5.578c1.566,1.57,3.855,1.801,5.422,0.234L8,33.617V60c0,2.211,1.789,4,4,4h16V48h8v16h16  c2.211,0,4-1.789,4-4V33.695l1.195,1.195c1.562,1.562,3.949,1.422,5.516-0.141C64.274,33.188,64.356,30.734,62.79,29.172z" />
                            </svg>
                            <div class="text-xs flex relative">Home</div>
                        </button>
                       
                    </div> --}}

                    <script>
                        document.getElementById("viewDashboard").addEventListener("click", function() {
                            window.location.href = "{{ route('student.studentDashboard') }}";
                        });
                    </script>

                </div>
                <div class="relative flex">
                    <button id="menuButton">
                        <label for="file_input" class="cursor-pointer shadow-md rounded-full">
                            <img src="image/dog.jpg" alt="Profile" class="rounded-full object-cover w-9 h-9">
                        </label>
                    </button>
                    <div id="menu"
                        class="absolute bg-white space-x-3 p-1 border border-[#D4D4D4] rounded-lg shadow-lg w-55  transform translate-y-full opacity-0 bottom-[-.5rem] left-1/2 -translate-x-1/2 z-10">

                        <div
                            class="flex flex-row justify-center items-center py-1 px-3 text-blackQ hover:text-[#0066FF]">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                class="fill-current" height="15" width="15" version="1.1" id="Capa_1"
                                viewBox="0 0 384.971 384.971" xml:space="preserve">
                                <path
                                    d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03    C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03    C192.485,366.299,187.095,360.91,180.455,360.91z" />
                                <path
                                    d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279    c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179    c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                            </svg>

                            <ul class="p-1 w-auto font-semibold ">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const menuButton = document.getElementById('menuButton');
                const menu = document.getElementById('menu');

                menuButton.addEventListener('click', function() {
                    event.preventDefault();
                    event.stopPropagation();
                    menu.classList.toggle('opacity-100');
                });
                document.addEventListener('click', function(event) {
                    if (!menu.contains(event.target)) {

                        menu.classList.remove('opacity-100');
                    }
                });
            </script>

        </div>
    </div>
</div>
