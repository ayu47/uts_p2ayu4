<?php
    namespace App\Controllers;
    use App\Models\ModelMahasiswa;

    class Mahasiswa extends BaseController
    {
        public function index()
        {
            $ModelMahasiswa = new ModelMahasiswa();
            $pager = \Config\Services::pager();

            $data = array (
                'ModelMahasiswa' => $ModelMahasiswa->paginate(10, 'mahasiswa'),
                'pager' => $ModelMahasiswa->pager
            );

            return view('mahasiswa', $data);
        }

        public function update($id)
        {
            $model = new ModelMahasiswa();   
            $data['mahasiswa'] = $model->getMahasiswaById($id)->getRow();
            echo view('mahasiswa_edit', $data);
        }

        public function edit()
        {
            $model = new ModelMahasiswa();
            $id = $this->request->getPost('id_mahasiswa');
            $data = array (
                'nama_mahasiswa'  => $this->request->getPost('nama_mahasiswa'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
            );
            $model->updateMahasiswa($data, $id);
            return redirect()->to('/mahasiswa');

        }

        public function delete($id)
        {
            $model = new ModelMahasiswa();
            $model->deleteMahasiswa($id);
            return redirect()->to('/mahasiswa');
        }

        public function input()
        {
            echo view('input_mahasiswa');
        }

        public function insert()
        {
            $model = new ModelMahasiswa();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama_mahasiswa'  => $this->request->getPost('nama_mahasiswa'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
            );
            $model->insertMahasiswa($data);
            return redirect()->to('/mahasiswa');   
        }

    }
    

?>