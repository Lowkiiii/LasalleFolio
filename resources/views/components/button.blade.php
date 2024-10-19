@php
    $classes = match ($type) {
         'primary' => 'inline-block rounded-xl bg-[#006634] px-7 pb-2.5 pt-3 text-sm font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-300 ease-in-out hover:bg-[#004423] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#004423] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#004423] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] w-full',
         'secondary' => 'inline-flex items-center rounded-lg bg-[#006634] px-4 py-2 text-xs font-medium text-white whitespace-nowrap',
         default => 'inline-block rounded-xl bg-gray-300 text-black px-4 py-2' // Default case
    };
@endphp
<button id="{{ $id }}" type="button"
        class="{{ $classes }}"
        onclick="{{$onclick}}"
        data-te-ripple-init data-te-ripple-color="light">
    {{ $slot }}
</button>