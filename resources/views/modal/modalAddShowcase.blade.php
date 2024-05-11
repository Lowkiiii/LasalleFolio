<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-idAddShowcase">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
            class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">
              <!--header-->
              <div class="items-start w-full justify-between pt-4 rounded-t">
                <h3 class="text-base text-black font-bold "> Showcase your Project</h3>
                <p class="mb-3 text-sm font-base opacity-80">Choose only < 3 Counter Here > </p>
            </div>
            @forelse ($userProjects as $project)
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="block min-h-[1.5rem] ps-[1.5rem] pb-1">
                    <input
                      class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                      type="checkbox" onclick="ProjectShowcaseLimit"
                      value=""
                      id="checkboxDefault" /> 
                    <label
                      class="inline-block ps-[0.15rem] hover:cursor-pointer"
                      for="checkboxDefault">
                      <div>{{ $project->project }}</div>
                    </label>
                  </div>
                               <!--footer-->
                                        
                @empty
                <p>No projects found.</p>
          
            </form>
            @endforelse

        
            <div class="flex items-center justify-end p-4">
                <button
                    class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="toggleModal('modal-idAddShowcase')">
                    Close
                </button>
                <button
                    class="bg-[#006634] text-white font-semibold uppercase text-xs px-2 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="submit">
                    Save
                </button>
                
            </div>
        </div>
        
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-idAddShowcase-backdrop"></div>


<script>

let counter = 3;

function CounterUpdate(){

if (checked) {
    counter++;
  } else {
    counter--;
  }
  $('.counterValue').text(counter);
}


</script>
