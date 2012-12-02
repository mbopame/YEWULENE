<?php
function affichePage($nb,$page,$total) {
        $nbpages=ceil($total/$nb);
        $numeroPages = 1;
        $compteurPages = 1;
        $limite  = 0;
        echo '<table border = "0" ><tr>'."\n";
        while($numeroPages <= $nbpages) {
        echo '<td ><a href = "'.$page.'?limite='.$limite.'">'.$numeroPages.'</a></td>'."\n";
        $limite = $limite + $nb;
        $numeroPages = $numeroPages + 1;
        $compteurPages = $compteurPages + 1;
            if($compteurPages == 10) {
            $compteurPages = 1;
            echo '<br>'."\n";
            }
        }
        echo '</tr></table>'."\n";
}
function actudefil($table,$animated,$width,$height){

 $req="select * from $table order by id desc
limit 0,5 ";
 $reqexe=mysql_query($req);
		echo"<div id='".$animated."' style='padding-top:px;padding-left: px;'>";
		$p=1;
while ($row=mysql_fetch_array($reqexe)) {
$p++;
	if($row[3]=='')
	
					 
					 
	//$ls="<a href='agenda.php?idact='><b>".$row[1]."</b><small>".$row[2]."</small></a>";
	$ls='<a href="agenda.php?idact='.$row[0].'">'.'<b>'.$row[1].'</b><small>'.$row[2].' </small></a>';
	else
		//$ls="<a href='allfichiers/'".$row[3]." target='_blank'><b>".$row[1]."</b><small>".$row[2]."</small></a>";
		$ls='<a href="allfichiers/'.$row[3].'" target="_blank">'.'<b>'.$row[1].'</b><small>'.$row[2].' </small></a>';
		
      echo'

       '.$ls;


}

	echo"</div>	";

}
function affichePages($nb,$page,$total,$ide) {
        $nbpages=ceil($total/$nb);
        $numeroPages = 1;
        $compteurPages = 1;
        $limite  = 0;
        echo '<table border = "0" ><tr>'."\n";
        while($numeroPages <= $nbpages) {
//        echo '<td ><a href = "'.$page.'?limite='.$limite.'">'.$numeroPages.'</a></td>'."\n";
        echo '<td ><a href = "'.$page.'?limite='.$limite.'& id='.$ide.'">'.$numeroPages.'</a></td>'."\n";
        $limite = $limite + $nb;
        $numeroPages = $numeroPages + 1;
        $compteurPages = $compteurPages + 1;
            if($compteurPages == 10) {
            $compteurPages = 1;
            echo '<br>'."\n";
            }
        }
        echo '</tr></table>'."\n";
}
function verifLimite($limite,$total,$nombre) {
    // je verifie si limite est un nombre.
    if(is_numeric($limite)) {

// si $limite est entre 0 et $total, $limite est ok
        // sinon $limite n'est pas valide.
        if(($limite >=0) && ($limite <= $total) && (($limite%$nombre)==0)) {
            // j'assigne 1 à $valide si $limite est entre 0 et $max
            $valide = 1;
        }
        else {
            // sinon j'assigne 0 à $valide
            $valide = 0;
        }
    }
    else {
            // si $limite n'est pas numérique j'assigne 0 à $valide
            $valide = 0;
    }
// je renvois $valide
return $valide;
}
function displayNextPreviousButton($limite,$total,$nb,$page) {
$limiteSuivante = $limite + $nb;
$limitePrecedente = $limite - $nb;

echo  '<table><tr>'."\n";
if($limite != 0) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="'.$page.'" method="post">'."\n";
        echo  '<input type="submit" value="précédents">'."\n";
        echo  '<input type="hidden" value="'.$limitePrecedente.'" name="limite">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";
}
if($limiteSuivante < $total) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="'.$page.'" method="post">'."\n";
        echo  '<input type="submit" value="suivants">'."\n";
        echo  '<input type="hidden" value="'.$limiteSuivante.'" name="limite">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";

}
echo  '</tr></table>'."\n";
}
function displayNextPreviousButtons($limite,$total,$nb,$page,$ide) {
$limiteSuivante = $limite + $nb;
$limitePrecedente = $limite - $nb;

echo  '<table><tr>'."\n";
if($limite != 0) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="'.$page.'" method="post">'."\n";
        echo  '<input type="submit" value="précédents">'."\n";
        echo  '<input type="hidden" value="'.$limitePrecedente.'" name="limite">'."\n";
		echo  '<input type="hidden" value="'.$ide.'" name="id">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";
}
if($limiteSuivante < $total) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="'.$page.'" method="post">'."\n";
        echo  '<input type="submit" value="suivants">'."\n";
        echo  '<input type="hidden" value="'.$limiteSuivante.'" name="limite">'."\n";
		echo  '<input type="hidden" value="'.$ide.'" name="id">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";

}
echo  '</tr></table>'."\n";
}
  function affiche_actu2($table,$width,$lang,$id){
    if ($lang=="fr") {
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    }
    else {
       $t=5;
       $c=6;
       $p=7;
       $pp="ang";

    }
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
		 	if($resultat[3]<>'')
		 		echo"<img src='allfichiers/".$resultat[3]."' width=100 hright=100 alt= border=0>";
		 	else
	            echo"";

		 	echo"</td><td>";
			
				
			echo"

						 <div align='' class='titr'> $resultat[$t]</div>
						<div align='justify' class='pt'>".$resultat[$c]."</div>";
						
				 if($resultat[4]<>'' and $lang=="fr")
					 echo'<div><a href="allfichiers/'.$resultat[4].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo("
						 <div align=right class=pt> Date Pub : $resultat[9]</div><br>
			</td></tr>");
		}
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table ORDER by id DESC limit 0,3");
	 }
	 else{
			$query1=mysql_query("select * from $table ORDER by id DESC ");	
	 }
     	
     }
     echo"<table>";
	while($resultat=mysql_fetch_array($query1))
	{
	 	echo"<tr><td>";
	 	if($resultat[3]<>'')
	 		echo"<img src='allfichiers/".$resultat[3]."' width=100 hright=100 alt= border=0>";
	 	else
            echo"";

	 	echo"</td><td>

					 <div align='' class='titr'> $resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width and $lang=="fr")
					 echo' &nbsp;&nbsp;&nbsp;<a href="actualites.php?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';
					 elseif(strlen($resultat[2])>$width and $lang=="ang")
					 echo' &nbsp;&nbsp;&nbsp;<a href="actualiteang.php?id_actu='.$resultat[0].'" class=>More >></a></div>';
elseif($resultat[4]<>'' and $lang=="fr")
					 echo'<div><a href="allfichiers/'.$resultat[4].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				elseif($resultat[8]<>'' and $lang=="ang")
					 echo'<div><a href="allfichiers/'.$resultat[8].'" target="_blank">'.'Pj>>'.' </a></div>';
	    echo("
					 <div align=right class=pt> Date Pub :$resultat[9]</div><br>
		</td></tr>");
	}
	$query1=mysql_query("select * from even where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  function affiche_actu($table,$width,$lang,$id){
    if ($lang=="fr") {
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    }
  
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
		 	if($resultat[3]<>'')
		 		echo"<img src='allfichiers/".$resultat[3]."' width=100 hright=100 alt= border=0>";
		 	else
	            echo"";

		 	echo"</td><td>";
			
				
			echo"

						 <div align='' class='titr'> $resultat[$t]</div>
						<div align='justify' class='pt'>".$resultat[$c]."</div>";
						
				 if($resultat[4]<>'' and $lang=="fr")
					 echo'<div><a href="allfichiers/'.$resultat[4].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo("
						 
			</td></tr>");
		}
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table ORDER by id DESC ");	
	 }
     	
   
     echo"<table>";
	while($resultat=mysql_fetch_array($query1))
	{
	 	echo"<tr><td>";
	 	if($resultat[3]<>'')
	 		echo"<img src='allfichiers/".$resultat[3]."' width=100 hright=100 alt= border=0>";
	 	else
            echo"";

	 	echo"</td><td>

					 <div align='' class='titr'> $resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width and $lang=="fr")
					 echo' &nbsp;&nbsp;&nbsp;<a href="actualites.php?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';
elseif($resultat[4]<>'' and $lang=="fr")
					 echo'<div><a href="allfichiers/'.$resultat[4].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
	    echo("
					 <div align=right class=pt> Date Pub :$resultat[5]</div><br>
		</td></tr>");
	}
	//$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  }
// afiche article
function affiche_article($table,$width,$lang,$id){
    if ($lang=="fr") {
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    }
  
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
			
				
			echo"

						 <div align='' class='titr'> $resultat[$t]</div>
						<div align='justify' class='pt'>".$resultat[$c]."</div>";
						
								
		    echo("
						 
			</td></tr>");
		}
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table where valider5='OUI' ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table where valider5='OUI' ORDER by id DESC ");	
	 }
     	
     
     echo"<table>";
	while($resultat=mysql_fetch_array($query1))
	{
	 	echo"<tr><td>

					 <div align='' class='titr'> $resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width and $lang=="fr")
					 echo' &nbsp;&nbsp;&nbsp;<a href="belleplumes.php?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';

	    echo("
		 <div align=left class=pt> Auteur :$resultat[3]</div>
					 <div align=right class=pt> Date Pub :$resultat[4]</div><br>
		</td></tr>");
	}
	$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
   }
  function affiche_info($table,$width,$id,$page){
 //$width= nombre de caractéres à afficher
    
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    //}
    
     
			$query1=mysql_query("select * from $table ORDER by id DESC ");	
	 //}
     	if($table=='discours')
		$mot='Mot du ';
		else
		$mot="";
     //}
     echo"<table>";
	while($resultat=mysql_fetch_array($query1))
	{
	 	echo"<tr><td>";
	 	if($resultat[3]<>'')
	 		echo"<img src='allfichiers/".$resultat[3]."' width=100 hright=100 alt= border=0>";
	 	else
            echo"";

	 	echo"</td><td>

					 <div align='' class='titr'> $mot$resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width )
					 echo' &nbsp;&nbsp;&nbsp;<a href="'.$page.'?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';
					
elseif($resultat[4]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[4].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
	    echo("
					 
		</td></tr>");
	}
	$query1=mysql_query("select * from $table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
   //affiche oeuvre
function affiche_oeuvre($table,$width,$id,$page){
 //$width= nombre de caractéres à afficher
    
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    //}
    if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
		 	
				
			echo"

						 <div align='' class='titr'> $resultat[$t]</div>
						<div align='justify' class='pt'>".$resultat[$c]."</div>";
						
				 if($resultat[3]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[3].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo("
						 <div align=right class=pt> Date Réalisation : $resultat[4]</div><br>
			</td></tr>");
		}
		
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
	 else{
     
			$query1=mysql_query("select * from $table ORDER by id DESC ");	
	 //}
         //}
     echo"<table>";
	while($resultat=mysql_fetch_array($query1))
	{
	 	echo"<tr><td>";
	 	
	 	echo"

					 <div align='' class='titr'> $resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width )
					 echo' &nbsp;&nbsp;&nbsp;<a href="'.$page.'?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';
					
elseif($resultat[3]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[3].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
	    echo("
					<div align=right class=pt> Date Réalisation :$resultat[4]</div><br> 
		</td></tr>");
	}
	//echo$query1=mysql_query("select * from $table where id ='".@$_GET["id_actu"]."'");
    echo"</table>";
	}
  }
    function affiche_contenu($table){

  	$exe_req_champs=mysql_query("select * from $table") or die(mysql_error());
  	$row=mysql_fetch_array($exe_req_champs);
  	echo $row[1];
  	}
  function affiche_contenu2($table,$page,$width){
  
  $exe_req_champs=mysql_query("select * from $table") or die(mysql_error());
  	$resultat=mysql_fetch_array($exe_req_champs);
	
	   echo"<table>";
	/*while($resultat=mysql_fetch_array($exe_req_champs))
	{*/
	 	echo"<tr><td>";

	 	echo"

					<div align=justify class=pt>".substr($resultat[1],0,$width)."...";
					 if(strlen($resultat[1])>$width )
					 echo' &nbsp;&nbsp;&nbsp;<a href="'.$page.'" class=>Lire La Suite >></a></div>';
					
				
	    echo("
					 
		</td></tr>");
	//}
	$query1=mysql_query("select * from $table ");
    echo"</table>";
  
  }
  // affiche agenda
function affiche_agenda($table,$width,$lang,$id){
    if ($lang=="fr") {
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    }
  
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
		 	if($resultat[3]<>'')
		 		echo"<img src='allfichiers/".$resultat[3]."' width=100 hright=100 alt= border=0>";
		 	else
	            echo"";

		 	echo"</td><td>";
			
				
			echo"

						 <div align='' class='titr'> $resultat[$t]</div>
						<div align='justify' class='pt'>".$resultat[$c]."</div>";
						
				 if($resultat[3]<>'' and $lang=="fr")
					 echo'<div><a href="allfichiers/'.$resultat[3].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo("
						 
			</td></tr>");
		}
	    echo"</table>";
     //  $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table ORDER by id DESC ");	
	 }
     	
   
     echo"<table>";
	while($resultat=mysql_fetch_array($query1))
	{
	 	echo"<tr><td>";

	 	echo"

					 <div align='' class='titr'> $resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width and $lang=="fr")
					 echo' &nbsp;&nbsp;&nbsp;<a href="agenda.php?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';
elseif($resultat[3]<>'' and $lang=="fr")
					 echo'<div><a href="allfichiers/'.$resultat[3].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
	    echo("
					 <div align=right class=pt> Date Pub :$resultat[4]</div><br>
		</td></tr>");
	}
	//$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  }
function affiche_emploi($table,$condition,$page,$id){
    
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";			
			echo"	 <div align='' class='titr'> $resultat[3]</div>
						<b>Annonceur : </b><div align='justify' class='pt'> ".$resultat[2]."</div>
						<b>Formation : </b><div align='justify' class='pt'>".$resultat[4]."</div>
						<b>Description du poste : </b><div align='justify' class='pt'>".$resultat[5]."</div>
						<b>Dossier de Candidature : </b><div align='justify' class='pt'>".$resultat[6]."</div>
						
						";
						
				 if($resultat[7]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[7].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo(" 	<div align='justify' class='pt'> Date Expiration: ".$resultat[8]."</div>
						 
			</td></tr>");
		}
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table  where ".$condition."ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table where ".$condition." ORDER by date_expire2 DESC ");	
	 }
     	 echo'
		<B><a href="ajemplois.php">	Ajouter Un Job</a></B>
			';
   
     echo"<center><table>";
	echo' <TR>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Titre du Poste&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Publication&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Expiration&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Annonceur&nbsp;</B></FONT></TD>
</tr><tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[7]=='')
$ls='<a href="'.$page.'?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[3].'</small></a>';
	else
		//$ls="<a href='allfichiers/'".$row[3]." target='_blank'><b>".$row[1]."</b><small>".$row[2]."</small></a>";
		$ls='<a href="allfichiers/'.$resultat[7].'" target="_blank">'.'<b>'.$resultat[3].'</b></a>';
		
      
	   
	 	echo"
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[8]." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[9]." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[2]." &nbsp;</B></FONT></Td>
</tr>";

	}
	//$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  }
  //affiche bibliotheque
function affiche_biblio($table,$condition,$page,$id,$nature){
    
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>
			Espace $nature
			</tr></td>";
			echo"<tr><td>";
				
			echo"

						 <b>Titre : </b><div align='' class='titr'> $resultat[1]</div>
						<b>Domaine : </b><div align='justify' class='pt'> ".$resultat[2]."</div>
						<b>Synthése : </b><div align='justify' class='pt'>".$resultat[4]."</div>
						<b>Auteur : </b><div align='justify' class='pt'>".$resultat[5]."</div>
						
						";
						
				 if($resultat[6]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[6].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo(" 	
						 
			</td></tr>");
		}
	    echo"</table>";
      // $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table  where ".$condition."ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table where ".$condition." ORDER by id DESC ");	
	 }
     	
   echo'
		<B><a href="document.php">	Ajouter Un document</a></B>
			';
     echo"<center><table>";
	 echo"<tr><td >
			
		<B>	Espace $nature</B>
			
			</tr></td>";
			echo' <TR>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Titre du Document&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Domaine&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Auteur&nbsp;</B></FONT></TD>
</tr><tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[6]=='')
$ls='<a href="'.$page.'?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[1].'</small></a>';
	else
		//$ls="<a href='allfichiers/'".$row[3]." target='_blank'><b>".$row[1]."</b><small>".$row[2]."</small></a>";
		$ls='<a href="allfichiers/'.$resultat[6].'" target="_blank">'.'<b>'.$resultat[1].'</b></a>';
		
      
	   
	 	echo"
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[2]." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[5]." &nbsp;</B></FONT></Td>
</tr>";

	}
	//$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  }
   //affiche clubs
function affiche_mentorat($table,$page,$id,$nature){
	 if($id=="sss"){
			$query1=mysql_query("select * from $table  ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table  ORDER by id DESC ");	
	 }
     echo"<center><table>";
	 echo"<tr><td >
			
		<B>	Espace $nature</B>
			
			</tr></td>";
			echo' <tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[2]=='')
$ls='<a href="'.$page.'?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[1].'</small></a>';
	else
		$ls='<a href="allfichiers/'.$resultat[2].'" target="_blank">'.'<b>'.$resultat[1].'</b></a>';
		   echo"<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td></tr>";
	}
    echo"</table>";
 
  }
  //affiche clubs
function affiche_clubs($table,$page,$id,$nature){
	 if($id=="sss"){
			$query1=mysql_query("select * from $table where valider5='OUI'  ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table where valider5='OUI'  ORDER by id DESC ");	
	 }
	    echo'
		<B><a href="ajclubs.php">	Ajouter Un Club</a></B>';
     echo"<center><table>";
	 echo"<tr><td >
			
		<B>	Liste des $nature</B>
			
			</tr></td>";
			echo' <tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[2]=='')
$ls='<a href="'.$page.'?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[1].'</small></a>';
	else
	$ls='<a href="http://'.$resultat[2].'" target="_blank" class="me"">'.'<b>'.$resultat[1].' </b></a> ';

		   echo"<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td></tr>";
	}
    echo"</table>";
 
  }
 //affiche vidéothéque
  function affiche_video($table,$condition,$page,$id,$nature){
	if($id=="sss"){
			$query1=mysql_query("select * from $table  where ".$condition."ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table where ".$condition." ORDER by id DESC ");	
	 }
	    echo'
		<B><a href="ajmedia.php">	Ajouter Audio ou Video</a></B>';
     echo"<center><table>";
	 echo"<tr><td >
			
		<B>	Liste des $nature</B>
			
			</tr></td>";
			echo' <tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[2]=='')
$ls='<a href="'.$page.'?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[1].'</small></a>';
	else
	$ls='<a href="'.$resultat[2].'" target="_blank" class="me"">'.'<b>'.$resultat[1].' </b></a> ';

		   echo"<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td></tr>";
	}
    echo"</table>";
 
  }
      //formation séminaire
     function affiche_formation($table,$condition,$page,$id,$titre){
    
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
		 	

		 
			
				
			echo"

						 <div align='' class='titr'> $resultat[2]</div>
						<b>Description : </b><div align='justify' class='pt'> ".$resultat[3]."</div>
						<div align='justify' class='pt'> Début Formation : ".$resultat[4]."</div>
						<div align='justify' class='pt'> Durée : ".$resultat[5]." mois</div>
						
						";
						
				 if($resultat[6]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[6].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo("		 
			</td></tr>");
		}
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table  where ".$condition."ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table where ".$condition." ORDER by date_debut2 DESC ");	
	 }
     	
  echo'
		<B><a href="ajformation.php">	Proposer Formations ou Seminaires</a></B>';
     echo"<center><table>";
	echo' <TR>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;'.$titre.'&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Date Début&nbsp;</B></FONT></TD>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Durée&nbsp;</B></FONT></TD>
</tr><tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[6]=='')
$ls='<a href="'.$page.'?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[2].'</small></a>';
	else
		//$ls="<a href='allfichiers/'".$row[3]." target='_blank'><b>".$row[1]."</b><small>".$row[2]."</small></a>";
		$ls='<a href="allfichiers/'.$resultat[6].'" target="_blank">'.'<b>'.$resultat[2].'</b></a>';
		
      
	   
	 	echo"
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[4]." &nbsp;</B></FONT></Td>
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$resultat[5]." &nbsp;</B></FONT></Td>
</tr>";

	}
	//$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  }
//affiche bourse
   function affiche_bourse($table,$id){
    
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table>";
		while($resultat=mysql_fetch_array($query))
		{
		 	echo"<tr><td>";
		 	

		 
			
				
			echo"

						 <div align='' class='titr'> $resultat[1]</div>
						<b>Annonceur : </b><div align='justify' class='pt'> ".$resultat[1]."</div>
						
						";
						
				 if($resultat[2]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[2].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
		    echo("						 
			</td></tr>");
		}
		
	    echo"</table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
	 if($id=="sss"){
			$query1=mysql_query("select * from $table where valider5='OUI'  ORDER by id DESC limit 0,2");
	 }
	 else{
			$query1=mysql_query("select * from $table  where valider5='OUI' ORDER by id DESC ");	
	 }
     	
    echo'
		<B><a href="ajbourse.php">	Ajouter une proposition de bourses</a></B>';
     echo"<center><table>";
	echo' <TR>
<TD align=center colspan=1 NOWRAP><FONT COLOR="#5773AD"><B>&nbsp;Liste des Bourses&nbsp;</B></FONT></TD>
</tr><tr>';

	 
	while($resultat=mysql_fetch_array($query1))
	{
	if($resultat[2]=='')
$ls='<a href="bourses.php?id_actu='.$resultat[0].'" >'.'<small>'.$resultat[1].'</small></a>';
	else
		//$ls="<a href='allfichiers/'".$row[3]." target='_blank'><b>".$row[1]."</b><small>".$row[2]."</small></a>";
		$ls='<a href="allfichiers/'.$resultat[2].'" target="_blank">'.'<b>'.$resultat[1].'</b></a>';
		
      
	   
	 	echo"
<Td align=center  NOWRAP ><FONT  ><B>&nbsp;".$ls." &nbsp;</B></FONT></Td>
</tr>";

	}
	//$query1=mysql_query("select * from table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
  }
  function date_fr_en($date){
     $date=str_replace(".","-",str_replace("/","-",$date));
     $tab=explode("-",$date);
     return   $tab[2]."-".$tab[1]."-".$tab[0];
 }
 function date_en_fr($date){
   $date=str_replace(".","-",str_replace("/","-",$date));
     $tab=explode("-",$date);
     return   $tab[2]."-".$tab[1]."-".$tab[0];
 }
  function separation_rech($req,$id,$champord,$long){
	 if(@($_GET[$id])==""){
	$compt=0;
	}
	else{
	$compt=$_GET[$id] ;
	}
	if($compt==0){
	 $sql= $req." order by $champord DESC limit $compt,".($long);
	 }
	else{
	 $sql=$req." order by $champord DESC limit ".($long+$long*($compt-1)).",".($long);
	 }
	 //echo"<br>".$sql;
    return $sql;
}
function afficheseparation_rech($page,$id,$req,$champord,$compt,$cols,$long){
    $sql1=$req." order by $champord DESC ";
	$exe1=mysql_query($sql1) or die(mysql_error());
	$nb=mysql_num_rows($exe1);
	$nbpage=$nb/$long;

	    echo'<tr bgcolor=#8CBAFF><td colspan='.$cols.' align=center height="30">';
	    for ($i=1; $i<$nbpage; $i++) {
          echo'<a href="'.$page.''.$id.'='.$i.'"> '.$i.'</a>';
     	}
                   if($compt<>0){
                   echo'<a href="'.$page.''.$id.'='.($compt-1).'"> << Précédent</a>';
                   }
                   echo'&nbsp; &nbsp;';
                   if(($compt+1)<$nbpage AND $nbpage<>1){
                   echo'<a href="'.$page.''.$id.'='.($compt+1).'">Suivant >> </a></td>';
                   }

                   echo'</tr></table>';
 }
 function recherche($table,$titre,$j,$sal,$page,$aff,$qui,$quoi,$ou){
  if($aff=="oui"){
    $req_champs="select* from ".$table;
  	$exe_req_champs=mysql_query($req_champs) or die("erreur selection");
    //echo $req_champs;
    if ($j=="ide") {
      echo"<form name='frm' action='verifuser.php?$j=sss&' onsubmit='return (conform(this));'   method='POST'>";
    }
    else {
     echo"<form name='frm' action='".$page."&$j=sss' onsubmit='return (conform(this));'  enctype='multipart/form-data'   method='POST'>";
    }



  	$all_values="";
  	$i=0;
  	$mysss="";
  	$mynbt="";
  	echo"<table border=0 cellpadding=0 cellspacing=5>";
  //	echo"<div align='center'><i>Toutes les Informations financières et légales de 10.000 Entreprises du Sénégal</i></div>";
     while($row = mysql_fetch_field($exe_req_champs)){
     $result = mysql_query("SELECT $row->name FROM $table");
	 $length = mysql_field_len($result, 0) or die();
	 //echo $length;
       $len=strlen($row->name);
       $en=$row->name;

       $n1=substr($row->name,0,1);
        $a=$en{$len-1};
        //echo"a = $a <br>";
        $type="";

        			//  if(is_numeric($a)) {
          $name=substr($row->name,0,$len);
                            if($a==1) {
                                 $type="obligatoire";
                                 $name=substr($row->name,0,$len-1);
                      		}
                      		elseif($a==2) 	{
								$type="date";
								$name=substr($row->name,0,$len-1);

                            }
                            elseif($a==3) 	{
								$type="numeric";
								$name=substr($row->name,0,$len-1);
                            }
                            elseif($a==4) 	{
								$type="file";
								$name=substr($row->name,0,$len-1);
                            }
                            elseif($a==5) 	{
									$type="select";
									$name=substr($row->name,0,$len-1);

	        				}
	        				elseif($a==6) 	{
									$type="mail";
									$name=substr($row->name,0,$len-1);

	        				}
	        				elseif($a==7) 	{
									$type="password";
									$name=substr($row->name,0,$len-1);

	        				}
	        				elseif($a==8) 	{
									$type="mask";
									$name=substr($row->name,0,$len-1);

	        				}



           if($row->type=='int'){

             echo"<input type='hidden' name='".$row->name."'";

           }
           elseif($row->type=='string'){

            	if ($type=="numeric") {
            		//ECHO"deiee";
	           		echo "<tr>
	           		   <td>"
	           		   .str_replace("_"," ",$name).
	           		   "</td><td><input class='kc1' type=text name='".$row->name."' size='".$length."' value=''/></td></tr>";
	                  echo"
						 <script type=text/javascript>      //
		            			new SUC( document.frm.".$row->name.");       //
	    				</script>
						";
                }
	            elseif($type=="date") {
		            //echo "<tr><td>".str_replace("_"," ",$name)." </td><td> <input class=kc1 type=text name='".$row->name."' size='".$length."'  lange='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme' /></td></tr>";

                   	 echo "<tr><td align=right>".str_replace("_"," ",$name).' </td><td> ';
                   	 echo ' <input type="text" id="'.str_replace("_"," ",$name).'" name="'.$row->name.'" class="kc1" value=""  onfocus=view_microcal(true,"'.$row->name.'","microcal",-1,0); onblur=view_microcal(false,"'.$row->name.'","microcal",-1,0); onkeyup=this.style.color=testTypeDate(this.value)?"black":"red" size="15"
	                lange="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" /> //'.date("d/m/Y").'
			        </td></tr> ';
	            }

	            elseif($type=="obligatoire") {


		             	 echo "<tr><td>".str_replace("_"," ",$name)."</td><td>  <input class='kc1' id='".str_replace("_"," ",$name)."' type=text name=".$row->name." size='".$length."'  lange='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champ Obligatoire' /></td></tr>";


	            }
	            elseif($type=="file"){

							echo "<tr><td>".str_replace("_"," ",$name)."</td><td>


							<input class=kc1  id='".str_replace("_"," ",$name)."' type=file name='".$row->name."' size='".$length."' /></td></tr>";

	            }
	            elseif($type=="mail") {

                      echo "<tr><td>".str_replace("_"," ",$name).' </td><td> ';

	                echo ' <input value="" type="text" id="'.str_replace("_"," ",$name).'" size="'.$length.'" name="'.$row->name.'" class="kc1"
	                lange="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: mail;erreur:Email non conforme" />
			   </td></tr> ';



	             //echo'<input class=kc1 type="text" name="'.$row->name.'"  size="'.$length.'" lange="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" /></td></tr>';
	             $date_ref=$row->name;
	            }
	            elseif($type=="select"){
	            				if($row->name=="type_courrier5"){
	            					 $tabsel="nature";
	            				}

	                          else{
	                          	 $tabsel=$name."5";
	                          }
	                          $req_sel="select * from $tabsel" ;
	                          //echo "cc ".$tabsel;
	                          $eex=mysql_query($req_sel) or die(mysql_error());

	                  /*   echo "<tr><td> ".str_replace("_"," ",$name).'</td><td>
	                     <select class=mylistkc  id="'.str_replace("_"," ",$name).'" type="text" name="'.$row->name.'" size="1" langE="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" />

	                     <option value=></option>
	                     ';
	                        while($ro=mysql_fetch_row($eex)){
	                            echo"<option value='".$ro[0]."' >".$ro[0]."</option>";
	                          }

	                     echo'
	                     </select>
	                     </td></tr>';
*/
	                         //ajouter par Wa_Darou
	                         $class="kc1";
		                 $exple="";
						 $na="";
		                  if ($qui==$row->name) {
                           $na="Qui" ;
                           $class="big";
                           $exple="(Par ex: promo 1)";
			              }
			              elseif ($quoi==$row->name) {
                           $na="Quoi" ;
                           $class="big";
                           $exple="Secteur Activité: Informatique";
			              }
			              elseif ($ou==$row->name) {
                            $na="Où" ;
                            $class="big";
                            $exple="Par  exemple : Dakar ";
			              }


			        /*  echo "<tr><td class=".$class." valign=top>".str_replace("_"," ",$na)."</td><td align=left>";
	           			echo'<input class="'.$class.'" type=text name="'.$row->name.'" value="'.str_replace("_"," ",@$_GET["idact"]).'" size="'.$length.'" />
	           			  <br>'.$exple.'</td></tr>';
*/
                    
	                     echo "<tr><td> ".str_replace("_"," ",$name).'</td><td>
	                     <select class=mylistkc  id="'.str_replace("_"," ",$name).'" type="text" name="'.$row->name.'" size="1" langE="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" />

	                     <option value=></option>
	                     ';
	                        while($ro=mysql_fetch_row($eex)){
	                            echo"<option value='".$ro[0]."' >".$ro[0]."</option>";
	                          }

	                     echo'
	                     </select>
	                     </td></tr>'; 

	               }
	            elseif($type=="password"){
     	          echo "<tr><td>".str_replace("_"," ",$name)."</td><td>  <input class='kc1' id='".str_replace("_"," ",$name)."' type='password' name=".$row->name." size='".$length."'  lange='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:Mot de Passe Obligatoire' /></td></tr>";

	            }
	            elseif ($type=="mask"){
	              echo"<input type=hidden name='".$row->name."'";
	            }
	            else{
		            if ($name=="datedebut") {
                        $na="Date de Début";
                    }
		            elseif($name=="datefin") {
                        $na="Date de Fin";

		            }
		            elseif($name=="dateRetour") {
                      $na="Date de Retour";
		            }
		            else{
		            	$na="$name";
		            }

		               if($na=="type_courrier5"){
		           echo "<tr><td align=right>".str_replace("_"," ",$na).'</td><td>   ';
		            $ext=mysql_query("select *from nature");
		            echo'<select class=mylistkc id="Classeur" name="'.$row->name.'"/>
		            		<option></option>';

                      while ($rw=mysql_fetch_array($ext)) {
                           echo"<option value=$rw[0]>$rw[1]</option>";
                      }
		            }
                    elseif($na=="courrie"){
		           echo "<tr><td align=right>Courrier</td><td>";
		            $ext=mysql_query("select *from classeur");
		            echo'<select class=mylistkc id="Classeur" name="'.$row->name.'"/>
		            		<option></option>
		            		<option value=arrivee>Arrivée</option>
		            		<option value=depart>Départ</option>';


		            }
		            elseif($na=="idCl"){
		           echo "<tr><td align=right>Classeur</td><td>";
		            $ext=mysql_query("select *from classeur");
		            echo'<select class=mylistkc id="Classeur" name="'.$row->name.'"/>
		            		<option></option>';

                      while ($rw=mysql_fetch_array($ext)) {
                           echo"<option value=$rw[0]>$rw[2]</option>";
                      }
		            }
		            elseif($na=="idGest"){
		            echo "<tr><td align=right>Enregistreur</td><td>";
		             //$ext=mysql_query("select *from gestionnaire");
	                     echo'<select class=mylistkc id="Gestionnaire" name="'.$row->name.'"/>
			            		<option></option>';
	                    //  while ($rw=mysql_fetch_array($ext)) {
	                           echo"<option value=".$_SESSION["enreg"].">".$_SESSION["enreg"]."</option>";
	                     // }
		            }
		            elseif($na=="date limite"){
		            echo "<tr><td align=right>".str_replace("_"," ",$na).'</td><td>   ';
              			echo'<input class=kc1 type=radio name="'.$row->name.'" size="'.$length.'" />';
		            }
		            else{
		                 $class="kc1";
		                 $exple="";
		                  if ($qui==$row->name) {
                           $na="Qui" ;
                           $class="big";
                           $exple="(Par ex: sen2i)";
			              }
			              elseif ($quoi==$row->name) {
                           $na="Quoi" ;
                           $class="big";
                           $exple="Par exemple : Restaurant";
			              }
			              elseif ($ou==$row->name) {
                            $na="Où" ;
                            $class="big";
                            $exple="Par  exemple : Dakar ";
			              }


			            echo "<tr><td class=".$class." valign=top>".str_replace("_"," ",$na)."</td><td align=left>";
	           			echo'<input class="'.$class.'" type=text name="'.$row->name.'" value="" size="'.$length.'" />
	           			  <br>'.$exple.'';
	           		}
	           		echo'</td></tr>';
	            }




           }
           elseif($row->type=='blob'){
             if($type=="obligatoire"){
               echo "<tr><td VALIGN='top'  align=right>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  id='".str_replace("_"," ",$name)."' langE='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;'  class=kc1 cols='70' rows='3'></textarea></td></tr>";
               }
             else{
               echo"<tr><td VALIGN='top' align=right>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  class=kc1 cols='70' rows='3'></textarea></td></tr>";
               }
           }


            			if ($i==0) {
                              $all_values = $row->name;
		               }
		               else {
                         $all_values = $all_values.",".$row->name;
		               }
		               $i++;
    }

    echo'<tr><td></td><td>
    <table><tr><td><input type=image src="images/brech.gif" class=kc1 name="sub"></td></tr></table>
      </td></tr></table>
    ';
    //  </fieldset>
    echo'
  </form> ';
  }

  if(@$_GET["rech"]){

     //echo "sssm".$_GET["kct"];
     $ajout_uniq=0;
         $req_champs="select * from ".$table;
         $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
         $exe_req_champs1=mysql_query($req_champs) or die(mysql_error());
         $ligchamps=mysql_fetch_row($exe_req_champs);
         $recup_champs="";
  	 $i=0;
  	//recuperation des champs du formulaire


         //prepa champs pour insert
         $recup_champspolice="";
                 $all_champs="";
                 $pos="";
          	for($i=0;$i<mysql_num_fields($exe_req_champs);$i++)  {
          	       $pos=$pos;
          			  $colchamps  = mysql_field_name($exe_req_champs, $i);

                             if ($all_champs=="") {
		                              if (@($_POST["".$colchamps.""])<>"") {
		                              $all_champs = $colchamps;
		                              $a=$colchamps{strlen($colchamps)-1};
		                              //echo $a .'/'.$colchamps;
       	                               if ($a==2 or $a==6) {
       	                                $re=str_replace(".","/",$_POST["$colchamps"]);
                                        $recup_champs =str_replace("-","/",$re);
                                       }
                                       elseif($a==4) {
                                       $stock = getcwd();
                                       $dir=$stock."/allfichiers/";
                                       move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
                                         $recup_champs ="".addslashes($_FILES["$colchamps"]['name']);
                                       }
                                       else {
                                         $recup_champs = "".($_POST["$colchamps"]);
                                       }

		                              }

                             }
                             else {
                              if (@($_POST["".$colchamps.""])<>""){
                               $all_champs = $all_champs.",".$colchamps;
                               $a=$colchamps{strlen($colchamps)-1};
                                       if ($a==2 or $a==6) {
                                        $re=str_replace(".","/",$_POST["$colchamps"]);
                                        $recup_champs1 = str_replace("-","/",$re);
                                         $recup_champs = $recup_champs."','".$recup_champs1;
                                       }
                                       elseif ( $a==7){
                                        $recup_champs = $recup_champs."','".($_POST["$colchamps"]);
                                       }
                                       elseif($a==4) {
                                          $stock = getcwd();
                                          $dir=$stock."/allfichiers/";
                                          move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
                                          $recup_champs = $recup_champs."','".($_FILES["$colchamps"]['name']);

                                       }
                                       else {
                                          $recup_champs = $recup_champs.",".addslashes($_POST["$colchamps"]);

                                       }
                              }
                             }

  			}

            $recup_champs="".$recup_champs."";

            $j=0;
            for ($i=0; $i<strlen($all_champs); $i++) {
                 $tab1=explode(",",$all_champs);
                 if(isset($tab1[$i])){
                     $j++;
                  }
            }
           // echo  "j : ".$j;
            $tab2=explode(",",$recup_champs);
            $where="";
            $chp="";
            for ($d=0; $d<$j - 1; $d++) {
               $where=$where." ".$tab1[$d]." like '%".$tab2[$d]."%' AND ";
            }
           // echo $d." :d<br>";
            if(isset($tab1[$d])){
            $where=$where." ".$tab1[$d]." like '%".$tab2[$d];
            if($sal=="")
            $req_sel="select * from $table where ". $where."%'";
            else
            $req_sel="select * from $table where ". $where."%' group by $sal";
          //  echo "<br>$req_sel";
           	$_SESSION["req"]=$req_sel;

  			return $req_sel;
           }



   }

  }
 function affiche_rslt($req,$nb,$d){
  $i=0;
  //echo "<br> tb :".$req;
     $exe=mysql_query($req) or die(mysql_error());
 	  echo'<table BGCOLORe="yellow" width=700  border="0" cellpadding="0" cellspacing="0">';
 	  while($row=mysql_fetch_array($exe)){
 	  	  if($i==0)
 	  		echo"<tr>";
                $i++;
 	  			echo"<td width=240 bgcolore=red height='150'> ";
               echo'
               <table border="0" cellpadding="0" cellspacing="0" width="240">
  <tr>
   <td><table align="left" border="0" cellpadding="0" cellspacing="0" width="240">
	  <tr>
	   <td  width="250" height="30" border="0" id="n00000001_r1_c1" VALIGN="top" bgcolor="#7174FD" />
	   <b> '.$row[2].' '.$row[1].'</b>
	   </td>
	   <td width="70" height="29" border="0" id="n00000001_r1_c3" alt="LOGO" /> </td>
	  </tr>
	</table></td>
  </tr>
  <tr>
   <td><table align="left" border="0" cellpadding="0" cellspacing="0" width="240">
	  <tr>
	   <td width="10" height="101" border="0" id="n00000001_r2_c1" bgcolorE="white"  />
	   <img src="images/puce.gif"  alt="" border="0">
	   </td>
	   <td><table align="left" border="0" cellpadding="0" cellspacing="0" width="230">
		  <tr>
		   <td  width="240" height="77" border="0" id="n00000001_r2_c2" alt="" />';
		   
		   echo'
		   Promo : '.$row[10].' <br>
		   Ufr : '.$row[8].' <br>
		   Section : '.$row[9].' <br>
		   Pays Residence : '.$row[11].' <br>
		   Specialite : '.$row[12].' <br>
		   ';
		   //annuaire membre
		   if($d==1)
		   {
		      echo'
		   Telephone : '.$row[4].' <br>
		 Adresse  : '.$row[3].' <br>
		   Email : '.$row[5].' <br>';
		   }
		     echo'</td>
		  </tr>
		  </table></td>
	  </tr>
	</table></td>
  </tr>
</table>
               ';

 	  		//	echo"$i - $row[2] <br> $row[3] $row[4]</td>";

 	  		if($i==$nb){
 	  			$i=0;
 	  			echo"</tr>";
 	  		}

 	  }
 	  if($i!=$nb)
 	   echo"</tr>";

 }

 
?>