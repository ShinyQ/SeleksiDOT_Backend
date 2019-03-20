<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		<?=$judul?>
	</title>
</head>

<body>
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Data Kategori</strong></center>
		</h2><br>

		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<p><center><font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font></center></p>
				<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Kategori</a><br>
				<table id="tablekategori" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataKategori as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_kategori ?>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#" onclick="edit('<?=$data->id_kategori?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="edit('<?=$data->id_kategori?>')">Hapus</a>
              </td>
						</tr>
						<?php } ?>
						</tfoot>
				  </table>
        </div>
      </div>

			<!-- Modal Tambah kategori-->
			<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Tambah Data Kategori</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('kategori/tambah_kategori')?>" method="post" class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="nama_kategori" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
						</div>
					</div>
					</form>
				</div>
			  </div>

			  <!-- Modal Edit Data kategori-->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Edit Data kategori</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('kategori/edit_kategori')?>" method="post" class="form-horizontal form-label-left">

							<input type="hidden" id="id_kategori4" name="id_kategori" required="required" class="form-control col-md-7 col-xs-12">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="nama_kategori" name="nama_kategori" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
						</div>
					</div>
					</form>
				</div>
	 		 </div>

				<!--  Konfirmasi Hapus kategori -->
				<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h3><strong>Hapus Data kategori</strong></h3>
                        </div>
                        <div class="modal-body">
                            <h4>Anda Yakin Ingin Menghapus kategori ?</h4>
                        </div>
                        <form action="<?=base_url('kategori/hapus_kategori')?>" method="post" class="form-horizontal form-label-left">

                                    <input type="hidden" id="id_kategori" name="id_kategori" required="required" class="form-control col-md-7 col-xs-12">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <input type="submit" value="Konfirmasi" class="btn btn-primary">
                                    </div>
                                    </div>
                                    </form>
                    </div>
					</div>



    </div>
			<script type="text/javascript">
				function edit(a) {
					$.ajax({
						type: "post",
						url: "<?=base_url()?>kategori/data_kategori/" + a,
						dataType: "json",
						success: function (data) {
							$("#id_kategori").val(data.id_kategori);
							$("#id_kategori2").val(data.id_kategori);
							$("#id_kategori3").val(data.id_kategori);
							$("#id_kategori4").val(data.id_kategori);
							$("#nama_kategori").val(data.nama_kategori);
						}
					});
				}
			</script>
</body>

</html>
