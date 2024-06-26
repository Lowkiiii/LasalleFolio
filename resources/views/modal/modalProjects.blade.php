
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-idProjects">
        <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
            <div class="border border-[#444444] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold">
                        MODAL PROJECT TITLE
                    </h3>
                </div>
                <!--body-->
                <div class="relative pb-5 flex-auto">
                    <p class="mx-2 leading-relaxed">
                        <div class="text-sm text-black pb-2 pt-5">Edit Title</div>
                        <input type="text" class="text-black text-xs rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('project') border-2 border-red-500 @enderror" id="" name="project" placeholder="Project Title" />
                        @error('project')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </p>
                    <p class="mx-2 leading-relaxed">
                        <div class="text-sm text-black pb-2 pt-5">Content</div>
                        <input type="text" class="text-black text-xs rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('description') border-2 border-red-500 @enderror" id="" name="description" placeholder="Project Description" />
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-idProjects')">
                        Close
                    </button>
                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idProjects-backdrop"></div>