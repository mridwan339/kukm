<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<?php 
		$dataForm=array(
			'add'=>array(
				'title'=>'Tambah',
				'url'=>'peserta/'.$year.'/'.uri_segment(3).'/'.uri_segment(4).'/add',
				'set_value'=>array(
					'nik'=>'',
					'nama'=>'',
					'ttl'=>'',
					'jk'=>'',
					'usia'=>'',
					'rentang_usia'=>'',
					'pendidikan'=>'',
					'agama'=>'',
					'alamat'=>'',
					'hp_telp'=>'',
					'email_fax'=>'',
					'lembaga'=>'',
					'rencana_usaha'=>''
					),
				'form_active'=>array(
					'nik'=>true,
					'nama'=>true,
					'ttl'=>true,
					'jk'=>true,
					'usia'=>true,
					'rentang_usia'=>true,
					'pendidikan'=>true,
					'agama'=>true,
					'alamat'=>true,
					'hp_telp'=>true,
					'email_fax'=>true,
					'lembaga'=>true,
					'rencana_usaha'=>true
					),
				'form_disable'=>array(
					'nik'=>false,
					'nama'=>false,
					'ttl'=>false,
					'jk'=>false,
					'usia'=>false,
					'rentang_usia'=>false,
					'pendidikan'=>false,
					'agama'=>false,
					'alamat'=>false,
					'hp_telp'=>false,
					'email_fax'=>false,
					'lembaga'=>false,
					'rencana_usaha'=>false,
					'save_button'=>false,
					'mandatory'=>false,
					)
				),
			'edit'=>array(
				'title'=>'Sunting',
				'url'=>'peserta/'.$year.'/'.uri_segment(3).'/'.uri_segment(4).'/'.uri_segment(5),
				'set_value'=>array(
					'nik'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'nik') : '',
					'nama'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'nama') : '',
					'ttl'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'ttl') : '',
					'jk'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'jk') : '',
					'usia'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'usia') : '',
					'rentang_usia'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'rentang_usia') : '',
					'pendidikan'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'pendidikan') : '',
					'agama'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'agama') : '',
					'alamat'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'alamat') : '',
					'hp_telp'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'hp_telp') : '',
					'email_fax'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'email_fax') : '',
					'lembaga'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'lembaga') : '',
					'rencana_usaha'=>isset($dataPesertaEdit) ? jarvis_echo($dataPesertaEdit,'rencana_usaha') : ''
					),
				'form_active'=>array(
					'nik'=>true,
					'nama'=>true,
					'ttl'=>true,
					'jk'=>true,
					'usia'=>true,
					'rentang_usia'=>true,
					'pendidikan'=>true,
					'agama'=>true,
					'alamat'=>true,
					'hp_telp'=>true,
					'email_fax'=>true,
					'lembaga'=>true,
					'rencana_usaha'=>true
					),
				'form_disable'=>array(
					'nik'=>false,
					'nama'=>false,
					'ttl'=>false,
					'jk'=>false,
					'usia'=>false,
					'rentang_usia'=>false,
					'pendidikan'=>false,
					'agama'=>false,
					'alamat'=>false,
					'hp_telp'=>false,
					'email_fax'=>false,
					'lembaga'=>false,
					'rencana_usaha'=>false,
					'save_button'=>false,
					'mandatory'=>false
					)
				),
			'detail'=>array(
				'title'=>'Detail',
				'url'=>'',
				'set_value'=>array(
					'nik'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'nik') : '',
					'nama'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'nama') : '',
					'ttl'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'ttl') : '',
					'jk'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'jk') : '',
					'usia'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'usia') : '',
					'rentang_usia'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'rentang_usia') : '',
					'pendidikan'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'pendidikan') : '',
					'agama'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'agama') : '',
					'alamat'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'alamat') : '',
					'hp_telp'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'hp_telp') : '',
					'email_fax'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'email_fax') : '',
					'lembaga'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'lembaga') : '',
					'rencana_usaha'=>isset($dataPesertaDetail) ? jarvis_echo($dataPesertaDetail,'rencana_usaha') : ''
					),
				'form_active'=>array(
					'nik'=>true,
					'nama'=>true,
					'ttl'=>true,
					'jk'=>true,
					'usia'=>true,
					'rentang_usia'=>true,
					'pendidikan'=>true,
					'agama'=>true,
					'alamat'=>true,
					'hp_telp'=>true,
					'email_fax'=>true,
					'lembaga'=>true,
					'rencana_usaha'=>true
					),
				'form_disable'=>array(
					'nik'=>true,
					'nama'=>true,
					'ttl'=>true,
					'jk'=>true,
					'usia'=>true,
					'rentang_usia'=>true,
					'pendidikan'=>true,
					'agama'=>true,
					'alamat'=>true,
					'hp_telp'=>true,
					'email_fax'=>true,
					'lembaga'=>true,
					'rencana_usaha'=>true,
					'save_button'=>true,
					'mandatory'=>true
					)
				));
		?>
		<section class="content-header">
			<h2>
				<small><b><?php echo $kegiatan;?></li></small></b>
			</h2>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Beranda</li>
				<li><?php echo $kegiatan;?></li>
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
									<div class="box-group" id="accordion">
										<div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Biodata
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
													<?php if($dataForm[$key_action]['form_active']['nik']==true) { ?>
														<div class="form-group">
															<label for="nik">NIK / KTP <?php if($dataForm[$key_action]['form_disable']['mandatory']==true) {} else {?>(*)<?php } ?></label>
															<input type="text" <?php echo ($dataForm[$key_action]['form_disable']['nik']==true ? 'readonly=readonly' : '');?> value="<?php echo set_value('nik',$dataForm[$key_action]['set_value']['nik']); ?>" class="form-control" name="nik" placeholder="NIK / KTP ..." style="height: 29px;">
															<?php echo form_error('nik','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['nama']==true) { ?>
														<div class="form-group">
															<label for="Nama">Nama Peserta <?php if($dataForm[$key_action]['form_disable']['mandatory']==true) {} else {?>(*)<?php } ?></label>
															<input type="text" <?php echo ($dataForm[$key_action]['form_disable']['nama']==true ? 'readonly=readonly' : '');?> value="<?php echo set_value('nama',$dataForm[$key_action]['set_value']['nama']); ?>" class="form-control" name="nama" placeholder="Nama Peserta ..." style="height: 29px;">
															<?php echo form_error('nama','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['ttl']==true) { ?>
														<div class="form-group">
															<label for="TTL">Tempat Tanggal Lahir</label>
															<input type="text" <?php echo ($dataForm[$key_action]['form_disable']['ttl']==true ? 'readonly=readonly' : '');?> value="<?php echo set_value('ttl',$dataForm[$key_action]['set_value']['ttl']); ?>" class="form-control" name="ttl" placeholder="TTL ..." style="height: 29px;">
															<?php echo form_error('ttl','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['jk']==true) { ?>
														<div class="form-group">
															<label for="JK">Jenis Kelamin</label>
															<select class="form-control" <?php echo ($dataForm[$key_action]['form_disable']['jk']==true ? 'disabled=disabled' : '');?> name="jk" style="padding-bottom: 1px; padding-top: 1px; height: 29px;">
																<option value=""></option>
																<?php foreach($jk['data'] as $item) {?>
																	<option value="<?php echo $item['parameter'];?>" <?php if($item['parameter']==$dataForm[$key_action]['set_value']['jk']) { $selected=true; } else { $selected=false; } echo set_select('jk', $item['parameter'],$selected); ?>><?php echo $item['parameter'];?></option>
																<?php } ?>
															</select>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['usia']==true) { ?>
														<div class="form-group">
															<label for="Usia">Usia</label>
															<input type="text" <?php echo ($dataForm[$key_action]['form_disable']['usia']==true ? 'readonly=readonly' : '');?> value="<?php echo set_value('usia',$dataForm[$key_action]['set_value']['usia']); ?>" class="form-control" name="usia" placeholder="Usia ..." style="height: 29px;">
															<?php echo form_error('usia','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['rentang_usia']==true) { ?>
														<div class="form-group">
															<label for="rentang_usia">Rentang Usia</label>
															<select class="form-control" <?php echo ($dataForm[$key_action]['form_disable']['rentang_usia']==true ? 'disabled=disabled' : '');?> name="rentang_usia" style="padding-bottom: 1px; padding-top: 1px; height: 29px;">
																<option value=""></option>
																<?php foreach($rentangUsia['data'] as $item) {?>
																	<option value="<?php echo $item['parameter'];?>" <?php if($item['parameter']==$dataForm[$key_action]['set_value']['rentang_usia']) { $selected=true; } else { $selected=false; } echo set_select('rentang_usia', $item['parameter'],$selected); ?>><?php echo $item['parameter'];?></option>
																<?php } ?>
															</select>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['pendidikan']==true) { ?>
														<div class="form-group">
															<label for="pendidikan">Pendidikan Terakhir</label>
															<select class="form-control" <?php echo ($dataForm[$key_action]['form_disable']['pendidikan']==true ? 'disabled=disabled' : '');?> name="pendidikan" style="padding-bottom: 1px; padding-top: 1px; height: 29px;">
																<option value=""></option>
																<?php foreach($pendidikan['data'] as $item) {?>
																	<option value="<?php echo $item['parameter'];?>" <?php if($item['parameter']==$dataForm[$key_action]['set_value']['pendidikan']) { $selected=true; } else { $selected=false; } echo set_select('pendidikan', $item['parameter'],$selected); ?>><?php echo $item['parameter'];?></option>
																<?php } ?>
															</select>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['agama']==true) { ?>
														<div class="form-group">
															<label for="agama">Agama</label>
															<select class="form-control" <?php echo ($dataForm[$key_action]['form_disable']['agama']==true ? 'disabled=disabled' : '');?> name="agama" style="padding-bottom: 1px; padding-top: 1px; height: 29px;">
																<option value=""></option>
																<?php foreach($agama['data'] as $item) {?>
																	<option value="<?php echo $item['parameter'];?>" <?php if($item['parameter']==$dataForm[$key_action]['set_value']['agama']) { $selected=true; } else { $selected=false; } echo set_select('agama', $item['parameter'],$selected); ?>><?php echo $item['parameter'];?></option>
																<?php } ?>
															</select>
														</div>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
										<div class="panel box box-danger">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        Kontak
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                <div class="box-body">
													<?php if($dataForm[$key_action]['form_active']['alamat']==true) { ?>
														<div class="form-group">
															<label for="alamat">Alamat Peserta</label>
															<textarea <?php echo ($dataForm[$key_action]['form_disable']['alamat']==true ? 'readonly=readonly' : '');?> class="form-control" rows="3" name="alamat" placeholder="Alamat ..."><?php echo set_value('alamat',$dataForm[$key_action]['set_value']['alamat']); ?></textarea>
															<?php echo form_error('alamat','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['hp_telp']==true) { ?>
														<div class="form-group">
															<label for="hp_telp">No. Telepon</label>
															<input <?php echo ($dataForm[$key_action]['form_disable']['hp_telp']==true ? 'readonly=readonly' : '');?> type="text" value="<?php echo set_value('hp_telp',$dataForm[$key_action]['set_value']['hp_telp']); ?>" class="form-control" name="hp_telp" placeholder="No Telepon ..." style="height: 29px;">
															<?php echo form_error('hp_telp','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['email_fax']==true) { ?>
														<div class="form-group">
															<label for="email_fax">Email / Fax</label>
															<input <?php echo ($dataForm[$key_action]['form_disable']['email_fax']==true ? 'readonly=readonly' : '');?> type="text" value="<?php echo set_value('email_fax',$dataForm[$key_action]['set_value']['email_fax']); ?>" class="form-control" name="email_fax" placeholder="Email / Fax ..." style="height: 29px;">
															<?php echo form_error('email_fax','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                        Lainnya
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse in">
                                                <div class="box-body">
													<?php if($dataForm[$key_action]['form_active']['lembaga']==true) { ?>
														<div class="form-group">
															<label for="lembaga">Asal Lembaga</label>
															<input <?php echo ($dataForm[$key_action]['form_disable']['lembaga']==true ? 'readonly=readonly' : '');?> type="text" value="<?php echo set_value('lembaga',$dataForm[$key_action]['set_value']['lembaga']); ?>" class="form-control" name="lembaga" placeholder="Asal Lembaga ..." style="height: 29px;">
															<?php echo form_error('lembaga','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
													<?php if($dataForm[$key_action]['form_active']['rencana_usaha']==true) { ?>
														<div class="form-group">
															<label for="rencana_usaha">Rencana Usaha</label>
															<textarea <?php echo ($dataForm[$key_action]['form_disable']['rencana_usaha']==true ? 'readonly=readonly' : '');?> class="form-control" rows="3" name="rencana_usaha" placeholder="Rencana Usaha ..."><?php echo set_value('rencana_usaha',$dataForm[$key_action]['set_value']['rencana_usaha']); ?></textarea>
															<?php echo form_error('rencana_usaha','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
														</div>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
										<div class="form-group">
											<?php if($dataForm[$key_action]['form_disable']['mandatory']==true) {} else {?><p class="help-block">(*) <?php echo jarvis_call_configuration('required_label');?></p><?php } ?>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box-body -->
								<div class="box-footer">
									<?php if($dataForm[$key_action]['form_disable']['save_button']==true) {} else {?><button type="submit" class="btn btn-primary btn-sm"><?php echo jarvis_call_configuration('save_button');?></button><?php } ?>
									<?php echo jarvis_back_button(4);?>
								</div>
							<?php echo form_close();?>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div>

		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
