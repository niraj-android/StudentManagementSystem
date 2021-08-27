<?php
session_start();
if(!isset($_SESSION['sname'])){
echo '<script> alert("You are logged out")</script>';
header('location:Student_Login.php');
}
?>
<html>
<head>
<style>
table{background-color:white;
font-weight:bold;
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
$num=$_SESSION['sname'];
$s=0;
$c=0;
            $result = mysql_query("SELECT * FROM mark where m_sname='$num' ");
$result1 = mysql_query("SELECT * FROM mark where m_sname='$num' ");
 
 
echo"<center><h2>Result</h2></center>";
$row1 = mysql_fetch_array($result1);
 echo"<center>$num      $row1[1]</center>";

    echo"<table border=2>";
            echo "<tr>";
                echo "<td>";
                    echo "Subject";
                echo "</td>";

                 echo "<td>";
                    echo "Full Marks";
                echo "</td>";

                echo "<td>";
                    echo "Marks Obtained";
                echo "</td>";
        
                echo "<td>";
                    echo "Remark";
                echo "</td>";
            echo "</tr>";


             while($row = mysql_fetch_array($result))
            {
                echo "<tr>";

                echo "<td>";
                     echo $row[2];
                echo "</td>";

                  echo "<td>";
                     echo "100";
                echo "</td>";

                echo "<td>";
                     echo $row[3];
                echo "</td>";

                echo "<td>"; 
             if($row[3]>=50){echo "PASS";

             }else{echo "FAIL";
$m=1;
               }

                    
                 echo "</td>";
                echo"</tr>";
  $s=$s+$row[3];
$c=$c+1;
            }
echo "<tr>";
echo "<td colspan=3>";
echo "Result";
echo "</td>";
echo "<td>";
if($m==1){ echo "FAILED";}
else{
echo $s/$c."%";
}
echo "</td>";
echo "</tr>";
            echo"</table border=1>";
                 mysql_free_result($result);
        
?>
  </body>
</html>