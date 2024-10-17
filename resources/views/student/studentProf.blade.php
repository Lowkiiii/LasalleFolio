@extends('layouts.app')

@section('webtitle')
    Profile
@endsection


@section('content')
    <section class="h-screen bg-[#F8F8F8]">


        <div class="flex row min-h-full mt-24 justify-center relative bg-[#F8F8F8]">


            <div class=" mx-auto  max-w-[85rem] mt-4  animate-blink">
                <div class="flex flex-row border-InputGray rounded-xl w-full">
                    <div class=" container">
                        <img src='/image/profileBG.png' class="w-full h-[20rem] object-cover rounded-xl  " />
                    </div>
                </div>
                <div class="z-20  mx-auto max-w-full -translate-y-24">
                    <div class="justify-center items-center">
                        <div
                            class="w-36 h-36 bg-white border-4 border-[#F8F8F8] rounded-full justify-center mx-auto max-w-lg flex items-center relative">
                            <div class="relative group w-full h-full">
                                <label for="file_input" class="cursor-pointer rounded-full w-full h-full">
                                    <img src="image/dog.jpg" alt="Profile"
                                        class="w-full h-full rounded-full object-cover transition duration-300 ease-in-out transform hover:scale-110">
                                    <div
                                        class="absolute inset-0 bg-black opacity-0 rounded-full group-hover:opacity-30 flex items-center justify-center">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" class="fill-current text-white">
                                            <path
                                                d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                        </svg> --}}
                                        <x-fas-pen class="fill-current text-white w-10 h-10" />
                                    </div>
                                </label>
                                <input id="file_input" type="file" class="hidden" />
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <h1
                        class="flex flex-row mx-auto max-y-md max-w-lg  items-center justify-center text-center text-lg pt-2 font-bold text-black">

                        {{ Auth::user()->name }}
                        <div class="ml-1">
                            <div class="items-start text-start flex flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="#EBC351" height="25" width="25" version="1.1" id="Capa_1"
                                    viewBox="0 0 296.084 296.084" xml:space="preserve" class="">
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



                            </div>
                        </div>
                        <div class="ml-1">
                            <div class="items-start text-start flex fle-row" data-twe-toggle="tooltip"
                                title="This user is Not Verified">
                                {{-- 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#006634" class="size-5 ">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg> --}}

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 opacity-30">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                        clip-rule="evenodd" />
                                </svg>


                            </div>
                        </div>

                    </h1>
                    <p class="text-xs mx-auto max-y-md max-w-lg flex items-center justify-center">
                        {{ Auth::user()->full_address }}
                    </p>
                    <div class="text-sm font-d mx-auto max-y-md max-w-lg flex items-center justify-center mt-2 mb-2"
                        id="btn-ConnectContainer">
                        <div>
                            {{-- <button  class="btn shadow-lg inline-block rounded-md bg-[#006634] px-7 py-2 text-xs font-bold leading-normal text-white  transition duration-300 ease-in-out hover:bg-[#004423]  w-full">
                         Connect +
                            </button> --}}

                            <script>
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


                    <div class="flex items-center justify-center py-6 px-6">
                        <div class="flex">
                            <div class="flex flex-col items-center mr-32 ">
                                <div class="font-bold text-xl text-[#006634] ">{{ $points }}</div>
                                <div class="text-xs font-normal text-center truncate text-[#444444] font-medium">Points
                                    Garnered</div>
                            </div>

                            <div class="flex flex-col items-center mx-32 text-[#006634]">
                                <div class="font-bold text-xl">{{ $connectedStudentsCount }}</div>
                                <div class="text-xs font-normal text-center truncate text-[#444444] font-medium">
                                    Students Connected
                                </div>
                            </div>

                            <div class="flex flex-col items-center ml-32 text-[#006634] ">
                                <div class="font-bold text-xl">{{ $projectCount }}</div>
                                <div class="text-xs font-normal text-center truncate text-[#444444] font-medium">
                                    Projects Posted</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-xs font-medium text-center justify-center ">
                        <div class=" mt-4 text-black font-bold text-lg"> About Me <button class="opacity-70"
                                onclick="toggleModal('modal-idAboutMe')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                    class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                    <path
                                        d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                </svg>
                            </button> </div>
                        <div class="flex mt-2 text-sm font-medium text-center justify-center">
                            <div class="w-3/4 text-black">
                                {{ $bio->bio ?? 'No bio available.' }}
                            </div>
                        </div>
                        <form action="{{ route('bio.remove', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE') <!-- Use DELETE method for removing -->
                            <button
                                class="bg-red-500 text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="submit">
                                Remove
                            </button>
                        </form>
                    </div>
                    <div class="mr-10 mt-10 w-full ">
                        <h1 class="font-bold text-black py-2">Pinned Project Showcase</h1>

                        <div class="flex  animate-blink animation-delay-100">
                            <div class="flex flex-col w-full mr-5 ">
                                <div
                                    class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg shadow-lg  ">

                                    <div class="absolute right-0 top-0 z-20">
                                        {{-- <button class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]  "onclick="toggleModal('modal-idEditShowcase')">
                                                <path d=" M7.127 22.562l-7.127 1.438 1.438-7.128 5.689
                                                        5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816
                                                        2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button> --}}
                                    </div>

                                    <div class="relative">
                                        <div class="text-xl font-bold text-[#006634]">

                                            <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                                                onclick="toggleModal('modal-idPinnedProjects')">
                                                <!DOCTYPE svg
                                                    PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                                <svg enable-background="new 0 0 512 512" height="18px" id="Layer_1"
                                                    version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path
                                                        d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z" />
                                                </svg>


                                            </button>

                                            @foreach ($pinnedProjects as $pinnedProject)
                                                <div>
                                                    <button class="hover:text-[#004423]">
                                                        ·
                                                        {{ $pinnedProject->project->project ?? 'Project Name Not Available' }}
                                                    </button>
                                                    <div class="py-3 text-xs font-medium text-black items-start w-11/12">
                                                        {{ $pinnedProject->project->description ?? 'No description available' }}
                                                    </div>

                                                    <!-- Remove button form -->
                                                    <form action="{{ route('pinnedProjects.remove', $pinnedProject->id) }}"
                                                        method="POST" class="inline-block">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-red-500 text-xs">Remove</button>
                                                    </form>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Add Button for Projects --}}

                            {{-- <div class="flex flex-col w-full">
                                <div class="relative flex flex-wrap w-full items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg hover:bg-gray-200 "
                                    onclick="toggleModal('modal-idAddShowcase')">

                                    <div class="justify-center mx-auto max-y-md max-w-lg flex items-center ">
                                        <div class="  justify-center mx-auto max-y-md max-w-lg flex items-center">
                                            <div class="text-xl font-bold  opacity-70">
                                                <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]">

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
                            class="text-sm font-medium text-black py-4 hover:text-[#006634] ">Customize Showcase</button>
                    </div>

                    <div class="flex animate-blink animation-delay-200">

                        <div class="flex flex-col w-full mr-2">

                            <div class="container mx-auto">
                                <div
                                    class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg shadow-lg mb-2">
                                    <div class="absolute right-0 top-0 z-20">
                                        {{-- Add Project Button --}}

                                        <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                                            onclick="toggleModal('modal-idPanels')">
                                            <!DOCTYPE svg
                                                PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                            <svg enable-background="new 0 0 512 512" height="18px" id="Layer_1"
                                                version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z" />
                                            </svg>


                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="relative text-xl font-bold text-[#006634]">
                                            <div class="text-black">Project</div>
                                        </div>

                                        @forelse ($userProjects as $projects)
                                            <div class="flex flex-col">
                                                <div class="flex items-center pb-1">
                                                    <div class="w-12 h-12 bg-gray-300">
                                                        <!-- LOGO HERE -->
                                                    </div>

                                                    <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                        <div class="font-bold text-base">
                                                            {{-- Title of Panel --}}
                                                            {{ $projects->project }}




                                                            <button class="ml-1"
                                                                onclick="toggleModal('modal-idEditPanels-{{ $projects->id }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24"
                                                                    class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                    <path
                                                                        d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                                </svg>
                                                            </button>

                                                            {{-- Delete Button --}}
                                                            <form action="{{ route('projects.destroy', $projects->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this project?')"
                                                                class="inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="ml-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                        width="14" height="14" viewBox="0 0 30 30"
                                                                        class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                        <path
                                                                            d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>



                                                        {{-- Description --}}
                                                        <div class="font-normal text-sm">{{ $projects->description }}
                                                        </div>

                                                        {{-- Date --}}
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

                            <!-- skills -->

                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg ">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                                        onclick="toggleModal('modal-idSkillsPanel')">
                                        <!DOCTYPE svg
                                            PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                        <svg enable-background="new 0 0 512 512" height="18px" id="Layer_1"
                                            version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path
                                                d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z" />
                                        </svg>

                                    </button>
                                </div>


                                <div class="relative">

                                    <div class="relative text-xl font-bold text-[#006634]">
                                        <div class="text-black">Skills</div>
                                    </div>

                                    @forelse ($userSkills as $skills)
                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-12 h-12 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>

                                                <div class="ml-3 py-2 text-xs font-medium text-black  w-5/6">

                                                    <div class="font-bold text-base ">

                                                        {{-- Title of Skills --}}
                                                        {{ $skills->skills }}
                                                        <!-- Edit Modal -->
                                                        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink"
                                                            id="modal-idSkillsEditPanel-{{ $skills->id }}">
                                                            <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
                                                                <div
                                                                    class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
                                                                    <form
                                                                        action="{{ route('skills.update', $skills->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <!--header-->
                                                                        <div
                                                                            class="flex items-start w-full justify-between pt-4 rounded-t">
                                                                            <h3 class="text-base text-black font-bold ">
                                                                                Edit Skill </h3>
                                                                        </div>
                                                                        <!--body-->
                                                                        <div class="relative flex-auto">
                                                                            <p class=" mx-2 leading-relaxed">
                                                                            <div
                                                                                class="text-sm font-bold text-black pb-2 pt-5">
                                                                                Edit Title</div>
                                                                            <input type="text"
                                                                                class="text-black text-xs rounded-xl peer block min-h-[auto] w-full bg-gray-100 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('skills') border-2 border-red-500 @enderror"
                                                                                name="skills" placeholder="Enter title"
                                                                                value="{{ $skills->skills }}" />
                                                                            @error('skills')
                                                                                <span
                                                                                    class="text-red-500">{{ $message }}</span>
                                                                            @enderror
                                                                            </p>
                                                                            <p class=" mx-2 leading-relaxed">
                                                                            <div
                                                                                class="text-sm font-bold text-black pb-2 pt-5">
                                                                                Content</div>
                                                                            <textarea
                                                                                class="appearance-none resize-none bg-gray-100 text-sm font-normal outline-none rounded-xl overflow-hidden px-3 py-2 leading-[2.15] w-full h-[10rem] @error('description') border-2 border-red-500 @enderror"
                                                                                name="description" placeholder="Enter content">{{ $skills->description }}</textarea>
                                                                            @error('description')
                                                                                <span
                                                                                    class="text-red-500">{{ $message }}</span>
                                                                            @enderror
                                                                            </p>
                                                                        </div>
                                                                        <!--footer-->
                                                                        <div class="flex items-center justify-end p-4">
                                                                            <button
                                                                                class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                                                type="button"
                                                                                onclick="toggleModal('modal-idSkillsEditPanel-{{ $skills->id }}')">
                                                                                Close </button>
                                                                            <button
                                                                                class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                                                type="submit"> Save </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black"
                                                            id="modal-idSkillsEditPanel-{{ $skills->id }}-backdrop">
                                                        </div>

                                                        <button class="ml-1"
                                                            onclick="toggleModal('modal-idSkillsEditPanel-{{ $skills->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                        <form action="{{ route('skills.destroy', $skills->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this skill?')"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                    width="14" height="14" viewBox="0 0 30 30"
                                                                    class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                    <path
                                                                        d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>

                                                    </div>

                                                    {{-- Description --}}
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
                        <!-- Academics -->

                        <div class="flex flex-col w-full ">

                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg mb-2  shadow-lg ">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                                        onclick="toggleModal('modal-idAcademics')">
                                        <!DOCTYPE svg
                                            PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                        <svg enable-background="new 0 0 512 512" height="18px" id="Layer_1"
                                            version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path
                                                d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z" />
                                        </svg>

                                    </button>
                                </div>


                                <div class="relative">

                                    <div class="relative text-xl font-bold text-[#006634]">
                                        <div class="text-black">Academics</div>
                                    </div>

                                    @forelse ($userAcademics as $academics)
                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-12 h-12 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>

                                                <div class="ml-3 py-2 text-xs font-medium text-black  w-5/6">

                                                    <div class="font-bold text-base ">

                                                        {{-- Title of Academics --}}
                                                        {{ $academics->academics }}


                                                        {{ $academics->education_insitution }}
                                                        <!-- Edit Modal -->


                                                        <button class="ml-1"
                                                            onclick="toggleModal('modal-idEditAcademicPanel-{{ $academics->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                        <form action="{{ route('academics.destroy', $academics->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this academic?')"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                    width="14" height="14" viewBox="0 0 30 30"
                                                                    class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                    <path
                                                                        d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>

                                                    </div>

                                                    {{-- Description --}}


                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Course: </h1>
                                                        {{ $academics->course }}
                                                    </div>

                                                    {{-- Major --}}
                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Major: </h1>
                                                        {{ $academics->major }}
                                                    </div>

                                                    {{-- Date --}}
                                                    <div class="flex flex-row">
                                                        <p class=" flex text-xs font-normal opacity-70 pr-1">Start
                                                            Date:
                                                            {{ \Carbon\Carbon::parse($academics->date_started)->format('d/m/Y') }}
                                                            | </p>
                                                        <p class=" flex text-xs font-normal opacity-70">End Date:
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





                            <!-- Awards and Honors -->
                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg mb-2  shadow-lg ">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                                        onclick="toggleModal('modal-idAwardsHonorsPanel')">
                                        <!DOCTYPE svg
                                            PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                        <svg enable-background="new 0 0 512 512" height="18px" id="Layer_1"
                                            version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path
                                                d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z" />
                                        </svg>

                                    </button>
                                </div>


                                <div class="relative">

                                    <div class="relative  text-xl font-bold text-[#006634]">
                                        <div class="text-black">Honors and Awards</div>
                                    </div>

                                    @forelse ($userHonorsAndAwards as $honorsandawards)
                                        <div class="flex flex-col">
                                            <div class="flex items-center pb-1">
                                                <div class="w-12 h-12 bg-gray-300">
                                                    <!-- LOGO HERE -->
                                                </div>

                                                <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                    <div class="font-bold text-base">
                                                        {{-- Title of honorsandawards --}}
                                                        {{ $honorsandawards->honorsandawards }}

                                                        {{-- Title --}}
                                                        {{ $honorsandawards->title }}


                                                        <button class="ml-1"
                                                            onclick="toggleModal('modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                        <form
                                                            action="{{ route('honorsandawards.destroy', $honorsandawards->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this honor and award?')"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                    width="14" height="14" viewBox="0 0 30 30"
                                                                    class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                    <path
                                                                        d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>

                                                    </div>

                                                    <div class="flex font-normal">

                                                    </div>


                                                    {{-- Issuer --}}
                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Issuer: </h1>
                                                        {{ $honorsandawards->issuer }}
                                                    </div>

                                                    {{-- Description --}}
                                                    <div class="font-normal text-sm">
                                                        {{ $honorsandawards->description }}
                                                    </div>

                                                    {{-- Date --}}
                                                    <div class="flex flex-row">
                                                        <p class=" flex text-xs font-normal opacity-70 pr-1">Date
                                                            Issued:
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
                </div>

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
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27" height="27"
                                    viewBox="0 0 30 30" fill="#D40000">
                                    <path
                                        d="M 4 5 C 2.895 5 2 5.895 2 7 L 2 23 C 2 24.105 2.895 25 4 25 L 26 25 C 27.105 25 28 24.105 28 23 L 28 7 C 28 5.895 27.105 5 26 5 L 4 5 z M 23 8 C 24.105 8 25 8.895 25 10 C 25 11.105 24.105 12 23 12 C 21.895 12 21 11.105 21 10 C 21 8.895 21.895 8 23 8 z M 9 12.001953 C 9.61925 12.001953 10.238437 12.238437 10.710938 12.710938 L 13.972656 15.972656 L 15 17 L 16.15625 18.15625 C 16.57825 18.57825 17.259641 18.574344 17.681641 18.152344 C 18.104641 17.730344 18.104641 17.044094 17.681641 16.621094 L 16.529297 15.470703 L 17.289062 14.710938 C 18.234063 13.765937 19.765937 13.765937 20.710938 14.710938 L 25 19 L 25 22 L 5 22 L 5 15 L 7.2890625 12.710938 C 7.7615625 12.238437 8.38075 12.001953 9 12.001953 z">
                                    </path>

                                </svg>
                                <div class="text-sm text-center text-[#D40000] font-bold flex px-2" {{-- onclick="toggleModal('modal-idPostImage')" --}}>
                                    Image
                                </div>
                            </div>
                        </button>
                        <button class="mx-auto">
                            <div class=" items-center text-center flex px-8 text-[#424242]">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27" height="27"
                                    viewBox="0 0 30 30 " fill="#424242">
                                    <path
                                        d="M24.707,8.793l-6.5-6.5C18.019,2.105,17.765,2,17.5,2H7C5.895,2,5,2.895,5,4v22c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2 V9.5C25,9.235,24.895,8.981,24.707,8.793z M18,21h-8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1 C19,20.552,18.552,21,18,21z M20,17H10c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h10c0.552,0,1,0.448,1,1C21,16.552,20.552,17,20,17 z M18,10c-0.552,0-1-0.448-1-1V3.904L23.096,10H18z">
                                    </path>
                                </svg>
                                <div class="text-sm text-center  font-bold flex px-2" {{-- onclick="toggleModal('modal-idPostDocument')" --}}>
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

                @forelse ($userPosts as $post)
                    <div class="w-full mb-4 relative items-start p-6 border border-[#D4D4D4] rounded-xl shadow-lg">
                        <div class="absolute right-0 top-0 z-20">
                            {{-- Edit Post Button --}}
                            <div class=" p-4">
                                <button id="editButton">
                                    <label for="file_input" class=" cursor-pointer shadow-md rounded-full opacity-70">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            fill="#000000" height="20" width="20" version="1.1" id="Capa_1"
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
                            <div class="w-12 h-12 rounded-full mr-2">
                                <div class="relative group">
                                    <img src="{{ asset('image/dog.jpg') }}" alt="Profile"
                                        class="w-full h-full rounded-full object-cover">
                                </div>
                            </div>
                            <div class="text-sm font-bold text-black flex flex-col">
                                <div class="flex items-center">
                                    <span>{{ $post->user->name }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#EBC351" height="15" width="15" version="1.1" id="Capa_1"
                                        viewBox="0 0 296.084 296.084" xml:space="preserve" class="shadow-xl">
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
                        <div class="flex flex-row items-start justify-start">
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
                                <div class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                    <span class="reaction-count">{{ $post->reaction_count }}</span>
                                </div>
                            </button>


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
                                                <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
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
                            <div class="flex flex-row justify-center items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex flex-row text-sm px-2 font-bold items-center justify-center text-black">
                                    0</div>
                            </div>
                        </div>
                        <hr class="my-4 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />
                        <div>
                            {{-- <div class=" flex items-center ">
                                <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
                                    <label for="file_input" class="cursor-pointer w-full h-full">
                                        <img src="image/Kersch.png" alt="Profile" class="w-full h-full object-cover">
                                    </label>
                                </div>
                            </div> --}}

                            {{-- comments --}}
                            @if ($post->comments->isNotEmpty())
                                @foreach ($post->comments as $comment)
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full overflow-hidden shadow-lg mr-2">
                                            <label for="file_input" class="cursor-pointer w-full h-full">
                                                <img src="image/Kersch.png" alt="Profile"
                                                    class="w-full h-full object-cover">
                                            </label>
                                        </div>
                                        <div class="text-sm font-bold text-black">
                                            <div class="flex">
                                                {{ $comment->user->name }} <!-- Display the name of the comment's user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#7A601D" height="15"
                                                    width="15" viewBox="0 0 296.084 296.084" class="shadow-xl">
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
                                            <div class="text-sm font-medium text-black">{{ $comment->content }}</div>
                                            <!-- Display comment content -->
                                            <div class="flex flex-row py-1">
                                                <div class="flex flex-row text-xs font-medium opacity-70 mr-3">· Just Now!
                                                </div>
                                                <button class="flex flex-row text-xs opacity-70"
                                                    onclick="toggleReply()">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No comments yet.</p>
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
                            <div class="flex-grow">
                                <input type="text" id="commentInput{{ $post->id }}"
                                    placeholder="Add a comment..."
                                    class="outline-none text-xs w-full py-2 px-3 bg-gray-200 rounded-2xl">
                            </div>
                            <button onclick="postComment({{ $post->id }})"
                                class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">
                                Post
                            </button>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <hr class="my-7 h-0.5 border-t-0 rounded-full bg-gray-300 opacity-60" />
        @include('modal.modalPanels')
        @include('modal.PinnedProjectShowcaseModal')
    @endsection
