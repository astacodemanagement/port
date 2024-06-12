<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Vinkla\Hashids\Facades\Hashids;

if (!function_exists('viewCompro')) {
    function viewCompro($view, $data = [])
    {
        $compro = DB::table('compro')->where('domain', request()->host())->first();

        $viewPath = !$compro ? $view : $compro->view_path . '.' . $view;

        return view($viewPath, $data);
    }
}

if (!function_exists('partialCompro')) {
    function partialCompro($viewFile)
    {
        $compro = DB::table('compro')->where('domain', request()->host())->first();

        return $compro->view_path.'.'.$viewFile;
    }
}

if (!function_exists('memberProfile')) {
    function memberProfileImg($data)
    {
        $profileImg = asset('member-template/images/profile/user-1.jpg');

        if ($img = $data->kandidat->foto) {
            $profileImg = asset('upload/foto/thumb_' . $img);

            if (!File::exists(public_path('upload/foto/thumb_' . $img))) {
                if ($data->kandidat->jenis_kelamin == 'Perempuan') {
                    $profileImg = asset('member-template/images/profile/user-9.jpg');

                    if ($data->kandidat->agama == 'Islam') {
                        $profileImg = asset('member-template/images/profile/user-6.jpg');
                    }
                }
            }
        } else {
            if ($data->kandidat->jenis_kelamin == 'Perempuan') {
                $profileImg = asset('member-template/images/profile/user-9.jpg');

                if ($data->kandidat->agama == 'Islam') {
                    $profileImg = asset('member-template/images/profile/user-6.jpg');
                }
            }
        }

        return $profileImg;
    }
}

if (!function_exists('memberDocumentImage')) {
    function memberDocumentImage($filePath = null, $fileThumbPath = null)
    {
        $isUploaded = false;
        $fileImage = 'member-template/images/unknown-file.png';
        $fileType = null;

        if ($filePath) {
            if (File::exists($filePath)) {
                $isUploaded = true;

                if ( pathinfo($filePath,  PATHINFO_EXTENSION) == 'pdf' ) {
                    $fileImage = 'member-template/images/pdf.png';
                    $fileType = 'pdf';
                } else {
                    $fileImage = $filePath;

                    if (File::exists($fileThumbPath)) {
                        $fileImage = $fileThumbPath;
                    }

                    $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
                }
            }
        }

        return ['is_uploaded' => $isUploaded, 'file_image' => $fileImage, 'filetype' => $fileType];
    }
}

if (!function_exists('hashId')) {
    function hashId($string, $type = 'encode')
    {
        return $type == 'encode' ? Hashids::encode($string) : Hashids::decode($string);
    }
}