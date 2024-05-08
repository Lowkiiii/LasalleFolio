@extends('auth.layouts.app')
@section('webtitle')
    Login
@endsection
@section('content')
    <section class="h-screen bg-white">
        <div class="z flex min-h-full justify-center ">

            <div class="absolute mx-auto max-y-md max-w-lg flex items-center">

                <div class="top-0 w-full mt-4">

                    @if ($errors->any())
                        <div class=" top-0 w-full mt-4">
                            @foreach ($errors->all() as $error)
                                <div class=" animate-fadeIn mb-3 inline-flex w-full items-center justify-center rounded-lg border-danger border bg-danger-100 px-6 py-1 text-base text-danger-700 transition-opacity ease-in duration-700 opacity-100"
                                    role="alert">
                                    <span class="mr-2">
                                     
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="h-5 w-5">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd" />
                                        </svg>
                                  
                                        
                                    </span>
                                    {{ $error }}
                                </div>
                            @break
                        @endforeach
                    </div>
                @endif



            </div>

        </div>
        <!-- Left column container with background-->
        <div class="z-20 overflow-hidden flex flex-col items-center justify-center w-1/2">


            <div class="inline-block rounded-xl bg-opacity-10  px-20 pt-6 pb-8 mb-4 sm:w-3/5 ">


                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <!--Sign in section-->
                    <img src='/image/logo.png' class="block mx-auto size-20 item-center" />
                    <h2 class="items-center mt-6 text-center text-3xl font-bold text-black">Welcome Back</h2>
                    <p class="text-TextGray text-center mb-6 ">Please enter your details.</p>

                    <p class="mb-1 font-medium text-TextGray text-black">Email</p>
                    <!-- Email input -->
                    <div class="relative mb-6">
                        <input type="text"
                            class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.02rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('email') border-2 border-red-500 @enderror"
                            id="email" name="email" placeholder="" />

                    </div>

                    <p class="mb-1 font-medium text-TextGray text-black">Password</p>
                    <!-- Password input -->
                    <div class="relative mb-6">
                        <input type="password"
                        class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full  bg-white px-3 py-[0.02rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 @error('password') border-2 border-red-500 @enderror"
                        id="password" name="password" placeholder="" />

                    </div>

                    <div class="mb-6 flex items-center justify-between">
                        <!-- Remember me checkbox -->
                        <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                            <input
                                class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-white checked:bg-white checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:black dark:checked:border-[#006634]  dark:checked:bg-[#006634]  dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                type="checkbox" value="" id="checkbox" />
                            <label class="inline-block pl-[0.15rem] hover:cursor-pointer text-black" for="checkbox text-sm">
                                Remember me
                            </label>
                        </div>

                        <!--Forgot password link-->
                        <a href="#!"
                            class="text-black hover:text-[#006634] font-semibold transition ease-in-out duration-150 text-sm">Forgot
                            password?</a>
                    </div>

                    <!-- Login button -->
                    <button type="submit"
                        class="inline-block rounded-md bg-[#006634] px-7 pb-2.5 pt-3 text-sm font-medium  leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full"
                        data-te-ripple-init data-te-ripple-color="light">
                        Sign In
                    </button>


                    <!-- Register link -->
                    <p class="text-TextGray mb-0 mt-10 pt-1 text-sm text-center">
                        Don't have an account yet?
                        <a href="/register"
                            class="transition duration-150 ease-in-out focus:text-[#006634] active:text-[#006634] underline font-semibold text-black hover:text-[#006634]">Register
                            now</a>
                    </p>
            </div>

            </form>

            <div class=" absolute z-[-1] left-1 overflow-hidden ">
                <img src='/image/HALFlogo.png' class="opacity-5 size-fit " />
            </div>
        </div>
        <div class="flex bg-cover w-1/2 mx-auto hidden md:flex"
            style="background-image: url('/image/loginPIC.png'); background-repeat: no-repeat">
            <div class="mx-auto max-y-md max-w-lg flex items-center">
                <div>
                    <div class=" text-white font-bold text-6xl drop-shadow-md">LASALLEFOLIO</div>
                    <p class="text-white text-center font-light drop-shadow-md">For Lasallians by Lasallians</p>
                </div>
            </div>

        </div>


    </div>

    </div>
</section>
@endsection
