<?php
    namespace App\Controllers;
    use App\Models\ModelDosen;

    class Dosen extends BaseController
    {
        public function index()
        {
            $ModelDosen = new ModelDosen();
            $pager = \Config\Services::pager();

            $data = array (
                'ModelDosen' => $ModelDosen->paginate(10, 'dosen'),
                'pager' => $ModelDosen->pager
            );

            return view('dosen', $data);
        }

        public function update($id)
        {
            $model = new ModelDosen();   
            $data['dosen'] = $model->getDosenById($id)->getRow();
            echo view('dosen_edit', $data);
        }

        public function edit()
        {
            $model = new ModelDosen();
            $id = $this->request->getPost('id_dosen');
            $data = array (
                'nama_dosen'  => $this->request->getPost('nama_dosen'),
                'mata_kuliah' => $this->request->getPost('mata_kuliah'),
                'no_hp' => $this->request->getPost('no_hp'),
            );
            $model->updateDosen($data, $id);
            return redirect()->to('/dosen');

        }

        public function delete($id)
        {
            $model = new ModelDosen();
            $model->deleteDosen($id);
            return redirect()->to('/dosen');
        }

        public function input()
        {
            echo view('input_dosen');
        }

        public function insert()
        {
            $model = new ModelDosen();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama_dosen'  => $this->request->getPost('nama_dosen'),
                'mata_kuliah' => $this->request->getPost('mata_kuliah'),
                'no_hp' => $this->request->getPost('no_hp'),
            );
            $model->insertDosen($data);
            return redirect()->to('/dosen');   
        }

    }
    

?>