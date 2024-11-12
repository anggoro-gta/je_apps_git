<?php

namespace App\Controllers;

use App\Models\msjeModel;

class Masterdatabaseje extends BaseController
{
    protected $msje;

    public function __construct()
    {
        $this->msje = new msjeModel();
    }

    public function index()
    {
        $msjegetdb = $this->msje->findAll();
        // $user = new \Myth\Auth\Models\UserModel();
        // $db = \Config\Database::connect();
        // $builder = $db->table('users');
        // $builder->select('users.id as usersid, username, email, name');
        // $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $query = $builder->get();

        // $resultquery = $query->getResult();

        $data = [
            'tittle' => 'Database JE',
            'databaseje' => $msjegetdb
        ];

        return view('datamaster/databaseje', $data);
    }

    public function apigetdatabaseje()
    {
        $id = $_POST['id_data'];
        $data = [
            'dataje' => $this->msje->getdata($id)
        ];

        echo json_encode($data);
    }
}
