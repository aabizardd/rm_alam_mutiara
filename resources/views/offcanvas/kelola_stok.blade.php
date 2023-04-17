<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
            Kelola Stok
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0 form-field" id="addNewUserForm" action="{{ url('inventori/kelola_stok') }}"
            method="POST">

            @csrf


            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">


            <div class="mb-3">
                <label class="form-label" for="stok">Jumlah Stok</label>
                <input type="number" class="form-control" id="stok" placeholder="Beras" name="stok" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="status">Pilih Kegiatan</label>
                <select id="status" class="form-select" name="status">
                    <option value="" selected disabled>---- Pilih ----</option>
                    <option value="1">Tambah Stok</option>
                    <option value="0">Gunakan Stok</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="stok">Keterangan</label>
                <input type="text" class="form-control" id="keterangan"
                    placeholder="Contoh: Digunakan untuk membuat tahu" name="keterangan" value="" />
            </div>


            {{-- <div class="mb-3" id="harga_inp" style="display: none;">
                <label class="form-label" for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="" />
            </div> --}}

            {{-- <div class="mb-3" id="nota_inp">
                    <label class="form-label" for="nota">Nota Pembelian</label>
                    <input type="file" class="form-control" id="nota" name="nota" value=""
                        accept="image/*" />
                </div> --}}




            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submitBtn">
                Submit
            </button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </form>
    </div>
</div>
