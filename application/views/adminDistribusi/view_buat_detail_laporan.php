<?php 
$code = $laporan[0]->status_per;
$status = "";
if($code == "1"){
  $status = "Menunggu Validasi";
}
if($code == "2"){
  $status = "Sedang Diproses";
}
if($code == "3"){
  $status = "Proses Pengiriman";
}
if($code == "4"){
    $status = "Barang Dikirim";
}
if($code == "5"){
    $status = "Barang Diterima";
  }
if($code == "9"){
  $status = "Ditolak";
}
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-header">
            <div class="row">
          <div class="col-sm-6">
          <h1 class="card-title">Buat Laporan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Pasar</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $laporan[0]->nama?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <div class="input-group ">
                <input type="text" readonly class="form-control-plaintext" value="<?php echo $status?>" placeholder="Berat" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Total Harga Penawaran</label>
                <div class="col-sm-10">
                <div class="input-group mb-3">
                <input type="text" readonly class="form-control-plaintext" placeholder="Harga" value="Rp. <?php echo number_format($laporan[0]->total_harga)?>">
                </div>
                </div>
            </div>

            <form action="<?php echo base_url('laporan/insert');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $laporan[0]->id_permintaan?>" />
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Foto Nota</label>
                <div class="col-sm-10">
                <div class="input-group mb-3">
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" onchange="tampilkanPreview(this,'preview')"/>
                </div>
                <img id="preview" src="" alt="" width="350px"/>
                </div>
            </div>

            <hr>
            <table id="example1" class="table table-bordered table-striped m-t-10">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                </tr>
                 </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($laporan as $data){
                ?>
               <tr>
                    <td><?php echo $no++?> </td>
                    <td><?php echo $data->nama_produk?></td>
                    <td><?php echo  $data->berat;?> Kg</td>
                    <td>Rp. <?php echo number_format($data->harga);?></td>
                  </tr>
                  <?php }; ?>
                </tbody>
              
              </table>
<br>
            <button type="submit" name="submit" class="btn btn-success btn-block"><i class="fas fa-plus"></i> &nbsp Buat Laporan</button>

            </form>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script type="text/javascript">
function tampilkanPreview(foto,idpreview)
	{ //membuat objek gambar
		var gb = foto.files;
		//loop untuk merender gambar
		for (var i = 0; i < gb.length; i++)
		{ //bikin variabel
			var gbPreview = gb[i];
			var imageType = /image.*/;
			var preview=document.getElementById(idpreview);
			var reader = new FileReader();
			if (gbPreview.type.match(imageType))
			{ //jika tipe data sesuai
				preview.file = gbPreview;
				reader.onload = (function(element)
				{
					return function(e)
					{
						element.src = e.target.result;
					};
				})(preview);
				//membaca data URL gambar
				reader.readAsDataURL(gbPreview);
			}
			else
			{ //jika tipe data tidak sesuai
				alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
			}
		}
	}
</script>