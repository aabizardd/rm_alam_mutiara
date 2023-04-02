@extends('layouts.app')

@section('addStyle')
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/select2/select2.css" />
<link @endsection
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
                        <h4 class="py-3 breadcrumb-wrapper mb-4">
                            <span class="text-muted fw-light">Pengaturan Akun /</span>
                            Akun
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i
                                                class="bx bx-user me-1"></i>
                                            Akun</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-account-settings-security.html"><i
                                                class="bx bx-lock-alt me-1"></i>
                                            Keamanan</a>
                                    </li>

                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">
                                        Detail Profil
                                    </h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="{{ asset('/') }}assets/img/avatars/{{ Auth::user()->avatar }}"
                                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                                id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Unggah foto baru</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden
                                                        accept="image/png, image/jpeg" />
                                                </label>
                                                <button type="button"
                                                    class="btn btn-label-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>

                                                <p class="mb-0">
                                                    Ektensi yang diterima JPG, GIF atau PNG.
                                                    Maksimal ukuran yaitu 2MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="name" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        value="" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input class="form-control" type="text" name="username"
                                                        id="username" value="" />
                                                </div>



                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="role">Role</label>
                                                    <select id="role" class="select2 form-select" name="role">
                                                        <option value="">Select</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="gudang">Gudang</option>
                                                        <option value="manajer">Manajer</option>
                                                        
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">
                                                    Simpan perubahan
                                                </button>
                                                <button type="reset" class="btn btn-label-secondary">
                                                    Batal
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <div class="card">
                                    <h5 class="card-header">
                                        Hapus Akun
                                    </h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading mb-1">
                                                    Apakah Anda yakin ingin menghapus akun Anda?
                                                </h6>
                                                <p class="mb-0">
                                                    Setelah Anda menghapus Anda
                                                    akun, tidak ada
                                                    akan kembali. Silakan
                                                    yakin.
                                                </p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                                    id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi penonaktifan akun saya</label>
                                            </div>
                                            <button type="submit" class="btn btn-danger deactivate-account">
                                                Nonaktifkan Akun
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(
                                        new Date().getFullYear()
                                    );
                                </script>
                                , made with ❤️ by
                                <a href="https://pixinvent.com/" target="_blank"
                                    class="footer-link fw-semibold">PIXINVENT</a>
                            </div>
                            <div>
                                <a href="https://themeforest.net/licenses/standard" class="footer-link me-4"
                                    target="_blank">License</a>
                                <a href="https://1.envato.market/pixinvent_portfolio" target="_blank"
                                    class="footer-link me-4">More Themes</a>

                                <a href="https://demos.pixinvent.com/frest-html-admin-template/documentation/"
                                    target="_blank" class="footer-link me-4">Documentation</a>

                                <a href="https://pixinvent.ticksy.com/" target="_blank"
                                    class="footer-link d-none d-sm-inline-block">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

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
    @section('addScript') <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('/') }}assets/js/pages-account-settings-account.js"></script>
@endsection
