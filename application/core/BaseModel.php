<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseModel extends CI_Model{
    
    public function create($object) {
        $this->db->insert(get_class($this), $object);
        return $object;
    }
    
    public function get($params) {
        $this->db->select("*")->from(get_class($this));
        foreach ($params as $key => $val) {
            $this->db->where($key, $val);
        }
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function update($id, $object) {
        $this->db->where("id", $id);
        $this->db->update(get_class($this), $object);
        return $object;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete(get_class($this)); 
        return $id;
    }
}