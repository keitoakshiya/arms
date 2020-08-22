<?php  
    class payment_summary_model extends CI_Model {

        public function get_bill(){


            $this->db->select('
            bill.id,
            bill.date,
            bill.patient_id,
            bill.guarantor_id,
            bill.patient_type,
            bill.hospital_bill,
            bill.professional_bill,
            bill.deleted,

            patient.id,
            patient.first_name,
            patient.last_name,
            patient.middle_name,
            patient.date_created,
            patient.deleted,

            guarantor.id,
            guarantor.name,
            guarantor.type,
            guarantor.deleted,

            transaction.id,
            transaction.patient_id,
            transaction.bill_id,
            SUM(transaction.hospital_bill_payment) AS hospital_bill_payment,
            SUM(transaction.professional_bill_payment) AS professional_bill_payment, `bill`.`deleted`,
            transaction.or_amount,
            transaction.or_number,
            transaction.or_date,
            transaction.date_created,
            transaction.deleted
            ');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id');
            $this->db->where('patient.deleted =', 0);
            $this->db->group_by("bill.id");
            $query = $this->db->get('bill');
            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }

        public function get_bill_filtered($start,$end){


            $this->db->select('
 bill.id,
            bill.date,
            bill.patient_id,
            bill.guarantor_id,
            bill.patient_type,
            bill.hospital_bill,
            bill.professional_bill,
            bill.deleted,

            patient.id,
            patient.first_name,
            patient.last_name,
            patient.middle_name,
            patient.date_created,
            patient.deleted,

            guarantor.id,
            guarantor.name,
            guarantor.type,
            guarantor.deleted,

            transaction.id,
            transaction.patient_id,
            transaction.bill_id,
            SUM(transaction.hospital_bill_payment) AS hospital_bill_payment,
            SUM(transaction.professional_bill_payment) AS professional_bill_payment, `bill`.`deleted`,
            transaction.or_amount,
            transaction.or_number,
            transaction.or_date,
            transaction.date_created,
            transaction.deleted
            ');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id', 'left');
            $this->db->where('patient.date_created >=', $start);
            $this->db->where('patient.date_created <=', $end);
            $this->db->where('patient.deleted =', 0);
            $this->db->group_by("bill.id");
            $query = $this->db->get('bill');
            //print_r($this->db->last_query());
            $res   = $query->result();
            return $res;
        }


    }
?>  

