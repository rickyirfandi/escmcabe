
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
          <h1 class="card-title">Pengiriman</h1>
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
                  <th>Tanggal</th>
                  <th>Gudang</th>
                  <th>Barang</th>
                  <th>Berat</th>
                  <th>Terima</th>
                </tr>
                 </thead>
                <tbody>
                <?php foreach($pengiriman as $p){?>
                  <tr>
                    <td><?php echo $p->tanggal_pengiriman; ?></td>
                    <td><?php echo $p->nama_gudang; ?></td>
                    <td><?php echo $p->nama_produk; ?></td>
                    <td><?php echo $p->berat_pengiriman; ?>Kg</td>
                    <td class="actions">
                    <?php if($p->status_pengiriman == "1"){?>
                    <form method="POST" action="<?php echo site_url('pasar/terima_barang/'.$p->id_pengiriman) ?>">
                    <button type="submit" name="valid" class="btn btn-icon waves-effect waves-light btn-success"> <i class="fas fa-check-square"></i> &nbsp Terima Barang</button>                                    
                    </form>
                    <?php } else {echo "Barang Diterima";}?>
                </td>
            </tr>
                <?php };?>
                </tbody>
              
              </table>

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
  
