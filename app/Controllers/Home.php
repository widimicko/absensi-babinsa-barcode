<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\AbsenceModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->absenceModel = new AbsenceModel();
    }

    public function index()
    {
        return view('home/index');
    }

    public function in() {
        return view('home/absence_in', [
            'recents' => $this->absenceModel->getLastFiveAbsence(date('Y-m-d'), 'Masuk'),
            'membersIn' => $this->absenceModel->where(['date' => date('Y-m-d'), 'absence' => 'Masuk'])->findAll(),
            'members' => $this->memberModel->findAll()
        ]);
    }

    public function out() {
        return view('home/absence_out', [
            'recents' => $this->absenceModel->getLastFiveAbsence(date('Y-m-d'), 'Pulang'),
            'membersOut' => $this->absenceModel->where(['date' => date('Y-m-d'), 'absence' => 'Pulang'])->findAll(),
            'membersIn' => $this->absenceModel->where(['date' => date('Y-m-d'), 'absence' => 'Masuk'])->findAll(),
        ]);
    }

    public function absence($absence) {
        if ($absence != 'Masuk' && $absence != 'Pulang') {
            return redirect()->back()->with('failed', 'Hanya dapat absen masuk atau pulang');
        }

        $member = $this->memberModel->where('credential', $this->request->getVar('credential'))->first();
        if (!$member) {
            return redirect()->back()->with('failed', 'Data anggota tidak ditemukan');
        }

        if ($absence == 'Pulang') {
            if (!$this->absenceModel->where(['member_id' => $member['id'], 'date' => date('Y-m-d'), 'absence' => 'Masuk'])->first()) {
                return redirect()->back()->with('failed', 'Anggota belum absen masuk');
            }
        }

        $isAbsenceToday = $this->absenceModel->where(['member_id' => $member['id'], 'date' => date('Y-m-d'), 'absence' => $absence])->first();

        if ($isAbsenceToday) {
            return redirect()->back()->with('failed', 'Anggota '. $member['name'] .' sudah absen '. $absence . ' hari ini');
        }

        

        $this->absenceModel->insert([
            'member_id' => $member['id'],
            'absence' => $absence,
            'date' => date('Y-m-d'),
            'description' => '',
            'image' => ''
        ]);

        if ($absence == 'Masuk') {
            return redirect()->to('absence/in')->with('success', 'Anggota '. $member['name'] .' berhasil absen '. $absence);
        } else if ($absence == 'Pulang') {
            return redirect()->to('absence/out')->with('success', 'Anggota '. $member['name'] .' berhasil absen '. $absence);
        }
        
    }
}
