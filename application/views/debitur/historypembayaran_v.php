  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <div class="isi content-isi">
    <section class="content-header">
      <h1 align="center">
        History Pembayaran
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid" style="padding: 150px 0px;>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <table id="datadebitur" class="table table-hover">
                <thead>
                <tr>
                  <th>Pembayaran</th>
                  <th>Bayar</th>
                  <th>Tanggal</th>
                  <th>Cetak Bukti</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($historypembayaran as $pembayaran): ?>
                    <tr>
                      <td><?=$no?></td>
                      <td>Rp<?=number_format($pembayaran['jumlah_bayar'])?></td>
                      <td><?=date('d-M-Y',strtotime($pembayaran['tgl_bayar']))?></td>
                      <td><a href="<?=site_url("report/reportdebitur/$pembayaran[id_pembayaran]/$pembayaran[id_barang]/$no")?>" class="btn btn-info"><b>CETAK</b></a></td>
                    </tr>
                    <?php $no++ ?>     
                  <?php endforeach ?>   
                </tbody>
              </table>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div> 
    </section>
    </div>
    <!-- /.content -->
<script>

</script>