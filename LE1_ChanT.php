<!DOCTYPE html>
<html>
<head>
  <title>FLAMES by Timothy Chan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed');

body {
	font-family: 'Barlow Semi Condensed', sans-serif;
	background: url(https://i0.wp.com/css-tricks.com/wp-content/uploads/2020/11/css-gradient.png?fit=1200%2C600&ssl=1) no-repeat center center fixed;
	background-size: cover;
}
.user-img {
	margin-top: -50px;
}
.user-img img {
	height: 100px;
	width: 100px;
}
.main-section {
	margin: 0 auto;
	margin-top: 150px;
	padding: 0;
}
.modal-content {
	background-color: #34495e;
	opacity: .95;
}
.user-name {
	margin: 10px 0;
}
.user-name h1 {
	font-size: 30px;
	color: #ccd6d7;
}
.form-input button {
	width: 100%;
	margin-bottom: 20px;
}
.btn-success {
	background-color: #2ecc71;
	border: 1px solid #2ecc71;
}
.btn-success:hover {
	background-color: #27ae60;
	border: 1px solid #27ae60;
}
.link-part {
	background-color: #ecf0f1;
	padding: 15px;
	border-radius: 0 0 5px 5px;
	border-top: 1px solid #c2c2c2;
}
</style>

</head>

<body>

  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="https://www.freeiconspng.com/uploads/facebook-circle-heart-love-png-4.png">
        </div>
        <div class="col-12 user-name">
          <h1>FLAMES</h1>
        </div>
        <div class="col-12 form-input">
          <form method="post" action="LE1_ChanT.php">
            <div class="form-group">
              <input type="text" name="name1" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input type="text" name="name2" class="form-control" placeholder="Crush's Name" required>
            </div>
            <button type="submit" class="btn btn-danger" name = "flames" value="Send">Get Results</button>
		  </form>
        </div>
        <div class="col-12 link-part">
		<?php
$input1 = $_POST['name1'];
$input2 = $_POST['name2'];

$newinput1 = str_replace(' ', '', $input1);
$newinput2 = str_replace(' ', '', $input2);
$uppercase1 = strtoupper($newinput1);
$uppercase2 = strtoupper($newinput2);
$split1 = str_split($uppercase1);
$split2 = str_split($uppercase2);

$result = $uppercase1 . $uppercase2; #- I concatenated the string here
$array1 = str_split($result);

$duplicate = implode(array_unique(array_intersect($split1, $split2))); #- filters out the common characters.
$array2 = str_split($duplicate);

$clean1 = array_diff($array1, $array2); 

$count1 = array_count_values($clean1); #- count the number of characters (filtered common characters)
$count2 = array_count_values($array1); #- count the number of characters (original input)

$sum1 = array_sum($count1);
$sum2 = array_sum($count2);
$difference = $sum2 - $sum1; #- getting the difference of original and the one with common characters. (in number)
$modulo = $difference % 6; #-calculation

#echo ($difference); #- test purposes lang to check number of common characters.
#echo ($modulo); #- test purposes lang to check naman yung modulo.

if ($modulo == 0) {
    echo "<font color = Black>$input1 and $input2 are <font color = Red>Soulmates";
} elseif ($modulo == 1) {
    echo "<font color = Black>$input1 and $input2 are <font color = Red>Friends";
} elseif ($modulo == 2) {
    echo "<font color = Black>$input1 and $input2 are <font color = Red>Lovers";
} elseif ($modulo == 3) {
    echo "<font color = Black>$input1 and $input2 are <font color = Red>Anger";
} elseif ($modulo == 4) {
    echo "<font color = Black>$input1 and $input2 are <font color = Red>Married";
} elseif ($modulo == 5) {
    echo "<font color = Black>$input1 and $input2 are <font color = Red>Engaged";
}
?>
		</div>
      </div>
    </div>
  </div>

<footer class="container-fluid text-center">
  <p><font color = white>Chan, Timothy Kyle B. OL151<font color = white></p>
</footer>

</body>
</html>