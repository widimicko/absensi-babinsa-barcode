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

    public function create() {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      return view('dashboard/absences/create', [
        'members' => $this->memberModel->findAll()
      ]);
    }

    public function store() {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      if(!$this->validate([
        'member_id' => 'required',
        'absence' => 'required',
        'date' => 'required',
        'description' => 'permit_empty',
        'image' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $isAbsenceToday = $this->absenceModel->where(['member_id' => $this->request->getVar('member_id'), 'date' => date('Y-m-d')])->first();

      if ($isAbsenceToday) {
          return redirect()->back()->with('failed', 'Anggota sudah absen '. $isAbsenceToday['absence'] . ' hari ini');
      }


      $isFileUploaded = null;
      $uploadedFile = $this->request->getFile('image');

      if ($uploadedFile->getError() == 4) {
        $isFileUploaded = false;
      } elseif ($uploadedFile->getError() != 4) {
        $isFileUploaded = true;
        $uploadedFile->move('image/absence/');
      }

      $this->absenceModel->insert([
        'member_id' => $this->request->getVar('member_id'),
        'absence' => $this->request->getVar('absence'),
        'date' => $this->request->getVar('date'),
        'description' => $this->request->getVar('description'),
        'image' => $isFileUploaded ? $uploadedFile->getClientName() : '',
      ]);

      return redirect()->to('/dashboard/absences')->with('success', 'Data Absensi baru berhasil ditambahkan');
    }

    public function edit($id) {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      $absence = $this->absenceModel->find($id);
      return view('dashboard/absences/edit', [
        'absence' => $absence,
        'members' => $this->memberModel->findAll()
      ]);
    }

    public function update($id) {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      if(!$this->validate([
        'member_id' => 'required',
        'absence' => 'required',
        'date' => 'required',
        'description' => 'permit_empty',
        'image' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $absence = $this->absenceModel->find($id);

      $isFileUploaded = null;
      $uploadedFile = $this->request->getFile('image');

      if ($uploadedFile->getError() == 4) {
        $isFileUploaded = false;
      } elseif ($uploadedFile->getError() != 4) {
        $isFileUploaded = true;
        unlink('image/absence/'. $absence['image']);
        $uploadedFile->move('image/absence/');
      }

      $this->absenceModel->update($id, [
        'member_id' => $this->request->getVar('member_id'),
        'absence' => $this->request->getVar('absence'),
        'date' => $this->request->getVar('date'),
        'description' => $this->request->getVar('description'),
        'image' => $isFileUploaded ? $uploadedFile->getClientName() : $absence['image'],
      ]);

      return redirect()->to('/dashboard/absences')->with('success', 'Data Absensi berhasil diperbaharui');
    }

    public function destroy($id) {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }
      
      $absence = $this->absenceModel->find($id);
      $filePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'image/absence/' . $absence['image'];

      if (file_exists($filePath) && $absence['image'] != 'empty_image.jpg') {
        unlink('image/absence/'. $absence['image']);
      }
      
      $this->absenceModel->delete($id);

      return redirect()->to('/dashboard/absences')->with('success', 'Absensi berhasil dihapus');
    }
}
