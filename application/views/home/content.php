<div class="tab-content">
	 <div id="home" class="tab-pane fade in active">
 <div class="container-fluid header-image">		
	  <div class="container">
	  	<center>
	    <h2>Debting</h2>
	    <h3>The Mage Of Debt</h3>
	    <?php if ($this->session->has_userdata('role')): ?>
              <?php if ($this->session->userdata('role') =='admin'): ?>
                <a href="<?=site_url('admin')?>" class="btn btn-primary login-btn"><?=$this->session->userdata('nama')?></a>
              <?php else: ?>  
                <a href="<?=site_url('debitur')?>" class="btn btn-primary login-btn"><?=$this->session->userdata('nama')?></a>
              <?php endif; ?>
            <?php else: ?>
             <a href="<?=site_url('login')?>" class="btn btn-primary login-btn">Login</a>
            <?php endif ?>
	   </center> 
	  </div>
</div>

<div class="container-fluid about-us">
	<div class="row featurette">
	   <div class="col-md-5">
	      <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="https://i.pinimg.com/736x/dd/64/da/dd64da585bc57cb05e5fd4d8ce873f57--library-logo-kids-logo.jpg" data-holder-rendered="true">
	    </div>
	     <div class="col-md-7 ">
	      <h2 class="featurette-heading">About Debting</h2>
	      <p class="lead">DEBTING adalah merupakan aplikasi penyedia layanan pembukuan catatan utang piutang berbasis cloud atau website. Dengan adanya aplikasi DEBTING ini Debitur dapat mengetahui jumlah hutang yang harus dibayar kepada kreditur begitu juga kreditur juga dapat mengetahui hutang Debitur (piutang) dengan menggunakan website sehingga tidak perlu lagi pencatatan hutang piutang dengan menggunakan buku

</p>
	    </div>
	 </div>
</div>
</div>
<div id="unggah"  style="padding: 150px 0;" class="tab-pane fade in active">
		<div class="box-body">
			<div class="row">
				<h1 class="text-center">Unggah Pembayaran</h1>
			</div>
			<div class="row">
				 <form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-4" for="id_debitur">ID Debitur</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4">Nama</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4">Bukti Transfer</label>
    <div class="col-sm-5">
      <input type="file" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <input type="hidden" value="non-verified" placeholder="">
    </div>
  </div>
  <div class="row">
    	<div class="col-xs-4 col-xs-offset-8">
    		<input class="btn btn-lg btn-primary" type="submit" value="Kirim">
    	</div>
    </div>
</form> 
			</div>
		</div>
	</div>

	<div id="riwayat" style="padding: 150px 0;" class="tab-pane fade in active">
		<h1 class="text-center">Riwayat Transaksi</h1>
 <div class="box-body" style="">
          <div class="row">
            <div class="col-md-12">
              <div class="">
                <table class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jumlah Pembayaran</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                     
                      <td>1</td>
                      <td>500.000</td>
                      <td>14-04-1996</td>
                    </tr>    
                   <tr>
                      <td>1</td>
                      <td>500.000</td>
                      <td>14-04-1996</td>
                    </tr>    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
	</div>
	<div class="footer">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
	      <h3 align="center">Alamat Kami</h3>
	      <table class="table">
	      	<tr>
	      		<td><h4>Lokasi: Jalan Mawar No.47</h4></td>
	      		<td></td>
	      	</tr>
	      	<tr>
	      		<td><h4>No Telepon: 082233332222</h4></td>
	      		<td></td>
	      	</tr>
	      </table>
  		</div>
  		<div class="col-md-4">
	      <h3 align="center">Social Media</h3>
	      <div align="center">
	      	<i class="fa fa-facebook fa-5x" aria-hidden="true"></i> &nbsp;&nbsp;
		    <i class="fa fa-twitter fa-5x" aria-hidden="true"></i> &nbsp;&nbsp;
		    <i class="fa fa-google-plus fa-5x" aria-hidden="true"></i>
	      </div>
	      
  		</div> 
  		<div class="col-md-4">
	   	  <h3 align="center">Lorem Ipsum</h3>
	   	  <p align="justifiy">
	   	  	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam animi saepe iste quas accusamus magnam, molestias voluptas suscipit! Id consequatur iste placeat aspernatur pariatur nisi doloremque quo tempore ipsa distinctio.
	   	  </p>
  		</div>
	</div>
	</div>
</div>

	
</div>
</div>