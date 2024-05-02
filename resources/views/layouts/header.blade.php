<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Phonebook</a>
            </div>

          </div>

        </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <!-- <a href="{{ route('logout') }}" class="text-sm font-semibold leading-6 text-white">Logout <span aria-hidden="true">&rarr;</span></a> -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')" class="text-sm font-semibold leading-6 text-white"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    Logout <span aria-hidden="true">&rarr;</span>
                </a>
            </form>
          </div>
    </div>


  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h6 class="text-1xl tracking-tight text-gray-900">  Hi, {{ Auth::user()->name }} welcome to the </h6>
     
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Phonebook CRUD</h1>
    </div>
  </header>