<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengeluaranController extends Controller
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
        $pengeluaran = Pengeluaran::orderBy('id', 'desc')->get();
        return view('back.pengeluaran.index', compact('pengeluaran'));
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
            'nama_pengeluaran' => 'required|unique:pengeluaran,nama_pengeluaran',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_pengeluaran.required' => 'Nama Pengeluaran Wajib diisi',
            'gambar.required' => 'Gambar Pengeluaran Wajib diisi',
            'nama_pengeluaran.unique' => 'Nama Pengeluaran sudah digunakan',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();  // Pindahkan ini ke bawah validasi
        $input = $request->except('jumlah_pengeluaran');

        if ($request->has('jumlah_pengeluaran')) {
            $input['jumlah_pengeluaran'] = str_replace(',', '', $request->input('jumlah_pengeluaran'));
        }

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/pengeluaran/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['gambar'] = $imageName;
        }


        // Simpan data spp ke database menggunakan fill()
        $pengeluaran = new Pengeluaran();
        $pengeluaran->fill($input);
        $pengeluaran->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Pengeluaran', $pengeluaran->id, $loggedInUserId, null, json_encode($pengeluaran));

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
        $pengeluaran = Pengeluaran::findOrFail($id);
        return response()->json($pengeluaran);
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
            'nama_pengeluaran' => 'required|unique:pengeluaran,nama_pengeluaran,' . $id,
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_pengeluaran.required' => 'Nama Pengeluaran Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        
        $pengeluaran = Pengeluaran::findOrFail($id);

        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/pengeluaran/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file gambar lama jika ada
            if ($pengeluaran->gambar && file_exists(public_path('upload/pengeluaran/' . $pengeluaran->gambar))) {
                unlink(public_path('upload/pengeluaran/' . $pengeluaran->gambar));
            }

            $input['gambar'] = $imageName;
        }
                // Ubah jumlah_pengeluaran tanpa karakter ,
                if ($request->has('jumlah_pengeluaran')) {
                    // Menghilangkan koma dari jumlah_pengeluaran
                    $input['jumlah_pengeluaran'] = str_replace(',', '', $request->input('jumlah_pengeluaran'));
                }
        // Update pengeluaran data di database
        $pengeluaran->update($input);

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Pengeluaran', $pengeluaran->id, $loggedInUserId, json_encode($pengeluaran->getOriginal()), json_encode($pengeluaran));

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
        $pengeluaran = Pengeluaran::find($id);

        if (!$pengeluaran) {
            return response()->json(['message' => 'Data pengeluaran not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $pengeluaran->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/pengeluaran/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $pengeluaran->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'pengeluaran', $id, $loggedInUserId, json_encode($pengeluaran), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
