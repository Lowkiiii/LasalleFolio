<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-idAboutMe">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
            <!-- Header -->
            <div class="flex items-start w-full justify-between pt-4 rounded-t">
                <h3 class="text-lg text-black font-semibold">About Me</h3>
            </div>
            <!-- Body -->
            <form action="{{ route('bio.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="relative pb-5 items-center justify-center flex-auto py-2">
                    <textarea name="bio" class="bg-gray-200 p-3 text-black rounded-lg resize-none outline-none overflow-hidden w-full h-[10rem]" placeholder="Tell us about yourself...">{{ old('bio', $bio->bio ?? '') }}</textarea>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-end p-4">
                    <button class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-idAboutMe')">
                        Close
                    </button>
                    <button class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idAboutMe-backdrop"></div>
