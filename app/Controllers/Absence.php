<?php

namespace App\Controllers;

use App\Models\AbsenceModel;
use App\Controllers\Auth;

class Absence extends BaseController
{
    public function __construct()
    {
        $this->absenceModel = new AbsenceModel();
        $this->auth = new Auth();
    }

    public function index()
    {
      return view('dashboard/absences/absences', [
        'absences' => $this->absenceModel->getAbsences()
      ]);
    }
}
