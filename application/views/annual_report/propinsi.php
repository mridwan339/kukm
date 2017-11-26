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
			<h3>
                  <p></p>
                <center style="color:grey; font-weight:bold;">Silahkan Pilih Provinsi !</center>
			</h3> 
			
			<div style="border-bottom: 1px solid #eee; margin-bottom:10px;"></div>
			
			<div id="vmap" class="set-bordius" style="width: 100%; height: 400px;"></div>
			<?php
			foreach($dataPropinsi['data'] as $item){
				$numRan=rand(0,13);
				if($item['parameter']=="DI Yogyakarta"){
					$item['parameter']="Yogyakarta";
				}
				echo '<div data-map-id="'.$item['id'].'" data-map-name="'.$item['parameter'].'" data-map-url="'.base_url('kegiatan/'.$year.'/'.jarvis_encode($item['id'])).'" class="location_detail hidden"></div>';
			}
			?>
			<div style="border-bottom: 1px solid #eee; margin-bottom:10px;"></div>
			<div class="row provinsiKoleksi">
			<div class="box-body table-responsive" style="margin-top:-5px; margin-left:10px; margin-right:10px;">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th style="padding:4px; vertical-align:middle; text-align:left;">No</th>
							<th style="padding:4px; vertical-align:middle; text-align:left;">Nama Provinsi</th>
							<th style="padding:4px; vertical-align:middle; text-align:left;">Jumlah Wirausaha</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$noid=0;
					foreach($dataPropinsi['data'] as $item){
						$noid++;
						if($item['parameter']=="DI Yogyakarta"){
							$item['parameter']="Yogyakarta";
						}
					?>	
							<tr>
								<td style="padding:4px; vertical-align:middle;"><?php echo $noid; ?></td>
								<td style="padding:4px; vertical-align:middle;"><a href="<?php echo base_url('kegiatan/'.$year.'/'.jarvis_encode($item['id']));?>"><?php echo $item['parameter'];?></a></td>
								<td style="padding:4px; vertical-align:middle;" data-total-wirausaha-by-name-region="<?php echo $item['parameter'];?>"></td>
							</tr>
					<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th style="padding:4px; vertical-align:middle; text-align:left;">No</th>
							<th style="padding:4px; vertical-align:middle; text-align:left;">Nama Provinsi</th>
							<th style="padding:4px; vertical-align:middle; text-align:left;">Jumlah Wirausaha</th>
						</tr>
					</tfoot>
				</table>
			</div>
			</div><!-- /.box-body -->
			<!--<div class="row">
				<?php /*
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
				<?php } */ ?>
			</div>-->
			
			<div class="row">
				<div class="col-lg-6 col-sm-12 col-xs-12">
					<!-- small box -->
					<div class="small-box bg-green set-bordius">
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
						<a href="#" class="small-box-footer set-bordius-footer-only">
							Jumlah Peserta di tahun <?php echo $year;?>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<!-- small box -->
					<div class="small-box bg-aqua set-bordius">
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
						<a href="#" class="small-box-footer set-bordius-footer-only">
							Laki-Laki
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<!-- small box -->
					<div class="small-box bg-red set-bordius">
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
						<a href="#" class="small-box-footer set-bordius-footer-only">
							Perempuan
						</a>
					</div>
				</div>
			</div>
			
			
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
