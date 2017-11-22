<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h2>
				<p></p>
                <small><b><?php echo $kegiatan;?></li></small></b>
			</h2>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li><?php echo $kategori.' '.$year;?></li>
				<li class="active"><?php echo $kegiatan;?></li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<?php echo form_open('peserta_kategori/'.$year.'/'.uri_segment(3).'/'.uri_segment(4).'/search'); ?>
						<div class="input-group input-group">
							<input type="text" class="form-control" name="nilai_pencarian" style="padding:6px 12px;" placeholder="Nilai Pencarian (Minimal 3 Karakter)">
							<span class="input-group-btn">
								<button class="btn btn-info btn-flat" type="submit" name="searchBtn" value="hoho">Go!</button>
							</span>
						</div>
					<?php echo form_close();?>
					<br>
					<div class="box box-primary">
						<div align="right" style="margin-top:10px; margin-right:10px;">
							<?php echo jarvis_permission('export',$permission,array('path'=>$year.'/'.uri_segment(3).'/'.uri_segment(4)));?>
							<button type="button" class="btn btn-success btn-sm" onclick=location.href="<?php echo base_url('kategori/'.$year.'/'.uri_segment(3));?>">Kembali</button>
						</div>
						<div class="box-body table-responsive" style="margin-top:-5px; margin-left:10px; margin-right:10px;">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20" style="background:none; padding:4px; vertical-align:middle;"><input type="checkbox" class="checkAll"/></th>
										<th style="padding:4px; vertical-align:middle; text-align:left;">NIK / KTP</th>
										<th style="padding:4px; vertical-align:middle; text-align:left;">Nama Peserta</th>
										<th style="padding:4px; vertical-align:middle; text-align:left;">Jenis Kelamin</th>
										<th style="padding:4px; vertical-align:middle; text-align:left;">Usia</th>
										<th style="padding:4px; vertical-align:middle; text-align:left;">Asal Lembaga</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									foreach($dataPeserta->result_array() as $item){
										?>
										<tr>
											<td style="padding:4px; vertical-align:middle; text-align:center;"><input type="checkbox" class="checkValue" value="<?php echo jarvis_encode($item['id']);?>" name="regCheck[]"/></td>
											<td style="padding:4px; vertical-align:middle;"><?php echo $item['nik'];?></td>
											<td style="padding:4px; vertical-align:middle;"><a href="<?php echo base_url('peserta_kategori/'.$year.'/'.uri_segment(3).'/'.uri_segment(4).'/'.jarvis_encode($item['id']).'/detail');?>"><?php echo $item['nama'];?></a></td>
											<td style="padding:4px; vertical-align:middle;"><?php echo $item['jk'];?></td>
											<td style="padding:4px; vertical-align:middle;"><?php echo $item['usia'];?></td>
											<td style="padding:4px; vertical-align:middle;"><?php echo $item['lembaga'];?></td>
										</tr>
										<?php
									} 
								?>
								</tbody>
								<tfoot>
									<tr>
										<th style="padding:4px;"></th>
										<th style="padding:4px; vertical-align:middle;">NIK / KTP</th>
										<th style="padding:4px; vertical-align:middle;">Nama Peserta</th>
										<th style="padding:4px; vertical-align:middle;">Jenis Kelamin</th>
										<th style="padding:4px; vertical-align:middle;">Usia</th>
										<th style="padding:4px; vertical-align:middle;">Asal Lembaga</th>
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
