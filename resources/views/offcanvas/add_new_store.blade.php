<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
            Tambah Toko
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm" enctype="multipart/form-data"
            action="{{ route('toko.store') }}" method="POST">

            @csrf


            <div class="mb-3">
                <label class="form-label" for="nama_barang">Nama Toko</label>
                <input type="text" class="form-control" id="nama_toko" placeholder="Toko A" name="nama_toko" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="stok">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="satuan_bahan">Deskripsi Toko</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="nama_barang">Whatsapp</label>
                <input type="number" class="form-control" id="whatsapp" name="whatsapp" />
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
