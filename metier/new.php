<? 
 function affiche_actu($table,$width,$lang,$id){
 //$width= nombre de caractéres à afficher
    if ($lang=="fr") {
       $t=1;
       $c=2;
       $p=3;
	
       $pp="";
    }
    
     
			$query1=mysql_query("select * from $table ORDER by id DESC ");	
	 //}
     	
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

					 <div align='' class='titr'> $resultat[$t]</div>
					<div align=justify class=pt>".substr($resultat[$c],0,$width)."...";
					 if(strlen($resultat[2])>$width )
					 echo' &nbsp;&nbsp;&nbsp;<a href="actualites.php?id_actu='.$resultat[0].'" class=>Lire La Suite >></a></div>';
					
elseif($resultat[4]<>'')
					 echo'<div><a href="allfichiers/'.$resultat[4].'" target="_blank">'.'Pj>>'.' </a></div>';
					 
				
	    echo("
					 
		</td></tr>");
	}
	$query1=mysql_query("select * from $table where id !='".@$_GET["id_actu"]."'");
    echo"</table>";
  }
