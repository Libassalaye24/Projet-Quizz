<?php
    function open_session(){
        if (session_status()==PHP_SESSION_NONE) {
            session_start();
        }
    }
    function destroy_session() {
        session_destroy();
    }
    function est_connect():bool{
       return isset($_SESSION['userConnect']);
    }
    function est_joueur():bool{
        return est_connect() && $_SESSION['userConnect']['role']=='ROLE_JOUEUR';
    }
    function est_admin():bool{
        return est_connect() && $_SESSION['userConnect']['role']=='ROLE_ADMIN';
    }
?>