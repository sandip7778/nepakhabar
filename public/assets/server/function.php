
<?php 
include('config.php');



function site_url($url){
    if ($url=="") {
        echo 'http://localhost/sfnepal/';
    }else {
        echo 'http://localhost/sfnepal/'.$url;
    }
   
}


function Count_data($conn,$table_name){
    
    $sql= "SELECT COUNT(*) as Total_Nos FROM $table_name ";
    $result = $conn->query($sql);
    $data;
    if ($result->num_rows>0) {
        $row = $result->fetch_assoc();
        $data = $row['Total_Nos'];
    } else{
        $data = 0;
    }
    return $data;
}


function Table_Data($conn,$table_name){
    $sql= "SELECT * FROM $table_name ORDER BY id DESC";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) { 
            $data[]=$row; 
        }
    } 
    return $data;
}

function Table_Data_limint($conn,$table_name,$limint){
    $sql= "SELECT * FROM $table_name ORDER BY id DESC LIMIT $limint ";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) { 
            $data[]=$row; 
        }
    } 
    return $data;
}
// Conditional data show like where and column name 
function Table_Data_con($conn,$table_name,$col_n,$data){
    $sql= "SELECT * FROM $table_name WHERE $col_n='$data' ORDER BY id DESC";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) { 
            $data[]=$row; 
        }
    } else {
        $data = array(
            "code"=>"300",
        );
    }
    return $data;
}

function Table_Data_2con($conn,$table_name,$col_n1,$data1,$col_n2,$data2){
    $sql= "SELECT * FROM $table_name WHERE $col_n1='$data1' AND $col_n2='$data2' ORDER BY id DESC";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) { 
            $data[]=$row; 
        }
    } else {
        $data = array(
            "code"=>"300",
        );
    }
    return $data;
}

// Join Table
function Table_Data_full($conn,$table_name,$c_name,$c_name2,$j_t_name,$J_c_name,$j_t_name2,$J_c_name2){
    // c= Colum 
    // j= join 
    //  ORDER BY $table_name.id DESC
    // t=table
    $data = array();
        $sql= "SELECT * FROM $table_name INNER JOIN $j_t_name ON $table_name.$c_name=$j_t_name.$J_c_name JOIN $j_t_name2 ON $table_name.$c_name2=$j_t_name2.$J_c_name2 ORDER BY id DESC";
        $result = $conn->query($sql);
       
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) { 
                $data[]=$row; 
            }
        }
    return $data;
}
function Table_Data_full_cond($conn,$table_name,$c_name,$c_name2,$j_t_name,$J_c_name,$j_t_name2,$J_c_name2,$WHER_C,$wdata){
    // c= Colum 
    // j= join 
    //  ORDER BY $table_name.id DESC
    // t=table
    $data = array();
        $sql= "SELECT * FROM $table_name INNER JOIN $j_t_name ON $table_name.$c_name=$j_t_name.$J_c_name JOIN $j_t_name2 ON $table_name.$c_name2=$j_t_name2.$J_c_name2 WHERE $table_name.$WHER_C='$wdata' ";
        $result = $conn->query($sql);
       
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) { 
                $data[]=$row; 
            }
        }
    return $data;
}

function Table_Data_2_join_w($conn,$table_name,$c_name,$j_t_name,$J_c_name){
    // c= Colum 
    // j= join 
    //  ORDER BY $table_name.id DESC
    // t=table
    $data = array();
        $sql= "SELECT * FROM $table_name INNER JOIN $j_t_name ON $table_name.$c_name = $j_t_name.$J_c_name";
        $result = $conn->query($sql);
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) { 
                $data[]=$row; 
            }
        }
        
    return $data;
}

function Table_Data_2_join($conn,$table_name,$c_name,$j_t_name,$J_c_name,$where_data,$col_name){
    // c= Colum 
    // j= join 
    //  ORDER BY $table_name.id DESC
    // t=table
    $data = array();
        $sql= "SELECT * FROM $table_name INNER JOIN $j_t_name ON $table_name.$c_name=$j_t_name.$J_c_name WHERE $table_name.$where_data='$col_name' ";
        $result = $conn->query($sql);
       
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) { 
                $data[]=$row; 
            }
        }
    return $data;
}

function update($mysqli,$data){
    $status_id = $_SESSION['store_id'];
    $up_stmt= $mysqli->prepare("UPDATE `device` SET `store_id`=?");
            $up_stmt->bind_param('s',$data);
            $up_stmt->execute();
            if ($up_stmt) { 
                        //if its sucessfull
            echo json_encode(array(
                "code" => 200,"message" => "Update successfully !",
            ));
    
            }else{
                echo json_encode(array(
                    "code" => 300,"message" => "Upload Failed fail !",
                ));
            }
}

function payment_status($data){
    $status;
    if ($data==0) {
        $status ="Pending";
    }else if ($data==1) {
        $status ="Complete";
    }else if ($data==2) {
        $status ="Reject";
    }
    return $status;
}

function status_with_color($data){
    $status;
    if ($data==0) {
        $status ="<div class='badge badge-danger'>In active</div>";
    }else if ($data==1) {
        $status ="<div class='badge badge-success'>Active</div>";
    }else{
        $status ="<div class='badge badge-success'>Invalid</div>";
    }
    return $status;
}

function event_status($data){
    $status;
    if ($data==0) {
        $status ="<div class='badge badge-danger'>In active</div>";
    }else if ($data==1) {
        $status ="<div class='badge badge-success'>Active</div>";
    }else if ($data==2) {
        $status ="<div class='badge badge-success'>Upcomming</div>";
    }else if ($data==3) {
        $status ="<div class='badge badge-success'>Complete</div>";
    }else{
        $status ="<div class='badge badge-success'>Invalid</div>";
    }
    return $status;
}


function month_num_to_name($data){
   // Declare month number and initialize it 
// Create date object to store the DateTime format 
$dateObj = DateTime::createFromFormat('!m', $data); 
// Store the month name to variable 
$monthName = $dateObj->format('F'); 
// Display output 

    return $monthName;
}



?>