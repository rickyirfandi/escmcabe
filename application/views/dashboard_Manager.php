
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                  <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Akun</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container-fluid col-sm-2">
                <button type="button" class="btn btn-block btn-primary pull-right">+ Tambah</button>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Akun</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                 </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($list as $data) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data->id_akun; ?></td>
                    <td><?php echo $data->username; ?></td>
                    <td><?php echo $data->status ?></td>
                    <td><?php echo $data->level ?></td>
                    <td class="actions">
                    <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="fa fa-pencil"></i> </button>
                   <button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fa fa-trash"></i> </button>
                                                                  
                </td>
            <?php } ?>
            </tr>
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>
     
          <!-- /.card -->

            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
