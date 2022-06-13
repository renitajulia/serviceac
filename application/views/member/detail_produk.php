<div class="block-heading ">
    <h2 style="background:gray; color:yellow; padding:0.25em; border-radius:0.3em;border-bottom:3px double yellow ">DETAIL PRODUK</h2>
</div>
<div class="x_panel" align="center">
    <div class="x_content">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($prodfeature as $produk) { ?>
                    <?= form_open_multipart('pesanan/simpan/' . $produk->id_produk); ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail" style="height: auto; position: relative; left: 110%; width: 200%;">
                            <img src="<?php echo base_url(); ?>assets/uploads/pizza/<?= $produk->image; ?>" style="max-width:100%; max-height: 100%; height: 150px; width: 120px" />
                            <div class="caption">
                                <h5 style="min-height:40px;" align="center"><?= $produk->nama_produk; ?></h5>
                                <center>
                                    <table class="table table-stripped" align="center">
                                        <input type="hidden" name="id_produk" value="<?= $produk->id_produk; ?>">
                                        <input type="hidden" name="kode_produk" value="<?= $produk->kode_produk; ?>">
                                        <tr>
                                            <th nowrap>Harga </th>
                                            <td nowrap><?= $produk->harga; ?> <input type="hidden" name="harga" value="<?= $produk->harga; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th nowrap>Tambahkan Type AC </th>
                                            <td><?= $produk->ukuran; ?><input type="hidden" name="ukuran" value="<?= $produk->ukuran; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th nowrap>Tambahkan Merk AC </th>
                                            <td>
                                                <select name="toping" id="toping" class="form-control">
                                                    <?php foreach ($prodtop as $toping) { ?>
                                                        <option value="<?= $toping->id_toping; ?>"><?= $toping->nama_toping; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th nowrap>Jumlah</th>
                                            <td>
                                                <input type="number" name="jumlah" class="form-control">
                                        </tr>
                                        <tr>
                                            <th nowrap>Alamat</th>
                                            <?php foreach ($user as $u) { ?>
                                                <td>
                                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"><?= $u->alamat; ?></textarea>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <th nowrap>No. HP/ Whatsapp</th>
                                            <?php foreach ($user as $u) { ?>
                                                <td><input type="text" class="form-control" name="nohp" value="<?= $u->no_telp; ?>"></td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </center>
                                <p>
                                    <button type="submit" class="btn btn-success btn-md fas fw fa-shopping-cart"> Pesan</button>
                                    <span class="btn btn-outline-secondary fas fw fa-reply" onclick="window.history.go(-1)"> Kembali</span>
                                </p>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>