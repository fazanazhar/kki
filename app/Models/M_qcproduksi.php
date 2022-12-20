<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_qcproduksi extends Model
{
    protected $table = 'data_qc_produksi';
    protected $primaryKey = 'Q1_No';     
    protected $allowedFields = ['Q1_PIC', 'Q1_Datetime', 'P_KodeKontainer', 'Q1_KodeKontainer', 'Q1_KodeBatch','Q1_NamaProduk','Q1_QTY','Q1_Kategori','P_Report'];

    function qc_produksi_list(){
        $db      = \Config\Database::connect();
		$builder = $db->table('data_qc_produksi');
        $query   = $builder->get();
        return $query;
    }

    function qc_produksi_save(){
		$data = array(				
				'Q1_PIC' 			=> $this->input->post('Q1_PIC'), 
				'Q1_Datetime' 			=> $this->input->post('Q1_Datetime'), 
				'P_KodeKontainer' 	=> $this->input->post('P_KodeKontainer'), 
				'Q1_KodeKontainer' 		=> $this->input->post('Q1_KodeKontainer'), 
				'Q1_KodeBatch' 		=> $this->input->post('Q1_KodeBatch'), 
				'Q1_NamaProduk' 		=> $this->input->post('Q1_NamaProduk'), 
				'Q1_QTY' 		=> $this->input->post('Q1_QTY'), 
				'Q1_Kategori' 		=> $this->input->post('Q1_Kategori'), 
				'P_Report' 		=> $this->input->post('P_Report'), 
			);
		$result=$this->db->insert('data_qc_produksi',$data);
		return $result;
	}

    function qc_produksi_update(){
		$Q1_No=$this->input->post('Q1_No');
		$Q1_PIC=$this->input->post('Q1_PIC');
		$Q1_Datetime=$this->input->post('Q1_Datetime');
		$P_KodeKontainer=$this->input->post('P_KodeKontainer');
		$Q1_KodeKontainer=$this->input->post('Q1_KodeKontainer');
		$Q1_KodeBatch=$this->input->post('Q1_KodeBatch');
		$Q1_NamaProduk=$this->input->post('Q1_NamaProduk');
		$Q1_QTY=$this->input->post('Q1_QTY');
		$Q1_Kategori=$this->input->post('Q1_Kategori');
		$P_Report=$this->input->post('P_Report');
		$this->db->set('Q1_PIC', $Q1_PIC);
		$this->db->set('Q1_Datetime', $Q1_Datetime);
		$this->db->set('P_KodeKontainer', $P_KodeKontainer);
		$this->db->set('Q1_KodeKontainer', $Q1_KodeKontainer);
		$this->db->set('Q1_KodeBatch', $Q1_KodeBatch);
		$this->db->set('Q1_NamaProduk', $Q1_NamaProduk);
		$this->db->set('Q1_QTY', $Q1_QTY);
		$this->db->set('Q1_Kategori', $Q1_Kategori);
		$this->db->set('P_Report', $P_Report);
		$this->db->where('Q1_No', $Q1_No);
		$result=$this->db->update('data_qc_produksi');
		return $result;	
	}

    function qc_produksi_delete(){
		$Q1_No=$this->input->post('Q1_No');
		$this->db->where('Q1_No', $Q1_No);
		$result=$this->db->delete('data_qc_produksi');
		return $result;
	}	

    public function getDatatables(){
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
}