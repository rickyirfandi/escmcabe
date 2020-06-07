  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Riwayat Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat</li>
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
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                 </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($riwayat as $data){
                  $code = $data->status;
                  if($code == "0"){
                    continue;
                }
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->tanggal; ?></td>
                    <td>Rp. <?php echo $data->total_harga; ?></td>
                    <td>  <?php 
                          if($code == "1"){
                              echo "Menunggu Validasi";
                          } else if($code == "2"){
                            echo "Sedang Diproses";
                        } else if($code == "9"){
                          echo "Permintaan Ditolak";
                      }
                          ?>
  </td>
                    <td><a href="<?php echo base_url().'pasar/detailriwayat/'.$data->id_permintaan?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary btn-block"> <i class="fas fa-search"></i> Detail</button></a></td>
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
  
  