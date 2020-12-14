<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-lg-8">
                        <h4><strong>UBAH PASSWORD</strong></h4>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="ln_solid"></div>
                        <?php echo form_open_multipart('pegawai/content_ubahPassword/update'); ?>
                        <div class="form-group row">
                            <label for="pwlama" class="col-sm-2 col-form-label">Password lama</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwlama" name="pwlama" placeholder="masukkan password lama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pwbaru" class="col-sm-2 col-form-label">Password baru</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwbaru" name="pwbaru" placeholder="masukkan password baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pwbaru2" class="col-sm-2 col-form-label">Password baru</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwbaru2" name="pwbaru2" placeholder="masukkan ulang password baru">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-20">
                                <a href="<?php echo base_url(''); ?>" class="btn btn-warning">Batal</a>
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