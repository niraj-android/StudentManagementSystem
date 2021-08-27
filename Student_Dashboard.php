<?php
session_start();
if(!isset($_SESSION['name'])){
echo "u r logged out";
header('location:Student_Login.php');
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function fun(s){
s.classList.toggle("change");
 var x = document.getElementById("nav");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

}

</script>
<style>
body{margin:0;
padding:0;
background-color:grey;}

.a1,.a2,.a3{
width:35px;
height:5px;
background-color:white;
margin:6px 2px;
transition:0.4s;
}

.change .a1 {
  -webkit-transform: rotate(-50deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change .a2 {opacity: 0;}

.change .a3 {
  -webkit-transform: rotate(50deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}
.humburger{
cursor:pointer;
}
.items a{
text-decoration:none;
text-size:15px;
color:black;
padding: 14px 16px;
}
.items a:hover{
cursor:pointer;
background-color:white;
-ms-transform:scale(1.005);
-webkit-transform:scale(1.005);
transfrom:scale(1.005);
}
</style>
</head>
<body>
<?php
$_SESSION['sname']=$_SESSION['name'];


?>
<div style="position:relative;height:1000px">

<div style="width:100%;background-color:black;margin:0; position:fixed;">
<div class="humburger" onclick="fun(this)" style="height:40px; width:35px;" >
<div class="a1"  ></div>
<div class="a2" ></div>
<div class="a3" ></div>
</div>
</div>

<div class="parent" id="nav" style="height:150px;width:500px;background-color:#ddd;display:none;position:absolute; top:46px;left:0">
<div class="items">
<a href="Student_Dashboard.php" style="display:block;"><i class="fa fa-home" style="padding-right:4px;"></i>Home</a>
<a href="marks.php" style="display:block;"><i class="fa fa-graduation-cap" style="padding-right:2px;"></i>My Result</a>
<a href="Student_Logout.php" style="display:block;"><i class="fa fa-power-off" style="padding-right:4px;"></i>Logout</a>

</div>
</div>

<div class="bady" style="display:inline-block;height:50%;width:50%;margin-top:10%;margin-left:40%;overflow:none;">
<div style="corner-radius:50px;height:300px;width:300px;">
<img src="BackgroundImg.png" height=300px width=300px style="border-radius:50%;">
<center><h3><?php echo $_SESSION['name']; ?></h3></center>
<center><h4> Regn. No.:<?php echo $_SESSION['sregn']; ?></h6></center>
<center><h4><?php echo $_SESSION['dname']; ?></h6></center>
</div>
</div>

</div>

</body>
</html>
