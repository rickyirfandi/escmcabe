
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
          <h1 class="card-title">Edit produk</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form method="post" action="<?php echo site_url('produk/update') ?>">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Produk </label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="nama_produk" value="<?php echo $produk->nama_produk; ?>">
                <input required type="text" hidden class="form-control" name="id_produk" value="<?php echo $produk->id_produk; ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Simpan</button>

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