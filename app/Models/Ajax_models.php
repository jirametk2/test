<?php

namespace App\Models;

use CodeIgniter\Model;
//อย่าลืม start xampp
class Ajax_models extends Model
{
    public function get_amphures_model($id)
    {
        $db  = \Config\Database::connect();
        $tb_amphures = $db->table('amphures');
        $query = $tb_amphures->where("PROVINCE_ID",$id)->orderby("AMPHURE_NAME_TH ASC")->get();
        $rec = $query->getResult(); 
        $data = array();
        foreach($rec as $key): 
            $data[$key->ID_AMPHURE] =  $key->AMPHURE_NAME_TH;
        endforeach;
        return $data;
    } 


    public function get_districts_model($id)
    {
        $db  = \Config\Database::connect();
        $tb_districts = $db->table('districts');
        $query = $tb_districts->where("AMPHURE_ID",$id)->orderby("DISTRICTS_NAME_TH ASC")->get();
        $rec = $query->getResult(); 
        $data = array();
        foreach($rec as $key): 
            $data[$key->ID_DISTRICT] =  $key->DISTRICTS_NAME_TH;
        endforeach;
        return $data;
    } 

    public function get_zipcode_model($id)
    {
        $db  = \Config\Database::connect();
        $tb_districts = $db->table('districts');
        $query = $tb_districts->where("ID_DISTRICT",$id)->get();
        $rec = $query->getResult(); 
        foreach($rec as $key): 
            $data =  $key->ZIPCODE;
        endforeach;
        return $data;
    } 

    
}

?>