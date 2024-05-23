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
                        <div class="w-36 h-36 bg-white border-4 border-[#F8F8F8] rounded-full justify-center mx-auto max-w-lg flex items-center relative">
                            <div class="relative group w-full h-full">
                                <label for="file_input" class="cursor-pointer rounded-full w-full h-full">
                                    <img src="image/dog.jpg" alt="Profile" 
                                        class="w-full h-full rounded-full object-cover transition duration-300 ease-in-out transform hover:scale-110">
                                    <div class="absolute inset-0 bg-black opacity-0 rounded-full group-hover:opacity-30 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current text-white">
                                            <path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                        </svg>
                                    </div>
                                </label>
                                <input id="file_input" type="file" class="hidden" />
                            </div>
                        </div>
                    </div>
                    <div>


                    </div>
                    <h1 class="flex flex-row mx-auto max-y-md max-w-lg  items-center justify-center text-center text-lg pt-2 font-bold text-black">
                       
                        {{ Auth::user()->name }}

                        {{-- Trophy Icon --}}
                            <div class="ml-1"> <div class="items-start text-start flex flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                    viewBox="0 0 512 512" id="trophy" fill="#EBC351">
                                    <path
                                        d="M479.863 103.342c-.051-2.833-.096-5.279-.096-7.342h-80.835c1.56-34.617.512-64 .512-64H256.876a9.76 9.76 0 0 0-1 .056 9.728 9.728 0 0 0-1-.056H111.945s-1.048 29.383.512 64H32V128h.161c.811 26.096 4.98 60.999 22.333 96.729 14.718 30.307 35.912 55.664 62.996 75.367 22.422 16.312 48.041 28.064 76.205 35.084C209.96 352.539 226 362.109 240 365.957v35.625C238 412.165 225.86 448 141.234 448H128v32h256v-32h-13.178C271.538 448 272 398.666 272 398.666v-32.714c14-3.843 29.73-13.374 45.91-30.644 28.369-7.004 54.072-18.801 76.633-35.213 27.082-19.703 48.262-45.06 62.98-75.367 23.68-48.761 22.803-96.005 22.34-121.386zM83.262 210.745C68.802 180.966 65.018 150.996 64.187 128h50.487c.868 8.914 1.966 17.701 3.356 25.98 8.513 50.709 20.213 95.493 42.354 135.009-33.838-17.141-60.414-43.84-77.122-78.244zm345.475 0c-16.807 34.61-43.603 61.421-77.729 78.55 22.215-39.591 33.816-84.475 42.352-135.314 1.39-8.28 2.488-17.067 3.356-25.98h51.096c-.831 22.995-4.614 52.965-19.075 82.744z" />
                                </svg>
                             
                            </div>
                        </div> 
                        <div class="ml-1">
                            <div class="items-start text-start flex fle-row"  data-twe-toggle="tooltip"
                            title="This user is Verified">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#006634" class="size-5 " 
              >
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                  </svg>
                                  
                                

                            </div>
                        </div>
                        
                    </h1>
                    <p class="text-xs mx-auto max-y-md max-w-lg flex items-center justify-center">
                        {{ Auth::user()->full_address }}
                    </p>
                    <div class="text-sm font-d mx-auto max-y-md max-w-lg flex items-center justify-center mt-2 mb-2" id="btn-ConnectContainer">
                        <div>
                            <button  class="btn shadow-lg inline-block rounded-md bg-[#006634] px-7 py-2 text-xs font-bold leading-normal text-white  transition duration-300 ease-in-out hover:bg-[#004423]  w-full">
                         Connect +
                            </button>
                            
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
                              An aspiring Web Developer currently enrolled in USLS, and completing his Computer Science Degree
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

                                            @forelse ($userProjects as $project)
                                                <div class="flex flex-col">
                                                    <div class="flex items-center pb-1">
                                                        <div class="w-12 h-12 bg-gray-300">
                                                            <!-- LOGO HERE -->
                                                        </div>

                                                        <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                                            <div class="font-bold text-base">
                                                                {{-- Title of Panel --}}
                                                                {{ $project->project }}

                                                                {{-- Edit Button --}}
                                                                <button class="ml-1"
                                                                    onclick="toggleModal('modal-idEditPanels', '{{ $project->id }}')">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24"
                                                                        class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                                                        <path
                                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                                    </svg>
                                                                    
                                                                </button>

                                                                {{-- Delete Button --}}
                                                                <form
                                                                    action="{{ route('projects.destroy', $project->id) }}"
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
                                                            <div class="font-regular text-sm">{{ $project->description }}
                                                            </div>

                                                            {{-- Date --}}
                                                            <div class="flex flex-row">
                                                                <p class="flex text-xs font-regular opacity-70 pr-1">Start
                                                                    Date:
                                                                    {{ \Carbon\Carbon::parse($project->date_started)->format('d/m/Y') }}
                                                                    |</p>
                                                                <p class="flex text-xs font-regular opacity-70">End Date:
                                                                    {{ $project->date_ended ? \Carbon\Carbon::parse($project->date_ended)->format('d/m/Y') : 'Not set' }}
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

                                                        {{-- Edit Button --}}
                                                        <button class=" ml-1" onclick="toggleModal('idSkillsPanel')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                        <button class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="14" height="14" viewBox="0 0 30 30"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                </path>
                                                            </svg>
                                                        </button>

                                                    </div>

                                                    {{-- Description --}}
                                                    <div class="font-regular text-sm">{{ $skills->description }}</div>

                                                    {{-- Date --}}
                                                    <div class="flex flex-row">
                                                        <p class=" flex text-xs font-regular opacity-70 pr-1">Start
                                                            Date:
                                                            {{ \Carbon\Carbon::parse($skills->date_started)->format('d/m/Y') }}
                                                            | </p>
                                                        <p class=" flex text-xs font-regular opacity-70">End Date:
                                                            {{ $skills->date_ended ? \Carbon\Carbon::parse($skills->date_ended)->format('d/m/Y') : 'Not set' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Skills found.</p>
                                    @endforelse
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col w-full ">
                            <!-- Academics -->
                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg mb-2  shadow-lg ">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                                        onclick="toggleModal('modal-idExpPanel')">
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

                                                        {{-- Edit Button --}}
                                                        <button class=" ml-1" onclick="toggleModal('modal-idExpPanel')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                        <button class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="14" height="14" viewBox="0 0 30 30"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                </path>
                                                            </svg>
                                                        </button>

                                                    </div>

                                                    {{-- Description --}}
                                                    <div class="font-regular text-sm">{{ $academics->course }}</div>

                                                    {{-- Major --}}
                                                    <div class="font-regular text-sm">{{ $academics->major }}</div>

                                                    {{-- Date --}}
                                                    <div class="flex flex-row">
                                                        <p class=" flex text-xs font-regular opacity-70 pr-1">Start
                                                            Date:
                                                            {{ \Carbon\Carbon::parse($academics->date_started)->format('d/m/Y') }}
                                                            | </p>
                                                        <p class=" flex text-xs font-regular opacity-70">End Date:
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
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg ">

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

                                                <div class="ml-3 py-2 text-xs font-medium text-black  w-5/6">

                                                    <div class="font-bold text-base ">

                                                        {{-- Title of Honors And Awards --}}
                                                        {{ $honorsandawards->honorsandawards }}

                                                        {{-- Edit Button --}}
                                                        <button class=" ml-1"
                                                            onclick="toggleModal('modal-idAwardsHonorsPanel')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                            </svg>
                                                        </button>


                                                        {{-- Delete Button --}}
                                                        <button class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="14" height="14" viewBox="0 0 30 30"
                                                                class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634] ">
                                                                <path
                                                                    d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z">
                                                                </path>
                                                            </svg>
                                                        </button>

                                                    </div>

                                                    {{-- Issuer --}}
                                                    <div class="font-regular text-sm">{{ $honorsandawards->issuer }}</div>

                                                    {{-- Description --}}
                                                    <div class="font-regular text-sm">{{ $honorsandawards->description }}
                                                    </div>

                                                    {{-- Date --}}
                                                    <div class="flex flex-row">
                                                        <p class=" flex text-xs font-regular opacity-70 pr-1">Start
                                                            Date:
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
