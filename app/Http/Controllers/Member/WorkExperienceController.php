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
            'negara_tempat_kerja.*' => 'required|min:3|max:50',
            'nama_perusahaan.*' => 'required|min:3|max:100',
            'tanggal_mulai_kerja.*' => 'required|date_format:Y-m-d',
            'tanggal_selesai_kerja.*' => 'required|date_format:Y-m-d',
            'posisi.*' => 'required|min:3|max:100',
        ],
        [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'date_format' => 'Format :attribute tidak valid'
        ],
        [
            'negara_tempat_kerja.*' => 'Negara tempat bekerja',
            'nama_perusahaan.*' => 'Nama perusahaan',
            'tanggal_mulai_kerja.*' => 'Tanggal mulai kerja',
            'tanggal_selesai_kerja.*' => 'Tanggal selesai kerja',
            'posisi.*' => 'Posisi',
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
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            if (count($pengalamanKerja) == 0) {
                throw new Exception("Tidak ada pengalaman kerja yg disimpan");
            }

            PengalamanKerja::where('pendaftaran_id', auth()->user()->kandidat?->pendaftaran_id)->delete();
            PengalamanKerja::insert($pengalamanKerja);
            DB::commit();

            $workExperiences = PengalamanKerja::where('pendaftaran_id', auth()->user()->kandidat->pendaftaran_id)->limit(3)->orderBy('id', 'desc')->get();
            $i = 0;
            foreach ($workExperiences as $pengalamanKerja) {
                unset($workExperiences[$i]->id);
                unset($workExperiences[$i]->pendaftaran_id);
                unset($workExperiences[$i]->created_at);
                unset($workExperiences[$i]->updated_at);
                
                $dateDiffYear = \Carbon\Carbon::parse($pengalamanKerja->tanggal_mulai_kerja)->diffInYears($pengalamanKerja->tanggal_selesai_kerja);
                $dateDiffMonth = \Carbon\Carbon::parse($pengalamanKerja->tanggal_mulai_kerja)->diffInMonths($pengalamanKerja->tanggal_selesai_kerja);
                $workExperiences[$i]->time = $dateDiffYear > 0 ? $dateDiffYear . ' years' : $dateDiffMonth . ' months';
                $i++;
            }

            return response()->json(['success' => true, 'message' => 'Pengalaman kerja berhasil diperbarui', '_token' => csrf_token(), 'data' => $workExperiences]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage(), '_token' => csrf_token()], 400);
        }
    }
}
