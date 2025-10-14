<?php

namespace App\Controllers;

use App\Models\CelularModel;

class Home extends BaseController
{
    public function index(): string
    {
        $celularModel = new CelularModel();
        $data['celulares'] = $celularModel->findAll();
        
        return view('home_page', $data);
    }
}
