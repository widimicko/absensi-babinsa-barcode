<?php

namespace App\Controllers;

use App\Models\AbsenceModel;
use App\Models\MemberModel;
use App\Models\UserModel;
use App\Controllers\Auth;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->absenceModel = new AbsenceModel();
        $this->userModel = new UserModel();
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

    public function showChangePassword()
    {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }
      
      return view('dashboard/change-password');
    }

    public function updatePassword()
    {
      if(!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      if (! $this->validate([
        'current_password' => 'required',
        'password' => 'required|min_length[8]',
        'confirmation_password' => 'required|matches[password]',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $user = $this->userModel->find($this->auth->getloginUser()['user_id']);

      if (!password_verify($this->request->getVar('current_password'), $user['password'])) {
        return redirect()->back()->with('failed', 'Password yang anda masukkan salah');
      }

      $this->userModel->update($user['id'], [
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ]);
      
      return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
