<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Export extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('export_model');
	}

	//export xlsx|xls file
	public function index()
	{
		$data['title'] = 'Display feedback data';
		$data['feedbackinfo'] = $this->export_model->feedbacklist();

		//load view file for output
		$this->load->view('users/feedbacklist',$data);
	}

	//create xlsx

	public function createXLS()
	{
		//create filename
		// $filename = 'feedbackdata-'. time(), '.xls';
		$filename = 'feedbackdata'.'.xls';

		$this->load->library("PHPExcel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Name","Email","Feedback");

		$column = 0;

		foreach ($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);
			$column++;
		}

		$feedbackinfo = $this->export_model->feedbacklist();

		$excel_row = 2;

		foreach ($feedbackinfo as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->email);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->feedback);
			$excel_row++;
		}

		// $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
		// // header('Content-Type: application/vnd.ms-excel');
		// //header('Content-Disposition: attachment;filename="feedbackData.xls"');
		// $object_writer->save('php://output');
		$objectWriter = new PHPExcel_Writer_Excel2007($object,'Excel5');

		$objectWriter->save($filename);

		header("Content-Type: application/vnd.ms-excel");
		redirect(site_url().$filename);


	}
}
?>
