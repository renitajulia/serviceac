<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Ubah Profil</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="forms" style="width:280px; margin:0 auto"></div>
                <?php foreach ($profil as $profil) { ?>
                    <?= form_open_multipart('member/u_profil'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $profil->nama; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $profil->email; ?>">
                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $profil->id; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $profil->alamat; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $profil->no_telp; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php
                        if (isset($profil->image)) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $profil->image; ?>">
                            <input type="hidden" name="id_produk" id="id_produk" value="<?= $profil->id; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/uploads/member/') . $profil->image; ?>" class="rounded mx-auto mb-3 d-blok" alt="...">
                            </picture>

                        <?php } ?>
                        <div class="col-sm-2">Gambar</div>
                        <div class="col-sm-10">
                            <input type="file" class="custom-file-input" id="image" name="image">
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
                        </div>
                    </div>

                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>