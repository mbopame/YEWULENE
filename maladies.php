<?php
//header('Content-Type: text/html; charset=iso-8859-1');
//header('Content-Type: text/html; charset=UTF-8');
include 'all_function.php';
if(isset($_POST['PROF_ID']))
{
$infection =$_POST['PROF_ID'];
if($infection<>''){
echo'
<tr><img src="images/facteurs.png"  border="0" alt="" />';
 $table = 'facteurs';
				 //$lib = 'libelle';
				 $selection =  findByValue($table,'infection5',$infection);
				while($ro=mysql_fetch_row($selection)){
				echo'<b>* '.htmlentities($ro['1']).'</br>';
   			}
echo' </br></br>
</br></br><img src="images/causes.png"  border="0" alt="" />';
 $table = 'causes';
				 //$lib = 'libelle';
				 $selection =  findByValue($table,'infection5',$infection);
				while($ro=mysql_fetch_row($selection)){
			echo'<b>* '.htmlentities($ro['1']).'</br>';
    			}
				echo'
</tr>

<TR><TD class=petit>&nbsp;</TD></TR>
<TR><TD class=petit>&nbsp;</TD></TR>
<TR><TD class=petit>&nbsp;</TD></TR>
</br></br><tr> <img src="images/symptomes.png"  border="0" alt="" />';
 $table = 'symptomes';
				 //$lib = 'libelle';
				 $selection =  findByValue($table,'infection5',$infection);
				while($ro=mysql_fetch_row($selection)){
				echo'<b>* '.htmlentities($ro['1']).'</br>';
    			}
				echo'
</br></br>
</br></br><img src="images/preventions.png"  border="0" alt="" />';
 $table = 'preventions';
				 //$lib = 'libelle';
				 $selection =  findByValue($table,'infection5',$infection);
				while($ro=mysql_fetch_row($selection)){
				echo'<b>* '.htmlentities($ro['1']).'</br>';
    			}echo'
</br></br><img src="images/traitements.png"  border="0" alt="" />';
 $table = 'traitements';
				 //$lib = 'libelle';
				 $selection =  findByValue($table,'infection5',$infection);
				while($ro=mysql_fetch_row($selection)){
				echo'<b>* '.htmlentities($ro['1']).'</br>';
   			}
 echo'</tr>';
	}
}
?>