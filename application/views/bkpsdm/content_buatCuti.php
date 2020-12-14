<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-lg-8">
                        <h4><strong>BUAT SURAT CUTI</strong></h4>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="ln_solid"></div>
                        <?php echo form_open_multipart('bkpsdm/content_cuti/buatsurat'); ?>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">ID Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_surat" name="id_surat" value="<?= $surat->id_surat ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $surat->id_user ?>" readonly>
                            </div>
                            <div class="col-sm-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $surat->nip ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $surat->nama ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Kantor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kantor" name="kantor" value="Dispertahortbun" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Pangkat / Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= $surat->pangkat_golongan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $surat->jabatan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $surat->deskripsi ?>">
                                <small><span class="text-danger"><i><?php echo form_error('deskripsi'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Hal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hal" name="hal" value="<?= $surat->hal ?>">
                                <small><span class="text-danger"><i><?php echo form_error('hal'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Kepada</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kepada" name="kepada" value="<?= $surat->kepada ?>">
                                <small><span class="text-danger"><i><?php echo form_error('kepada'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Tanggal cuti</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $surat->tgl_cuti ?>">
                                <small><span class="text-danger"><i><?php echo form_error('tanggal'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Ttd basah </br>Pegawai</label>
                            <div class="col-sm-10">
                                <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $surat->ttd_basah ?>" width="90" height="110">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Ttd basah </br>Kepala dinas</label>
                            <div class="col-sm-10">
                                <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $dkepala['ttd_basah'] ?>" width="90" height="110">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-20">
                                <a href="<?php echo base_url('bkpsdm/content_cuti'); ?>" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-info">Buat</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>