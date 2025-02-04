<?php
    include_once 'db.class.php';

    class Farmers extends DB{

        function register_farmer($fullname,$username,$email,$password,$address){
            return DB::execute("INSERT INTO farmers(`fullname`, `username`, `email`, `password`, `address`) VALUES(?,?,?,?,?)", [$fullname,$username,$email,$password,$address]);
        }
        function fetch_farmers(){
            return DB::fetchAll("SELECT * FROM farmers",[]);
        }
        function fetch_farmer($email){
            return DB::fetch("SELECT * FROM farmers WHERE email = ? OR id = ? ",[$email,$email] );
        }
        function fetch_farmer_id($email){
            $req = DB::fetch("SELECT * FROM farmers WHERE email = ? ",[$email] );
            return $req['id'];
        }
        function update_farmer($fullname,$username,$email,$address,$id){
            return DB::execute("UPDATE farmers SET fullname =? ,username =?,email =?,address =? WHERE id = ? ", [$fullname,$username,$email,$address,$id]);
        }
        function update_password($password,$id){
            return DB::execute("UPDATE farmers SET password =? WHERE id = ? ", [$password,$id]);
        }
        function farmers_num(){
            return DB::num_row("SELECT id FROM farmers ", []);
        }
        function check_email($email){
            return DB::num_row("SELECT id FROM farmers WHERE email = ? ", [$email]);
        }
        function farmer_login($email,$password){
            if (DB::num_row("SELECT id FROM farmers WHERE email = ?   AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }
    }
?>