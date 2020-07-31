<?php  
    class dashboard_model extends CI_Model {  
        public function top_10_bar() { 
            $this->db->select('guarantor.name as g_name,`guarantor_id` AS g_id,

        (SELECT IFNULL(SUM(`hospital_bill`)+SUM(`professional_bill`),0) FROM bill WHERE patient_type =1 AND guarantor_id = g_id) AS inpatient,
        (SELECT IFNULL(SUM(`hospital_bill`)+SUM(`professional_bill`),0) FROM bill WHERE patient_type =2 AND guarantor_id = g_id) AS outpatient,
        (SELECT IFNULL(SUM(`hospital_bill`)+SUM(`professional_bill`),0) FROM bill WHERE patient_type =3 AND guarantor_id = g_id) AS emergency


         ', FALSE);
         
         $this->db->group_by("guarantor_id");
         $this->db->limit(10);
         $this->db->join('guarantor','bill.guarantor_id = guarantor.id','left');
         $query = $this->db->get('bill');
         $res   = $query->result();
         //print_r($this->db->last_query());  
         return $res;
        }

        public function guarantor_distribution() {
            $this->db->select('guarantor.name,COUNT(patient_type) as count', FALSE);
            $this->db->group_by("guarantor_id");

            $this->db->join('guarantor','bill.guarantor_id = guarantor.id','left');
            $query = $this->db->get('bill');
            $res   = $query->result();
            print_r($this->db->last_query());  
            return $res;
        }
        public function patient_type_distribution() {
            $this->db->select("CASE 
    WHEN patient_type = 1 THEN 'Inpatient' 
    WHEN patient_type = 2 THEN 'Outpatient' 
    WHEN patient_type = 3 THEN 'Emergency'
END AS patient_type2
,
COUNT(patient_type) as count ", FALSE);
            $this->db->group_by("patient_type");


            $query = $this->db->get('bill');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }

    }  
?>  