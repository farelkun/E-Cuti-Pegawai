<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-lg-8">
                        <h4><strong>TAMBAH DATA USER</strong></h4>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="ln_solid"></div>
                        <?php echo form_open_multipart('admin/content_user/tambah'); ?>
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $kodeunik; ?>" readonly>
                                <small><span class="text-danger"><i><?php echo form_error('id_user'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('nip'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nip'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('nama'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-sm-2 col-form-label">Pangkat / golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= set_value('pangkat'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('pangkat'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('jabatan'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_kerja" class="col-sm-2 col-form-label">Unit kerja</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="unit_kerja" id="unit_kerja">
                                    <option value="">- Pilih Level -</option>
                                    <option value="UNT-001">Sekretariat</option>
                                    <option value="UNT-002">Bidang bina usaha</option>
                                    <option value="UNT-003">Bidang sarana dan prasarana</option>
                                    <option value="UNT-004">Bidang tanaman pangan dan hortikultura</option>
                                    <option value="UNT-005">Bidang perkebunan</option>
                                </select>
                                <small><span class="text-danger"><i><?php echo form_error('unit_kerja'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('tgl_lahir'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <p>
                                    Pria:
                                    <input type="radio" class="flat" name="gender" id="gender" value="Pria" />
                                    Wanita:
                                    <input type="radio" class="flat" name="gender" id="gender" value="Wanita" />
                                </p>
                                <small><span class="text-danger"><i><?php echo form_error('gender'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('alamat'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-2 col-form-label">No. Telpon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('no_telp'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-2 col-form-label">Hak akses</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="level" id="level">
                                    <option value="">- Pilih Level -</option>
                                    <option>Pegawai</option>
                                    <option>Kepegawaian Dispertahortbun</option>
                                    <option>Kepegawaian</option>
                                    <option>Kepala Dinas</option>
                                    <option>BKPSDM</option>
                                    <option>Sekretaris Daerah</option>
                                    <option>Bupati</option>
                                </select>
                                <small><span class="text-danger"><i><?php echo form_error('level'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ttd" class="col-sm-2 col-form-label">Ttd basah</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="ttd" name="ttd" value="<?= set_value('ttd'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('ttd'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('username'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
                                <small><span class="text-danger"><i><?php echo form_error('password'); ?></i></span></small>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-20">
                                <a href="<?php echo base_url('content_user'); ?>" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>