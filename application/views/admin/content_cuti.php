<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data <small>Buat Surat Cuti</small></h2>
					<div class="clearfix"></div>
					</br>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<div class="x_content">
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>
									<center>No</center>
								</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Kantor</th>
								<th>Hal</th>
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
										<center><?= $no++ ?></center>
									</td>
									<td><?= $srt->nama ?></td>
									<td><?= $srt->jabatan ?></td>
									<td><?= $srt->kantor ?></td>
									<td><?= $srt->hal ?></td>
									<td>
										<center>
											<a href="<?php echo base_url('admin/content_cuti/detailCuti/' . $srt->id_surat) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
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