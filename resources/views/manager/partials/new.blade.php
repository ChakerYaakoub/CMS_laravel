<div>
    <div class="container">

        <div class="">
            <div class="">
                <div class="card">

                    <div class="text-2xl font-bold mb-4">Information Input and Article Details</div>

                    <div class="mb-4">
                        <p>Please provide the required information below. We'll start with general information
                            followed by details about the articles you'd like to add.</p>
                    </div>


                    <div class="card-body border-2 border-gray-900/10  p-5 rounded  ">


                        <div class="mb-2 text-lg font-semibold">General Information</div>

                        {{-- https://tailwindcomponents.com/component/blog-post-1 --}}



                        <form method="POST" action="/siteGeneral/store" enctype="multipart/form-data">
                            @csrf



                            {{-- title site --}}

                            <x-form-input label=" Enter a catchy title for your blog  " name="site_title"
                                placeholder="Enter blog title" />



                            {{-- introduction --}}
                            <x-form-textarea label="Provide an engaging introduction to your blog" name="introduction"
                                placeholder="Enter introduction" />



                            {{-- imgs  --}}

                            <div class="flex justify-center">
                                <div class="flex flex-wrap">
                                    {{-- logo  --}}
                                    <x-image-upload label="Upload your logo to personalize your blog  " name="logo"
                                        placeholder=" logo/ site "></x-image-upload>

                                    {{-- http://127.0.0.1:8000/images/logo.png --}}
                                    {{-- basic image  --}}
                                    <x-image-upload label=" Upload a basic image , blog's theme or topic."
                                        name="BasicImage" placeholder=" Basic image"></x-image-upload>
                                </div>
                            </div>
                            <br>






                            {{-- tags --}}
                            <x-form-input label="Add tags or categories to help organize your blog content  "
                                name="tags" placeholder="E.g. google Bard Education ..  " />


                            {{-- color  --}}
                            <br>





                            <div class="col-span-full m-5">

                                <label class="block text-sm font-medium leading-6 text-gray-900 text-xl">
                                    Choose the color for your text,Background,and Separations to match your blog's
                                    design</label> <br>



                                <div class="flex flex-wrap justify-around text-center">
                                    <x-form-color label="Font Color" name="font_color" />
                                    <x-form-color label="Background Color of Site" name="background_color" />
                                    <x-form-color label="Section Separations" name="section_separator_color" />
                                </div>

                            </div>

                            <br>



                            {{-- menu  --}}
                            <x-form-radio name="template_type" value="horizontal_menu" />



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
                                            types, visit this <a
                                                href="http://127.0.0.1:8000/images/navigation-types.jpg"
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


                            <div class=" text-center">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Save General Information and Continue to Articles Details
                                </button>
                            </div>








                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
