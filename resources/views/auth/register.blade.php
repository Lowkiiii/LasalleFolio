@extends('auth.layouts.app')

@section('webtitle')
    Register
@endsection

@section('content')
    <section class=" bg-[#efefef] ">

        <div class="flex min-h-full justify-center ">
            <div class="absolute mx-auto max-y-md max-w-lg flex items-center">

                <div class="z-20  top-0 w-full mt-4">

                    @if ($errors->any())
                        <div class=" top-0 w-full mt-4">
                            @foreach ($errors->all() as $error)
                                <div class=" animate-fade-in-down delay-1000 mb-3 inline-flex w-full items-center justify-center rounded-lg border-danger border bg-danger-100 px-6 py-1 text-base text-danger-700 transition-opacity ease-in duration-700 opacity-100"
                                    role="alert">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="h-5 w-5">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>

                                    Missing Inputs!
                                </div>
                            @break
                        @endforeach
                    </div>
                @endif
            </div>
        </div>




        <div class=" fixed inset-0 flex justify-center items-center">




            <!-- Left column container with background-->

            <div
                class="  z-auto mx-auto max-y-md max-w-sm flex items-center justify-center bg-white/70 rounded-2xl shadow-md border-InputGray border p-7 ">


                <form method="POST" action="{{ route('register.account') }}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <!--Sign in section-->
                    <!--<img src='/image/logo.png' class="mx-auto size-20 mr-24"/>-->
                    <h2 class="items-center text-center text-2xl font-bold text-black">Registration</h2>
                    <p class="text-black text-center text-sm mb-4">Be part of the community</p>


                    <!-- Name input -->
                    <div class="flex flex-row mb-3">
                        <div class="text-sm">
                            First Name
                            <div class="relative mr-3">
                                <input type="text"
                                    class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('first_name') border-2 border-red-500 @enderror"
                                    id="first_name" name="first_name" placeholder="" />
                            </div>
                        </div>

                        <div class="text-sm">
                            Last name
                            <div class="relative">
                                <input type="text"
                                    class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('last_name') border-2 border-red-500 @enderror"
                                    id="last_name" name="last_name" placeholder="" />

                            </div>
                        </div>

                    </div>
                    <!-- Email input -->
                    <div class="text-sm">
                        Email
                        <div class="relative mb-3">
                            <input type="text"
                                class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('email') border-2 border-red-500 @enderror"
                                id="email" name="email" placeholder="" />
                        </div>
                    </div>



                    <!-- Full Address input -->
                    <div class="text-sm">
                        Full Address
                        <div class="relative mb-3">
                            <input type="text"
                                class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('full_address') border-2 border-red-500 @enderror"
                                id="full_address" name="full_address" placeholder="" />

                        </div>

                        <!-- Password input -->
                        <div class="text-sm">
                            Password
                            <div class="relative mb-3">
                                <input type="password"
                                    class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('password') border-2 border-red-500 @enderror"
                                    id="password" name="password" placeholder="" />

                            </div>

                            <!-- Confirmation Password input -->
                            <div class="text-sm">
                                Confirm Password
                                <div class="relative mb-3">
                                    <input type="password"
                                        class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('password_confirmation') border-2 border-red-500 @enderror"
                                        id="password_confirmation" name="password_confirmation" placeholder="" />

                                </div>



                                <div class="flex flex-row mb-3">
                                    <!-- Birthdate input -->
                                    <div class="text-sm">
                                        Birthday
                                        <div class="relative mr-3">
                                            <input type="date"
                                                class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('birthdate') border-2 border-red-500 @enderror"
                                                id="birthdate" name="birthdate" placeholder="" />
                                        </div>
                                    </div>

                                    <!-- Sex input -->
                                    <div class="text-sm">
                                        Sex
                                        <div class="relative mb-1">
                                            <input type="text"
                                                class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.02rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('sex') border-2 border-red-500 @enderror"
                                                id="sex" name="sex" placeholder="Sex" />
                                        </div>
                                    </div>

  


                                </div>
                            

                                <div class="mb-6 flex items-center justify-between">
                                    <!-- Remember me checkbox -->
                                    <div class="items-center justify-center  pl-[1.5rem]" id="termsCheckbox">
                                        <input
                                            class="relative float-left -ml-[1.5rem] mr-[6px]  h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-white checked:bg-white checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:black dark:checked:border-[#006634]  dark:checked:bg-[#006634]  dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="checkbox"   />
                                            <label class="pl-[0.15rem] h-full hover:cursor-pointer text-black flex flex-row items-center justify-center" >
                                                I agree to the <button onclick="toggleModal('modal-idTerms')" class="text-blue-500 px-1 underline">Terms and Conditions</button>
                                            </label>
                                    </div>
            
                                    
                                </div>
                          

                            <!-- Register button -->
                            <div class="text-center lg:text-left">
                                <button type="submit"  
                                    class="inline-block rounded-md bg-[#006634] px-7 pb-2.5 pt-3 text-sm font-medium  leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full "
                                    data-te-ripple-init data-te-ripple-color="light">
                                    Register
                                </button>


                                <!-- Register link -->
                                <p class="mb-0 mt-3 pt-1 text-sm font-regular text-center text-TextGray">
                                    Already have an account?
                                    <a href="/login"
                                        class="text-black font-bold transition duration-150 ease-in-out hover:text-[#006634] focus:text-[#006634] active:text-[#006634]  ">Login
                                        now</a>
                                </p>
                            </div>
            </form>
        </div>
    </div>
</div>


<div class="absolute z-[-1] ">
    <div class="mx-auto max-y-sm max-w-2xl flex items-center justify-center">
        <img src='/image/LOGOFULL.png' class="opacity-5 size-fit" />
    </div>
</div>


</section>
@endsection
