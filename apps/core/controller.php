<?php
class controller
{
    public function view($view, $data = [])
    {

        require_once '../apps/views/' . $view . '.php';
    }
    public function model($model)
    {
        require_once '../apps/models/' . $model . '.php';
        return new $model;
    }
}
