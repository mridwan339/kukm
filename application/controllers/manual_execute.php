<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manual_execute extends CI_Controller { 
	function __construct()
	{
		parent::__construct();
	}
	function tanggal_ina(){
		echo jarvis_convert_field('03/09/2015','D');
	}
	function testing(){
		$a=jarvis_encode(json_encode(array('type'=>'delete','params'=>1)));
		$b=jarvis_decode($a);
		$c=json_decode($b,true);
		//echo $a."<br>";
		//echo $c['params'];
		//$d=$this->urlcrypt->encode('1');
		//$e=$this->urlcrypt->decode($d);
		//echo "<br>".$d;
		//echo "<br>".$e;
		//echo jarvis_permission('action','User',jarvis_encode(1));
		$x=explode('.','ASP.070556.00001');
		$i=0;
		foreach($x as $y){
			$i++;
			if($i>1){
				$z[]=$y;
			}
		}
		echo implode('.',$z);
		//$data['serCode']=$x[0];
		//$data['serNo']=$x[1];
	}
	function import(){
		/*START READ EXCEL FILE*/
		$excelFileName=jarvis_call_configuration('savedExcel').'jarvis-xls20150906.xlsx';		
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
			$dataExcel=array(
				"nama"=>$rowData[0][0],
				"tp_lahir"=>$rowData[0][1],
				"tg_lahir"=>$rowData[0][2],
				"tingkat"=>$rowData[0][3],
				"jabatan"=>$rowData[0][4],
				"wilop"=>$rowData[0][5],
				"lokasi"=>$rowData[0][6],
				"unit"=>$rowData[0][7],
				"ser_no"=>$rowData[0][8],
				"tg_berlaku"=>$rowData[0][9],
				"tg_berakhir"=>$rowData[0][10],
				"status_kartu"=>'BARU',
				"status_data_id"=>'58'
			);
			echo json_encode($dataExcel);
			//$insertFileData=jarvis_process_block($this->changeParams[1],$this->table['wm_excel_data'],$dataExcel,$sessionID);
		}
		
	}
}
