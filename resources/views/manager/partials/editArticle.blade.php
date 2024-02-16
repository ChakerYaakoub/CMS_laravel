<div class="card">



    {{-- <div class="mb-4">
        <p>Please provide the required information below. We'll start with general information
            followed by details about the articles you'd like to add.</p>
    </div> --}}





    <div class="card-body border-2 border-gray-900/10  p-5 rounded  ">
        <div class="text-2xl font-bold mb-4">Article {{ $site_article->article_nb }}</div>

        <div class="mb-2 text-lg font-semibold">Article Information</div>

        {{-- <div class="mb-2 text-md font-semibold">Article number : {{ $article_nb }} </div> --}}

        <input type="number" value="{{ $site_article->id }}" name="articles[{{ $article_nb }}][id]" hidden readonly>

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 px-4">
            <input id="bordered-radio-1" type="radio" value=true name="articles[{{ $article_nb }}][delete]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-xl font-medium text-gray-900 dark:text-gray-300">
                Delete Artilce {{ $site_article->article_nb }} ?
                <input id="bordered-radio-1" type="radio" value=false name="articles[{{ $article_nb }}][delete]"
                    hidden checked />


            </label>
        </div>


        {{-- title article --}}
        <x-form-input label=" Enter a  title for this article  " name="articles[{{ $article_nb }}][title]"
            placeholder="Enter a article title" value="{{ $site_article->article_title }}" />




        {{-- article-content  --}}
        <div class="mb-3">



            <label for="article_content_{{ $site_article->site_id }}" class="form-label">article content</label>
            <textarea class="form-control" @error('article_content') is-invalid @enderror"
                id="article_content_{{ $site_article->site_id }}" name="articles[{{ $article_nb }}][content]" rows="5">{{ $site_article->article_content }}</textarea>

            @error('article_content')
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('article_content') }}</strong>
                </span>
            @enderror

            <br><br>







        </div>






        <br>





        <div id="formOutput" class="fr-view"></div>


    </div>



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

        function updateFroalaEditor(newTitle) {
            new FroalaEditor("#article_content_{{ $site_article->site_id }}", {
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
