<?php  
    class remaining_balance_model extends CI_Model {

        public function get_bill(){


            $this->db->select('
                            guarantor.id AS guarantor_id,guarantor.name,guarantor.type,

    IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0) AS hospital_bill_total,
    IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0) AS professional_bill_total,
    (IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0) +
    IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0)) AS total_bill,

    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0) AS total_hospital_paid,

    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0) AS total_professional_paid,


(IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id )), 0)+


IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE  guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id ) ), 0)) AS total_paid,


IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0)
AS hospital_bill_balance,

IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0)
AS professional_bill_balance, 


((IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0))
+

IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0))

AS total_balance

');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id', 'left');
            $this->db->where('patient.deleted =', 0);
            $this->db->where('guarantor_id !=', 'null');

            $this->db->group_by("bill.id");
            $this->db->distinct();
            $query = $this->db->get('bill');
            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }


        public function get_bill_filtered($start,$end){


            $this->db->select('
            bill.id as bill_id,
            bill.date,
            bill.patient_id,
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
            patient.date_deleted as patient_date_deleted,

            guarantor.name,

            transaction.id as transaction_id,
            transaction.patient_id,
            transaction.bill_id as transaction_bill_id,
            SUM(transaction.hospital_bill_payment) as hospital_bill_payment,
            SUM(transaction.professional_bill_payment) as professional_bill_payment,
            transaction.or_amount,
            transaction.or_number,
            transaction.or_date,
            transaction.date_created,
            transaction.deleted as transaction_deleted');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id', 'left');
                        $this->db->where('patient.date_created >=', $start);
            $this->db->where('patient.date_created <=', $end);
                        $this->db->group_by("bill.id");
            $this->db->where('patient.deleted =', 0);
            $query = $this->db->get('bill');




            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }




    }
?>  
