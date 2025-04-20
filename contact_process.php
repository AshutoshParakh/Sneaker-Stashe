<?php
if(isset($_POST['send_msg']))
{
	$conn = mysqli_connect("localhost","root","","admin");
	$query = "INSERT INTO `contact`(`name`, `email`, `subject`, `description`) VALUES ('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[message]')";
	$fire = mysqli_query($conn,$query);
	if ($fire){
		echo "<script>
		alert('Thank You For Your Important Suggestion');
		window.location.href='contact.html';
		</script>
		";
	}
}
?>