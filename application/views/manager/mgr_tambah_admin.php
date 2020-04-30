
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  + Tambahkan
                </button>
              </div>
          <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="status" class="control-label">Level</label>
                    <select class="form-control" id="status" name="status">
                        <option>Aktif</option>
                        <option>Non-Aktif</option>
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="control-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option>Aktif</option>
                        <option>Non-Aktif</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
                foreach ($daftaradmin as $data) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data->id_akun; ?></td>
                    <td><?php echo $data->username; ?></td>
                    <td><?php echo $data->status ?></td>
                    <td><?php echo $data->level ?></td>
                    <td class="actions">
                    <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="fas fa-edit"></i> </button>
                   <button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fas fa-trash"></i> </button>
                                                                  
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
  
