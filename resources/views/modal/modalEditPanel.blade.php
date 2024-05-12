@isset($project)
    @if($project->user_id === Auth::id())
        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-idEditPanels">
            <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
                <div class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--header-->
                        <div class="flex items-start w-full justify-between pt-4 rounded-t">
                            <h3 class="text-md text-black font-bold ">Edit Project</h3>
                        </div>
                        <!--body-->
                        <div class="relative pb-5 flex-auto">
                            <p class="mx-2 leading-relaxed">
                                <div class="text-sm text-black pb-2 pt-5">Edit Title</div>
                                <input type="text" class="text-black text-xs rounded-md shadow-md peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('project') border-2 border-red-500 @enderror" name="project" value="{{ $project->project }}" />
                                @error('project')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="mx-2 leading-relaxed">
                                <div class="text-sm text-black pb-2 pt-5">Edit Content</div>
                                <textarea class="appearance-none resize-none outline-none overflow-hidden w-full h-[10rem] @error('description') border-2 border-red-500 @enderror" name="description">{{ $project->description }}</textarea>
                                @error('description')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="mx-2 leading-relaxed">
                                <div class="text-sm text-black pb-2 pt-5">Start Date</div>
                                <input type="date" class="text-black text-xs rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_started') border-2 border-red-500 @enderror" id="" name="date_started" value="{{ $project->date_started->format('Y-m-d') }}" />
                                @error('date_started')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="mx-2 leading-relaxed">
                                <div class="text-sm text-black pb-2 pt-5">End Date</div>
                                <input type="date" class="text-black text-xs rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_ended') border-2 border-red-500 @enderror" id="" name="date_ended" value="{{ $project->date_ended ? $project->date_ended->format('Y-m-d') : '' }}" />
                                @error('date_ended')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <!--footer-->
                        <div class="flex items-center justify-end p-4">
                            <button class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-idEditPanels')">
                                Close
                            </button>
                            <button class="bg-[#006634] text-white font-semibold uppercase text-xs px-2 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idEditPanels-backdrop"></div>
    @else
        <p>You are not authorized to edit this project.</p>
    @endif
@endisset