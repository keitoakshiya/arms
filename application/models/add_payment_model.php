<?php  
    class add_payment_model extends CI_Model {

        public function get_bill(){

            $this->db->select('
            bill.id as bill_id,
            bill.date,
            bill.guarantor_id,
            bill.patient_type,
            bill.hospital_bill,
            bill.professional_bill,
            bill.deleted as bill_deleted,
            patient.id as patient_id,
            patient.first_name,
            patient.last_name,
            patient.middle_name,
            patient.date_created as patient_date_created,
            patient.deleted as patient_deleted,
            guarantor.id as guarantor_id,
            guarantor.name as guarantor_name,
            guarantor.type as guarantor_type,
            guarantor.deleted as guarantor_deleted,
            transaction.id as transaction_id,
            transaction.patient_id as transaction_patient_id,
            transaction.bill_id,
            transaction.hospital_bill_payment,
            transaction.professional_bill_payment,
            transaction.or_amount,
            transaction.or_number,
            transaction.or_date,
            transaction.date_created as transaction_datecreated,
            transaction.deleted as transaction_deleted



            ');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id', 'left');
            $this->db->where('patient.deleted =', 0);
            //$this->db->where('guarantor.id =', $a);
            $query = $this->db->get('bill');

            $res   = $query->result();
            return $res;
        }



    }
?>  

