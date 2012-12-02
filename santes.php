<?php
include 'all_function.php';
if(isset($_POST['PROF_ID']))
{
$localite =$_POST['PROF_ID'];
if($localite<>""){

function separationord($page,$id,$table,$where,$champord,$long){
	 if(@($_GET[$id])=="")
	$compt=0;
	else
	$compt=$_GET[$id] ;
	
	if($compt==0)
	 $sql="select * from $table where localite5='$where'   order by $champord  limit $compt,".($long);
	else
	 $sql="select * from $table where localite5='$where'   order by $champord  limit ".($long+$long*($compt-1)).",".($long);
	//}
	 //echo"<br>".$sql;
    return $sql;

}
function afficheseparationord($page,$id,$table,$where,$compt,$cols,$long){
    $sql1="select * from $table  where localite5='$where' order by $champord ";
	$exe1=mysql_query($sql1) or die(mysql_error());
	$nb=mysql_num_rows($exe1);
	$nbpage=$nb/$long;
	    echo'<tr bgcolore=blue><td colspan='.$cols.' align=center>';
                   if($compt<>0)
                   echo'<a href="'.$page.''.$id.'='.($compt-1).'"> << Précédent</a>';
                   echo'&nbsp; &nbsp;';
                   if(($compt+1)<$nbpage AND $nbpage<>1)
                   echo'<a href="'.$page.''.$id.'='.($compt+1).'">Suivant >> </a></td>';

                   echo'</tr>';
}
function affiche_dossier(){
$localite =$_POST['PROF_ID'];
$etag = findByValue('localite5','id',$localite);
						$cha = mysql_fetch_row($etag);
						$libelle=$cha[1];
						$region=$cha[2];
$datejour=date("Y")."-".date("m")."-".date("d");
  $j=1;
  //$exe=mysql_query("select * from dossier limit $nbstart,$long");
   $exe=mysql_query(separationord("structures.php","compt","structures",$localite,"type5",2));
  echo'<br><table border="0" cellpadding="0" cellspacing="5" width="800" BGcolore=yellow align=center>
       						';

					    while($row1=mysql_fetch_row($exe)) { // lecture d'une entrée
					    //idDos  idPro theme reference idNat idCl idGest dateEnr  htmlentities(
                          	$p1=$row1[0];
						$structure=$row1[1];
						
						$type=$row1[2];
						$localite=$row1[3];
						$tel=$row1[4];
						$adresse=$row1[5];
						$etag = findByValue('type5','id',$type);
						$cha = mysql_fetch_row($etag);
						$libellet=$cha[1];

                              if($j==1)
							   echo"<tr>";
                             
						                                 $bgcolor="#00FF00";
							    echo'<td width="280" valign="top" HEIGHT=100%>
							    <table border="1" cellpadding="2" cellspacing="0"  bordercolor=white width="280" bgcolorE="red" HEIGHT=100%>
							       <tr>

							            <td  height="25" align="center" bgcolor="#CCFFFF">
							                      <div align="center" class="titre">Localit&eacute; '.
							                           htmlentities($region).'-'.htmlentities($libelle).'
							                      </div>
							            </td>

							       </tr>
							       <tr>
							            <td  align="left" valign=top class=kc2 Bgcolor='.$bgcolor.'>
                                             <b><i><u>Structure Sanitaire : </u></i></b>'.htmlentities($libellet).' '.htmlentities($structure).'
                                             <br><b><i><u>T&eacute;l&eacute;phone : </u></i></b>'.$tel.'                                             
                                             <br><b><i><u>Adresse : </u></i></b>'.htmlentities($adresse);
                                                                      echo'
							            </td>

							       </tr>
								</table>
								</td>';
							      if($j==3){
							   		echo"</tr>";
							        $j=0;
							     }
							     $j++;


					    }
					   // closedir($dir); // fermeture du dossier
					    echo"</tr>";
		afficheseparationord("structures.php","compt","structures",$localite,"type5",@$_GET["compt"],1,2);
					    echo"
						</table>";

}
@affiche_dossier(0,2);
}
}
?>