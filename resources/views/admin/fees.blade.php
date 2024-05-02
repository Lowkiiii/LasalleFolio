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
            <h2 class="text-3xl font-bold mb-7">Create a Rate</h2>
            <div class="w-full flex justify-end ">
                <a href="/admin-addrates" class="bg-[#7bafed] hover:bg-[#010c2a] transition ease-in-out duration-150 p-2 rounded-md mb-7 text-white"><strong>+</strong> Add New Rate</a>            </div>
            <table
                class="min-w-full text-sm font-light dark:border-neutral-500 bg-[#010e3b]">
                    <thead class="font-medium text-black dark:border-neutral-500 text-white">
                        <tr>
                            <th
                                scope="col"
                                class=" text-left dark:border-neutral-500 pb-3.5 pl-4">
                                RANGE
                            </th>
                            <th
                                scope="col"
                                class=" text-left dark:border-neutral-500 pb-3.5">
                                RATES IN USD
                            </th>
                            <th scope="col" class="text-left dark:border-neutral-500 pb-3.5" colspan="2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#a4b8ff] text-black">
                        @foreach ($fees as $cont)
                            <tr class="border-t border-b border-neutral-300 ease-in-out hover:bg-neutral-100">
                                <td class="flex flex-col whitespace-nowrap px-4 py-4 dark:border-neutral-500">
                                    <div class="mb-0.5">
                                        {{ $cont->min_amt }} - {{ $cont->max_amt}}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap py-4 dark:border-neutral-500">{{ $cont->rates }}</td>
                                <td
                                    class="whitespace-nowrap py-4 dark:border-neutral-500 ">
                                    <a href="{{ route('admin.editrate', ['id' => $cont->id] ) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </td>
                                <td
                                    class="whitespace-nowrap px-6 py-4 dark:border-neutral-500 ">
                                    <form action="{{ route('admin.deleterate',$cont->id) }}" method="GET" onsubmit="return confirm('{{ trans('Are you sure you want to delete this ? ') }}');">
                                        @csrf
                                        <button type="submit" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

        </div>
        
    </div>
</main>
</body>
</html>
