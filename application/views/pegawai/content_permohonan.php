<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<?php echo $this->session->flashdata('message'); ?>
					<a href="<?php echo base_url('pegawai/content_permohonan/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Buat</a>
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
								<th>Aprovement</th>
								<th>
									<center>Aksi</center>
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
									<td><?= $srt->approvement ?></td>
									<td>
										<center>
											<a href="<?php echo base_url('pegawai/content_permohonan/detailPermohonan/' . $srt->id_surat) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
											<a onclick="javascript: return confirm('Anda yakin akan menghapus data ?')"><?php echo anchor('pegawai/content_permohonan/delete_data/' . $srt->id_surat, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?></a>
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

</div>