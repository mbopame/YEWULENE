<style type="text/css">
<!--
body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;

}
-->
</style>
 <STYLE>
.bt{font-family: "Times New Roman", Times, serif;font-size:13px;font-weight: 700;color:black;}
.titr{font-family: "Times New Roman", Times, serif;font-size:13px;font-weight: 700;color:#940000;}
.titr1{font-family:"Times New Roman", Times, serif;font-size:12px;font-weight: 700;color:#940000;}
.error  {font-family:"Times New Roman", Times, serif;font-size:13px;color:red;}
.big{font-family:"Times New Roman", Times, serif;font-size:16px;font-weight: 700; color:black;}
td{font-family:"Times New Roman", Times, serif;font-size:13px;color:black;}
.sn{font-family:"Times New Roman", Times, serif;font-size:11px;color:black;}
.myc{font-family:"Times New Roman", Times, serif;font-size:13px;color:#b0d0FF;}
th{font-family:"Times New Roman", Times, serif;font-size:13px;color:black;}
p.kc{font-family:"Times New Roman", Times, serif;font-size:13px;color:black;}
.kk{font-family:"Times New Roman", Times, serif;font-size:15;color:black;}
.kc1{font-family:"Times New Roman", Times, serif;font-size:12px;color:black;}
.sl { font-family: "Times New Roman", Times, serif ; font-weight: 700; font-size:16px; color:#FF7900;text-decoration: none ; text-valign=top }
td.pwh {font-family:"Times New Roman", Times, serif;font-size:13px;color:white;}
<--!th{font-family:"Times New Roman", Times, serif;font-size:13px;color:black;}  -->
.text  {font-family:"Times New Roman", Times, serif;font-size:13px;color:black;}
.top   {font-family:"Times New Roman", Times, serif;font-size:15;color:black;padding-left:5px;padding-right:5px;}
A.mid   {font-family:"Times New Roman", Times, serif;font-size:12px;color:back;text-decoration: none}
A.bot {font-family:"Times New Roman", Times, serif;font-size:12px;color:white;}
A:hover {color:black;}
td.kb { font-family: "Times New Roman", Times, serif ; font-weight: 700; font-size:16px; color:#940000;text-decoration: none ; text-valign=top }
.kb1 { font-family: "Times New Roman", Times, serif ; font-weight: 700; font-size:16px; color:#940000;text-decoration: none ; text-valign=top }
div.titre{ font-family: "Times New Roman", Times, serif ; font-weight: 700; font-size:19px; color:#940000;text-decoration: none ; text-valign=top }
I.titre { font-family: "Times New Roman", Times, serif ; font-weight: 700; font-size:19px; color:#940000;text-decoration: none ; text-valign=top }
P { color: black; padding-left:10px;padding-top:10px;}
.bt{font-family:Century Gothic;font-size:12px;color:back;text-decoration: none; background-color:#E0E0E0; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:black;}
.bt1{font-family:Century Gothic;font-size:12px;color:back;text-decoration: none; background-color:#EFEFEF; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:black;}

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
<center>