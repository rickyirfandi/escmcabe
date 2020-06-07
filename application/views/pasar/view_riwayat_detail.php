    <?php 
        $code = $detail[0]->status;
        $status = ""; 
        if($code == "1"){
            $status = "Menunggu Validasi";
        }
        if($code == "2"){
          $status = "Sedang Diproses";
      }
      if($code == "9"){
        $status = "Permintaan Ditolak";
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
            <form>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <div class="input-group ">
                <input type="text" readonly class="form-control-plaintext" value="<?php echo $status; ?>"  aria-label="Username" aria-describedby="basic-addon1">
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
                  <th>Harga/Kg</th>
                  <th>Total</th>
                </tr>
                 </thead>
                <tbody>
                <?php 
                $no = 1;
                $total = 0;
                foreach($detail as $data){
                ?>
                  <tr>
                    <td><?php echo $no++; ?> </td>
                    <td><?php echo $data->nama_produk; ?></td>
                    <td><?php echo $data->berat; ?> Kg</td>
                    <td>Rp<?php echo number_format($data->harga);?></td>
                    <td>Rp<?php echo number_format($data->harga * $data->berat); $total += ($data->harga * $data->berat);?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                  <td colspan="4"><b>Grand Total :</b> </td>
                  <td><b>Rp. <?php echo number_format($total)?></b></td>
                  </tr>
                </tbody>
              
              </table>
<br>

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