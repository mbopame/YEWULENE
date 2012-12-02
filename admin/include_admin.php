<?php
?>
<html>

<head>
  <title>YEWULENE GUIR FAGO ADMINISTRATION</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <?
  include"style.php";

  ?>
 <!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

</head>

<body>
 <table border="0" cellpadding="0" cellspacing="0" width="1135" align="center" bgcolore="black" height="500">
  <tr>
   <td bgcolor="#EFEFEF" height="50" >
<div align="left" class="kb1">      WELCOM ADMINISTATEUR DE YEWULENE GUIR FAGO 
</div>      <?php
     include"../dao/connection.php";
      include"../dao/savekc2.php";
      include"../dao/action.php";
      include"../metier/metier.php";

 echo "<div align='right'><a href=../index.php>Se Déconnecter</a></div>";
?>
   </td>
   </tr>
   <tr>
   <td align="center" valign="top">
    <!--a href="ajout_info_entreprise.php" class="bt">Societe Annexes</a> &nbsp;
    <a href="entrepriseadmin.php" class="bt">Entreprises </a> &nbsp;
    <a href="visibilite.php" class="bt">Visibilité</a>&nbsp;
    <a href="vignette.php" class="bt">Vignette </a>&nbsp;
    <a href="admin_recrutement.php" class="bt">RECRUTEMENT DU MOMENT</a>&nbsp;
    <a href="admin_appel_offres.php" class="bt">APPELS D'OFFRES</a> &nbsp;
    <a href="admin_offres_emplois.php" class="bt">OFFRES D'EMPLOIS</a-->
    <?php
    $exereqb=mysql_query("select * from menu_admin order by nom_rubrique asc") or die(mysql_error());
    while ($rlig=mysql_fetch_array($exereqb)) {
     echo'<a href="'.$rlig[1].'" class="bt">'.$rlig[0].'</a> &nbsp;';
    }
	?>
   </td>
  </tr>
  <Tr>
     <td  valign="top">
     <?
	/* if($table<>"infection5" && $table<>"region5" && $table<>"services")
	 {*/
      if (@$_GET["idm"]=="del") {
            $titre="Suppression $table";
			form_action($table,$titre,"&sup=1&");
      }
      else  if (@$_GET["idm"]=="upd") {
      		$titre="Modification $table";
			form_action($table,$titre,"&mod=1&");

      }
      else {
            $titre="Ajout $table";
			form_insert($table,$_SERVER['REQUEST_URI'],$titre,"kct","?");
			insert_table($table,$_SERVER['REQUEST_URI']);


      }

      echo'<br /><div align="center"><a href="'.$page.'" class="bt1">Ajouter</a> <a href="'.$page.'?idm=upd" class="bt1">Modifier</a> <a href="'.$page.'?idm=del" class="bt1"> Supprimer</a></div>';
/*}
else{
if (@$_GET["idm"]=="upd") {
      		$titre="Modification $table";
			form_action($table,$titre,"&mod=1&");
}
else{
$titre="Modification $table";
			form_action($table,$titre,"?idm=upd &mod=1&");
			}
    //echo'<br /><div align="center"><a href="'.$page.'?idm=upd" class="bt1">Modifier</a> </div>';

}*/

     ?>
     </td>
  </tr>
</table>

</body>

</html>