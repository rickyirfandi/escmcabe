
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="id_tpk" class="control-label">ID TPK</label>
                        <input type="text" value="insert" hidden="hidden" name="set" id="set">
                        <input type="text" class="form-control" name="id_tpk" id="id_tpk" placeholder="ID TPK" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nip_tpk" class="control-label">NIP</label>
                        <input type="text" class="form-control" id="nip_tpk" name="nip_tpk" placeholder="Nomer Induk Pegawai">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama_tpk" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="nama_tpk" name="nama_tpk" placeholder="Nama">
                    </div>
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
  
