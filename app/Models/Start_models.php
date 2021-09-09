<?php

namespace App\Models;

use CodeIgniter\Model;
//อย่าลืม start xampp
class Start_models extends Model
{
    protected $table = 'profile_applicant';
    
    
     

    public function get_data($filter = null)
    {   
        return $this ->findAll(); //ข้อมูลทั้งหมด
    }
 
    public function get_provinces()
    {
        $db  = \Config\Database::connect();
        $tb_provinces = $db->table('provinces');
        $query = $tb_provinces->orderby("PROVINCE_NAME_TH ASC")->get();
        $rec = $query->getResult(); 
        $data = array();
        foreach($rec as $key): 
            $data[$key->ID_PROVINCE] =  $key->PROVINCE_NAME_TH;
        endforeach;
        return $data;
    } 
}

?>