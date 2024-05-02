<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>

<body class="text-black">
  <main>
  <div class="border-b-2 px-10 flex flex-row items-center justify-between bg-[#313f6a]"> 
        <img src='/image/mtlogo.png' class="size-20 mr-24" />  
        <h1 class="font-bold text-3xl py-5 text-white">SwiftFees</h1>

          <a href="/admin" class="font-bold text-2xl py-5 text-white text-center">
                <li class="px-10 py-3.5 hover:bg-[#010e3b] transition ease-in-out duration-150 flex flex-row items-center">
                            Home
                </li>
            </a>
            <a href="/admin-users" class="font-bold text-2xl py-5 text-white text-center">
                <li class="px-10 py-3.5 hover:bg-[#010e3b] transition ease-in-out duration-150 flex flex-row items-center">
                            Users
                </li>
            </a>
            <a href="/admin-branches" class="font-bold text-2xl py-5 text-white text-center">
                <li class="px-10 py-3.5 hover:bg-[#010e3b] transition ease-in-out duration-150 flex flex-row items-center">
                            Branches
                </li>
            </a>
            <a href="/admin-fees" class="font-bold text-2xl py-5 text-white text-center">
                <li class="px-10 py-3.5 hover:bg-[#010e3b] transition ease-in-out duration-150 flex flex-row items-center">
                            Transaction Fees
                </li>
            </a>

        <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="text-lg font-semibold leading-6 bg-red-500 text-white px-4 py-2 rounded-lg flex items-center justify-center space-x-2 hover:bg-red-600">
                        <span class="mr-2">Logout</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
        </form>
    </div>

    <div class="flex flex-row justify-start text-white">
      <div class="w-full h-screen bg-neutral-100 bg-[#04133e]">
        <div class="m-7">
          <h2 class="text-3xl font-bold mb-7">Create a User</h2>
          <form method="POST" action="{{ route('admin.store')}}">
            <!-- @method('PUT') -->
            @csrf <!-- {{ csrf_field() }} -->
            <div class="w-5/12">
              <div>
                <!--First name input-->
                <div class="grid grid-cols-1 gap-4">
                  <div class="flex flex-row">
                    <div class="relative mr-3.5" data-te-input-wrapper-init>
                      <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="first_name" name="first_name" placeholder="First name" />
                      <label for="first_name"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">First
                        Name*
                      </label>
                    </div>
                    <div class="relative mr-3.5" data-te-input-wrapper-init>
                      <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="middle_name" name="middle_name" placeholder="Middle name" />
                      <label for="middle_name"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Middle
                        Name
                      </label>
                    </div>
                    <div class="relative" data-te-input-wrapper-init>
                      <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="last_name" name="last_name" placeholder="Last name" />
                      <label for="last_name"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Last
                        Name
                      </label>
                    </div>
                  </div>

                  <!-- Birthdate input -->
                  <div class="relative" data-te-input-wrapper-init>
                    <input type="date"
                      class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="birthdate" name="birthdate" placeholder="Birthdate" />
                    <label for="birthdate"
                      class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Birthdate
                    </label>
                  </div>

                  <!-- Full Address input -->
                  <div class="relative" data-te-input-wrapper-init>
                    <input type="text"
                      class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="full_address" name="full_address" placeholder="Full Address" />
                    <label for="full_address"
                      class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Full
                      Address
                    </label>
                  </div>


                  <!-- Email input -->
                  <div class="relative" data-te-input-wrapper-init>
                    <input type="text"
                      class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="email" name="email" placeholder="Email address" />
                    <label for="email"
                      class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Email
                      address*
                    </label>
                  </div>

                  <div class="relative">
                    <select
                      class="peer block min-h-[auto] w-full rounded border border-neutral-400 bg-transparent px-3 py-[0.6rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:border-primary focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:border-neutral-600 dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="user_type_id" name="user_type_id" placeholder="Select an option">
                      <option value="" disabled selected>-- Select a Role --*</option>
                      <option value="1" class="text-black">Admin</option>
                      <option value="2" class="text-black">Teller</option>
                    </select>
                  </div>


                  <div class="relative">
                    <select
                      class="peer block min-h-[auto] w-full rounded border border-neutral-400 bg-transparent px-3 py-[0.6rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:border-primary focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:border-neutral-600 dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="branch_assigned" name="branch_assigned" placeholder="Select an option">
                      <option value="" disabled selected  class="text-black">-- Select a Branch --</option>
                      @foreach ($branch as $cont)
                        <option value="{{$cont->id}}"  class="text-black">{{$cont -> branch_name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <!-- Password input -->
                  <div class="relative mb-10" data-te-input-wrapper-init>
                    <input type="text"
                      class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                      id="password" name="password" placeholder="Password" />
                    <label for="password"
                      class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                      Password*
                    </label>
                  </div>
                </div>

                <!--Submit button-->
                <div class="flex items-center justify-start pb-6">

                  <button type="submit"
                    class="inline-block pull-right rounded bg-success px-6 pb-2 mr-3.5 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                    data-te-ripple-init data-te-ripple-color="light">
                    Add User
                  </button>
                  <a href="/admin-users"
                    class="inline-block pull-right rounded bg-[#7bafed] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-[#4891e8] hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                    Cancel
                  </a>
                </div>
              </div>
          </form>

        </div>


      </div>

    </div>
  </main>
</body>

</html>