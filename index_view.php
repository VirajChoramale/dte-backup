<?php



ob_start();
include('index.php');
ob_end_clean();
$CI =& get_instance();
$CI->load->library('session'); //if it's not autoloaded in your CI setup


$role = $CI->session->userdata('role');
$username = $CI->session->userdata('username');
$inst_id = $CI->session->userdata('inst_id');

$auth = $CI->session->userdata('auth');
$otp_auth = $CI->session->userdata('inst_id');


@$pcode = $_POST['pcode'];





if($username!='' && $auth!='')
{
    
    
    $query = $CI->db->query("SELECT * FROM qp_details WHERE paper_code='$pcode'");
    $res   = $query->result_array();
    
    $paper_code = $res[0]['paper_code'];
    if($res[0]['paper_code']!='')
    {
            
            
            $query1 = $CI->db->query("SELECT * FROM inst_time_table_master WHERE exam_center='$inst_id' and paper_code='$pcode'");
            $res1   = $query1->result_array();
    
            if(count($res1) > 0 or $role=='ADMIN')
            {
                
              
                $query2 = $CI->db->query("select * from down_log where username='$username' and pcode='$pcode' and `active`='1'");
                $res2   = $query2->result_array();
				if(!empty($res2))
				{
                $down_ip = $res2[0]['ip_addr'];
				}else
				{
				$down_ip = '';
				}
                if(count($res2) == 0 or $role=='ADMIN')
                {
                 $ip = $_SERVER['REMOTE_ADDR'];
                $sql_in = "INSERT INTO `down_log`(`username`,`inst_id`,`pcode`, `time_a`,`ip_addr`,`other`,`active`) VALUES ('$username','$inst_id','$pcode',now(),'$ip','$_SERVER[HTTP_USER_AGENT]','1')";
                
                $CI->db->query($sql_in);
                
                // Store the file name into variable
                $file = 'uploads/'.$res[0]['doc'];
                $filename =  $res[0]['paper_code'].'.pdf';
                
                // Header content type
                header('Content-type: application/pdf');

                header('Content-Disposition: attachment; filename="' . $filename . '"');
                
                header('Content-Transfer-Encoding: binary');
                
                header('Accept-Ranges: bytes');
                
                // Read the file
                
                        @readfile($file);
                         echo "<script>window.close();</script>";
                }else
                {
                    echo "You Have Already Downlaoded $paper_code Question Paper File On IP : $down_ip";
                }
        }else
            {
                echo "This Paper Not Applicable to Your Institute ";
            }
    }else 
    {
        echo "Not Found";
    }
    
}else
{
    echo "Please Login";
}

?>
