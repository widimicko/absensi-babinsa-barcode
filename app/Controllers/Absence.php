<?php

namespace App\Controllers;

use App\Models\AbsenceModel;
use App\Models\MemberModel;
use App\Controllers\Auth;

class Absence extends BaseController
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

      return view('dashboard/absences/absences', [
        'absences' => $this->absenceModel->getAbsences(),
        'members' => $this->memberModel->findAll(),
      ]);
    }

    public function filter()
    {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      $absence = $this->request->getVar('absence');
      $member_id = $this->request->getVar('member_id');
      $start = $this->request->getVar('start');
      $end = $this->request->getVar('end');
      
      return view('dashboard/absences/absences', [
        'absences' => $this->absenceModel->getFilteredAbsences($absence, $member_id, $start, $end),
        'members' => $this->memberModel->findAll(),
      ]);
    }
}
