<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BloodModel;
class Blood extends ResourceController
{
    use ResponseTrait;
    //Get All Product

    public function index()
    {
        $bloodModel=new BloodModel();
        $result=$bloodModel->get_users();
        if(!empty($result))
        {
            $data['result']=$result;
        return $this->respond($data,200);
        }
    }

    // Add New Record
    public function create()
    {
        $bloodModel=new BloodModel();
        $data['username']=$this->request->getVar('username');
        $data['mobile']=$this->request->getVar('mobile');
        $data['blood_group']=$this->request->getVar('blood_group');
        $data['status']=1;
        $bloodModel->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    // Get Single Record
    public function show($id=null)
    {
        $bloodModel=new BloodModel();
        $data=$bloodModel->getWhere(['id' => $id])->getResult();
        if($data)
        {
            return $this->respond($data);
        }
        else
        {
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    //Update Record
    public function update($id = null)
    {
        $bloodModel=new BloodModel();
        $data['username']=$this->request->getVar('username');
        $data['mobile']=$this->request->getVar('mobile');
        $data['blood_group']=$this->request->getVar('blood_group');
        $data['status']=1;
        if($bloodModel->update($id,$data))
        {
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respondCreated($response);
    }
    else
    {
        return $this->failNotFound('No Data Found with id '.$id);

    }
    } 
    // Remove Record
    public function delete($id = null)
    {
        $bloodModel=new BloodModel();
        $data=$bloodModel->find($id);
        if($data)
        {
        $bloodModel->delete($id);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Deleted'
            ]
        ];
        return $this->respondCreated($response);
    }
    else
    {
        return $this->failNotFound('No Data Found with id '.$id);

    }
    } 
}
