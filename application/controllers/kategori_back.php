<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori extends CI_Controller {
	
	private $table=array('css'=>'jarvis_autoload_css','js'=>'jarvis_autoload_js','config'=>'configuration','jarvis_parameter'=>'jarvis_parameter','trans_kegiatan'=>'trans_kegiatan','trans_kegiatan_peserta'=>'trans_kegiatan_peserta','trans_kegiatan_peserta_excel'=>'trans_kegiatan_peserta_excel');
	private $view=array('jarvis_vw_user'=>'jarvis_vw_user','trans_vw_kegiatan'=>'trans_vw_kegiatan','trans_vw_kegiatan_peserta'=>'trans_vw_kegiatan_peserta','report_vw_skala_nasional'=>'report_vw_skala_nasional','report_vw_skala_nasional_gender2'=>'report_vw_skala_nasional_gender2','report_vw_skala_kategori'=>'report_vw_skala_kategori','report_vw_skala_kategori_gender2'=>'report_vw_skala_kategori_gender2','report_vw_skala_kategori_rentang_usia'=>'report_vw_skala_kategori_rentang_usia','report_vw_skala_kategori_pendidikan'=>'report_vw_skala_kategori_pendidikan');
	private $fieldOrder=array('id'=>'id','order_hint'=>'order_hint','tahun'=>'tahun');
	private $fieldOrderType=array('asc'=>'asc','desc'=>'desc');
	private $searchField=array('filename'=>'filename','username'=>'username','text'=>'text','parameter'=>'parameter','nama'=>'nama','file'=>'file','tahun'=>'tahun');
	private $changeParams=array('1'=>'INSERT','2'=>'UPDATE','3'=>'DELETE','4'=>'LOGIN','5'=>'LOGOUT');
	private $pk=array('id'=>'id');
	
	function __construct(){
		parent::__construct();
	}
	public function tahun(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data and $session_data['on_screen']=='yes'){
			$sessionID=$session_data['id'];
			jarvis_check_activity($sessionID);
			$data['css'] = jarvis_call_css_js($this->searchField['filename'],$this->table['css'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'dashboard','active'=>'true'));
			$data['js'] = jarvis_call_css_js($this->searchField['filename'],$this->table['js'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'dashboard','active'=>'true'));
			$data['page_title'] = 'Dashboard';
			$data['html_class'] = '';
			$data['userData'] = $session_data;
						
			/*START SIDEBAR MENU*/
			$params_sidebar=array('ref_group_user'=>$session_data['ref_group_user']);
			$data['sidebar']=jarvis_sidebar('jarvis_vw_menu','order_hint','asc',$params_sidebar);
			/*END SIDEBAR MENU*/	
			
			/*START LAYOUT SETTING*/	
			$params_layout=array('id'=>$sessionID);
			$data['layout']=jarvis_layout_setting($this->searchField['username'],$this->view['jarvis_vw_user'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],$params_layout);
			/*END LAYOUT SETTING*/	
			
			jarvis_load_view('header',$data);
			jarvis_load_view('navigation',$data);
			jarvis_load_view('sidebar',$data);
			jarvis_load_view('kategori/page',$data);
			jarvis_load_view('footer',$data);
		}elseif($session_data and $session_data['on_screen']=='no'){
			redirect('lock_screen', 'refresh');
		}else{
			redirect('login', 'refresh');
		}
	}
	public function lihat_kategori($year=''){
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
			
			/*START KATEGORI DATA*/
			$data['dataKategori']=jarvis_get_data($this->searchField['parameter'],$this->table['jarvis_parameter'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('category_parameter'=>'kategori_kegiatan'));
			/*END KATEGORI DATA*/
			
			/*START SKALA NASIONAL SUMMARY DATA*/
			$data['dataSummary']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_nasional'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year));
			/*END SKALA NASIONAL SUMMARY DATA*/
			
			/*START SKALA NASIONAL SUMMARY GENDER DATA*/
			$data['dataSummaryGender']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_nasional_gender2'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year));
			/*END SKALA NASIONAL SUMMARY GENDER DATA*/
			
			jarvis_load_view('header',$data);
			jarvis_load_view('navigation',$data);
			jarvis_load_view('sidebar',$data);
			jarvis_load_view('kategori/kategori',$data);
			jarvis_load_view('footer',$data);
		}elseif($session_data and $session_data['on_screen']=='no'){
			redirect('lock_screen', 'refresh');
		}else{
			redirect('login', 'refresh');
		}
	}
	public function kegiatan($year='',$kategori='',$subPage='',$dataID=''){
		$session_data = $this->session->userdata('logged_in');
		if($session_data and $session_data['on_screen']=='yes'){
			$sessionID=$session_data['id'];
			$kategoriDec=jarvis_decode($kategori);
			$getKategori=jarvis_get_data($this->searchField['parameter'],$this->table['jarvis_parameter'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$kategoriDec));
			jarvis_check_activity($sessionID);
			$data['css'] = jarvis_call_css_js($this->searchField['filename'],$this->table['css'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['js'] = jarvis_call_css_js($this->searchField['filename'],$this->table['js'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['page_title'] = jarvis_echo($getKategori,'parameter').' '.$year;
			$data['html_class'] = '';
			$data['permission']='Kegiatan';
			$data['userData'] = $session_data;
			$data['year'] = $year;
			$data['kategori'] = jarvis_echo($getKategori,'parameter');
						
			/*START SIDEBAR MENU*/
			$params_sidebar=array('ref_group_user'=>$session_data['ref_group_user']);
			$data['sidebar']=jarvis_sidebar('jarvis_vw_menu','order_hint','asc',$params_sidebar);
			/*END SIDEBAR MENU*/	
			
			/*START LAYOUT SETTING*/	
			$params_layout=array('id'=>$sessionID);
			$data['layout']=jarvis_layout_setting($this->searchField['username'],$this->view['jarvis_vw_user'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],$params_layout);
			/*END LAYOUT SETTING*/	
			
			/*START KEGIATAN DATA*/
			$data['dataKegiatan']=jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan'],$this->fieldOrder['id'],$this->fieldOrderType['desc'],'',array('tahun'=>$year,'cat_id'=>$kategoriDec));
			/*END KEGIATAN DATA*/
			
			/*START SKALA KATEGORI SUMMARY DATA*/
			$data['dataSummary']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_kategori'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'cat_id'=>$kategoriDec));
			/*END SKALA NASIONAL SUMMARY DATA*/
			
			/*START SKALA KATEGORI SUMMARY GENDER DATA*/
			$data['dataSummaryGender']=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_kategori_gender2'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'cat_id'=>$kategoriDec));
			/*END SKALA NASIONAL SUMMARY GENDER DATA*/
			
			jarvis_load_view('header',$data);
			jarvis_load_view('navigation',$data);
			jarvis_load_view('sidebar',$data);
			jarvis_load_view('kategori/kegiatan',$data);
			jarvis_load_view('footer',$data);
		}elseif($session_data and $session_data['on_screen']=='no'){
			redirect('lock_screen', 'refresh');
		}else{
			redirect('login', 'refresh');
		}
	}
	public function peserta($year='',$kategori='',$kegiatan='',$subPage='',$dataID=''){
		$session_data = $this->session->userdata('logged_in');
		if($session_data and $session_data['on_screen']=='yes'){
			$sessionID=$session_data['id'];
			$kategoriDec=jarvis_decode($kategori);
			$kegiatanDec=jarvis_decode($kegiatan);
			$getKategori=jarvis_get_data($this->searchField['parameter'],$this->table['jarvis_parameter'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$kategoriDec));
			$getKegiatan=jarvis_get_data($this->searchField['nama'],$this->table['trans_kegiatan'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$kegiatanDec));
			jarvis_check_activity($sessionID);
			$data['css'] = jarvis_call_css_js($this->searchField['filename'],$this->table['css'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['js'] = jarvis_call_css_js($this->searchField['filename'],$this->table['js'],$this->fieldOrder['order_hint'],$this->fieldOrderType['asc'],array('menu'=>'employee','active'=>'true'));
			$data['page_title'] = jarvis_echo($getKategori,'parameter').' '.$year;
			$data['html_class'] = '';
			$data['permission']='Peserta';
			$data['userData'] = $session_data;
			$data['year'] = $year;
			$data['kategori'] = jarvis_echo($getKategori,'parameter');
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
				jarvis_load_view('kategori/peserta',$data);
			}else{
				if($subPage=='detail'){
					$dataID=jarvis_decode(uri_segment(5));
					$result = jarvis_get_data($this->searchField['nama'],$this->view['trans_vw_kegiatan_peserta'],$this->fieldOrder['id'],$this->fieldOrderType['asc'],'',array('id'=>$dataID));
					$data['key_action'] = 'detail';
					$data['dataPesertaDetail'] = $result;
					if($result['results']==1){
						jarvis_load_view('kategori/pesertaForm',$data);
					}else{
						jarvis_load_view('404/page');
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
						$this->excel->getActiveSheet()->setCellValue('A2', 'Kategori');
						$this->excel->getActiveSheet()->setCellValue('A3', 'Tahun');
						$this->excel->getActiveSheet()->setCellValue('B1', jarvis_echo($getKegiatan,'nama'));
						$this->excel->getActiveSheet()->mergeCells("B1:F1");
						$this->excel->getActiveSheet()->setCellValue('B2', jarvis_echo($getKategori,'parameter'));
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
						$filename='Laporan '.jarvis_echo($getKategori,'parameter').' '.$year.'.xls';
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
	function chart_report($chart='',$year='',$kategori=''){
		$kategoriDec=jarvis_decode($kategori);
		if($chart=='rentang_usia'){
			$dataSummaryRU=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_kategori_rentang_usia'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'cat_id'=>$kategoriDec));
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
			$dataSummaryPendidikan=jarvis_get_data($this->searchField['tahun'],$this->view['report_vw_skala_kategori_pendidikan'],$this->fieldOrder['tahun'],$this->fieldOrderType['asc'],'',array('tahun'=>$year,'cat_id'=>$kategoriDec));
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

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */
