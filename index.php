<?php
header('Content-Type: application/json');

require("Controller/AdController.php");
$obje = new AdController();

$Q = explode("/", $_SERVER["QUERY_STRING"]);

// echo $Q[0];
// echo $Q[1];
// echo $Q[2];

$page = null;

switch ($Q[0]){
    case "view":
    case "list":
        if (isset($Q[1]) && $Q[1] === "page" && is_numeric($Q[2])){
            $page=$Q[2];
        }

        if($page>$obje->getNumberOfPages()){
            http_response_code(406);
            $result = array('status'=>406,'error'=>'invalid request','message'=>'Max pages is ' . $obje->getNumberOfPages());
            $json_response = json_encode( $result );
            echo $json_response;
        }
        else{
            $obje->list($page);
        }
        
        break;
    case "get":
        if (isset($Q[1]) && $Q[1] === "numberofpages"){
            $result = array('Number of pages'=>$obje->getNumberOfPages()) ;
            
            $json_response = json_encode( $result );
            echo $json_response;
        }
        elseif (isset($Q[1]) && $Q[1] === "lastid"){
            $result = array('Last ID'=>$obje->getLastID()) ;
            
            $json_response = json_encode( $result );
            echo $json_response;
        }
        elseif (isset($Q[1]) && is_numeric($Q[1])){
            // get a specific record
            echo "getting a specific record";
        }
            
        
        break;
    case "add":
        // echo $_POST['UID'] . " pics " . var_dump($_FILES['pics']);
        $result = $obje->add($_POST, $_FILES['pics']);

        $json_response = json_encode( $result );
        echo $json_response;

        // $ad["UID"]=12;
        // $ad["pics"]=array("pic/1.png","pic/2.png");
        // $ad["price"]=12;
        // $ad["address"]="12 asd";
        // $ad["type"]=1;
        // $ad["furnished"]=1;
        // $ad["sale_type"]=1;
        // $ad["rooms_num"]=1;
        // $ad["bathrooms_num"]=1;
        // $ad["area"]=1;
        // $ad["ad_dasc"]="asd asd";
        // $ad["contact_email"]="asd@asd.asd";
        // $ad["contact_phone"]=123;
        // $ad["contact_whatsapp"]=12323;
        break;
    default:
        $result = array('status'=>400,'error'=>'invalid request','message'=>'Requested parameter error');
        $json_response = json_encode( $result );
        echo $json_response;
}

// $obje->getNumberOfPages();


$ad["UID"]=12;
$ad["pics"]=array("pic/1.png","pic/2.png");
$ad["price"]=12;
$ad["address"]="12 asd";
$ad["type"]=1;
$ad["furnished"]=1;
$ad["sale_type"]=1;
$ad["rooms_num"]=1;
$ad["bathrooms_num"]=1;
$ad["area"]=1;
$ad["ad_dasc"]="asd asd";
$ad["contact_email"]="asd@asd.asd";
$ad["contact_phone"]=123;
$ad["contact_whatsapp"]=12323;
                    
//$obje->add($ad);





?>