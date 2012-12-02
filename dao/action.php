<?php
 // FONCTION POUR MODIFIER ET SUPPRIMER UN ENREGISTREMENT SUR UNE TABLE DONNEE
  function form_action($table,$titre,$kce){
  $req_champs="select * from ".$table;
//echo"<form name='frm' action='".$_SERVER['REQUEST_URI']."$kce id=0' onsubmit='return (conform(this));' enctype='multipart/form-data'  method='POST'>";
    echo'<div align="right">';
 	// echo $roi= searchspeed($table,1);
 	echo'</div>';
 /*	if(@$_POST["vsearchspeed"]<>""){
 	  $_POST["my_id"]= $roi;
 	} */
 	 echo '<fieldset><legend class="kc">'.$titre.'</legend>';
    $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
 	echo"<form name='frm' action='".$_SERVER['REQUEST_URI']."$kce id=0' onsubmit='return (conform(this));' enctype='multipart/form-data'  method='POST'>";
 	$all_values="";
  	$i=0;
  	$numpol="";
  	$mar="ssmk";
 	//echo'<fieldset><legend class=top>'.$titre.'</legend>';

 	//ECHO@$_POST["nsearchspeed"]." - ".@$_POST["vsearchspeed"];
 	echo'<table border=0 cellpadding=0 cellspacing=1><tr><td  valign="top"><table border=0 cellpadding=0 cellspacing=2> ';
 	  $i=0;
  	    if(!isset($_POST["my_id"]) AND @$_POST["nsearchspeed"]=="" AND @$_POST["vsearchspeed"]==""){
	      while($row = mysql_fetch_field($exe_req_champs)){
            $i++;
	      	$result = mysql_query("SELECT $row->name FROM $table");
	       	$length = mysql_field_len($result, 0);
	       	$len=strlen($row->name);
	       	$en=$row->name;
	        $a=$en{$len-1};
	        $type="";
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
					$mar="m";
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
					if($table=="entreprise"){						$len=strlen($name);
				       	$en=$name;
				        $a=$en{$len-1};
				        $type="";
			           // $name=substr($row->name,0,$len);
			           $row->name=$name;
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
								$mar="m";
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
			                }					}
			    }
			    elseif($a==9) 	{
					$type="radio";
					$name=substr($row->name,0,$len-1);
                }

	            if($row->type=='string'){
	                if ($type=="numeric") {
           			  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td><input class='kc1' type=text name='".$row->name."' size='".$length."'
           			  lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: nombre;erreur:Date non conforme'/></td></tr>";
                      echo"<script type=text/javascript>//new SUC( document.frm.".$row->name.");//</script>";
	                }
	                elseif($type=="date") {
	                 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" /></td></tr>';
	                }
	                elseif($type=="mail") {
	                 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" /></td></tr>';
	                 $date_ref=$row->name;
	                }
	                elseif($type=="obligatoire") {
                	  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td>  <input class='kc1' id='".str_replace("_"," ",$name)."' type=text name=".$row->name." size='".$length."'  lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champ Obligatoire' /></td></tr>";
                    }
	                elseif($type=="file"){
					 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td>  <input class=kc1  id='".str_replace("_"," ",$name)."' type=file name='".$row->name."' size='".$length."' /></td></tr>";
                    }
	                elseif($type=="select"){
                     if(!isset($_SESSION["zone"])){
                      echo "<tr BGCOLOR=white><td> ".str_replace("_"," ",$name).'</td><td>
                       <select class=mylistkc type="text" name="'.$row->name.'" size="1" lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" /><option></option>';
                      echo'</select></td></tr>';
                     }
	                }
	                elseif ($type=="mask"){
                      echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" size="5" readonly /></td></tr>';
                    }
	                elseif($type=="password"){
                       echo "<tr><td align=> ".str_replace("_"," ",$name)."</td><td>";
                       echo"<INPUT TYPE='password' name='".$row->name."' VALUE=''></td></tr>";
	                }
	                elseif($type=="radio"){
                     $tabsel=$name."9";
                     $req_sel="select * from $tabsel" ;
                     $eex=mysql_query($req_sel) or die(mysql_error());
                        while($ro=mysql_fetch_row($eex)){
                       	  echo "<tr><td align=> ".$ro[1]."</td><td>";
                          echo"<INPUT TYPE='radio' name='".$row->name."' VALUE='".$ro[0]."'></td></tr>";
                        }
	                }
	                 else{
	              	  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" /></td></tr>';
	                 }
                }
	            elseif($row->type=='blob'){
	              if($type=="obligatoire"){
		            echo "<tr BGCOLOR=white><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  id='".str_replace("_"," ",$name)."' lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;'  class=kc1 cols='100' rows='10'></textarea></td></tr>";
		          }
		          else{
		            echo"<tr BGCOLOR=white><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  class=kc1 cols='70' rows='3'></textarea></td></tr>";             }
	            }
       			elseif($row->type=='date'){
	             echo "<tr><td>".str_replace("_"," ",$name).' </td><td> ';
	                   	 echo ' <input type="text" id="'.str_replace("_"," ",$name).'" name="'.$row->name.'"  onclick="ds_sh(this);" class="kc1"  onclick="ds_sh(this);" value=""  onclick="ds_sh(this);" onfocus=view_microcal(true,"'.$row->name.'","microcal",-1,0); onblur=view_microcal(false,"'.$row->name.'","microcal",-1,0); onkeyup=this.style.color=testTypeDate(this.value)?"black":"red" size="15"
		                lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" />
				        </td></tr> ';
	           }
       			if ($i==0) {
                   $all_values = $row->name;
                }
	            else {
	               $all_values = $all_values.",".$row->name;
	            }
	            $i++;
	        }
	    }
	    else{
          while($row = mysql_fetch_field($exe_req_champs)){
            $i++;
	      	$result = mysql_query("SELECT $row->name FROM $table");
	       	$length = mysql_field_len($result, 0);
	       	$len=strlen($row->name);
	       	$en=$row->name;
            $a=$en{$len-1};
	        $type="";
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
			  //if($table=="entreprise"){
						$len=strlen($row->name);
				       	$en=$row->name;
				        $a=$en{$len-1};
				    //   echo"<br> ddd :".
					   $b=$en{$len-2};
				        $type="";
			           // $name=substr($row->name,0,$len);
			          // $row->name=$row->name;
				          if(is_numeric($b)) {
				            if($b==1) {
				                $type="obligatoire";
				                $name=substr($row->name,0,$len-2);
				       		}
				       		elseif($b==2) 	{
				         		$type="date";
								$name=substr($row->name,0,$len-2);
			                }
			                elseif($b==3) 	{
			   				    $type="numeric";
								$name=substr($row->name,0,$len-2);
			                }
			                elseif($b==4) 	{
								$type="file";
								$name=substr($row->name,0,$len-2);
								$mar="m";
			                }
			                elseif($b==5) 	{
			    				$type="select";
								$name=substr($row->name,0,$len-2);
			                }
			                elseif($b==6) 	{
								$type="mail";
								$name=substr($row->name,0,$len-2);
			                }
			                elseif($b==7) 	{
			   				    $type="password";
								$name=substr($row->name,0,$len-2);
			                }

			              }


				//	}

             }
	         elseif($a==9) 	{
			  $type="radio";
			  $name=substr($row->name,0,$len-1);
			 }
	         if($row->type=='int'){
              $kc=  $row->name;
             }
	             if(@$_POST["nsearchspeed"]!="" AND @$_POST["vsearchspeed"]!=""){
	             	//echo "<br>".
	             	$reqt="select $row->name from $table where ".@$_POST["nsearchspeed"]." ='". @$_POST["vsearchspeed"]."'";
	             }
	             else{
             	    //echo "<br>".
             	   $reqt="select $row->name from $table where $kc = '".$_POST["my_id"]."'";
	             }

             $exet=mysql_query($reqt) or die(mysql_error());
             $rww=mysql_fetch_array($exet);
          	 $donnee=$rww["".$row->name.""];
              if($row->type=='string'){
              	if ($type=="numeric") {
             		echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>  <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" value="'.$donnee.'"
             		lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: nombre;erreur:Date non conforme"/></td></tr>';
                    echo"<script type=text/javascript>//new SUC( document.frm.".$row->name.");//</script>";
                }
	            elseif($type=="date") {
                  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> ';
                  echo ' <input class="kc1" type="text" id="'.$row->name.'" name="'.$row->name.'"  value="'.$donnee.'" onfocus=view_microcal(true,"'.$row->name.'","microcal",-1,0); onblur=view_microcal(false,"'.$row->name.'","microcal",-1,0); onkeyup=this.style.color=testTypeDate(this.value)?"black":"red" size="15"
	                  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" />
					   <div id="microcal" name="microcal" style="visibility:hidden;position:absolute;border:1px gray dashed;background:#ffffff; margin-left: 30px;"  >
					   </div></td></tr> ';
                }
                elseif($type=="obligatoire") {
               	 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td>  <input class='kc1' id='".str_replace("_"," ",$name)."' type=text name=".$row->name." size='".$length."' value='".$donnee."' lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champ Obligatoire' /></td></tr>";
                }
                elseif($type=="mail") {
                 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> ';
                 echo ' <input class="kc1" type="text" id="'.$row->name.'" name="'.$row->name.'"  value="'.$donnee.'"
	                  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: mail;erreur:MAIL non conforme" />
					   </td></tr> ';
	               $date_ref=$row->name;
                }
                elseif($type=="file"){
  				  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'<input name="'.$row->name.'sss" type="hidden" value="'.$donnee.'"></td><td>  <input class=kc1 type="file" name="'.$row->name.'" size="'.$length.'" value="'.$donnee.'" />';
  					$mar=$donnee;
       				  if($donnee<>'')
	              		echo'<br><a href="../allfichiers/'.$donnee.'" target="_blank">Visualiser la PJ</a>';
	              		echo'</td></tr>';
	            }
	            elseif ($type=="mask"){
                  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" value="'.$donnee.'" size="5" readonly /></td></tr>';
                }
	            elseif($type=="select"){
	              if(!isset($_SESSION["zone"])){
	                $tabsel=$name."5";
	                $req_sel="select * from $tabsel ";
                    $eex=mysql_query($req_sel) or die(mysql_error());
                    $champs = mysql_fetch_field($eex);
                    $req_sel1="select * from $tabsel where $champs->name ='".$donnee."'" ;
                    $eex1=mysql_query($req_sel1) or die(mysql_error());
                    $rew=mysql_fetch_row($eex1);
                    echo "<tr BGCOLOR=white><td valign='top' bgcolore='red'> ".str_replace("_"," ",$name).'</td><td> ';
                    echo'<select class=mylistkc type="text" name="'.$row->name.'" size="1"  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" />';
				      if (mysql_num_fields($eex1)==1) {
                        echo'<option value="'.$rew[0].'">'.$rew[0].'</option>';
                          while($ro=mysql_fetch_row($eex)){
	                      	if($rew[0]<>$ro[0]){
	                           echo"<option value='".$ro[0]."' >".$ro[0]."</option>";
	                        }
	                      }
	   		          }
					  else {
                        echo'<option value="'.$rew[0].'">'.$rew[1].'</option>';
                       while($ro=mysql_fetch_row($eex)){
                      	if($rew[0]<>$ro[0]){
                           echo"<option value='".$ro[0]."' >".$ro[1]."</option>";
                        }
                       }
		              }

                    echo'</td></tr>';
                  }
	              else{
	              	echo'<input type="hidden" name="'.$row->name.'" value='.$_SESSION["zone"].' />';
	              }
	            }
	            elseif($type=="password"){
	             echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="password" name="'.$row->name.'" size="'.$length.'"  value="'.$donnee.'" /></td></tr>';
	            }
	            elseif($type=="radio"){
	             $tabsel=$name."9";
	             $req_sel="select * from $tabsel ";
                 $eex=mysql_query($req_sel) or die(mysql_error());
                 $champs = mysql_fetch_field($eex);
                 $req_sel1="select * from $tabsel where $champs->name ='".$donnee."'" ;
                 $eex1=mysql_query($req_sel1) or die(mysql_error());
                 $rew=mysql_fetch_row($eex1);
                  if(mysql_num_rows($eex1)<>0){
                    echo "<tr><td align=> ".$rew[1]."</td><td>";
                    echo"<INPUT TYPE='radio' name='".$tabsel."' VALUE='".$rew[0]."' CHECKED></td></tr>";
                  }
                  while($ro=mysql_fetch_row($eex)){
                    if($rew[0]<>$ro[0]){
                      echo "<tr><td align=> ".$ro[1]."</td><td>";
                      echo"<INPUT TYPE='radio' name='".$row->name."' VALUE='".$ro[0]."'></td></tr>";
                    }
                  }
                  echo'</td></tr>';
	            }
	            else{
	              echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'"  value="'.$donnee.'" /></td></tr>';
	            }
             }
               elseif($row->type=='blob'){
	           if($type=="obligatoire"){
	            echo "<tr BGCOLOR=white><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."' lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:".str_replace("_"," ",$name)." Obligatoire'  class=kc1 cols='100' rows='10'>".$donnee."</textarea></td></tr>";
	           }
	           else{
	             echo"<tr BGCOLOR=white><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  class=kc1 cols='50' rows='3'>".$donnee."</textarea></td></tr>";             }
               }
               elseif($row->type=='int'){
                 echo'<input class=kc1 type="hidden" name="my_id"  value="'.$donnee.'"/>';
               // echo"sla". $_POST["my_id"]=$donnee;
               }
    		   elseif($row->type=='date'){
               echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> ';
                  echo ' <input class="kc1" type="text" id="'.$row->name.'" name="'.$row->name.'"  value="'.date_en_fr($donnee).'" onfocus=view_microcal(true,"'.$row->name.'","microcal",-1,0); onblur=view_microcal(false,"'.$row->name.'","microcal",-1,0); onkeyup=this.style.color=testTypeDate(this.value)?"black":"red" size="15"
	                  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" />
					   <div id="microcal" name="microcal" style="visibility:hidden;position:absolute;border:1px gray dashed;background:#ffffff; margin-left: 30px;"  >
					   </div></td></tr> ';
             }
    		 if ($i==0) {
	            $all_values = $row->name;
			 }
			 else {
	           $all_values = $all_values.",".$row->name;
			 }
			 $i++;
	     }
   	     echo'<tr><td>&nbsp;<input class=kc1 name="id_action" type="hidden" value='.@$_POST["my_id"].'></td><td>';
	      if(@$_GET["mod"]<>"")
	        echo'<input class=kc1 type="submit" name="modif" value="Modifier">';
             if(@$_GET["sup"]<>"")
	          echo'<input class=kc1 type="submit" name="supprim" value="Supprimer">';
 	          echo'</td></tr>';
	    }

 		echo"</table></td> ";
    	   $dd= date("m");
  	       $an=date("Y");
  	       $jj=date("d");
  	       $dp= $dd - 1;
  	       $anp=$an;
  	       $contp= $dp."/".$anp;
  	       $cont=$dd."/".$an;
  	         if ($dd==1) {
  	      	   $dp=12;
  	      	   $anp=$an - 1;
               $contp= $dp."/".$anp;
	         }
 	   /* if(isset($date_ref)){
   	     $d=retourne_mois($dd);
  	     $dpp=retourne_mois($dp);
  	     $req_selectA="select * from $table where $date_ref like  '%".$cont."%'";
         $exec=mysql_query($req_selectA) or die(mysql_error());
          echo'<td valign="top" bgcolor="#BAE3BA"><table border=0 cellpadding=0 cellspacing=0  width=250><tr><td align=center>Listes des Enregistrement du mois en Cours :'.$d." ".$an.'<br>
             <select class="kc1" size="9" name="my_id" onchange="submit();">';
            while($lig=mysql_fetch_row($exec)){
              echo"<option value='".$lig[0]."'><div align=center>".$lig[1]."</div></option>";
            }
             echo'</select><br>';
               if($jj<=5 && $dd==date("m")){
                 $req_selectB="select * from $table where $date_ref like  '%".$contp."%'";
                 $execB=mysql_query($req_selectB) or die(mysql_error());
                 echo'Listes des Enregistrement du mois précedent:'.$dpp." ".$anp.'<br><select class="kc1" size="9" name="my_id" onchange="frm.submit();">';
                   while($lige=mysql_fetch_row($execB)){
                     echo"<option value='".$lige[0]."'><div align=center>".$lige[1]."</div></option>";
                   }
                 echo'</select><br>';
                }
              echo' </td></tr></table>';
       	      echo'</TD></TR></table> ';

        }
        else{}*/
            $req_selectA="select * from $table";
            $exec=mysql_query($req_selectA) or die(mysql_error());
           echo'<td valign="top" bgcolor="#BAE3BA"><table border=0 cellpadding=0 cellspacing=0  width=250><tr><td align=center>
           Listes des Enregistrements<br>
             <select class="mylistkc" size="9" name="my_id" onchange="frm.submit();">';
              while($lig=mysql_fetch_row($exec)){
                 $k=1;
	              if($table=="litcarre"){
                 $k=2;
	              }
                echo"<option value='".$lig[0]."'>".$lig[$k]."</option>";
              }
                echo'</select>';
                echo' </td></tr></table>';
         		echo'</TD></TR></table> ';


    		echo' </form>';
   	    if (isset($_POST["supprim"]) and isset($_POST["id_action"]) ) {
	        $req_champs="select * from ".$table;
	        $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
	    	$row = mysql_fetch_field($exe_req_champs);
	    	  if($row->type =="int"){
	    	//    audit_modifier_after($table,$row->name,@$_POST["id_action"],"sss",$_SESSION["cheminfich"],"Suppression");
	    	     $req="delete from $table where ".$row->name. " = ".$_POST["id_action"]." ";
	    	     $exer=mysql_query($req) or die(mysql_error());
	    	       if($exer){
	    	    	echo"<table><tr><td bgcolor='red'>Suppression Réussie</td></tr></table>";
	    	       }
	    	  }
	    }
	    elseif(isset($_POST["modif"]) and isset($_POST["id_action"])) {
         if(isset($_GET["id"])){
            $req_champs="select * from ".$table;
	        $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
	    	$row = mysql_fetch_field($exe_req_champs);
			  if($row->type =="int"){
			      //audit_modifier_after($table,$row->name,@$_POST["id_action"],"sss",$_SESSION["cheminfich"],"Avant Modification");
			    	   $req_champs="select * from $table where ".$row->name. " = '".$_POST["id_action"]."' ";
			    	    $basreq="where ".$row->name. " = ".$_POST["id_action"]." ";
   	                    $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
		                $ligchamps=mysql_fetch_row($exe_req_champs);
			            $recup_champs="";
			  		    $i=0;
			  	          $all_champs="";
			  	          $modtab=" set";
			             	for($i=0;$i<mysql_num_fields($exe_req_champs);$i++)  {
			          	      //echo "saliou ".
			          	      $kc=$i;
			          	      $colchamps  = mysql_field_name($exe_req_champs, $i);
                              $len=strlen($colchamps);
						      $en=$colchamps;
					          $a=$en{$len-1};

					          $b=$en{$len-2};
			                    if ($all_champs=="" AND ($kc+1)!=mysql_num_fields($exe_req_champs)) {
					             if (isset($_POST["".$colchamps.""])) {
					               $all_champs = $colchamps;
					                if ($a==2 || $a==6) {
				       	                $re=str_replace(".","/",$_POST["$colchamps"]);
				                        $recup_champs =str_replace("-","/",$re);
				                        $modtab="SET $colchamps = '".$recup_champs."',";
				                    }
				                    else {
				                      $modtab="SET $colchamps = '" .addslashes($_POST["".$colchamps.""])."',";
				                    }
                                  }
                                }
	                            else {
                                  if (($kc+1)==mysql_num_fields($exe_req_champs)) {
			                        if ($a==2 || $a==6) {
			                           //$re=str_replace(".","/",$_POST["$colchamps"]);
			                           //$recup_champs =str_replace("-","/",$re);
			                           $modtab=$modtab." $colchamps = '" .date_fr_en($_POST["$colchamps"])."'";
			                        }
			                        elseif($a==4){
			                           $mar=$_FILES["$colchamps"]['name'].' / '.@$_POST["sss"];
			                              if($_FILES["$colchamps"]['name']<>''){
	                                   	    $stock = getcwd();
	                      					$dir="../allfichiers/";
	                       					move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
	                           				$modtab=$modtab." $colchamps = '" .addslashes($_FILES["$colchamps"]['name'])."'";
	                           				//echo"<br>saliou";
                           				  }
                                          else{
                           				    $modtab=$modtab." $colchamps = '".$_POST["$colchamps".'sss']."'";
                                          }
		                            }
				                    else {
				                    	if ($b==4) {
                                            "$colchamps".$mar=$_FILES["$colchamps"]['name'].' / '.$_POST[$colchamps."sss"];
			                              if($_FILES["$colchamps"]['name']<>''){
	                                   	    $stock = getcwd();
	                      					$dir="../allfichiers/";
	                       					move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
	                           				$modtab=$modtab." $colchamps = '" .addslashes($_FILES["$colchamps"]['name'])."'";
	                           				//echo"<br>saliou";
                           				  }
                                          else{
                           				    $modtab=$modtab." $colchamps = '".$_POST["$colchamps".'sss']."'";
                                          }
				                        }
				                        else {
                                            $modtab=$modtab." $colchamps = '" .addslashes($_POST["$colchamps"])."'";
				                        }

				                    }
		                          }
				                  else {
				                   if (($a==2) || ($a==6)) {
				       	              // $re=str_replace(".","/",$_POST["$colchamps"]);
				                       //$recup_champs =str_replace("-","/",$re);
				                       $modtab=$modtab." $colchamps = '".date_fr_en($_POST["$colchamps"])."',";
				                   }
				                   elseif($a==4){
				                  //  $mar=$_FILES["$colchamps"]['name'].' / '.$_POST["sss"];
				                      if($_FILES["$colchamps"]['name']<>''){
	                              	    $stock = getcwd();
	                                	$dir="../allfichiers/";
	                                	move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
	                                   //echo
	                                   $modtab=$modtab." $colchamps = '" .addslashes($_FILES["$colchamps"]['name'])."',";
                        			  }
                                      else{
                                      //echo"saliou";
                        			 // echo
                        			  $modtab=$modtab." $colchamps = '".$_POST["$colchamps".'sss']."',";
                                      }
		                           }
				                   else {
				                    $modtab=$modtab." $colchamps = '".addslashes($_POST["".$colchamps.""])."',";
				                   }
	                             }
                                }
   			  			    }

			           $req_mod=" update $table ".$modtab." ".$basreq."";
   		               $exe_req_mod=mysql_query($req_mod) or die(mysql_error());
			             if($exe_req_mod){
			          	 //audit_modifier_after($table,$row->name,@$_POST["id_action"],"sss",$_SESSION["cheminfich"],"Apres Modification");
			             }
			             echo"<table><tr><td bgcolor='red'> Modification réussie</td></tr></table>"; /**/
                    }
	        }
        }
    echo"</fieldset>";
    }
  function form_action_saut($table,$titre,$kce){
    $req_champs="select * from ".$table;
//echo"<form name='frm' action='".$_SERVER['REQUEST_URI']."$kce id=0' onsubmit='return (conform(this));' enctype='multipart/form-data'  method='POST'>";
    echo'<div align="right">';
 	 echo $roi= searchspeed($table,1);
 	echo'</div>';
 /*	if(@$_POST["vsearchspeed"]<>""){
 	  $_POST["my_id"]= $roi;
 	} */
    $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
 	echo"<form name='frm' action='".$_SERVER['REQUEST_URI']."$kce id=0' onsubmit='return (conform(this));' enctype='multipart/form-data'  method='POST'>";
 	$all_values="";
  	$i=0;
  	$numpol="";
  	$mar="ssmk";
 	//echo'<fieldset><legend class=top>'.$titre.'</legend>';

 	//ECHO@$_POST["nsearchspeed"]." - ".@$_POST["vsearchspeed"];
 	echo'<table border=0 cellpadding=0 cellspacing=1><tr><td  valign="top"><table border=0 cellpadding=0 cellspacing=5> ';
 	  $i=0;
  	    if(!isset($_POST["my_id"]) AND @$_POST["nsearchspeed"]=="" AND @$_POST["vsearchspeed"]==""){
	      while($row = mysql_fetch_field($exe_req_champs)){
            $i++;
	      	$result = mysql_query("SELECT $row->name FROM $table");
	       	$length = mysql_field_len($result, 0);
	       	$len=strlen($row->name);
	       	$en=$row->name;
	        $a=$en{$len-1};
	        $type="";
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
					$mar="m";
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
			    elseif($a==9) 	{
					$type="radio";
					$name=substr($row->name,0,$len-1);
                }
                 if($i<=6){
	            if($row->type=='string'){
	                if ($type=="numeric") {
           			  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td><input class='kc1' type=text name='".$row->name."' size='".$length."'
           			  lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: nombre;erreur:Date non conforme'/></td></tr>";
                      echo"<script type=text/javascript>//new SUC( document.frm.".$row->name.");//</script>";
	                }
	                elseif($type=="date") {
	                 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" /></td></tr>';
	                }
	                elseif($type=="mail") {
	                 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" /></td></tr>';
	                 $date_ref=$row->name;
	                }
	                elseif($type=="obligatoire") {
                	  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td>  <input class='kc1' id='".str_replace("_"," ",$name)."' type=text name=".$row->name." size='".$length."'  lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champ Obligatoire' /></td></tr>";
                    }
	                elseif($type=="file"){
					 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td>  <input class=kc1  id='".str_replace("_"," ",$name)."' type=file name='".$row->name."' size='".$length."' /></td></tr>";
                    }
	                elseif($type=="select"){
                     if(!isset($_SESSION["zone"])){
                      echo "<tr BGCOLOR=white><td> ".str_replace("_"," ",$name).'</td><td>
                       <select class=mylistkc type="text" name="'.$row->name.'" size="1" lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" /><option></option>';
                      echo'</select></td></tr>';
                     }
	                }
	                elseif ($type=="mask"){
                      echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" size="5" readonly /></td></tr>';
                    }
	                elseif($type=="password"){
                       echo "<tr><td align=> ".str_replace("_"," ",$name)."</td><td>";
                       echo"<INPUT TYPE='password' name='".$row->name."' VALUE=''></td></tr>";
	                }
	                elseif($type=="radio"){
                     $tabsel=$name."9";
                     $req_sel="select * from $tabsel" ;
                     $eex=mysql_query($req_sel) or die(mysql_error());
                        while($ro=mysql_fetch_row($eex)){
                       	  echo "<tr><td align=> ".$ro[1]."</td><td>";
                          echo"<INPUT TYPE='radio' name='".$row->name."' VALUE='".$ro[0]."'></td></tr>";
                        }
	                }
	                 else{
	              	  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" /></td></tr>';
	                 }
                }
	            elseif($row->type=='blob'){
	              if($type=="obligatoire"){
		            echo "<tr><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  id='".str_replace("_"," ",$name)."' lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;'  class=kc1 cols='100' rows='10'></textarea></td></tr>";
		          }
		          else{
		            echo"<tr><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  class=kc1 cols='70' rows='3'></textarea></td></tr>";             }
	            }
       			if ($i==0) {
                   $all_values = $row->name;
                }
	            else {
	               $all_values = $all_values.",".$row->name;
	            }
	            }

	        }
	    }
	    else{
          while($row = mysql_fetch_field($exe_req_champs)){
            $i++;
	      	$result = mysql_query("SELECT $row->name FROM $table");
	       	$length = mysql_field_len($result, 0);
	       	$len=strlen($row->name);
	       	$en=$row->name;
            $a=$en{$len-1};
	        $type="";
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
	         elseif($a==9) 	{
			  $type="radio";
			  $name=substr($row->name,0,$len-1);
			 }
	         if($row->type=='int'){
              $kc=  $row->name;
             }
	             if(@$_POST["nsearchspeed"]!="" AND @$_POST["vsearchspeed"]!=""){
	             	//echo "<br>".
	             	$reqt="select $row->name from $table where ".@$_POST["nsearchspeed"]." ='". @$_POST["vsearchspeed"]."'";
	             }
	             else{
             	    //echo "<br>".
             	    $reqt="select $row->name from $table where $kc = '".$_POST["my_id"]."'";
	             }

             $exet=mysql_query($reqt) or die(mysql_error());
             $rww=mysql_fetch_array($exet);
          	 $donnee=$rww["".$row->name.""];
          	 if($i<=6){
              if($row->type=='string'){
              	if ($type=="numeric") {
             		echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>  <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'" value="'.$donnee.'"
             		lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: nombre;erreur:Date non conforme"/></td></tr>';
                    echo"<script type=text/javascript>//new SUC( document.frm.".$row->name.");//</script>";
                }
	            elseif($type=="date") {
                  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> ';
                  echo ' <input class="kc1" type="text" id="'.$row->name.'" name="'.$row->name.'"  value="'.$donnee.'" onfocus=view_microcal(true,"'.$row->name.'","microcal",-1,0); onblur=view_microcal(false,"'.$row->name.'","microcal",-1,0); onkeyup=this.style.color=testTypeDate(this.value)?"black":"red" size="15"
	                  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: date;erreur:Date non conforme" />
					   <div id="microcal" name="microcal" style="visibility:hidden;position:absolute;border:1px gray dashed;background:#ffffff; margin-left: 30px;"  >
					   </div></td></tr> ';
                }
                elseif($type=="obligatoire") {
               	 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name)."</td><td>  <input class='kc1' id='".str_replace("_"," ",$name)."' type=text name=".$row->name." size='".$length."' value='".$donnee."' lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champ Obligatoire' /></td></tr>";
                }
                elseif($type=="mail") {
                 echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).' </td><td> ';
                 echo ' <input class="kc1" type="text" id="'.$row->name.'" name="'.$row->name.'"  value="'.$donnee.'"
	                  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type: mail;erreur:Date non conforme" />
					   </td></tr> ';
	               $date_ref=$row->name;
                }
                elseif($type=="file"){
  				  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'<input name="sss" type="hidden" value="'.$donnee.'"></td><td>  <input class=kc1 type="file" name="'.$row->name.'" size="'.$length.'" value="'.$donnee.'" />';
  					$mar=$donnee;
       				  if($donnee<>'')
	              		echo'<br><a href="../allfichiers/'.$donnee.'" target="_blank">Visualiser la PJ</a>';
	              		echo'</td></tr>';
	            }
	            elseif ($type=="mask"){
                  echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" value="'.$donnee.'" size="5" readonly /></td></tr>';
                }
	            elseif($type=="select"){
	              if(!isset($_SESSION["zone"])){
	                $tabsel=$name."5";
	                $req_sel="select * from $tabsel ";
                    $eex=mysql_query($req_sel) or die(mysql_error());
                    $champs = mysql_fetch_field($eex);
                    $req_sel1="select * from $tabsel where $champs->name ='".$donnee."'" ;
                    $eex1=mysql_query($req_sel1) or die(mysql_error());
                    $rew=mysql_fetch_row($eex1);
                    echo "<tr BGCOLOR=white><td valign='top' bgcolore='red'> ".str_replace("_"," ",$name).'</td><td> ';
                    echo'<select class=mylistkc type="text" name="'.$row->name.'" size="1"  lang="bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:champs Obligatoire" />';
				      if (mysql_num_fields($eex1)==1) {
                        echo'<option value="'.$rew[0].'">'.$rew[0].'</option>';
                          while($ro=mysql_fetch_row($eex)){
	                      	if($rew[0]<>$ro[0]){
	                           echo"<option value='".$ro[0]."' >".$ro[0]."</option>";
	                        }
	                      }
	   		          }
					  else {
                        echo'<option value="'.$rew[0].'">'.$rew[1].'</option>';
                       while($ro=mysql_fetch_row($eex)){
                      	if($rew[0]<>$ro[0]){
                           echo"<option value='".$ro[0]."' >".$ro[1]."</option>";
                        }
                       }
		              }

                    echo'</td></tr>';
                  }
	              else{
	              	echo'<input type="hidden" name="'.$row->name.'" value='.$_SESSION["zone"].' />';
	              }
	            }
	            elseif($type=="password"){
	             echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="password" name="'.$row->name.'" size="'.$length.'"  value="'.$donnee.'" /></td></tr>';
	            }
	            elseif($type=="radio"){
	             $tabsel=$name."9";
	             $req_sel="select * from $tabsel ";
                 $eex=mysql_query($req_sel) or die(mysql_error());
                 $champs = mysql_fetch_field($eex);
                 $req_sel1="select * from $tabsel where $champs->name ='".$donnee."'" ;
                 $eex1=mysql_query($req_sel1) or die(mysql_error());
                 $rew=mysql_fetch_row($eex1);
                  if(mysql_num_rows($eex1)<>0){
                    echo "<tr><td align=> ".$rew[1]."</td><td>";
                    echo"<INPUT TYPE='radio' name='".$tabsel."' VALUE='".$rew[0]."' CHECKED></td></tr>";
                  }
                  while($ro=mysql_fetch_row($eex)){
                    if($rew[0]<>$ro[0]){
                      echo "<tr><td align=> ".$ro[1]."</td><td>";
                      echo"<INPUT TYPE='radio' name='".$row->name."' VALUE='".$ro[0]."'></td></tr>";
                    }
                  }
                  echo'</td></tr>';
	            }
	            else{
	              echo "<tr BGCOLOR=white><td>".str_replace("_"," ",$name).'</td><td>   <input class=kc1 type="text" name="'.$row->name.'" size="'.$length.'"  value="'.$donnee.'" /></td></tr>';
	            }
             }
               elseif($row->type=='blob'){
	           if($type=="obligatoire"){
	            echo "<tr><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."' lang='bonfond:#FFFFFF;bontexte:#400040; erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:".str_replace("_"," ",$name)." Obligatoire'  class=kc1 cols='100' rows='70'>".$donnee."</textarea></td></tr>";
	           }
	           else{
	             echo"<tr><td VALIGN='top'>".str_replace("_"," ",$name)."</td><td>  <textarea name='".$row->name."'  class=kc1 cols='50' rows='3'>".$donnee."</textarea></td></tr>";             }
               }
               elseif($row->type=='int'){
                 echo'<input class=kc1 type="hidden" name="my_id"  value="'.$donnee.'"/>';
               // echo"sla". $_POST["my_id"]=$donnee;
               }
	    		 if ($i==0) {
		            $all_values = $row->name;
				 }
				 else {
		           $all_values = $all_values.",".$row->name;
				 }
			 }
			 else{
	            echo'<input class=kc1 type="hidden" name="'.$row->name.'" size="5" />';
	         }
	     }
   	     echo'<tr><td>&nbsp;<input class=kc1 name="id_action" type="hidden" value='.@$_POST["my_id"].'></td><td>';
	      if(@$_GET["mod"]<>"")
	        echo'<input class=kc1 type="submit" name="modif" value="Modifier">';
             if(@$_GET["sup"]<>"")
	          echo'<input class=kc1 type="submit" name="supprim" value="Supprimer">';
 	          echo'</td></tr>';
	    }

 		echo"</table></td> ";
    	   $dd= date("m");
  	       $an=date("Y");
  	       $jj=date("d");
  	       $dp= $dd - 1;
  	       $anp=$an;
  	       $contp= $dp."/".$anp;
  	       $cont=$dd."/".$an;
  	         if ($dd==1) {
  	      	   $dp=12;
  	      	   $anp=$an - 1;
               $contp= $dp."/".$anp;
	         }
 	    if(isset($date_ref)){
   	     $d=retourne_mois($dd);
  	     $dpp=retourne_mois($dp);
  	     $req_selectA="select * from $table where $date_ref like  '%".$cont."%'";
         $exec=mysql_query($req_selectA) or die(mysql_error());
          echo'<td valign="top" bgcolor="#BAE3BA"><table border=0 cellpadding=0 cellspacing=0  width=250><tr><td align=center>Listes des Enregistrement du mois en Cours :'.$d." ".$an.'<br>
             <select class="kc1" size="9" name="my_id" onchange="submit();">';
            while($lig=mysql_fetch_row($exec)){
              echo"<option value='".$lig[0]."'><div align=center>".$lig[1]."</div></option>";
            }
             echo'</select><br>';
               if($jj<=5 && $dd==date("m")){
                 $req_selectB="select * from $table where $date_ref like  '%".$contp."%'";
                 $execB=mysql_query($req_selectB) or die(mysql_error());
                 echo'Listes des Enregistrement du mois précedent:'.$dpp." ".$anp.'<br><select class="kc1" size="9" name="my_id" onchange="frm.submit();">';
                   while($lige=mysql_fetch_row($execB)){
                     echo"<option value='".$lige[0]."'><div align=center>".$lige[1]."</div></option>";
                   }
                 echo'</select><br>';
                }
              echo' </td></tr></table>';
       	      echo'</TD></TR></table> ';

        }
        else{
            $req_selectA="select * from $table";
            $exec=mysql_query($req_selectA) or die(mysql_error());
           echo'<td valign="top" bgcolor="#BAE3BA"><table border=0 cellpadding=0 cellspacing=0  width=250><tr><td align=center>Listes des Enregistrements<br>
             <select class="kc1" size="9" name="my_id" onchange="frm.submit();">';
              while($lig=mysql_fetch_row($exec)){
                echo"<option value='".$lig[0]."'><div align=center>".$lig[1]."</div></option>";
              }
                echo'</select>';
                echo' </td></tr></table>';
         		echo'</TD></TR></table> ';

  		}
    		echo' </form>';
   	    if (isset($_POST["supprim"]) and isset($_POST["id_action"]) ) {
	        $req_champs="select * from ".$table;
	        $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
	    	$row = mysql_fetch_field($exe_req_champs);
	    	  if($row->type =="int"){
	    	    //audit_modifier_after($table,$row->name,@$_POST["id_action"],"sss",$_SESSION["cheminfich"],"Suppression");
	    	     $req="delete from $table where ".$row->name. " = ".$_POST["id_action"]." ";
	    	     $exer=mysql_query($req) or die(mysql_error());
	    	       if($exer){
	    	    	echo"<table><tr><td bgcolor='red'>Suppression Réussie</td></tr></table>";
	    	       }
	    	  }
	    }
	    elseif(isset($_POST["modif"]) and isset($_POST["id_action"])) {
         if(isset($_GET["id"])){
            $req_champs="select * from ".$table;
	        $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
	    	$row = mysql_fetch_field($exe_req_champs);
			  if($row->type =="int"){
			      //audit_modifier_after($table,$row->name,@$_POST["id_action"],"sss",$_SESSION["cheminfich"],"Avant Modification");
			    	    $req_champs="select * from $table where ".$row->name. " = ".$_POST["id_action"]." ";
			    	    $basreq="where ".$row->name. " = ".$_POST["id_action"]." ";
   	                    $exe_req_champs=mysql_query($req_champs) or die(mysql_error());
		                $ligchamps=mysql_fetch_row($exe_req_champs);
			            $recup_champs="";
			  		    $i=0;
			  	          $all_champs="";
			             	for($i=0;$i<mysql_num_fields($exe_req_champs);$i++)  {
			          	      $kc=$i;
			          	      $colchamps  = mysql_field_name($exe_req_champs, $i);
                              $len=strlen($colchamps);
						      $en=$colchamps;
					          $a=$en{$len-1};
			                    if ($all_champs=="") {
					             if (isset($_POST["".$colchamps.""])) {
					               $all_champs = $colchamps;
					                if ($a==2 || $a==6) {
				       	                $re=str_replace(".","/",$_POST["$colchamps"]);
				                        $recup_champs =str_replace("-","/",$re);
				                        $modtab="SET $colchamps = '".$recup_champs."',";
				                    }
				                    else {
				                      $modtab="SET $colchamps = '" .addslashes($_POST["".$colchamps.""])."',";
				                    }
                                  }
                                }
	                            else {
                                  if (($kc+1)==mysql_num_fields($exe_req_champs)) {
			                        if ($a==2 || $a==6) {
			                           $re=str_replace(".","/",$_POST["$colchamps"]);
			                           $recup_champs =str_replace("-","/",$re);
			                           $modtab=$modtab." $colchamps = '" .$recup_champs."'";
			                        }
			                        elseif($a==4){
			                           $mar=$_FILES["$colchamps"]['name'].' / '.$_POST["sss"];
			                              if($_FILES["$colchamps"]['name']<>''){
	                                   	    $stock = getcwd();
	                      					$dir="../allfichiers/";
	                       					move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
	                           				$modtab=$modtab." $colchamps = '" .addslashes($_FILES["$colchamps"]['name'])."'";
	                           				//echo"<br>saliou";
                           				  }
                                          else{

                           				    $modtab=$modtab." $colchamps = ''";
                                          }
		                            }
				                    else {
				                      $modtab=$modtab." $colchamps = '" .addslashes($_POST["$colchamps"])."'";
				                    }
		                          }
				                  else {
				                   if (($a==2) || ($a==6)) {
				       	               $re=str_replace(".","/",$_POST["$colchamps"]);
				                       $recup_champs =str_replace("-","/",$re);
				                       $modtab=$modtab." $colchamps = '".$recup_champs."',";
				                   }
				                   elseif($a==4){
				                    $mar=$_FILES["$colchamps"]['name'].' / '.$_POST["sss"];
				                      if($_FILES["$colchamps"]['name']<>''){
	                              	    $stock = getcwd();
	                                	$dir="../allfichiers/";
	                                	move_uploaded_file($_FILES["$colchamps"]['tmp_name'], $dir.$_FILES["$colchamps"]['name']);
	                                   //echo
	                                   $modtab=$modtab." $colchamps = '" .addslashes($_FILES["$colchamps"]['name'])."',";
                        			  }
                                      else{
                                      //echo"saliou";
                        			 // echo
                        			  $modtab=$modtab." $colchamps = '',";
                                      }
		                           }
				                   else {
				                    $modtab=$modtab." $colchamps = '".addslashes($_POST["".$colchamps.""])."',";
				                   }
	                             }
                                }
   			  			    }
			         // ECHO
			           $req_mod=" update $table ".$modtab." ".$basreq."";
   		               $exe_req_mod=mysql_query($req_mod) or die(mysql_error());
			             if($exe_req_mod){
			          	 //audit_modifier_after($table,$row->name,@$_POST["id_action"],"sss",$_SESSION["cheminfich"],"Apres Modification");
			             }
			             echo"<table><tr><td bgcolor='red'> Modification réussie</td></tr></table>"; /**/
                    }
	        }
        }
    }

?>