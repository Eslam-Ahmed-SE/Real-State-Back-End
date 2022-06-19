<?php
class UserController {
    
    public function getLastID() {
        require( "./connection/db-connection.php" );
        
        $sql = "SELECT * FROM user";
        $result = $conn->query( $sql );
        $i = 0;
        $userArray = array();

        if ( $result->num_rows > 0 ) {
            // output data of each row
            while( $row = $result->fetch_assoc() ) {
                $userArray[$i] = $row;
                $i++;
            }
        } else {
            return 0;
        }
        $conn->close();
        
        return $userArray[$i-1]['ID'];
    }

    public function get( $UID=null ) {
        require( "./connection/db-connection.php" );

        $sql = "SELECT * FROM user where UID=".$UID;
        $result = $conn->query( $sql );
        $i = 0;
        $userArray = array();

        if ( $result->num_rows > 0 ) {
            // output data of each row
            while( $row = $result->fetch_assoc() ) {
                $userArray[$i] = $row;
                $i++;
            }
        } else {
            $resultSQL = array('status'=>200,'message'=>'Not found');
            $json_response = json_encode( $resultSQL );
            echo $json_response;
        }
        $conn->close();

        $json_response = json_encode( $userArray );
        echo $json_response;

    }

    public function add( $user) {
        require( "./connection/db-connection.php" );
        
        http_response_code(400);
        if (!isset($user['UID']) || $user['UID']===null || empty($user['UID']))
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'UID');
        elseif (!isset($user['permission']) || $user['permission']===null || empty($user['permission'])) 
            return array('status'=>400,'error'=>'invalid request','message'=>'Request body error', 'Missing'=>'permission');
        
        $UID = $user['UID'];
        $permission = $user['permission'];
        

        $sql = "INSERT INTO user 
                (ID,
                UID,
                permission
                ) VALUES (" .
                $this->getLastID()+1 . "," .
                $UID . "," .
                $permission . "
                )";
        if ( $conn->query( $sql ) === TRUE ) {
            http_response_code(200);
            $result = array('status'=>200,'message'=>'Added successfuly');
            return $result;
        } else {
            http_response_code(500);
            $result = array('status'=>500,'error'=>'Internal Server Error','message'=>$conn->error);
            return $result;
        }

        $conn->close();

    }

    public function update($user){
        require( "./connection/db-connection.php" );
        
        $sql = "UPDATE user SET ";
        $paramSet = false;
        
        http_response_code(400);
        if (!isset($user['ID']) || $user['ID']===null || empty($user['ID']))
            return array('status'=>400,'error'=>'invalid request','message'=>'user id was not found', 'Missing'=>'ID');
    
        if (isset($user['UID'])){
            if( $user['UID'] != null || !empty($user['UID'])){
                $sql .= "UID=" . $user['UID'];
                $paramSet =true;
            }
        }
            
        if (isset($user['permission'])){
            if( $user['permission'] != null || !empty($user['permission'])){
                $sql.= $paramSet?",":"";
                $sql .= "permission=" . $user['permission'];
                $paramSet =true;
            }
        }
        

        if ($paramSet){
            $sql .= " WHERE ID=" . $user['ID'];
        }
        else {
            return array('status'=>400,'error'=>'invalid request','message'=>'No parameter was found', 'Missing'=>'UID | permission');
        }
        
        if ( $conn->query( $sql ) === TRUE ) {
            
            if($conn->affected_rows === 0) {
                http_response_code(400);
                //not modified if id was not found or values are the same
                $result = array('status'=>400,'message'=>'Not Modified');
                return $result;
            }

            elseif($conn->affected_rows > 0){
                http_response_code(200);
                $result = array('status'=>200,'message'=>'Updated successfuly ');
                return $result;
            }
            
            
        } else {
            http_response_code(500);
            $result = array('status'=>500,'error'=>'Internal Server Error','message'=>$conn->error);
            return $result;
        }

        $conn->close();
    }

    public function delete($id) {
        require( "./connection/db-connection.php" );

        // sql to delete a record
        $sql = "DELETE FROM user WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            //Query finished successfully
            if($conn->affected_rows === 0){
                http_response_code(400);
                $result = array('status'=>400,'error'=>'Bad Request','message'=>'No rows affected, ID was not found');
            }
            elseif($conn->affected_rows > 0) {
                http_response_code(200);
                $result = array('status'=>200,'message'=>'Deleted successfuly');
            }
            
            return $result;
        } else {
            http_response_code(500);
            $result = array('status'=>500,'error'=>'Internal Server Error','message'=>$conn->error);
            return $result;
        }

        $conn->close();
    }

}

?>