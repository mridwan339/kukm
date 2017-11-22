<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Tahun <?php echo $year;?>
				<!--<small><?php //echo $year;?></small>-->
			</h1>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li class="active">Laporan Tahunan</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-6 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3>
								<?php echo ($dataSummary['results']!=0) ? jarvis_echo($dataSummary,'jumlah') : 0 ;?>
							</h3>
							<p>
								Peserta
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">
							Jumlah Peserta di tahun <?php echo $year;?>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-3">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>
								<?php echo ($dataSummaryGender['results']!=0) ? jarvis_echo($dataSummaryGender,'laki_laki') : 0 ;?>
							</h3>
							<p>
								Peserta
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">
							Laki-Laki
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-3">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3>
								<?php echo ($dataSummaryGender['results']!=0) ? jarvis_echo($dataSummaryGender,'perempuan') : 0 ;?>
							</h3>
							<p>
								Peserta
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">
							Perempuan
						</a>
					</div>
				</div>
			</div>
			
			<h3>
                  <p></p>
                <small>Silahkan pilih provinsi !</small>
			</h3> 
			
			<div style="border-bottom: 1px solid #eee; margin-bottom:10px;"></div>
			<div class="row">
				<?php 
				foreach($dataPropinsi['data'] as $item){
				$numRan=rand(0,13);
				?>
				<div class="col-lg-3 col-xs-4">
					<div class="small-box bg-<?php echo jarvis_color_bar($numRan);?>">
						<div class="inner"><h4><?php echo $item['parameter'];?></h4></div>
						<div class="icon"><i style="font-size:50px;" class="ion ion-ios7-location"></i></div>
						<a class="small-box-footer" href="<?php echo base_url('kegiatan/'.$year.'/'.jarvis_encode($item['id']));?>"><i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<?php } ?>
			</div>
			
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
