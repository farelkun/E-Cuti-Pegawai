<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-lg-8">
                        <h4><strong>BUAT SURAT PERMOHONAN CUTI</strong></h4>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="ln_solid"></div>
                        <?php echo form_open_multipart('pegawai/content_permohonan/tambah'); ?>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">ID Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_surat" name="id_surat" value="<?= $kodeunik; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $surat['id_user'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $surat['nip'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $surat['nama'] ?>" readonly>
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
                                <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= $surat['pangkat_golongan'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $surat['jabatan'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Unit Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?= $surat['unit_kerja'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                <small><span class="text-danger"><i><?php echo form_error('deskripsi'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Hal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hal" name="hal">
                                <small><span class="text-danger"><i><?php echo form_error('hal'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Kepada</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kepada" id="kepada">
                                    <option value="">- Pilih -</option>
                                    <option>Pegawai</option>
                                    <option>Kepegawaian Dispertahortbun</option>
                                    <option>Kepala Dinas</option>
                                    <option>BKPSDM</option>
                                    <option>Sekretaris Daerah</option>
                                    <option>Bupati</option>
                                </select>
                                <small><span class="text-danger"><i><?php echo form_error('kepada'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                                <small><span class="text-danger"><i><?php echo form_error('tanggal'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Ttd basah</label>
                            <div class="col-sm-10">
                                <img src="<?php echo base_url(); ?>assets/production/images/<?= $surat['ttd_basah'] ?>" width="90" height="110">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-20">
                                <a href="<?php echo base_url('pegawai/content_permohonan'); ?>" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>