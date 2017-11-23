<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('role')) {
			redirect('login');
		}else if($this->session->userdata('role') == 'debitur'){
			redirect('debitur');
		}
	}

	public function index()
	{
		$data['jumlahdebitur'] 			= $this->admin_model->jumlahdebitur();
		$data['seluruhhargabarang']		= $this->admin_model->seluruhpiutang();
		$data['terbayar']				= $this->admin_model->terbayarhutang();
		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('admin/dashboard_v',$data);
		$this->load->view('layout/footer');
	}

	public function datadebitur()
	{
		$data['fetch_data']=$this->admin_model->fetch_data_debitur();
		
		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('admin/datadebitur_v',$data);
		$this->load->view('layout/footer');
	}

	public function detaildebitur($id_debitur)
	{
		$data['fetch_data']				=$this->admin_model->fetch_detail_debitur($id_debitur);
		$data['fetch_history_debitur'] 	=$this->admin_model->fetch_history_debitur($id_debitur);
		$data['pembayarandebitur']      =$this->admin_model->sudahdibayardebitur($id_debitur);
		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('admin/detaildebitur_v',$data);
		$this->load->view('layout/footer');
	}

	public function konfirmasipembayaran()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('admin/konfirmasipembayaran_v');
		$this->load->view('layout/footer');
	}

	public function inputpembayaran()
	{
		$data['fetch_data']=$this->admin_model->fetch_data_debitur();

		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('admin/datadebiturbayar_v',$data);
		$this->load->view('layout/footer');
	}

	public function bayarcicilan()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('admin/formpembayaran_v');
		$this->load->view('layout/footer');
	}

	public function bayarangsurandebitur($id_debitur = false){
		$data['fetch_data'] = $this->admin_model->fetch_detail_debitur($id_debitur);

		if ($id_debitur == NULL) {
			$this->admin_model->bayarangsurandebitur();
			$this->session->set_flashdata('info','true');
			redirect('admin/inputpembayaran');
		}else{
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('admin/formpembayaran_v',$data);
			$this->load->view('layout/footer');
		}

	}

	public function registerdebitur(){
		//form validation untuk debitur
		$this->form_validation->set_rules("username", "username","required|alpha_numeric|min_length[5]",array('required' => 'harap isi Username anda','alpha_numeric'=>'tidak boleh menggunakan spasi'));
		$this->form_validation->set_rules("nama", "Nama","required|min_length[4]",array('required' => 'Harap isi username anda' ));
		$this->form_validation->set_rules("nik", "NIK","required|numeric|min_length[16]",array('required' => 'Harap Isi NIK' ));
		$this->form_validation->set_rules("alamat", "Alamat","required|min_length[10]",array('required' => 'Harap Isi Alamat Anda' ));
		$this->form_validation->set_rules("no_telp", "No Telepon","required|numeric|min_length[9]",array('required' => 'Harap Isi No Telepon' ));
		$this->form_validation->set_rules("email", "Email","required",array('required' => 'Harap Isi Email' ));
		$this->form_validation->set_rules("pekerjaan", "Pekerjaan","required",array('required' => 'Harap Isi Pekerjaan' ));
		
		
		//form validation untuk barang debitur
		$this->form_validation->set_rules("nama_barang", "Nama Barang","required",array('required' => 'Harap Isi Nama Barang' ));
		$this->form_validation->set_rules("harga_barang", "Harga Barang","required|numeric",array('required'=>'Harap Isi Harga Barang'));
		$this->form_validation->set_rules('tipe_pembayaran', 'Tipe Pembayaran', 'required',array('required'=>'Harap isi tipe pembayaran'));
		$this->form_validation->set_rules('jumlah_angsuran','Jumlah Angsuran','required',array('required'=>'Harap isi jumlah angsuran'));
		$this->form_validation->set_rules('bayar_dp', 'Bayar DP', 'required', array('required' =>'Harga DP Belum Terhitung'));
		$this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required', array('required' =>'Tanggal Selesai Belum Terhitung'));
		$this->form_validation->set_rules('tanggal_daftar', 'Tanggal Daftar', 'required', array('required' =>'Tanggal Daftar Belum Selesai'));
		if($this->form_validation->run() == FALSE) {
			$data['kddebitur'] = $this->admin_model->getkodedebitur();
			$data['kdbarang']  = $this->admin_model->getkodebarang();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('admin/registerdebitur_v',$data);
			$this->load->view('layout/footer');
		} else {
			$this->admin_model->insert_data_debitur();
			$this->admin_model->insert_barang();
			$this->admin_model->insert_pembayaran_dp();
			$this->session->set_flashdata('infoinsert', 'true');
			redirect(site_url("admin/datadebitur"));
		}
	}

	
	public function deletedebitur($id_debitur)
	{
		$this->admin_model->delete_debitur($id_debitur);
		$this->session->set_flashdata('infoedit', 'true');
		redirect(site_url("admin/datadebitur"));
	}

	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
