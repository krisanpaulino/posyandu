<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->has('user')) {
            return redirect()->to(session()->get('user')->user_type);
        }

        // dd(session());
        // $data['title'] = 'Posyandu';
        // return view('dashboards/umum', $data);
        return redirect('auth');
    }
    public function admin()
    {
        $data['title'] = 'Dashboard';

        return view('dashboards/admin', $data);
    }
    public function petugas()
    {
        helper('user');
        $data['title'] = 'Dashboard';

        return view('dashboards/petugas', $data);
    }

    public function orangtua()
    {
        $data['title'] = 'Posyandu';
        return view('dashboard/umum', $data);
    }
}
