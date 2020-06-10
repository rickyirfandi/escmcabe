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
                    <td>
                    <div class="col-sm-12">
                    <div class="input-group mb-3">
                    <input type="number" class="form-control" <?php  if($data->status_p > 0){ echo "readonly ";}?> name="berat" value="<?php echo $data->berat; ?>" required> 
                    <div class="input-group-append">
                        <span class="input-group-text">Kg</span>
                    </div>
                    </div>
                    </div>
                     </td>
                    <td>
                    <div class="col-sm-12">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                    </div>
                    <input type="number" class="form-control" <?php  if($data->status_p > 0){ echo "readonly ";}?> name="harga" value="<?php echo $data->harga; ?>" required>
                    </div>
                    </div>
                    <input hidden type="text" name="id_permintaan" value="<?php echo $data->id_produksi; ?>">
                    </td>
                    <td>
                    <div class="row">
                    <div class="col-sm-6">
                    <button type="submit" name="update" <?php  if($data->status_p > 0){ echo "disabled ";}?> class="btn btn-icon waves-effect waves-light btn-primary btn-block"> <i class="fas fa-save"></i> </button>
                    </div>
                    <div class="col-sm-6">
                    <button type="submit" name="delete" <?php  if($data->status_p > 0){ echo "disabled ";}?> class="btn btn-icon waves-effect waves-light btn-danger btn-block"> <i class="fas fa-window-close"></i> </button>
                    </div>
                    </div>
                    <?php };?>
                    </td>
                    </form>
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
  
  