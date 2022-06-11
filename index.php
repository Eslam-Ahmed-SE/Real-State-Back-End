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
        if (isset($Q[1]) && $Q[1] === "page")
            $page=$Q[2];
        $obje->list($page);
        break;
    case "add":

        var_dump(http_response_code(400));
        if (!isset($_POST['UID']) || $_POST['UID']===null || empty($_POST['UID']))
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'UID');
        elseif (!isset($_POST['pics']) || $_POST['pics']===null || empty($_POST['pics'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'pics');
        elseif (!isset($_POST['price']) || $_POST['price']===null || empty($_POST['price'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'price');
        elseif (!isset($_POST['address']) || $_POST['address']===null || empty($_POST['address'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'address');
        elseif (!isset($_POST['type']) || $_POST['type']===null || empty($_POST['type'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'type');
        elseif (!isset($_POST['furnished']) || $_POST['furnished']===null || empty($_POST['furnished'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'furnished');
        elseif (!isset($_POST['sale_type']) || $_POST['sale_type']===null || empty($_POST['sale_type'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'sale_type');
        elseif (!isset($_POST['rooms_num']) || $_POST['rooms_num']===null || empty($_POST['rooms_num'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'rooms_num');
        elseif (!isset($_POST['bathrooms_num']) || $_POST['bathrooms_num']===null || empty($_POST['bathrooms_num'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'bathrooms_num');
        elseif (!isset($_POST['area']) || $_POST['area']===null || empty($_POST['area'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'area');
        elseif (!isset($_POST['ad_dasc']) || $_POST['ad_dasc']===null || empty($_POST['ad_dasc'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'ad_dasc');
        elseif (!isset($_POST['contact_email']) || $_POST['contact_email']===null || empty($_POST['contact_email'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'contact_email');
        elseif (!isset($_POST['contact_phone']) || $_POST['contact_phone']===null || empty($_POST['contact_phone'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'contact_phone');
        elseif (!isset($_POST['contact_whatsapp']) || $_POST['contact_whatsapp']===null || empty($_POST['contact_whatsapp'])) 
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'contact_whatsapp');
        else {
            var_dump(http_response_code(200));
            $result = array(array('status'=>200,'message'=>'Done'), array('UID'=>$_POST['UID']));
        }

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