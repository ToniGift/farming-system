<?php
    include_once 'db.class.php';

    class Sales extends DB{

        function add_sale($product_id,$quantity,$total_amount){
            return DB::execute("INSERT INTO sales(product_id,quantity,total_amount) VALUES(?,?,?)", [$product_id,$quantity,$total_amount]);
        }
        function fetch_sales(){
            return DB::fetchAll("SELECT * FROM sales",[]);
        }
        function fetch_farmer_sales($farmer_id){
            return DB::fetchAll("SELECT product_name, sales.quantity, sales.id, total_amount, time_sold FROM sales JOIN products on products.id = sales.product_id WHERE products.farmer_id = ? ",[$farmer_id]);
        }
        function fetch_sale($id){
            return DB::fetch("SELECT product_name, sales.quantity, sales.id, total_amount, time_sold, product_id FROM sales JOIN products on products.id = sales.product_id WHERE sales.id = ? ",[$id] );
        }
        function update_sale($quantity,$total_amount,$id){
            return DB::execute("UPDATE sales SET quantity =?,total_amount =? WHERE id = ? ", [$quantity,$total_amount,$id]);
        }
        function update_sale_status($status,$id){
            return DB::execute("UPDATE sales SET status =? WHERE id = ? ", [$status,$id]);
        }
        function delete_sale($id){
            return DB::execute("DELETE FROM sales WHERE id = ? ",[$id]);
        }
        function sales_num(){
            return DB::num_row("SELECT id FROM sales ", []);
        }
    }
?>