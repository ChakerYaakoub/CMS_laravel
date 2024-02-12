@props(['label', 'name', 'value', 'placeholder'])

<div class="py-6 m-5 ">
    <label for="{{ $name }}"
        class="block text-sm font-medium leading-6 text-gray-900 text-xl mb-3">{{ $label }}</label>
    <input id="upload-{{ $name }}" type="file" class="hidden" accept="image/*" name="{{ $name }}"
        value="{{ $value ?? old($name) }}" />

    <div id="image-preview-{{ $name }}"
        class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">

        <label for="upload-{{ $name }}" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
            </svg>
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload your {{ $placeholder }}</h5>
            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b
                    class="text-gray-600">2mb</b></p>
            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or
                    GIF</b> format.</p>
            <span id="filename-{{ $name }}" class="text-gray-500 bg-gray-200 z-50"></span>
        </label>
    </div>

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<script>
    const uploadInput{{ $name }} = document.getElementById('upload-{{ $name }}');
    const filenameLabel{{ $name }} = document.getElementById('filename-{{ $name }}');
    const imagePreview{{ $name }} = document.getElementById('image-preview-{{ $name }}');

    // Check if the event listener has been added before
    let isEventListenerAdded{{ $name }} = false;

    // Function to display image preview
    // Function to display image preview and enable modification
    function displayImagePreview{{ $name }}(src) {
        imagePreview{{ $name }}.innerHTML =
            `<img src="${src}" class="w-80 h-36 rounded-lg mx-auto cursor-pointer" alt="Image preview" />`;
        imagePreview{{ $name }}.classList.remove('border-dashed', 'border-2', 'border-gray-400');



        // Add event listener to the image for modification
        const imgElement = imagePreview{{ $name }}.querySelector('img');
        imgElement.addEventListener('click', () => {
            uploadInput{{ $name }}.click();
        });
    }


    // Check if there's a value provided
    @if (isset($value) && !empty($value))
        displayImagePreview{{ $name }}("{{ $value }}");
    @endif

    uploadInput{{ $name }}.addEventListener('change', (event) => {
        const file = event.target.files[0];

        if (file !== undefined) { // Check if a file has been selected
            filenameLabel{{ $name }}.textContent = file.name;

            const reader = new FileReader();
            reader.onload = (e) => {
                displayImagePreview{{ $name }}(e.target.result);

                // Add event listener for image preview only once
                if (!isEventListenerAdded{{ $name }}) {
                    imagePreview{{ $name }}.addEventListener('click', () => {
                        uploadInput{{ $name }}.click();
                    });

                    isEventListenerAdded{{ $name }} = true;
                }
            };
            reader.readAsDataURL(file);
        } else {
            filenameLabel{{ $name }}.textContent = '';
            imagePreview{{ $name }}.innerHTML =
                `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
            imagePreview{{ $name }}.classList.add('border-dashed', 'border-2', 'border-gray-400');

            // Remove the event listener when there's no image
            imagePreview{{ $name }}.removeEventListener('click', () => {
                uploadInput{{ $name }}.click();
            });

            isEventListenerAdded{{ $name }} = false;
        }
    });

    uploadInput{{ $name }}.addEventListener('click', (event) => {
        event.stopPropagation();
    });
</script>
