<?php
session_start();
if(!isset($_SESSION['tname'])){
echo "u r logged out";
header('location:Admin_Login.php');
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
            mysql_select_db("teacherdb");

            $result = mysql_query("SELECT * FROM teacher");
 
echo"<center><h2>List of Students</h2></center>";

    echo"<table border=2>";
            echo "<tr>";
                echo "<th>";
                    echo "Teacher's Name";
                echo "</th>";

                 echo "<th>";
                    echo "User Id";
                echo "</th>";

                echo "<th>";
                    echo "Subject";
                echo "</th>";
        
                echo "<th>";
                    echo "Password";
                echo "</th>";

                  echo "<th>";
                    echo "Department";
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
                     echo $row[2];
                echo "</td>";

                echo "<td>"; 
            echo $row[3];
                    echo "</td>";
                

            echo "<td>"; 
            echo $row[4];
                    echo "</td>";
                echo"</tr>";
  
            }

            echo"</table border=1>";
                 mysql_free_result($result);
        
?>
  </body>
</html>