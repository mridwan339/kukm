<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Annual_report extends CI_Controller {
	
	private $table=array('css'=>'jarvis_autoload_css','js'=>'jarvis_autoload_js','config'=>'configuration','jarvis_parameter'=>'jarvis_parameter','trans_kegiatan'=>'trans_kegiatan','trans_kegiatan_peserta'=>'trans_kegiatan_peserta','trans_kegiatan_peserta_excel'=>'trans_kegiatan_peserta_excel');
	private $view=array('jarvis_vw_user'=>'jarvis_vw_user','trans_vw_kegiatan'=>'trans_vw_kegiatan','trans_vw_kegiatan_peserta'=>'trans_vw_kegiatan_peserta','report_vw_skala_nasional'=>'report_vw_skala_nasional','report_vw_skala_nasional_gender2'=>'report_vw_skala_nasional_gender2','report_vw_skala_propinsi'=>'report_vw_skala_propinsi','report_vw_skala_propinsi_gender2'=>'report_vw_skala_propinsi_gender2','report_vw_skala_propinsi_rentang_usia'=>'report_vw_skala_propinsi_rentang_usia','report_vw_skala_propinsi_pendidikan'=>'report_vw_skala_propinsi_pendidikan');
	private $fieldOrder=array('id'=>'id','order_hint'=>'order_hint','tahun'=>'tahun');
	private $fieldOrderType=array('asc'=>'asc','desc'=>'desc');
	private $searchField=array('filename'=>'filename','username'=>'username','text'=>'text','parameter'=>'parameter','nama'=>'nama','file'=>'file','tahun'=>'tahun');
	private $changeParams=array('1'=>'INSERT','2'=>'UPDATE','3'=>'DELETE','4'=>'LOGIN','5'=>'LOGOUT');
	private $pk=array('id'=>'id');
	
	function __construct(){
		parent::__construct();
	}
	public function propinsi($year=''){
		$session_data = $this->session->userdata('logged_in');
		if($session_data and $session_data['on_screen']=='yes'){
			$sessionID=$session_data['id'];
			jarvis_check_activity($sessionID);
			$data['css'] = jarvis_call_css_js($this->searchField['filename'],$this->table['css'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['js'] = jarvis_call_css_js($this->searchField['filename'],$this->table['js'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['page_title'] = 'Laporan Tahunan '.$year;
			$data['html_class'] = '';
			$data['userData'] = $session_data;
			$data['year'] = $year;
						
			/*START SIDEBAR MENU*/
			$params_sidebar=array('ref_group_user'=>$session_data['ref_group_user']);
			$data['sidebar']=jarvis_sidebar('jarvis_vw_menu','order_hint','asc',$params_sidebar);
			/*END SIDEBAR MENU*/	
			
			/*START LAYOUT SETTING*/	
			$params_layout=array('id'=>$sessionID);
			$data['layout']=jarvis_layout_setting($this->searchField['username'],$this->view['jarvis_vw_user'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],$params_layout);
			/*END LAYOUT SETTING*/	
			
			/*START PROPINSI DATA*/
			$data['dataPropinsi']=jarvis_get_data($this->searchField['parameter'],$this->table['jarvis_parameter'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],'',array('category_parameter'=>'pil_prop'));
			/*END PROPINSI DATA*/
			
			/*START SKALA NASIONAL SUMMARY DATA*/
			$data['dataSummary']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_nasional'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year));
			/*END SKALA NASIONAL SUMMARY DATA*/
			
			/*START SKALA NASIONAL SUMMARY GENDER DATA*/
			$data['dataSummaryGender']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_nasional_gender2'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year));
			/*END SKALA NASIONAL SUMMARY GENDER DATA*/
			
			jarvis_load_view('header',$data);
			jarvis_load_view('navigation',$data);
			jarvis_load_view('sidebar',$data);
			jarvis_load_view('annual_report/propinsi',$data);
			jarvis_load_view('footer',$data);
		}elseif($session_data and $session_data['on_screen']=='no'){
			redirect('lock_screen', 'refresh');
		}else{
			redirect('login', 'refresh');
		}
	}
	public function kegiatan($year='',$propinsi='',$subPage='',$dataID=''){
		$session_data = $this->session->userdata('logged_in');
		if($session_data and $session_data['on_screen']=='yes'){
			$sessionID=$session_data['id'];
			$propinsiDec=jarvis_decode($propinsi);
			$getPropinsi=jarvis_get_data($this->searchField['parameter'],$this->table['jarvis_parameter'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$propinsiDec));
			jarvis_check_activity($sessionID);
			$data['css'] = jarvis_call_css_js($this->searchField['filename'],$this->table['css'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['js'] = jarvis_call_css_js($this->searchField['filename'],$this->table['js'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['page_title'] = jarvis_echo($getPropinsi,'parameter').' '.$year;
			$data['html_class'] = '';
			$data['permission']='Kegiatan';
			$data['userData'] = $session_data;
			$data['year'] = $year;
			$data['propinsi'] = jarvis_echo($getPropinsi,'parameter');
						
			/*START SIDEBAR MENU*/
			$params_sidebar=array('ref_group_user'=>$session_data['ref_group_user']);
			$data['sidebar']=jarvis_sidebar('jarvis_vw_menu','order_hint','asc',$params_sidebar);
			/*END SIDEBAR MENU*/	
			
			/*START LAYOUT SETTING*/	
			$params_layout=array('id'=>$sessionID);
			$data['layout']=jarvis_layout_setting($this->searchField['username'],$this->view['jarvis_vw_user'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],$params_layout);
			/*END LAYOUT SETTING*/	
			
			/*START KEGIATAN DATA*/
			$data['dataKegiatan']=jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan'],$this->fieldOrder['id'],$this->fieldOrderType['desc'],'',array('tahun'=>$year,'prop_id'=>$propinsiDec));
			/*END KEGIATAN DATA*/
			
			/*START SKALA PROPINSI SUMMARY DATA*/
			$data['dataSummary']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_propinsi'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'prop_id'=>$propinsiDec));
			/*END SKALA NASIONAL SUMMARY DATA*/
			
			/*START SKALA PROPINSI SUMMARY GENDER DATA*/
			$data['dataSummaryGender']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_propinsi_gender2'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'prop_id'=>$propinsiDec));
			/*END SKALA NASIONAL SUMMARY GENDER DATA*/
			
			/*START PESERTA DATA*/
			$dp=jarvis_query_block('select *,trans_kegiatan_peserta.nama as nama_peserta,trans_kegiatan_peserta.id as peserta_id_tkp,trans_kegiatan.id as kegiatan_id_tkp,trans_kegiatan.nama as nama_kegiatan from `trans_kegiatan_peserta` INNER JOIN trans_kegiatan ON trans_kegiatan_peserta.kegiatan_id = trans_kegiatan.id WHERE prop_id="'.$propinsiDec.'"');
			$data['dataPeserta']=$dp->result_array();
			
			jarvis_load_view('header',$data);
			jarvis_load_view('navigation',$data);
			jarvis_load_view('sidebar',$data);
			
			if(!$subPage){
				jarvis_load_view('annual_report/kegiatan',$data);
			}else{
				$data['cat_id']=jarvis_call_parameter('kategori_kegiatan');
				if($subPage=='add'){
					$data['key_action'] = 'add';
					$this->form_validation->set_rules('nama', 'Kegiatan', 'trim|required|xss_clean');
					$this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'trim|xss_clean');
					$this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'trim|xss_clean');
					$this->form_validation->set_rules('end_date', 'Tanggal Selesai', 'trim|xss_clean');
					if($this->form_validation->run() == FALSE){	
						jarvis_load_view('annual_report/kegiatanForm',$data);
					}else{
						$data_insert = array(
							'nama'=>jarvis_post('nama'),
							'tempat'=>jarvis_post('tempat'),
							'start_date'=>(jarvis_post('start_date')!='' ? jarvis_convert_field(jarvis_post('start_date'),'jarvisDateV2') : ''),
							'end_date'=>(jarvis_post('end_date')!='' ? jarvis_convert_field(jarvis_post('end_date'),'jarvisDateV2') : ''),
							'tahun'=>$year,
							'prop_id'=>$propinsiDec,
							'cat_id'=>jarvis_post('cat_id')
						);
						jarvis_process_block($this->changeParams[1],$this->table['trans_kegiatan'],$data_insert,$sessionID);
						redirect('kegiatan/'.$year.'/'.$propinsi);
					}
				}elseif($subPage=='edit'){
					$dataID=jarvis_decode(uri_segment(4));
					$result = jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$dataID));
					$data['key_action'] = 'edit';
					$data['dataKegiatanEdit'] = $result;
					if($result['results']==1){
						$this->form_validation->set_rules('nama', 'Kegiatan', 'trim|required|xss_clean');
						$this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'trim|xss_clean');
						$this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'trim|xss_clean');
						$this->form_validation->set_rules('end_date', 'Tanggal Selesai', 'trim|xss_clean');
						if($this->form_validation->run() == FALSE){	
							jarvis_load_view('annual_report/kegiatanForm',$data);
						}else{
							$data_update = array(
								'nama'=>jarvis_post('nama'),
								'tempat'=>jarvis_post('tempat'),
								'start_date'=>(jarvis_post('start_date')!='' ? jarvis_convert_field(jarvis_post('start_date'),'jarvisDateV2') : ''),
								'end_date'=>(jarvis_post('end_date')!='' ? jarvis_convert_field(jarvis_post('end_date'),'jarvisDateV2') : ''),						
								'cat_id'=>jarvis_post('cat_id')
							);
							jarvis_process_block($this->changeParams[2],$this->table['trans_kegiatan'],$data_update,$sessionID,$this->pk['id'],$dataID);
							redirect('kegiatan/'.$year.'/'.$propinsi);
						}
					}else{
						jarvis_load_view('404/page');
					}
				}
			}
			
			jarvis_load_view('footer',$data);
		}elseif($session_data and $session_data['on_screen']=='no'){
			redirect('lock_screen', 'refresh');
		}else{
			redirect('login', 'refresh');
		}
	}
	public function peserta($year='',$propinsi='',$kegiatan='',$subPage='',$dataID=''){
		$session_data = $this->session->userdata('logged_in');
		if($session_data and $session_data['on_screen']=='yes'){
			$sessionID=$session_data['id'];
			$propinsiDec=jarvis_decode($propinsi);
			$kegiatanDec=jarvis_decode($kegiatan);
			$getPropinsi=jarvis_get_data($this->searchField['parameter'],$this->table['jarvis_parameter'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$propinsiDec));
			$getKegiatan=jarvis_get_data($this->searchField['nama'],$this->table['trans_kegiatan'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$kegiatanDec));
			jarvis_check_activity($sessionID);
			$data['css'] = jarvis_call_css_js($this->searchField['filename'],$this->table['css'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['js'] = jarvis_call_css_js($this->searchField['filename'],$this->table['js'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['page_title'] = jarvis_echo($getPropinsi,'parameter').' '.$year;
			$data['html_class'] = '';
			$data['permission']='Peserta';
			$data['userData'] = $session_data;
			$data['year'] = $year;
			$data['propinsi'] = jarvis_echo($getPropinsi,'parameter');
			$data['kegiatan'] = jarvis_echo($getKegiatan,'nama');
						
			/*START SIDEBAR MENU*/
			$params_sidebar=array('ref_group_user'=>$session_data['ref_group_user']);
			$data['sidebar']=jarvis_sidebar('jarvis_vw_menu','order_hint','asc',$params_sidebar);
			/*END SIDEBAR MENU*/	
			
			/*START LAYOUT SETTING*/	
			$params_layout=array('id'=>$sessionID);
			$data['layout']=jarvis_layout_setting($this->searchField['username'],$this->view['jarvis_vw_user'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],$params_layout);
			/*END LAYOUT SETTING*/	
			
			/*START CALL PARAMETER*/
			$data['jk']=jarvis_call_parameter('pil_jk');					// JENIS KELAMIN
			$data['rentangUsia']=jarvis_call_parameter('pil_usia');			// RENTANG USIA
			$data['pendidikan']=jarvis_call_parameter('pil_pendidikan');	// PENDIDIKAN
			$data['agama']=jarvis_call_parameter('pil_agama');				// AGAMA
			/*END CALL PARAMETER*/
			
			if($subPage=='search'){
				if(strlen(jarvis_post('nilai_pencarian')) >= 3){
					$limit=' order by id desc';
				}else{
					$limit=' order by id desc';
				}
			}else{
				$limit=' order by id desc';
			}
			$whereHead="where kegiatan_id='".$kegiatanDec."'";
			$whereKey=(strlen(jarvis_post('nilai_pencarian')) >= 3 ? jarvis_post('nilai_pencarian')!='' ? " and nama like '%".jarvis_post('nilai_pencarian')."' or nama like '".jarvis_post('nilai_pencarian')."%' or nama like '%".jarvis_post('nilai_pencarian')."%' or nik like '%".jarvis_post('nilai_pencarian')."' or nik like '".jarvis_post('nilai_pencarian')."%' or nik like '%".jarvis_post('nilai_pencarian')."%' or lembaga like '%".jarvis_post('nilai_pencarian')."' or lembaga like '".jarvis_post('nilai_pencarian')."%' or lembaga like '%".jarvis_post('nilai_pencarian')."%'" : '' : '');
			
			/*START PESERTA DATA*/
			$dataPeserta=jarvis_query_block("select * from ".$this->view['trans_vw_kegiatan_peserta']." ".$whereHead.$whereKey.$limit);
			if($subPage=='search'){
				$sessDataPeserta = array('query'=>"select * from ".$this->view['trans_vw_kegiatan_peserta']." ".$whereHead.$whereKey.$limit);
				$this->session->set_userdata('sess_data_peserta', $sessDataPeserta);
			}
			$data['dataPeserta']=$dataPeserta;
			//$data['dataPeserta']=jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan_peserta'],$this->fieldOrder['id'],$this->fieldOrderType['desc'],'',array('kegiatan_id'=>$kegiatanDec));
			/*END PESERTA DATA*/
			
			jarvis_load_view('header',$data);
			jarvis_load_view('navigation',$data);
			jarvis_load_view('sidebar',$data);
			
			if(!$subPage or $subPage=='search'){
				jarvis_load_view('annual_report/peserta',$data);
			}else{
				if($subPage=='add'){
					$data['key_action'] = 'add';
					$this->form_validation->set_rules('nik', 'NIK / No.KTP', 'trim|required|xss_clean');
					$this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required|xss_clean');
					$this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'trim|xss_clean');
					$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|xss_clean');
					$this->form_validation->set_rules('usia', 'Usia Peserta', 'trim|xss_clean');
					$this->form_validation->set_rules('rentang_usia', 'Rentang Usia Peserta', 'trim|xss_clean');
					$this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'trim|xss_clean');
					$this->form_validation->set_rules('agama', 'Agama', 'trim|xss_clean');
					$this->form_validation->set_rules('alamat', 'Alamat Peserta', 'trim|xss_clean');
					$this->form_validation->set_rules('hp_telp', 'HP / Telp', 'trim|xss_clean');
					$this->form_validation->set_rules('email_fax', 'Email / No.Fax', 'trim|xss_clean');
					$this->form_validation->set_rules('lembaga', 'Asal Lembaga', 'trim|xss_clean');
					$this->form_validation->set_rules('rencana_usaha', 'Rencana Usaha', 'trim|xss_clean');
					$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
					$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|xss_clean');
					$this->form_validation->set_rules('jenis_bh', 'Jenis Bidang.H', 'trim|xss_clean');
					$this->form_validation->set_rules('bidang_usaha', 'Bidang Usaha', 'trim|xss_clean');
					$this->form_validation->set_rules('no_iumkm', 'Nomor IUMKM', 'trim|xss_clean');
					$this->form_validation->set_rules('no_npwp', 'Nomor NPWP', 'trim|xss_clean');
					$this->form_validation->set_rules('total_karyawan', 'Karyawan', 'trim|xss_clean');
					$this->form_validation->set_rules('tikor_latlon', 'Titik Koordinat Lokasi', 'trim|xss_clean');
					if($this->form_validation->run() == FALSE){	
						jarvis_load_view('annual_report/pesertaForm',$data);
					}else{
						$data_insert = array(
							'kegiatan_id'=>$kegiatanDec,
							'nik'=>jarvis_post('nik'),
							'nama'=>jarvis_post('nama'),
							'ttl'=>jarvis_post('ttl'),
							'jk'=>jarvis_post('jk'),
							'usia'=>jarvis_post('usia'),
							'rentang_usia'=>jarvis_post('rentang_usia'),
							'pendidikan'=>jarvis_post('pendidikan'),
							'agama'=>jarvis_post('agama'),
							'alamat'=>jarvis_post('alamat'),
							'hp_telp'=>jarvis_post('hp_telp'),
							'email_fax'=>jarvis_post('email_fax'),
							'lembaga'=>jarvis_post('lembaga'),
							'rencana_usaha'=>jarvis_post('rencana_usaha'),
							'username'=>jarvis_post('username'),
							'password'=>jarvis_post('password'),
							'nama_usaha'=>jarvis_post('nama_usaha'),
							'jenis_bh'=>jarvis_post('jenis_bh'),
							'bidang_usaha'=>jarvis_post('bidang_usaha'),
							'no_iumkm'=>jarvis_post('no_iumkm'),
							'no_npwp'=>jarvis_post('no_npwp'),
							'total_karyawan'=>jarvis_post('total_karyawan'),
							'tikor_latlon'=>jarvis_post('tikor_latlon')
						);
						jarvis_process_block($this->changeParams[1],$this->table['trans_kegiatan_peserta'],$data_insert,$sessionID);
						redirect('peserta/'.$year.'/'.$propinsi.'/'.$kegiatan);
					}
				}elseif($subPage=='edit'){
					$dataID=jarvis_decode(uri_segment(5));
					$result = jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan_peserta'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$dataID));
					$data['key_action'] = 'edit';
					$data['dataPesertaEdit'] = $result;
					if($result['results']==1){
						$this->form_validation->set_rules('nik', 'NIK / No.KTP', 'trim|required|xss_clean');
						$this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required|xss_clean');
						$this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'trim|xss_clean');
						$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|xss_clean');
						$this->form_validation->set_rules('usia', 'Usia Peserta', 'trim|xss_clean');
						$this->form_validation->set_rules('rentang_usia', 'Rentang Usia Peserta', 'trim|xss_clean');
						$this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'trim|xss_clean');
						$this->form_validation->set_rules('agama', 'Agama', 'trim|xss_clean');
						$this->form_validation->set_rules('alamat', 'Alamat Peserta', 'trim|xss_clean');
						$this->form_validation->set_rules('hp_telp', 'HP / Telp', 'trim|xss_clean');
						$this->form_validation->set_rules('email_fax', 'Email / No.Fax', 'trim|xss_clean');
						$this->form_validation->set_rules('lembaga', 'Asal Lembaga', 'trim|xss_clean');
						$this->form_validation->set_rules('rencana_usaha', 'Rencana Usaha', 'trim|xss_clean');
						$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
						$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
						$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|xss_clean');
						$this->form_validation->set_rules('jenis_bh', 'Jenis Bidang.H', 'trim|xss_clean');
						$this->form_validation->set_rules('bidang_usaha', 'Bidang Usaha', 'trim|xss_clean');
						$this->form_validation->set_rules('no_iumkm', 'Nomor IUMKM', 'trim|xss_clean');
						$this->form_validation->set_rules('no_npwp', 'Nomor NPWP', 'trim|xss_clean');
						$this->form_validation->set_rules('total_karyawan', 'Karyawan', 'trim|xss_clean');
						$this->form_validation->set_rules('tikor_latlon', 'Titik Koordinat Lokasi', 'trim|xss_clean');
						if($this->form_validation->run() == FALSE){	
							jarvis_load_view('annual_report/pesertaForm',$data);
						}else{
							$data_update = array(
								'nik'=>jarvis_post('nik'),
								'nama'=>jarvis_post('nama'),
								'ttl'=>jarvis_post('ttl'),
								'jk'=>jarvis_post('jk'),
								'usia'=>jarvis_post('usia'),
								'rentang_usia'=>jarvis_post('rentang_usia'),
								'pendidikan'=>jarvis_post('pendidikan'),
								'agama'=>jarvis_post('agama'),
								'alamat'=>jarvis_post('alamat'),
								'hp_telp'=>jarvis_post('hp_telp'),
								'email_fax'=>jarvis_post('email_fax'),
								'lembaga'=>jarvis_post('lembaga'),
								'rencana_usaha'=>jarvis_post('rencana_usaha'),
								'username'=>jarvis_post('username'),
								'password'=>jarvis_post('password'),
								'nama_usaha'=>jarvis_post('nama_usaha'),
								'jenis_bh'=>jarvis_post('jenis_bh'),
								'bidang_usaha'=>jarvis_post('bidang_usaha'),
								'no_iumkm'=>jarvis_post('no_iumkm'),
								'no_npwp'=>jarvis_post('no_npwp'),
								'total_karyawan'=>jarvis_post('total_karyawan'),
								'tikor_latlon'=>jarvis_post('tikor_latlon')								
							);
							jarvis_process_block($this->changeParams[2],$this->table['trans_kegiatan_peserta'],$data_update,$sessionID,$this->pk['id'],$dataID);
							redirect('peserta/'.$year.'/'.$propinsi.'/'.$kegiatan);
						}
					}else{
						jarvis_load_view('404/page');
					}
				}elseif($subPage=='detail'){
					$dataID=jarvis_decode(uri_segment(5));
					$result = jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan_peserta'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$dataID));
					$data['key_action'] = 'detail';
					$data['dataPesertaDetail'] = $result;
					if($result['results']==1){
						jarvis_load_view('annual_report/pesertaForm',$data);
					}else{
						jarvis_load_view('404/page');
					}
				}elseif($subPage=='import'){
					$data['key_action']='add';
					$data['errorExcel']='';
					if($dataID){
						/*START UPLOAD EXCEL*/
							$config['upload_path'] = jarvis_call_configuration('savedExcel');
							$config['allowed_types'] = jarvis_call_configuration('allowedTypeExcel');
							$config['file_name'] = jarvis_call_configuration('defaultNameExcel').time();
							$this->upload->initialize($config);			
						/*END UPLOAD EXCEL*/
						if(!$this->upload->do_upload('excel_input')){
							$data['errorExcel']=$this->upload->display_errors('<div class="alert alert-danger alert-dismissable" style="margin-top:3px;"><i class="fa fa-ban"></i>','</div>');
							jarvis_load_view('annual_report/import',$data);
						}else{
							if($getKegiatan['results']==1){
								$excelData=$this->upload->data();
								$dataFile = array(
									"kegiatan_id"=>$kegiatanDec,
									'file'=>$excelData['file_name']
								);
								$insertFile=jarvis_process_block($this->changeParams[1],$this->table['trans_kegiatan_peserta_excel'],$dataFile,$sessionID);					
								
								/*START READ EXCEL FILE*/
								$excelFileName=jarvis_call_configuration('savedExcel').$excelData['file_name'];
								$inputFileType = PHPExcel_IOFactory::load($excelFileName);
								/*END READ EXCEL FILE*/
								
								/*START GET WORKSHEET DIMENSIONS*/
								$sheet = $inputFileType->getSheet(0);
								$highestRow = $sheet->getHighestRow();
								$highestColumn = $sheet->getHighestColumn();
								/*END GET WORKSHEET DIMENSIONS*/
								
								//	Loop through each row of the worksheet in turn
								for ($row = 2; $row <= $highestRow; $row++) { 
									//  Read a row of data into an array                 
									$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
									if($rowData[0][12]!=null){
										$dataExcel=array(
											"kegiatan_id"=>$kegiatanDec,
											"nik"=>$rowData[0][13],
											"nama"=>$rowData[0][12],
											"ttl"=>$rowData[0][14],
											"jk"=>$rowData[0][15],
											"usia"=>$rowData[0][16],
											"rentang_usia"=>$rowData[0][17],
											"pendidikan"=>$rowData[0][18],
											"agama"=>$rowData[0][19],
											"alamat"=>$rowData[0][21],
											"hp_telp"=>$rowData[0][22],
											"email_fax"=>$rowData[0][23],
											"lembaga"=>$rowData[0][20],
											"rencana_usaha"=>$rowData[0][24]
										);
										$insertFileData=jarvis_process_block($this->changeParams[1],$this->table['trans_kegiatan_peserta'],$dataExcel,$sessionID);
									}
								}
								redirect('peserta/'.$year.'/'.$propinsi.'/'.$kegiatan);
							}else{
								jarvis_load_view('annual_report/import',$data);
							}
						}
					}else{
						jarvis_load_view('annual_report/import',$data);
					}
				}elseif($subPage=='export'){
					if($getKegiatan['results']==1){
						$this->excel->setActiveSheetIndex(0);
						$styleHorCent = array(
							'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
							)
						);
						$styleHorRight = array(
							'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
							)
						);
						$styleHorLeft = array(
							'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
							)
						);
						$styleVerCent = array(
							'alignment' => array(
								'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
							)
						);
						$styleBorder = array(
							'borders' => array(
								'allborders' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN
								)
							)
						);
						// NAME THE WORKSHEET
						$this->excel->getActiveSheet()->setTitle('Laporan Data Peserta');
						// HEADER
						$this->excel->getActiveSheet()->setCellValue('A1', 'Kegiatan');
						$this->excel->getActiveSheet()->setCellValue('A2', 'Propinsi');
						$this->excel->getActiveSheet()->setCellValue('A3', 'Tahun');
						$this->excel->getActiveSheet()->setCellValue('B1', jarvis_echo($getKegiatan,'nama'));
						$this->excel->getActiveSheet()->mergeCells("B1:F1");
						$this->excel->getActiveSheet()->setCellValue('B2', jarvis_echo($getPropinsi,'parameter'));
						$this->excel->getActiveSheet()->mergeCells("B2:F2");
						$this->excel->getActiveSheet()->setCellValue('B3', $year);
						$this->excel->getActiveSheet()->getStyle("B3")->applyFromArray($styleHorLeft);
						$this->excel->getActiveSheet()->mergeCells("B3:F3");
						
						$this->excel->getActiveSheet()->setCellValue('A5', 'No');
						$this->excel->getActiveSheet()->setCellValue('B5', 'NIK/KTP');
						$this->excel->getActiveSheet()->setCellValue('C5', 'Nama');
						$this->excel->getActiveSheet()->setCellValue('D5', 'Tempat/Tgl Lahir');
						$this->excel->getActiveSheet()->setCellValue('E5', 'Umur');
						$this->excel->getActiveSheet()->setCellValue('F5', 'Interval Umur');
						$this->excel->getActiveSheet()->setCellValue('G5', 'Jenis Kelamin');
						$this->excel->getActiveSheet()->setCellValue('H5', 'Pendidikan Terakhir');
						$this->excel->getActiveSheet()->setCellValue('I5', 'Agama');
						$this->excel->getActiveSheet()->setCellValue('J5', 'Alamat');
						$this->excel->getActiveSheet()->setCellValue('K5', 'Email/Fax');
						$this->excel->getActiveSheet()->setCellValue('L5', 'Asal Lembaga');
						$this->excel->getActiveSheet()->setCellValue('M5', 'Telepon');
						$this->excel->getActiveSheet()->setCellValue('N5', 'Rencana Usaha');
						$this->excel->getActiveSheet()->getStyle("A5:N5")->applyFromArray($styleHorCent);
						// HEADER FONT SIZE
						$this->excel->getActiveSheet()->getStyle('A1:G3')->getFont()->setSize(12);
						$this->excel->getActiveSheet()->getStyle('A5:N5')->getFont()->setSize(11);
						// HEADER FONT COLOR
						$this->excel->getActiveSheet()->getStyle('A1:G3')->getFont()->setBold(true);
						$this->excel->getActiveSheet()->getStyle('A5:N5')->getFont()->setBold(true);
						// CONTENT
						$x=5;
						$no=0;
						$session_peserta = $this->session->userdata('sess_data_peserta');
						if($session_peserta['query']!=''){
							$dataPeserta = jarvis_query_block($session_peserta['query']);
						}
						foreach($dataPeserta->result_array() as $item){
							$x++;
							$no++;
							$this->excel->getActiveSheet()->setCellValue('A'.$x, $no);
							$this->excel->getActiveSheet()->setCellValue('B'.$x, $item['nik']);
							$this->excel->getActiveSheet()->setCellValue('C'.$x, $item['nama']);
							$this->excel->getActiveSheet()->setCellValue('D'.$x, $item['ttl']);
							$this->excel->getActiveSheet()->setCellValue('E'.$x, $item['usia']);
							$this->excel->getActiveSheet()->setCellValue('F'.$x, $item['rentang_usia']);
							$this->excel->getActiveSheet()->setCellValue('G'.$x, $item['jk']);
							$this->excel->getActiveSheet()->setCellValue('H'.$x, $item['pendidikan']);
							$this->excel->getActiveSheet()->setCellValue('I'.$x, $item['agama']);
							$this->excel->getActiveSheet()->setCellValue('J'.$x, $item['alamat']);
							$this->excel->getActiveSheet()->setCellValue('K'.$x, $item['email_fax']);
							$this->excel->getActiveSheet()->setCellValue('L'.$x, $item['lembaga']);
							$this->excel->getActiveSheet()->setCellValue('M'.$x, $item['hp_telp']);
							$this->excel->getActiveSheet()->setCellValue('N'.$x, $item['rencana_usaha']);
							$this->excel->getActiveSheet()->getStyle("A5:N".$x)->applyFromArray($styleBorder);
						}
						$filename='Laporan '.jarvis_echo($getPropinsi,'parameter').' '.jarvis_echo($getKegiatan,'nama').' '.$year.'.xls';
						header('Content-Type: application/vnd.ms-excel');
						header('Content-Disposition: attachment;filename="'.$filename.'"');
						header('Cache-Control: max-age=0');
									
						$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
						//force user to download the Excel file without writing it to server's HD
						$objWriter->save('php://output');
					}else{
						jarvis_load_view('404/page');
					}
				}
			}
			jarvis_load_view('footer',$data);
		}elseif($session_data and $session_data['on_screen']=='no'){
			redirect('lock_screen', 'refresh');
		}else{
			redirect('login', 'refresh');
		}
	}
	function chart_report($chart='',$year='',$propinsi=''){
		$propinsiDec=jarvis_decode($propinsi);
		if($chart=='rentang_usia'){
			$dataSummaryRU=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_propinsi_rentang_usia'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'prop_id'=>$propinsiDec));
			$rentangUsia=jarvis_call_parameter('pil_usia');
			$dataChecked=array();
			foreach($rentangUsia['data'] as $ru) {
				foreach($dataSummaryRU['data'] as $dsu) { 
					$dataChecked[$dsu['rentang_usia']]=(isset($dsu['rentang_usia']) ? $dsu['jumlah'] : 0);
				}
				$ruc[]=array('y'=>$ru['parameter'],'a'=>(isset($dataChecked[$ru['parameter']]) ? $dataChecked[$ru['parameter']] : 0 ));
			}
			echo json_encode($ruc);
		}elseif($chart=='pendidikan'){
			$dataSummaryPendidikan=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_propinsi_pendidikan'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'prop_id'=>$propinsiDec));
			$pendidikan=jarvis_call_parameter('pil_pendidikan');
			$dataPend=array();
			foreach($pendidikan['data'] as $pend) {
				foreach($dataSummaryPendidikan['data'] as $dsp) { 
					$dataChecked[$dsp['pendidikan']]=(isset($dsp['pendidikan']) ? $dsp['jumlah'] : 0);
				}
				$pc[]=array('y'=>$pend['parameter'],'a'=>(isset($dataChecked[$pend['parameter']]) ? $dataChecked[$pend['parameter']] : 0 ));
			}
			echo json_encode($pc);
		}
	}
}

/* End of file annual_report.php */
/* Location: ./application/controllers/annual_report.php */
