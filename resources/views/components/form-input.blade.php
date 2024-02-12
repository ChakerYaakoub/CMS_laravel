<!-- form-input.blade.php -->
@props(['label', 'name', 'placeholder', 'value'])

<div class="col-span-full m-5">
    <label for="{{ $name }}"
        class="block  font-medium leading-6 text-gray-900 text-xl ">{{ $label }}</label>
    <div class="mt-2">
        <input type="text" name="{{ $name }}" id="{{ $name }}" autocomplete="{{ $name }}"
            value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder }}"
            class="block w-full rounded-md border-0 py-1.5 indent-1.5  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400   focus:ring-red-400 sm:text-sm sm:leading-6">
        @error($name)
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
