<?php
class controller{
    public function view($view, $data=[]){
       
        require_once '../apps/view/'.$view.'.php';
    
    }
    public function model($model){
        require_once '../apps/model/'.$model.'.php';
        return new $model;
    }
}