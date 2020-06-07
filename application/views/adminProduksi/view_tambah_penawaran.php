
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
          <h1 class="card-title">Buat Penawaran</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form method="post" action="<?php echo site_url('penawaran/tambahPenawaran') ?>">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Produk </label>
                <div class="col-sm-10">
                <select class="form-control" name="id_produk" required>
                  <option value="">Pilih Produk</option>
                  <?php 
                  foreach($produk as $list){
                    echo '<option value="'.$list->id_produk.'">'.$list->nama_produk.'</option>';
                  }
                  ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Harga Penawaran</label>
                <div class="col-sm-10">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                </div>
                <input type="text" class="form-control" placeholder="Harga" name="harga" aria-describedby="basic-addon1">
                </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah Permintaan</label>
                <div class="col-sm-10">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Berat" name="berat" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <span class="input-group-text">Kg</span>
                </div>
                </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>

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