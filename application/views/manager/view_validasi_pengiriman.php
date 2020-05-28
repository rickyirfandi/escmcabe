
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-header">
            <div class="row">
          <div class="col-sm-6">
          <h1 class="card-title">Validasi Pengiriman</h1>
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
                  <th>Tanggal</th>
                  <th>Tujuan</th>
                  <th>Barang</th>
                  <th>Validasi</th>
                </tr>
                 </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($datapengiriman as $data) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data->tanggal; ?></td>
                    <td><?php echo $data->tujuan ?></td>
                    <td><?php echo $data->barang ?></td>
                    <td class="actions">
                    <a href="<?php echo base_url('Pengiriman/Validasi_pengiriman/').$data->id_pengiriman?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-success"> <i class="fas fa-check-square"></i> &nbsp Validasi</button></a>
                    <a href="<?php echo base_url('#')?>"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fas fa-window-close"></i> &nbsp Tolak</button></a>                                      
                </td>

            <?php } ?>
            </tr>
                </tbody>
              
              </table>

                  <!-- /.card-header -->
                  <div class="card-body">

<!-- /.MODAL edit -->
<div class="modal fade" id="modalvalidasi">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Validasi Pengiriman</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
     <form method="post" action="<?php echo site_url('Pengiriman/inupdelPengiriman') ?>">
    <div class="modal-body">
      <input type="hidden" id="set" name="set" value="validasi" />
       <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_pengiriman" class="control-label">ID Pengiriman</label>
                <input type="text" class="form-control" id="id_pengiriman" name="id_pengiriman" placeholder="ID Pengiriman" readonly="readonly" value="<?php echo $detailpengiriman["id_pengiriman"]; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tanggal" class="control-label">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value ="<?php echo $detailpengiriman["tanggal"]; ?>">
            </div>
        </div>
        

      <div class="col-md-6">
          <div class="form-group">
                <label for="tujuan" class="control-label">Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" value ="<?php echo $detailpengiriman["tujuan"]; ?>">
            </div>
        </div>
      
        <div class="col-md-6">
          <div class="form-group">
                <label for="barang" class="control-label">Barang</label>
                <input type="text" class="form-control" id="barang" name="barang" placeholder="Tujuan" value ="<?php echo $detailpengiriman["barang"]; ?>">
            </div>
        </div>
      </div>

    
    </div>
    <div class="modal-footer text-right">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-primary">Validasi Pengiriman</button>
    
      </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

              
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
  
<?php if ((!empty($action) && $action=='validasi')){?>
<script>
$(document).ready(function(){

    $("#modalvalidasi").modal('show');

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