<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<?php 
		$dataForm=array(
			'add'=>array(
				'title'=>'Tambah',
				'url'=>'kegiatan/'.$year.'/'.uri_segment(3).'/add',
				'set_value'=>array(
					'nama'=>'',
					'tempat'=>'',
					'start_date'=>'',
					'end_date'=>'',
					'cat_id'=>''
					),
				'form_active'=>array(
					'nama'=>true,
					'tempat'=>true,
					'start_date'=>true,
					'end_date'=>true,
					'cat_id'=>true
					)
				),
			'edit'=>array(
				'title'=>'Sunting',
				'url'=>'kegiatan/'.$year.'/'.uri_segment(3).'/'.uri_segment(4),
				'set_value'=>array(
					'nama'=>isset($dataKegiatanEdit) ? jarvis_echo($dataKegiatanEdit,'nama') : '',
					'tempat'=>isset($dataKegiatanEdit) ? jarvis_echo($dataKegiatanEdit,'tempat') : '',
					'start_date'=>isset($dataKegiatanEdit) ? (jarvis_echo($dataKegiatanEdit,'start_date') == '0000-00-00') ? '' : jarvis_convert_field(jarvis_echo($dataKegiatanEdit,'start_date'),'jarvisDate') : '',
					'end_date'=>isset($dataKegiatanEdit) ? (jarvis_echo($dataKegiatanEdit,'end_date') == '0000-00-00') ? '' : jarvis_convert_field(jarvis_echo($dataKegiatanEdit,'end_date'),'jarvisDate') : '',
					'cat_id'=>isset($dataKegiatanEdit) ? jarvis_echo($dataKegiatanEdit,'cat_id') : ''
					),
				'form_active'=>array(
					'nama'=>true,
					'tempat'=>true,
					'start_date'=>true,
					'end_date'=>true,
					'cat_id'=>true
					)
				));
		?>
		<section class="content-header">
			<h1>
				<?php echo $propinsi.' - '.$year;?>
			</h1>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li><?php echo $propinsi.' '.$year;?></li>
				<li class="active"><?php echo $dataForm[$key_action]['title']; ?></li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-body table-responsive">
							<?php echo form_open($dataForm[$key_action]['url']); ?>
								<div class="box-body">
								<?php if($dataForm[$key_action]['form_active']['nama']==true) { ?>
									<div class="form-group">
										<label for="ID">Nama (*)</label>
										<input type="text" value="<?php echo set_value('nama',$dataForm[$key_action]['set_value']['nama']); ?>" class="form-control" name="nama" placeholder="Nama kegiatan ..." style="height: 29px;">
										<?php echo form_error('nama','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
									</div>
								<?php } ?>
								<?php if($dataForm[$key_action]['form_active']['tempat']==true) { ?>
									<div class="form-group">
										<label for="Description">Tempat/Lokasi</label>
										<textarea class="form-control" rows="3" name="tempat" placeholder="Lokasi Kegiatan ..."><?php echo set_value('tempat',$dataForm[$key_action]['set_value']['tempat']); ?></textarea>
										<?php echo form_error('tempat','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
									</div>
								<?php } ?>
								<?php if($dataForm[$key_action]['form_active']['start_date']==true) { ?>
									<div class="form-group">
										<label for="review_brief">Tanggal Mulai</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" autocomplete="off" style="padding-bottom: 1px; padding-top: 1px; height: 29px;" class="form-control jarvisdatepicker formReg" value="<?php echo set_value('start_date',$dataForm[$key_action]['set_value']['start_date']); ?>" name="start_date" data-provide='datepicker' data-date-format='dd/mm/yyyy'/>																
										</div>
										<?php echo form_error('tanggal_kegiatan','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
									</div>
								<?php } ?>
								<?php if($dataForm[$key_action]['form_active']['end_date']==true) { ?>
									<div class="form-group">
										<label for="review_brief">Tanggal Selesai</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" autocomplete="off" style="padding-bottom: 1px; padding-top: 1px; height: 29px;" class="form-control jarvisdatepicker formReg" value="<?php echo set_value('end_date',$dataForm[$key_action]['set_value']['end_date']); ?>" name="end_date" data-provide='datepicker' data-date-format='dd/mm/yyyy'/>																
										</div>
										<?php echo form_error('tanggal_kegiatan','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
									</div>
								<?php } ?>
								<?php if($dataForm[$key_action]['form_active']['cat_id']==true) { ?>
									<div class="form-group">
										<label for="cat_id">Kategori Kegiatan</label>
										<select class="form-control" name="cat_id" style="padding-bottom: 1px; padding-top: 1px; height: 29px;">
											<option value=""></option>
											<?php foreach($cat_id['data'] as $item) {?>
												<option value="<?php echo $item['id'];?>" <?php if($item['id']==$dataForm[$key_action]['set_value']['cat_id']) { $selected=true; } else { $selected=false; } echo set_select('cat_id', $item['id'],$selected); ?>><?php echo $item['parameter'];?></option>
											<?php } ?>
										</select>
									</div>
								<?php } ?>
								<div class="form-group">
									<p class="help-block">(*) <?php echo jarvis_call_configuration('required_label');?></p>
								</div>
								</div><!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-primary btn-sm"><?php echo jarvis_call_configuration('save_button');?></button>
									<?php echo jarvis_back_button(3);?>
								</div>
							<?php echo form_close();?>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div>

		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
