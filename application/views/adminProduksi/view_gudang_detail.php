  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Stok <?php 
            echo $nama->nama_gudang; ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gudang</li>
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
                Stock
              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped m-t-10">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                </tr>
                 </thead>
                <tbody>
                <?php
                $no=1;
                foreach($gudang as $data){
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->nama_produk; ?> </td>
                    <td><?php echo $data->tot_ber; ?> Kg</td>
                  </tr>
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
  
  