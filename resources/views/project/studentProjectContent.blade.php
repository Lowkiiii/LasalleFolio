

<div class="container mx-auto">
  <div class="w-full relative flex flex-wrap items-start space-x-3 mr-10 py-[1.8rem] px-2 border border-[#939393] rounded-lg shadow-lg mb-2">
        <div class="absolute right-0 top-0 z-20">
            {{-- Add Project Button --}}
           
                <button class="p-4 fill-current text-[#6e6e6e] hover:text-[#006634]"
                onclick="toggleModal('modal-idPanels')">
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
                            <button class="ml-1" onclick="toggleModal('modal-idEditPanels', '{{ $project->id }}')">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                    <path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                                </svg>
                            </button>                       

                            {{-- Delete Button --}}
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="14" height="14" viewBox="0 0 30 30" class="fill-current text-[#6e6e6e] opacity-80 hover:text-[#006634]">
                                        <path d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        {{-- Description --}}
                        <div class="font-regular text-sm">{{ $project->description }}</div>

                        {{-- Date --}}
                        <div class="flex flex-row">
                            <p class="flex text-xs font-regular opacity-70 pr-1">Start Date: {{ \Carbon\Carbon::parse($project->date_started)->format('d/m/Y') }} |</p>
                            <p class="flex text-xs font-regular opacity-70">End Date: {{ $project->date_ended ? \Carbon\Carbon::parse($project->date_ended)->format('d/m/Y') : 'Not set' }}</p>
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
    