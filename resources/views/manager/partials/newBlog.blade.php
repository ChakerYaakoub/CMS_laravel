<!-- Blade file containing the TinyMCE configuration -->
<div lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>TinyMCE in Laravel</title>
      <!-- Include TinyMCE library -->
      <script src="https://cdn.tiny.cloud/1/undmhk2mhwb0kvxtdl0h9vafqwvzckuwnqfy151r5v3kkyil/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
tinymce.init({
    selector: 'textarea#myeditorinstance',
    plugins: 'code table lists image link',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image',
    images_upload_url: '/upload/image', // Specify the image upload route
    images_upload_handler: function (blobInfo, success, failure) {
        var formData = new FormData();
        formData.append('image', blobInfo.blob(), blobInfo.filename());

        fetch('/upload/image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in headers
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                success(`http://127.0.0.1:8000/storage/${data.url}`);
                console.error(`http://127.0.0.1:8000/storage/${data.url}`);
            } else {
                console.error('Error uploading image:', data.message);
                failure('Image upload failed');
            }
        })
        .catch(error => {
            console.error('Error uploading image:', error);
            failure('Image upload failed');
        });
    }
});




      </script>
    </head>
    <body>
      <h1>TinyMCE in Laravel</h1>
      <p> info princsdusd  <input type="text"> </p>
      <p> photo principal </p>
      <p>tags </p>
      <hr>
      
      br 
      <p>title artivcle </p> ..
   
      <!-- TinyMCE editor -->
      <form method="post">
        @csrf
        
        <textarea id="myeditorinstance"></textarea>
        <input type="submit" value="Submit">
      </form>
    </body>
  </div>
  