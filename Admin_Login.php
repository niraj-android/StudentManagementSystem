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
if(isset($_POST['submit'])){
$p=$_POST['password_r'];
$s=$_POST['admin_id'];
$_SESSION['t']=$p;
$a=root;
$b='995438';
if($s==$a){
if($p==$b){
header('location:Admin_Dashboard.php');
}else{ echo '<script>alert("Invalid password") </script>';
}
}
else{
echo '<script>alert("Invalid user Id") </script>';
}

}
?>

<div style="widhth:600px;Height:300px; position:absolute;top:35%;left:50%;transform:translate(-50%,-50%);" >
<center> <h1> Admin Login </h1> </center>  
<div > 

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method=post >  
        <div style="widhth:600px;Height:300px;" class="container">   
            <label>Email Address : </label>   
            <input type="text" placeholder="Email Address" name="admin_id" required>  
            <label>Password : </label>   
            <input type="password" id="password" placeholder="Enter Password" name="password_r" required>  
            <button type="submit" name="submit">Login</button>   
            <a href="#">Forgot password? </a>
        </div>   
    </form> 
</div>    
</body>
</html>