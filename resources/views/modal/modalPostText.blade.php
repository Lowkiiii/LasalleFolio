<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idPostText">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
            
            <!-- Updated form to handle file uploads -->
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 rounded-t">
                    <h3 class="text-md text-black font-bold "> ADD POST </h3>
                </div>
                
                <!--body-->
                <div class="relative pb-5 flex-auto">
                    <p class=" mx-2 leading-relaxed">
                    <div class="text-sm text-black pb-2 pt-5">
                    <!-- Textarea for post content -->
                    <textarea
                        class="appearance-none resize-none outline-none bg-gray-100 rounded-xl p-4 overflow-hidden w-full h-[10rem] @error('user_posts') border-2 border-red-500 @enderror"
                        name="user_posts" placeholder="Enter content">{{ old('user_posts') }}</textarea>
                    @error('user_posts')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    </div>
                    
                    <!-- Image upload field -->
                    <div class="flex flex-row w-full items-center text-[#006634] font-bold text-xl mt-6">
                        <label for="image" class="mr-2">Upload Image:</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                 <!-- Category dropdown -->
                <div class="text-sm text-black pb-2 pt-5">
                    <label for="category" class="block font-bold">Select Category:</label>
                    <select name="category" class="appearance-none bg-gray-100 rounded-xl p-4 w-full @error('category') border-2 border-red-500 @enderror">
                        <option value="">-- Select Category --</option>
                        <option value="3D Animation">3D Animation</option>
                        <option value="3D Modelling">3D Modelling</option>
                        <option value="AI">AI</option>
                        <option value="Game Development">Game Development</option>
                        <option value="UI/UX">UI/UX</option>
                        <option value="Programming">Programming</option>
                        <option value="Data Analytics">Data Analytics</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Networking">Networking</option>
                        <option value="Database">Database</option>
                        <option value="Web Design">Web Design</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Software Development">Software Development</option>
                        <option value="Cloud Computing">Cloud Computing</option>
                        <option value="Web Development">Web Development</option>
                    </select>
                    @error('category')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                        
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-idPostText')">
                        Close
                    </button>
                    <button
                        class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idPostText-backdrop"></div>
