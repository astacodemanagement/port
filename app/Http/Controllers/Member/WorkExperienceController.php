<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkExperienceController extends Controller
{
    public function index()
    {
        return view('front.member.work-experience.index');
    }
    
    public function edit()
    {
        return view('front.member.work-experience.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'negara_tempat_kerja.*' => 'required',
            'nama_perusahaan.*' => 'required',
            'tahun_mulai_kerja.*' => 'required',
            'tahun_selesai_kerja.*' => 'required',
            'posisi.*' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $pengalamanKerja = [];

            if (!$request->negara_tempat_kerja) {
                throw new Exception("Tidak ada pengalaman kerja yg diinput");
            }

            for($i = 0; $i < count($request->negara_tempat_kerja); $i++) {
                $pengalamanKerja[] = [
                    'pendaftaran_id' => auth()->user()->kandidat?->pendaftaran_id,
                    'negara_tempat_kerja' => $request->negara_tempat_kerja[$i],
                    'nama_perusahaan' => $request->nama_perusahaan[$i],
                    'tanggal_mulai_kerja' => $request->tanggal_mulai_kerja[$i],
                    'tanggal_selesai_kerja' => $request->tanggal_selesai_kerja[$i],
                    'posisi' => $request->posisi[$i],
                ];
            }

            if (count($pengalamanKerja) == 0) {
                throw new Exception("Tidak ada pengalaman kerja yg disimpan");
            }

            PengalamanKerja::where('pendaftaran_id', auth()->user()->kandidat?->pendaftaran_id)->delete();
            PengalamanKerja::insert($pengalamanKerja);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Pengalaman kerja berhasil diperbarui', '_token' => csrf_token()]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage(), '_token' => csrf_token()], 400);
        }
    }
}
