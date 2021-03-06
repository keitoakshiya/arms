<?php  
class patients_model extends CI_Model {

    public function get_patients(){

        $sql ="SELECT `patient`.`id` as `patient_id`,
        `patient`.`first_name` as `first_name`,
        `patient`.`last_name` as `last_name`,
        `patient`.`middle_name` as `middle_name`,
        DATE_FORMAT(`patient`.`date_created`, '%b %d %Y') as date_created,
        `patient`.`deleted` as `patient_deleted`,
        `patient`.`suffix` as suffix,
        `patient`.`registry_no` as registry_no,
        `bill`.`id` as `bill_id`,
        `bill`.`date` as `bill_date`,
        `bill`.`patient_type` as `patient_type`,
        `bill`.`hospital_bill` as `hospital_bill`,
        `bill`.`professional_bill` as `professional_bill`,
        `bill`.`deleted` as `bill_deleted`,
        `guarantor`.`id` as `guarantor_id`,
        `guarantor`.`name` as `guarantor_name`,
        `guarantor`.`type` as `guarantor_type`,
        `guarantor`.`deleted` as `guarantor_deleted` FROM `patient` JOIN `bill` ON `patient`.`id` = `patient_id` LEFT JOIN `guarantor` ON `guarantor`.`id` = `guarantor_id` WHERE `patient`.`deleted` = '0' AND `patient`.`date_created` >= (SELECT concat(year(now()),'-1-1') year_start) AND `patient`.`date_created` <= (SELECT date(now()) now)";
        $query = $this->db->query($sql);
        $res   = $query->result();
            //print_r($this->db->last_query());  
        return $res;
    }
    #Date filter of patients
    public function get_patients_filtered($start,$end){

        $this->db->select('`patient`.`id` as patient_id,
            `patient`.`first_name` as first_name,
            `patient`.`last_name` as last_name,
            `patient`.`middle_name` as middle_name,
            `patient`.`suffix` as suffix,
            `patient`.`registry_no` as registry_no,
            DATE_FORMAT(`patient`.`date_created`, "%b %d %Y") as date_created,
            `patient`.`deleted` as patient_deleted,
            `bill`.`id` as bill_id,
            `bill`.`date` as bill_date,
            `bill`.`patient_type` as patient_type,
            `bill`.`hospital_bill` as hospital_bill,
            `bill`.`professional_bill` as professional_bill,
            `bill`.`deleted` as bill_deleted,
            `guarantor`.`id` as guarantor_id,
            `guarantor`.`name` as guarantor_name,
            `guarantor`.`type` as guarantor_type,
            `guarantor`.`deleted` as guarantor_deleted,'
        );
        $this->db->join('bill', 'patient.id = patient_id');
        $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
        $this->db->where('date_created >=', $start);
        $this->db->where('date_created <=', $end);
        $this->db->where('`patient`.`deleted` =', '0');
        $query = $this->db->get('patient');

        $res   = $query->result();
            //print_r($this->db->last_query());  
        return $res;

    }

    public function get_patient($a){ 

        $this->db->select('`patient`.`id` as patient_id,
            `patient`.`first_name` as first_name,
            `patient`.`last_name` as last_name,
            `patient`.`middle_name` as middle_name,
            `patient`.`suffix` as suffix, 
            

            
            `patient`.`date_created` as date_created,'
        );

        $this->db->where('`bill`.`patient_id` =', $a);
        $this->db->join('patient', 'patient.id = patient_id');
        $this->db->join('guarantor', 'guarantor.id = guarantor_id');
        $query = $this->db->get('bill');
        $res   = $query->result();
            //print_r($this->db->last_query());  
        return $res;
    }

    public function update_patient($id,$fname,$mname,$lname,$suffix){
        $this->db->set('first_name', $fname);
        $this->db->set('middle_name', $mname);
        $this->db->set('last_name', $lname);
        $this->db->set('suffix', $suffix);
        
        $this->db->where('id', $id);
        $this->db->update('patient');


            //print_r($this->db->last_query()); 

        header("Location: patients");
    }

}
?>  
