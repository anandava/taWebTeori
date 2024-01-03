<div class='container mt-3'>
    <a href="<?= base_url();?>home/tambah" class="btn btn-primary mt-2 mb-4">Tambah Barang</a>    
    <table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nama Barang</th>
        <th scope="col" class="text-center">Jumlah Beli</th>
        <th scope="col" class="text-center">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transaksi as $trs) :?>
        <tr>
        <th scope="row"><?= $trs["id_transaksi"];?></th>
        <td><?= $trs["nama_barang"];?></td>
        <td class="text-center"><?= $trs["jumlah_beli"];?></td>
        <td class="text-center">Rp. <?= number_format($trs["total"],0,",",".");?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>