<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BloodModel;
class Blood extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $bloodModel=new BloodModel();
        $result=$bloodModel->get_users();
        if(!empty($result))
        {
            $data['result']=$result;
        return $this->respond($data);
        }
    }
}
