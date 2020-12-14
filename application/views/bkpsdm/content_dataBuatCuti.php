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
								<th>
									<center>Nama</center>
								</th>
								<th>
									<center>Jabatan</center>
								</th>
								<th>
									<center>Kantor</center>
								</th>
								<th>
									<center>Hal</center>
								</th>
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
									<td>
										<center><?= $srt->nama ?></center>
									</td>
									<td>
										<center><?= $srt->jabatan ?></center>
									</td>
									<td>
										<center><?= $srt->kantor ?></center>
									</td>
									<td>
										<center><?= $srt->hal ?></center>
									</td>
									<td>
										<center>
											<a href="<?php echo base_url('bkpsdm/content_cuti/detailCuti/' . $srt->id_surat) ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
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