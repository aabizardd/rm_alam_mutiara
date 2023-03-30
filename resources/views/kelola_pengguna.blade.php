@extends('layouts.app')

@section('addStyle')
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
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
                                <h5 class="card-title">List Pengguna Aplikasi</h5>
                                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                    <div class="col-md-4 user_role"></div>
                                    <div class="col-md-4 user_plan"></div>
                                    <div class="col-md-4 user_status"></div>
                                </div>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-users table border-top">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>


                                </table>
                            </div>
                            <!-- Offcanvas to add new user -->
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                                aria-labelledby="offcanvasAddUserLabel">
                                <div class="offcanvas-header border-bottom">
                                    <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
                                        Add User
                                    </h6>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body mx-0 flex-grow-0">
                                    <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
                                        <div class="mb-3">
                                            <label class="form-label" for="add-user-fullname">Full Name</label>
                                            <input type="text" class="form-control" id="add-user-fullname"
                                                placeholder="John Doe" name="userFullname" aria-label="John Doe" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="add-user-email">Email</label>
                                            <input type="text" id="add-user-email" class="form-control"
                                                placeholder="john.doe@example.com" aria-label="john.doe@example.com"
                                                name="userEmail" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="add-user-contact">Contact</label>
                                            <input type="text" id="add-user-contact" class="form-control phone-mask"
                                                placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com"
                                                name="userContact" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="add-user-company">Company</label>
                                            <input type="text" id="add-user-company" class="form-control"
                                                placeholder="Web Developer" aria-label="jdoe1" name="companyName" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="country">Country</label>
                                            <select id="country" class="select2 form-select">
                                                <option value="">Select</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Canada">Canada</option>
                                                <option value="China">China</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Korea">Korea, Republic
                                                    of</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Russia">Russian
                                                    Federation</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab
                                                    Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="user-role">User Role</label>
                                            <select id="user-role" class="form-select">
                                                <option value="subscriber">Subscriber</option>
                                                <option value="editor">Editor</option>
                                                <option value="maintainer">Maintainer</option>
                                                <option value="author">Author</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="user-plan">Select Plan</label>
                                            <select id="user-plan" class="form-select">
                                                <option value="basic">Basic</option>
                                                <option value="enterprise">Enterprise</option>
                                                <option value="company">Company</option>
                                                <option value="team">Team</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-label-secondary"
                                            data-bs-dismiss="offcanvas">
                                            Cancel
                                        </button>
                                    </form>
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

@section('addScript')
    {{-- <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('/') }}assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/select2/select2.js"></script>\
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Page JS -->
    {{-- <script src="{{ asset('/') }}assets/js/app-user-list.js"></script> --}}





    <script>
        $(document).ready(function() {
            $(function() {
                    let t, a, n;
                    n = (isDarkStyle ?
                        ((t = config.colors_dark.borderColor),
                            (a = config.colors_dark.bodyBg),
                            config.colors_dark) :
                        ((t = config.colors.borderColor),
                            (a = config.colors.bodyBg),
                            config.colors)
                    ).headingColor;
                    var e,
                        s = $(".datatables-users"),
                        o = $(".select2"),
                        r = "app-user-view-account.html",
                        l = {
                            1: {
                                title: "Pending",
                                class: "bg-label-warning"
                            },
                            2: {
                                title: "Active",
                                class: "bg-label-success"
                            },
                            3: {
                                title: "Inactive",
                                class: "bg-label-secondary"
                            }
                        };
                    o.length &&
                        (o = o).wrap('<div class="position-relative"></div>').select2({
                            placeholder: "Select Country",
                            dropdownParent: o.parent()
                        }),
                        s.length &&
                        (e = s.DataTable({
                            ajax: "{{ route('kelola_pengguna.users') }}",
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                }, {
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'username',
                                    name: 'username'
                                },
                                {
                                    data: 'role',
                                    name: 'role'
                                },
                                {
                                    data: 'action',
                                },
                            ],
                            columnDefs: [{
                                    className: "control",
                                    searchable: !1,
                                    orderable: !1,
                                    responsivePriority: 2,

                                    render: function(e, t, a, n) {
                                        return "";
                                    },
                                },
                                {
                                    targets: 1,
                                    responsivePriority: 4,
                                    render: function(e, t, a, n) {
                                        var s = a.name,
                                            o = a.username,
                                            l = a.avatar;
                                        return (
                                            '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">' +
                                            (l ?
                                                '<img src="' +
                                                assetsPath +
                                                "img/avatars/" +
                                                l +
                                                '" alt="Avatar" class="rounded-circle">' :
                                                '<span class="avatar-initial rounded-circle bg-label-' +
                                                [
                                                    "success",
                                                    "danger",
                                                    "warning",
                                                    "info",
                                                    "dark",
                                                    "primary",
                                                    "secondary",
                                                ][Math.floor(6 * Math.random())] +
                                                '">' +
                                                (l = (
                                                    ((l = (s = a.full_name).match(
                                                            /\b\w/g) || []).shift() ||
                                                        "") + (l.pop() || "")
                                                ).toUpperCase()) +
                                                "</span>") +
                                            '</div></div><div class="d-flex flex-column"><a href="' +
                                            r +
                                            '" class="text-body text-truncate"><span class="fw-semibold">' +
                                            s +
                                            '</span></a><small class="text-muted">' +
                                            o +
                                            "</small></div></div>"
                                        );
                                    },
                                },
                                {
                                    targets: -1,
                                    title: "Actions",
                                    searchable: !1,
                                    orderable: !1,
                                    render: function(e, t, a, n) {
                                        var s = "/kelola_pengguna/delete/" + a.id;

                                        return (
                                            '<div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><a class="btn btn-sm btn-icon delete-record" href="' +
                                            s + '"><i class="bx bx-trash"></i></a>'
                                        );
                                    },
                                }
                            ],
                            order: [
                                [1, "asc"]
                            ],
                            dom: '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                            language: {
                                sLengthMenu: "_MENU_",
                                search: "",
                                searchPlaceholder: "Cari.."
                            },
                            buttons: [{
                                    extend: "collection",
                                    className: "btn btn-label-secondary dropdown-toggle mx-3",
                                    text: '<i class="bx bx-upload me-1"></i>Export',
                                    buttons: [{
                                            extend: "print",
                                            text: '<i class="bx bx-printer me-2" ></i>Print',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            },
                                            customize: function(e) {
                                                $(e.document.body)
                                                    .css("color", n)
                                                    .css("border-color", t)
                                                    .css("background-color", a),
                                                    $(e.document.body)
                                                    .find("table")
                                                    .addClass("compact")
                                                    .css("color", "inherit")
                                                    .css("border-color", "inherit")
                                                    .css("background-color", "inherit");
                                            }
                                        },
                                        {
                                            extend: "csv",
                                            text: '<i class="bx bx-file me-2" ></i>Csv',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        },
                                        {
                                            extend: "excel",
                                            text: '<i class="bx bxs-file-export me-2"></i>Excel',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        },
                                        {
                                            extend: "pdf",
                                            text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        },
                                        {
                                            extend: "copy",
                                            text: '<i class="bx bx-copy me-2" ></i>Copy',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        }
                                    ]
                                },
                                {
                                    text: '<i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Tambah Pengguna Baru</span>',
                                    className: "add-new btn btn-primary",
                                    attr: {
                                        "data-bs-toggle": "offcanvas",
                                        "data-bs-target": "#offcanvasAddUser"
                                    }
                                }
                            ],
                            responsive: {
                                details: {
                                    display: $.fn.dataTable.Responsive.display.modal({
                                        header: function(e) {
                                            return "Details of " + e.data().full_name;
                                        }
                                    }),
                                    type: "column",
                                    renderer: function(e, t, a) {
                                        a = $.map(a, function(e, t) {
                                            return "" !== e.title ?
                                                '<tr data-dt-row="' +
                                                e.rowIndex +
                                                '" data-dt-column="' +
                                                e.columnIndex +
                                                '"><td>' +
                                                e.title +
                                                ":</td> <td>" +
                                                e.data +
                                                "</td></tr>" :
                                                "";
                                        }).join("");
                                        return (
                                            !!a &&
                                            $('<table class="table"/><tbody />').append(a)
                                        );
                                    }
                                }
                            },
                            initComplete: function() {
                                this.api()
                                    .columns(3)
                                    .every(function() {
                                        var t = this,
                                            a = $(
                                                '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
                                            )
                                            .appendTo(".user_role")
                                            .on("change", function() {
                                                var e = $.fn.dataTable.util.escapeRegex(
                                                    $(this).val()
                                                );
                                                t.search(
                                                    e ? "^" + e + "$" : "",
                                                    !0,
                                                    !1
                                                ).draw();
                                            });
                                        t.data()
                                            .unique()
                                            .sort()
                                            .each(function(e, t) {
                                                a.append(
                                                    '<option value="' +
                                                    e +
                                                    '">' +
                                                    e +
                                                    "</option>"
                                                );
                                            });
                                    })
                            }
                        })),
                        $(".datatables-users tbody").on("click", ".delete-record", function(e) {

                            const url = $(this).attr('href');
                            // var token = $(this).value("token");
                            e.preventDefault();
                            // swal({
                            //     title: "Are you sure you want to delete this record?",
                            //     text: "If you delete this, it will be gone forever.",
                            //     icon: "warning",
                            //     type: "warning",
                            //     buttons: ["Cancel", "Yes!"],
                            //     confirmButtonColor: '#3085d6',
                            //     cancelButtonColor: '#d33',
                            //     confirmButtonText: 'Yes, delete it!'
                            // }).then((willDelete) => {
                            //     if (willDelete) {
                            //         window.location.href = url;
                            //         // alert(url)
                            //     }
                            // });

                            swal({
                                    title: "Are you sure you want to delete this record?",
                                    text: "If you delete this, it will be gone forever.",
                                    icon: "warning",
                                    buttons: ["Batal", "Ya!"],
                                    dangerMode: true,
                                    confirmButtonText: 'Ya, hapus data itu!'
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = url;
                                    } else {
                                        swal("Data batal dihapus!");
                                    }
                                });


                        }),
                        setTimeout(() => {
                            $(".dataTables_filter .form-control").removeClass(
                                    "form-control-sm"
                                ),
                                $(".dataTables_length .form-select").removeClass(
                                    "form-select-sm"
                                );
                        }, 300);
                }),
                (function() {
                    var e = document.querySelectorAll(".phone-mask"),
                        t = document.getElementById("addNewUserForm");
                    e &&
                        e.forEach(function(e) {
                            new Cleave(e, {
                                phone: !0,
                                phoneRegionCode: "US"
                            });
                        }),
                        FormValidation.formValidation(t, {
                            fields: {
                                userFullname: {
                                    validators: {
                                        notEmpty: {
                                            message: "Please enter fullname "
                                        }
                                    }
                                },
                                userEmail: {
                                    validators: {
                                        notEmpty: {
                                            message: "Please enter your email"
                                        },
                                        emailAddress: {
                                            message: "The value is not a valid email address"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap5: new FormValidation.plugins.Bootstrap5({
                                    eleValidClass: "",
                                    rowSelector: function(e, t) {
                                        return ".mb-3";
                                    }
                                }),
                                submitButton: new FormValidation.plugins.SubmitButton(),
                                autoFocus: new FormValidation.plugins.AutoFocus()
                            }
                        });
                })();

        });
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
@endsection
