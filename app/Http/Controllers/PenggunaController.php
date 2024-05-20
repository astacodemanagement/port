<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all();
        $role = Role::all();

        return view('back.pengguna.index', compact('pengguna','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|numeric',
            'password' => 'required|confirmed|min:6'
        ], [
            'required' => ':attribute Wajib diisi',
            'email' => ':attribute Tidak Valid',
            'unique' => ':attribute Sudah Digunakan',
            'numeric' => ':attribute Harus Berupa Angka',
            'confirmed' => 'Konfirmasi Password Tidak Sesuai',
            'min' => ':attribute Minimal :min Karakter',
        ],
        [
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'password' => 'Password'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $role = Role::find($request->role);

        if (!$role) {
            return response(['success' => false, 'message' => 'Role tidak ditemukan'], 404);
        }

        // Simpan data pengguna ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign pengguna ke role
        $user->assignRole($role->name);

        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Create', 'Pengguna', $user->id, $loggedInUserId, null, json_encode($user));

        return response()->json(['message' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->role = isset($pengguna->roles[0]) ? $pengguna->roles[0]->id : null;

        return response()->json($pengguna);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,'. $id,
                'role' => 'required|numeric',
                'password' => 'nullable|confirmed|min:6'
            ],
            [
                'required' => ':attribute Wajib diisi',
                'email' => ':attribute Tidak Valid',
                'unique' => ':attribute Sudah Digunakan',
                'numeric' => ':attribute Harus Berupa Angka',
                'confirmed' => 'Konfirmasi Password Tidak Sesuai',
                'min' => ':attribute Minimal :min Karakter',
            ],
            [
                'name' => 'Name',
                'email' => 'Email',
                'role' => 'Role',
                'password' => 'Password'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $role = Role::find($request->role);
        $oldData = $pengguna->getOriginal();

        if (!$role) {
            return response(['success' => false, 'message' => 'Role tidak ditemukan'], 404);
        }

        $pengguna->name = $request->name;
        $pengguna->email = $request->email;

        if ($request->password) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->save();

        // Assign pengguna ke role
        $pengguna->syncRoles($role->name);

        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Pengguna', $pengguna->id, $loggedInUserId, json_encode($oldData), json_encode($pengguna));

        return response()->json(['message' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);

        $pengguna->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Pengguna', $id, $loggedInUserId, json_encode($pengguna), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }
}
