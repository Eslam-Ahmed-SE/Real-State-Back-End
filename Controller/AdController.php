<?php
//header( "Content-Type:application/json" );

class AdController {
    public function getPageCount() {}

    public function list( $page = 1 ) {
        require( "./connection/db-connection.php" );

        $sql = "SELECT * FROM ad";
        $result = $conn->query( $sql );
        $i = 0;
        $adArray = array();

        if ( $result->num_rows > 0 ) {
            // output data of each row
            while( $row = $result->fetch_assoc() ) {
                $adArray[$i] = $row;

                $adArray[$i]["pics"] = explode( "|", $adArray[$i]["pics"] );
                $i++;
            }
        } else {
            $result = array('status'=>200,'message'=>'No data');
            $json_response = json_encode( $result );
            echo $json_response;
        }
        $conn->close();

        if ( isset( $page ) ) {
            $pageCount = 2;
            //            echo "offset " . ( $page-1 )*$pageCount;
            $json_response = json_encode( array_slice( $adArray, ( $page-1 )*$pageCount, $pageCount ) );
            echo $json_response;
        } else {
            $json_response = json_encode( $adArray );
            echo $json_response;
        }
    }

    public function add( $ad ) {
        require( "./connection/db-connection.php" );
        
        $UID = $ad['UID'];
        $pics = implode('|', $ad['pics']); 
        $price = $ad['price'];
        $address = $ad['address'];
        $type = $ad['type'];
        $furnished = $ad['furnished'];
        $sale_type = $ad['sale_type'];
        $rooms_num = $ad['rooms_num'];
        $bathrooms_num = $ad['bathrooms_num'];
        $area = $ad['area'];
        $ad_dasc = $ad['ad_dasc'];
        $contact_email = $ad['contact_email'];
        $contact_phone = $ad['contact_phone'];
        $contact_whatsapp = $ad['contact_whatsapp'];

        $sql = "INSERT INTO ad 
                (
                UID,
                pics,
                price,
                address,
                type,
                furnished,
                sale_type,
                rooms_num,
                bathrooms_num,
                area,
                ad_dasc,
                contact_email,
                contact_phone,
                contact_whatsapp
                ) VALUES (" .
                $UID . ",'" .
                $pics . "'," .
                $price . ",'" .
                $address . "'," .
                $type . "," .
                $furnished . "," .
                $sale_type . "," .
                $rooms_num . "," .
                $bathrooms_num . "," .
                $area . ",'" .
                $ad_dasc . "','" .
                $contact_email . "'," .
                $contact_phone . "," .
                $contact_whatsapp . "
                )";
            
//        echo $sql;
        
        if ( $conn->query( $sql ) === TRUE ) {
            //            echo "New record created successfully";
//            $json_response = json_encode( [{'status':200,'message':'Added successfuly'}] );
            $result = array('status'=>200,'message'=>'Added successfuly');
            $json_response = json_encode( $result );
            echo $json_response;
        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
            $result = array('status'=>500,'error'=>'Internal Server Error','message'=>$conn->error);
            $json_response = json_encode( $result );
            echo $json_response;
        }

        $conn->close();

    }

}

?>