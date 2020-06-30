  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Admin Distribusi</li>
            </ol>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  
        <!-- Main row -->
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
            <table id="example1" class="table table-bordered table-striped m-t-10">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Pasar</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                 </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($datalaporan as $data){
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->nama; ?> </td>
                    <td><?php echo 'Rp.'.number_format($data->total_harga); ?> </td>
                    <td><?php
                    if($data->status_per == "4"){
                        echo "Barang Dikirim";
                    }
                    ?> </td>
                    <td>
                     <a href="<?php echo base_url('laporan/buat_laporan/'.$data->id_permintaan)?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary btn-block"> <i class="fas fa-plus"></i> &nbsp Buat Laporan</button></a>
                    </td>
                  </tr>
                <?php };?>
                </tbody>
              
              </table>

      </div>
      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  