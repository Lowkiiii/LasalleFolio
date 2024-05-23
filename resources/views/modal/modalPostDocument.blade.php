<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idPostDocument">
    <div class="relative w-1/2 px-6 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold "> Post your Docuemnts</h3>
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
                               <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-12 h-12 opacity-30" viewBox="0 0 30 30 " fill="#424242">
                                            <path
                                                d="M24.707,8.793l-6.5-6.5C18.019,2.105,17.765,2,17.5,2H7C5.895,2,5,2.895,5,4v22c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2 V9.5C25,9.235,24.895,8.981,24.707,8.793z M18,21h-8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1 C19,20.552,18.552,21,18,21z M20,17H10c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h10c0.552,0,1,0.448,1,1C21,16.552,20.552,17,20,17 z M18,10c-0.552,0-1-0.448-1-1V3.904L23.096,10H18z">
                                            </path>
                                        </svg>
                                  
                                <div class="flex font-bold opacity-40">Add your Docs here</div>
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
                        type="button" onclick="toggleModal('modal-idPostDocument')">
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
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idPostDocument-backdrop"></div>


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
