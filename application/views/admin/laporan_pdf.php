<html>

<head>
    <title></title>
</head>

<body>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>PANGKAT / GOLONGAN</th>
            <th>JABATAN</th>
            <th>UNIT KERJA</th>
            <th>TGL. LAHIR</th>
            <th>JENIS KELAMIN</th>
            <th>ALAMAT</th>
            <th>NOMOR TELEPON</th>
            <th>TTD BASAH</th>
        </tr>

        <?php
        $no = 1;
        foreach ($user as $usr) :
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $usr->nip ?></td>
                <td><?php echo $usr->nama ?></td>
                <td><?php echo $usr->pangkat_golongan ?></td>
                <td><?php echo $usr->jabatan ?></td>
                <td><?php echo $usr->unit_kerja ?></td>
                <td><?php echo $usr->tgl_lahir ?></td>
                <td><?php echo $usr->jenkel ?></td>
                <td><?php echo $usr->alamat ?></td>
                <td><?php echo $usr->no_hp ?></td>
                <td><img src="<?php echo base_url(); ?>assets/production/images/<?php echo $usr->ttd_basah; ?>" width="50" height="50"></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>