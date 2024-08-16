<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idPostText">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold "> ADD POST </h3>
                </div>
                <!--body-->
                <div class="relative pb-5 flex-auto">
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">
                    <textarea
                        class="appearance-none resize-none outline-none bg-gray-100 rounded-xl p-4 overflow-hidden w-full h-[10rem] @error('user_posts') border-2 border-red-500 @enderror"
                        name="user_posts" placeholder="Enter content">{{ old('user_posts') }}</textarea>
                    @error('user_posts')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </p>
                    <div class="flex flex-row w-full  items-center text-[#006634] font-bold text-xl mt-6 ">
                        <button class="mr-auto" onclick="toggleModal('')">
                            <div class=" items-center text-center flex px-8 ">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27"
                                    height="27" viewBox="0 0 30 30" fill="#D40000">
                                    <path
                                        d="M 4 5 C 2.895 5 2 5.895 2 7 L 2 23 C 2 24.105 2.895 25 4 25 L 26 25 C 27.105 25 28 24.105 28 23 L 28 7 C 28 5.895 27.105 5 26 5 L 4 5 z M 23 8 C 24.105 8 25 8.895 25 10 C 25 11.105 24.105 12 23 12 C 21.895 12 21 11.105 21 10 C 21 8.895 21.895 8 23 8 z M 9 12.001953 C 9.61925 12.001953 10.238437 12.238437 10.710938 12.710938 L 13.972656 15.972656 L 15 17 L 16.15625 18.15625 C 16.57825 18.57825 17.259641 18.574344 17.681641 18.152344 C 18.104641 17.730344 18.104641 17.044094 17.681641 16.621094 L 16.529297 15.470703 L 17.289062 14.710938 C 18.234063 13.765937 19.765937 13.765937 20.710938 14.710938 L 25 19 L 25 22 L 5 22 L 5 15 L 7.2890625 12.710938 C 7.7615625 12.238437 8.38075 12.001953 9 12.001953 z">
                                    </path>

                                </svg>
                                <div class="text-sm text-center text-[#D40000] font-bold flex px-2"
                                    onclick="toggleModal('modal-idPostImage')">
                                    Image
                                </div>
                            </div>
                        </button>
                        <button class="mx-auto">
                            <div class=" items-center text-center flex px-8 text-[#424242]">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27"
                                    height="27" viewBox="0 0 30 30 " fill="#424242">
                                    <path
                                        d="M24.707,8.793l-6.5-6.5C18.019,2.105,17.765,2,17.5,2H7C5.895,2,5,2.895,5,4v22c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2 V9.5C25,9.235,24.895,8.981,24.707,8.793z M18,21h-8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1 C19,20.552,18.552,21,18,21z M20,17H10c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h10c0.552,0,1,0.448,1,1C21,16.552,20.552,17,20,17 z M18,10c-0.552,0-1-0.448-1-1V3.904L23.096,10H18z">
                                    </path>
                                </svg>
                                <div class="text-sm text-center  font-bold flex px-2"
                                    onclick="toggleModal('modal-idPostDocument')">
                                    Document
                                </div>
                            </div>
                        </button>
                        <div class="ml-auto">
                            <div class=" items-center justify-center text-center flex px-8 text-[#0066FF]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                    viewBox="0 0 24 24" fill="#0066FF">
                                    <path
                                        d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                                        stroke="#0066FF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="text-sm text-center font-bold flex px-2">
                                    Video

                                </div>
                            </div>
                        </div>
                    </div>
                

                   <script>
           
                   </script>
                </div>
            </div>
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-idPostText')">
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
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idPostText-backdrop"></div>
