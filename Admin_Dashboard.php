<?php
session_start();
if(!isset($_SESSION['t'])){
echo "u r logged out";
header('location:Admin_Login.php');
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
var p=document.getElementById("oldwork");
var q=document.getElementById("swork");
if(x.style.display === "inline-block"){
x.style.display="none";
}
else{x.style.display="inline-block";
y.style.display="none";
z.style.display="none";
p.style.display="none";
q.style.display="none";
}
}
function openold(){
var x=document.getElementById("Editwork");
var y=document.getElementById("home");
var z=document.getElementById("newwork");
var p=document.getElementById("oldwork");
var q=document.getElementById("swork");
if(x.style.display === "inline-block"){
x.style.display="none";
}
else{x.style.display="inline-block";
y.style.display="none";
z.style.display="none";
p.style.display="none";
q.style.display="none";
}
}
function deletet(){
var x=document.getElementById("oldwork");
var y=document.getElementById("home");
var z=document.getElementById("newwork");
var p=document.getElementById("Editwork");
var q=document.getElementById("swork");
if(x.style.display === "inline-block"){
x.style.display="none";

}
else{x.style.display="inline-block";
y.style.display="none";
z.style.display="none";
p.style.display="none";
q.style.display="none";
}
}

function swork(){
var x=document.getElementById("oldwork");
var y=document.getElementById("home");
var z=document.getElementById("newwork");
var p=document.getElementById("Editwork");
var q=document.getElementById("swork");
if(q.style.display === "inline-block"){
q.style.display="none";

}
else{q.style.display="inline-block";
y.style.display="none";
z.style.display="none";
p.style.display="none";
x.style.display="none";
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
$con= mysql_connect('localhost','root','995438');
if(!$con){
echo '<script>alert("Unable to connect to database")</script>';
exit();
}
$_SESSION['tname']=name;
if(isset($_POST['submit'])){
$p_sname = $_POST['s_name']; 
	$p_sregn = $_POST['s_regn']; 
        $p_sdept=$_POST['s_dept'];
	$p_sroll= $_POST['s_roll'];
        $p_spassword = $_POST['s_password'];
$_SESSION['name']=$p_sname;
$db=mysql_select_db("studentdb",$con);
if(!db){
echo '<script>alert("Unable to connect to database")</script>';
exit();
}

$kk="create table if not exists student (m_sname varchar(40), m_sregn_no varchar(40),m_sroll varchar(40), m_spassword int,m_sdept varchar (40))";
mysql_query($kk);

$findp="select m_sname from student where m_spassword='$p_spassword'";
$query2=mysql_query($findp);
$q2=mysql_num_rows($query2);
if($q2){echo '<script> alert("Password already exists")</script>';
}else{ 

 $find="select m_sname from student where m_sroll='$p_sroll'";
$query=mysql_query($find);
$q=mysql_num_rows($query);
$find1="select m_sname from student where m_sregn_no='$p_sregn'";
$query1=mysql_query($find1);
$q1=mysql_num_rows($query1);
if($q1 || $q){
echo '<script>alert("Student already exists")</script>';
}
else{
$sl="insert into student values('$p_sname','$p_sregn','$p_sroll','$p_spassword','$p_sdept')";
mysql_query($sl);
echo '<script>alert("A student was added successfully")</script>';
}

}

}

if(isset($_POST['submit1'])){
$p_tname = $_POST['t_name']; 
	$p_tuser_id = $_POST['t_user_id']; 
        $p_tdept=$_POST['t_dept'];
	$p_tsubject = $_POST['t_subject'];
        $p_tpassword = $_POST['t_password'];

$db=mysql_select_db("teacherdb",$con);
if(!db){
echo '<script>alert("Unable to connect database")</script>';
exit();
}
$duplicate="select m_tname from teacher where m_tuser_id='$p_tuser_id'";
$query=mysql_query($duplicate);
$q=mysql_num_rows($query);

if($q){ echo '<script> alert("Teacher already exist") </script>';}

else{
$kk="create table if not exists teacher (m_tname varchar(40), m_tuser_id varchar(40),m_tdept varchar (40),m_tsubject varchar(40), m_tpassword int)";
mysql_query($kk);
$sl="insert into teacher values('$p_tname','$p_tuser_id','$p_tsubject','$p_tpassword','$p_tdept')";
mysql_query($sl);
echo '<script>alert("A teacher was added sucessfully")</script>';
}
}
if(isset($_POST['submit2'])){

 $p_touser_id=$_POST['t_ouser_id'];
	$p_tname = $_POST['t_name']; 
	$p_tuser_id = $_POST['t_user_id']; 
        $p_tdept=$_POST['t_dept'];
	$p_tsubject = $_POST['t_subject'];
        $p_tpassword = $_POST['t_password'];

$db=mysql_select_db("teacherdb",$con);
if(!db){
echo '<script>alert("Unable to connect database")</script>';
exit();
}
$duplicate="select m_tname from teacher where m_tuser_id='$p_touser_id'";
$query=mysql_query($duplicate);
$q=mysql_num_rows($query);
if($q){ 
$sl="update teacher set m_tname='$p_tname',m_tsubject='$p_tsubject',m_tuser_id='$p_tuser_id',m_tpassword='$p_tpassword',m_tdept='$p_tdept' where m_tuser_id='$p_touser_id'";
mysql_query($sl);
echo '<script> alert("UPDATED SUCCESSFULLY") </script>' ;
}
else{
echo '<script> alert("Teacher does not exist") </script>';
}
}

if(isset($_POST['submit3'])){
$p_tuser_id = $_POST['t_user_id']; 
$db=mysql_select_db("teacherdb",$con);
if(!db){
echo '<script>alert("Unable to connect database")</script>';
exit();
}
$duplicate="select m_tname from teacher where m_tuser_id='$p_tuser_id'";
$query=mysql_query($duplicate);
$q=mysql_num_rows($query);
if($q){
$sl="delete from teacher where m_tuser_id='$p_tuser_id'";
mysql_query($sl);
echo '<script>alert("Deleted Successfully")</script>';
}else{ echo '<script>alert("Invalid User Id")</script>';
}
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

<div class="parent" id="nav" style="height:368px;width:500px;background-color:#ddd;display:none;position:absolute; top:46px;left:0;overflow:initial;">
<div class="items">
<a href="Admin_Dashboard.php" style="display:block;"><i class="fa fa-home" style="padding-right:6px;"></i>Home</a>
<a onclick="opennew();" style="display:block;"><i class="fa fa-plus-square-o" style="padding-right:6px;"></i>Add New Teacher</a>
<a onclick="openold();" style="display:block;"><i class="fa fa-edit" style="padding-right:6px;"></i>Edit A Teacher's Profile</a>
<a onclick="deletet();" style="display:block;"><i class="fa fa-eraser" style="padding-right:6px;"></i>Remove A Teacher</a>
<a onclick="swork();" style="display:block;"><i class="fa fa-plus-square-o" style="padding-right:6px;"></i>Add A New Student</a>
<a href="seeStudent.php" style="display:block;"><i class="fa fa-sort-amount-asc" style="padding-right:6px;"></i>List of Students</a>
<a href="seeTeacher.php" style="display:block;"><i class="fa fa-sort-amount-asc" style="padding-right:6px;"></i>List of Teachers</a>
<a href="Alogout.php" style="display:block;"><i class="fa fa-power-off" style="padding-right:4px;"></i>Logout</a>

</div>
</div>

<div id="home" style="display:inline-block;height:50%;width:50%;margin-top:10%;margin-left:40%;overflow:none;">
<div style="corner-radius:50px;height:300px;width:300px;">
<img src="BackgroundImg.png" height=300px width=300px style="border-radius:50%;">
<center><h3>NIRAJ SINGH</h3></center>
<center><h4>ADMINISTRATOR</h4></center>
<center><h4>ASSAM UNIVERSITY SILCHAR</h4></center>
</div>
</div>

<div id="newwork" style="display:none;height:50%;width:10%;margin-top:10%;margin-left:27%;overflow:none;">
<div style="height:600px;width:700px;">
<center><h3>Add A New Teacher</h3></center>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>
<div style="padding:25px">
<label> Teacher's Name: </label>
<input type="text" name="t_name" placeholder="Name" size="15" required>
<label> Teacher's User Id</label>
<input type="text" name="t_user_id" placeholder="Email" size="15" required>
<label> Department:</label>
<input type="text" name="t_dept" placeholder="Department" size="15" required>
<label> Allot a Subject: </label>
<input type="text" name="t_subject" placeholder="Subject" size="15" required>
<label> Teacher's Password</label>
<input type="text" name="t_password" placeholder="Set Password(8 digits)" size=15 size="8" maxlength="8" required>
<button type="submit" name="submit1">Submit</button> 
</div> 
</form>
</div>
</div>

<div id="Editwork" style="display:none;height:50%;width:10%;margin-top:5%;margin-left:27%;overflow:none;">
<div style="height:600px;width:700px;">
<center><h3>Update a Teacher's Profile</h3></center>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>
<div style="padding:25px">
<label> Teacher's Old User Id</label>
<input type="text" name="t_ouser_id" placeholder="Email" size="15" required>
<label> Teacher's Name: </label>
<input type="text" name="t_name" placeholder="Name" size="15" required>
<label> Teacher's User Id:</label>
<input type="text" name="t_user_id" placeholder="Email" size="15" required>
<label> Department:</label>
<input type="text" name="t_dept" placeholder="Department" size="15" required>
<label> Assign a Subject: </label>
<input type="text" name="t_subject" placeholder="Subject" size="15" required>
<label> Teacher's Password:</label>
<input type="text" id="Password" name="t_password" placeholder="Set Password(8 digits)" size="8" maxlength="8" required>
<button type="submit" name="submit2">Submit</button> 
</div> 
</form>

</div>
</div>

<div id="oldwork" style="display:none;height:50%;width:10%;margin-top:10%;margin-left:27%;overflow:none;">
<div style="height:600px;width:700px;">
<center><h3>Remove a Teacher</h3></center>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>
<div style="padding:25px">
<label> Teacher's User Id</label>
<input type="text" name="t_user_id" placeholder="Email" size=15 required>
<button type="submit" name="submit3">Submit</button>
</div> 
</form>

</div>
</div>


<div id="swork" style="display:none;height:50%;width:10%;margin-top:8%;margin-left:27%;overflow:none;">
<div style="height:600px;width:700px;">
<center><h3>Add A New Student</h3></center>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>
<div style="padding:25px">
<label> Students's Name: </label>
<input type="text" name="s_name" placeholder="Name" size="15" required>
<label> Student's Registration No: </label>
<input type="text" name="s_regn" placeholder="Registration Number" size="15" required>
<label> Department:</label>
<input type="text" name="s_dept" placeholder="Department" size="15" required>
<label> Student's Roll No: </label>
<input type="text" name="s_roll" placeholder="Roll Number" size="15" required>
<label> Student's Password</label>
<input type="text" name="s_password" placeholder="Set Password(8 digits)" size=15 size="8" maxlength="8" required>
<br>
<button type="submit" name="submit">Submit</button> 

</div> 
</form>

</div>
</div>


</div>

</body>
</html>
