@extends('layouts.app')
@section('webtitle')
    Leaderboard
@endsection

@section('content')
    <section class="h-screen bg-[#F8F8F8]]">
        <div class="flex row min-h-full justify-center relative">


            <div class=" mx-auto max-w-[85rem] mt-4 w-full">

                <div class="w-full mr-10 mt-10">

                    <div class="mb-4 font-bold text-2xl text-black">Leaderboard</div>

                    <div class="flex flex-row ">
                        <div class="flex flex-col w-full mr-3">

                            <div
                                class="w-full relative flex flex-wrap items-start  space-x-3 mr-10 py-[1.8rem] px-4 border border-[#D9D9D9] rounded-lg shadow-lg ">

                                <div class="relative flex text-center w-full ">


                                    <label for="file_input"
                                        class="cursor-pointer flex flex-col relative justify-center items-center rounded-full ml-auto mr-auto ">
                                        <img src="image/dog.jpg" alt="Profile"
                                            class="rounded-full object-cover w-12 h-12 shadow-lg ">

                                    </label>

                                    <div class="flex flex-col relative justify-start items-start m-auto ">
                                        <div class="text-center font-bold text-black text-xl">Paulo John Jimenea</div>
                                        <div class="flex items-start text-xs font-bold text-black justify-start ">
                                            <div class="flex items-start text-[#006634]">
                                                100
                                                <div class="items-start ml-1 text-[#808080] text-xs font-semibold truncate">
                                                    Connection | </div>
                                            </div>
                                            <div class="flex items-start ml-1 text-[#006634]">
                                                150
                                                <div class="items-start ml-1 text-[#808080] text-xs font-semibold">
                                                    Engagements </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex flex-col relative justify-center items-center ml-auto mr-auto px-2 border-l">
                                        <div class="flex relative justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 512 512" id="trophy" fill="#EBC351">
                                                <path
                                                    d="M479.863 103.342c-.051-2.833-.096-5.279-.096-7.342h-80.835c1.56-34.617.512-64 .512-64H256.876a9.76 9.76 0 0 0-1 .056 9.728 9.728 0 0 0-1-.056H111.945s-1.048 29.383.512 64H32V128h.161c.811 26.096 4.98 60.999 22.333 96.729 14.718 30.307 35.912 55.664 62.996 75.367 22.422 16.312 48.041 28.064 76.205 35.084C209.96 352.539 226 362.109 240 365.957v35.625C238 412.165 225.86 448 141.234 448H128v32h256v-32h-13.178C271.538 448 272 398.666 272 398.666v-32.714c14-3.843 29.73-13.374 45.91-30.644 28.369-7.004 54.072-18.801 76.633-35.213 27.082-19.703 48.262-45.06 62.98-75.367 23.68-48.761 22.803-96.005 22.34-121.386zM83.262 210.745C68.802 180.966 65.018 150.996 64.187 128h50.487c.868 8.914 1.966 17.701 3.356 25.98 8.513 50.709 20.213 95.493 42.354 135.009-33.838-17.141-60.414-43.84-77.122-78.244zm345.475 0c-16.807 34.61-43.603 61.421-77.729 78.55 22.215-39.591 33.816-84.475 42.352-135.314 1.39-8.28 2.488-17.067 3.356-25.98h51.096c-.831 22.995-4.614 52.965-19.075 82.744z" />
                                            </svg>
                                        </div>
                                        <div class="flex text-xs justify-center items-start">
                                            <div class="flex items-start text-sm font-bold text-black ">1283 <div
                                                    class="text-[#006634] ml-1">XP</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col w-full mr-3">

                            <div
                                class="w-full relative flex flex-wrap items-start  space-x-3 mr-10 py-[1.8rem] px-4 border border-[#D9D9D9] rounded-lg shadow-lg ">

                                <div class="relative flex text-center w-full ">


                                    <label for="file_input"
                                        class="cursor-pointer flex flex-col relative justify-center items-center rounded-full ml-auto mr-auto">
                                        <img src="image/dog.jpg" alt="Profile"
                                            class="rounded-full object-cover w-12 h-12 shadow-lg ">

                                    </label>

                                    <div class="flex flex-col relative justify-start items-start m-auto">
                                        <div class="text-center font-bold text-black text-xl">Paulo John Jimenea</div>
                                        <div class="flex items-start text-xs font-bold text-black justify-start ">
                                            <div class="flex items-start text-[#006634]">
                                                100
                                                <div class="items-start ml-1 text-[#808080] text-xs font-semibold truncate">
                                                    Connection | </div>
                                            </div>
                                            <div class="flex items-start ml-1 text-[#006634]">
                                                150
                                                <div class="items-start ml-1 text-[#808080] text-xs font-semibold">
                                                    Engagements </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div
                                        class="flex flex-col relative justify-center items-center ml-auto mr-auto px-2 border-l">
                                        <div class="flex relative justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 512 512" id="trophy" fill="#B7B7B7">
                                                <path
                                                    d="M479.863 103.342c-.051-2.833-.096-5.279-.096-7.342h-80.835c1.56-34.617.512-64 .512-64H256.876a9.76 9.76 0 0 0-1 .056 9.728 9.728 0 0 0-1-.056H111.945s-1.048 29.383.512 64H32V128h.161c.811 26.096 4.98 60.999 22.333 96.729 14.718 30.307 35.912 55.664 62.996 75.367 22.422 16.312 48.041 28.064 76.205 35.084C209.96 352.539 226 362.109 240 365.957v35.625C238 412.165 225.86 448 141.234 448H128v32h256v-32h-13.178C271.538 448 272 398.666 272 398.666v-32.714c14-3.843 29.73-13.374 45.91-30.644 28.369-7.004 54.072-18.801 76.633-35.213 27.082-19.703 48.262-45.06 62.98-75.367 23.68-48.761 22.803-96.005 22.34-121.386zM83.262 210.745C68.802 180.966 65.018 150.996 64.187 128h50.487c.868 8.914 1.966 17.701 3.356 25.98 8.513 50.709 20.213 95.493 42.354 135.009-33.838-17.141-60.414-43.84-77.122-78.244zm345.475 0c-16.807 34.61-43.603 61.421-77.729 78.55 22.215-39.591 33.816-84.475 42.352-135.314 1.39-8.28 2.488-17.067 3.356-25.98h51.096c-.831 22.995-4.614 52.965-19.075 82.744z" />
                                            </svg>
                                        </div>
                                        <div class="flex text-xs justify-center items-start">
                                            <div class="flex items-start text-sm font-bold text-black ">1283 <div
                                                    class="text-[#006634] ml-1">XP</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col w-full">

                            <div
                                class="w-full relative flex flex-wrap items-start  space-x-3 mr-10 py-[1.8rem] px-4 border border-[#D9D9D9] rounded-lg shadow-lg ">

                                <div class="relative flex text-center w-full ">


                                    <label for="file_input"
                                        class="cursor-pointer flex flex-col relative justify-center items-center rounded-full ml-auto mr-auto">
                                        <img src="image/dog.jpg" alt="Profile"
                                            class="rounded-full object-cover w-12 h-12 shadow-lg ">

                                    </label>

                                    <div class="flex flex-col relative justify-start items-start m-auto  ">
                                        <div class="text-center font-bold text-black text-xl">Paulo John Jimenea</div>
                                        <div class="flex items-start text-xs font-bold text-black justify-start ">
                                            <div class="flex items-start text-[#006634]">
                                                100
                                                <div class="items-start ml-1 text-[#808080] text-xs font-semibold truncate">
                                                    Connection | </div>
                                            </div>
                                            <div class="flex items-start ml-1 text-[#006634]">
                                                150
                                                <div class="items-start ml-1 text-[#808080] text-xs font-semibold">
                                                    Engagements </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div
                                        class="flex flex-col relative justify-center items-center ml-auto mr-auto px-2 border-l">
                                        <div class="flex relative justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 512 512" id="trophy" fill="#7A601D">
                                                <path
                                                    d="M479.863 103.342c-.051-2.833-.096-5.279-.096-7.342h-80.835c1.56-34.617.512-64 .512-64H256.876a9.76 9.76 0 0 0-1 .056 9.728 9.728 0 0 0-1-.056H111.945s-1.048 29.383.512 64H32V128h.161c.811 26.096 4.98 60.999 22.333 96.729 14.718 30.307 35.912 55.664 62.996 75.367 22.422 16.312 48.041 28.064 76.205 35.084C209.96 352.539 226 362.109 240 365.957v35.625C238 412.165 225.86 448 141.234 448H128v32h256v-32h-13.178C271.538 448 272 398.666 272 398.666v-32.714c14-3.843 29.73-13.374 45.91-30.644 28.369-7.004 54.072-18.801 76.633-35.213 27.082-19.703 48.262-45.06 62.98-75.367 23.68-48.761 22.803-96.005 22.34-121.386zM83.262 210.745C68.802 180.966 65.018 150.996 64.187 128h50.487c.868 8.914 1.966 17.701 3.356 25.98 8.513 50.709 20.213 95.493 42.354 135.009-33.838-17.141-60.414-43.84-77.122-78.244zm345.475 0c-16.807 34.61-43.603 61.421-77.729 78.55 22.215-39.591 33.816-84.475 42.352-135.314 1.39-8.28 2.488-17.067 3.356-25.98h51.096c-.831 22.995-4.614 52.965-19.075 82.744z" />
                                            </svg>
                                        </div>
                                        <div class="flex text-xs justify-center items-start">
                                            <div class="flex items-start text-sm font-bold text-black">1283 <div
                                                    class="text-[#006634] ml-1">XP</div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>



                    </div>




                    <div class="w-full mt-6">
                        <div class="relative mb-6">
                            <input type="text"
                                class="outline-none text-sm w-1/3 py-2 px-3 pl-10 border border-[#D4D4D4] rounded-2xl"
                                placeholder="Search">
                            <i class="absolute left-2 top-[0.4rem] opacity-60">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26"
                                    viewBox="0 0 30 30">
                                    <path
                                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                    </path>
                                </svg>
                            </i>
                        </div>

                        <div class="border  rounded-xl border-[#D4D4D4]">
                            <table class="w-full table-auto text-center ">
                                <thead>
                                    <tr class="border-b text-[#808080] border-[#D4D4D4] py-4 ">
                                        <th class="font-bold text-sm  py-4">Rank</th>
                                        <th class="font-bold text-sm py-4">Name</th>
                                        <th class="font-bold text-sm py-4">Projects Posted</th>
                                        <th class="font-bold text-sm py-4">Total Points</th>
                                    </tr>
                                </thead>
                                <tbody class="border-b rounded-xl">
                                    <tr>
                                        <td class="py-4 text-[#006634] text-xl font-bold">5</td>
                                        <td class="py-4 font-bold text-black w-1/3">

                                            <div class="relative flex  justify-center items-center text-center ">
                                                <label for="file_input"
                                                    class="cursor-pointer flex flex-col relative justify-center items-center rounded-full px-2 ">
                                                    <img src="image/dog.jpg" alt="Profile"
                                                        class="rounded-full object-cover w-12 h-12 shadow-lg ">

                                                </label>

                                                <div class="flex flex-col relative justify-start items-start  ">
                                                    <div class="text-center font-bold text-black text-xl">Paulo John
                                                        Jimenea</div>
                                                    <div
                                                        class="flex items-center text-xs font-bold text-black justify-center ">
                                                        <div class="flex items-center text-[#006634]">
                                                            100
                                                            <div
                                                                class="items-center ml-1 text-[#808080] text-xs font-semibold truncate">
                                                                Connection | </div>
                                                        </div>
                                                        <div class="flex items-center ml-1 text-[#006634]">
                                                            150
                                                            <div
                                                                class="items-center ml-1 text-[#808080] text-xs font-semibold">
                                                                Engagements </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 font-bold text-black">4</td>
                                        <td class="py-4 font-bold text-black ">1234</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 text-[#006634] text-xl font-bold">4</td>
                                        <td class="py-4 font-bold text-black w-1/3">

                                            <div class="relative flex  justify-center items-center text-center ">
                                                <label for="file_input"
                                                    class="cursor-pointer flex flex-col relative justify-center items-center rounded-full px-2 ">
                                                    <img src="image/dog.jpg" alt="Profile"
                                                        class="rounded-full object-cover w-12 h-12 shadow-lg ">

                                                </label>

                                                <div class="flex flex-col relative justify-start items-start  ">
                                                    <div class="text-center font-bold text-black text-xl">Paulo John
                                                        Jimenea</div>
                                                    <div
                                                        class="flex items-center text-xs font-bold text-black justify-center ">
                                                        <div class="flex items-center text-[#006634]">
                                                            100
                                                            <div
                                                                class="items-center ml-1 text-[#808080] text-xs font-semibold truncate">
                                                                Connection | </div>
                                                        </div>
                                                        <div class="flex items-center ml-1 text-[#006634]">
                                                            150
                                                            <div
                                                                class="items-center ml-1 text-[#808080] text-xs font-semibold">
                                                                Engagements </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 font-bold text-black">4</td>
                                        <td class="py-4 font-bold text-black">1234</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>

        </div>
    @endsection
