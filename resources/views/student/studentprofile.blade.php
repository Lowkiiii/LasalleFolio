@extends('layouts.app')
@section('webtitle')
    Profile
@endsection

@section('content')
    <section class="h-screen bg-white">


        <div class="flex row min-h-full justify-center relative">

            <div class="z-10 mx-auto max-w-[76rem]">
                <div class="flex flex-row border border-InputGray rounded-xl drop-shadow-xl shadow-[#006634]">
                    <div class=" container">
                        <img src='/image/profileBG.png' class="" />
                    </div>
                </div>
                <div>
                    <div class="z-20  mx-auto max-w-full -translate-y-24">
                        <div class="justify-center items-center ">
                            <div
                                class="w-36 h-36 bg-gray-200 rounded-full justify-center mx-auto max-w-lg flex items-center shadow-lg ">
                                <div class="">
                                    <p class="text-blac">Profile</p>
                                </div>

                            </div>

                        </div>
                        <h1 class="text-center text-lg pt-2 font-bold text-black">
                            Paulo John C. Jimenea
                        </h1>
                        <p class="text-xs font-d mx-auto max-y-md max-w-lg flex items-center justify-center">
                            < School Id> · Bacolod City · PH
                        </p>


                        <div class="flex items-center justify-center py-6 px-6">
                            <div class="flex">
                                <div class="flex flex-col items-center mr-32 ">
                                    <div class="font-bold text-xl text-[#006634] ">1.2k</div>
                                    <div class="text-xs font-regular text-center truncate text-[#444444] font-medium">Points
                                        Garnered</div>
                                </div>

                                <div class="flex flex-col items-center mx-32 text-[#006634] ">
                                    <div class="font-bold text-xl">10</div>
                                    <div class="text-xs font-regular text-center truncate text-[#444444] font-medium">
                                        Students Connected</div>
                                </div>

                                <div class="flex flex-col items-center ml-32 text-[#006634] ">
                                    <div class="font-bold text-xl">13</div>
                                    <div class="text-xs font-regular text-center truncate text-[#444444] font-medium">
                                        Projects Posted</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center text-xs font-medium text-center justify-center ">
                            <div class=" mt-4 text-black font-bold text-lg"> About Me </div>
                            <div class="flex mt-2 text-sm font-medium text-center justify-center">
                                <div class="w-3/4 text-black">
                                    Lorem ipsum dolor sit amet consectetur. Tristique est felis sollicitudin vitae egestas
                                    elit quis. Massa amet etiam et netus quis ullamcorper orci integer. Amet etiam metus
                                    tincidunt diam diam. Aliquam molestie ullamcorper est turpis aliquam nibh condimentum.
                                </div>
                            </div>
                        </div>
                        <div class="mr-10 mt-10 w-full ">
                            <h1 class="font-bold text-black">Project Showcase</h1>

                            <div class="flex mt-2  ">

                                <div
                                    class="w-full relative flex flex-wrap  items-start space-x-3 mr-10 py-4 px-2 border border-[#939393] rounded-lg   ">

                                    <div class="absolute right-0 top-0 z-20">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">

                                        <div class="text-xl font-bold text-[#006634]">
                                            <button class="hover:text-[#004423]">
                                                · Zesto-Chat-Application
                                            </button>

                                            <div class="py-3 text-xs font-medium text-black items-start">
                                                Credits to Antonio Erdeljac for his youtube video on how to create a
                                                Messenger like applicatio .</div>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="w-full relative flex items-start space-x-3 mr-10 py-4 px-2  border border-[#939393] rounded-lg flex-wrap ">

                                    <div class="absolute right-0 top-0 z-20">
                                        <button class=" p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative  ">
                                        <div class="text-xl font-bold text-[#006634]">
                                            <button class="hover:text-[#004423]">
                                                · Project Name
                                            </button>
                                            <div class="absolute right-0 top-0">

                                            </div>
                                            <div class="py-3 text-xs font-medium text-black items-start">
                                                Lorem ipsum dolor sit amet consectetur. Tristique est felis sollicitudin
                                                vitae egestas elit quisr his youtube video on how to create a Messenger like
                                                application Credits to Antonio Erdeljac for his youtube video on how to
                                                create a Messenger like </div>
                                        </div>

                                    </div>
                                </div>

                                <div
                                    class="w-full overflow-y-auto relative flex flex-wrap justify-center items-center  py-4 px-2 border border-[#939393] rounded-lg hover:bg-[#e6e6e6] overflow-hidden">

                                    <div class=" text-4xl font-regular text-[#006634] ">
                                        +
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <div class="text-sm font-medium text-black py-2 ">Customize Showcase</div>
                        </div>

                        <div>
                            {{-- FIRST ROW --}}
                            <div class="flex mt-2 ">
                                <div
                                    class="w-full relative flex items-start space-x-3 ml-2 py-4 px-2  border border-[#939393] rounded-lg">

                                    <div class="absolute right-0 top-0">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="relative  text-xl font-bold text-[#006634]">
                                            <button class="text-black">
                                                Education
                                            </button>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>

                                            <div class="flex items-center py-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center py-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                consectetur.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="w-full relative flex items-start space-x-3 ml-2 py-4 px-2  border border-[#939393] rounded-lg">

                                    <div class="absolute right-0 top-0">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="relative  text-xl font-bold text-[#006634]">
                                            <button class="text-black">
                                                Experience
                                            </button>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>

                                            <div class="flex items-center py-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center py-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                consectetur.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END OF 1ST ROW --}}

                            {{-- SECOND ROW --}}
                            <div class="flex mt-2 ">
                                <div
                                    class="w-full relative flex items-start space-x-3 ml-2 py-4 px-2  border border-[#939393] rounded-lg">

                                    <div class="absolute right-0 top-0">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="relative  text-xl font-bold text-[#006634]">
                                            <button class="text-black">
                                                Skills
                                            </button>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>

                                            <div class="flex items-center py-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center py-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                consectetur.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="w-full relative flex items-start space-x-3 ml-2 py-4 px-2  border border-[#939393] rounded-lg">

                                    <div class="absolute right-0 top-0">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="relative  text-xl font-bold text-[#006634]">
                                            <button class="text-black">
                                                Interests
                                            </button>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>

                                            <div class="flex items-center py-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center py-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit ametpsum dolor sit amet
                                                consectetur.
                                            </div>

                                        </div>
                                        
                                    </div>
                                    <div class="z-30 absolute bottom-0 left-1/2 items-center justify-center ">
                                        <div class=" text-xs font-medium text-black">
                                          
                                        </div>
                                    </div>
                                   
                                </div>
                                
                            </div>
                            {{-- END OF SECOND ROW --}}

                            {{-- THIRD ROW --}}
                            <div class="flex mt-2 ">
                                <div
                                    class="w-full relative flex items-start space-x-3 ml-2 py-4 px-2  border border-[#939393] rounded-lg">

                                    <div class="absolute right-0 top-0">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="relative  text-xl font-bold text-[#006634]">
                                            <button class="text-black">
                                                Projects
                                            </button>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>

                                            <div class="flex items-center py-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center py-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                consectetur.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="w-full relative flex items-start space-x-3 ml-2 py-4 px-2  border border-[#939393] rounded-lg">

                                    <div class="absolute right-0 top-0">
                                        <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>


                                    <div class="relative">
                                        <div class="relative  text-xl font-bold text-[#006634]">
                                            <button class="text-black">
                                                Awards and Honors
                                            </button>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>

                                            <div class="flex items-center py-1">
                                                <div class="w-11 h-10 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>
                                                <div class="ml-3 py-3 text-xs font-medium text-black">
                                                    <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                    consectetur.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center py-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold">CONTENT HERE</div> Lorem ipsum dolor sit amet
                                                consectetur.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="z-30 absolute bottom-0 right-0 font-bold text-gray-500 hover:text-[#006634] transition-">
                                        <div class=" p-4 text-2x ">
                                            ⌄
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END OF THIRD ROW --}}


                        </div>
                    </div>
                </div>
            </div>
        @endsection
