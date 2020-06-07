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
            <form method="POST" action="<?php echo base_url().'penawaran/terimaBarang'?>">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Supplier</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $penawaran->nama?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Produk </label>
                <div class="col-sm-10">
                <select class="form-control" name="id_gudang" required>
                  <option value="">Pilih Gudang</option>
                  <?php 
                  foreach($gudang as $list){
                    echo '<option value="'.$list->id_gudang.'">'.$list->nama_gudang.'</option>';
                  }
                  ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                <div class="input-group ">
                <input type="date" class="form-control-plaintext" name="tanggal" placeholder="Tanggal" value="<?php echo Date('Y-m-d');?>" required>
                <input type="text" hidden class="form-control-plaintext" name="id_produksi" value="<?php echo $penawaran->id_produksi;?>">
                </div>
                </div>
            </div>
            <hr>
<br>        
            <button type="submit" name="konfirmasi" class="btn btn-success btn-block"><i class="fas fa-check"></i> &nbsp Terima Barang</button><hr>
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