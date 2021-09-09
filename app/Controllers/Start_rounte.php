<?php

namespace App\Controllers;

use App\Models\Start_models;
use CodeIgniter\Controllers;


class Start_rounte extends BaseController
{
	
	public function index() //หน้าหลัก
	{
		$Start_models = new Start_models();
		$data["data"] = $Start_models -> get_data();
		echo view('header');
		echo view('pages/index',$data);
		echo view('footer');
  	}

    public function pages($pages)
	{
		$Start_models = new Start_models();
		$data["data"]["provinces"] = $Start_models -> get_provinces(); 
		if($pages == "add")
		{ 
			echo view('header');
			echo view("pages/".$pages,$data);
			echo view('footer');
		}
		else if($pages == "edit")
		{

		}
	}

	public function add()
	{
		$Start_models = new Start_models();
		$data = [
			"PREFIX_NAME" => $this->request->getVar("PREFIX_NAME"),
			"FIRST_NAME" => $this->request->getVar("FIRST_NAME"),
			"LAST_NAME" => $this->request->getVar("LAST_NAME"),
			"NICK_NAME" => $this->request->getVar("NICK_NAME"),
			"BIRTH_DATE" => $this->request->getVar("BIRTH_DATE"),
			"NUMBER_PHONE" => $this->request->getVar("NUMBER_PHONE"),
			"E_MAIL" => $this->request->getVar("E_MAIL"),
			"WEIGHT" => $this->request->getVar("WEIGHT"),
			"HEIGHT" => $this->request->getVar("HEIGHT"),
			"HOUSE_NUMBER" => $this->request->getVar("HOUSE_NUMBER"),
			"MOO" => $this->request->getVar("MOO"),
			"ALLEY" => $this->request->getVar("ALLEY"),
			"ROAD" => $this->request->getVar("ROAD"),
			"ID_DISTRICT" => $this->request->getVar("ID_DISTRICT"),
			"ID_COUNTY" => $this->request->getVar("ID_COUNTY"),
			"ID_PROVINCE" => $this->request->getVar("ID_PROVINCE"),
			"POSTAL_CODE" => $this->request->getVar("POSTAL_CODE"),
		];
		$Start_models->insert($data);
		return $this->response->redirect(site_url("index"));
	}

	public function get_data_update($id = null)
	{
		$Start_models = new Start_models();
		$data['data'] = $Start_models -> where("USER_ID",$id)->first();
		return view('/add_data',$data);
	}

	public function update($id = null)
	{
		$Start_models = new Start_models();
		$id = $this->request->getVar("USER_ID");
		$data = [
			"PREFIX_NAME" => $this->request->getVar("PREFIX_NAME"),
			"FIRST_NAME" => $this->request->getVar("FIRST_NAME"),
			"LAST_NAME" => $this->request->getVar("LAST_NAME"),
			"NICK_NAME" => $this->request->getVar("NICK_NAME"),
			"BIRTH_DATE" => $this->request->getVar("BIRTH_DATE"),
			"NUMBER_PHONE" => $this->request->getVar("NUMBER_PHONE"),
			"E_MAIL" => $this->request->getVar("E_MAIL"),
			"WEIGHT" => $this->request->getVar("WEIGHT"),
			"HEIGHT" => $this->request->getVar("HEIGHT"),
			"HOUSE_NUMBER" => $this->request->getVar("HOUSE_NUMBER"),
			"MOO" => $this->request->getVar("MOO"),
			"ALLEY" => $this->request->getVar("ALLEY"),
			"ROAD" => $this->request->getVar("ROAD"),
			"ID_DISTRICT" => $this->request->getVar("ID_DISTRICT"),
			"ID_COUNTY" => $this->request->getVar("ID_COUNTY"),
			"ID_PROVINCE" => $this->request->getVar("ID_PROVINCE"),
			"POSTAL_CODE" => $this->request->getVar("POSTAL_CODE"),
		];
		$Start_models->update($id,$data);
		return $this->response->redirect(site_url("index"));
	}

	public function delete($id = null)
	{
		$Start_models = new Start_models();
		$data['data'] = $Start_models -> where("USER_ID",$id)->delete($id);
		return view('/add_data',$data);
	}
}
?>