<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debitur extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		if (!$this->session->has_userdata('role')) {
			redirect('login');
		}else if($this->session->userdata('role') == 'admin'){
			redirect('admin');
		}
	}

	public function index()
	{
		$data['sudahterbayar'] =$this->debitur_model->sudahterbayar();
		$data['seluruhhutang'] =$this->debitur_model->seluruhhutang();
		$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

		$this->load->view('debitur/headerdebitur_v',$data);
		$this->load->view('debitur/dashboard_v',$data);
		$this->load->view('home/footer');
	}

	public function historypembayaran()
	{
		$data['historypembayaran'] =$this->debitur_model->historypembayaran();
		$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

		$this->load->view('debitur/headerdebitur_v',$data);
		$this->load->view('debitur/historypembayaran_v',$data);
		$this->load->view('home/footer');
	}

	

	public function uploadbukti(){
		$config['upload_path'] = './assets/img/uploadbukti';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']		='9048000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('bukti_pembayaran')){
			$data['error'] = $this->upload->display_errors();
			$data['detaildata'] = $this->debitur_model->fetch_detail_debitur();
			$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

			$this->load->view('debitur/headerdebitur_v',$data);
			$this->load->view('debitur/uploadbukti_v',$data);
			$this->load->view('home/footer');
		}else{
			$data = $this->upload->data();
			$picture = $data['file_name'];
			$data['error'] = $this->upload->display_errors();
			$data['detaildata'] = $this->debitur_model->fetch_detail_debitur();
			$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

			$this->debitur_model->uploadbuktipembayaran($picture);
			$this->debitur_model->inputbayarlewatupload();
			
			$this->session->set_flashdata('info','true');
			
			$this->load->view('debitur/headerdebitur_v',$data);
			$this->load->view('debitur/uploadbukti_v',$data);
			$this->load->view('home/footer');
		}
	}

	public function kirimpesan()
	{
		$this->form_validation->set_rules('subjek', 'subjek', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['detaildata'] = $this->debitur_model->fetch_detail_debitur();
			$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

			$this->load->view('debitur/headerdebitur_v',$data);
			$this->load->view('debitur/kirimpesan_v',$data);
			$this->load->view('home/footer');	
		} else {
			$this->debitur_model->kirimpesan();
			$this->session->set_flashdata('info','true');
			redirect('debitur/kirimpesan');
		}
	}

	public function pesan()
	{
		$data['pesanmasuk'] = $this->debitur_model->pesanmasuk();
		$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

		$this->load->view('debitur/headerdebitur_v',$data);
		$this->load->view('debitur/pesan_v',$data);
		$this->load->view('home/footer');
	}

	public function detailpesan($id_pesan)
	{
		$this->debitur_model->ubahstatusbaca($id_pesan);
		$data['detailpesan'] = $this->debitur_model->detailpesan($id_pesan);
		$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

		$this->load->view('debitur/headerdebitur_v',$data);
		$this->load->view('debitur/detailpesan_v',$data);
		$this->load->view('home/footer');
	}

	public function gantipassword()
	{
		$this->form_validation->set_rules('passwordbaru', 'passwordbaru', 'trim|required|min_length[8]|alpha_numeric');
		$this->form_validation->set_rules('confirmpassword','confirmpassword','trim|required|matches[passwordbaru]');

		if ($this->form_validation->run() == FALSE) {
			$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();

			$this->load->view('debitur/headerdebitur_v',$data);
			$this->load->view('debitur/gantipassword_v');
			$this->load->view('home/footer');	
		} else {
			$this->debitur_model->gantipassword();
			$this->session->set_flashdata('info', 'true');
			redirect('debitur/gantipassword');
		}
	}

	public function detaildebitur()
	{
		$data['detaildebitur'] = $this->debitur_model->detaildebitur();
		$data['jumlahpesan']   =$this->debitur_model->jumlahpesan();
		$data['detailbarangdebitur'] = $this->debitur_model->detailbarangdebitur();
		$this->load->view('debitur/headerdebitur_v',$data);
		$this->load->view('debitur/detaildebitur_v',$data);
		$this->load->view('home/footer');
	}

	
}

/* End of file Debitur.php */
/* Location: ./application/controllers/Debitur.php */
