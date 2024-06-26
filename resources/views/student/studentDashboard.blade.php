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
                    <div class="flex flex-col w-2/5 ml-10 mr-10 animate-blink ">


                        <div
                            class="w-full relative flex flex-wrap items-start space-x-3 p-6 border border-[#D4D4D4] rounded-xl shadow-lg ">
                            <div class="justify-center items-center mx-auto max-y-md max-w-lg flex ">
                                <div class="justify-center mx-auto max-y-md max-w-lg w-auto ">
                                    <div class=" container">
                                        <img src='/image/profileBG.png' class="w-full h-[8rem] object-cover rounded-xl " />
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#EBC351" height="22" width="22" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                                            <g>
                                                                <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                                <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                                <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                                <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                            </g>
                                                            </svg>
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
                                                10
                                                <div class="text-xs font-regular text-center text-[#444444] font-medium">
                                                    Student Connected

                                                </div>
                                            </div>
                                            <div class="mx-auto items-center text-center">
                                                1.2k
                                                <div class="text-xs font-regular text-center text-[#444444] font-medium">
                                                    Points Garnered

                                                </div>

                                            </div>
                                            <div class="ml-20 items-center text-center"> 8
                                                <div class="text-xs font-regular text-center text-[#444444] font-medium">
                                                    Projects Posted

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <button id="viewProfileBtn" type="button"
                                        class="inline-block rounded-xl bg-[#006634] px-7 pb-2.5 pt-3 text-sm font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full"
                                        data-te-ripple-init data-te-ripple-color="light">
                                        View Profile
                                    </button>

                                    <script>
                                        document.getElementById("viewProfileBtn").addEventListener("click", function() {
                                            window.location.href = "{{ route('student.studentProf') }}";
                                        });
                                    </script>
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
                                                <div class=" flex flex-row text-xs text-black flex-wrap">
                                                    {{ Auth::user()->name }} </div>
                                                <div class="ml-auto flex flex-col">
                                                    1239
                                                    <div
                                                        class="flex flex-row justify-end font-normal text-[#444444] text-xs">
                                                        Points</div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="flex flex-row w-full">
                                            <div class=" items-center text-start  py-6 w-full flex flex-row">
                                                <div class="items-start text-start flex flex-row ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#B7B7B7" height="30" width="30" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="  ">
                                                        <g>
                                                            <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                            <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                            <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                            <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                        </g>
                                                        </svg>


                                                </div>

                                                <div class="w-10 h-10 rounded-full overflow-hidden mx-4 shadow-lg ">
                                                    <div class="relative group">
                                                        <label for="file_input" class="cursor-pointer">
                                                            <img src="image/estetikLuke.png" alt="Profile"
                                                                class="w-full h-full rounded-full object-cover">
                                                        </label>


                                                    </div>

                                                </div>
                                                <div class=" flex flex-row text-xs text-black flex-wrap">
                                                    {{-- {{ Auth::user()->name }} --}} Luke Sellado


                                                </div>


                                                <div class="ml-auto flex flex-col">
                                                    1156
                                                    <div
                                                        class="flex flex-row justify-end font-normal text-[#444444] text-xs">
                                                        Points</div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="flex flex-row w-full">
                                            <div class=" items-center text-start  w-full flex flex-row">
                                                <div class="items-start text-start flex flex-row">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#B7B7B7" height="30" width="30" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class=" ">
                                                        <g>
                                                            <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                            <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                            <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                            <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                        </g>
                                                        </svg>

                                                </div>

                                                <div class="w-10 h-10 rounded-full mx-4 overflow-hidden shadow-lg">
                                                    <div class="relative group">
                                                        <label for="file_input" class="cursor-pointer ">
                                                            <img src="image/jose.jpg" alt="Profile"
                                                                class="w-full h-full object-cover">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class=" flex flex-row text-xs text-black flex-wrap">
                                                    {{-- {{ Auth::user()->name }}  --}} Jose Felizario
                                                </div>

                                                <div class="ml-auto flex flex-col">
                                                    1009
                                                    <div
                                                        class="flex flex-row justify-end font-normal text-[#444444] text-xs">
                                                        Points</div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="w-full mt-4">
                                        <div class="flex justify-center items-center">
                                            <button type="button" id="viewLeaderboardBtn"
                                                class="text-black text-sm hover:text-[#006634]">
                                                View More...
                                            </button>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27"
                                            height="27" viewBox="0 0 30 30" fill="#D40000">
                                            <path
                                                d="M 4 5 C 2.895 5 2 5.895 2 7 L 2 23 C 2 24.105 2.895 25 4 25 L 26 25 C 27.105 25 28 24.105 28 23 L 28 7 C 28 5.895 27.105 5 26 5 L 4 5 z M 23 8 C 24.105 8 25 8.895 25 10 C 25 11.105 24.105 12 23 12 C 21.895 12 21 11.105 21 10 C 21 8.895 21.895 8 23 8 z M 9 12.001953 C 9.61925 12.001953 10.238437 12.238437 10.710938 12.710938 L 13.972656 15.972656 L 15 17 L 16.15625 18.15625 C 16.57825 18.57825 17.259641 18.574344 17.681641 18.152344 C 18.104641 17.730344 18.104641 17.044094 17.681641 16.621094 L 16.529297 15.470703 L 17.289062 14.710938 C 18.234063 13.765937 19.765937 13.765937 20.710938 14.710938 L 25 19 L 25 22 L 5 22 L 5 15 L 7.2890625 12.710938 C 7.7615625 12.238437 8.38075 12.001953 9 12.001953 z">
                                            </path>

                                        </svg>
                                        <div class="text-sm text-center text-[#D40000] font-bold flex px-2"
                                            onclick="toggleModal('modal-idPostImage')">
                                            Image
                                        </div>
                                    </div>
                                </button>
                                <button class="mx-auto">
                                    <div class=" items-center text-center flex px-8 text-[#424242]">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27"
                                            height="27" viewBox="0 0 30 30 " fill="#424242">
                                            <path
                                                d="M24.707,8.793l-6.5-6.5C18.019,2.105,17.765,2,17.5,2H7C5.895,2,5,2.895,5,4v22c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2 V9.5C25,9.235,24.895,8.981,24.707,8.793z M18,21h-8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1 C19,20.552,18.552,21,18,21z M20,17H10c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h10c0.552,0,1,0.448,1,1C21,16.552,20.552,17,20,17 z M18,10c-0.552,0-1-0.448-1-1V3.904L23.096,10H18z">
                                            </path>
                                        </svg>
                                        <div class="text-sm text-center  font-bold flex px-2"
                                            onclick="toggleModal('modal-idPostDocument')">
                                            Document
                                        </div>
                                    </div>
                                </button>
                                <div class="ml-auto">
                                    <div class=" items-center justify-center text-center flex px-8 text-[#0066FF]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                            viewBox="0 0 24 24" fill="#0066FF">
                                            <path
                                                d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                                                stroke="#0066FF" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
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
                                <div class="absolute right-0 top-0 z-20">
                                    {{-- Edit Post Button --}}


                                    <div class=" p-4">
                                        <button id="editButton">
                                            <label for="file_input"
                                                class=" cursor-pointer shadow-md rounded-full opacity-70">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"
                                                    height="20" width="20" version="1.1" id="Capa_1"
                                                    viewBox="0 0 32.055 32.055" xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967   C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967   s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967   c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </button>
                                    </div>
                                    <div id="editMenu"
                                        class="absolute bg-white space-x-2 py-2 px-5 border border-[#D4D4D4] rounded-lg shadow-lg w-55 transform translate-y-full opacity-0 bottom-5 left-1/2 -translate-x-1/2 z-10">

                                        <ul class="text-sm font-semibold text-black w-auto">

                                            <div class="flex flex-row  hover:text-[#0066FF] "
                                                onclick="toggleModal('modal-idPostEditText')">
                                                <button class="py-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" class="fill-current  opacity-80 ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                                <div class="ml-2 mr-2 ">
                                                    <button type="submit" class="py-2">Edit</button>
                                                </div>
                                            </div>

                                            <div class="flex flex-row hover:text-[#FF0000] "
                                                onclick="toggleModal('modal-idPostDelete')">
                                                <button type="submit" class="py-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="14"
                                                        height="14" viewBox="0 0 30 30"
                                                        class="fill-current opacity-80 ">
                                                        <path
                                                            d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <div class="ml-2 mr-2 ">
                                                    <button type="submit" class="py-2">Delete</button>
                                                </div>
                                            </div>


                                        </ul>
                                    </div>
                                </div>

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
                                           
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#EBC351" height="15" width="15" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                                    <g>
                                                        <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                        <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                        <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                        <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                    </g>
                                                    </svg>
                                        </div>
                                        <div class="text-xs font-semibold opacity-70">
                                            {{ $post->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>

                                <div class="py-4 text-black">{{ $post->user_posts }}</div>


                                <div class="flex flex-row items-start justify-start">
                                    <button onclick="toggleColor(this)"
                                        class="flex flex-row justify-center items-center text-s mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                            class="" viewBox="0 0 47.5 47.5" id="heart">
                                            <defs>
                                                <clipPath id="a">
                                                    <path d="M0 38h38V0H0v38Z" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#a)" transform="matrix(1.25 0 0 -1.25 0 47.5)">
                                                <path class="heart-path" fill="#C6C6C6"
                                                    d="M3.067 25.68c0 8.799 12.184 12.06 15.933 1.874 3.749 10.186 15.933 6.925 15.933-1.874C34.933 16.12 19 3.999 19 3.999S3.067 16.12 3.067 25.68" />
                                            </g>
                                        </svg>
                                        <div
                                            class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            1</div>
                                    </button>


                                    <div class="flex flex-row justify-center items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            0</div>
                                    </div>
                                </div>

                                <hr class="my-4 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />

                                <div>
                                    <div class=" flex items-center ">
                                        <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
                                            <label for="file_input" class="cursor-pointer w-full h-full">
                                                <img src="image/Kersch.png" alt="Profile"
                                                    class="w-full h-full object-cover">
                                            </label>
                                        </div>

                                        <div class="text-sm font-bold text-black">
                                            <div class="flex">
                                            Kerschtine Billones
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#7A601D" height="15" width="15" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                                <g>
                                                    <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                    <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                    <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                    <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                </g>
                                                </svg>
                                            </div>
                                            <div class="text-sm font-medium text-black">Hello!</div>
                                            <div class="flex flex-row py-1">
                                                <div class="flex flex-row text-xs font-medium opacity-70 mr-3">· Just Now!
                                                </div>
                                                <button class="flex flex-row text-xs opacity-70"
                                                    onclick="toggleReply()">Reply</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="flex flex-col mt-4 mb-4 hidden" id="replyInput">
                                        <div class="flex pl-10">
                                            <div class="w-7 h-7 rounded-full mr-1 flex-row ">
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




                                <div class=" flex items-center mt-2">

                                    <div class="w-10 h-10 rounded-full mr-2  ">
                                        <div class="relative group">
                                            <label for="file_input" class="cursor-pointer">
                                                <img src="image/dog.jpg" alt="Profile"
                                                    class="w-full h-full rounded-full object-cover">
                                            </label>

                                        </div>

                                    </div>

                                    <div class=" flex-grow">
                                        <input type=""
                                            class=" outline-none text-sm w-full py-2 px-3 bg-gray-200 rounded-2xl "
                                            placeholder="Comment">


                                    </div>
                                </div>

                            </div>
                        @empty
                            <p></p>
                        @endforelse




                        <div class="w-full mb-3 relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                            <div class="absolute right-0 top-0 z-20 ">
                                {{-- Edit Post Button --}}

                                <div class="p-4">
                                    <button id="editButton">
                                        <label for="file_input" class=" cursor-pointer shadow-md rounded-full opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="20"
                                                width="20" version="1.1" id="Capa_1" viewBox="0 0 32.055 32.055"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967   C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967   s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967   c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z" />
                                                </g>
                                            </svg>
                                        </label>
                                    </button>
                                </div>

                                <div id="editMenu"
                                    class="absolute bg-white space-x-2 py-2 px-5 border border-[#D4D4D4] rounded-lg shadow-lg w-55 transform translate-y-full opacity-0 bottom-5 left-1/2 -translate-x-1/2 z-10">

                                    <ul class="text-sm font-semibold text-black w-auto">

                                        <div class="flex flex-row  hover:text-[#0066FF] "
                                            onclick="toggleModal('modal-idPostEditText')">
                                            <button class="py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" class="fill-current  opacity-80 ">
                                                    <path
                                                        d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                </svg>
                                            </button>
                                            <div class="ml-2 mr-2 ">
                                                <button type="submit" class="py-2">Edit</button>
                                            </div>
                                        </div>

                                        <div class="flex flex-row hover:text-[#FF0000] "
                                            onclick="toggleModal('modal-idPostDelete')">
                                            <button type="submit" class="py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="14"
                                                    height="14" viewBox="0 0 30 30" class="fill-current opacity-80 ">
                                                    <path
                                                        d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div class="ml-2 mr-2 ">
                                                <button type="submit" class="py-2">Delete</button>
                                            </div>
                                        </div>


                                    </ul>
                                </div>
                            </div>

                            <div class="flex flex-grow items-center mt-3">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-2">
                                    <div class="relative group">
                                        <img src="{{ asset('image/Kersch.png') }}" alt="Profile"
                                            class="w-full h-full rounded-full object-cover">
                                    </div>
                                </div>
                                <div class="text-sm font-bold text-black">
                                    <div class="flex">
                                        Kerschtine Billones
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#7A601D" height="15" width="15" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                            <g>
                                                <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                            </g>
                                            </svg>
                                        </div>

                                    <div class="text-xs font-semibold opacity-70">
                                        1 Hour Ago
                                    </div>
                                </div>
                            </div>

                            <div class="container w-full mt-2">
                                <img src="image/art.jpg" alt=""
                                    class="animate-spin  rounded-xl object-cover mb-2 border border-[#D4D4D4] ">
                                <div class="flex flex-row items-start justify-start">
                                    <button onclick="toggleColor(this)"
                                        class="flex flex-row justify-center items-center text-s mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                            class="" viewBox="0 0 47.5 47.5" id="heart">
                                            <defs>
                                                <clipPath id="a">
                                                    <path d="M0 38h38V0H0v38Z" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#a)" transform="matrix(1.25 0 0 -1.25 0 47.5)">
                                                <path class="heart-path" fill="#C6C6C6"
                                                    d="M3.067 25.68c0 8.799 12.184 12.06 15.933 1.874 3.749 10.186 15.933 6.925 15.933-1.874C34.933 16.12 19 3.999 19 3.999S3.067 16.12 3.067 25.68" />
                                            </g>
                                        </svg>
                                        <div
                                            class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            1</div>
                                    </button>


                                    <div class="flex flex-row justify-center items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            1</div>
                                    </div>
                                </div>

                                <hr class="my-4 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />

                                <div>
                                    <div class=" flex items-center ">
                                        <div class="w-9 h-9 rounded-full mr-2 flex-row ">
                                            <div class="relative group">
                                                <label for="file_input" class="cursor-pointer">
                                                    <img src="image/dog.jpg" alt="Profile"
                                                        class="w-full h-full rounded-full object-cover">
                                                </label>

                                            </div>

                                        </div>

                                        <div class="text-sm font-bold text-black">
                                            <div class="flex">
                                                Paulo John Jimenea
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#EBC351" height="15" width="15" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                                    <g>
                                                        <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                        <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                        <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                        <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                    </g>
                                                    </svg>
                                                </div>
                                            <div class="text-sm font-medium text-black">WOW!</div>
                                            <div class="flex flex-row py-1">
                                                <div class="flex flex-row text-xs font-medium opacity-70 mr-3">· 1 Hour
                                                    Ago
                                                </div>
                                                <button class="flex flex-row text-xs opacity-70"
                                                    onclick="toggleReply()">Reply</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="flex flex-col mt-4 mb-4 hidden" id="replyInput">
                                        <div class="flex pl-10">
                                            <div class="w-7 h-7 rounded-full mr-1 flex-row ">
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



                                <div class=" flex items-center mt-2">

                                    <div class="w-10 h-10 rounded-full mr-2  ">
                                        <div class="relative group">
                                            <label for="file_input" class="cursor-pointer">
                                                <img src="image/dog.jpg" alt="Profile"
                                                    class="w-full h-full rounded-full object-cover">
                                            </label>

                                        </div>

                                    </div>

                                    <div class=" flex-grow">
                                        <input type=""
                                            class=" outline-none text-sm w-full py-2 px-3 bg-gray-200 rounded-2xl "
                                            placeholder="Comment">


                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="w-full mb-3 relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                            <div class="absolute right-0 top-0 z-20 ">
                                {{-- Edit Post Button --}}

                                <div class="p-4">
                                    <button id="editButton">
                                        <label for="file_input" class=" cursor-pointer shadow-md rounded-full opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="20"
                                                width="20" version="1.1" id="Capa_1" viewBox="0 0 32.055 32.055"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967   C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967   s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967   c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z" />
                                                </g>
                                            </svg>
                                        </label>
                                    </button>
                                </div>

                                <div id="editMenu"
                                    class="absolute bg-white space-x-2 py-2 px-5 border border-[#D4D4D4] rounded-lg shadow-lg w-55 transform translate-y-full opacity-0 bottom-5 left-1/2 -translate-x-1/2 z-10">

                                    <ul class="text-sm font-semibold text-black w-auto">

                                        <div class="flex flex-row  hover:text-[#0066FF] "
                                            onclick="toggleModal('modal-idPostEditText')">
                                            <button class="py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" class="fill-current  opacity-80 ">
                                                    <path
                                                        d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                </svg>
                                            </button>
                                            <div class="ml-2 mr-2 ">
                                                <button type="submit" class="py-2">Edit</button>
                                            </div>
                                        </div>

                                        <div class="flex flex-row hover:text-[#FF0000] "
                                            onclick="toggleModal('modal-idPostDelete')">
                                            <button type="submit" class="py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="14"
                                                    height="14" viewBox="0 0 30 30" class="fill-current opacity-80 ">
                                                    <path
                                                        d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div class="ml-2 mr-2 ">
                                                <button type="submit" class="py-2">Delete</button>
                                            </div>
                                        </div>


                                    </ul>
                                </div>
                            </div>

                            <div class="flex flex-grow items-center mt-3">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-2">
                                    <div class="relative group">
                                        <img src="{{ asset('image/Kersch.png') }}" alt="Profile"
                                            class="w-full h-full rounded-full object-cover">
                                    </div>
                                </div>
                                <div class="text-sm font-bold text-black">
                                    <div class="flex">
                                        Kerschtine Billones
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#7A601D" height="15" width="15" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                            <g>
                                                <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                            </g>
                                            </svg>
                                        </div>

                                    <div class="text-xs font-semibold opacity-70">
                                        1 Hour Ago
                                    </div>

                                </div>

                            </div>
                            <div class="flex mb-2 mt-2 text-black"> Our Thesis Document!</div>

                            <div class="container w-full mt-2">
                                <div class="flex">
                                    <img src="image/Doc1.png" alt=""
                                        class="rounded-xl object-cover w-9/12 mb-2 border border-[#D4D4D4]">
                                    <div class="ml-2">
                                        <div
                                            class="flex justify-center  items-center mb-2 w-full flex-row overflow-hidden ">
                                            <div class="flex flex-col w-full ">
                                                <div class="container w-10/12  ml-auto mr-auto ">
                                                    <img src="image/Doc2.png" alt=""
                                                        class="object-cover rounded-xl border border-[#D4D4D4]">

                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="flex justify-center  items-center w-full mb-2 flex-row overflow-hidden">
                                            <div class="flex flex-col w-full">
                                                <div class="container w-10/12  ml-auto mr-auto  ">
                                                    <img src="image/Doc3.png" alt=""
                                                        class="object-cove rounded-xl border border-[#D4D4D4] ">

                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="flex justify-center  items-center mb-2 w-full flex-row overflow-hidden">
                                            <div class="flex flex-col w-full">
                                                <div class="relative container w-10/12  ml-auto mr-auto   ">
                                                    <div
                                                        class="absolute z-30 text-base  inset-0 flex justify-center items-center text-white shadow-lg font-semibold">
                                                        10+</div>
                                                    <img src="image/Doc3.png" alt=""
                                                        class="object-cover rounded-xl brightness-75 blur-[1px] border border-[#D4D4D4]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-row items-start justify-start mt-2">
                                    <button onclick="toggleColor(this)"
                                        class="flex flex-row justify-center items-center text-sm mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                            class="" viewBox="0 0 47.5 47.5" id="heart">
                                            <defs>
                                                <clipPath id="a">
                                                    <path d="M0 38h38V0H0v38Z" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#a)" transform="matrix(1.25 0 0 -1.25 0 47.5)">
                                                <path class="heart-path" fill="#C6C6C6"
                                                    d="M3.067 25.68c0 8.799 12.184 12.06 15.933 1.874 3.749 10.186 15.933 6.925 15.933-1.874C34.933 16.12 19 3.999 19 3.999S3.067 16.12 3.067 25.68" />
                                            </g>
                                        </svg>

                                        <div
                                            class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            1</div>
                                    </button>

                                    <div class="flex flex-row justify-center items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                            0</div>
                                    </div>
                                </div>

                                <hr class="my-4 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />

                                <div>
                                    <div class="flex items-center">
                                        <div class="w-9 h-9 rounded-full mr-2">
                                            <div class="relative group">
                                                <label for="file_input" class="cursor-pointer">
                                                    <img src="image/estetikLuke.png" alt="Profile"
                                                        class="w-full h-full rounded-full object-cover">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="text-sm font-bold text-black">
                                            <div class="flex">
                                                Luke Sellado
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#B7B7B7" height="15" width="15" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
                                                    <g>
                                                        <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                        <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                        <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                        <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                    </g>
                                                    </svg>
                                                </div>
                                            <div class="text-sm font-medium text-black">I like it</div>
                                            <div class="flex flex-row py-1">
                                                <div class="flex flex-row text-xs font-medium opacity-70 mr-3">· 1 Hour Ago
                                                </div>
                                                <button class="flex flex-row text-xs opacity-70"
                                                    onclick="toggleReply()">Reply</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="flex flex-col mt-4 mb-4 hidden" id="replyInput">
                                        <div class="flex pl-10">
                                            <div class="w-7 h-7 rounded-full mr-1">
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

                                <div class="flex items-center mt-2">
                                    <div class="w-10 h-10 rounded-full mr-2">
                                        <div class="relative group">
                                            <label for="file_input" class="cursor-pointer">
                                                <img src="image/dog.jpg" alt="Profile"
                                                    class="w-full h-full rounded-full object-cover">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <input type="text"
                                            class="outline-none text-sm w-full py-2 px-3 bg-gray-200 rounded-2xl"
                                            placeholder="Comment">
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>


                    <div class="flex flex-col w-2/5 ml-10 mr-10 z-20 animate-blink animation-delay-200">
                        <div
                            class="w-full relative flex flex-col items-start  p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                            <div class="max-y-md max-w-lg flex ">
                                <div class="max-w-lg w-full font-bold text-black">
                                    Suggested Students for You
                                    <div class="flex mt-3 ">
                                        <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg">
                                            <div class="relative group">
                                                <label for="file_input" class="cursor-pointer ">
                                                    <img src="image/estetikLuke.png" alt="Profile"
                                                        class="w-full h-full object-cover">

                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex-grow flex-col ml-4 text-sm font-bold text-black ">
                                            <div class="flex">
                                                Luke Sellado
                                          
                                                <div class="ml-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#B7B7B7" height="18" width="18" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl ">
                                                            <g>
                                                                <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                                <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                                <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                                <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                            </g>
                                                            </svg>
                                                        </div>
                                            </div>
                                            <div class="text-xs font-semibold text-black opacity-45">BSCS 3A S.Y. 2023-2024
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center ml-5 ">
                                            <div class="text-xs font-bold ">
                                                <div>
                                                    <button type=""
                                                        class="inline-block rounded-md bg-[#006634] px-2 py-1 text-xs font-bold  leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                                        Connect +
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex mt-3 ">
                                        <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg">
                                            <div class="relative group">
                                                <label for="file_input" class="cursor-pointer ">
                                                    <img src="image/Jose.jpg" alt="Profile"
                                                        class="w-full h-full object-cover">

                                                </label>
                                            </div>
                                        </div>


                                        <div class="flex-grow flex-col ml-4 text-sm font-bold text-black ">
                                            <div class="flex">Jose Felizario
                                                <div class="ml-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#B7B7B7" height="18" width="18" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl ">
                                                            <g>
                                                                <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                                <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                                <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                                <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                            </g>
                                                            </svg>
                                                        </div>
                                            </div>
                                            <div class="text-xs font-semibold text-black opacity-45">BSCS 3A S.Y. 2023-2024
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center ml-5 ">
                                            <div class="text-xs font-bold ">
                                                <div>
                                                    <button type=""
                                                        class="inline-block rounded-md bg-[#006634] px-2 py-1 text-xs font-bold  leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                                        Connect +
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                            <div class="flex">Kersctine Billones
                                                <div class="ml-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#7A601D" height="18" width="18" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl ">
                                                        <g>
                                                            <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                                            <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                                            <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                                            <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
                                                        </g>
                                                        </svg>
                                                    </div>
                                            </div>
                                            <div class="text-xs font-semibold text-black opacity-45">BSCS 3A S.Y. 2023-2024
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center ml-5 ">
                                            <div class="text-xs font-bold ">
                                                <div>
                                                    <button type=""
                                                        class="inline-block rounded-md bg-[#006634] px-2 py-1 text-xs font-bold  leading-normal truncate text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full">
                                                        Connect +
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
                                            <div class="text-xs font-semibold text-black opacity-45"> Kerschtine Posted an
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
    @endsection
