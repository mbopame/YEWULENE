<?session_start();
session_destroy();
?>

<html>
<head>
  <title></title>
</head>

<?php
   include "style.php";
   
?>

<body>   <form name="" action="recupadministration.php" method="post">
<table border=0 cellpadding=0 cellspacing=0 width=100% height=100%>
	<tr>
	  <td  valign="center"  align="center">
	    <table border=1 cellpadding=0 cellspacing=0 width=400>
                   <tr>
		              <td >
		<table border=0 cellpadding=0 cellspacing=5 width=400>
                   <tr bgcolor=green>
		              <td COLSPAN=2 align= center><b><big>Connection Administration</big><B></td>
	            </tr>
		            <tr>
		              <td><B>Login</b></td>
		              <td><input name="login" type="text" value="" required autofocus></td>
		            </tr>
		             <tr>
		              <td><b>Mot de Passe<b></td>
		              <td><input name="passe" type="password" value="" required></td>
		            </tr>
		             <tr>
		              <td>&nbsp;</td>
		              <td align=right><input type="submit" value="Connection">&nbsp;&nbsp;<input type="reset" value="Annuler"></td>
		            </tr>
		 </table>


		 </td>
		            </tr>
		 </table>
	    <table width="298" border="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
         
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
      <p>&nbsp;</p></td>
	</tr>
		 </table>


</form>


</body>

</html>