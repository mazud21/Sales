<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model');
    }

    public function index_get(){
        $api = $this->Api_model->getApi();
        
        if($api){
            $this->response([
                'status' => true,
                'data' => $api
            ], RestController::HTTP_OK);
        }
    }
}