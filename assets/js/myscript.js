$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Data mahasiswa berhasil diapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

$(function () {

	$('.tampilModalTambah').on('click', function () {
		$('#formModalLabel').html('TAMBAH DATA USER');
		$('.modal-footer button[type=submit]').html('Tambah Data');
	});

	$('.tampilModalUbah').on('click', function () {
		$('#formModalLabel').html('UBAH DATA USER');
		$('.modal-footer button[type=submit]').html('Ubah Data');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/a_cuti/admin/content_user/update_data',
			data: {
				id: id
			},
			method: 'get',
			dataType: 'json',
			success: function (data) {
				$('#nip').val(data.nip);
				$('#nama').val(data.nama);
				$('#pangkat').val(data.pangkat);
				$('#jabatan').val(data.jabatan);
				$('#unit_kerja').val(data.unit_kerja);
				$('#tgl_lahir').val(data.tgl_lahir);
				$('#gender').val(data.gender);
				$('#alamat').val(data.alamat);
				$('#no_telp').val(data.no_telp);
				$('#level').val(data.level);
				$('#nip').val(data.nip);
				$('#ttd').val(data.ttd);
				$('#username').val(data.username);
				$('#password').val(data.password);
			}
		});

	});

});
