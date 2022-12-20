<!doctype html>
    <html lang="en">
    <head>
        <title>Sistem Pilihan Kejuruan Bidang Keteknikan Perguruan Tinggi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{asset('assetlogin/css/style.css')}}">

        </head>
        <body>
            <section class="ftco-section">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-5">
                            <div class="wrap">
                                <div class="img" style="background-image: url('{{ asset('assetlogin/images/bg-1.png')}}');">
                                    
                                </div>
                        
                                    <div class="login-wrap p-4 p-md-4">
                                        <hr>
                                        <h4 align="center">Sistem Pilihan Kejuruan Bidang Keteknikan Perguruan Tinggi</h4>
                                        <hr>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <br />
                                        @elseif (Session::has('invalid-captcha'))
                                        <div class="alert alert-danger">   
                                                <p>{{ Session::get('invalid-captcha') }}</p>                               
                                        </div>
                                        <br />
                                        @endif
                                        <form action="{{route('login.custom')}}" method="POST" class="signin-form">
                                            @csrf
                                            <div class="form-group mt-3">
                                                <input type="email" class="form-control" name="email" required>
                                                <label class="form-control-placeholder" for="username">Email</label>
                                                @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="password-field" type="password" name="password" class="form-control" required>
                                                <label class="form-control-placeholder" for="password">Password</label>
                                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mt-4 mb-4">
                                                <div class="captcha">
                                                    <span>{!! captcha_img() !!}</span>
                                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                        &#x21bb;
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <input id="captcha" type="text" class="form-control" placeholder="Masukan kode captcha" name="captcha">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" style="background: indigo;color: white;" class="form-control btn rounded submit px-3">Masuk / Login</button>
                                            </div>
                                            
                                        </form>
                                        <p class="text-center">Belum punya akun? <a href="{{route('register-user')}}">Daftar</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{asset('assetlogin/js/jquery.min.js')}}"></script>
                    <script src="{{asset('assetlogin/js/popper.js')}}"></script>
                        <script src="{{asset('assetlogin/js/bootstrap.min.js')}}"></script>
                            <script src="{{asset('assetlogin/js/main.js')}}"></script>
                                <script type="text/javascript">
                                    $('#reload').click(function () {
                                        $.ajax({
                                            type: 'GET',
                                            url: 'reload-captcha',
                                            success: function (data) {
                                                $(".captcha span").html(data.captcha);
                                            }
                                        });
                                    });
                                </script>
                            </body>
                            </html>

