<div class="card">


    <div class="text-2xl font-bold mb-4">Information Input and Article Details</div>

    <div class="mb-4">
        <p>Please provide the required information below. We'll start with general information
            followed by details about the articles you'd like to add.</p>
    </div>

    {{-- Site ID: {{ $site_id }} --}}


    <div class="card-body border-2 border-gray-900/10  p-5 rounded  ">

        <div class="mb-2 text-lg font-semibold">Article Information</div>

        <div class="mb-2 text-md font-semibold">Article number : {{ $article_nb }} </div>



        <form id="supportFormArticle" method="POST" enctype="multipart/form-data">
            @csrf




            <input type="number" value="{{ $site_id }}" name="site_id" hidden readonly>
            {{-- blog number --}}
            <input type="number" value="{{ $article_nb }}" name="article_nb" hidden readonly>



            {{-- title article --}}
            <x-form-input label=" Enter a  title for this article  " name="article_title"
                placeholder="Enter a article title" />


            {{-- article-content  --}}
            <div class="mb-3">



                <label for="article_content" class="form-label">article content</label>
                <textarea class="form-control" @error('article_content') is-invalid @enderror" id="article_content"
                    name="article_content" rows="5">{{ old('article_content') ? old('article_content') : '' }}</textarea>

                @error('article_content')
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('article_content') }}</strong>
                    </span>
                @enderror

                <br><br>

                <input type="submit" name="" id="">


                <div class="flex flex-wrap justify-around text-center">

                    <button type="submit" onclick="handleSubmit(true)"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                         focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600
                          dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                            class="fa-solid fa-plus"></i> Save
                        And Add A New Article</button>


                    <button type="submit" onclick="handleSubmit(false)"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 
                          focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600
                           dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                            class="fa-solid fa-box-archive"></i> Save
                        And Preview</button>
                </div>


            </div>




        </form>

        <br>





        <div id="formOutput" class="fr-view"></div>


    </div>



</div>



<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
</script>


<script>
    new FroalaEditor("#article_content", {
        heightMin: 200,
        imageUploadParam: 'image_param',
        imageUploadURL: '/upload_image/articles',
        imageUploadMethod: 'POST',
        imageUploadParams: {
            _token: "{{ csrf_token() }}",
            site_id: "{{ $site_id }}",
            article_nb: "{{ $article_nb }}",
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
            ['alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'textColor', 'backgroundColor'],
            ['formatOLSimple', 'formatUL', 'insertLink', 'insertImage'],
        ]
    });


    const handleSubmit = (addNew) => {

        // Save and add a new article 
        const form = document.getElementById("supportFormArticle");


        const action = '/siteArticles/store/{{ $site_id }}/' + addNew + '/{{ $article_nb }}'
        form.action = action;
        form.submit();
    };





    // document.getElementById("supportFormArticle").addEventListener("submit", function(event) {
    //     // Prevent default form submission behavior
    //     event.preventDefault();

    //     // Gather form field values
    //     var article = document.querySelector('input[name="article_title"]').value;
    //     var blogNb = document.querySelector('input[name="article_nb"]').value;
    //     var request = document.querySelector('textarea[name="article_content"]').value;


    //     // Create HTML content to display form field values
    //     var htmlContent = `

    //             <p><strong>Full title:</strong> ${article}</p>

    //             <p><strong>nb :</strong> ${blogNb}</p>
    //             <p><strong>article content :</strong> ${request}</p>
    //         `;

    //     // Display form field values in HTML format
    //     document.getElementById("formOutput").innerHTML = htmlContent;
    // });
</script>

</div>
