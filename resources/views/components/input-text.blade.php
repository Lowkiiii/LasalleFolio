<input 
       class="text-black rounded-md shadow-md border-InputGray border peer block min-h-[auto] w-full bg-white px-3 py-[0.01rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 {{ $errors->has($name) ? 'border-2 border-red-500' : '' }}"
       type="{{ $type ?? 'text' }}"
       id="{{ $id ?? $name }}"
       name="{{ $name }}"
       placeholder="{{ $placeholder ?? '' }}"
       {{ $attributes }}
/>
