
<div lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Support App.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

    </head>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="col-md-8 my-5 text-center">
                    Welcome To Our Support App
                </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Submit a Support Request</div>

                        <div class="card-body">
                            <form method="POST" action="" >
                                {{-- {{ route('requests.store') }} --}}
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{(old('name') ? old('name')  : '')}} ">
                                    @error('name')
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{(old('email') ? old('email')  : '')}} " aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    @error('email')
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{(old('subject') ? old('subject')  : '')}} " >
                                    @error('subject')
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                     @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="request" class="form-label">Request Details</label>
                                    <textarea class="form-control @error('request') is-invalid @enderror"
                                    id="request" name="request" rows="5">{{(old('request') ? old('request')  : '')}}</textarea>

                                    @error('request')
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('request') }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                <button class="btn btn-primary">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>

        <script>
            new FroalaEditor("#request", {

                toolbarButtons: [
                    ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough'],
                    [ 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify','textColor', 'backgroundColor'],
                    ['formatOLSimple', 'formatUL', 'insertLink','insertImage','insertFile'],
                ]

            });
        </script>
    </div>

</div>