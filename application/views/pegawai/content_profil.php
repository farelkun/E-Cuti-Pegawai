<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <?php echo $this->session->flashdata('message'); ?>
                    <h4><strong>Profil</strong></h4>
                    <br>
                    <table class="table">
                        <tr>
                            <th>FOTO</th>
                            <td><img src="<?php echo base_url(); ?>assets/production/images/<?php echo $tampil['foto_profil'] ?>" width="90" height="110"></td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td><?php echo $tampil['nip'] ?></td>
                        </tr>
                        <tr>
                            <th>NAMA</th>
                            <td><?php echo $tampil['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>PANGKAT / GOLONGAN</th>
                            <td><?php echo $tampil['pangkat_golongan'] ?></td>
                        </tr>
                        <tr>
                            <th>JABATAN</th>
                            <td><?php echo $tampil['jabatan'] ?></td>
                        </tr>
                        <tr>
                            <th>TANGGAL Lahir</th>
                            <td><?php echo $tampil['tgl_lahir'] ?></td>
                        </tr>
                        <tr>
                            <th>TTD BASAH</th>
                            <td>
                                <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $tampil['ttd_basah'] ?>" width="90" height="110">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url('pegawai/content_permohonan'); ?>" class="btn btn-warning">Kembali</a>
                    <a href="<?php echo site_url('pegawai/content_profil/edit/' . $tampil['id_user']) ?>" class="btn btn-primary btn-sm">Ubah</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>