<?php  
    class view_bill_by_patient_model extends CI_Model {

        public function get_view_bill_by_patient($id){

/*
            $data = array();*/
/*            $this->db->select('`patient`.id as patient_id, `patient`.first_name, `patient`.last_name, `patient`.middle_name, `patient`.date_created, `bill`.id as bill_id, `bill`.date, `bill`.patient_id, `bill`.guarantor_id, `bill`.patient_type, `bill`.hospital_bill, `bill`.professional_bill,
                (SELECT SUM(hospital_bill_payment) FROM transaction) as SUM1 ,
                (SELECT SUM(professional_bill_payment)FROM transaction) as SUM2 ',);

            $this->db->where('`patient_id`', $id);

            $this->db->order_by('date_created', 'DESC');
            $this->db->join('patient', 'patient.id = patient_id');

            $query = $this->db->get('bill');
            $res   = $query->result();
            //print_r($this->db->last_query());
*/
            $sql = "SELECT `patient`.`id` as `patient_id`, `patient`.`first_name`, `patient`.`last_name`, `patient`.`middle_name`,`guarantor`.`name` as name , `patient`.`date_created`, `bill`.`id` as `bill_id`, `bill`.`date`, `bill`.`patient_id`, `bill`.`guarantor_id`, `bill`.`patient_type`, `bill`.`hospital_bill`, `bill`.`professional_bill`, IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE patient_id = ?),0) as SUM1, IFNULL((SELECT SUM(professional_bill_payment)FROM transaction WHERE patient_id = ?),0) as SUM2 FROM `bill` JOIN `patient` ON `patient`.`id` = `patient_id`
            JOIN `guarantor` ON `guarantor`.`id` = `guarantor_id`
             WHERE `patient_id` = ? ORDER BY `date_created` DESC";
            $query = $this->db->query($sql, array($id, $id, $id));
            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }

        public function insert_transaction($hospital_bill_payment,$professional_bill_payment,$patient_id, $bill_id, $receipt_id, $company_id){
            $this->db->set('hospital_bill_payment', $hospital_bill_payment);
            $this->db->set('professional_bill_payment', $professional_bill_payment);
            $this->db->set('patient_id', $patient_id);
            $this->db->set('bill_id', $bill_id);
            $this->db->set('receipt_id', $receipt_id);
            $this->db->insert('transaction');
            //print_r($this->db->last_query());
            header("Location: official_receipt_list/".$company_id);
        }

        public function get_transaction($id){

            $this->db->WHERE('patient_id', $id);
            $this->db->get('transaction');
            //print_r($this->db->last_query());
        }

        public function get_unapplied($id){

        	$sql = "SELECT
			(SELECT or_amount FROM `receipt` WHERE id = ?)-
			(IFNULL(SUM(transaction.hospital_bill_payment), 0)+
			IFNULL(SUM(transaction.professional_bill_payment), 0)) AS unapplied
			FROM `transaction` WHERE `receipt_id` = ?";

			$query = $this->db->query($sql, array($id, $id));
            //print_r($this->db->last_query());
            $res   = $query->result();
            return $res;
        }

    }
?>  
