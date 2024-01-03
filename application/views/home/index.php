<div class='container mt-3'>
    <div class ="row mt-3">
            <div class = "col-md-6">
                <?php if ($this->session->flashdata("flash")):?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Furniture <strong>berhasil</strong> <?= $this->session->flashdata("flash"); ?> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <a href="<?= base_url();?>home/tambah" class="btn btn-primary mt-2 mb-4">Tambah Barang</a>    
    <table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nama Barang</th>
        <th scope="col" class="text-center">Harga Barang</th>
        <th scope="col" class="text-center">Jumlah Stok</th>
        <th scope="col" class="text-center">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang as $brg) :?>
        <tr>
        <th scope="row"><?= $brg["id_brg"];?></th>
        <td><?= $brg["nama_brg"];?></td>
        <td class="text-center">Rp. <?= number_format($brg["harga_brg"],0,",",".");?></td>
        <td class="text-center"><?= $brg["jumlah_stok"];?></td>
        <td>
            <div class="text-center">
                <a href="<?= base_url(); ?>home/edit/<?= $brg["id_brg"]; ?>"> <img src="<?php echo base_url(); ?>/asset/edit.png" class=" bg-primary rounded ms-2"  width=30 alt="..."></a>
                <a href="<?= base_url(); ?>home/hapus/<?= $brg["id_brg"]; ?>" onclick="return confirm('yakin menghapus data?');"><img src="<?php echo base_url(); ?>/asset/delete.png" class=" bg-danger rounded ms-2"  width=30 alt="..."></a>
            </div>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>