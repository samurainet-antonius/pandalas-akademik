<div class="clearfix">
	<h1 class="pull-left">Kelas</h1>
	<button type="button" data-toggle="modal" data-target="#add_kelas" class="btn btn-sm pd-x-15 btn-default btn-uppercase pull-right"><i class="fa fa-plus"></i> Tambah</button>
</div>
<hr/>
<table class="table" id="DataTable">
	<thead>
		<tr>
			<th>#</th>
			<th>No</th>
			<th>Kelas</th>
			<th>Status</th>
			<th>Parent</th>
			<th></th>
		</tr>
	</thead>
	<tbody></tbody>
</table>


<!-- modal add kelas -->
<div id="add_kelas" class="modal fade " role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content modal-dialog-centered">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Kelas Induk</h4>
			</div>
			<div class="modal-body">
				<form id="form_add" method="POST" autocomplete="off" action="<?php echo base_url("index.php/sekolah/kelas/add") ?>">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Kelas</span>
							<input type="text" class="form-control" name="nama_kelas">
						</div>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="deskripsi_kelas" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label>Status</label>
						<div>
							<label class="radio-inline"><input type="radio" name="status_kelas" value="Y">Aktif</label>
							<label class="radio-inline"><input type="radio" name="status_kelas" value="N">Tidak Aktif</label>
						</div>
					</div>
					<hr/>
					<button class="btn btn-default submit_add"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>

	</div>
</div>