<?php 
    function to_uploads(array $files):bool{
       
        
        $uploadfile = UPLOAD_DIR . basename($files['file1']['name']);
        if (move_uploaded_file($files['file1']['tmp_name'], $uploadfile)) {
            return true;

        }else{
            return false;
        }
          
        
    } 
?>