<!DOCTYPE html>
<html lang="en">
<!-- For RTL verison -->
<!-- <html lang="en" dir="rtl"> -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- By adding ./css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is light. -->
    <meta name="color-scheme" content="light dark">

    <!-- By adding ./css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is dark. -->
    <!-- <meta name="color-scheme" content="dark light"> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/overlayscrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- WaitMe -->
    <link rel="stylesheet" href="{{ asset('vendor/waitme/css/waitMe.min.css') }}">

    <!-- Datatables BS 5 -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">

    <!-- Dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('vendor/summernote/css/summernote.min.css') }}">

    <!-- Embed style -->
    @stack('style')

    <!-- Jquery -->
    <script src="{{ asset('vendor/jquery/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body class="layout-fixed">
    <div class="wrapper">
        <!--------------------------------------
            NAVBAR
        --------------------------------------->
        @include('partials.dashboard.navbar')
        <!--------------------------------------
            NAVBAR
        --------------------------------------->

        <!--------------------------------------
            SIDEBAR
        --------------------------------------->
        @include('partials.dashboard.sidebar')
        <!--------------------------------------
            SIDEBAR
        --------------------------------------->

        <!--------------------------------------
            MAIN CONTENT
        --------------------------------------->
        <main class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <section class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="fs-3 m-0"> Halaman @yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <!-- BREADCRUMB -->
                                <!-- BREADCRUMB -->
                            </ol>
                        </div>
                    </section>
                </div>
            </div>
            <div class="content">
                <!--------------------------------------
                    CONTENT
                --------------------------------------->
                @yield('content')
                <!--------------------------------------
                    CONTENT
                --------------------------------------->
            </div>
        </main>
        <!--------------------------------------
            MAIN CONTENT
        --------------------------------------->
    </div>

    <!--REQUIRED SCRIPTS-->
    <!--overlayScrollbars-->
    <script src="{{ asset('vendor/adminlte/vendor/overlayscrollbars/js/OverlayScrollbars.min.js') }}"></script>

    <!-- Bootstrap 5 -->
    <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte/js/adminlte.js') }}"></script>

    <!-- sweetalert JS -->
    <script src="{{ asset('vendor/sweetalert/js/sweetalert2.all.min.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('vendor/adminlte/vendor/chart.js/dist/chart.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- WaitMe -->
    <script src="{{ asset('vendor/waitme/js/waitMe.min.js') }}"></script>

    <!-- Dropify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('vendor/summernote/js/summernote.min.js') }}"></script>

    <!-- Script -->
    <script>
        // --------------------------------------
        // OPTION CSRF
        // --------------------------------------
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
        // ALERT SUCCESS
        // --------------------------------------
        @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: `{{ session('success') }}`
        })
        @endif
        // --------------------------------------
        // ALERT SUCCESS
        // --------------------------------------

        // --------------------------------------
        // ALERT WARNING
        // --------------------------------------
        @if(session('warning'))
        Toast.fire({
            icon: 'warning',
            title: `{{ session('warning') }}`
        })
        @endif
        // --------------------------------------
        // ALERT WARNING
        // --------------------------------------

        // --------------------------------------
        // ALERT FAILED
        // --------------------------------------
        @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: `{{ session('error') }}`
        })
        @endif
        // --------------------------------------
        // ALERT SUCCESS
        // --------------------------------------

        $("body").on("click", (function(e) {
            // --------------------------------------
            // CONFIRM
            // --------------------------------------
            if ($(e.target).hasClass("confirm")) {
                e.preventDefault();
                const href = $(e.target).attr("href");
                Swal.fire({
                    title: "Apakah yakin?",
                    text: "Data akan berubah seperti yang sudah didefinisikan!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya!"
                }).then(result => {
                    if (result.isConfirmed) {
                        $('body').waitMe({
                            effect: 'bounce',
                            text: '',
                            bg: "rgba(255, 255, 255, 0.7)",
                            color: "#000",
                            maxSize: '',
                            waitTime: -1,
                            textPos: 'vertical',
                            fontSize: '',
                            source: '',
                            onClose: function() {}
                        });
                        result.isConfirmed && (document.location.href = href)
                    }
                })
            }
            // --------------------------------------
            // CONFIRM
            // --------------------------------------

            // --------------------------------------
            // PRELOADER
            // --------------------------------------
            if ($(e.target).hasClass("waitme")) {
                $('body').waitMe({
                    effect: 'bounce',
                    text: '',
                    bg: "rgba(255, 255, 255, 0.7)",
                    color: "#000",
                    maxSize: '',
                    waitTime: -1,
                    textPos: 'vertical',
                    fontSize: '',
                    source: '',
                    onClose: function() {}
                });
            }
            // --------------------------------------
            // PRELOADER
            // --------------------------------------
        }));

        // --------------------------------------
        // DESTROY
        // --------------------------------------
        $(document).on('click', '.destroy', function() {
            url = $(this).attr('id');
            Swal.fire({
                title: 'Yakin ingin mengapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: `${url}`,
                        beforeSend: function() {
                            $('body').waitMe({
                                effect: 'bounce',
                                text: '',
                                bg: "rgba(255, 255, 255, 0.7)",
                                color: "#000",
                                maxSize: '',
                                waitTime: -1,
                                textPos: 'vertical',
                                fontSize: '',
                                source: '',
                                onClose: function() {}
                            });
                        },
                        success: function(data) {
                            table.draw();
                            $('body').waitMe("hide");
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus!'
                            })
                        },
                        error: function() {
                            table.draw();
                            $('body').waitMe("hide");
                            Toast.fire({
                                icon: 'success',
                                title: 'Data gagal dihapus!'
                            })
                        },
                    })
                }
            })
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            url = $(this).attr('id');
            Swal.fire({
                title: 'Yakin ingin mengapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete').submit();
                }
            })
        });
        // --------------------------------------
        // DESTROY
        // --------------------------------------

        // --------------------------------------
        // SELECT2
        // --------------------------------------
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
        // --------------------------------------
        // SELECT2
        // --------------------------------------

        // --------------------------------------
        // DROPIFY
        // --------------------------------------
        $('.dropify').dropify();
        // --------------------------------------
        // DROPIFY
        // --------------------------------------

        // --------------------------------------
        // MENU ACTIVE
        // --------------------------------------
        var url = window.location.pathname;
        $('a.nav-link').filter(function() {
            return this.href.split("/")[4] == url.split("/")[2];
        }).addClass('active').parent().parent().parent().addClass('menu-open menu-is-open').children().addClass('active').parent().parent().parent().addClass('menu-open menu-is-open').children().addClass('active');
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
        // --------------------------------------
        // MENU ACTIVE
        // --------------------------------------
    </script>

    <!-- Embed Script -->
    @stack('script')
</body>

</html>