<div class="min-h-full">
    <div class="mx-auto max-w-[89rem] px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="block">
                    <div class="flex space-x-2">
                        <img src='/image/logo.png' class="size-8 items-center" />
                        <div class="items-center justify-center m-auto text-sm font-bold text-[#006634]">
                            LASALLEFOLIO
                        </div>
                    </div>
                </div>
            </div>
            
            <div class=" -translate-x-3/4   w-1/3">
              <div class="relative">
                <input type="" class="outline-none text-sm w-full py-2 px-3 pl-10 bg-white border border-[#939393] rounded-2xl" placeholder="Search">
                <i class="absolute left-2 top-[0.4rem]  opacity-60">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 30 30" >
                        <path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
                    </svg>
                </i>
            </div>
             
          </div>
            <div class="relative flex">
              <button id="menuButton">
                  <label for="file_input" class="cursor-pointer shadow-md rounded-full">
                      <img src="image/dog.jpg" alt="Profile" class="rounded-full object-cover w-11 h-11">
                  </label>
              </button>
              <div id="menu" class="absolute bg-white space-x-3 p-4 border border-[#D4D4D4] rounded-lg shadow-lg w-64 mt-1 transform translate-y-full opacity-0 top-12 left-1/2 -translate-x-1/2 z-10">
              
                  <ul class="p-1 text-black w-auto">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit">Logout</button>
                  </form>
                  
                
                  </ul>
              </div>
          </div>
          
          <script>
              const menuButton = document.getElementById('menuButton');
              const menu = document.getElementById('menu');
          
              menuButton.addEventListener('click', function () {
                event.preventDefault(); 
                  menu.classList.toggle('translate-y-full');
                  menu.classList.toggle('opacity-100');
              });
          </script>
          
        </div>
    </div>
</div>
