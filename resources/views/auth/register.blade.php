<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>registration</title>


</head>

<body>

    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="{{ route('post_register') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input name="name" type="text" id="form3Example1cg"
                                            class="form-control form-control-lg" />
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="email" type="email" id="form3Example3cg"
                                            class="form-control form-control-lg" />
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="form3Example4cg"
                                            class="form-control form-control-lg" />
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="password_confirmation" type="password" id="form3Example4cdg"
                                            class="form-control form-control-lg" />
                                            @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                            href="{{ route('login') }}" class="fw-bold text-body">Log in</a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
