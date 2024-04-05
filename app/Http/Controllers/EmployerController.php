<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use App\Models\User;
use App\Http\Controllers\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index()
    {
        return view('data_karyawan', [
            "tittle" => "Data Karyawan",
            "employers" => Employers::oldest()->paginate(9)
        ]);
    }

    public function show(Employers $id_user)
    {
        return view('detail_karyawan', [
            "tittle" => "Detail Karyawan",
            "result" => $id_user
        ]);
    }

    public function edit(Employers $id_user)
    {
        return view('edit_karyawan', [
            "tittle" => "Edit Karyawan",
            "jabatans" => ["Owner", "Store Manager", "Karyawan"],
            "result" => $id_user
        ]);
    }

    public function editPassword(Employers $id_user)
    {
        return view('edit_password', [
            "tittle" => "Update Password",
            "result" => $id_user
        ]);
    }

    public function tambahKaryawan()
    {
        return view('tambah_karyawan', [
            "tittle" => "Tambah Karyawan",
            "jabatans" => ["Owner", "Store Manager", "Karyawan"]
        ]);
    }

    public function store(Request $request)
    {
        $last_id = Employers::orderBy('id_user', 'desc')->first()->id_user;
        $last_id = substr($last_id,2);
        $tambah = $last_id + 1; 
        $id_user = "U-".sprintf("%03d",$tambah);

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ijazah_terakhir' => 'required|max:255',
            'jabatan' => 'required',
            'username' => ['required', 'min:4', 'max:20', 'unique:employers,username'],
            'password' => ['required', 'min:4', 'max:255']
        ]);

        $validatedData['id_user'] = $id_user;
        
        $userInput['name'] = $validatedData['nama'];
        $userInput['id_user'] = $id_user;
        $userInput['username'] = $validatedData['username'];
        $userInput['jabatan'] = $validatedData['jabatan'];
        $userInput['password'] = $validatedData['password'];

        // $userInput['password'] = Hash::make($userInput['password']);

        Employers::create($validatedData);
        User::create($userInput);

        return redirect('/data_karyawan')->with('message', 'Data Karyawan Berhasil Ditambahkan!!');
    }

    public function update(Request $request, Employers $id_user)
    {
        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ijazah_terakhir' => 'required|max:255',
            'jabatan' => 'required',
            'username' => 'required'
        ];

        if ($request->username != $id_user->username){
            $rules['username'] = ['required', 'min:4', 'max:20', 'unique:employers,username'];
        }

        $validatedData = $request->validate($rules);

        $userUpdate['name'] = $validatedData['nama'];
        $userUpdate['username'] = $validatedData['username'];
        $userUpdate['jabatan'] = $validatedData['jabatan'];

        Employers::where('username', $id_user->username)->update($validatedData);
        User::where('username', $id_user->username)->update($userUpdate);

        return redirect('/data_karyawan')->with('message', 'Data Karyawan Berhasil Di Perbarui!!');
    }

    public function updatePassword(Request $request, Employers $id_user)
    {
        $validatedData = $request->validate([
            'password' => 'required',
            'new_password' => ['required', 'min:4', 'max:255'],
            'password_confirmation' => ['required', 'min:4', 'max:255', 'same:new_password']
        ]);

        if(!Hash::check($validatedData['password'], $id_user->password))
        {
            return back()->with('message', 'Password yang anda masukan tidak sama dengan password anda saat ini!!');
        }

        $newPassword = Hash::make($validatedData['new_password']);
        
        Employers::where('username', $id_user->username)->update(['password' => $newPassword]);
        User::where('username', $id_user->username)->update(['password' => $newPassword]);

        return back()->with('message', 'Password anda berhasil diperbarui!!');
        
    }

    public function destroy(Request $request)
    {
        Employers::where('username', $request->username)->delete();
        User::where('username', $request->username)->delete();

        return redirect('/data_karyawan')->with('message', 'Data berhasil dihapus!!');
    }
}
