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

    public function edit($id) {
      $member = $this->memberModel->find($id);
      return view('dashboard/members/edit', [
        'member' => $member
      ]);
    }

    public function update($id) {
      if(!$this->validate([
        'name' => 'required',
        'image' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        'birthdate' => 'required',
        'rank' => 'required',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $member = $this->memberModel->find($id);

      $isFileUploaded = null;
      $uploadedFile = $this->request->getFile('image');

      if ($uploadedFile->getError() == 4) {
        $isFileUploaded = false;
      } elseif ($uploadedFile->getError() != 4) {
        $isFileUploaded = true;
        unlink('image/member/'. $member['image']);
        $uploadedFile->move('image/member/');
      }

      $this->memberModel->update($id, [
        'name' => $this->request->getVar('name'),
        'rank' => $this->request->getVar('rank'),
        'birthdate' => $this->request->getVar('birthdate'),
        'image' => $isFileUploaded ? $uploadedFile->getClientName() : $member['image']
      ]);

      return redirect()->to('/dashboard/members')->with('success', 'Data anggota berhasil diperbaharui');
    }

    public function destroy($id) {
      $member = $this->memberModel->find($id);
      $filePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'image/member/' . $member['image'];

      if (file_exists($filePath) && $member['image'] != 'empty_image.jpg') {
        unlink('image/member/'. $member['image']);
      }
      
      $this->memberModel->delete($id);

      return redirect()->to('/dashboard/members')->with('success', 'Anggota "'. $member['name'] .'" berhasil dihapus');
    }
}
