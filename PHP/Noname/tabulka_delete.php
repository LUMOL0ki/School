<?php 
include "head.php";
?>
<link rel="stylesheet" href="main.css" type="text/css">
<title>Main Page</title>

</head>

<?php
include "body.php";
?>
 <div id="main" >
 	<div id="text">
 <form action="" method="post" enctype="multipart/form-data">
        <table>
        <tr>
        <td>NÁZEV tabulky:</td> 
        <td><?php
		  include "connect.php"; 
		  $prikaz1="SHOW TABLES";
        $vysl1 = mysqli_query($spojeni, $prikaz1);
		   
		   echo "<select name=\"jmeno\">";
			while($oneradek = mysqli_fetch_array($vysl1)) 
			{
				echo "<option>";
				echo $oneradek[0];
				echo "</option>";	
			}
			echo "</select>";
			 ?></td>
        <td rowspan="2"><a href="tabulka.php"><button type="button" value="zpět" name="zpět" id="ma">zpět</button></a></td>
        </tr> 
        <tr>  
        <td><button type="submit" value="odstranit" name="odstranit">Ostranit</button></td>
        <td><button type="reset" value="reset" name="reset"> Reset</button></td>
        </tr>             			  
 		  </table>             			  
        </form>


<?php
  if($_POST) {
          $jmeno = $_POST["jmeno"];
          
// Create connection
$spojeni = mysqli_connect("localhost","lumocompany.tk","password", "lumocompany_tk") or die("nelze připojit");
mysqli_set_charset($spojeni, "utf8");
// sql to delete table
$sql = "DROP TABLE $jmeno";

if (mysqli_query($spojeni, $sql)) {
    echo "Úspěšně odstraněno";
} else {
    echo "Chyba". mysqli_error($spojeni);

}

mysqli_close($spojeni);
}
?>
   </div>     
</div>
<?php
include "bottom.php";
?>