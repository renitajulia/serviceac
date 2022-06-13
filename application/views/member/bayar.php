<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12 ">
                <h2>Proses Pesanan Anda !</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php
                foreach ($prodfeature as $produk) {
                    foreach ($pesanan as $p) {
                ?>
                        <div class="forms" style="width:280px; margin:0 auto"></div>
                        <div class="col-md-8">
                            <div class="forms" style="width:280px; margin:0 auto"></div>
                            <div class="table-responsives full-width">
                                <?= form_open_multipart('pesanan/detail/' . $p->kode_pesanan); ?>
                                <table class="table table-bordered " id="table-datatable">
                                    <thead>
                                        <?php
                                        foreach ($membuser as $u) {

                                        ?>
                                            <tr>
                                                <th> Nama </th>
                                                <th><?= $u->nama; ?><input type="hidden" name="id_user" value="<?= $u->id ?>"></th>
                                            </tr>
                                            <tr>
                                                <th> Alamat </th>
                                                <th> <?= $p->alamat; ?> <input type="hidden" name="alamat" value="<?= $p->alamat ?>"></th>
                                            </tr>
                                            <tr>
                                                <th> No. Telp </th>
                                                <th> <?= $p->notelp; ?> <input type="hidden" name="no_telp" value="<?= $p->notelp ?>"> </th>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <th> Jumlah (Qty) </th>
                                            <th> <?= $p->jumlah ?> <input type="hidden" name="jml" value="<?= $p->jumlah ?>"></th>
                                        </tr>
                                        <tr>
                                            <th> Nama Produk </th>
                                            <th> <?= $produk->nama_produk; ?>, Harga: @<?= $produk->harga; ?>x<?= $p->jumlah ?> = <?= $p->jumlah * $produk->harga; ?>
                                                <input type="hidden" name="produk_dibeli" value="<?= $produk->nama_produk; ?>, Harga: @<?= $produk->harga; ?>x<?= $p->jumlah ?> = <?= $p->jumlah * $produk->harga; ?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> Toping </th>
                                            <th> <?= $produk->nama_toping; ?>
                                            </th>
                                            <!-- <th>
                                            <select name="" id="">
                                                <?php foreach ($prodtop as $toping) { ?>
                                                    <option value="<?= $toping->id_toping; ?>"><?= $toping->nama_toping; ?></option>
                                                <?php } ?>
                                            </select>
                                        </th> -->
                                        </tr>
                                        <!-- <tr>
                                        <th> Harga </th>
                                        <th> <?= $produk->harga; ?> </th>
                                    </tr> -->
                                        <tr>
                                            <th> Total </th>
                                            <th> <input type="text" class="form-control" readonly value="<?= $p->total ?>" />
                                                <input type="hidden" name="total_beli" value="<?= $p->total ?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> Metode Pembayaran </th>
                                            <th>
                                                <select class="form-control-lg js-example-basic-single" name="atm" id="atm" style="width:100%" required>
                                                    <option> ATM Mandiri (7365437548)</option>
                                                    <option> ATM BCA (959689548) </option>
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> Bukti Bayar </th>
                                            <th>
                                                <input type="hidden" name="old_pict" id="old_pict" value="<?= $buktitrf; ?>">
                                                <input type="hidden" name="kodepesanan" id="kodepesanan" value="<?= $p->kode_pesanan; ?>">

                                                <picture>
                                                    <source srcset="" type="image/svg+xml">
                                                    <img src="<?= base_url('assets/uploads/member/') . $buktitrf; ?>" style="width:320px; height:250px;" class="rounded mx-auto mb-3 d-blok" alt="...">
                                                </picture><br>
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> Status </th>
                                            <th>
                                                <?= $p->status ?>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                    <span class="btn btn-outline-secondary fas fw fa-reply" onclick="window.history.go(-1)"> Batalkan Transaksi</span>
                                        <button class="btn btn-outline-primary" type="submit"> Proses
                                            <!-- <a href="<?= base_url(); ?>pesanan/detail_pesanan/<?= $produk->kode_produk ?>"> Proses</a> -->
                                        </button>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>

        </div>

    </div>
</div>