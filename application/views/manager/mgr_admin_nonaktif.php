
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
              <li class="breadcrumb-item"><a href="#">Akun Admin</a></li>
              <li class="breadcrumb-item active">Daftar Admin</li>
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
              <h2 class="card-title">Admin Non-Aktif</h2>

              <div class="container-fluid col-sm-12 text-right m-b-10">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped m-t-10">
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
                    <a href="<?php echo base_url('Akun/edit_akun/').$data->id_akun?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="fas fa-edit"></i> </button></a>
                    <a href="<?php echo base_url('Akun/hapus_akun/').$data->id_akun?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fas fa-trash"></i> </button></a>
                                                                  
                </td>
            <?php } ?>
            </tr>
                </tbody>
              
              </table>

        <!-- /.MODAL A -->
        <div class="modal fade" id="modaladd">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambahkan Akun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form method="post" action="<?php echo site_url('Akun/inupdelAdmin') ?>">
            <div class="modal-body">
            <input type="hidden" id="set" name="set" value="insert" />
               <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="username" class="control-label">ID Akun</label>
                        <input type="text" class="form-control" id="id_akun" name="id_akun" placeholder="ID Akun" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
              </div>
                
              <div class="row">
                <div class="col-md-6">
                    <label for="status" class="control-label">Level</label>
                    <select class="form-control" id="level" name="level">
                        <option>Manager</option>
                        <option>Admin Produksi</option>
                        <option>Admin Distrbusi</option>
                        <option>Pasar</option>
                        <option>Supplier</option>
                    </select>
                </div>
              
                <div class="col-md-6">
                    <label for="status" class="control-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option>Aktif</option>
                        <option>Non-Aktif</option>
                    </select>
                </div>
              </div>
            
            </div>
            <div class="modal-footer text-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

                  <!-- /.card-header -->
                  <div class="card-body">

<!-- /.MODAL edit -->
<div class="modal fade" id="modaledit">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Akun</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
     <form method="post" action="<?php echo site_url('Akun/inupdelAdmin') ?>">
    <div class="modal-body">
      <input type="hidden" id="set" name="set" value="update" />
       <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="username" class="control-label">ID Akun</label>
                <input type="text" class="form-control" id="id_akun" name="id_akun" placeholder="ID Akun" readonly="readonly" value="<?php echo $admin_data["id_akun"]; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="username" class="control-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value ="<?php echo $admin_data["username"]; ?>">
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-6">
            <label for="status" class="control-label">Level</label>
            <select class="form-control" id="level" name="level">
                <option <?php if($admin_data["level"] == "Manager"){echo "selected";};?> >Manager</option>
                <option <?php if($admin_data["level"] == "Admin Produksi"){echo "selected";};?>>Admin Produksi</option>
                <option <?php if($admin_data["level"] == "Admin Distribusi"){echo "selected";};?>>Admin Distribusi</option>
                <option <?php if($admin_data["level"] == "Pasar"){echo "selected";};?>>Pasar</option>
                <option <?php if($admin_data["level"] == "Supplier"){echo "selected";};?>>Supplier</option>
            </select>
        </div>
      
        <div class="col-md-6">
            <label for="status" class="control-label">Status</label>
            <select class="form-control" id="status" name="status">
            <option <?php if($admin_data["status"] == "Aktif"){echo "selected";};?>>Aktif</option>
            <option <?php if($admin_data["status"] == "Non-Aktif"){echo "selected";};?>>Non-Aktif</option>
            </select>
        </div>
      </div>
    
    </div>
    <div class="modal-footer text-right">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-primary">Update</button>
    
      </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

                        <!-- /.card-header -->
                        <div class="card-body">

<!-- /.MODAL edit -->
<div class="modal fade" id="modaldelete">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Hapus Akun Berikut ?</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
     <form method="post" action="<?php echo site_url('Akun/inupdelAdmin') ?>">
    <div class="modal-body">
      <input type="hidden" id="set" name="set" value="delete" />
       <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="username" class="control-label">ID Akun</label>
                <input type="text" class="form-control" id="id_akun" name="id_akun" placeholder="ID Akun" readonly="readonly" value="<?php echo $admin_data["id_akun"]; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="username" class="control-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value ="<?php echo $admin_data["username"]; ?>">
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-6">
            <label for="status" class="control-label">Level</label>
            <select class="form-control" id="level" name="level">
                <option <?php if($admin_data["level"] == "Manager"){echo "selected";};?> >Manager</option>
                <option <?php if($admin_data["level"] == "Admin Produksi"){echo "selected";};?>>Admin Produksi</option>
                <option <?php if($admin_data["level"] == "Admin Distribusi"){echo "selected";};?>>Admin Distribusi</option>
                <option <?php if($admin_data["level"] == "Pasar"){echo "selected";};?>>Pasar</option>
                <option <?php if($admin_data["level"] == "Supplier"){echo "selected";};?>>Supplier</option>
            </select>
        </div>
      
        <div class="col-md-6">
            <label for="status" class="control-label">Status</label>
            <select class="form-control" id="status" name="status">
            <option <?php if($admin_data["status"] == "Aktif"){echo "selected";};?>>Aktif</option>
                <option <?php if($admin_data["status"] == "Non-Aktif"){echo "selected";};?>>Non-Aktif</option>
            </select>
        </div>
      </div>
    
    </div>
    <div class="modal-footer text-right">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-danger">Hapus Akun</button>
    
      </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

</div>
      <!-- /.modal -->

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
  
<?php if ((!empty($action) && $action=='edit')){?>
<script>
$(document).ready(function(){

    $("#modaledit").modal('show');

});
</script>
<?php };?>

<?php if ((!empty($action) && $action=='delete')){?>
<script>
$(document).ready(function(){

    $("#modaldelete").modal('show');

});
</script>
<?php };?>