<?php  /* session_start();
 if(isset($_SESSION['req']))
 include"dao/connection.php";*/
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


	                         //ajouter par Wa_Darou
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
	           			echo'<input class="'.$class.'" type=text name="'.$row->name.'" value="'.str_replace("_"," ",@$_GET["idact"]).'" size="'.$length.'" />
	           			  <br>'.$exple.'</td></tr>';

                    /*
	                     echo "<tr><td> ".str_replace("_"," ",$name).'</td><td>
	                     <select class=mylistkc  id="'.str_replace("_"," ",$name).'" type="text" name="'.$row->name.'" size="1" langE="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" />

	                     <option value=></option>
	                     ';
	                        while($ro=mysql_fetch_row($eex)){
	                            echo"<option value='".$ro[0]."' >".$ro[1]."</option>";
	                          }

	                     echo'
	                     </select>
	                     </td></tr>'; */

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
    <table><tr><td><input type=image src="images/brech.gif" class=kc1 name="sub"></td><td align=right width="400"> Recherche Avancée<imge src="images/rech_avan.gif"  border="0"></td></tr></table>
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
 function affiche_rslt($req,$nb){
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
	   <b>'.$row[1].'</b>
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
		   <td  width="240" height="77" border="0" id="n00000001_r2_c2" alt="" />Secteur : '.$row[2].' <br>
		   '.$row[3].' <br>
		   Tel : '.$row[6].' <br>
		   Email : '.$row[8].'
		   </td>
		  </tr>
		  <tr>
		   <td width="240" height="24" border="0" id="n00000001_r3_c2" alt="" /> Géolocalisation Site Web Autres</td>
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

 function publicite($table,$animated,$width,$height){

 $req="select * from $table ";
 $reqexe=mysql_query($req);
		echo"<div id='".$animated."' style='padding-top:5px;padding-left: 5px;'>";
		$p=1;
while ($row=mysql_fetch_array($reqexe)) {
$p++;
	//$tab.="<td background='images/bgpubbas.jpg' width=257 height=255 stype='background-repeat:no-repeat' >
	$tablo = pathinfo($row[2]) ;
	$extension = $tablo['extension'] ;
	 echo"<liv>";
    if ($extension=="swf") {
      echo'
       <div id="bandehaut'.$table.$p.'">
     <img src="animations/logo1.jpg" alt="" title=""/>

    </div>
     <script type="text/javascript" src="flash.js"></script>
     <div id="Sen2i">
     </div>
   <script type="text/javascript">
// <![CDATA[
var fo = new FlashObject("allfichiers/'.$row[2].'", "Sen2i", '.$width.', '.$height.', "0", "transparent");
fo.write("bandehaut'.$table.$p.'");
// ]]>
</script>';
    }
    else {
       echo "<a href='".$row[1]."' ><img src='allfichiers/".$row[2]."' alt='Article 1' title=".$row[3]." width=".$width." height=".$height." style='border: none; text-decoration: none'/></a>
<br/>";
    }
    echo"</liv>";
}

	echo"</div>	";

}
function actudefil($table,$animated,$width,$height){

 $req="select * from $table ";
 $reqexe=mysql_query($req);
		echo"<div id='".$animated."' style='padding-top:px;padding-left: px;'>";
		$p=1;
while ($row=mysql_fetch_array($reqexe)) {
$p++;
	//$tab.="<td background='images/bgpubbas.jpg' width=257 height=255 stype='background-repeat:no-repeat' >
	//$tablo = $row[2] ;
	//$extension = $tablo['extension'] ;
	$ls="<a href='actualites.php?idact='><b>".$row[1]."</b><small>".$row[2]."</small></a>";
      echo'

       '.$ls;


}

	echo"</div>	";

}
function afficheactiv($table,$nbl){
//echo  $table;
	$exes=mysql_query("select * from $table") or die(mysql_error());
	while ($rows=mysql_fetch_array($exes)) {
		echo"<a href=index.php?idact=".str_replace(" ","_",$rows[0])."  class='kc2'>".$rows[$nbl].'</a><br>';

 }
}

 function affiche_actu($table,$width,$idtitre,$idimg,$idcontenu,$long,$date,$id){
     if(@($_GET[$id])==""){
	$compt=0;
	}
	else{
	$compt=$_GET[$id] ;
	}
	/*if($compt==0){
	 $sql= $req." order by $champord DESC limit $compt,".($long);
	 }
	else{
	 $sql=$req." order by $champord DESC limit ".($long+$long*($compt-1)).",".($long);
	 }*/
     if (@$_GET["id_actu"]!="") {
       $query=mysql_query("select * from $table where id ='".$_GET["id_actu"]."'");
        echo"<table WIDTH=700 border=0 cellpadding=0 cellspacing=0><TR><TD>";
		while($resultat=mysql_fetch_array($query))
		{

		echo"<table  border=0 cellpadding=0 cellspacing=0>
	 	<b>".strtoupper($resultat[$idtitre])."</b>
	 	<tr>
	 	<td valign=top>";


	 	if($resultat[$idimg]<>'')
	 		echo"<img src='allfichiers/".$resultat[$idimg]."' width=220 hEight=160 alt= border=0>";
	 	else
            echo"";

	 	echo"</td><td  valign=top>
					".$resultat[$idcontenu]."";

	    echo("
					 <div align=right class=pt> Date Pub :$resultat[$date]</div>
	     		<img src='images/sep.jpg' width=686 height=1 border=0>
		</td></tr></table  border=0 cellpadding=0 cellspacing=0>
		");
		 /*	echo"<tr><td>";
		 	if($resultat[$idming]<>'')
		 		echo"<img src='allfichiers/".$resultat[$]."' width=100 hright=100 alt= border=0>";
		 	else
	            echo"";

		 	echo"</td><td>

						 <div align='' class='titr'> $resultat[$t]</div>
						<div align=justify class=pt>".$resultat[$c]."</div>";

		    echo("
						 <div align=right class=pt> Date Pub : $resultat[7]</div><br>
			</td></tr>"); */
		}
	    echo"</td><td background='images/bgmenu1.jpg' width='12px'> &nbsp;</td></tr></table>";
       $query1=mysql_query("select * from $table where id !='".$_GET["id_actu"]."'");
     }
     else{
     	$query1=mysql_query("select * from $table ORDER by $date DESC limit ".($long+$long*($compt-1)).",".($long));
     }
     $nbenr=mysql_num_rows(mysql_query("select * from $table"));
     //echo
     $nbpage=$nbenr/$long;
     echo"<table WIDTH=700 border=0 cellpadding=0 cellspacing=0><TR><TD>";
	while($resultat=mysql_fetch_array($query1))
	{

	 	echo"<table  border=0 cellpadding=0 cellspacing=0>
	 	<b>".strtoupper($resultat[$idtitre])."</b>
	 	<tr>
	 	<td valign=top>";


	 	if($resultat[$idimg]<>'')
	 		echo"<img src='allfichiers/".$resultat[$idimg]."' width=220 hEight=160 alt= border=0>";
	 	else
            echo"";

	 	echo"</td><td  valign=top>
					".substr($resultat[$idcontenu],0,$width)."...";
					 if(strlen($resultat[$idcontenu])>$width)
					 ECHO' &nbsp;&nbsp;&nbsp;<a href="actualites.php?id_actu='.$resultat[0].'" class=>Lire La Suite >></a>';

	    echo("
					 <div align=right class=pt> Date Pub :$resultat[$date]</div>
		</td></tr></table  border=0 cellpadding=0 cellspacing=0><br>
		<img src='images/sep.jpg' width=686 height=1 border=0>
		");
	}
	$query1=mysql_query("select * from even where id !='".@$_GET["id_actu"]."'");
    echo"</td> <td background='images/bgmenu1.jpg' width='12px'> &nbsp;</td></tr>
    </table>
    <table  border=0 cellpadding=0 cellspacing=0><tr><td background='images/bgmenu2.jpg' width='684px' height=19> &nbsp;</td>
    <td > <img src='images/bgmenu12.jpg' border=0></td></tr>
    </table> <div align=center>
    <table  border=0 cellpadding=0 cellspacing=0>
    <tr bgcolor=#8CBAFF><td>";
    $page="actualites.php?";
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
    echo"</td></tr>
    </table></div>";



}
  function affiche_contenu($table){

  	$exe_req_champs=mysql_query("select * from $table") or die(mysql_error());
  	$row=mysql_fetch_array($exe_req_champs);
  	echo $row[1];
  	}

//include"metier.php";
//recherche("dossier","Recherche Dossier","rech","");

/*        */
?>