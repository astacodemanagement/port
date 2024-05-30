<?php

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

if (!function_exists('memberProfile')) {
    function memberProfileImg($data)
    {
        $profileImg = asset('member-template/images/profile/user-1.jpg');

        if ($img = $data->profile_image) {
            $profileImg = asset('upload/foto/' . $img);

            if (!File::exists(public_path('upload/foto/' . $img))) {
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

if (!function_exists('hashId')) {
    function hashId($string, $type = 'encode')
    {
        return $type == 'encode' ? Hashids::encode($string) : Hashids::decode($string);
    }
}