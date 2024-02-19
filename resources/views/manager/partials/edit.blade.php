<div>
    <div class="container">




        <div class="card">

            <div class="text-2xl font-bold mb-4">Edit Site : </div>

            <div class="mb-4">
                <p>Please provide the required information below. We'll start with general information
                    followed by details about the articles you'd like to add.</p>
            </div>
            <form method="post" action="/site/manager/update/{{ $site->id }}" enctype="multipart/form-data">
                @csrf


                <div class="card-body border-2 border-gray-900/10  p-5 rounded  ">


                    <div class="mb-2 text-lg font-semibold">General Information</div>

                    {{-- https://tailwindcomponents.com/component/blog-post-1 --}}





                    <input type="number" value="{{ $site->id }}" name="site_id" hidden readonly>




                    {{-- title site --}}

                    <x-form-input label=" Enter a catchy title for your blog  " name="site_title"
                        placeholder="Enter blog title" value="{{ $site->site_title }}" />



                    {{-- introduction --}}
                    <x-form-textarea label="Provide an engaging introduction to your blog" name="introduction"
                        placeholder="Enter introduction" value="{{ $site->introduction }}" />



                    {{-- imgs  --}}

                    <div class="flex justify-center">
                        <div class="flex flex-wrap">
                            {{-- logo  --}}
                            <x-image-upload label="Upload your logo to personalize your blog  " name="logo"
                                placeholder=" logo/ site "
                                value="{{ asset('storage/' . $site->logo) }}"></x-image-upload>

                            {{-- http://127.0.0.1:8000/images/logo.png --}}
                            {{-- basic image  --}}
                            <x-image-upload label=" Upload a basic image , blog's theme or topic." name="BasicImage"
                                placeholder=" Basic image"
                                value="{{ asset('storage/' . $site->BasicImage) }}"></x-image-upload>
                        </div>
                    </div>
                    <br>






                    {{-- tags --}}
                    <x-form-input label="Add tags or categories to help organize your blog content  " name="tags"
                        placeholder="E.g. google Bard Education ..  " value="{{ $site->tags }}" />


                    {{-- color  --}}
                    <br>





                    <div class="col-span-full m-5">

                        <label class="block text-sm font-medium leading-6 text-gray-900 text-xl">
                            Choose the color for your text,Background,and Separations to match your blog's
                            design</label> <br>



                        <div class="flex flex-wrap justify-around text-center">
                            <x-form-color label="Font Color" name="font_color" value="{{ $site_color->font_color }}" />
                            <x-form-color label="Background Color of Site" name="background_color"
                                value="{{ $site_color->background_color }}" />
                            <x-form-color label="Section Separations" name="section_separator_color"
                                value="{{ $site_color->section_separator_color }}" />
                        </div>

                    </div>

                    <br>



                    {{-- menu  --}}
                    <x-form-radio name="template_type" value="{{ $site_template }}" />




                    <br>

                    <div x-data="{ open: true }" x-show="open"
                        class=" border  m-9 border-green-500   text-green-800 bg-green-50 relative  border-t-4  rounded-b  px-4 py-3 shadow-md"
                        role="alert">
                        <div class="flex">
                            <div class="py-1"><svg
                                    class="fill-current h-6 w-6  mr-4 border border-green-500   text-green-800 bg-green-50  border-0"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg></div>
                            <div>
                                <p class="font-bold"> Note : </p>
                                <p class="text-sm">
                                    For more information about the difference between the menu
                                    types, visit this <a href="http://127.0.0.1:8000/images/navigation-types.jpg"
                                        class="underline text-gray-900" target="_blank">link</a>
                                </p>
                            </div>

                            <span @click="open = false"
                                class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>


                <div class="flex justify-center py-3">
                    <button onclick="addnewArticle(1)" type="button"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <i class="fa-solid fa-plus"></i> Add A New Article
                    </button>
                </div>




                <div id="newArticle_1">

                </div>





                {{-- //{{ $site_articles }} --}}

                @foreach ($site_articles as $site_article)
                    @php
                        // $article_nb = $loop->index + 1;

                        $article_nb = $site_article->article_nb;

                    @endphp

                    <br />

                    @include('manager.partials.editArticle', [
                        'site_article' => $site_article,
                        'article_nb' => $article_nb,
                        'site_title' => $site->site_title,
                    ])
                @endforeach

                <br>











                <div class=" text-center">
                    <br><br>
                    <button type="submit"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Update and View
                    </button>
                </div>


                <br>











            </form>


        </div>


    </div>






    <script>
        // let article_nb = {{ $site_articles->count() + 1 }};
        let site_id = {{ $site->id }};

        function initializeFroalaEditor(id) {
            var siteTitleInput = document.getElementById('site_title');

            // Add an event listener for the 'change' event
            siteTitleInput.addEventListener('change', function() {
                // Get the value of the input field
                var newTitle = siteTitleInput.value;

                // Update FroalaEditor configuration with the new title
                updateFroalaEditor(newTitle, id);

                console.log('Title changed to:', newTitle)
            });

            function updateFroalaEditor(newTitle, id) {
                new FroalaEditor("#article_content_" + id, {
                    heightMin: 200,
                    imageUploadParam: 'image_param',
                    imageUploadURL: '/upload_image/editArticles',
                    imageUploadMethod: 'POST',
                    imageUploadParams: {
                        _token: "{{ csrf_token() }}",
                        site_id: "{{ $site_article->site_id }}",
                        article_nb: id,
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
            updateFroalaEditor(siteTitleInput.value, id);
        }

        function refreshArticleNumbers(article_nb) {
            const articleElements = document.querySelectorAll('.article');
            articleElements.forEach((article, index) => {
                const articleNumberElement = article.querySelector('.articleNumber');

                if (articleNumberElement.textContent >= article_nb) {
                    articleNumberElement.textContent++;
                }


            });

            const articleInputs = document.querySelectorAll('.article_nb_input');
            articleInputs.forEach((input) => {
                const articleNumber = parseInt(input.value);
                if (articleNumber >= article_nb) {
                    // Increment the article number for articles with a number greater than or equal to article_nb
                    console.log('Incrementing article number:', articleNumber);
                    input.value = articleNumber + 1;
                    console.log('New article number:', input.value);
                }

            });
        }


        // Function to add a new article
        const addnewArticle = (article_nb) => {
            // Make an AJAX request to fetch the HTML content for the new article
            fetch(`/manager/addNewArticle/${site_id}/${article_nb}`)
                .then(response => response.json()) // Parse the JSON response
                .then(data => {
                    // Access the 'html' property from the JSON response
                    const html = data.html;
                    const newArticlesDiv = document.getElementById(`newArticle_${article_nb}`);
                    // Append the fetched HTML content to the newArticles div
                    const articleId = data.site_article_id; // Assuming article_id is returned in the JSON response
                    refreshArticleNumbers(article_nb)
                    newArticlesDiv.insertAdjacentHTML('beforeend', html);
                    initializeFroalaEditor(articleId);


                    // Call initializeFroalaEditor function for the newly added article
                    // Assuming each article has a unique id
                    // You may need to adjust this based on your implementation

                })
                .catch(error => {
                    console.error('Error fetching new article:', error);
                });
        };
    </script>



</div>
