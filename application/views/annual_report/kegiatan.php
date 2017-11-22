<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $propinsi.' - '.$year;?>
			</h1>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li class="active"><?php echo $propinsi.' - '.$year;?></li>
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
								<?php echo ($dataSummary['results']!=0) ? jarvis_echo($dataSummary,'jumlah') : 0; ?>
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
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">Rentang Usia</h3>
						</div>
						<div class="box-body chart-responsive">
							<div class="chart" id="rentang_usia" style="height: 300px;"></div>
						</div><!-- /.box-body --> 
					</div>
				</div>
				<div class="col-md-6">
					<div class="box box-danger">
						<div class="box-header">
							<h3 class="box-title">Pendidikan Terakhir</h3>
						</div>
						<div class="box-body chart-responsive">
							<div class="chart" id="pendidikan" style="height: 300px;"></div>
						</div><!-- /.box-body -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php echo form_open('kegiatan/'.$year.'/'.uri_segment(3)); ?>
						<div class="input-group input-group">
							<input type="text" class="form-control" name="searchbox" style="padding:6px 12px;" placeholder="Kegiatan">
							<span class="input-group-btn">
								<button class="btn btn-info btn-flat" type="submit" name="searchBtn" value="nama">Go!</button>
							</span>
						</div>
					<?php echo form_close();?>
					<br>
					<div class="box box-primary">
						<div align="right" style="margin-top:10px; margin-right:10px;">
							<?php echo jarvis_permission('add',$permission,array('path'=>$year.'/'.uri_segment(3)));?>
							<?php echo jarvis_permission_v2($permission,array('tabel'=>'trans_kegiatan','pk'=>'id','redirect'=>base_url().'kegiatan/'.$year.'/'.uri_segment(3),'path'=>$year.'/'.uri_segment(3).'/'));?>
							<?php echo jarvis_permission('export',$permission);?>
							<?php echo jarvis_back_button(2);?>
						</div>
						<div class="box-body table-responsive">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20" style="background:none; padding:4px; vertical-align:middle;"><input type="checkbox" class="checkAll"/></th>
										<th style="padding:4px; vertical-align:middle;">Kegiatan</th>
										<th style="padding:4px; vertical-align:middle;">Lokasi</th>
										<th style="padding:4px; vertical-align:middle;">Tanggal</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									foreach($dataKegiatan['data'] as $item){
										?>
										<tr>
											<td style="padding:4px; vertical-align:middle; text-align:center;"><input type="checkbox" class="checkValue" value="<?php echo jarvis_encode($item['id']);?>" name="regCheck[]"/></td>
											<td style="padding:4px; vertical-align:middle;"><a href="<?php echo base_url('peserta/'.$year.'/'.uri_segment(3).'/'.jarvis_encode($item['id']));?>"><?php echo $item['nama']?></a></td>
											<td style="padding:4px; vertical-align:middle;"><?php echo $item['tempat'];?></td>
											<td style="padding:4px; vertical-align:middle;"><?php echo jarvis_date($item['start_date']).' s/d '.jarvis_date($item['end_date']);?></td>
										</tr>
										<?php
									} 
								?>
								</tbody>
								<tfoot>
									<tr>
										<th style="padding:4px;"></th>
										<th style="padding:4px; vertical-align:middle;">Kegiatan</th>
										<th style="padding:4px; vertical-align:middle;">Lokasi</th>
										<th style="padding:4px; vertical-align:middle;">Tanggal</th>
									</tr>
								</tfoot>
							</table>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div>
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
