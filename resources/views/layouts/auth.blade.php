<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Bootstraps 5 -->
    <link href="{{ asset('vendor/bootstrap5/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome6/css/all.min.css') }}" />

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('_assets/css/login/style.css') }}">

    <!-- Embed style -->
    @stack('style')

    <!-- Jquery -->
    <script src="{{ asset('vendor/jquery/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 bg-login h-min-100 justify-content-center d-none d-md-flex">
                <div class="align-self-center text-center">
                    <!-- <img class="img-fluid mb-5" src="{{ asset('_assets/images/logo.png') }}" alt="Logo Untirta"> -->
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="me-3" style="width: 80px; height: 80px;" src="{{ asset('_assets/images/logo.png') }}" alt="Logo UNTIRTA">
                        <div>
                            <small class="text-white ms-3">Universitas Sultan Ageng Tirtayasa</small>
                            <h1 class="fw-bold text-uppercase mb-0 text-white">{{ config('app.name') }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------------
                CONTENT
            --------------------------------------->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="align-self-center w-100">
                    <div class="text-center mb-5 mt-5 d-md-none">
                        <img src="{{ asset('_assets/images/logo.png') }}" class="img-fluid w-25">
                        <h4 class="text-uppercase fw-bold h4 font-color-page mt-3">@yield('title')</h4>
                        <p class="font-color-page text-uppercase">Universitas sultan ageng tirtayasa</p>
                    </div>
                    @yield('content')
                    <div class="row mt-5">
                        <div class="col-12 pb-5 pb-md-0">
                            <p class="text-center mb-1 font-color-page fw-bold">&copy; {{ date('Y') }} Universitas Sultan Ageng Tirtayasa</p>
                            <p class="text-center mb-1 font-color-page">Developed by Pusdainfo Untirta</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------------------------
                CONTENT
            --------------------------------------->
        </div>

        <!-- Bootstrap -->
        <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

        <!-- sweetalert JS -->
        <script src="{{ asset('vendor/sweetalert/js/sweetalert2.all.min.js') }}"></script>

        <!-- Custom Script -->
        <script>
            $(document).ready(function() {
                // --------------------------------------
                // OPTION TOAST
                // --------------------------------------
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                // --------------------------------------
                // ALERT FAILED
                // --------------------------------------
                @error('error')
                Toast.fire({
                    icon: 'error',
                    title: `{{ $message }}`
                })
                @enderror

                // --------------------------------------
                // ALERT SUCCESS
                // --------------------------------------
                @if(session('success'))
                Toast.fire({
                    icon: 'success',
                    title: `{{ session("success") }}`
                })
                @endif
            })
        </script>

        <!-- Embed Script -->
        @stack('script')
</body>

</html>