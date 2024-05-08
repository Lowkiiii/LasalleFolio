
<div class="min-h-full">

    <div class="mx-auto max-w-[89rem] px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
        
          <div class=" block">
            <div class="flex  space-x-2">
              <img src='/image/logo.png' class=" size-8 items-center"/> 
                <div class=" items-center justify-center m-auto text-sm font-bold text-[#006634]">
                  LASALLEFOLIO
                  
                </div>

                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                      <button type="submit" class="items-end justify-end ">
                          <span class="hover:text-blue-600">LOGOUT  (TEMPORARY PLACEMENT)</span>
                      </button>
              </form>
               
            </div>
            
          </div>

        </div>
          
    </div>
</div>

