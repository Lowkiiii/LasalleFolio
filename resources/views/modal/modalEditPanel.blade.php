<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink"
    id="modal-idEditPanels">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-base text-black font-bold "> ADD PROJECT </h3>
                </div>
                <!--body-->
                <div class="relative  flex-auto">
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm font-bold text-black pb-2 pt-5">Edit Title</div>
                    <input type="text"
                        class="text-black text-xs rounded-xl  peer block min-h-[auto] w-full bg-gray-100  px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('project') border-2 border-red-500 @enderror"
                        name="project" placeholder="Enter title" value="{{ old('project') }}" />
                    @error('project')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm font-bold text-black pb-2 pt-5">Content</div>
                    <textarea
                        class="appearance-none resize-none bg-gray-100 text-sm font-normal outline-none rounded-xl overflow-hidden px-3 py-2 leading-[2.15] w-full h-[10rem] @error('description') border-2 border-red-500 @enderror"
                        name="description" placeholder="Enter content">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                  

                    <div class="flex flex-row justify-start items-start rounded-xl py-2">
            
                        <div class="text-xs flex-col flex font-semibold items-start justify-start truncate text-black px-1 w-full mt-auto mb-auto  ">Start 
                        <input type="date"
                            class="text-black font-normal text-xs rounded-xl  peer block min-h-[auto] w-full bg-gray-100  px-3 py-1 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_started') border-2 border-red-500 @enderror"
                            id="" name="date_started" placeholder="Start Date" />
                        @error('date_started')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        
                        </div>
                      
                        <div class="flex items-center justify-normal ml-2 mr-2  mt-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                              </svg>
                              
                        </div>
                        
          
                        <div class="text-xs truncate flex flex-col text-black font-semibold px-1  w-full  mt-auto mb-auto ">End 
                        <input type="date"
                            class="text-black font-normal text-xs rounded-xl  peer block min-h-[auto] w-full bg-gray-100  px-3 py-1 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_ended') border-2 border-red-500 @enderror"
                            id="" name="date_ended" placeholder="End Date" />
                        @error('date_ended')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                        
                    </div>  
                   <script>
           
                   </script>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-idEditPanels')">
                        Close
                    </button>
                    <button
                        class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idEditPanels-backdrop"></div>
