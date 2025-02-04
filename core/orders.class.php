<?php
    include_once 'db.class.php';

    class Orders extends DB{

        function add_order($user_id,$product_id,$quantity){
            return DB::execute("INSERT INTO orders(user_id,product_id,quantity) VALUES(?,?,?)", [$user_id,$product_id,$quantity]);
        }
        function fetch_orders(){
            return DB::fetchAll("SELECT * FROM orders",[]);
        }
        function fetch_product_orders($product_id){
            return DB::fetchAll("SELECT * FROM orders WHERE product_id ? ",[$product_id]);
        }
        function fetch_farmer_orders($farmer_id){
            return DB::fetchAll("SELECT product_name,price, orders.status, quantity, orders.id FROM orders 
                JOIN products on orders.product_id = products.id
                JOIN farmers on products.farmer_id = farmers.id
                WHERE farmer_id = ? ",[$farmer_id]);
        }
        function fetch_order($id){
            return DB::fetch("SELECT * FROM orders WHERE id = ? ",[$id] );
        }
        function delete_order($id){
            return DB::execute("DELETE FROM orders WHERE id ? ",[$id]);
        }
    }
?>