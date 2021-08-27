<?php
session_start();
if(!isset($_SESSION['tname'])){
echo "u r logged out";
header('location:Teacher_Login.php');
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


function opennew(){
var x=document.getElementById("newwork");
var y=document.getElementById("home");
var z=document.getElementById("Editwork");
if(x.style.display === "inline-block"){
x.style.display="none";
}
else{x.style.display="inline-block";
y.style.display="none";
z.style.display="none";
}
}
function openold(){
var x=document.getElementById("Editwork");
var y=document.getElementById("home");
var z=document.getElementById("newwork");

if(x.style.display === "inline-block"){
x.style.display="none";
}
else{x.style.display="inline-block";
y.style.display="none";
z.style.display="none";
}
}

window.onload=function(){
var v=document.getElementById('nav');
document.onclick=function(e){
if((e.target.id !== 'nav' )&&( e.target.id !== 'bar') ){
v.style.display='none';

}
};
};

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


button {   
       background-color:#F64E60;   
       width: 50%;  
        color: black;   
        padding: 15px;   
        margin: 10px ;   
        border: none;   
        cursor: pointer;   
         }   
 form {   margin:auto;
        border: 3px solid #f1f1f1;
   width:500px; 
  position:center;
border-radius:10px;
    }   
 input[type=text], input[type=password] {   
        width: 90%;   
        margin: 8px;  
        padding: 12px ;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   


</style>
</head>
<body style="overflow:hidden">
<?php
$_SESSION['subname']=$_SESSION['tsname'];
$con= mysql_connect('localhost','root','995438');
if(!$con){
echo '<script>alert("Unable to connect to database")</script>';
exit();
}
$db=mysql_select_db("studentdb",$con);
if(!db){
echo '<script>alert("Unable to connect to database")</script>';
exit();
}

if(isset($_POST['submit'])){
	$p_sroll = $_POST['s_roll']; 
	$p_score = $_POST['s_score'];
        $p_subject=$_SESSION['sname']; 

$duplicate="select m_sname from mark where m_subject='$p_subject' and m_sroll='$p_sroll'";
$query1=mysql_query($duplicate);
$q1=mysql_num_rows($query1);

if($q1){ echo '<script> alert("Student already exist") </script>';}

else{

 $find="select m_sname from student where m_sroll='$p_sroll'";
$query=mysql_query($find);
$q=mysql_num_rows($query);
if($q){
$row = mysql_fetch_array($query); 
$kk="create table if not exists mark (m_sname varchar(40), m_sroll varchar(40),m_subject varchar(40), m_score int)";
mysql_query($kk);
$sub=$_SESSION['tsname'];
$sl="insert into mark values('$row[0]','$p_sroll','$sub','$p_score')";
mysql_query($sl);
echo '<script> alert("SUCCESSFULLY ADDED")</script>';
}
else{
echo '<script>alert("Invalid roll number")</script>';
}
}
}

 if(isset($_POST['submit1'])){
	$p_sroll = $_POST['s_roll']; 
	$p_score = $_POST['s_score'];
 $p_subject=$_SESSION['tsname'];
$find="select m_sname from mark where m_subject='$p_subject'";
$query=mysql_query($find);
$q=mysql_num_rows($query);

if($q){
$sl="update mark set m_score='$p_score' where m_sroll='$p_sroll' and m_subject='$p_subject'";
mysql_query($sl);
echo '<script> alert("SUCCESSFULLY UPDATED")</script>';
} else{ echo '<script> alert("Student does not exist") </script>';}

}


?>



<div style="position:relative;height:1000px; overflow:initial">

<div id="bar" style="width:100%;background-color:black;margin:0; position:fixed;">
<div id ="bar" class="humburger" onclick="fun(this)" style="height:40px; width:35px;" >
<div class="a1"  ></div>
<div class="a2" ></div>
<div class="a3" ></div>
</div>
</div>

<div class="parent" id="nav" style="height:230px;width:500px;background-color:#ddd;display:none;position:absolute; top:46px;left:0;overflow:initial;">
<div class="items">
<a href="Teacher_Dashboard.php" style="display:block;"><i class="fa fa-home" style="padding-right:4px;"></i>Home</a>
<a onclick="opennew();" style="display:block;"><i class="fa fa-plus-square-o" style="padding-right:4px;"></i>Add Score of a Student</a>
<a onclick="openold();" style="display:block;"><i class="fa fa-edit" style="padding-right:4px;"></i>Edit a Student's Score</a>
<a href="seeMarks.php" style="display:block;"><i class="fa fa-graduation-cap" style="padding-right:2px;"></i>Student's Score</a>
<a href="logout.php" style="display:block;"><i class="fa fa-power-off" style="padding-right:4px;"></i>Logout</a>

</div>
</div>

<div id="home" style="display:inline-block;height:50%;width:50%;margin-top:10%;margin-left:40%;overflow:none;">
<div style="corner-radius:50px;height:300px;width:300px;">
<img src="BackgroundImg.png" height=300px width=300px style="border-radius:50%;">
<center><h3><?php echo $_SESSION['tname']; ?> </h3></center>
<center><h3><?php echo $_SESSION['tsname']; ?></h3></center>
<center><h3><?php echo $_SESSION['tdname']; ?></h3></center>
</div>
</div>

<div id="newwork" style="display:none;height:50%;width:10%;margin-top:10%;margin-left:27%;overflow:none;">
<div style="height:600px;width:700px;">
<center><h3>Add a Student's Score</h3></center>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>
<div style="padding:25px">
<label> Student's Roll No:</label>
<input type="text" name="s_roll" placeholder="Roll Number" size="15" required>
<label> Score: </label>
<input type="text" name="s_score" placeholder="Score" size="15" required>
<button type="submit" name="submit">Submit</button> 

</div> 
</form>

</div>
</div>
<div id="Editwork" style="display:none;height:50%;width:10%;margin-top:10%;margin-left:27%;overflow:none;">
<div style="height:600px;width:700px;">
<center><h3>Update a Student's Score</h3></center>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>
<div style="padding:25px">
<label>Student Roll No.:</label>
<input type="text" name="s_roll" placeholder="Roll Number" size="15" required>
<label> Score: </label>
<input type="text" name="s_score" placeholder="Score" size="15" required>

<button type="submit" name="submit1" >Submit</button> 
</div> 
</form>

</div>
</div>

</div>

</body>
</html>
