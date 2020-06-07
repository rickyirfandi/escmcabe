  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penawaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penawaran</li>
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
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped m-t-10">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                 </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($penawaran as $data){
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->nama_produk; ?></td>
                    <form method="post" action="<?php echo site_url('penawaran/updateRiwayat/'.$data->id_produksi) ?>">
                    <td><input type="number" class="form-control" name="berat" value="<?php echo $data->berat; ?>" required> Kg</td>
                    <td>Rp. <input type="number" class="form-control" name="harga" value="<?php echo $data->harga; ?>" required></td>
                    <td><button type="submit" name="update" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fas fa-save"></i> Save</button>
                    <button type="submit" name="delete" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fas fa-times"></i> Hapus</button>
                    </td>
                  </tr>
                  </form>
                <?php } ?>
                </tbody>
              
              </table>

      </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  