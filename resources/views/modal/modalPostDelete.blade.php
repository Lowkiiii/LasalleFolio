<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idPostDelete">
    <div class="relative w-auto px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-center w-full justify-center pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold "> Are you sure you want to Delete? </h3>
                </div>
                <!--body-->
             
                <!--footer-->
                <div class="flex items-center justify-center p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all d
                        uration-150"
                        type="button" onclick="toggleModal('modal-idPostDelete')">
                        Close
                    </button>
                    <button
                        class="bg-[#FF0000] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit">
                        Delete Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idPostDelete-backdrop"></div>
