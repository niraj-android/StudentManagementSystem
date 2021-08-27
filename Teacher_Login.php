<?php
session_start();
?> 

<html>
<head>
</head>
<style>   
Body {    
 background-image: url("BackgroundImg.png");
background-position-x: center;
    background-position-y: top;
    background-repeat-x: no-repeat;
    background-repeat-y: no-repeat;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
 background-size: cover;
margin:0;
backdrop-filter:blur(5px);
height:100vh; 
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
        width: 100%;   
        margin: 8px;  
        padding: 12px ;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   

     
 .container {   
        padding: 25px;   
        background-color: pink;
border-radius:10px;
 
    }   
</style>

<body>

<?php
	$con= mysql_connect('localhost','root','995438');
if(!$con){
echo '<script>alert("Unable to connect database")</script>';
exit();
}

$db=mysql_select_db("teacherdb",$con);
if(!db){
echo '<script>alert("Unable to connect database")</script>';
exit();
}

if(isset($_POST['submit'])){
$id=$_POST['dept_id'];
$password=$_POST['password_r'];

$idd="select * from teacher where m_tuser_id='$id' ";
$query=mysql_query($idd);
$id_count=mysql_num_rows($query);
if($id_count){
$id_pass=mysql_fetch_assoc($query);
$db_pass=$id_pass['m_tpassword'];
$_SESSION['tname']=$id_pass['m_tname'];
$_SESSION['tsname']=$id_pass['m_tsubject'];
$_SESSION['tdname']=$id_pass['m_tdept'];


if($password==$db_pass){
echo '<script> alert("SUCCESSFULLY LOGGED IN")</script>';
header('location:Teacher_Dashboard.php');
}else
{ echo '<script>alert("INCORRECT PASSWORD")</script>';
}

} else{
echo '<script>alert("INVALID USER ID")</script>';
}

}
?>

<div style="widhth:600px;Height:300px; position:absolute;top:35%;left:50%;transform:translate(-50%,-50%);" >
<center> <h1> Teacher Login </h1> </center>  
<div > 

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post>  
        <div style="widhth:600px;Height:300px;" class="container">   
            <label>Email Address : </label>   
            <input type="text" placeholder="Email Address" name="dept_id" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password_r" required>  
            <button type="submit" name="submit">Login</button>   
            <a href="#">Forgot password? </a> 
        </div>   
    </form> 
</div>    
</body>
</html>