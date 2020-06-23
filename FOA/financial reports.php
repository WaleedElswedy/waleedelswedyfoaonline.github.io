<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PORT = 8889;
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect("$DATABASE_HOST:$DATABASE_PORT", $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());}
	// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT fname, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($fname, $email);
$stmt->fetch();
$stmt->close();
?>
<!doctype html>
<html lang = "en">
<head> <link rel = "icon" type = "image/png" href = "images/1.png"/>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
       <meta charset = "utf-8">
       <link rel="stylesheet" href="css/stylemain3.css">
       <style>
			 nav >a {background-color: transperancy ;font-size: 160%;color:red;padding-right: 7%;font-weight: bold ;
				 border-radius: 25px;text-decoration: overline;}
				 iframe{display:inline-block;width: 87%;height: 38.2em;position:relative;right:-7%;top:10%;}
			 </style>
        <script src="js/scriptmain.js"></script>
       <title>التقرير المالى</title>
</head>
<body id="body">
          <header>
                <h1 id="name">مرحبـــا أ/ <?=$fname?></h1>
								<div id="welcomenote">
								<div class="transbox"><p> اتشــرف بخدمتكــم أ/وليـد رمضـان السويـدى </p></div></div>
                <nav>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    <a href="menu3.php" class="mainlinks"><b>قائمـة 3 </a>
                    <a href="menu2.php" class="mainlinks" ><b>قائمـة 2 </a>
                    <a href="financial reports.php" class="mainlinks" id="active" ><b>التقريـر المالـى </a>
                    <a href="home.php" class="mainlinks" ><b>الرئيسيـة </a>
                </nav>
          </header>

					<iframe src="1/<?=$_SESSION['id']?>.pdf"></iframe>
