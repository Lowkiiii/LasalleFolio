<div class="hidden overflow-x-hidden overflow-y-auto fixed  inset-0 z-50 outline-none  focus:outline-none justify-center items-center"
    id="modal-idPanels">
    <div class="relative w-1/2  px-4my-auto mx-auto max-w-xl">

        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start w-full justify-between pt-4 rounded-t">
                <h3 class="text-md text-black font-bold ">
                    MODAL PANEL TITLE
                </h3>
             
            </div>
            <!--body-->
            <div class="relative pb-5  flex-auto">
                <p class=" mx-2  leading-relaxed">
                  
                  <div class="text-sm text-black pb-2 pt-5">Edit Title</div>
                  <input type="text"
                  class="text-black text-xs rounded-md shadow-md peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('') border-2 border-red-500 @enderror"
                  id="" name="" placeholder="" />

                  
                </p>

                <p class=" mx-2  leading-relaxed">
                  
                  <div class="text-sm text-black pb-2 pt-5">Content</div>
                  <textarea class="appearance-none resize-none  outline-none overflow-hidden w-full h-[10rem]" placeholder="CONTEXT HERE"></textarea>

                  
                </p>


            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-4" >
                <button
                class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="toggleModal('modal-idPanels')">
                    Close
                </button>
                <button
                class="bg-[#006634] text-white  font-semibold uppercase text-xs px-2 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="toggleModal('modal-idPanels')">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idPanels-backdrop"></div>
