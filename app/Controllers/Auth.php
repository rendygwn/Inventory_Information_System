<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if (session('id_user')) {
            return redirect()->to(site_url('home'));
        }

        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function loginProcess()
    {
        $data = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['email' => $_POST['email']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($_POST['password'], $user->password)) {
                $params = ['id_user' => $user->id_user];
                session()->set($params);

                return redirect()->to(site_url('home'));
            } else {
                return redirect()->back()->with('error', 'Password Tidak Sesuai!');
            }
        } else {
            return redirect()->back()->with('error', 'Email Tidak Ditemukan!');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}
