<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Api_Sales_c extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('api_m/Api_Sales_m');
    }

    public function index_get(){
        $api = $this->Api_Sales_m->getApi();
        
        if($api){
            $this->response([
                'status' => true,
                'data' => $api
            ], RestController::HTTP_OK);
        }
    }

    public function index_post(){
        $data_Sales = [
            'SaANo' => $this->post('SaANo'),
            'SaNm' => $this->post('SaNm'),
            'SaAlmt' => $this->post('SaAlmt')
        ];

        if ($this->Api_Sales_m->createSales($data_Sales) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Sales Berhasil ditambahkan'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Sales'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete(){
        $SaANo = $this->delete('SaANo');
        if ($SaANo === null) {
            $this->response([
                'status' => false,
                'message' => 'Nomor Sales tidak ditemukan !'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Api_Sales_m->deleteSales($SaANo) > 0) {
                $this->response([
                    'status' => true,
                    'SaANo' => $SaANo,
                    'message' => 'Sales sudah dihapus'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Sales tidak ditemukan'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }
    
    public function index_put(){
        $SaANo = $this->put('SaANo');
        $data_Sales = [
            'SaANo' => $this->put('SaANo'),
            'SaNm' => $this->put('SaNm'),
            'SaAlmt' => $this->put('SaAlmt')
        ];
        if ($this->Api_Sales_m->updateSales($data_Sales, $SaANo) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Sales Berhasil diubah'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal ubah Sales'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

}