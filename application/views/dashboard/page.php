<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Data Peserta KUKM
				
			</h1>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li class="active">Dashboard</li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<?php echo add_dashboard($sidebar); ?>
			</div><!-- /.row -->
			<!-- top row -->
			<h3>
                  <p></p>
                <small>TAHUN</small>
			</h3> 
			
			<div style="border-bottom: 1px solid #eee; margin-bottom:10px;"></div>
			
			<div class="row">
				<?php echo add_year_dash('kegiatan');?>				
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-6 connectedSortable"> 		
					<!-- DASHBOARD CONTENT --> 
				</section><!-- right col -->
			</div><!-- /.row (main row) -->
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
