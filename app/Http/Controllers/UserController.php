<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Tampilkan daftar pengguna
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    // Form untuk membuat pengguna baru
    public function create()
    {
        return view('user.create');
    }

    // Simpan pengguna baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,employee,customer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi file gambar
        ]);

        // Menyiapkan data pengguna yang akan disimpan
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];

        // Jika ada file foto, simpan gambar dan path-nya
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $data['photo'] = $filePath;
        }

        // Membuat user baru
        User::create($data);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    // Form untuk mengedit pengguna
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // Update pengguna yang sudah ada
    public function update(Request $request, User $user)
    {
        // Validate data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,  // Validasi unik email, kecuali untuk pengguna yang sedang diupdate
            'role' => 'required|in:admin,employee,customer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            $this->deleteOldPhoto($user);

            // Store new photo
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $user->photo = $filePath;
        }

        // Update the user record
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    // Menampilkan detail pengguna
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    // Hapus pengguna dari database
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus gambar jika ada
        $this->deleteOldPhoto($user);

        // Hapus user dari database
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    // Method untuk menghapus foto lama
    private function deleteOldPhoto($user)
    {
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo); // Menghapus gambar
        }
    }
}
