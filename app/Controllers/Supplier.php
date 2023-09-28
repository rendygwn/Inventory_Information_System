<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Supplier extends BaseController
{
    public function index()
    {

        // Cara 1 : Query Builder
        $builder = $this->db->table('supplier');
        $query = $builder->get();

        // Cara 2 : Query Manual
        // $query = $this->db->query("SELECT * FROM supplier");

        $data['supplier'] = $query->getResult();

        return view('pages/datamaster/supplier/get', $data);
    }

    public function create()
    {
        return view('pages/datamaster/supplier/add');
    }

    public function store()
    {
        // Cara 1 : Tambah Data
        $data = $this->request->getPost();


        // // Cara 2 : Lebih Spesifik
        // $data = [
        //     'kd_supplier' => $this->request->getVar('kd_supplier'),
        //     'nama' => $this->request->getVar('nama'),
        //     'no_telepon' => $this->request->getVar('no_telepon'),
        //     'email' => $this->request->getVar('email'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('supplier')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('supplier'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('supplier')->getWhere(['id_supplier' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['supplier'] = $query->getRow();
                return view('pages/datamaster/supplier/edit', $data);
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
        //     'kd_supplier' => $this->request->getVar('kd_supplier'),
        //     'nama' => $this->request->getVar('nama'),
        //     'no_telepon' => $this->request->getVar('no_telepon'),
        //     'email' => $this->request->getVar('email'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('supplier')->where(['id_supplier' => $id])->update($data);
        return redirect()->to(site_url('supplier'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('supplier')->where(['id_supplier' => $id])->delete();
        return redirect()->to(site_url('supplier'))->with('success', 'Data Berhasil Dihapus');
    }
}
