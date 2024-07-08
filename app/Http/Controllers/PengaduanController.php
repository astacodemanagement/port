<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Pengaduan;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
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
        $pengaduan = Pengaduan::orderBy('id', 'desc')->get();
        return view('back.pengaduan.index', compact('pengaduan'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.member.pengaduan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi request
        $validator = Validator::make($request->all(), [
            'subjek ' => 'nullable',
            'isi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'subjek.required' => 'subjek Wajib diisi',
            'isi.required' => 'Isi Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/pengaduan/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
        }

        Pengaduan::create([
            'subjek' => $request->subjek,
            'isi' => $request->isi,
            'gambar' => $imageName,
            'kandidat_id' => $request->kandidat_id,
        ]);

        // handle upload file
     
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $loggedInUserId = Auth::id();
        $pengaduan = Kandidat::where('id', $request->kandidat_id)->first();
        $this->simpanLogHistori('Create', 'Pengaduan', $pengaduan->id, $loggedInUserId, null, json_encode($pengaduan));
        return redirect()->back()->with("success", "Pengaduan Berhasil Dikirim");
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
        $pengaduan = Pengaduan::findOrFail($id);
        return response()->json($pengaduan);
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
            'subjek' => 'required',
            'isi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_pengaduan.required' => 'Nama Pengaduan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan = Pengaduan::create([
            'subjek' => $request->subjek,
            'isi' => $request->isi,
            'gambar' => $request->gambar,
            'kandidat_id' => $request->kandidat_id,
        ]);
        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/pengaduan/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
    
            // Hapus file gambar lama jika ada
            if ($pengaduan->gambar && file_exists(public_path('upload/pengaduan/' . $pengaduan->gambar))) {
                unlink(public_path('upload/pengaduan/' . $pengaduan->gambar));
            }
    
            $input['gambar'] = $imageName;
        }
    
        // Update pengaduan data di database
        $pengaduan->update($input);

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Pengaduan', $pengaduan->id, $loggedInUserId, json_encode($pengaduan->getOriginal()), json_encode($pengaduan));

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
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return response()->json(['message' => 'Data pengaduan not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $pengaduan->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/pengaduan/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $pengaduan->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'pengaduan', $id, $loggedInUserId, json_encode($pengaduan), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
