<HTML>
	<BODY >
	<?php

	$p_sname = $_POST['s_name']; 
	$p_sregn = $_POST['s_regn']; 
        $p_sdept=$_POST['s_dept'];
	$p_sroll= $_POST['s_roll'];
        $p_spassword = $_POST['s_password'];

	
			

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
		?>

		
	</BODY>
</HTML>