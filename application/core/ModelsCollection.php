<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelsCollection{
    public $total = 0; //int with the total count
    public $count = 0; //int with the returned objects count
    public $collection = []; //list of 
    
    public function __construct($t, $c, $coll) {
        $this->total = $t;
        $this->count = $c;
        $this->collection = $coll;
    }
}