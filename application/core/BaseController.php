<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(APPPATH.'libraries/REST_Controller.php');

class BaseController extends REST_Controller{
    public function responseWithOperation($instance, $operation) {
        try {
            //Encode the entities returned
            echo json_encode($operation($instance));
        } catch (Exception $ex) {
            $error = array(
                "code" => 1,
                "message" => "Error " . $ex . ""
            );
            echo json_encode($error);
        }
    }
    
    public function index_get() {
        $params = $this->input->get();
        $modelName = get_class($this). "_model";
        
        $this->load->model($modelName);
        $this->$modelName->get($params);
    }
    
    public function index_update() {
        $id = $this->input->get("id");
        
        $object = $this->input->put();
        $modelName = get_class($this). "_model";
        
        $this->load->model($modelName);
        $this->$modelName->update($id,$object);
    }
    
    public function index_delete() {
        $id = $this->input->get("id");
        
        $modelName = get_class($this). "_model";
        
        $this->load->model($modelName);
        $this->$modelName->delete($id);
    }
}
