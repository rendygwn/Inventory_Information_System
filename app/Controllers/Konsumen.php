<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Konsumen extends BaseController
{
    public function index()
    {

        // Cara 1 : Query Builder
        $builder = $this->db->table('konsumen');
        $query = $builder->get();

        // Cara 2 : Query Manual
        // $query = $this->db->query("SELECT * FROM supplier");

        $data['konsumen'] = $query->getResult();

        return view('pages/pemesananbarang/konsumen/get', $data);
    }

    public function create()
    {
        return view('pages/pemesananbarang/konsumen/add');
    }

    public function store()
    {
        // Cara 1 : Tambah Data
        $data = $this->request->getPost();


        // // Cara 2 : Lebih Spesifik
        // $data = [
        //     'kd_konsumen' => $this->request->getVar('kd_konsumen'),
        //     'nama' => $this->request->getVar('nama'),
        //     'no_telepon' => $this->request->getVar('no_telepon'),
        //     'email' => $this->request->getVar('email'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('konsumen')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('konsumen'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('konsumen')->getWhere(['id_konsumen' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['konsumen'] = $query->getRow();
                return view('pages/pemesananbarang/konsumen/edit', $data);
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
        $data = $this->request->getPost();
        unset($data['_method']);

        // // Cara 2 : Lebih Spesifik
        // $data = [
        //     'kd_konsumen' => $this->request->getVar('kd_konsumen'),
        //     'nama' => $this->request->getVar('nama'),
        //     'no_telepon' => $this->request->getVar('no_telepon'),
        //     'email' => $this->request->getVar('email'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('konsumen')->where(['id_konsumen' => $id])->update($data);
        return redirect()->to(site_url('konsumen'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('konsumen')->where(['id_konsumen' => $id])->delete();
        return redirect()->to(site_url('konsumen'))->with('success', 'Data Berhasil Dihapus');
    }
}
