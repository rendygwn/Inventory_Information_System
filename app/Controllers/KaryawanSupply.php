<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class KaryawanSupply extends BaseController
{
    public function index()
    {
        // Cara 1 : Query Builder
        $builder = $this->db->table('karyawansupply');
        $query = $builder->get();

        // Cara 2 : Query Manual
        // $query = $this->db->query("SELECT * FROM karyawansupply");

        $data['karyawansupply'] = $query->getResult();

        return view('pages/karyawansupply/get', $data);
    }

    public function create()
    {
        return view('pages/karyawansupply/add');
    }

    public function store()
    {
        // Cara 1 : Tambah Data
        $data = $this->request->getPost();


        // // Cara 2 : Lebih Spesifik
        // $data = [
        //     'nip' => $this->request->getVar('nip'),
        //     'nama' => $this->request->getVar('nama'),
        //     'no_telepon' => $this->request->getVar('no_telepon'),
        //     'email' => $this->request->getVar('email'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('karyawansupply')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('karyawansupply'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('karyawansupply')->getWhere(['id_karyawan' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['karyawansupply'] = $query->getRow();
                return view('pages/karyawansupply/edit', $data);
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
        //     'nip' => $this->request->getVar('nip'),
        //     'nama' => $this->request->getVar('nama'),
        //     'no_telepon' => $this->request->getVar('no_telepon'),
        //     'email' => $this->request->getVar('email'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('karyawansupply')->where(['id_karyawan' => $id])->update($data);
        return redirect()->to(site_url('karyawansupply'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('karyawansupply')->where(['id_karyawan' => $id])->delete();
        return redirect()->to(site_url('karyawansupply'))->with('success', 'Data Berhasil Dihapus');
    }
}
