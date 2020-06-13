<?php 
$code = $permintaan[0]->status_per;
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
          <h1 class="card-title">Detail Permintaan </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form method="POST" action="<?php echo base_url().'permintaan/validate/'.$permintaan[0]->id_permintaan?>">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Pasar</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $permintaan[0]->nama?>">
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
                <input type="text" readonly class="form-control-plaintext" placeholder="Harga" value="Rp. <?php echo number_format($permintaan[0]->total_harga)?>">
                </div>
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
                foreach($permintaan as $data){
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
            <?php if ($this->session->userdata('level') == "Manager") {?>
            <button type="submit" name="validasi" class="btn btn-success btn-block"><i class="fas fa-check"></i> &nbsp Validasi</button><hr>
            <button type="submit" name="tolak" class="btn btn-danger btn-block"><i class="fas fa-times"></i> &nbsp Tolak</button>
            <?php };?>
            </form>
            <?php 
            //iki tombol ndek detail admin produksi lek di klik update status permintaan dari 2 ng 3, yopo berarti
            if(($code == "2")&&($this->session->userdata('level') == "Admin Produksi")){?>
            <form method="POST" action="<?php echo base_url().'permintaan/nextValidate/'.$permintaan[0]->id_permintaan?>">
            <button type="submit" name="validasi" class="btn btn-success btn-block"><i class="fas fa-check"></i> &nbsp Proses Pengiriman</button><hr>
           </form>
           <?php };?>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->