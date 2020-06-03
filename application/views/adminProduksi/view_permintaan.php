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
                  <tr>
                    <td>1. </td>
                    <td>Pasar Senin sampe Jumat </td>
                    <td>Rp. 5 Milyar </td>
                    <td>Menunggu Validasi</td>
                    <td><a href="<?php echo base_url('#')?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-success"> <i class="fas fa-paper-plane"></i> &nbsp Proses Kirim</button></a>
                     <a href="<?php echo base_url('permintaan/detail')?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fas fa-search"></i> &nbsp Detail</button></a>
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
  
  