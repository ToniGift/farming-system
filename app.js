$('#registerForm').submit(function(e) {
	$('#messageArea').fadeOut();
	e.preventDefault();
	$.ajax({
        url:'farmer/php/register.php',
        type: 'POST',
        data : $('#registerForm').serialize(),
        beforeSend: function(){
        	$('#messageArea').text('Loading');
        },
        success: function(data){
            if (data == 1) {
            	window.location.href = 'farmer/dashboard.php';
            }
            else{
            	$('#messageArea').html(data);
            }
            console.log(data);
        }
    })
    $('#messageArea').fadeIn();
});

$('#loginForm').submit(function(e) {
	$('#messageArea').fadeOut();
	e.preventDefault();
	$.ajax({
        url:'farmer/php/login.php',
        type: 'POST',
        data : $('#loginForm').serialize(),
        beforeSend: function(){
        	$('#messageArea').text('Loading');
        },
        success: function(data){
            if (data == 1) {
            	window.location.href = 'farmer/dashboard.php';
            }
            else{
            	$('#messageArea').html(data);
            }
        }
    })
    $('#messageArea').fadeIn();
});

$('#addProductForm').submit(function(e) {
    $('#messageArea').fadeOut();
    e.preventDefault();
    $.ajax({
        url:'php/add_product.php',
        type: 'POST',
        data : new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function(){
            $('#messageArea').text('Loading');
        },
        success: function(data){
            if (data == 1) {
                window.location.href = 'products_list.php';
            }
            else{
                $('#messageArea').html(data);
            }
        }
    })
    $('#messageArea').fadeIn();
});




$('#addEquipmentForm').submit(function(e) {
    $('#messageArea').fadeOut();
    e.preventDefault();
    $.ajax({
        url:'php/add_equipment.php',
        type: 'POST',
        data : $('#addEquipmentForm').serialize(),
        beforeSend: function(){
            $('#messageArea').text('Loading');
        },
        success: function(data){
            if (data == 1) {
                window.location.href = 'equipments.php';
            }
            else{
                $('#messageArea').html(data);
            }
        }
    })
    $('#messageArea').fadeIn();
});



$('#updateEquipmentForm').submit(function(e) {
    $('#messageArea').fadeOut();
    e.preventDefault();
    $.ajax({
        url:'php/update_equipment.php',
        type: 'POST',
        data : $('#updateEquipmentForm').serialize(),
        beforeSend: function(){
            $('#messageArea').text('Loading');
        },
        success: function(data){
            if (data == 1) {
                window.location.href = 'equipments.php';
            }
            else{
                $('#messageArea').html(data);
            }
        }
    })
    $('#messageArea').fadeIn();
});


$('#addBoughtItemForm').submit(function(e) {
    $('#messageArea').fadeOut();
    e.preventDefault();
    $.ajax({
        url:'php/add_bought_item.php',
        type: 'POST',
        data : $('#addBoughtItemForm').serialize(),
        beforeSend: function(){
            $('#messageArea').text('Loading');
        },
        success: function(data){
            if (data == 1) {
                window.location.href = 'bought_items.php';
            }
            else{
                $('#messageArea').html(data);
            }
        }
    })
    $('#messageArea').fadeIn();
});



