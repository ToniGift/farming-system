<?php
    include_once 'db.class.php';

    class Equipments extends DB{

        function add_equipment($farmer_id,$equipment,$quantity,$status){
            return DB::execute("INSERT INTO equipments(farmer_id,equipment,quantity,status) VALUES(?,?,?,?)", [$farmer_id,$equipment,$quantity,$status]);
        }
        function fetch_equipments(){
            return DB::fetchAll("SELECT * FROM equipments",[]);
        }
        function fetch_farmer_equipments($farmer_id){
            return DB::fetchAll("SELECT * FROM equipments WHERE farmer_id = ? ",[$farmer_id]);
        }
        function fetch_equipment($id){
            return DB::fetch("SELECT * FROM equipments WHERE id = ? ",[$id] );
        }
        function update_equipment($equipment,$quantity,$status,$id){
            return DB::execute("UPDATE equipments SET equipment =?, quantity =? ,status =? WHERE id = ? ", [$equipment,$quantity,$status,$id]);
        }
        function update_equipment_status($status,$id){
            return DB::execute("UPDATE equipments SET status =? WHERE id = ? ", [$status,$id]);
        }
        function delete_equipment($id){
            return DB::execute("DELETE FROM equipments WHERE id = ? ",[$id]);
        }
    }
?>