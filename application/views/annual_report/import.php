<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<?php 
		$dataForm=array(
			'add'=>array(
				'title'=>'Import',
				'url'=>'peserta/'.$year.'/'.uri_segment(3).'/'.uri_segment(4).'/import/upload'
				));
		?>
		<section class="content-header">
			<h2>
				<small><b><?php echo $kegiatan;?></li></small></b>
			</h2>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li><?php echo $propinsi.' - '.$year;?></li>
				<li><?php echo $kegiatan;?></li>
				<li class="active">Import</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<?php echo form_open_multipart($dataForm[$key_action]['url']); ?>
						<div class="box-body table-responsive">
							<div class="form-group">
								<input class="filestyle" data-buttonName="btn btn-primary" type="file" name="excel_input">
								<?php echo $errorExcel; ?>
								<p class="help-block">Allow Extension : .xlsx <!--| <a href="<?php //echo base_url().jarvis_call_configuration('templateExcel');	?>" target="_Blank">Template</a></p>-->
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-sm formReg"><?php echo jarvis_call_configuration('upload_button');?></button>
							<button type="button" class="btn btn-success btn-sm formReg" onclick="location.href='<?php echo base_url('peserta/'.$year.'/'.uri_segment(3).'/'.uri_segment(4));?>'">Lihat Data</button>
						</div>
						<?php echo form_close();?>
					</div><!-- /.box -->
				</div>
			</div>
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
