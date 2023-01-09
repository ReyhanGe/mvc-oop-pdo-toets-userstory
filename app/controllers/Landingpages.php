<?php

class Landingpages extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => "Homepage mvc oop pdo proeftoets"
        ];
        $this->view('landingpages/index', $data);
    }
}