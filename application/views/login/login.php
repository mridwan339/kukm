<body>
	<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
	<div align="center" style="margin-top:60px;">
		<img width="90" src="<?php echo base_url().jarvis_call_configuration('logoDishub');?>"/>
		<h4 style="color:#FBC818; text-shadow: 1px 1px #BA9393;"><?php echo jarvis_call_configuration('footerLoginBox');?></h4>
	</div>
	<div class="form-box" id="login-box" style="margin-top:10px;">
		<div class="header"><h3><?php echo jarvis_call_configuration('headerLoginBox');?></h3></div>
		<?php echo form_open('login'); ?>
			<div class="body bg-gray">
				<div class="error"><strong><?php if ($this->session->flashdata('message'))echo $this->session->flashdata('message');?></strong></div>
				<div class="form-group">
					<input type="text" name="username" value="<?php echo set_value('username');?>" class="form-control" placeholder="Nama Pengguna"/>
					<?php echo form_error('username','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Sandi"/>
					<?php echo form_error('password','<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>'); ?>
				</div>    
				<!--<div align="center">
					<div class="g-recaptcha" data-sitekey="6LcZmRATAAAAAA_CQfX0XLWfG0T6GrUCg79S309T"></div>      
				</div>-->
			</div>
			<div class="footer">                                                               
				<button type="submit" class="btn bg-jarvis btn-block">Masuk</button> 				 
			</div>
		</form>
	</div>
