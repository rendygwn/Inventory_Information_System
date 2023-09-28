<?php

namespace App\Controllers;

use App\Models\SatuanBarangModel;

class SatuanBarang extends BaseController
{
    protected $SatuanBarangModel;

    public function __construct()
    {
        $SatuanBarangModel = new SatuanBarangModel();
    }

    public function index()
    {
        $data['satuanbarang'] = $this->satuanbarang->findAll();

        return view('pages/datamaster/satuanbarang/get', $data);
    }

    public function create()
    {
        return view('pages/datamaster/satuanbarang/add');
    }

    public function store()
    {
        $satuanbarang = new SatuanBarangModel();

        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $gambarName = $file->getName();
            $file->move('img/', $gambarName);
        }

        $data = [
            'kd_barang' => $this->request->getVar('kd_barang'),
            'gambar' => $gambarName,
            'nama_brg' => $this->request->getVar('nama_brg'),
            'jenis_brg' => $this->request->getVar('jenis_brg'),
            'satuan_brg' => $this->request->getVar('satuan_brg'),
            'stok' => $this->request->getVar('stok'),
        ];

        $satuanbarang->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('satuanbarang'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id)
    {
        $satuanbarang = new SatuanBarangModel();
        $data['satuanbarang'] = $this->satuanbarang->find($id);

        return view('pages/datamaster/satuanbarang/edit', $data);
    }

    public function update($id)
    {
        $satuanbarang = new SatuanBarangModel();
        $satuan_brg_item = $this->satuanbarang->find($id);
        $gambarName_old =  $satuan_brg_item->gambar;

        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists("img/" . $gambarName_old)) {
                unlink("img/" . $gambarName_old);
            }
            $gambarName = $file->getName();
            $file->move('img/', $gambarName);
        } else {
            $gambarName = $gambarName_old;
        }

        $data = [
            'kd_barang' => $this->request->getVar('kd_barang'),
            'gambar' => $gambarName,
            'nama_brg' => $this->request->getVar('nama_brg'),
            'jenis_brg' => $this->request->getVar('jenis_brg'),
            'satuan_brg' => $this->request->getVar('satuan_brg'),
            'stok' => $this->request->getVar('stok'),
        ];

        $satuanbarang->update($id, $data);
        return redirect()->to(site_url('satuanbarang'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $satuanbarang = new SatuanBarangModel();
        $data = $this->satuanbarang->find($id);

        $file =  $data->gambar;
        if (file_exists("img/" . $file)) {
            unlink("img/" . $file);
        }

        $satuanbarang->delete($id);
        return redirect()->to(site_url('satuanbarang'))->with('success', 'Data Berhasil Dihapus');
    }
}
