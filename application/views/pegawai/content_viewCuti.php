<style>
    .bg::before {
        content: '';
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: scroll;
        position: fixed;
        z-index: -1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0.10;
        filter: alpha(opacity=10);
    }

    #header-instansi {
        margin-top: 1%;
    }

    .ams {
        font-size: 1.8rem;
    }

    .grs {
        position: absolute;
        margin: 10px 0;
        background-color: #fff;
        height: 42px;
        width: 1px;
    }

    #menu {
        margin-left: 20px;
    }

    .title {
        background: #333;
        border-radius: 3px 3px 0 0;
        margin: -20px -20px 25px;
        padding: 20px;
    }

    .logo1 {
        border-radius: 50%;
        margin: 0 15px 15px 0;
        width: 90px;
        height: 90px;
    }

    .logoside {
        border-radius: 50%;
        margin: 0 auto;
        width: 125px;
        height: 125px;
    }

    .ins {
        font-size: 1.8rem;
    }

    .almt {
        font-size: 1.15rem;
    }

    .description {
        font-size: 1.4rem;
    }

    .jarak {
        height: 13.4rem;
    }

    .hidden {
        display: none;
    }

    .add {
        font-size: 1.45rem;
        padding: 0.1rem 0;
    }

    .jarak-card {
        margin-top: 1rem;
    }

    .jarak-filter {
        margin: -12px 0 5px;
    }

    #footer {
        background: #546e7a;
    }

    .warna {
        color: #444;
    }

    .agenda {
        font-size: 1.39rem;
        padding-left: 8px;
    }

    .hid {
        display: none;
    }

    .galeri {
        width: 100%;
        height: 26rem;
    }

    .gbr {
        float: right;
        width: 80%;
        height: auto;
    }

    .file {
        width: 70%;
        height: auto;
    }

    .kata {
        font-size: 1.04rem;
    }

    #alert-message {
        font-size: 0.9rem;
    }

    .notif {
        margin: -1rem 0 !important;
    }

    .green-text,
    .red-text {
        font-weight: normal !important;
    }

    .lampiran {
        color: #444 !important;
        font-weight: normal !important;
    }

    .waves-green {
        margin-bottom: -20px !important;
    }

    div.callout {
        height: auto;
        width: auto;
        float: left;
    }

    div.callout {
        position: relative;
        padding: 13px;
        border-radius: 3px;
        margin: 25px;
        min-height: 46px;
        top: -25px;
    }

    .callout::before {
        content: "";
        width: 0px;
        height: 0px;
        border: 0.8em solid transparent;
        position: absolute;
    }

    .callout.bottom::before {
        left: 25px;
        top: -20px;
        border-bottom: 10px solid #ffcdd2;
    }

    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        -webkit-transform: translate3d(0, -50px, 0);
        -ms-transform: translate3d(0, -50px, 0);
        transform: translate3d(0, -50px, 0);
        -webkit-transition: -webkit-transform .5s ease-out;
        -ms-transition: -webkit-transform .5s ease-out;
        transition: transform .5s ease-out;
    }

    .pace.pace-active {
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .pace .pace-progress {
        display: block;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 3px;
        background: #2196f3;
        pointer-events: none;
    }

    @media print {

        .side-nav,
        .secondary-nav,
        .jarak-form,
        .center,
        .hide-on-med-and-down,
        .dropdown-content,
        .button-collapse,
        .btn-large,
        .footer-copyright {
            display: none;
        }

        body {
            font-size: 12px;
            color: #212121;
        }

        .noPrint {
            display: none;
        }

        .hid {
            display: block;
            font-size: 16px;
            text-transform: uppercase;
            margin-bottom: 0;
        }

        .add {
            font-size: 15px !important;
        }

        .agenda {
            font-size: 13px;
            text-align: center;
            color: #212121;
        }

        th,
        td {
            border: 1px solid #444 !important;
        }

        th {
            padding: 5px;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        td {
            padding: 5px;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            font-size: 12px;
            color: #212121;
        }

        .container {
            margin-top: -20px !important;
        }
    }

    noscript {
        color: #fff;
    }

    @media only screen and (max-width: 701px) {
        #colres {
            width: 100%;
            overflow-x: scroll !important;
        }

        #tbl {
            width: 600px !important;
        }
    }

    table {
        background: #fff;
        padding: 5px;
    }

    tr,
    td {
        border: table-cell;
        border: 1px solid #444;
    }

    tr,
    td {
        vertical-align: top !important;
    }

    #right {
        border-right: none !important;
    }

    #left {
        border-left: none !important;
    }

    .isi {
        height: 300px !important;
    }

    .disp {
        text-align: center;
        padding: 1.5rem 0;
        margin-bottom: .5rem;
    }

    .logodisp {
        float: left;
        position: relative;
        width: 110px;
        height: 110px;
        margin: 0 0 0 1rem;
    }

    #lead {
        width: auto;
        position: relative;
        margin: 25px 0 0 75%;
    }

    .lead {
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: -10px;
    }

    .tgh {
        text-align: center;
    }

    #nama {
        font-size: 2.1rem;
        margin-bottom: -1rem;
    }

    #alamat {
        font-size: 16px;
    }

    .up {
        margin: 0;
        line-height: 2.2rem;
        font-size: 1.5rem;
    }

    .status {
        margin: 0;
        font-size: 1.3rem;
        margin-bottom: .5rem;
    }

    #lbr {
        font-size: 20px;
        font-weight: bold;
    }

    .separator {
        border-bottom: 2px solid #616161;
        margin: -1.3rem 0 1.5rem;
    }

    @media print {
        body {
            font-size: 12px;
            color: #212121;
        }

        table {
            width: 100%;
            font-size: 12px;
            color: #212121;
        }

        tr,
        td {
            border: table-cell;
            border: 1px solid #444;
            padding: 8px !important;

        }

        tr,
        td {
            vertical-align: top !important;
        }

        #lbr {
            font-size: 20px;
        }

        .isi {
            height: 200px !important;
        }

        .tgh {
            text-align: center;
        }

        .disp {
            text-align: center;
            margin: -.5rem 0;
        }

        .logodisp {
            float: left;
            position: relative;
            width: 80px;
            height: 80px;
            margin: .5rem 0 0 .5rem;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 15px 0 0 75%;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }

        #nama {
            font-size: 20px !important;
            font-weight: bold;
            text-transform: uppercase;
            margin: -10px 0 -20px 0;
        }

        .up {
            font-size: 17px !important;
        }

        .status {
            font-size: 17px !important;
            font-weight: normal;
            margin-bottom: -.1rem;
        }

        #alamat {
            margin-top: -15px;
            font-size: 13px;
        }

        #lbr {
            font-size: 17px;
            font-weight: bold;
        }

        .separator {
            border-bottom: 2px solid #616161;
            margin: -1rem 0 1rem;
        }

    }
</style>



<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading noPrint">
                        <i class="fa fa-eye noPrint"></i> VIEW SURAT CUTI
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                        </span>
                    </header>

                    <div class="panel-body" style="display: block;">
                        <div id="colres">
                            <div class="disp"><img class="logodisp" src="images/sumekar.jpg"> <img style="float:right; margin-right:20px;" class="logodisp" src="<?php echo base_url() ?>assets/production/images/sumenep.png">
                                <h6 class="up">PEMERINTAH PROVINSI JAWA TIMUR</h6>
                                <h6 class="up" id="nama">DINAS PERTANIAN DAN PERKEBUNAN</h6><br>
                                <h5 class="status">KABUPATEN SUMENEP </h5><span id="alamat">Jl. Manikam No.29 A, Bangselok Telp. (0328) 668422</span><br>
                            </div>
                            <div class="separator"></div>
                            <table class="bordered" id="tbl">
                                <tbody>
                                    <tr>
                                        <td class="tgh" id="lbr" colspan="5">LEMBAR SURAT CUTI</td>
                                    </tr>
                                    <tr>
                                        <td id="right" width="18%"><strong>Surat Dari</strong></td>
                                        <td colspan="2" id="left" style="border-right: none;" width="72%">: <?php echo $surat->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td id="right" width="18%"><strong>Tanggal Surat</strong></td>
                                        <td id="left" style="border-right: none;" width="50%">: <?php echo $surat->tgl_cuti ?></td>
                                    </tr>
                                    <tr>
                                        <td id="right" width="18%"><strong>Nomor Surat</strong></td>
                                        <td colspan="2" id="left" style="border-right: none;" width="72%">: <?php echo $surat->id_surat ?></td>
                                    </tr>
                                    <tr>
                                        <td id="right"><strong>Perihal</strong></td>
                                        <td id="left" colspan="2">: <?php echo $surat->hal ?></td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr class="isi">
                                        <td colspan="2" width="100%	">
                                            <strong>Isi Disposisi :</strong><br><?php echo $surat->deskripsi ?>
                                            <div style="height: 50px;"></div>
                                            <strong>Kantor</strong> : <?php echo  $surat->kantor ?><br>
                                            <div style="height: 25px;"></div>
                                        </td>
                                        <td><strong>Kepada</strong> : <br><?php echo $surat->kepada ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="lead">
                                <p>Kepala Dinas Pertanian Tanaman Pangan</p>
                                <div style="height: 50px;"></div>
                                <p class="lead">Ir. Bambang Heriyanto, M.Si</p>
                                <p style="position:relative; top:10px;">NIP. 19601018 199103 1 003</p>
                            </div>
                        </div>
                        <button class="btn btn-success noPrint" onclick="printContent('div1')" style=" position:relative; left:50px; bottom:20px; margin-top:60px;"><i class="fa fa-print"></i> Print</button>
                        <a class="btn btn-danger noPrint" href="page-content-disposisiSurat.php" style="position:relative; left:850px; bottom:20px; margin-top:60px;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                </section>
            </div>
        </div>
    </div>
    </div>
</section>