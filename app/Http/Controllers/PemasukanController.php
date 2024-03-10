<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function index()
    {
        $pemasukan = Pemasukan::orderBy('id', 'desc')->get();
        return view('back.pemasukan.index', compact('pemasukan'));
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_pemasukan' => 'required|unique:pemasukan,nama_pemasukan',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_pemasukan.required' => 'Nama Pemasukan Wajib diisi',
            'gambar.required' => 'Gambar Pemasukan Wajib diisi',
            'nama_pemasukan.unique' => 'Nama Pemasukan sudah digunakan',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();  // Pindahkan ini ke bawah validasi
        $input = $request->except('jumlah_pemasukan');

        if ($request->has('jumlah_pemasukan')) {
            $input['jumlah_pemasukan'] = str_replace(',', '', $request->input('jumlah_pemasukan'));
        }

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/pemasukan/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['gambar'] = $imageName;
        }


        // Simpan data spp ke database menggunakan fill()
        $pemasukan = new Pemasukan();
        $pemasukan->fill($input);
        $pemasukan->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Pemasukan', $pemasukan->id, $loggedInUserId, null, json_encode($pemasukan));

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return response()->json($pemasukan);
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_pemasukan' => 'required|unique:pemasukan,nama_pemasukan,' . $id,
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_pemasukan.required' => 'Nama Pemasukan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        
        $pemasukan = Pemasukan::findOrFail($id);

        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/pemasukan/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file gambar lama jika ada
            if ($pemasukan->gambar && file_exists(public_path('upload/pemasukan/' . $pemasukan->gambar))) {
                unlink(public_path('upload/pemasukan/' . $pemasukan->gambar));
            }

            $input['gambar'] = $imageName;
        }
                // Ubah jumlah_pemasukan tanpa karakter ,
                if ($request->has('jumlah_pemasukan')) {
                    // Menghilangkan koma dari jumlah_pemasukan
                    $input['jumlah_pemasukan'] = str_replace(',', '', $request->input('jumlah_pemasukan'));
                }
        // Update pemasukan data di database
        $pemasukan->update($input);

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Pemasukan', $pemasukan->id, $loggedInUserId, json_encode($pemasukan->getOriginal()), json_encode($pemasukan));

        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);

        if (!$pemasukan) {
            return response()->json(['message' => 'Data pemasukan not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $pemasukan->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/pemasukan/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $pemasukan->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'pemasukan', $id, $loggedInUserId, json_encode($pemasukan), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
