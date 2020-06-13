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
              <li class="breadcrumb-item active">Permintaan</li>
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
            Permintaan
            <div class="row">
          <div class="col-sm-6">
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
                //print_r($permintaan);
                foreach($permintaan as $data){
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->nama; ?> </td>
                    <td><?php echo 'Rp.'.number_format($data->total_harga); ?> </td>
                    <td><?php
                    $code = $data->status_per;
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
                    echo $status;
                    ?> </td>
                    <td>
                     <a href="<?php echo base_url('permintaan/detail/').$data->id_per?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary btn-block"> <i class="fas fa-search"></i> &nbsp Detail</button></a>
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
  
  