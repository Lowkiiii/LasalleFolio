<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink"
     id="modal-idPinnedProjects">
    <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
        <div
             class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col py-4 px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">

            <div>
                <!-- Form to submit pinned projects -->
                <form action="{{ route('pin.projects') }}"
                      method="POST">
                    @csrf

                    <!-- Retrieve pinned project IDs -->
                    @php

                        $pinnedProjectIds = $pinnedProjects->pluck('project_id')->toArray(); //
                        // echo count($userProjects);
                    @endphp
                    {{-- 
                    @if (empty($projects))
                        <div>No Projects Available</div>
                    @else --}}
                    @forelse ($userProjects as $projects)
                        @if (!in_array($projects->id, $pinnedProjectIds))
                            <!-- Check if the project is not already pinned -->
                            <div class="flex flex-col">
                                <div class="flex items-center pb-1">
                                    <div class="w-12 h-12 bg-gray-300">
                                        <!-- LOGO HERE -->
                                    </div>

                                    <div class="ml-3 py-2 text-xs font-medium text-black w-5/6">
                                        <div class="font-bold text-base">
                                            {{ $projects->project }}
                                        </div>

                                        <div class="font-normal text-sm">
                                            {{ $projects->description }}
                                        </div>
                                    </div>

                                    <!-- Checkbox for pinning project -->
                                    <div class="ml-auto">
                                        <input type="checkbox"
                                               name="pinned_projects[]"
                                               value="{{ $projects->id }}"
                                               class="form-checkbox h-4 w-4 text-green-600">
                                    </div>
                                </div>

                            </div>
                        @endif

                    @empty
                        <div>
                            No Projects Available
                        </div>
                    @endforelse
                    @if (empty($projects))
                        <div>

                        </div>
                    @else
                        @if (count($pinnedProjectIds) == count($userProjects))
                            <div>
                                All Projects Pinned
                            </div>
                        @endif
                    @endif

                    {{-- @endif --}}

                    <!--footer-->
                    <div
                         class="flex
                                         items-between
                                         justify-end
                                         mt-2">
                        <button class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button"
                                onclick="toggleModal('modal-idPinnedProjects')">
                            Close
                        </button>
                        <button class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black"
     id="modal-idPinnedProjects-backdrop"></div>
