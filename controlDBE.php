<?php
mysql_set_charset('utf8');
$conexion=mysqli_connect('localhost', 'root', '3201442') or die ('No se pudo conectar a la base de datos'.mysqli_error($conexion));
mysqli_select_db($conexion, 'ADMISION') or die("No se ha encontrado la BDD");
mysql_set_charset('utf8');

?>


<?php

class controlDB
{
	function __construct()
	{

		try
		{
			//Decraración de de variables
			$host="localhost";
			$db_name="ADMISION";
			$user="root";
			$pass="3201442";

			$this->con=mysqli_connect($host, $user, $pass) or die ("Error en la Conexión a la BDD");
			mysqli_select_db($this->con,$db_name) or die("No se ha encontrado la BDD");
			
		}
		catch(Exeption $ex)
		{
			throw $ex;

		}
		

	}

	
	function consultar($sql)
	{
		$res=mysqli_query($this->con, $sql);

		$data=NULL;
		while($fila=mysqli_fetch_assoc($res))
		{
			$data[]=$fila;
			

		}

		return $data;
	}


	function actualizar($sql)

	{
		mysqli_query($this->con, $sql);
		if(mysqli_affected_rows($this->con)<=0)
		{			
			echo '<script>';
			echo 'if (confirm("INGRESE LOS DATOS SOLICITADOS, NO SE ACTUALIZO NINGUN DATO DEL PACIENTE"));';
			echo 'location.href = "../admision/buscarEnfermeraEmergencia.php";';
						
			echo '</script>';
		}
		else
		{
			echo '<script>';
			echo 'alert("EL PACIENTE SE MODIFICO CON EXITO");';
			echo 'location.href = "../admision/buscarEnfermeraEmergencia.php";';
						
			echo '</script>';
		

						//header("location: buscar.php");
						
		}

	}

	function validarCedula($busqueda)
	{
		mysqli_query($this->con, $busqueda);
		if(mysqli_affected_rows($this->con)>0) 
            {  

            echo     '<script language="javascript">
                alert("El Número de Cédula ya existe");
                </script>';   
               

            }
            
            
	}
	
	function validarId($busqueda)
	{
		mysqli_query($this->con, $busqueda);
		if(mysqli_affected_rows($this->con)>0) 
            {  

            echo     '<script language="javascript">
                alert("El paciente ya presenta atenciones anteriores");
                </script>';   
               

            }
            
            
	}

			


	function verificar_login($user,$password,&$result) 
	{
    	$sql = "SELECT * FROM Usuarios WHERE usuario = '$user' and password = '$password'";
    	$rec = mysql_query($sql);
    	$count = 0;

    	while($row = mysql_fetch_object($rec))
    	{
        	$count++;
        	$result = $row;
    	}

    		if($count == 1)
    		{
        		return 1;
    		}

    		else
    			{
        			return 0;
    			}
	

		if(!isset($_SESSION['userid']))
		{
    		if(isset($_POST['login']))
    		{
       		 	if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        		{
           		 	$_SESSION['userid'] = $result->idusuario;
            		header("location:index.php");
       	    	}
        			else
       					{
            				echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
        				}
        	}
    	}

    	$fecha = $_POST['fechanac'];




    function calcularEdad($fecha)
	
	{

			$fechaValidacion=$_POST["ultimaten)"];
			$captfv= strtotime($fechaValidacion);
			$fval= date('Y-m-d',$captfv);
				
			$fechanac=$_POST["fechanac"];
			$capfechanac = strtotime($fechanac);
			$fnacimiento = date('Y-m-d',$capfechanac);
	




			$edad = strtotime($fval) - strtotime($fnacimiento);

			return $edad;

			
	}
	}
}
