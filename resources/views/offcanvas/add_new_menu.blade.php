<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
            Tambah Menu Baru
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm" enctype="multipart/form-data"
            action="{{ route('menu.store') }}" method="POST">

            @csrf

            <img class="center mb-2 img-preview-add" src="{{ asset('/') }}assets/img/default.jpg" alt=""
                style="width: 200px; height: 200px;display: block;
            margin-left: auto;
            margin-right: auto;border-radius: 100%">

            <div class="mb-3">
                <label class="form-label" for="">Foto Menu</label>
                <input type="file" class="form-control" id="avatar_add" placeholder="John Doe" name="gambar"
                    aria-label="John Doe" onchange="preview_img()" accept="image/*" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="nama_barang">Nama Menu</label>
                <input type="text" class="form-control" id="nama_menu" placeholder="Contoh: Ayam Bakar Madu"
                    name="nama_menu" value="{{ old('nama_menu') }}" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="stok">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}"
                    placeholder="18000" />
            </div>


            <div class="mb-3">
                <label class="form-label" for="user-plan">Pilih Jenis Menu</label>
                <select id="user-plan" class="form-select" name="jenis">
                    <option value="" selected disabled>---- Pilih ----</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                </select>
            </div>




            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submitBtn">
                Submit
            </button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </form>
    </div>
</div>
