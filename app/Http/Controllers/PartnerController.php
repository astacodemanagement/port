<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
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
     $partner = Partner::paginate(10);
    return view('back.partner.index', compact('partner'));   
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
            'name' => 'required|unique:partner,name',
            'logo' => 'required|max:10240|mimes:jpeg,jpg,bmp,png,webp',
            'compro' => 'required|in:1,2',

            ], [
            'name.required' => 'Nama Partner Wajib diisi',
            'name.unique' => 'Nama Partner sudah digunakan',
            'logo.required' => 'Logo Wajib diisi',
            'logo.max' => 'Ukuran Logo maksimal 10MB',
            'logo.mimes' => 'Format Logo harus jpeg, jpg, bmp, png, webp',
            'compro.required' => 'company profile Wajib diisi',
            'compro.in' => 'company profile harus PSI atau Akama',    
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $destinationPath = 'upload/partner/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            
        }
        Partner::create([
            'name' => $request->name,
            'logo' => $imageName,
            'compro' => $request->compro,

        ]);

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Negara', $request->name, $loggedInUserId, null, null);


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
        //
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
      
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:partner,name',
            'logo' => 'required|max:10240|mimes:jpeg,jpg,bmp,png,webp',
            'compro' => 'required|in:1,2',

            ], [
            'name.required' => 'Nama Partner Wajib diisi',
            'name.unique' => 'Nama Partner sudah digunakan',
            'logo.required' => 'Logo Wajib diisi',
            'logo.max' => 'Ukuran Logo maksimal 10MB',
            'logo.mimes' => 'Format Logo harus jpeg, jpg, bmp, png, webp',
            'compro.required' => 'company profile Wajib diisi',
            'compro.in' => 'company profile harus PSI atau Akama',    
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $partner = Partner::findOrFail($id);
        $oldData = $partner->getOriginal();

        // handle logo
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $destinationPath = 'upload/partner/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file logo lama jika ada
            if ($partner->logo && file_exists(public_path('upload/partner/' . $partner->logo))) {
                unlink(public_path('upload/partner/' . $partner->logo));
            }
            
            $partner->logo = $imageName;
        }
        // Update data
        $partner->update([
            'logo' =>  $imageName,
            'name' => $request->name,
            'compro' => $request->compro,
        ]);


        $loggedInUserId = Auth::id();
        
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
         $partner = Partner::findOrFail($id);
          $oldData = $partner->toArray();
          $partner->delete();
    
          $loggedInUserId = Auth::id();
          $this->simpanLogHistori('Delete', 'partner', $partner->id, $loggedInUserId, json_encode($oldData), null);
    
          return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
