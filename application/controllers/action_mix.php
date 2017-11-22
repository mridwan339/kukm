<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action_mix extends CI_Controller { 
	function __construct(){
		parent::__construct();
	}
	function delete_all(){
		$session_data = $this->session->userdata('logged_in');
		$sessionID=$session_data['id'];
		if($session_data and $session_data['on_screen']=='yes'){
			$tabel=$this->input->post('tabelDef');
			$pk=$this->input->post('pk');
			$checkedStr=$this->input->post('checkedVal');
			$imageString=$this->input->post('image');
			$cStr=explode(',',$checkedStr);
			foreach($cStr as $str){
				if($imageString=='true'){
					$getPdfs = jarvis_get_data($pk,$tabel,$pk,'asc','',array($pk=>jarvis_decode($str)));
					foreach($getPdfs['data'] as $pdfDat){
						delete_template_file($pdfDat['file']);
						jarvis_process_block('DELETE',$tabel,'',$sessionID,$pk,jarvis_decode($str));
					}
				}else{
					jarvis_process_block('DELETE',$tabel,'',$sessionID,$pk,jarvis_decode($str));
				}
			}
			echo json_encode(array("success"=>"true","message"=>"Delete data success"));
		}else{
			echo json_encode(array("success"=>"false","message"=>"You have not access this command"));
		}
	}
}
