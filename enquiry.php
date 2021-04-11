<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];


$conn = new mysqli('localhost:3307','root','','keywordsmapping');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into enquiry(name, email, contact, enquiry)
		values(?, ?, ?, ?)");
	$stmt->bind_param("ssss",$name, $email, $phone, $subject);
	$stmt->execute();
	echo "registration successfully....";
	$stmt->close();
	$conn->close();

	header('location:index.php');
}
?>