<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <?php echo $this->session->flashdata('messagePermohonan'); ?>
                    <a href="<?php echo base_url('admin/content_permohonan/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Buat</a>
                    <a href="" class="btn btn-danger"><i class="fa fa-print"></i> Print</a>
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-download"></i> Export<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-left:80px;">
                        <li>
                            <a href="">PDF</a>
                        </li>
                        <li>
                            <a href="">EXCEL</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Permohonan<small>Surat Cuti</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Kantor</th>
                                <th>Hal</th>
                                <th>
                                    <center>Detail surat</center>
                                </th>
                                <th>
                                    <center>Approvement</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($surat as $srt) :
                                ?>
                                <tr>
                                    <td>
                                        <center><?php echo $no++ ?></center>
                                    </td>
                                    <td><?= $srt->nama ?></td>
                                    <td><?= $srt->kantor ?></td>
                                    <td><?= $srt->hal ?></td>
                                    <td>
                                        <center><a href="<?php echo base_url('kepalaDinas/content_permohonan/detailPermohonan/' . $srt->id_surat) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a></center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                                if ($srt->approvement == 'Disetujui') {
                                                    echo 'Menunggu pembuatan surat cuti';
                                                } else {
                                                    ?>
                                                <a href="<?php echo base_url('admin/content_permohonan/setuju/' . $srt->id_surat) ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                <a href="<?php echo site_url('admin/content_permohonan/nsetuju/' . $srt->id_surat) ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                            <?php } ?>


                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>