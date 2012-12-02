<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">

<!--
body {
        margin-left:0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;

}
-->
</style>
<script language="javascript">
      function confirme(identifiant,page)
      {
        var confirmation = confirm( "Voulez vous vraiment Modifier cet enregistrement ?" ) ;
	if( confirmation )
	{
	  document.location.href = page+".php?idm="+identifiant;
	}
      }
    </script>
<script language="javascript">top.resizeTo(window.screen.availWidth,
      window.screen.availHeight);</script>
<script language="javascript">
      function confirme1(identifiant,page)
      {
        var confirmation = confirm( "Voulez vous vraiment supprimer cet enregistrement ?" ) ;
	if( confirmation )
	{
	  document.location.href = page+".php?ids="+identifiant;
	}
      }
    </script>
    <script type="text/javascript" src="../css/conform.js"></script>
 <STYLE>

  .input_text_rech
{
	background-color: white;
	padding: 0px 0px 0px 0px;
	margin:0px;
	border-top: 0px solid #d700a6;
	border-left: px solid #d700a6;
	border-right: px solid #d700a6;
	border-bottom: px solid #d700a6;
	font-size: 13px;
	font-family: verdana,Verdana,Arial,Helvetica,sans-serif;
	font-weight: normal;
	color: white;
}
input{	font-family:verdana;font-size:13px;color:black;border-style:solid;padding:0px;border-color:black; border-width: 1px;}

select{
	font-family:verdana;font-size:13px;color:black;border-style: solid;padding:0px;border-color:#CC3300; border-width:1px;
}
legend{
	font-family:verdana;font-size:15;color:#FF6600;font-weight: 700;padding:0px;border-color:black;
}
.white{font-family:verdana;font-size:13px;color:white;}
.bt{font-family:verdana;font-size:13px;font-weight: 700;color:black;}
.format{font-family:verdana;font-size:11px;font-weight: 700;color:green;}
.titr{font-family:verdana;font-size:16;font-weight: 700;color:#940000;}
.titr1{font-family:verdana;font-size:14;font-weight: 700;color:#940000;}
.error  {font-family:verdana;font-size:13px;color:red;}
.good  {font-family:verdana;font-size:13px;color:green;}
.tit{font-family:verdana;font-size:16;font-weight: 700; color:#940000;}
td{font-family:verdana;font-size:11px;color:black;line-height:1.5;}
.myc{font-family:verdana;font-size:11px;color:blue;font-weight: 700;}
th{font-family:verdana;font-size:13px;color:black;}
p.kc{font-family:verdana;font-size:13px;color:black;}
.kk{font-family:verdana;font-size:15;color:red;}
.kc1{font-family:verdana;font-size:11px;color:black;}
.kc2{font-family:verdana;font-size:11px;color:black;}
.sl { font-family: verdana ; font-weight: 700; font-size:16px; color:#FF7900;text-decoration: none ; text-valign=top }
td.pwh {font-family:verdana;font-size:13px;color:white;}
<--!th{font-family:verdana;font-size:13px;color:black;}  -->
.text  {font-family:verdana;font-size:13px;color:black;}
.top   {font-family:verdana;font-size:15;color:#F7235A;font-weight: 700;padding-left:5px;padding-right:5px;}
A   {font-family:verdana;font-size:13px;color:back;text-decoration: none;}
A.bg   {font-family:verdana;font-size:13px;color:back;text-decoration: none; background-color:#FFFFCC; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:black;}
.imp   {font-family:verdana;font-size:13px;color:back;text-decoration: none; background-color:#00FF00; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:black;}
.imp1   {font-family:verdana;font-size:10;color:red;text-decoration: none; background-color:#00FF00; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:red;}
A.bot {font-family:verdana;font-size:12;color:white;}
A:hover {color:RED;}
td.kb { font-family: verdana ; font-weight: 700; font-size:16px; color:#940000;text-decoration: none ; text-valign=top }
.kb1 { font-family: verdana ; font-weight: 700; font-size:16px; color:#940000;text-decoration: none ; text-valign=top }
div.titre{ font-family: verdana ; font-weight: 700; font-size:11px; color:#940000;text-decoration: none ; text-valign=top }
I.titre { font-family: verdana ; font-weight: 700; font-size:19px; color:#940000;text-decoration: none ; text-valign=top }
I.error { font-family: verdana ;  font-size:10px; color:red;text-decoration: none ; text-valign=top }
P { color: black; padding-left:10px;padding-top:10px;}

body {
scrollbar-face-color: black;
scrollbar-arrow-color: #FF9928;
scrollbar-track-color: white;
scrollbar-3dlight-color: black;
scrollbar-darkshadow-color: white;
scrollbar-shadow-colore : green;
scrollbar-highlight-colore: red;
}
body {
scrollbar-base-color: read;
}

</STYLE>
<script        type="text/javascript"
src="conform.js"></script>
 <script type="text/javascript"><!----------------
//~~~~~~~~~~~~~~~~~~~~~~~~~~ #        #                             #
function SUC(champ) //~~ initialisation ~~ Saisir Uniquement des Chiffres
//~~~~~~~~~~~~~~~~~~~~~~~~~~ #        #                             #
{
 this.champ=champ;
 var Lui=this;
 var ie = false; /*@cc_on ie = true; @*/
 if ( ie ) {
     this.champ.onkeypress = Lui.IE;
    }
 else  {
     this.champ.onkeyup = function(e)
      {
       Lui.FF(this, e);
      }
    }
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
SUC.prototype.IE=function() //~~ pour Internet Explorer ~~
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
{
 if ( event.keyCode<0x30 || event.keyCode>0x39 )
 {
  event.returnValue= false;
   alert("Ce champ ne prend que des chiffres");
 }
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
SUC.prototype.FF=function(zone,evt) //~~ pour FireFox ~~
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
{
 if ( evt.which<0x30 || evt.which>0x39 )
 {
  zone.value=zone.value.replace(/[^0-9]/g,"");
  alert("Ce champ ne prend que des chiffres");
 }
}
// ---------------->
function annule(){

    var ddd=document.form_newsl.nom.value;
    if(ddd=="Entrez votre nom") {
      ddd="";
      }
      else if (ddd==""){
      //document.form_newsl.mailnewsl.value="Entrez votre courriel";
      }
    }
 function annule1(){

    var ddd=document.form_newsl.mailnewsl.value;
    if(ddd=="Entrez votre courriel") {
       ddd="";
      }
      else if (ddd==""){
      //document.form_newsl.mailnewsl.value="Entrez votre courriel";
      }
    }
</script>
<?php
function verifemail($courriel){
//$regex = #^[a-z0-9-+_](\.?[a-z0-9-+_])*@[a-z0-9-+_](\.?[a-z0-9-+_])*\.[a-z]{2,4}$#i

$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
                                // séparés par des caractères autorisés avant l'arobase
 '@' .                           // Suivis d'un arobase
 '(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
                              // séparés par des points
$domain . '{2,63}$/i';

            if (preg_match($regex,$courriel)) {
               // echo "L'adresse $courriel est valide";
                return 1;
                }
             else {
               // echo "L'adresse $courriel n'est pas valide";
                return 0;
            }
}

?>

