<?php
    include_once 'db.class.php';

    class Products extends DB{

        function add_product($farmer_id,$product_name,$price,$description,$status){
            return DB::execute("INSERT INTO products(farmer_id,product_name,price,description,status) VALUES(?,?,?,?,?)", [$farmer_id,$product_name,$price,$description,$status]);
        }
        function fetch_products(){
            return DB::fetchAll("SELECT * FROM products",[]);
        }
        function fetch_farmer_products($farmer_id){
            return DB::fetchAll("SELECT * FROM products WHERE farmer_id = ? ",[$farmer_id]);
        }
        function fetch_product($id){
            return DB::fetch("SELECT * FROM products WHERE id = ? ",[$id] );
        }
        function update_product($product_name,$price,$description,$status,$id){
            return DB::execute("UPDATE products SET product_name =? , price =?,description =?, status = ? WHERE id = ? ", [$product_name,$price,$description,$status,$id]);
        }
        function update_product_status($status,$id){
            return DB::execute("UPDATE products SET status =? WHERE id = ? ", [$status,$id]);
        }
        function delete_product($id){
            return DB::execute("DELETE FROM products WHERE id = ? ",[$id]);
        }
        function products_num(){
            return DB::num_row("SELECT id FROM products ", []);
        }
    }
?>