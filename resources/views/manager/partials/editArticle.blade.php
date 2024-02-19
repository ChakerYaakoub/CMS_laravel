<div class="card">



    {{-- <div class="mb-4">
        <p>Please provide the required information below. We'll start with general information
            followed by details about the articles you'd like to add.</p>
    </div> --}}





    <div class="card-body border-2 border-gray-900/10  p-5 rounded article  ">
        <div class="text-2xl font-bold mb-4 ">Article <span class="articleNumber">{{ $site_article->article_nb }}</span>
        </div>

        <div class="mb-2 text-lg font-semibold">Article Information</div>

        {{-- <div class="mb-2 text-md font-semibold">Article number : {{ $article_nb }} </div> --}}

        <input type="number" value="{{ $site_article->id }}" name="articles[{{ $site_article->id }}][id]" hidden readonly>

        <input type="number" class="article_nb_input" value="{{ $site_article->article_nb }}"
            name="articles[{{ $site_article->id }}][article_nb]" hidden readonly>


        {{-- article delete --}}
        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 px-4">
            <input id="deleteCheckbox_{{ $site_article->id }}" type="checkbox" value="true"
                name="articles[{{ $site_article->id }}][delete]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="deleteCheckbox_{{ $site_article->id }}"
                class="w-full py-4 ms-2 text-xl font-medium text-gray-900 dark:text-gray-300">
                Delete Article {{ $site_article->article_nb }} ?
            </label>
            <input id="deleteCheckboxHidden_{{ $site_article->id }}" type="hidden" value="false"
                name="articles[{{ $site_article->id }}][delete]">
        </div>



        {{-- title article --}}
        <x-form-input label=" Enter a  title for this article  " name="articles[{{ $site_article->id }}][title]"
            placeholder="Enter a article title" value="{{ $site_article->article_title }}" />




        {{-- article-content  --}}
        <div class="mb-3">



            <label for="article_content_{{ $site_article->id }}" class="mb-2 text-lg font-semibold">Article
                Content</label>

            <textarea class="form-control" @error('article_content') is-invalid @enderror"
                id="article_content_{{ $site_article->id }}" name="articles[{{ $site_article->id }}][content]" rows="5">{{ $site_article->article_content }}</textarea>

            @error('article_content')
                <span class="invalid-feedback">
                    <strong>{{ $errors->first("articles[{ $site_article->id  }][content]") }}</strong>
                </span>
            @enderror

            <br>




        </div>






        <br>








    </div>



</div><br>


<div class="flex justify-center py-3">
    <button onclick="addnewArticle({{ $site_article->article_nb + 1 }})" type="button"
        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <i class="fa-solid fa-plus"></i> Add A New Article
    </button>
</div>




<div id="newArticle_{{ $site_article->article_nb + 1 }}">

</div>





<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var siteTitleInput = document.getElementById('site_title');

        // Add an event listener for the 'change' event
        siteTitleInput.addEventListener('change', function() {
            // Get the value of the input field
            var newTitle = siteTitleInput.value;

            // Update FroalaEditor configuration with the new title
            updateFroalaEditor(newTitle);

            console.log('Title changed to:', newTitle)
        });

        // for update the deleted checkbox
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const hiddenInputId = checkbox.id.replace('deleteCheckbox',
                    'deleteCheckboxHidden');
                const hiddenInput = document.getElementById(hiddenInputId);

                if (checkbox.checked) {
                    hiddenInput.value = 'true';
                } else {
                    hiddenInput.value = 'false';
                }
            });

            // Set initial value on page load
            const hiddenInputId = checkbox.id.replace('deleteCheckbox', 'deleteCheckboxHidden');
            const hiddenInput = document.getElementById(hiddenInputId);
            hiddenInput.value = checkbox.checked ? 'true' : 'false';
        });

        function updateFroalaEditor(newTitle) {
            new FroalaEditor("#article_content_{{ $site_article->id }}", {
                heightMin: 200,
                imageUploadParam: 'image_param',
                imageUploadURL: '/upload_image/editArticles',
                imageUploadMethod: 'POST',
                imageUploadParams: {
                    _token: "{{ csrf_token() }}",
                    site_id: "{{ $site_article->site_id }}",
                    article_nb: "{{ $site_article->article_nb }}",
                    title: newTitle, // Pass the new title here
                    froala: true
                },
                events: {
                    'image.removed': function($img) {
                        fetch('/image_delete/articles', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({
                                    src: $img.attr('src'),
                                    _token: '{{ csrf_token() }}'
                                })
                            })
                            .then(response => {
                                if (response.ok) {
                                    console.log('Image was deleted successfully');
                                } else {
                                    console.error('Failed to delete image');
                                }
                            })
                            .catch(error => {
                                console.error('Error occurred:', error);
                            });
                    }
                },
                toolbarButtons: [
                    ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough'],
                    ['alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'textColor',
                        'backgroundColor'
                    ],
                    ['formatOLSimple', 'formatUL', 'insertLink', 'insertImage'],
                ]
            });
        }

        // Initialize FroalaEditor with initial title value
        updateFroalaEditor(siteTitleInput.value);
    });
</script>


</div>
