<?php
include"dao/connection.php";
// FONCTIONS POUR PREPARER  UN FORMULAIRE D'AJOUT
function PetitClean($var,$lg){
$var=strip_tags($var);
  /* troncature on va pas me poster un roman (-: */
  if(strlen($var)>$lg){
  $var = substr($var, 0, $lg);
  $last_space = strrpos($var, " ");
  $var = substr($var, 0, $last_space);
  }else{
  $lg=0;
  } 
return $var;
}   
//save user
function save_demande(){
	if(isset($_POST["nom"])){
		$nom= addslashes($_POST['nom']);		
		$tel = addslashes($_POST['tel']);
		$objet= addslashes($_POST['objet']);
		$message= addslashes($_POST['message']);		
		$valider="NON";
		$datejour=date("Y")."-".date("m")."-".date("d");
		
		echo	$sql1_ajout="INSERT INTO demandes  VALUES ('','$objet','$message','$nom','$tel','$valider','$datejour')";
			$query_ajoutad=mysql_query($sql1_ajout) ;
			
			//mail($destinataire,$subject,$body,$headers);
			echo'<script Language="JavaScript">
					{
					alert (" Merci de votre inscription,UN message a été envoyé à votre adresse email pour vos parametres de connexion");
					}
</SCRIPT>';
		echo'<SCRIPT LANGUAGE=VBScript>
location.href="index.php"
</SCRIPT>';
		//}


}
}
// modif user
function modif_user(){
	if(isset($_POST["code"])){
		$code= addslashes($_POST['code']);
		$prenom = addslashes($_POST['prenom']);
		$nom= addslashes($_POST['nom']);
		$adresse= addslashes($_POST['adresse']);
		$tel = addslashes($_POST['tel']);				
		$ufr= addslashes($_POST['ufr']);
		$section= addslashes($_POST['section']);
		$passe= addslashes($_POST['pass']);
		$email= addslashes($_POST['mailes']);
		$promo= addslashes($_POST['promo']);
		$residence= addslashes($_POST['pays']);
		$secteur= addslashes($_POST['secteur']);
		$datejour=date("Y")."-".date("m")."-".date("d");


	
			$mise="update membre set nom1='$nom',prenom18='$prenom',adresse18='$adresse',telephone18='$tel',mot_de_passe78='$passe',ufr58='$ufr',section58='$section',promo5='$promo',pays_residence5='$residence',secteur_activite58='$secteur' where id='$code' and email68='$email'";
			$query_ajoutad=mysql_query($mise) ;
			if($query_ajoutad){
			$exereq=mysql_query("select * from connecter where email='$email'");
		if(mysql_num_rows($exereq)==0){ 
			echo$sql_ajout="INSERT INTO connecter  values('$email')";
			$query_ajoutadc=mysql_query($sql_ajout) ;
			echo'<script Language="JavaScript">
					{
					alert (" Modifications Enregistrées");
					}
</SCRIPT>';
		echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"
</SCRIPT>';
		}
		else{
		echo'<script Language="JavaScript">
					{
					alert (" Modifications Enregistrées");
					}
</SCRIPT>';
		echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"
</SCRIPT>';
		}
		}
else{
//location.href="fiche_produit.php?num='.$code.'"
	echo'<script Language="JavaScript">
					{
					alert ("Echec!Veuillez reprendre ");
					}
</SCRIPT>';
echo'<SCRIPT LANGUAGE="JavaScript">
location.href="perso.php"
</SCRIPT>';
}

}
}
//save biblio
function save_biblio(){
	if(isset($_POST["titre"])){

		$titre = addslashes($_POST['titre']);
		$domaine= addslashes($_POST['domaine']);
		$auteur= addslashes($_POST['auteur']);
		$synthese = addslashes($_POST['synthese']);
		$type= addslashes($_POST['type']);
		$valider="NON";
		
		$sqlstm10="select max(id) lib  from biblio where objet5='$type'";
$req10=mysql_query($sqlstm10);
$ligne0=mysql_fetch_array($req10);
$n=$ligne0['lib'];
$nb0=$n+1;

$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'un document";
$body="Le sanarois ".$prenom." ".$nom." vient de poste un document de type ".$type." dont le titre est ".$titre;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/

		if($_FILES['photo']['name']<>""){
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$photo=$_FILES['photo']['name'];
$extension_upload = strtolower(  substr(  strrchr($photo, '.')  ,1)  );
//if ( in_array($extension_upload,$extensions_valides) ){
     //echo "Extension correcte";
      $tab=explode(".",$photo);
      $nb=0;
      for($i=0;$i<strlen($photo);$i++){
		  	if(isset($tab[$i])){
		        $nb+=1;
		  	}

	   }
	$stock=getcwd();
	$dir=$stock."/allfichiers/";
	$mynb=$nb-1;
	$logo =$type.$nb0.".".$tab[$mynb] ;
	$chemin  =$logo;
	if(file_exists($dir.$logo)){
		 unlink($dir.$logo);
		}
	
 	move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$_FILES['photo']['name']);
 	rename($dir.$photo,$dir.$logo);
	}
	else
	$chemin="";
	$exereq=mysql_query("select * from biblio where titre1='$titre'");
		if(mysql_num_rows($exereq)==0) {
	
	echo$sql_ajout="INSERT INTO biblio  values(' ','$titre','$domaine','$type','$synthese','$auteur','$chemin','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster ce document");
				}
</SCRIPT>';
				//echo"<div align=center class=imp>enregistrement valide!</div>";

				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
			//	echo "INSERT INTO distributeur (cdeetud,cdeimma1,prenom1,nom1,adresse1,sexe5,fixe1,mobile1,agence5,transport5) values(' ','$matricule','$sprenom','$snom','$sadresse','$ssexe','$sfixe','$sportable,'$agence',$transport')";

				echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="document.php"

</SCRIPT>';
			}
		}

		else{
			//	echo "<br>Agence ".$agence."   existe déja";
			echo'<script Language="JavaScript">
				{alert ("Document portant ce titre avec le même auteur existe déja");
				}
</SCRIPT>';
			echo'<SCRIPT LANGUAGE="JavaScript">
location.href="document.php"

</SCRIPT>';
		}
	
		}
		}
// save article
function save_article(){
	if(isset($_POST["titre"])){

	$datejour=date("Y")."-".date("m")."-".date("d");
		$titre = addslashes($_POST['titre']);
		$contenu= addslashes($_POST['contenu']);
		$valider="NON";
		
$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$auteur=$prenom.' '.$nom;

$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'un document";
$body="Le sanarois ".$prenom." ".$nom." vient de poste un document de type ".$type." dont le titre est ".$titre;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/
$exereq=mysql_query("select * from article where titre1='$titre'");
		if(mysql_num_rows($exereq)==0) {
	
	echo$sql_ajout="INSERT INTO article  values(' ','$titre','$contenu','$auteur','$datejour','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster cet article");
				}
</SCRIPT>';
				//echo"<div align=center class=imp>enregistrement valide!</div>";

				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
			//	echo "INSERT INTO distributeur (cdeetud,cdeimma1,prenom1,nom1,adresse1,sexe5,fixe1,mobile1,agence5,transport5) values(' ','$matricule','$sprenom','$snom','$sadresse','$ssexe','$sfixe','$sportable,'$agence',$transport')";

				echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="articles.php"

</SCRIPT>';
			}
		}

		else{
			//	echo "<br>Agence ".$agence."   existe déja";
			echo'<script Language="JavaScript">
				{alert ("Document portant ce titre avec le même auteur existe déja");
				}
</SCRIPT>';
			echo'<SCRIPT LANGUAGE="JavaScript">
location.href="articles.php"

</SCRIPT>';
		}
	
		}
		}
//save media
function save_media(){
	if(isset($_POST["titre"])){

	$datejour=date("Y")."-".date("m")."-".date("d");
		$titre = addslashes($_POST['titre']);
		$lien= addslashes($_POST['lien']);
		$type= addslashes($_POST['type']);
		$valider="NON";
		
$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$auteur=$prenom.' '.$nom;

$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'un document";
$body="Le sanarois ".$prenom." ".$nom." vient de poste un média de type ".$type." dont le titre est ".$titre;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/
$exereq=mysql_query("select * from medias where titre1='$titre'");
		if(mysql_num_rows($exereq)==0) {
	
	echo$sql_ajout="INSERT INTO medias  values(' ','$titre','$lien','$type','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster ce fichier");
				}
</SCRIPT>';
				//echo"<div align=center class=imp>enregistrement valide!</div>";

				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
						echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajmedia.php"

</SCRIPT>';
			}
		}

		else{
			//	echo "<br>Agence ".$agence."   existe déja";
			echo'<script Language="JavaScript">
				{alert ("Document portant ce titre  existe déja");
				}
</SCRIPT>';
			echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajmedia.php"

</SCRIPT>';
		}
	
		}
		}
// save emplois
function save_emplois(){
	if(isset($_POST["nature"])){

		$nature = addslashes($_POST['nature']);
		$annonceur= addslashes($_POST['annonceur']);
		$poste= addslashes($_POST['poste']);
		$etude= addslashes($_POST['etude']);
		$description = addslashes($_POST['description']);
		$dossier= addslashes($_POST['dossier']);
		$valider="NON";
		$date_prevue = addslashes($_POST['date_annonce']);
	$array_date=explode("/",$date_prevue);
	$da=$array_date[2]."-".$array_date[1]."-".$array_date[0];
	
	$date_prevuer = addslashes($_POST['date_expire']);
	$array_dater=explode("/",$date_prevuer);
	$dex=$array_dater[2]."-".$array_dater[1]."-".$array_dater[0];

		
		$sqlstm10="select max(id) lib  from job where job_nature5='$nature'";
$req10=mysql_query($sqlstm10);
$ligne0=mysql_fetch_array($req10);
$n=$ligne0['lib'];
$nb0=$n+1;

$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'une proposition d\'emplois";
$body="Le sanarois ".$prenom." ".$nom." vient de poste une proposition de job ".$nature." dont l\'annonceur est ".$annonceur;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/

		if($_FILES['photo']['name']<>""){
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$photo=$_FILES['photo']['name'];
$extension_upload = strtolower(  substr(  strrchr($photo, '.')  ,1)  );
//if ( in_array($extension_upload,$extensions_valides) ){
     //echo "Extension correcte";
      $tab=explode(".",$photo);
      $nb=0;
      for($i=0;$i<strlen($photo);$i++){
		  	if(isset($tab[$i])){
		        $nb+=1;
		  	}

	   }
	$stock=getcwd();
	$dir=$stock."/allfichiers/";
	$mynb=$nb-1;
	$logo =$nature.$nb0.".".$tab[$mynb] ;
	$chemin  =$logo;
	if(file_exists($dir.$logo)){
		 unlink($dir.$logo);
		}
	
 	move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$_FILES['photo']['name']);
 	rename($dir.$photo,$dir.$logo);
	}
	else
	$chemin="";
	
	
	echo$sql_ajout="INSERT INTO job  values(' ','$nature','$annonceur','$poste','$etude','$description','$dossier','$chemin','$da','$dex','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster ce job");
				}
</SCRIPT>';
				//echo"<div align=center class=imp>enregistrement valide!</div>";

				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
			//	echo "INSERT INTO distributeur (cdeetud,cdeimma1,prenom1,nom1,adresse1,sexe5,fixe1,mobile1,agence5,transport5) values(' ','$matricule','$sprenom','$snom','$sadresse','$ssexe','$sfixe','$sportable,'$agence',$transport')";

				echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajemplois.php"

</SCRIPT>';
			}
		
	
		}
		}
//save bourse
function save_bourse(){
	if(isset($_POST["titre"])){

		$titre = addslashes($_POST['titre']);
		$valider="NON";
		
		$sqlstm10="select max(id) lib  from bourses";
$req10=mysql_query($sqlstm10);
$ligne0=mysql_fetch_array($req10);
$n=$ligne0['lib'];
$nb0=$n+1;

$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'une proposition de bourse";
$body="Le sanarois ".$prenom." ".$nom." vient de poste une proposition de bourse dont le titre est  ".$titre;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/

		if($_FILES['photo']['name']<>""){
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$photo=$_FILES['photo']['name'];
$extension_upload = strtolower(  substr(  strrchr($photo, '.')  ,1)  );
//if ( in_array($extension_upload,$extensions_valides) ){
     //echo "Extension correcte";
      $tab=explode(".",$photo);
      $nb=0;
      for($i=0;$i<strlen($photo);$i++){
		  	if(isset($tab[$i])){
		        $nb+=1;
		  	}

	   }
	$stock=getcwd();
	$dir=$stock."/allfichiers/";
	$mynb=$nb-1;
	$logo ="Bourse".$nb0.".".$tab[$mynb] ;
	$chemin  =$logo;
	if(file_exists($dir.$logo)){
		 unlink($dir.$logo);
		}
	
 	move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$_FILES['photo']['name']);
 	rename($dir.$photo,$dir.$logo);
	}
	else
	$chemin="";
	
	
	echo$sql_ajout="INSERT INTO bourses  values(' ','$titre','$chemin','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster cette propositio de bourse");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
			echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajbourse.php"

</SCRIPT>';
			}
		
	
		}
		}
// save club
function save_club(){
	if(isset($_POST["titre"])){

		$titre = addslashes($_POST['titre']);
		$lien = addslashes($_POST['lien']);
		$valider="NON";
		


$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'un Club";
$body="Le sanarois ".$prenom." ".$nom." vient de poste un club  dont le lien  est  ".$lien;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/

	
	echo$sql_ajout="INSERT INTO clubs  values(' ','$titre','$lien','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster ce Club");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
			echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajclubs.php"

</SCRIPT>';
			}
		
	
		}
		}
// save formation
function save_formation(){
	if(isset($_POST["nature"])){

		$nature = addslashes($_POST['nature']);
		$annonceur= addslashes($_POST['annonceur']);
		$etude= addslashes($_POST['etude']);
		$duree = addslashes($_POST['duree']);
		$valider="NON";
		$date_prevue = addslashes($_POST['date_annonce']);
	$array_date=explode("/",$date_prevue);
	$da=$array_date[2]."-".$array_date[1]."-".$array_date[0];
	
	
		
		$sqlstm10="select max(id) lib  from etude where etudes_nature5='$nature'";
$req10=mysql_query($sqlstm10);
$ligne0=mysql_fetch_array($req10);
$n=$ligne0['lib'];
$nb0=$n+1;

$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'offre de formation/séminaire";
$body="Le sanarois ".$prenom." ".$nom." vient de poste un offre de formation/séminaire dant le titre est ".$annonceur;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/

		if($_FILES['photo']['name']<>""){
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$photo=$_FILES['photo']['name'];
$extension_upload = strtolower(  substr(  strrchr($photo, '.')  ,1)  );
//if ( in_array($extension_upload,$extensions_valides) ){
     //echo "Extension correcte";
      $tab=explode(".",$photo);
      $nb=0;
      for($i=0;$i<strlen($photo);$i++){
		  	if(isset($tab[$i])){
		        $nb+=1;
		  	}

	   }
	$stock=getcwd();
	$dir=$stock."/allfichiers/";
	$mynb=$nb-1;
	$logo =$nature.$nb0.".".$tab[$mynb] ;
	$chemin  =$logo;
	if(file_exists($dir.$logo)){
		 unlink($dir.$logo);
		}
	
 	move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$_FILES['photo']['name']);
 	rename($dir.$photo,$dir.$logo);
	}
	else
	$chemin="";
	
	
	echo$sql_ajout="INSERT INTO etude  values(' ','$nature','$annonceur','$etude','$da','$duree','$chemin','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster cette Formation / Séminaire");
				}
</SCRIPT>';
				//echo"<div align=center class=imp>enregistrement valide!</div>";

				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="index.php"

</SCRIPT>';
			}
			else
			{
			//	echo "INSERT INTO distributeur (cdeetud,cdeimma1,prenom1,nom1,adresse1,sexe5,fixe1,mobile1,agence5,transport5) values(' ','$matricule','$sprenom','$snom','$sadresse','$ssexe','$sfixe','$sportable,'$agence',$transport')";

				echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajformation.php"

</SCRIPT>';
			}
		
	
		}
		}
function save_photo(){
	if(isset($_POST["titre"])){

		$titre = addslashes($_POST['titre']);
		$valider="NON";
		
		$sqlstm10="select max(id) lib  from photos";
$req10=mysql_query($sqlstm10);
$ligne0=mysql_fetch_array($req10);
$n=$ligne0['lib'];
$nb0=$n+1;

$email=$_SESSION["login1"];
$sql="select prenom18,nom1 from membre  where email68='$email'";
$req=mysql_query($sql);
$ligne=mysql_fetch_array($req);
$prenom=$ligne['prenom18'];
$nom=$ligne['nom1'];
$destinataire="admin@wasanar.com";  /*ICI LE MAIL QUI RECEPTIONNE*/
$subject="Validation de la publication d'une proposition de photos";
$body="Le sanarois ".$prenom." ".$nom." vient de poste une proposition de photo dont le titre est  ".$titre;

/*format du mail*/
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
/*ici on détermine l'expediteur et l'adresse de réponse*/
$headers .= "From:  <$email>\r\nReply-to :  <$email>\nX-Mailer:PHP";
/*tout est ok*/

		if($_FILES['photo']['name']<>""){
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$photo=$_FILES['photo']['name'];
$extension_upload = strtolower(  substr(  strrchr($photo, '.')  ,1)  );
//if ( in_array($extension_upload,$extensions_valides) ){
     //echo "Extension correcte";
      $tab=explode(".",$photo);
      $nb=0;
      for($i=0;$i<strlen($photo);$i++){
		  	if(isset($tab[$i])){
		        $nb+=1;
		  	}

	   }
	$stock=getcwd();
	$dir=$stock."/allfichiers/";
	$mynb=$nb-1;
	$logo ="photo".$nb0.".".$tab[$mynb] ;
	$chemin  =$logo;
	if(file_exists($dir.$logo)){
		 unlink($dir.$logo);
		}
	
 	move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$_FILES['photo']['name']);
 	rename($dir.$photo,$dir.$logo);
	}
	else
	$chemin="";
	
	
	echo$sql_ajout="INSERT INTO photos  values(' ','$titre','$chemin','$valider')";

			$query_ajout=mysql_query($sql_ajout);
			$numero=mysql_insert_id();
			if($query_ajout){

			mail($destinataire,$subject,$body,$headers);
				echo'<script Language="JavaScript">
				{alert ("Merci d\'avoir poster cette photo");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="galerie.php"

</SCRIPT>';
			}
			else
			{
			echo'<script Language="JavaScript">
				{alert ("Echec! Veuillez reprendre SVP!!!");
				}
</SCRIPT>';
				echo'<SCRIPT LANGUAGE="JavaScript">
location.href="ajphoto.php"

</SCRIPT>';
			}
		
	
		}
		}

?>