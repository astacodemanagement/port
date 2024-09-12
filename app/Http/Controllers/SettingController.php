<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;
use Log;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $putrasi = Setting::where('compro',1)->first();
        $akama = Setting::where('compro',2)->first();

 
   return view('back.pengaturan.index',compact('putrasi','akama'));
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
        //
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
    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_perusahaan' => 'nullable|string',
            'alamat' => 'nullable|string|min:6',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string|min:6',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'footer' => 'nullable|string|min:6',
        ], [
            'logo.image' => 'File harus berupa gambar',
            'logo.mimes' => 'File harus berupa gambar',
            'logo.max' => 'Ukuran file maksimal 2MB',
            'nama_perusahaan.string' => 'Nama perusahaan harus berupa string',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.min' => 'Alamat minimal 6 karakter',
            'email.email' => 'Email tidak valid',
            'telepon.string' => 'Telepon harus berupa string',
            'telepon.min' => 'Telepon minimal 6 karakter',
            'twitter.url' => 'Twitter tidak valid',
            'facebook.url' => 'Facebook tidak valid',
            'instagram.url' => 'Instagram tidak valid',
            'youtube.url' => 'Youtube tidak valid',
            'footer.string' => 'Footer harus berupa string',
            'footer.min' => 'Footer minimal 6 karakter',
        ]);
    
    

    
        DB::beginTransaction();
        try {
            // Handle file upload
            $logoFilename = null;
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $logoFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/logo'), $logoFilename);
            }
    
            // Prepare data for update or create
            $data = $request->except('logo');
            if ($logoFilename) {
                $data['logo'] = $logoFilename;
            }
    
           
            $putrasi = Setting::where('compro', 1)->first();
            $akama = Setting::where('compro', 2)->first();
    
          if($request->compro == 1){
            if ($putrasi) {
                $putrasi->update($data);
            } else {
                $data['compro'] = 1;
                Setting::create($data);
            }
            }else{
                if ($akama) {
                    $akama->update($data);
                } else {
                    $data['compro'] = 2;
                    Setting::create($data);
                }
            }
            
            
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with('error', 'Data gagal diupdate');
        }

    }
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
