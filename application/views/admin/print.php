<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <h4><strong>DETAIL DATA SURAT CUTI</strong></h4><br>
                    <h4 style="text-align: center">SURAT CUTI PEGAWAI</h4>
                    <h4 style="text-align: center">DINAS PERTANIAN PERKEBUNAN DAN HORTIKULTURA</h4>
                    <br>
                    <h4>Hal : <?php echo $detail->hal ?></h4>
                    <h4>Tanggal : <?php echo $detail->tgl_cuti ?></h4>
                    <br>
                    <br>
                    <h4>Diberikan surat cuti kepada :</h4>
                    <h4>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail->nama ?></h4>
                    <h4>NIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail->nip ?></h4>
                    <h4>Pangkat / golongan &nbsp;&nbsp;: <?php echo $detail->pangkat_golongan ?></h4>
                    <h4>Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail->jabatan ?></h4>

                    <br><br>
                    <h4><?php echo $detail->deskripsi ?></h4>
                    <br>
                    <br>
                    <h4>Hormat Saya,</h4>
                    <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $detail->ttd_basah; ?>" width="70" height="70">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $detail->nama ?></h4>
                    <h4>Ttd Kepala dinas,</h4>
                    <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $dkepala['ttd_basah']; ?>" width="70" height="70">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dkepala['nama'] ?></h4>

                    <h4>Ttd Sekda,</h4>
                    <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $sekda['ttd_basah']; ?>" width="70" height="70">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sekda['nama'] ?></h4>

                    <h4>Ttd Bupati,</h4>
                    <img src="<?php echo base_url(); ?>assets/production/images/<?php echo $bupati['ttd_basah']; ?>" width="70" height="70">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $bupati['nama'] ?></h4>
                    <script>
                        window.print();
                    </script>

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>