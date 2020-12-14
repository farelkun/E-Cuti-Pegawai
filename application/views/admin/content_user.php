<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<?php echo $this->session->flashdata('message'); ?>
					<a class="btn btn-success" href="<?php echo site_url('admin/content_user/tambah/') ?>"><i class="fa fa-plus"></i> Tambah User</a>
					<a href="<?php echo base_url('admin/content_user/print_data') ?>" class="btn btn-danger"><i class="fa fa-print"></i>Print</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data <small>Users</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Jabatan</th>
								<th>Unit Kerja</th>
								<th>Pangkat Golongan</th>
								<th>Level</th>
								<th>
									<center>Aksi</center>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($user as $usr) :
								?>
								<tr>
									<td>
										<center><?php echo $no++ ?></center>
									</td>
									<td>
										<?php echo $usr->nama ?></td>
									<td>
										<?php echo $usr->jabatan ?></td>
									<td>
										<?php echo $usr->namaunit ?></td>
									<td>
										<?php echo $usr->pangkat_golongan ?></td>
									<td>
										<?php echo $usr->level ?></td>
									<td>
										<center>
											<a href="<?php echo base_url('admin/content_user/detail/' . $usr->id_user) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
											<a onclick="javascript: return confirm('Anda yakin akan menghapus data ?')"><?php echo anchor('admin/content_user/delete_data/' . $usr->id_user, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?></a>
											<a href="<?php echo site_url('admin/content_user/edit/' . $usr->id_user) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
										</center>
									</td>
								</tr>
							<?php endforeach; ?></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>