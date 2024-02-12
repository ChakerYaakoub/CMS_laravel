@props(['name', 'value'])



<div class="col-span-full m-5">

    <label class="block text-sm font-medium leading-6 text-gray-900 text-xl">
        Select the type of menu layout you prefer for your blog. </label> <br>

    <div class="flex flex-wrap justify-between text-center">

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 px-4">
            <input id="bordered-radio-1" type="radio" value="vertical_menu" name="{{ $name }}"
                {{ $value === 'vertical_menu' ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1"
                class="w-full py-4 ms-2 text-xl font-medium text-gray-900 dark:text-gray-300">Vertical
                Menu
                <i class="fa-solid fa-ruler-vertical  "></i></label>
        </div>

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700  px-4">
            <input id="bordered-radio-2" type="radio" value="horizontal_menu" name="{{ $name }}"
                {{ $value === 'horizontal_menu' ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2"
                class="w-full py-4 ms-2 text-xl font-medium text-gray-900 dark:text-gray-300">Horizontal
                Menu
                <i class="fa-solid fa-ruler-horizontal"></i>
            </label>
        </div>

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700  px-4">
            <input id="bordered-radio-3" type="radio" value="burger_menu" name="{{ $name }}"
                {{ $value === 'burger_menu' ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-3"
                class="w-full py-4 ms-2 text-xl font-medium text-gray-900 dark:text-gray-300">Burger
                Menu
                <i class="fa-solid fa-bars"></i>
            </label>
        </div>

        @error($name)
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

    </div>




</div>
