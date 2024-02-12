<!-- textarea-input.blade.php -->
@props(['label', 'name', 'placeholder', 'value'])

<div class="col-span-full m-5">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900 text-xl">{{ $label }}</label>
    <div class="mt-2">
        <textarea id="{{ $name }}" name="{{ $name }}" rows="3" placeholder="{{ $placeholder }}" class="block indent-1.5 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-red-400 sm:text-sm sm:leading-6">{{ $value ?? old($name) }}</textarea>
    </div>
    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
