<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $BarangModel;

    public function __construct()
    {
        $BarangModel = new BarangModel();
    }

    public function index()
    {
        $data['barang'] = $this->barang->findAll();

        return view('pages/datamaster/barang/get', $data);
    }

    public function create()
    {
        return view('pages/datamaster/barang/add');
    }

    public function store()
    {
        $barang = new BarangModel();

        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $gambarName = $file->getName();
            $file->move('img/', $gambarName);
        }

        $data = [
            'kd_barang' => $this->request->getVar('kd_barang'),
            'gambar' => $gambarName,
            'nama_brg' => $this->request->getVar('nama_brg'),
            'jenis_paket_brg' => $this->request->getVar('jenis_paket_brg'),
            'stok' => $this->request->getVar('stok'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        $barang->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('barang'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id)
    {
        $barang = new BarangModel();
        $data['barang'] = $this->barang->find($id);

        return view('pages/datamaster/barang/edit', $data);
    }

    public function update($id)
    {
        $barang = new BarangModel();
        $barang_item = $this->barang->find($id);
        $gambarName_old =  $barang_item->gambar;

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
            'jenis_paket_brg' => $this->request->getVar('jenis_paket_brg'),
            'stok' => $this->request->getVar('stok'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        $barang->update($id, $data);
        return redirect()->to(site_url('barang'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $barang = new BarangModel();
        $data = $this->barang->find($id);

        $file =  $data->gambar;
        if (file_exists("img/" . $file)) {
            unlink("img/" . $file);
        }

        $barang->delete($id);
        return redirect()->to(site_url('barang'))->with('success', 'Data Berhasil Dihapus');
    }
}
