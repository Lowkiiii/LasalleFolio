<div id="Close"
    class="animate-blink hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center">
    <div class="flex items-center justify-center h-screen w-full">
        <div class="relative  w-1/2 px-4 my-auto mx-auto max-w-xl">
            <div
                class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-white outline-none focus:outline-none">

                <!--header-->
                <div class="flex items-start w-full justify-between pt-4 pb-4 rounded-t">
                    <h3 class="text-md text-black font-bold ">Choose Your Interest </h3>
                </div>
                <!--body-->
                <div class="relative pb-4 flex-auto">

                    <div class="btn-InterestContainer">
                    
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

                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-4">
                    <button
                        class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleClose('Close')">
                        Close
                    </button>
                    <button
                        class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleClose('Close')">
                        Save
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="Close-backdrop" class="hidden   opacity-25 fixed inset-0 z-40 bg-black"></div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var Interest = document.getElementById('Close');
        Interest.classList.remove('hidden');
        var Interest = document.getElementById('Close-backdrop');
        Interest.classList.remove('hidden');
    });

    function toggleClose(Close) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById(Close).classList.add("hidden");
        document.getElementById(Close + "-backdrop").classList.add("hidden");
        document.getElementById(Close).classList.add("flex");
        document.getElementById(Close + "-backdrop").classList.add("flex");
        document.getElementById(Close).classList.add("hidden");

    }
    const btnInterest = document.querySelector('.btn-InterestContainer');

    btnInterest.addEventListener('click', (event) => {
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
