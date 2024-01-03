<div class="container">
    <div class ="row mt-3">
        <div class = "col-md-6">
                <?php if ($this->session->flashdata("flash")):?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Transaksi <strong><?= $this->session->flashdata("flash"); ?></strong>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                <?php endif; ?>
            <div class="card mt-2">
                <div class="card-header text-center bg-primary text-white fw-bolder">
                    Transaksi Barang
                </div>  
                <div class="card-body">
                <?php if (validation_errors()): ?>
                    <div class="alert alert-danger">
                        <?= validation_errors(); ?>
                    </div>
                <?php elseif (isset($error) && !empty($error)): ?>
                    <div class="alert alert-danger">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>
                <form action = "" method= "post">
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idBarang">
                            <?php foreach ($barang as $brg) :?>
                            <option value="<?= $brg["id_brg"]; ?>"><?= $brg["nama_brg"]?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="jumlahBeli" class="form-label">Jumlah Beli</label>
                        <input type="text" class="form-control" id="jumlahBeli" name="jumlahBeli">
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
