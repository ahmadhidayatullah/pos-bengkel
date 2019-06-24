<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::with('role')->orderBy('id', 'desc')->get();
        return view('users.index', ['data' => $data]);
    }

    public function create()
    {
        $roles = Role::all();
        $provinces = \App\Models\Provinsi::all();
        return view('users.create', [
            'roles' => $roles,
            'provinces' => $provinces,
        ]);
    }
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'min:6|required|confirmed',
            'password_confirmation' => 'required|min:6',
            'name' => 'required|string|max:255',
            'role' => 'required',
            'no_hp' => 'required',
            'ktp' => 'mimes:jpeg,jpg,png|required|max:5000',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kodepos' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', format_message('Silahkan periksa inputan !', 'danger'));
        }

        $create_referral = explode('@', $request->email);

        $photo = $request->file('ktp');
        $ext = $photo->extension();
        $name = str_replace('-', ' ', $create_referral[0]) . '-' . uniqid();
        $image = 'org-' . $name . '.' . $ext;
        //uploading the original file for later use
        $destionation = public_path('/app-assets/images/ktp');
        $img_resize = Image::make($photo->getRealPath())->save($destionation . '/' . $image);

        $user = User::create([
            'email' => $request->email,
            'refferal' => str_replace('.', '', $create_referral[0]),
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role_id' => $request->role,
            'no_hp' => $request->no_hp,
        ]);

        if ($user) {
            \App\Models\UserDetail::create([
                'user_id' => $user->id,
                'ktp' => $image,
                'provinsi_id' => $request->provinsi_id,
                'kabupaten_id' => $request->kabupaten_id,
                'kodepos' => $request->kodepos,
                'alamat' => $request->alamat,
            ]);
            \App\Models\UserLandingPage::create(['user_id' => $user->id]);
            \LogActivity::addToLog("Tambah data user ID #{$user->id}.");
        }

        return redirect()->route('user')->with('message', format_message('Berhasil menyimpan data !', 'success'));
    }

    public function update_general(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'name' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);

        if ($validator->fails()) {
            return redirect()->route('user.edit', ['id' => $user->id])
                ->withErrors($validator)
                ->withInput()
                ->with('message', format_message('Gagal! Silahkan periksa inputan anda', 'danger'));
        }

        //untuk menghindari kecurangan user selain admin
        $role = ((Auth::user()->role_id != 1) ? Auth::user()->role_id : $request->role);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->role_id = $role;
        $user->save();

        return back()->with('message', format_message('Berhasil update data !', 'info'));
    }

    public function update_password(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'min:6|required|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        $user = User::findOrFail($id);

        if ($validator->fails()) {
            return redirect()->route('user.edit', ['id' => $user->id])
                ->withErrors($validator)
                ->withInput()
                ->with('message', format_message('Gagal update password', 'danger'));
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('message', format_message('Berhasil update password !', 'info'));
    }

    public function destroy(Request $request, $id)
    {
        if ($id == 1) {
            return redirect()->route('user')->with('message', format_message('User ini tidak dapat dihapus. hubungi pengembang 085254970102!', 'danger'));
        }

        $user = User::find($id);
        $user->delete();

        if ($user) {
            \LogActivity::addToLog("Hapus data user ID #{$user->id}..");
        }
        return redirect()->route('user')->with('message', format_message('Berhasil menghapus!', 'info'));
    }
}
