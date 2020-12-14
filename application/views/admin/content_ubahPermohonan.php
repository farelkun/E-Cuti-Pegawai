<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php foreach ($surat as $srt) { ?>
                            <?php echo form_open_multipart('admin/content_permohonan/update_data'); ?>
                            <div class="form-group row">
                                <label for="id_user" class="col-sm-2 col-form-label">ID Surat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_surat" name="id_surat" value="<?= $srt->id_surat ?>" readonly>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_user" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $srt->deskripsi ?>">
                                    <small><span class="text-danger"><i><?php echo form_error('deskripsi'); ?></i></span></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_user" class="col-sm-2 col-form-label">Hal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hal" name="hal" value="<?= $srt->hal ?>">
                                    <small><span class="text-danger"><i><?php echo form_error('hal'); ?></i></span></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_user" class="col-sm-2 col-form-label">Kepada</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kepada" id="kepada" value="<?php echo $srt->kepada ?>">
                                        <option selected<?php echo $srt->kepada ?>><?php echo $srt->kepada ?></option>
                                        <?php foreach ($kepada as $kpd) : ?>
                                            <option value="<?= $kpd ?>"><?= $kpd ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small><span class="text-danger"><i><?php echo form_error('kepada'); ?></i></span></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_user" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $srt->tgl_cuti ?>">
                                    <small><span class="text-danger"><i><?php echo form_error('tanggal'); ?></i></span></small>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-20">
                                    <a href="<?php echo base_url('admin/content_permohonan'); ?>" class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>