<?php

namespace App\Controllers;

class Kategorije extends BaseController
{
    protected $belumada;

    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'tittle' => 'Kategori JE'
        ];

        return view('datamaster/kategorijeview', $data);
    }
}
