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
			<center><strong>Halaman Data Buku</strong></center>
		</h2><br>


		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<p><center><font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font></center></p>
				<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Buku</a><br><br>
				<table id="tablebuku" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Buku</th>
							<th>Jumlah</th>
							<th>Penerbit</th>
							<th>Tahun Terbit</th>
							<th>Kategori</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataBuku as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_buku ?>
							</td>
							<td>
								<?=$data->jumlah ?>
							</td>
							<td>
								<?=$data->penerbit ?>
							</td>
							<td>
								<?=$data->tahun_terbit ?>
							</td>
							<td>
								<?=$data->nama_kategori ?>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#" onclick="edit('<?=$data->id_buku?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="edit('<?=$data->id_buku?>')">Hapus</a>

						</tr>
						<?php } ?>
						</tfoot>
				  </table>
        </div>
      </div>

			<!-- Modal Tambah buku-->
			<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Tambah Data Buku</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('dashboard/tambah_buku')?>" method="post" class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Buku :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="nama_buku" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="jumlah" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="penerbit" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Terbit : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="tahun_terbit" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Buku : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select name="id_kategori" class="form-control col-md-7 col-xs-12">
			                <option></option>
			                <?php foreach($getKategori as $kat): ?>
			                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
			                <?php endforeach ?>
              			</select>
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

			  <!-- Modal Edit Data buku-->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Edit Data buku</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('dashboard/edit_buku')?>" method="post" class="form-horizontal form-label-left">

							<input type="hidden" id="id_buku4" name="id_buku" required="required" class="form-control col-md-7 col-xs-12">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Buku :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="nama_buku" name="nama_buku" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="jumlah" name="jumlah" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="penerbit" name="penerbit" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Terbit : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="tahun_terbit" name="tahun_terbit" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select name="id_kategori" id="id_kategori" class="form-control col-md-7 col-xs-12">
												<option></option>
												<?php foreach($getKategori as $kat): ?>
												<option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
												<?php endforeach ?>
										</select>
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

				<!--  Konfirmasi Hapus buku -->
				<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h3><strong>Hapus Data buku</strong></h3>
                        </div>
                        <div class="modal-body">
                            <h4>Anda Yakin Ingin Menghapus buku ?</h4>
                        </div>
                        <form action="<?=base_url('dashboard/hapus_buku')?>" method="post" class="form-horizontal form-label-left">

                                    <input type="hidden" id="id_buku" name="id_buku" required="required" class="form-control col-md-7 col-xs-12">

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
						url: "<?=base_url()?>dashboard/data_buku/" + a,
						dataType: "json",
						success: function (data) {
							$("#id_buku").val(data.id_buku);
							$("#id_buku2").val(data.id_buku);
							$("#id_buku3").val(data.id_buku);
							$("#id_buku4").val(data.id_buku);
							$("#nama_buku").val(data.nama_buku);
							$("#jumlah").val(data.jumlah);
							$("#penerbit").val(data.penerbit);
							$("#tahun_terbit").val(data.tahun_terbit);
							$("#nama_kategori").val(data.nama_kategori);
					    $("#id_kategori").val(data.id_kategori);
						}
					});
				}
			</script>
</body>

</html>
