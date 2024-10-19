@php
    $classes = match ($type) {
         'primary' => '',
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