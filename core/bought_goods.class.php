<?php
    include_once 'db.class.php';

    class Bought_goods extends DB{

        function add_bought_good($farmer_id,$good_name,$price,$quantity){
            return DB::execute("INSERT INTO bought_goods(farmer_id,good_name,price,quantity) VALUES(?,?,?,?)", [$farmer_id,$good_name,$price,$quantity]);
        }
        function fetch_bought_goods(){
            return DB::fetchAll("SELECT * FROM bought_goods",[]);
        }
        function fetch_farmer_bought_goods($farmer_id){
            return DB::fetchAll("SELECT * FROM bought_goods WHERE farmer_id = ? ",[$farmer_id]);
        }
        function fetch_bought_good($id){
            return DB::fetch("SELECT * FROM bought_goods WHERE id = ? ",[$id] );
        }
        function update_bought_good($good_name,$price,$quantity,$id){
            return DB::execute("UPDATE bought_goods SET good_name = ?, price =?,quantity =? WHERE id = ? ", [$good_name,$price,$quantity,$id]);
        }
        function update_bought_good_price($price,$id){
            return DB::execute("UPDATE bought_goods SET price =? WHERE id = ? ", [$price,$id]);
        }
        function delete_bought_good($id){
            return DB::execute("DELETE FROM bought_goods WHERE id = ? ",[$id]);
        }
    }
?>