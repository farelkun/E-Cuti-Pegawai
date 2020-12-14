<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-lg-8">
                        <h4><strong>PAKAI JUMLAH CUTI</strong></h4>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="ln_solid"></div>
                        <?php echo form_open_multipart('admin/content_cuti/buat_pakaicuti'); ?>
                        <div class="form-group row">
                            <label for="id_banyak" class="col-sm-2 col-form-label">ID Master</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_banyak" name="id_banyak">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_user" name="id_user">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-20">
                                <button type="submit" class="btn btn-primary">Buat</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>