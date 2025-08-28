<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="{{ asset('font-awesome-4/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('Datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/build/toastr.min.css') }}">

    <title>webdevd@dp</title>
    <!-- Custome Page CSS -->
    @stack('page-style')
</head>
<body class="bg-light">
    <!-- Modal -->
    <div class="modal mt-5" id="modalId" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="hideModal()"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <!-- Page Code Goes Here -->
        {{ $slot }}
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('jQuery/jquery-3.7.0.js') }}" type="text/javascript"></script>
    <script src="{{ asset('Datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('toastr/toastr.js') }}"></script>
    <!-- Custome Page JS -->
    <script src="{{ asset('script.js') }}" type="text/javascript"></script>
    @stack('page-script')
</body>
</html>
