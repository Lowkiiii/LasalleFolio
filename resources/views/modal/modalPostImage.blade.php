<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idPostImage">
    <div class="relative w-1/2 px-6 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold "> Post a Content</h3>
                </div>
                <!--body-->
                <div class="relative pb-1 flex-auto">
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm text-black pt-3">

                        <textarea
                            class=" bg-[#F8F8F8]  appearance-none resize-none outline-none overflow-hidden w-full h-[4rem] @error('user_posts') border-2 border-red-500 @enderror"
                            name="user_posts" placeholder="Enter content">{{ old('user_posts') }}</textarea>
                        @error('user_posts')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        </p>
                        <div class="bg-white px-2 py-24 rounded-xl">
                            <div class="flex flex-col justify-center mx-auto max-y-md max-w-lg items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-12 h-12 opacity-30">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex font-bold opacity-40">Add your Image</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" btn-container">
                    <div class="text-sm py-1 font-semibold text-black">Choose Category</div>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">2D Animation</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">3D Animation</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Coding</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Data Science</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Front End</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Back End</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Web Design</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Illustation</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Layout</button>
                    <button class="btn px-2 py-1 mb-1 rounded-lg text-[#444444] text-xs font-semibold"
                        style="background-color: #D9D9D9;">Painting</button>
                </div>

                <!--footer-->
                <div class="flex items-center justify-end py-2 border-t border-[#D9D9D9] mt-2">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-idPostImage')">
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
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idPostImage-backdrop"></div>


<script>
    const btnContainer = document.querySelector('.btn-container');

    btnContainer.addEventListener('click', (event) => {
        const btn = event.target.closest('.btn');
        if (!btn) return; 

        event.preventDefault();
        if (btn.style.backgroundColor === 'rgb(217, 217, 217)') {
            btn.style.backgroundColor = '#006634';
            btn.style.color = "white";
       
        } else {
            btn.style.backgroundColor = '#D9D9D9';
            btn.style.color = "#444444";
           
        }
    });
</script>
