<?php

include 'config.php';

$med = $_POST['medicine'];
$qty = $_POST['quantity'];
$delivery = $_POST['delivery'];

mysqli_query($conn,
"INSERT INTO pharmacy_orders(medicine_name,quantity,delivery_type)
VALUES('$med','$qty','$delivery')");

echo "<script>
alert('Medicine Ordered Successfully');
window.location='pharmacy.html';
</script>";

?>