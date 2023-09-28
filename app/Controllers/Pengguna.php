<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Pengguna extends BaseController
{
    public function index()
    {
        // Cara 1 : Query Builder
        $builder = $this->db->table('user');
        $query = $builder->get();

        // Cara 2 : Query Manual
        // $query = $this->db->query("SELECT * FROM user");

        $data['user'] = $query->getResult();

        return view('pages/pengguna/get', $data);
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('user')->getWhere(['id_user' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['user'] = $query->getRow();
                return view('pages/pengguna/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        // Cara 1 : Edit Data
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // // Cara 2 : Lebih Spesifik
        $data = [
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'info' => $this->request->getVar('info'),
        ];

        $this->db->table('user')->where(['id_user' => $id])->update($data);
        return redirect()->to(site_url('pengguna'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('user')->where(['id_user' => $id])->delete();
        return redirect()->to(site_url('pengguna'))->with('success', 'Data Berhasil Dihapus');
    }
}
