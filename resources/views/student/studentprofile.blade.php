@extends('layouts.app')
@section('webtitle')
    Profile
@endsection

@section('content')
    <section class="h-screen bg-white">


        <div class="flex row min-h-full justify-center relative">

            <div class="z-10 mx-auto max-w-[85rem]">
                <div class="flex flex-row border border-InputGray rounded-xl drop-shadow-2xl shadow-[#006634] w-full ">
                    <div class=" container">
                        <img src='/image/profileBG.png' class="w-full h-full object-cover " />
                    </div>
                </div>
                <div class="z-20  mx-auto max-w-full -translate-y-24">
                    <div class="justify-center items-center ">
                        <div
                            class="w-36 h-36 bg-gray-200 rounded-full justify-center mx-auto max-w-lg flex items-center shadow-lg relative">
                            <div class="relative group">
                                <label for="file_input" class="cursor-pointer">
                                    <img src="image/dog.jpg" alt="Profile"
                                        class="w-full h-full rounded-full object-cover transition duration-300 ease-in-out transform hover:scale-110"
                                        style="filter: grayscale(100%);">
                                    <div
                                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 flex rounded-full items-center justify-center">
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
                                Lorem ipsum dolor sit amet consectetur. Tristique est felis sollicitudin vitae egestas
                                elit quis. Massa amet etiam et netus quis ullamcorper orci integer. Amet etiam metus
                                tincidunt diam diam. Aliquam molestie ullamcorper est turpis aliquam nibh condimentum.
                            </div>
                        </div>
                    </div>
                    <div class="mr-10 mt-10 w-full ">
                        <h1 class="font-bold text-black py-2">Project Showcase</h1>

                        <div class="flex ">
                            <div class="flex flex-col w-full mr-5">
                                <div
                                    class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg shadow-lg  " ">

                                    <div class="absolute right-0 top-0 z-20">
                                        <button class="p-4" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24"
                                                class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                <path
                                                    d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <div class="text-xl font-bold text-[#006634]">
                                            <button class="hover:text-[#004423] ">
                                                · Zesto-Chat-Application
                                            </button>

                                            <div class="py-3 text-xs font-medium text-black items-start">
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
                                        <button class="p-4" onclick="toggleModal('modal-idProjects')">
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
                                                · Project Name
                                            </button>

                                            <div class="py-3 text-xs font-medium text-black items-start">
                                                Lorem ipsum dolor sit amet consectetur. Tristique est felis sollicitudin
                                                vitae egestas
                                                elit quis. Massa amet etiam et netus quis ullamcorper orci integer. .
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col w-full">
                                <div class="relative flex flex-wrap w-full items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg hover:bg-gray-200 "  onclick="toggleModal('modal-idProjects')">
                                  
                                    <div class="justify-center mx-auto max-y-md max-w-lg flex items-center ">
                                        <div class="  justify-center mx-auto max-y-md max-w-lg flex items-center">
                                            <div class="text-xl font-bold  opacity-70">
                                                <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]" onclick="toggleModal('modal-idProjects')">
                                                    <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="18px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <div class="text-sm font-medium text-black py-4 ">Customize Showcase</div>
                    </div>

                    <div class="flex">



                        {{-- FIRST COLUMN --}}

                        <div class="flex flex-col w-full mr-1">
                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg  shadow-lg  ">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]" onclick="toggleModal('modal-idPanels')">
                                      
                                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="18px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z"/></svg>
                                       
                                    </button>
                                </div>

                                <div class="relative">
                                    <div class="relative py-2 text-xl font-bold text-[#006634]">
                                        <div class="text-black">
                                            Projects
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex items-center pb-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">

                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                        onclick="toggleModal('modal-idProjects')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" viewBox="0 0 24 24"
                                                            class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                            <path
                                                                d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                        </svg>
                                                    </button>
                                                </div> 
                                                    Lorem ipsum dolor sit amet
                                                consectetur.
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg mt-2   shadow-lg ">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]" onclick="toggleModal('modal-idPanels')">
                                      
                                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="18px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z"/></svg>
                                       
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
                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                    onclick="toggleModal('modal-idProjects')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 24 24"
                                                        class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                            </div> 
                                                Lorem ipsum dolor sit amet
                                            consectetur.
                                        </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col w-full ml-1">
                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10  py-[1.8rem] px-2 border border-[#939393] rounded-lg   shadow-lg  ">

                                <div class="absolute right-0 top-0">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]" onclick="toggleModal('modal-idPanels')">
                                      
                                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="18px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z"/></svg>
                                       
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
                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                    onclick="toggleModal('modal-idProjects')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 24 24"
                                                        class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                            </div> 
                                                Lorem ipsum dolor sit amet
                                            consectetur.
                                        </div>
                                        </div>

                                        <div class="flex items-center pb-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                    onclick="toggleModal('modal-idProjects')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 24 24"
                                                        class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                            </div> 
                                                Lorem ipsum dolor sit amet
                                            consectetur.
                                        </div>
                                        </div>

                                        <div class="flex items-center pb-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                    onclick="toggleModal('modal-idProjects')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 24 24"
                                                        class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                            </div> 
                                                Lorem ipsum dolor sit amet
                                            consectetur.
                                        </div>
                                        </div>

                                    </div>



                                </div>

                            </div>



                            <div
                                class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg mt-2   shadow-lg">

                                <div class="absolute right-0 top-0 z-20">
                                    <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]" onclick="toggleModal('modal-idPanels')">
                                      
                                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="18px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.391,0,256C0,114.609,114.625,0,256,0c141.391,0,256,114.609,256,256  C512,397.391,397.391,512,256,512z M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192  S362.047,64,256,64z M288,384h-64v-96h-96v-64h96v-96h64v96h96v64h-96V384z"/></svg>
                                       
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
                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                    onclick="toggleModal('modal-idProjects')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 24 24"
                                                        class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                            </div> 
                                                Lorem ipsum dolor sit amet
                                            consectetur.
                                        </div>
                                        </div>
                                        <div class="flex items-center pb-1">
                                            <div class="w-11 h-10 bg-gray-300">
                                                <!-- LOGO HERE -->
                                            </div>
                                            <div class="ml-3 py-3 text-xs font-medium text-black">
                                                <div class="font-bold text-sm">CONTENT HERE <button class="px-1"
                                                    onclick="toggleModal('modal-idProjects')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 24 24"
                                                        class="fill-current text-[#6e6e6e] hover:text-[#006634] ">
                                                        <path
                                                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                                    </svg>
                                                </button>
                                            </div> 
                                                Lorem ipsum dolor sit amet
                                            consectetur.
                                        </div>
                                        </div>

                                    </div>
                                </div>





                            </div>






                        </div>

                    </div>
                @endsection
