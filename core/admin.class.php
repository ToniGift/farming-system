<?php
    include_once 'db.class.php';
    class Admins extends DB{

        function admin_login($username,$password){
            if (DB::num_row("SELECT id FROM admins WHERE username = ? AND password = ? ", [$username,$password])) {
                return true;
            }
            else{
                return false;
            }
        }
    }
?>