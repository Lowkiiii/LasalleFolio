@section('webtitle')
    Leaderboard
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Interest</title>
</head>

<body>
    <section class="h-screen bg-[#F8F8F8]">
        <div class="flex row min-h-full justify-center relative ">
            <div class=" mx-auto my-auto">
                <div class="w-full  mb-14 ">
                    <div class="flex flex-col justify-center items-center">
                        <div class="gap-2">
                            <div class="mx-auto flex">
                                <div class="flex font-bold mx-auto items-center text-3xl text-black">
                                    @if (!empty($currentInterests) && count($currentInterests) > 0)
                                        Edit Interests
                                    @else
                                        Select at least 3 interests
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('interests.store') }}"
                                  method="POST">
                                @csrf

                                <div class="grid grid-cols-3 gap-4 mt-4">
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Programming"
                                                   @if (!empty($currentInterests) && in_array('Programming', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                   Programming
                                            </label>
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="3d_animation"
                                                   @if (!empty($currentInterests) && in_array('3d_animation', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                3D Animation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="3d_modeling"
                                                   @if (!empty($currentInterests) && in_array('3d_modeling', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                3D Modeling
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Artifical_intelligence"
                                                   @if (!empty($currentInterests) && in_array('Artifical_intelligence', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Artifial Intelligence
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Gamedevelopment"
                                                   @if (!empty($currentInterests) && in_array('Gamedevelopment', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Game Development
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Ui/ux"
                                                   @if (!empty($currentInterests) && in_array('Ui/ux', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                UI / UX
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Data_analytics"
                                                   @if (!empty($currentInterests) && in_array('Data_analytics', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Data Analytics
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Datascience"
                                                   @if (!empty($currentInterests) && in_array('Datascience', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Data Science
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634]checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Networking"
                                                   @if (!empty($currentInterests) && in_array('Networking', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Networking
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Database"
                                                   @if (!empty($currentInterests) && in_array('Database', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Database
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Web_design"
                                                   @if (!empty($currentInterests) && in_array('Web_design', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Web Design
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Multimedia"
                                                   @if (!empty($currentInterests) && in_array('Multimedia', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Multimedia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Graphic_design"
                                                   @if (!empty($currentInterests) && in_array('Graphic_design', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Graphic Design
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Software_development"
                                                   @if (!empty($currentInterests) && in_array('Software_development', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Software Development
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Cloud_computing"
                                                   @if (!empty($currentInterests) && in_array('Cloud_computing', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Cloud Computing
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                            <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                   type="checkbox"
                                                   name="interests[]"
                                                   value="Web_development"
                                                   @if (!empty($currentInterests) && in_array('Web_development', $currentInterests)) checked @endif />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                   for="checkboxDefault">
                                                Web Development
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Custom interests section -->

                                    <div class="flex text-xs text-black ">
                                        <div class="flex flex-col text-base text-black">
                                            <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                                <input class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-[#006634] checked:bg-[#006634] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-[#006634] dark:checked:bg-[#006634]"
                                                       type="checkbox"
                                                       id="customInterestsCheckbox"
                                                       onchange="toggleCustomInterestInput()">
                                                <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                       for="checkboxDefault">
                                                    Other Interest
                                                </label>
                                            </div>

                                            <div>

                                                <div id="customInterestsContainer"
                                                     class="hidden mt-3">
                                                    <label for="customInterestInput"
                                                           class="block font-bold">Enter Other Interests:</label>

                                                    <div class="relative">
                                                        <input type=""
                                                               id="customInterestInput"
                                                               class="appearance-none bg-gray-100 rounded-xl p-2 w-full mt-1"
                                                               placeholder="Type interest and press Enter">
                                                        <label for="customInterestInput"
                                                               class="block font-bold">Other Interests:</label>

                                                        <!-- Tailwind spinner -->
                                                        <div id="validationSpinner"
                                                             class="hidden absolute right-4 top-1/2 transform -translate-y-1/2">
                                                            <div
                                                                 class="animate-spin rounded-full h-4 w-4 border-2 border-gray-900 border-t-transparent">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Error message -->
                                                    <div id="validationError"
                                                         class="hidden mt-2 text-red-500 text-sm"></div>
                                                    <!-- List of interests -->
                                                    <div id="customInterestsList"
                                                         class="mt-2 space-y-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <input type="hidden"
                                       name="custom_interests"
                                       id="customInterests">

                                <script>
                                    let validatedInterests = [];

                                    function toggleCustomInterestInput() {
                                        const checkbox = document.getElementById('customInterestsCheckbox');
                                        const container = document.getElementById('customInterestsContainer');

                                        if (checkbox.checked) {
                                            container.classList.remove('hidden');
                                        } else {
                                            container.classList.add('hidden');
                                            clearCustomInterests();
                                        }
                                    }

                                    function clearCustomInterests() {
                                        document.getElementById('customInterestInput').value = '';
                                        document.getElementById('customInterestsList').innerHTML = '';
                                        document.getElementById('customInterests').value = '';
                                        validatedInterests = [];
                                    }

                                    async function validateWord(word) {
                                        try {
                                            const response = await fetch(
                                                `https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(word)}`);
                                            return response.ok;
                                        } catch (error) {
                                            return false;
                                        }
                                    }

                                    async function validateAndAddInterest(interest) {
                                        const validationSpinner = document.getElementById('validationSpinner');
                                        const validationError = document.getElementById('validationError');
                                        const words = interest.trim().split(' ');

                                        // Show spinner, hide error
                                        validationSpinner.classList.remove('hidden');
                                        validationError.classList.add('hidden');

                                        try {
                                            // Check each word
                                            for (const word of words) {
                                                const isValid = await validateWord(word);
                                                if (!isValid) {
                                                    throw new Error(`"${word}" is not a valid word. Please check your spelling.`);
                                                }
                                            }

                                            // All words valid, add interest
                                            addCustomInterest(interest);
                                            document.getElementById('customInterestInput').value = '';

                                        } catch (error) {
                                            // Show error message
                                            validationError.textContent = error.message;
                                            validationError.classList.remove('hidden');
                                        } finally {
                                            // Hide spinner
                                            validationSpinner.classList.add('hidden');
                                        }
                                    }

                                    // Event listener for Enter key
                                    document.getElementById('customInterestInput').addEventListener('keypress', async function(event) {
                                        if (event.key === 'Enter') {
                                            event.preventDefault();
                                            const interest = event.target.value.trim();
                                            if (interest) {
                                                await validateAndAddInterest(interest);
                                            }
                                        }
                                    });

                                    function addCustomInterest(interest) {
                                        const customInterestsList = document.getElementById('customInterestsList');

                                        // Create interest item
                                        const interestItem = document.createElement('div');
                                        interestItem.className = 'flex items-center justify-between bg-gray-200 px-3 py-2 rounded-lg';

                                        // Create content container with checkmark and text
                                        const contentDiv = document.createElement('div');
                                        contentDiv.className = 'flex items-center';

                                        // Add checkmark
                                        const checkmark = document.createElement('span');
                                        checkmark.className = 'text-green-500 mr-2';
                                        checkmark.innerHTML = '✓';

                                        // Add text
                                        const textSpan = document.createElement('span');
                                        textSpan.className = 'text-gray-700';
                                        textSpan.textContent = interest;

                                        contentDiv.appendChild(checkmark);
                                        contentDiv.appendChild(textSpan);

                                        // Add remove button
                                        const removeButton = document.createElement('button');
                                        removeButton.textContent = '×';
                                        removeButton.className = 'text-red-500 hover:text-red-700 font-bold text-xl ml-2';
                                        removeButton.onclick = () => {
                                            customInterestsList.removeChild(interestItem);
                                            updateValidatedInterests();
                                        };

                                        interestItem.appendChild(contentDiv);
                                        interestItem.appendChild(removeButton);
                                        customInterestsList.appendChild(interestItem);

                                        // Update validated interests
                                        validatedInterests.push(interest);
                                        updateValidatedInterests();
                                    }

                                    function updateValidatedInterests() {
                                        const customInterestsInput = document.getElementById('customInterests');
                                        // Remove the interest from the array when it's deleted
                                        validatedInterests = Array.from(document.querySelectorAll('#customInterestsList span:not(.text-green-500)'))
                                            .map(span => span.textContent);
                                        customInterestsInput.value = validatedInterests.join(',');
                                    }
                                    // Add this function to initialize custom interests
                                    function initializeCustomInterests() {
                                        const checkbox = document.getElementById('customInterestsCheckbox');
                                        const container = document.getElementById('customInterestsContainer');

                                        @if (isset($currentInterests))
                                            const currentInterests = @json($currentInterests);
                                            const predefinedInterests = @json($predefinedInterests);

                                            // Filter out custom interests (those not in predefined list)
                                            const customInterests = currentInterests.filter(
                                                interest => !predefinedInterests.includes(interest)
                                            );

                                            if (customInterests.length > 0) {
                                                checkbox.checked = true;
                                                container.classList.remove('hidden');

                                                // Add each custom interest to the list
                                                customInterests.forEach(interest => {
                                                    addCustomInterest(interest);
                                                });
                                            }
                                        @endif
                                    }

                                    // Call this function when the page loads
                                    document.addEventListener('DOMContentLoaded', initializeCustomInterests);
                                </script>
                        </div>
                    </div>
                    <div class="py-6 flex justify-center items-center mx-auto">
                        <button type="submit"
                                class="bg-[#006634] text-white font-semibold uppercase text-xs w-1/2 px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                            Save
                        </button>
                        <button type="button"
                                onclick="history.back()"
                                class="bg-gray-500 text-white font-semibold uppercase text-xs w-1/2 px-4 py-2 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 disabled:opacity-50 disabled:cursor-not-allowed"
                                @if (empty($currentInterests)) disabled @endif>
                            Back
                        </button>

                    </div>

                    {{-- pau pa edit --}}
                    {{-- <ul class="text-center">
                                @if (isset($currentInterests) && count($currentInterests) > 0)
                                    <div class="font-bold text-3xl text-black mb-4">
                                        Your Other Interests
                                    </div>
                                    
                                    @foreach ($currentInterests as $interest)
                                        @if (!in_array($interest, $predefinedInterests))
                                            <li class="list-none text-lg">{{ $interest }}</li>
                                        @endif
                                    @endforeach
                                @else
                                    <p class="text-xl text-gray-500">No other interests added yet.</p>
                                @endif
                            </ul> --}}

                    </form>

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</body>

</html>
