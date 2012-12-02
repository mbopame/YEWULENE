  <head>
  <script type="text/javascript">
  <!--
  function verif_formulaire()
  {
       
  if(document.form1.nom.value == "")  {
  alert("Veuillez entrer votre nom !");
  document.form1.nom.focus();
  return false;
  }
  
  if(document.form1.mail.value == "") {
  alert("Veuillez entrer votre e-mail !");
  document.form1.mail.focus();
  return false;
  } else {
  
  var str = document.form1.mail.value;
  var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
  
  if (!str.match(re)) {
  alert("Verifier le format\n de votre e-mail !");
  document.form1.mail.focus();
  return false;
  }
  }
  
  if(document.form1.message.value == "") {
  alert("Veuillez entrer un message !");
  document.form1.message.focus();
  return false;
  }
  
  if(document.form1.objet.value == "") {
  alert("Veuillez entrer un objet !");
  document.form1.objet.focus();
  return false;
  }
  
    
  if(document.form1.code.value == "") {
  alert("Ne pas oublier le code de sécurité !");
  document.form1.code.focus();
  return false;
  }
  
  
  }
  -->
  </script>
 
  <script type="text/javascript">
  <!--
  function new_captcha()
  {
  var c_currentTime = new Date();
  var c_miliseconds = c_currentTime.getTime();
  document.getElementById('captcha').src = 'image.php?x='+ c_miliseconds;
  }
  -->
  </script>
   
  </head>
  <body>
  
  <center>
  <form action="sensibilisations.php" method="post" enctype="application/x-www-form-urlencoded" name="form1" onSubmit="return verif_formulaire();">
    <table>
	<TR><TD class=petit>&nbsp;</TD></TR>
    <tr><td>Expéditeur : </td><td><input type="text" name="nom" size="45" maxlength="100" required /></td></tr>
    <tr><td>Téléphone : </td><td><input type="text" name="tel" size="45" maxlength="100" required /></td></tr>
    <tr><td>Object Demande : </td><td><input type="text" name="objet" size="45" maxlength="100"  required/></td></tr>
    <tr><td>Détails Demande : </td><td><textarea id="textar" name="message" cols="50" rows="10" required ></textarea></td></tr>
    

    </table>
    <br /><input type="submit" name="sub" value="Envoyer" />
    <input type="reset" name="vid" value="Vider" />
  </form>
  </center>
  
  </body>
</html>
<?php
include "metier/save.php";
save_demande()
?>