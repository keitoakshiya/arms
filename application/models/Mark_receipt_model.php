<?php  
    class mark_receipt_model extends CI_Model {


        public function mark_receipts($a){

		$this->db->set('distributed', 1, FALSE);
		$this->db->where('id', $a);
		$this->db->update('receipt');
            header("Location: ../company_list");

        }
    }
?>
