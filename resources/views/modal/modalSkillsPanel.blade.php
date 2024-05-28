<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink"
    id="modal-idSkillsPanel">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
            <form action="{{ route('skills.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-base text-black font-bold "> Add Skills </h3>
                </div>
                <!--body-->
                <div class="relative  flex-auto">
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm font-bold text-black pb-2 pt-5">Edit Title</div>
                    <input type="text"
                        class="text-black text-xs rounded-xl  peer block min-h-[auto] w-full bg-gray-100  px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('project') border-2 border-red-500 @enderror"
                        name="skills" placeholder="Enter title" value="{{ old('skills') }}" />
                    @error('skills')
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

                    <script></script>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-idSkillsPanel')">
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
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idSkillsPanel-backdrop"></div>
