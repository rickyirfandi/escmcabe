
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Masukkan Biaya Pengiriman Tiap KG</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Biaya Pengiriman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <form method="post" action="<?php echo base_url('pengiriman/optimasi'); ?>">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">


              <div class="container-fluid col-sm-12 text-right m-b-10">
              Jumlah Barang : 
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped m-t-10">
                <thead>
                  <tr>
                  <th></th>
                  <?php foreach ($pasar as $ps){
                      echo "<th>".$ps->nama."</th>";
                  }?>
                </tr>
                 </thead>
                <tbody>
                
                <?php
                $number = 0;
                foreach ($gudang as $gd){
                    echo "<tr><td><b>".$gd->nama_gudang."</b></td>";
                    foreach ($pasar as $ps){ 
                ?>

                    <td>
                    <div class="col-sm-12">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                    </div>

                    <input type="number" class="form-control" required name="cost<?php echo $number?>" id="cost<?php echo $number++?>"/>
  
                    </div>
                    </div>
                    </td>

                <?php
                    }
                    echo "</tr>";
                }
                ?>
                </tbody>
                <div>
                <input name="length" type="hidden" value="<?php echo $number; ?>" />
                </div>
              </table>

      </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      <div class="card">
            <div class="card-header">
            <button type="submit" class="btn btn-icon waves-effect waves-light btn-success btn-block"> <i class="fas fa-shopping-basket"></i> &nbsp Kirim Permintaan</button>
            </div></div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  