<?php  
    class patient_json extends CI_Model {

        public function get_patient_json(){
            $con =  mysqli_connect('localhost','root','','arms');
            $sqldata = mysqli_query($con,"SELECT * FROM `patient`");

            $rows = array();

            $query = $this->db->query('SELECT * FROM patient');
            while($r = mysqli_fetch_assoc($sqldata)) {
              $rows[] = $r;
            }
/*            foreach ($query as $key => $r) {
                 $rows[] = $r;
            }
*/

            return json_encode($rows);
        }



    }
?>  