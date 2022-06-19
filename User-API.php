<?php
header('Content-Type: application/json');

require("Controller/UserController.php");
$obje = new UserController();

$Q = explode("/", $_SERVER["QUERY_STRING"]);

switch ($Q[0]){
    case "get":
        if (isset($Q[1]) && $Q[1] === "lastid"){
            $result = array('Last ID'=>$obje->getLastID()) ;
            
            $json_response = json_encode( $result );
            echo $json_response;
        }
        elseif (isset($Q[1]) && is_numeric($Q[1])){
            // get a specific record
            $obje->get($Q[1]);
        }
        else {
            http_response_code(400);
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Requested parameter error');
            $json_response = json_encode( $result );
            echo $json_response;
        }
        break;
    case "add":
        $result = $obje->add($_POST);

        $json_response = json_encode( $result );
        echo $json_response;
        break;
    case "update":
        $result = $obje->update($_POST);
        $json_response = json_encode( $result );        
        echo $json_response;
        break;
    case "delete":
        if (isset($Q[1]) && is_numeric($Q[1]))
            $result = $obje->delete($Q[1]);
        else
            $result = array('status'=>400,'error'=>'invalid request','message'=>'Send a correct ID number');
        $json_response = json_encode( $result );
        echo $json_response;
        break;
    default:
        $result = array('status'=>400,'error'=>'invalid request','message'=>'Requested parameter error');
        $json_response = json_encode( $result );
        echo $json_response;
}

?>