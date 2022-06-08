<?php
//header("Content-Type:application/json");

class AdController {
    public function list($page = 1) {
        require( "./connection/db-connection.php" );

        $sql = "SELECT * FROM ad";
        $result = $conn->query( $sql );
        $i = 0;
        $adArray = array();

        if ( $result->num_rows > 0 ) {
            // output data of each row
            while( $row = $result->fetch_assoc() ) {
                $adArray[$i] = $row; 
                $adArray[$i]["pics"] = explode("|",$adArray[$i]["pics"]);
                $i++;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        
        if (isset($page)){
            $pageCount = 2;
//            echo "offset " . ($page-1)*$pageCount;
            $json_response = json_encode(array_slice($adArray, ($page-1)*$pageCount, $pageCount ));
            echo $json_response;
        }
        else{
            $json_response = json_encode($adArray);
            echo $json_response;
        }
    }
}



?>