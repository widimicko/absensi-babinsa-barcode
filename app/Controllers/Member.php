<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index() {
      return view('dashboard/members/members', [
        'members' => $this->memberModel->findAll()
      ]);
    }

    public function create() {
      return view('dashboard/members/create');
    }

    public function store() {
      if(!$this->validate([
        'name' => 'required',
        'image' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        'birthdate' => 'required',
        'rank' => 'required',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $uploadedFile = $this->request->getFile('image');
      $uploadedFile->move('image/member/');

      $this->memberModel->insert([
        'name' => $this->request->getVar('name'),
        'rank' => $this->request->getVar('rank'),
        'birthdate' => $this->request->getVar('birthdate'),
        'image' => $uploadedFile->getClientName(),
        'credential' => md5(uniqid(rand(), true)),
      ]);

      return redirect()->to('/dashboard/members')->with('success', 'Data anggota baru berhasil ditambahkan');
    }

    public function edit() {
      return view('dashboard/members/edit');
    }

    // public function update() {
    //   return view('dashboard/members/create');
    // }

    // public function destroy() {
    //   return view('dashboard/members/create');
    // }
}
