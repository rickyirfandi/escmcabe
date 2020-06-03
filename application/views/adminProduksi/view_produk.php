  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">

            <div class="container-fluid col-sm-12 text-right m-b-10">
            <a href="<?php echo site_url().'produk/tambah' ?>"><button type="button" class="btn btn-primary text-right m-b-10">
                + Tambahkan Produk
            </button></a>
            </div>

              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped m-t-10">
                <thead>
                  <tr>
                  <th>No </th>
                  <th>Produk</th>
                  <th>Aksi</th>
                </tr>
                 </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Cabe Polkadot</td>
                    <td><a href="<?php echo site_url().'produk/edit' ?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fas fa-edit"></i> Edit</button></a>
                    <a href="#"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fas fa-times"></i> Hapus</button></a>
                    </td>
                  </tr>
                </tbody>
              
              </table>

      </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  