@extends('layouts.app')

@section('addStyle')
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.css" />
@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->

            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="container-fluid">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                            @include('layouts.headbar')
                        </div>


                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Users List Table -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h5 class="card-title">Kalkulator Menu</h5>

                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <h6 class="alert-heading mb-1">
                                            <i class="bx bx-xs bx-store align-top me-2"></i>Danger!
                                        </h6>
                                        <span>

                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>

                                        </span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif --}}


                            </div>

                            <div class="card-body">


                                <div class="col-md-12 mb-4 mt-3">
                                    <label for="TagifyUserList" class="form-label">List Menu</label>
                                    <input id="TagifyUserList" name="TagifyUserList" class="form-control" value=""
                                        placeholder="Cari menu makanan dan minuman....." />
                                </div>

                                <div>
                                    <h4>Total: <span id="total" class="total">Rp. 0</span></h4>
                                </div>

                                <div class="col-md-12 mb-4 mt-3">
                                    <label class="form-label">Jumlah Pembayaran</label>
                                    <input id="jumlahPembayaran" name="jumlahPembayaran" class="form-control rupiah angka"
                                        value="Rp. " type="text" placeholder="" />
                                </div>

                                <div>
                                    <h4>Kembalian: <span id="kembalian" class="kembalian">Rp. 0</span></h4>
                                </div>


                            </div>



                        </div>
                    </div>
                    <!-- / Content -->

                    @include('layouts.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection

@section('addScript')
    {{-- <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('/') }}assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/select2/select2.js"></script>\
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>


    <script src="{{ asset('/') }}assets/vendor/libs/tagify/tagify.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/bloodhound/bloodhound.js"></script>

    <script src="{{ asset('/') }}assets/js/forms-selects.js"></script>
    <script src="{{ asset('/') }}assets/js/forms-tagify.js"></script>
    <script src="{{ asset('/') }}assets/js/forms-typeahead.js"></script>

    <!-- Page JS -->
    {{-- <script src="{{ asset('/') }}assets/js/app-user-list.js"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            $("#submitBtn").click(function() {
                $("#addNewUserForm").submit(); // Submit the form
            });
        });
    </script> --}}



    <script>
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp ' + ribuan;
        }
    </script>



    @if ($message = Session::get('success'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @endif


    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#offcanvasAddUser').offcanvas('show')
            });
        </script>
    @endif
@endsection
