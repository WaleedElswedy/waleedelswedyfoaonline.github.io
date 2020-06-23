<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!doctype html>
<html lang = "en">
<head> <link rel = "icon" type = "image/png" href = "images/1.png"/>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
       <meta charset = "utf-8">
       <link rel="stylesheet" href="css/stylemain.css">
       <style>
			 nav >a {background-color: transperancy ;font-size: 170%;color:red;padding-right: 5%;font-weight: bold ;
				 border-radius: 25px;text-decoration: none;font-style: oblique;}
			 </style>
        <script src="js/scriptmain.js"></script>
       <title>قائمة 2</title>
</head>
<body id="body">
          <header>
                <h1 id="name">مرحبـــا أ/ <?=$_SESSION['name']?>.</h1>
                <h2 id="welcomenote">اتشرف بخدمتكم أ / وليد رمضان السويدى </h2>
                <nav>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    <a href="menu3.php" class="mainlinks"><b>قائمـة 3 </a>
                    <a href="menu2.php" class="mainlinks"  id="active"><b>قائمـة 2 </a>
                    <a href="financial reports.php" class="mainlinks" ><b>التقريـر المالـى </a>
                    <a href="home.php" class="mainlinks"><b>الرئيسيـة </a>
                </nav>
          </header>
          <section id="section1"></section>
          <section id="section2">قائمة2</section>
