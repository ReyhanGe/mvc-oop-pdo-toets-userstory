<?php

class Landingpages extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => "Homepage Mvc Oop Pdo Toets"
        ];
        $this->view('landingpages/index', $data);
    }
}