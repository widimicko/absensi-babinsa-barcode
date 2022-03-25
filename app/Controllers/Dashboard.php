<?php

namespace App\Controllers;

use App\Models\AbsenceModel;
use App\Models\MemberModel;
use App\Controllers\Auth;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->absenceModel = new AbsenceModel();
        $this->memberModel = new MemberModel();
        $this->auth = new Auth();
    }

    public function index()
    {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      
      return view('dashboard/dashboard', [
        'members' => $this->memberModel->findAll(),
        'membersOut' => $this->absenceModel->where(['date' => date('Y-m-d'), 'absence' => 'Pulang'])->findAll(),
        'membersIn' => $this->absenceModel->where(['date' => date('Y-m-d'), 'absence' => 'Masuk'])->findAll(),
      ]);
    }
}
