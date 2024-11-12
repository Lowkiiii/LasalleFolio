@foreach ($userHonorsAndAwards as $honorsandawards)
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center animate-blink"
         id="modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}">
        <div class="relative w-1/2 px-4 my-auto mx-auto max-w-xl">
            <div
                 class="border border-[#D9D9D9] rounded-lg shadow-lg relative flex flex-col px-4 w-full bg-[#F8F8F8] outline-none focus:outline-none">
                <form action="{{ route('honorsandawards.update', $honorsandawards->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')
                    <!--header-->
                    <div class="flex items-start w-full justify-between pt-4 rounded-t">
                        <h3 class="text-base text-black font-bold "> Edit Honors and Awards </h3>
                    </div>
                    <!--body-->
                    <div class="relative flex-auto">
                        <p class=" mx-2 leading-relaxed">
                        <div class="text-sm font-bold text-black pb-2 pt-5">Edit title</div>
                        <input type="text"
                               class="text-black text-xs rounded-lg peer block min-h-[auto] w-full bg-gray-200 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('title') border-2 border-red-500 @enderror"
                               name="title"
                               placeholder="Enter insitution"
                               value="{{ $honorsandawards->title }}" />
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        </p>
                        <p class=" mx-2 leading-relaxed">
                        <div class="text-sm font-bold text-black pb-2 pt-5">Edit Issuer</div>
                        <input type="text"
                               class="text-black text-xs rounded-lg peer block min-h-[auto] w-full bg-gray-200 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('issuer') border-2 border-red-500 @enderror"
                               name="issuer"
                               placeholder="Enter insitution"
                               value="{{ $honorsandawards->issuer }}" />
                        @error('issuer')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        </p>
                        <p class=" mx-2 leading-relaxed">
                        <div class="text-sm font-bold text-black pb-2 pt-5">Edit description</div>
                        <input type="text"
                               class="text-black text-xs rounded-lg peer block min-h-[auto] w-full bg-gray-200 px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('description') border-2 border-red-500 @enderror"
                               name="description"
                               placeholder="Enter course"
                               value="{{ $honorsandawards->description }}" />
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        </p>

                        <div class="flex flex-row justify-start items-start rounded-lg mt-4 py-2">
                            <div
                                 class="text-xs flex-col flex font-semibold items-start justify-start truncate text-black px-1 w-full mt-auto mb-2">
                                Start
                                <input type="date"
                                       class="text-black font-normal text-xs rounded-lg peer block min-h-[auto] w-full bg-gray-200 px-3 py-1 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('date_issue') border-2 border-red-500 @enderror"
                                       id=""
                                       name="date_issue"
                                       placeholder="Start Date"
                                       value="{{ old('date_issue', $honorsandawards->date_issue ? $honorsandawards->date_issue->format('Y-m-d') : '') }}" />
                                @error('date_issue')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-4">
                        <button class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button"
                                onclick="toggleModal('modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}')">
                            Close </button>
                        <button class="bg-[#006634] text-white font-semibold uppercase text-xs px-4 py-2 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="submit"> Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden opacity-25 bg-black fixed inset-0 z-40 bg-black"
         id="modal-idEditAwardsHonorsPanel-{{ $honorsandawards->id }}-backdrop"></div>
@endforeach
