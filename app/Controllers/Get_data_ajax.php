<?php

namespace App\Controllers;

use App\Models\Ajax_models;
use CodeIgniter\Controllers;


class Get_data_ajax extends BaseController
{
	
	public function index($proc) //หน้าหลัก
	{ 
		
  	}

    public function get_amphures() 
	{
		$id = $this ->request->getvar('ID_PROVINCE'); //รับค่าที่โยนมา
        $Start_models = new Ajax_models();
 		$data = $Start_models -> get_amphures_model($id); 
        return json_encode($data);
    }

	public function get_districts()
	{
		$id = $this ->request->getvar('ID_AMPHURES'); //รับค่าที่โยนมา
        $Start_models = new Ajax_models();
 		$data = $Start_models -> get_districts_model($id); 
        return json_encode($data);
    }

	public function get_zipcode()
	{
		$id = $this ->request->getvar('ID_DISTRICT'); //รับค่าที่โยนมา
        $Start_models = new Ajax_models();
		$data = $Start_models -> get_zipcode_model($id); 
        echo $data;
    }
}

?>