<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil aktivitas pengguna yang sedang masuk
        $activities = Activity::where('causer_id', Auth::id())->get();
        $user = User::findOrFail(Auth::id());

        return view('pages.profile', compact('activities', 'user'));
    }

    /**
     * Menampilkan halaman edit profil pengguna.
     * 
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = User::findOrFail(Auth::id());

        return view('pages.editProfile', compact('user'));
    }

    /**
     * Memperbarui profil pengguna.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'hide_email' => 'required|in:Make email visible to all,Hide email to all except repository administration,UNSPECIFIED',
            'title' => 'nullable|string|max:255',
            'given_name' => 'required|string|max:255',
            'family_name' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'homepage_url' => 'nullable|string|max:255',
        ]);

        // Mengembalikan error validasi jika ada
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Mencari pengguna dan memperbarui detail
        $user = User::findOrFail($id);
        $user->email = $request->input('email');

        // Memperbarui password jika disediakan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Memperbarui atribut lainnya
        $user->hide_email = $request->input('hide_email');
        $user->title = $request->input('title');
        $user->given_name = $request->input('given_name');
        $user->family_name = $request->input('family_name');
        $user->department = $request->input('department');
        $user->organization = $request->input('organization');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->homepage_url = $request->input('homepage_url');

        // Menyimpan perubahan pengguna
        $user->save();

        return response()->json(['message' => 'User updated successfully'], 200);
    }
}
