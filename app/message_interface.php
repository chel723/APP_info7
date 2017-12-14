<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Message Us</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Handlee" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main_style.css">

</head>
<body>
  <?php include ("main_header.php");?>
  <?php include ("main_nav.php");?>
  
  <div class=">
<h1 id="title">Message Us</h1>
<form class="form-inline" action="email.php" method="POST">


<input placeholder="Subject" class="form-control" type="text" name="subject" size="30"><br>


<textarea placeholder="Message" class="form-control" rows="20" cols="35" name="message"></textarea><br>


<input id="login"  type="submit" name="submit" value="submit">


</form>
</div>


  <div>
<?php include ("main_footer.php");?>
</div>
</body>
</html>
