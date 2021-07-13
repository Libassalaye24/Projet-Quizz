<?php 
//define("WEB_ROUTE" , "http://localhost:8000/");
       
define("WEB_ROUTE" , "http://libasse24.alwaysdata.net/");

        define("ROUTE_DIR" , str_replace('public' ,'',$_SERVER['DOCUMENT_ROOT']));

        define('FILE_USERS', ROUTE_DIR. 'data/user.data.json');
        define("UPLOAD_DIR" , ROUTE_DIR. 'public/img/uploads/');
        
?>