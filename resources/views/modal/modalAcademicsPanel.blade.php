<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idExpPanel">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
            <form action="{{ route('academics.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold "> ADD ACADEMICS </h3>
                </div>
                <!--body-->
                <div class="relative pb-5 flex-auto">
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">School</div>
                    <input type="text"
                        class="text-black text-xs rounded-md shadow-md peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('education_insitution') border-2 border-red-500 @enderror"
                        name="education_insitution" placeholder="Enter title" value="{{ old('education_insitution') }}" />
                    @error('education_insitution')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">Course</div>
                    <input type="text"
                        class="text-black text-xs rounded-md shadow-md peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('course') border-2 border-red-500 @enderror"
                        name="course" placeholder="Enter title" value="{{ old('course') }}" />
                    @error('course')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">Major</div>
                    <input type="text"
                        class="text-black text-xs rounded-md shadow-md peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('major') border-2 border-red-500 @enderror"
                        name="major" placeholder="Enter title" value="{{ old('major') }}" />
                    @error('major')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                    <p class="mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">Start Date</div>
                    <input type="date"
                        class="text-black text-xs rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_started') border-2 border-red-500 @enderror"
                        id="" name="date_started" placeholder="Start Date" />
                    @error('date_started')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                    <p class="mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">End Date</div>
                    <input type="date"
                        class="text-black text-xs rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_ended') border-2 border-red-500 @enderror"
                        id="" name="date_ended" placeholder="End Date" />
                    @error('date_ended')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                   <script>
           
                   </script>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-idExpPanel')">
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
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idExpPanel-backdrop"></div>
