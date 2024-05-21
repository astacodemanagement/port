<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('viewCompro')) {
    function viewCompro($view, $data = [])
    {
        $compro = DB::table('compro')->where('domain', request()->host())->first();

        $viewPath = !$compro ? $view : $compro->view_path . '.' . $view;

        return view($viewPath, $data);
    }
}