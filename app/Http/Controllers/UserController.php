<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function index(){
        $data = [
            'title' => 'List User',
            'user' => $this->userModel->getUser()
        ];
        return view('list_user', $data);
    }

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas
        ];

        return view('user_create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:150',
            'npm' => 'required|string|max:20|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
        return redirect()->to('/user')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id){
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:150',
            'npm' => 'required|string|max:20|unique:user,npm,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = $this->userModel->findOrFail($id);
        $user->update([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
        return redirect()->to('/user')->with('success', 'Pengguna berhasil diupdate!');
    }

    public function destroy($id){
        $user = $this->userModel->findOrFail($id);
        $user->delete();
        return redirect()->to('/user')->with('success', 'Pengguna berhasil dihapus!');
    }
}