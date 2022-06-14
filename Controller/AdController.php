<?php
//header( "Content-Type:application/json" );
$pageCount = 5;
class AdController {
    
    public function getLastID() {
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
            return 0;
            // $json_response = json_encode( $result );
            // echo $json_response;
        }
        $conn->close();
        
        return $adArray[$i-1]['ID'];
        // $json_response = json_encode( $result );
        // echo $json_response;
    }

    public function getNumberOfPages() {
        global $pageCount;
        require( "./connection/db-connection.php" );
        
        $sql = "SELECT * FROM ad";
        $result = $conn->query( $sql );
        $i = 0;
        $adArray = array();
        // echo "getting number of pages";
        if ( $result->num_rows > 0 ) {
            // output data of each row
            while( $row = $result->fetch_assoc() ) {
                $adArray[$i] = $row;

                $adArray[$i]["pics"] = explode( "|", $adArray[$i]["pics"] );
                $i++;
            }
        } else {
            return 0;
            // $json_response = json_encode( $result );
            // echo $json_response;
        }
        $conn->close();
        
        return ceil(count($adArray)/$pageCount);
        // $json_response = json_encode( $result );
        // echo $json_response;
    }

    public function list( $page = 1 ) {
        global $pageCount;
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
            //            echo "offset " . ( $page-1 )*$pageCount;
            $json_response = json_encode( array_slice( $adArray, ( $page-1 )*$pageCount, $pageCount ) );
            echo $json_response;
        } else {
            $json_response = json_encode( $adArray );
            echo $json_response;
        }
    }

    public function add( $ad, $pics) {
        require( "./connection/db-connection.php" );
        
        http_response_code(400);
        if (!isset($ad['UID']) || $ad['UID']===null || empty($ad['UID']))
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'UID');
        elseif (!isset($pics) || $pics===null || empty($pics)) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'pics, isset: '. (isset($pics)?'true':'false') );
        elseif (!isset($ad['price']) || $ad['price']===null || empty($ad['price'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'price');
        elseif (!isset($ad['address']) || $ad['address']===null || empty($ad['address'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'address');
        elseif (!isset($ad['type']) || $ad['type']===null || empty($ad['type'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'type');
        elseif (!isset($ad['furnished']) || $ad['furnished']===null || empty($ad['furnished'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'furnished');
        elseif (!isset($ad['sale_type']) || $ad['sale_type']===null || empty($ad['sale_type'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'sale_type');
        elseif (!isset($ad['rooms_num']) || $ad['rooms_num']===null || empty($ad['rooms_num'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'rooms_num');
        elseif (!isset($ad['bathrooms_num']) || $ad['bathrooms_num']===null || empty($ad['bathrooms_num'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'bathrooms_num');
        elseif (!isset($ad['area']) || $ad['area']===null || empty($ad['area'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'area');
        elseif (!isset($ad['ad_dasc']) || $ad['ad_dasc']===null || empty($ad['ad_dasc'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'ad_dasc');
        elseif (!isset($ad['contact_email']) || $ad['contact_email']===null || empty($ad['contact_email'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'contact_email');
        elseif (!isset($ad['contact_phone']) || $ad['contact_phone']===null || empty($ad['contact_phone'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'contact_phone');
        elseif (!isset($ad['contact_whatsapp']) || $ad['contact_whatsapp']===null || empty($ad['contact_whatsapp'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'contact_whatsapp');
        // else {
        //     // http_response_code(200);
        //     // $result = array(array('status'=>200,'message'=>'Done'), array('UID'=>$_POST['UID']));
        //     $result = $obje->add($_POST);
        // }

        $UID = $ad['UID'];
        
        $picsName = $this->uploadAndGetNames($pics, $this->getLastID()+1); 
        if (($picsName === false))
            return array('status'=>500,'error'=>'Internal Server Error','message'=>'Error Uploading pictures');
        $picsName = implode('|', $picsName); 
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
                $picsName . "'," .
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
            
    //    echo $sql;
        
        if ( $conn->query( $sql ) === TRUE ) {
            //            echo "New record created successfully";
//            $json_response = json_encode( [{'status':200,'message':'Added successfuly'}] );
            http_response_code(200);
            $result = array('status'=>200,'message'=>'Added successfuly');
            return $result;
            // $json_response = json_encode( $result );
            // echo $json_response;
        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
            http_response_code(500);
            $result = array('status'=>500,'error'=>'Internal Server Error','message'=>$conn->error);
            return $result;
            // $json_response = json_encode( $result );
            // echo $json_response;
        }

        $conn->close();

    }

    public function uploadAndGetNames($pics, $adID){
        $target_dir = "./pics/";

        // echo " pics " . var_dump($pics);
        // echo " pics name" . var_dump($pics['name'][0]);
        $fileCount = count($pics['name']);

        // echo "file count is " . $fileCount;

        $error = false;
        $picNames = array();

        for ($i = 0; $i < $fileCount; $i++) {
            $target_file = $target_dir . $adID . "-" . basename($pics['name'][$i]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Check if image file is a actual image or fake image
            $check = getimagesize($pics["tmp_name"][$i]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }

            // // Check if file already exists
            // if (file_exists($target_file)) {
            //     // echo "Sorry, file already exists.";
            //     $uploadOk = 0;
            // }

            // Check file size
            if ($pics["size"][$i] > 5000000) {
                // echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // echo "Sorry, your file was not uploaded.";
                $error = true;
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($pics["tmp_name"][$i], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $pics["name"][$i])). " has been uploaded.";
                    array_push($picNames, $target_file);
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                    $error=true;
                }
            }

            
        }

        if(!$error){
            return $picNames;
        }
        else {
            return false;
        }

    }

}

?>