<?php
    include_once 'db.class.php';

    class Farms extends DB{

        function add_farm($farmer_id,$farm_name,$description,$address){
            return DB::execute("INSERT INTO farms(farmer_id,farm_name,description,address) VALUES(?,?,?)", [$farmer_id,$farm_name,$description,$address]);
        }
        function fetch_farms(){
            return DB::fetchAll("SELECT * FROM farms",[]);
        }
        function fetch_farmer_farms($farmer_id){
            return DB::fetchAll("SELECT * FROM farms WHERE farmer_id ? ",[$farmer_id]);
        }
        function fetch_farm($id){
            return DB::fetch("SELECT * FROM farms WHERE id = ? ",[$id] );
        }
        function update_farm($fullname,$othernames,$email,$id){
            return DB::execute("UPDATE farms SET fullname =? ,othernames =?,email =? WHERE id = ? ", [$fullname,$othernames,$email,$id]);
        }
        function farms_num(){
            return DB::num_row("SELECT id FROM farms ", []);
        }
        function farmer_farms_num($farmer_id){
            return DB::num_row("SELECT id FROM farms WHERE farmer_id ? ",[$farmer_id]);
        }

        function delete_farm($id){
            return DB::execute("DELETE FROM farms WHERE id ? ",[$id]);
        }
    }
?>