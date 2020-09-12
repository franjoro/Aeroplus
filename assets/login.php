<?php 
session_start();
require("../conexion.php");
$u=$_POST['user'];
$p=$_POST['contra'];
$pp=md5($p);

// $_SESSION['session_id']='0';
$check=mysqli_query($conexion,"SELECT COUNT(*) FROM user WHERE Username='$u' AND Password='$pp' ");
$chec=mysqli_fetch_array($check);



if ($chec[0]=='1') {
	$che=mysqli_query($conexion,"SELECT * FROM user WHERE Username='$u' AND Password='$pp' ");
    $ch=mysqli_fetch_array($che);
    if ($ch[4]=='1') {
    		if ($ch[3]=='0') {
    			// ============================================================ADMIN
    			echo "01-00-Administrador";
    			$_SESSION['session_id']=0;
                $_SESSION['user']='admin';

    		}
    		if ($ch[3]=='1') {
    			// ============================================================INSTRUCTOR
				$sql=mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_user='$ch[0]' ");
    			$sqll=mysqli_fetch_array($sql);   
    			echo "01-01-".$sqll[0];
    			$_SESSION['session_id']=1;
                $_SESSION['user']=$ch[0];

    						
    		}
    		if ($ch[3]=='2') {
    			// ============================================================ALUMNO
    			$sql=mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_user='$ch[0]' ");
    			$sqll=mysqli_fetch_array($sql);   
    			echo "01-02-".$sqll[0];
    			$_SESSION['session_id']=2;
                $_SESSION['user']=$ch[0];
                
    		}
            if ($ch[3]=='3') {
                // ============================================================DESPACHO
                echo "01-03-Despacho";
                $_SESSION['session_id']=3;
                $_SESSION['user']='Despacho';
                
            }
    }else{
    	echo "00-sinpermiso";
    }

}else{
	echo "00";
}

 ?>