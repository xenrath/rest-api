<?php 

    use Restserver\Libraries\REST_Controller;
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class Mahasiswa extends REST_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mahasiswa_model', 'mahasiswa');
            $this->methods['index_get']['limit'] = 100;
        }

        public function index_get()
        {
            $id = $this->get('id');
            if($id === null){
                $mahasiswa = $this->mahasiswa->getMahasiswa();
            }else{
                $mahasiswa = $this->mahasiswa->getMahasiswa($id);
            }

            if($mahasiswa){
                $this->set_response([
                    'status' => TRUE,
                    'data' => $mahasiswa
                ], REST_Controller::HTTP_OK);
            }else{
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'ID NOT FOUND'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        public function index_delete()
        {
            $id = $this->delete('id');
            if ($id === null) {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Provide an ID!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }else{
                if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
                    // OK
                    $this->set_response([
                        'status' => TRUE,
                        'id' => $id,
                        'message' => 'Deleted'
                    ], REST_Controller::HTTP_OK);
                }else{
                    // ID Not Found
                    $this->set_response([
                        'status' => FALSE,
                        'message' => 'ID Not Found!'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }

        public function index_post()
        {
            $data = [
                'nrp' => $this->post('nrp'),
                'nama' => $this->post('nama'),
                'email' => $this->post('email'),
                'jurusan' => $this->post('jurusan'),
            ];

            if($this->mahasiswa->createMahasiswa($data) > 0){
                $this->set_response([
                    'status' => TRUE,
                    'message' => 'New Mahasiswa Has Been Created'
                ], REST_Controller::HTTP_CREATED);
            }else{
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Failed to Create New Data!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        public function index_put()
        {
            $id = $this->put('id');
            $data = [
                'nrp' => $this->put('nrp'),
                'nama' => $this->put('nama'),
                'email' => $this->put('email'),
                'jurusan' => $this->put('jurusan'),
            ];

            if($this->mahasiswa->updateMahasiswa($data, $id) > 0){
                $this->set_response([
                    'status' => TRUE,
                    'message' => 'Mahasiswa Has Been Updated'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Failed to Updated Data!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }