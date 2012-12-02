<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
body {
		top.moveTo(30,0);
        margin-left: 0px;
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
    <script type="text/javascript" src="css/conform.js"></script>
     <script>
function visibilite(thingId)
{
 var i;
 var targetElement;
 for(i=1; i<=3; i++){
  targetElement = document.getElementById("divid" + i) ;
  targetElement.style.display = "none" ;
 }
 targetElement = document.getElementById("divid" + thingId) ;
 targetElement.style.display = "" ;
}
</script>
 <STYLE>
#container{
  width: 99%;
  padding: 0px;
  border: 1px solid #666;

}
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
	font-family: Century Gothic,Verdana,Arial,Helvetica,sans-serif;
	font-weight: normal;
	color: white;
}
input{
	font-family:Century Gothic;font-size:13px;color:black;border-style:solid;padding:0px;border-colorE:#CC3300; border-width:0px;
}

select{
	font-family:Century Gothic;font-size:13px;color:black;border-style: solid;padding:0px;border-color:#CC3300; border-width:0px;
}
legend{
	font-family:Century Gothic;font-size:15px;color:#FF6600;font-weight: 700;padding:0px;border-color:black;
}
.big{font-family:"Times New Roman", Times, serif;font-size:19px;font-weight: 700; color:black;}
.y-ln-1 { border-color: #b9c7d3; }
.white{font-family:Century Gothic;font-size:13px;color:white;}
.bt{font-family:Century Gothic;font-size:13px;font-weight: 700;color:black;}
.format{font-family:Century Gothic;font-size:11px;font-weight: 700;color:green;}
.titr{font-family:Century Gothic;font-size:12px;font-weight: 700;color:#940000;}
.titr1{font-family:Century Gothic;font-size:14px;font-weight: 700;color:#940000;}
.error  {font-family:Century Gothic;font-size:13px;color:red;}
.good  {font-family:Century Gothic;font-size:13px;color:green;}
.sn{font-family:"Century Gothic", Times, serif;font-size:12px;color:black;}
.tit{font-family:Century Gothic;font-size:16px;font-weight: 700; color:#940000;}
td{font-family:Century Gothic;font-weight:;font-size:12px;color:white;}
.pt{font-family:Century Gothic;font-weight:;font-size:10px;color:white;}
td.bl{font-family:Century Gothic;font-weight:;font-size:11px;color:black;}
.myc{font-family:Century Gothic;font-size:13px;color:#b0d0FF;}
th{font-family:Century Gothic;font-size:13px;color:black;}
p.kc{font-family:Century Gothic;font-size:13px;color:black;}
.kk{font-family:Century Gothic;font-size:15;color:red;}
.kc1{font-family:Century Gothic;font-size:13px;color:black;border-widthE:1px}
.kc2{font-family:Century Gothic;font-size:11px;color:white;font-weight: 700;}
.kc3{font-family:Century Gothic;font-size:11px;color:blue;font-weight: 700;}
.sl { font-family: Century Gothic ; font-weight: 700; font-size:16; color:#FF7900;text-decoration: none ; text-valign=top }
td.pwh {font-family:Century Gothic;font-size:13px;color:white;}
<--!th{font-family:Century Gothic;font-size:13px;color:black;}  -->
.text  {font-family:Century Gothic;font-size:13px;color:black;}
.top   {font-family:Century Gothic;font-size:15;color:#F7235A;font-weight: 700;padding-left:5px;padding-right:5px;}
A   {font-family:Century Gothic;font-size:13px;color:back;text-decoration: none;}
A.puce   {font-family:Century Gothic;font-size:11px;color:back;text-decoration: none;font-weight: 700;}
A.bg   {font-family:Century Gothic;font-size:13px;color:back;text-decoration: none; background-color:#FFFFCC; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:black;}
.imp   {font-family:Century Gothic;font-size:13px;color:back;text-decoration: none; background-color:#00FF00; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:black;}
.imp1   {font-family:Century Gothic;font-size:10;color:red;text-decoration: none; background-color:#00FF00; ;height:20px;padding-left:5px;padding-right:5px;border-style: solid; border-width: 1px;border-color:red;}
A.bot {font-family:Century Gothic;font-size:12;color:white;}
A:hover {color:RED;}
td.kb { font-family: Century Gothic ; font-weight: 700; font-size:16; color:#940000;text-decoration: none ; text-valign=top }
.titre { font-family: Century Gothic ; font-weight: 700; font-size:18px; color:black;text-decoration: none ; text-valign=top;padding-left:35px; }
.me { font-family: Century Gothic ; font-weight: 700; font-size:13px; color:black;text-decoration: none ; text-valign=top;padding-left:35px; }
.kb1 { font-family: Century Gothic ; font-weight: 700; font-size:16; color:#940000;text-decoration: none ; text-valign=top }
div.titre{ font-family: Century Gothic ; font-weight: 700; font-size:12; color:#940000;text-decoration: none ; text-valign=top }
I.titre { font-family: Century Gothic ; font-weight: 700; font-size:19; color:#940000;text-decoration: none ; text-valign=top }
I.error { font-family: Century Gothic ;  font-size:10; color:red;text-decoration: none ; text-valign=top }
P { color: black; padding-left:10px;padding-top:10px;}
a.menu1:hover {
font-size:13px;
color:black;
font-weight:700;
text-decoration:none;
background-color:white;
background-repeat:no-repeat;
}
a.menu1{
font-size:13px;
color:black;
font-weight:700;
text-decoration:none;
background-colorE:white;
background-repeat:no-repeat;
}
.sl {
font-size:13px;
color:black;
text-decoration:none;
}
.bgmenu {
background-image:url(images/bgmenu.jpg);
background-repeat:no-repeat;
font-size:13px;
}
body {
scrollbar-face-color: black;
scrollbar-arrow-color: #FF9928;
scrollbar-track-color: white;
scrollbar-3dlight-color: black;
scrollbar-darkshadow-color: white;
scrollbar-shadow-colore : green;
scrollbar-highlight-colore: red;
background-image:url("images/bgtop.jpg") ;
background-repeat: repeat-x ;
}
.pubd{	background-image:url("images/bgpubd.jpg") ;
background-repeat: repeat-x ;
}
body {
scrollbar-base-color: read;
}

</STYLE>
<style type="text/css">
a {
  text-decoration: none;
}
.mylist {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
   background-color: #7D5BB9;
   border: 1px solid #7D5BB9;
   color: white;
   font-weight:bold;
   border-width:thin;
   border-color:#7D5BB9;
   border-style:solid;
   width:380px;
}
.mylistkc {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
   background-colore: #7D5BB9;
   border: 0px solid #7D5BB9;
   color: white;
   font-weight:bold;
   border-width:thin;
   border-color:#7D5BB9;
   border-style:solid;
   width:250px;
}
.rep {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
   background-color: black;
   border: 1px solid #7D5BB9;
   color: white;
   font-weight:bold;
   border-width:thin;
   border-color:white;
   border-style:solid;
   width:90%;
   padding-left:0px;
}
.mylist2 {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
		background-color: #00AFF0;
	   border: 1px solid #00AFF0;
	   color: white;
	   font-weight:bold;
	   border-width:thin;
	   border-color:white;
	   border-style:solid;
	   width:380px;

}
.mylist01 {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
		background-color: #00AFF0;
	   border: 1px solid #00AFF0;
	   color: white;
	   font-weight:bold;
	   border-width:thin;
	   border-color:white;
	   border-style:solid;
	   width:20px;

}
.mylist3 {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
		background-color: #9900FF;
	   border: 1px solid #9900FF;
	   color: white;
	   font-weight:bold;
	   border-width:thin;
	   border-color:white;
	   border-style:solid;
	   width:380px;
}
.mytd {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
		background-color: #E3D9F4;
	   border: 1px solid #E3D9F4;
	   color: white;
	   font-weight:bold;
	   border-width:thin;
	   border-color:white;
	   border-style:solid;

}
.td {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
}
.mytd1 {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
		background-color: #733ECA;
	   border: 1px solid #733ECA;
	   color: white;
	   font-weight:bold;
	   border-width:thin;
	   border-color:white;
	   border-style:solid;

}
.mylistouvr {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
   background-color: #b0d0FF;
   border: 1px solid #b0d0FF;
   color: white;
   font-weight:bold;
   border-width:thin;
   border-color:#999999;
   border-style:solid;
   width:380px;
}

.mylistlecons {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
		background-color: #00AFF0;
	   border: 1px solid #00AFF0;
	   color: white;
	   font-weight:bold;
	   border-width:thin;
	   border-color:white;
	   border-style:solid;
	   width:380px;

}
.mytextzone {
	font-family: "Century Gothic", Verdana;
	font-size: 12px;
   background-color: white;
   border: 1px solid white;
   color: #00AFF0;
   border-width:thin;
   border-color:white;
   border-style:none;
}
.mytextsearch {
	font-family: "Century Gothic", Verdana;
	font-size: 12px;
   background-color: white;
   border: 2px solid #00AFF0;
   color: #00AFF0;
   border-width:thin;
   border-color:#00AFF0;
   border-style:solid;
}
.marqueebg{height:407px;overflow: hidden;}
.sagessesw{width:420px;overflow: hidden;}
.forarabe{width:1026px;overflow: hidden;}
.divflash{margin-top:0px;margin-bottom:0px;padding-top:0px;vertical-align:bottom;}
.mylink{font-family:"Century Gothic", "Verdana"; font-size:12; color:black; text-decoration:none;}
.mylinkgras{font-family:"Century Gothic", "Verdana"; font-weight:bold; font-size:13; color:black; text-decoration:none;}
body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
}
.style1 {color: #00AFF0}
.gras {
	font-family: "Century Gothic", Verdana;
	font-size: 13px;
	color:black;
	font-weight:bold;
}
.ptxt {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
	color:black;
}
.standard {
	font-family: "Century Gothic", Verdana;
	font-size: 12px;
	color:black;
}
.blanc {
	font-family: "Century Gothic", Verdana;
	font-size: 13px;
	color:white;
	font-weight:bold;
}
.bleu {
	font-family: "Century Gothic", Verdana;
	font-size: 13px;
	color:blue;
	font-weight:bold;
}

.grand {
	font-family: "Century Gothic", Verdana;
	font-size: 14px;
	color:black;
}

.style4 {
	font-family: "Century Gothic", Verdana;
	font-size: 11px;
	color:#00AFF0;
}
.puce1 {font-family: Wingdings;
	font-size: 20px;
}
.puce2 {font-family: Wingdings}
.puce3 {font-family: Wingdings;
	font-size: 10px;
}
.titre1 {
	font-family: "Century Gothic", Verdana;
	font-size: 14px;
	font-weight:bold;
	color: blue;
}
.titre2 {
	font-family: "Century Gothic", Verdana;
	font-size: 14px;
	color:#990000;
	font-weight:bold;
}
.titre3 {
	font-family: "Century Gothic", Verdana;
	font-size: 14px;
	color:black;
	font-weight:bold;
}

tr.decoration img { display: block; }
td img.decoration2 {display: block;}
td img {display: block;}
</style>
<SCRIPT type="text/javascript">
function annule(){
    var dd=document.formconn.nom.value;
	var de=document.formconn.password.value;
      if(dd=="Votre Nom ou Email" || de=="passe") {
       document.formconn.nom.value="";
	   document.formconn.password.value="";
     }
}


var stateTimer = null;

function playFullscreen() {
// Check if the video is playing. If it is, change
// to fullscreen. If not, start checking to see when
// it is.
if (3 == VideoPlayer.playState) {
VideoPlayer.fullscreen = 'true';
} else {
VideoPlayer.controls.play();
if (!stateTimer) stateTimer =
window.setInterval( checkState, 500 );
}
}

function checkState() {
// Check periodically to see if the video has
// started. If so, destroy the timer and change to
// fullscreen
if (3 == VideoPlayer.playState) {
window.clearInterval( stateTimer );
stateTimer = null;
VideoPlayer.fullscreen = 'true';
}
}

function SendGetRequest(mapage,ref) {

	var xhr_object2 = null;
	var critere="";
	//diff home et ts article et constr
	if (ref!=0 && ref!=1000000 && ref!=2000000){
		if (ref==3000000){
			var ref2 = document.getElementById("ref").value;
			critere = "?ref=" + escape(ref2);
		} else {
			critere = "?ref=" + escape(ref);
		}
	}
	var url = mapage + ".php" + critere;
	//alert(url);
	if(window.XMLHttpRequest) // Firefox
	   xhr_object2 = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object2 = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}

	xhr_object2.open("GET", url, true);
	xhr_object2.onreadystatechange = function() {
	   if(xhr_object2.readyState == 4) document.getElementById( "divMain" ).innerHTML = xhr_object2.responseText;
	}

	xhr_object2.send(null);
}
function SendGetRequestsel(mapage,ref) {

	var xhr_object2 = null;
	var critere="";
	//diff home et ts article et constr
	if (ref!=0 && ref!=1000000 && ref!=2000000){
		if (ref==3000000){
			var ref2 = document.getElementById("ref").value;
			critere = "?ref=" + escape(ref2);
		} else {
			critere = "?ref=" + escape(ref);
		}
	}
	var url = mapage + ".php" + critere;
	//alert(url);
	if(window.XMLHttpRequest) // Firefox
	   xhr_object2 = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object2 = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}

	xhr_object2.open("GET", url, true);
	xhr_object2.onreadystatechange = function() {
	   if(xhr_object2.readyState == 4) document.getElementById( "zone" ).innerHTML = xhr_object2.responseText;
	}

	xhr_object2.send(null);
}

function SendGetRequestsel1(mapage,ref) {

	var xhr_object2 = null;
	var critere="";
	//diff home et ts article et constr
	if (ref!=0 && ref!=1000000 && ref!=2000000){
		if (ref==3000000){
			var ref2 = document.getElementById("ref1").value;
			critere = "?ref1=" + escape(ref2);
		} else {
			critere = "?ref1=" + escape(ref);
		}
	}
	var url = mapage + ".php" + critere;
	//alert(url);
	if(window.XMLHttpRequest) // Firefox
	   xhr_object2 = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object2 = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}

	xhr_object2.open("GET", url, true);
	xhr_object2.onreadystatechange = function() {
	   if(xhr_object2.readyState == 4) document.getElementById( "zone1" ).innerHTML = xhr_object2.responseText;
	}

	xhr_object2.send(null);
}

function SendGetRequestHTML(mapage,ref) {

	var xhr_object2 = null;
	var critere="";
	var url = mapage + ".htm";
	//alert(url);
	if(window.XMLHttpRequest) // Firefox
	   xhr_object2 = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object2 = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}

	xhr_object2.open("GET", url, true);
	xhr_object2.onreadystatechange = function() {
	   if(xhr_object2.readyState == 4) document.getElementById( "divMain" ).innerHTML = xhr_object2.responseText;
	}

	xhr_object2.send(null);
}

	function submitForm()
			{
				var req = null;
				var l1    = frm7.elements['audios'];
				//var id	  =frm.elements["'.$table.'"]
				var index = l1.selectedIndex;


				document.getElementById("zone").innerHTML = "Started...";

				if (window.XMLHttpRequest)
				{
		 			req = new XMLHttpRequest();
					if (req.overrideMimeType)
					{
						req.overrideMimeType("text/xml; charset=iso-8859-1");
					}
				}
				else if (window.ActiveXObject)
				{
					try {
						req = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e)
					{
						try {
							req = new ActiveXObject("Microsoft.XMLHTTP");
						} catch (e) {}
					}
			        	}



				req.onreadystatechange = function()
				{
					document.getElementById("zone").innerHTML = "Wait server...";
					if(req.readyState == 4)
					{
						if(req.status == 200)
						{
							document.getElementById("zone").innerHTML  = "" + req.responseText+"";
						}
						else
						{
							document.getElementById("zone").innerHTML="Error: returned status code " + req.status + " " + req.statusText;
						}
					}
				};
		       req.open("POST", "testkc.php", true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		   var data = "family="+escape(l1.options[index].value);
                          req.send(data);
		  // req.send(data1);

			}
</script>
<!--Fireworks CS3 Dreamweaver CS3 target.  Created Thu Nov 17 12:57:44 GMT+0000 (Maroc) 2011-->
<script language="JavaScript1.2" type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

//-->
</script>
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
/*
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
*/

?>