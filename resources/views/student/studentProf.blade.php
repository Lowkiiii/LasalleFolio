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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" class="fill-current text-white">
                                            <path
                                                d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                        </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#EBC351" height="25" width="25" version="1.1" id="Capa_1" viewBox="0 0 296.084 296.084" xml:space="preserve" class="">
                                    <g>
                                        <path d="M191.27,84.676l24.919-21.389c4.182-3.572,7.52-11.037,7.52-16.537v-37c0-5.5-4.167-9.75-9.667-9.75h-58.333v76.689   C168.709,77.51,180.064,80.221,191.27,84.676z"/>
                                        <path d="M140.709,0H82.042c-5.5,0-10.333,4.25-10.333,9.75v37c0,5.5,3.588,12.922,7.77,16.494l24.928,21.428   c11.508-4.574,24.302-7.307,36.302-8.045V0z"/>
                                        <path d="M148.041,91.416c-56.516,0-102.332,45.816-102.332,102.334s45.816,102.334,102.332,102.334   c56.518,0,102.334-45.816,102.334-102.334S204.559,91.416,148.041,91.416z M148.041,275.377c-45.008,0-81.625-36.619-81.625-81.627   c0-45.01,36.617-81.627,81.625-81.627c45.01,0,81.627,36.617,81.627,81.627C229.668,238.758,193.051,275.377,148.041,275.377z"/>
                                        <path d="M148.041,127.123c-36.736,0-66.625,29.889-66.625,66.627s29.889,66.627,66.625,66.627   c36.738,0,66.627-29.889,66.627-66.627S184.779,127.123,148.041,127.123z"/>
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

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 opacity-30">
  <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
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
                                <div class="font-bold text-xl text-[#006634] ">0</div>
                                <div class="text-xs font-normal text-center truncate text-[#444444] font-medium">Points
                                    Garnered</div>
                            </div>

                            <div class="flex flex-col items-center mx-32 text-[#006634] ">
                                <div class="font-bold text-xl">0</div>
                                <div class="text-xs font-normal text-center truncate text-[#444444] font-medium">
                                    Students Connected</div>
                            </div>

                            <div class="flex flex-col items-center ml-32 text-[#006634] ">
                                <div class="font-bold text-xl">0</div>
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
                                An aspiring Web Developer currently enrolled in USLS, and completing his Computer Science
                                Degree
                            </div>
                        </div>
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
                                            <button class="hover:text-[#004423] ">
                                                · Zesto-Chat-Application
                                            </button>

                                            <div class="py-3 text-xs font-medium text-black items-start w-11/12">
                                                Credits to Antonio Erdeljac for his youtube video on how to create a
                                                Messenger like applicatio .</div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-col w-full mr-5">
                                <div class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg"
                                    onclick="to">

                                    <div class="absolute right-0 top-0 z-20">
                                        {{-- <button class="p-4" onclick="toggleModal('modal-idProjects')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button> --}}
                                    </div>

                                    <div class="relative">
                                        <div class="text-xl font-bold text-[#006634]">
                                            <button class="hover:text-[#004423]">
                                                · ReactJS Calculator
                                            </button>

                                            <div class="py-3 text-xs font-medium text-black items-start w-full">
                                                A simple React Calculator.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col w-full ">
                                <div class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg"
                                    onclick="to">

                                    <div class="absolute right-0 top-0 z-20">
                                        {{-- <button class="p-4" onclick="toggleModal('modal-idProjects')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634]">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button> --}}
                                    </div>

                                    <div class="relative">
                                        <div class="text-xl font-bold text-[#006634]">
                                            <button class="hover:text-[#004423]">
                                                · Money Transaction
                                            </button>

                                            <div class="py-3 text-xs font-medium text-black items-start w-full">
                                                A simple Money Transaction made with Laravel PHP
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

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
                                                    version="1.1" viewBox="0 0 512 512" width="18px"
                                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
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

                                                                
                                                    

                                                                <button class="ml-1" onclick="toggleModal('modal-idEditPanels-{{ $projects->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24"
                                                                        class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                        <path
                                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                                    </svg>
                                                                </button>

                                                                {{-- Delete Button --}}
                                                                <form
                                                                    action="{{ route('projects.destroy', $projects->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this project?')"
                                                                    class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="ml-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                            y="0px" width="14" height="14"
                                                                            viewBox="0 0 30 30"
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
                                                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink" id="modal-idSkillsEditPanel-{{ $skills->id }}">
                                                        <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
                                                            <div class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
                                                                <form action="{{ route('skills.update', $skills->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <!--header-->
                                                                    <div class="flex items-start w-full justify-between pt-4 rounded-t">
                                                                        <h3 class="text-base text-black font-bold "> Edit Skill </h3>
                                                                    </div>
                                                                    <!--body-->
                                                                    <div class="relative flex-auto">
                                                                        <p class=" mx-2 leading-relaxed">
                                                                            <div class="text-sm font-bold text-black pb-2 pt-5">Edit Title</div>
                                                                            <input type="text" class="text-black text-xs rounded-xl peer block min-h-[auto] w-full bg-gray-100 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('skills') border-2 border-red-500 @enderror" name="skills" placeholder="Enter title" value="{{ $skills->skills }}" />
                                                                            @error('skills') <span class="text-red-500">{{ $message }}</span> @enderror
                                                                        </p>
                                                                        <p class=" mx-2 leading-relaxed">
                                                                            <div class="text-sm font-bold text-black pb-2 pt-5">Content</div>
                                                                            <textarea class="appearance-none resize-none bg-gray-100 text-sm font-normal outline-none rounded-xl overflow-hidden px-3 py-2 leading-[2.15] w-full h-[10rem] @error('description') border-2 border-red-500 @enderror" name="description" placeholder="Enter content">{{ $skills->description }}</textarea>
                                                                            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                                                                        </p>
                                                                    </div>
                                                                    <!--footer-->
                                                                    <div class="flex items-center justify-end p-4">
                                                                        <button class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-idSkillsEditPanel-{{ $skills->id }}')"> Close </button>
                                                                        <button class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit"> Save </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idSkillsEditPanel-{{ $skills->id }}-backdrop"></div>

                                                        <button class="ml-1" onclick="toggleModal('modal-idSkillsEditPanel-{{ $skills->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                                <form
                                                                    action="{{ route('skills.destroy', $skills->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this skill?')"
                                                                    class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="ml-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                            y="0px" width="14" height="14"
                                                                            viewBox="0 0 30 30"
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
                                                    

                                                        <button class="ml-1" onclick="toggleModal('modal-idEditAcademicPanel-{{ $academics->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                                <form
                                                                    action="{{ route('academics.destroy', $academics->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this academic?')"
                                                                    class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="ml-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                            y="0px" width="14" height="14"
                                                                            viewBox="0 0 30 30"
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
                                                        {{ $academics->course }}</div>
                                                
                                                    {{-- Major --}}
                                                    <div class="flex font-normal text-sm">
                                                        <h1 class="flex font-bold mr-1">Major: </h1>
                                                        {{ $academics->major }}</div>

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
                                                                <!-- Edit Modal -->
                                                                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink" id="modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}">
                                                                    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
                                                                        <div class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
                                                                            <form action="{{ route('honorsandawards.update', $honorsandawards->id) }}" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <!--header-->
                                                                                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                                                                                    <h3 class="text-base text-black font-bold "> Edit honorsandawards </h3>
                                                                                </div>
                                                                                <!--body-->
                                                                                <div class="relative flex-auto">
                                                                                    <p class=" mx-2 leading-relaxed">
                                                                                        <div class="text-sm font-bold text-black pb-2 pt-5">Edit title</div>
                                                                                        <input type="text" class="text-black text-xs rounded-xl peer block min-h-[auto] w-full bg-gray-100 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('title') border-2 border-red-500 @enderror" name="title" placeholder="Enter insitution" value="{{ $honorsandawards->title }}" />
                                                                                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                                                                                    </p>
                                                                                    <p class=" mx-2 leading-relaxed">
                                                                                        <div class="text-sm font-bold text-black pb-2 pt-5">Edit title</div>
                                                                                        <input type="text" class="text-black text-xs rounded-xl peer block min-h-[auto] w-full bg-gray-100 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('issuer') border-2 border-red-500 @enderror" name="issuer" placeholder="Enter insitution" value="{{ $honorsandawards->issuer }}" />
                                                                                        @error('issuer') <span class="text-red-500">{{ $message }}</span> @enderror
                                                                                    </p>
                                                                                    <p class=" mx-2 leading-relaxed">
                                                                                        <div class="text-sm font-bold text-black pb-2 pt-5">Edit description</div>
                                                                                        <input type="text" class="text-black text-xs rounded-xl peer block min-h-[auto] w-full bg-gray-100 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('description') border-2 border-red-500 @enderror" name="description" placeholder="Enter course" value="{{ $honorsandawards->description }}" />
                                                                                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                                                                                    </p>

                                                                                    <div class="flex flex-row justify-start items-start rounded-xl mt-4 py-2">
                                                                                        <div class="text-xs flex-col flex font-semibold items-start justify-start truncate text-black px-1 w-full mt-auto mb-2">
                                                                                            Start
                                                                                            <input type="date" class="text-black font-normal text-xs rounded-xl peer block min-h-[auto] w-full bg-gray-100 px-3 py-1 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_issue') border-2 border-red-500 @enderror" id="" name="date_issue" placeholder="Start Date" value="{{ old('date_issue', $honorsandawards->date_issue ? $honorsandawards->date_issue->format('Y-m-d') : '') }}" />
                                                                                            @error('date_issue') <span class="text-red-500">{{ $message }}</span> @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--footer-->
                                                                                <div class="flex items-center justify-end p-4">
                                                                                    <button class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}')"> Close </button>
                                                                                    <button class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit"> Save </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}-backdrop"></div>

                                                        <button class="ml-1" onclick="toggleModal('modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}')">
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
                                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                            y="0px" width="14" height="14"
                                                                            viewBox="0 0 30 30"
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
                                                        <h1 class="flex font-bold mr-1">Issuer: </h1>{{ $honorsandawards->issuer }}</div>

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
            </div>
        </div>
        @include('modal.modalPanels')
    @endsection
