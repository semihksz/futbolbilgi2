<!doctype html>
<html lang="tr" class="{{ auth()->check() && auth()->user()->mode == '1' ? 'dark-theme' : 'light-theme' }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('assets/backend/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/backend/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('assets/backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome/css/all.min.css') }}">

    <!-- CSS Files -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{ asset('assets/backend/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/header-colors.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    {{-- Date Picker --}}
    <link href="{{ asset('assets/backend/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/notifications/css/lobibox.min.css') }}" />
    <title>Galatasaray SK | Admin Paneli</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        @include('admin.inc.sidebar')
        <!--end sidebar -->

        <!--start top header-->
        @include('admin.inc.header')
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                @yield('content')

            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <!--start footer-->
        @include('admin.inc.footer')
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        {{-- <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
            </button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1" checked>
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark"
                            value="option3">
                        <label class="form-check-label" for="SemiDark">Semi Dark</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>

                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        <!--end switcher-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->


    <!-- JS Files-->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{ asset('assets/backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/index.js') }}"></script>

    {{-- datatable --}}
    <script src="{{ asset('assets/backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/table-datatable.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>

    {{-- validation --}}

    <script src="{{ asset('assets/backend/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/validation/validation-script.js') }}"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    {{-- datetime picker --}}
    <script src="{{ asset('assets/backend/plugins/datetimepicker/js/legacy.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datetimepicker/js/picker.time.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
    <script
        src="{{ asset('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/js/form-date-time-pickes.js') }}"></script>

    {{-- ckeditor --}}
    <script src="{{ asset('assets/backend/ckeditor/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);

            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);

            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);

            });
    </script>

    {{-- notifications --}}
    <script src="{{ asset('assets/backend/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/notifications/js/notification-custom-script.js') }}"></script>
</body>

</html>
