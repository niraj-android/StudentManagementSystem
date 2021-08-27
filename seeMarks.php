<?php
session_start();
if(!isset($_SESSION['subname'])){
echo '<script> alert("You are logged out")</script>';
header('location:Teacher_Login.php');
}
?>
<html>
<head>
<style>
table{background-color:white;
margin-left:auto;
margin-right:auto;
margin-top:20px;
border:2px solid black;}
</style>
</head>
<body style="background-color:pink;">
<?php
 mysql_connect('localhost','root','995438');
            mysql_select_db("studentdb");
$num=$_SESSION['subname'];

            $result = mysql_query("SELECT * FROM mark where m_subject='$num' ");
 
echo"<center><h2>List of marks</h2></center>";
 echo"<center>$num</center>";

    echo"<table border=2>";
            echo "<tr>";
                echo "<th>";
                    echo "Name of Student";
                echo "</th>";

                 echo "<th>";
                    echo "Roll No.";
                echo "</th>";

                echo "<th>";
                    echo "Marks Obtained";
                echo "</th>";
        
                echo "<th>";
                    echo "Remark";
                echo "</th>";
            echo "</tr>";


             while($row = mysql_fetch_array($result))
            {
                echo "<tr>";

                echo "<td>";
                     echo $row[0];
                echo "</td>";

                  echo "<td>";
                     echo $row[1];
                echo "</td>";

                echo "<td>";
                     echo $row[3];
                echo "</td>";

                echo "<td>"; 
             if($row[3]>=50){echo "PASS";

             }else{echo "FAIL";

               }

                    
                 echo "</td>";
                echo"</tr>";
  
            }

            echo"</table border=1>";
                 mysql_free_result($result);
        
?>
  </body>
</html>