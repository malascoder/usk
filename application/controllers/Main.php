<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class main extends CI_Controller{

         public function __construct(){
             parent::__construct();
             if($this->session->userdata('masuk')!=TRUE){
                 redirect(base_url('login'));
             }
            
         }

        public function index(){
            $data['list'] = $this->Crm_model->list_bayar();
            $this->load->view('index_admin',$data);
        }

        public function petugas(){
            $data['list'] = $this->Crm_model->list_bayar();
            $this->load->view('index_petugas',$data);
        }

        public function siswa(){
            $data['list'] = $this->Crm_model->list_bayar();
            $this->load->view('index_siswa',$data);
        }

        public function list(){
            // $data['list'] = $this->Crm_model->list_bayar()->result();
            $this->load->view('index_admin',$data);
        }

        public function keluar(){
            $data['listsuratkeluar'] = $this->smp_model->listsuratkeluar();
            $this->load->view('out_keluar',$data);
        }

        public function input(){
            $this->load->view('pay_in');
        }

        public function in_keluar(){
            $this->load->view('in_keluar');
        }

        public function register(){
            $this->load->view('register');
        }

        public function reg(){
            $this->Crm_model->registersimpan();
            redirect(base_url('main/index_admin'));
        }

        public function pay(){
            $this->Crm_model->pembayaran();
            redirect(base_url('main/input'));
        }

        
    }
?>
    