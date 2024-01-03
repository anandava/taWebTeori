<div class="container">
    <div class ="row mt-3">
        <div class = "col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white fw-bolder">
                    Tambah Data Barang
                </div>  
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                <form action = "" method= "post">
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang">
                        <label for="hargaBarang" class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" id="hargaBarang" name="hargaBarang">
                        <label for="jumlahStok" class="form-label">Jumlah Stok</label>
                        <input type="text" class="form-control" id="jumlahStok" name="jumlahStok">
                    </div>
                    <div class = "d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>