<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <h4><strong>DETAIL DATA USER</strong></h4><br>
                    <table class="table">
                        <tr>
                            <th>NIP</th>
                            <td><?php echo $detail->nip ?></td>
                        </tr>
                        <tr>
                            <th>NAMA</th>
                            <td><?php echo $detail->nama ?></td>
                        </tr>
                        <tr>
                            <th>PANGKAT / GOLONGAN</th>
                            <td><?php echo $detail->pangkat_golongan ?></td>
                        </tr>
                        <tr>
                            <th>JABATAN</th>
                            <td><?php echo $detail->jabatan ?></td>
                        </tr>
                        <tr>
                            <th>JENIS KELAMIN</th>
                            <td><?php echo $detail->jenkel ?></td>
                        </tr>
                        <tr>
                            <th>ALAMAT</th>
                            <td><?php echo $detail->alamat ?></td>
                        </tr>
                        <tr>
                            <th>NO TELEPON</th>
                            <td><?php echo $detail->no_hp ?></td>
                        </tr>
                        <tr>
                            <th>LEVEL</th>
                            <td><?php echo $detail->level ?></td>
                        </tr>
                        <tr>
                            <th>TTD BASAH</th>
                            <td>
                                <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $detail->ttd_basah; ?>" width="90" height="110">
                            </td>
                        </tr>
                        <tr>
                            <th>USERNAME</th>
                            <td><?php echo $detail->username ?></td>
                        </tr>
                        <tr>
                            <th>PASSWORD</th>
                            <td><?php echo $detail->password ?></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url('content_user'); ?>" class="btn btn-primary">Kembali</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>