<?php  
class or_list_patient_model extends CI_Model {

    public function get_or_patient(){

        $this->db->select('
            bill.id,
            bill.deleted,
            DATE_FORMAT(`bill`.`date`, "%b %d %Y") as date,
            bill.patient_id,
            patient.first_name,
            patient.middle_name,
            patient.last_name,
            bill.guarantor_id,
            bill.patient_type,
            bill.hospital_bill,
            bill.professional_bill,
            (bill.professional_bill+bill.hospital_bill) AS total_bill,

            `guarantor`.`name`,
            
            ');

            $this->db->join('bill', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            
            $this->db->where('`patient`.`deleted` =', '0');
            /*$this->db->where('`guarantor`.`id` =', $a);*/
            $query = $this->db->get('patient');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }



}
?>  

