

   /*==================================================================================|
        |                                                                                                                                                                                                                                |
        |   _______   ___                      ____                                         |
   |        ConForm : CONtrole des champs d'un FORMulaire                                                                                      |
        |   ｯｯｯｯｯｯｯ   ｯｯｯ                      ｯｯｯｯ                                         |
        |                                                                                                                                                                                                                                |
        |                                                            ~\\|//                                                                                                                                                |
   |                        (@ ~)                                                                                                                                                |
   |     風覧覧覧覧覧oOOO覧覧(_)覧覧OOOo覧覧覧覧藍                                                                                                        |
   |     | M'馗rire : http://mas.keo.in?Code=Bul |                                                                                                        |
   |     | Mon Site : http://bul.fr.nf           |                                                                                                        |
   |     |              .oooO   Oooo.            |                                                                                                        |
   |     風覧覧覧覧覧覧�(   )覧�(   )覧覧覧覧覧覧�                                                                                                        |
   |                     \ (     ) /                                                                                                                                        |
   |                      \_)   (_/                                                                                                                                                |
        |                                                                                                                                                                                                                                |
        |===================================================================================|
        |                                                                                                                        |                                                                                                        |
        |             lang="                                                                                        |                                                                                                        |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          nom:nom de la zone;                                        | par d馭aut : nｰ champ                                         |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          erreur:libell� de l'erreur;                        | par d馭aut : invalide                                         |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |             type:obligatoire;                                        | doit 黎re renseign�                                                |
        |                                   date;                                                                        | d駱end de "format:"                                                |
        |                                   cocher;                                                                | cases � cocher (checkbox)                                |
        |                                   liste;                                                                | select o� choisir des lignes                        |
        |                                   radio;                                                                | radio � cocher ( au moins 1 )                        |
        |                                   mail;                                                                        | adresse Mail ( ab.cd@ef.gh )                        |
        |                                   nombre;                                                                | valeur                                                                                        |
        |                                   specifique;                                                        | test � faire (dans format:)                                |
        |                                   accepter                                                                | 1 checkbox/radio qui doit 黎re coch�        |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |             format:de la date;                                        | si type:date  jjmmaaaa                                         |
        |                                                                                                                        |               jj/mm/aaaa ( d馭aut )         |
        |                                         test particulier;                                | if ( test particulier )                                        |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          separateur:?;                                                        | entre jj,mm et aaaa                                                |
        |                                                                                                                        | par d馭aut : n'importe                                   |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          mini:valeur;                                                                | ｰ valeur mini de nombre                               |
        |                                                                                                                        | ｰ nombre de cases mini � cocher           |
        |                                                                                                                        |  si select multiple, par d馭aut=1                |
        |                                                   | ｰ nbr caract鑽es mini � saisir       |
        |                                                   |    si type:obligatoire               |
        |                                                   |    1 par d馭aut                      |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          maxi:valeur;                                                                | ｰ valeur maxi de nombre                                        |
        |                                                                                                                        | ｰ nbr cases maxi � cocher si                         |
        |                                                                                                                        |   select multiple, par d馭aut=mini        |
        |                                                   | ｰ nbr caract鑽es maxi � saisir       |
        |                                                   |    si type:obligatoire               |
        |                                                   |    pas de maxi par d馭aut            |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          bonfond:couleur;                                                | couleur fond si contr�les bons                        |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          bontexte:couleur;                                                | couleur texte si contr�les bons                |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          erreurfond:couleur;                                        | couleur fond si contr�les faux                 |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                          erreurtexte:couleur;                                        | couleur texte si contr�les faux                |
        |覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧覧|
        |                  "                                                                                        |                                                                                                        |
        |                                                                                                                        |                                                                                                        |
        |===================================================================================|
        |                                                                                                                                                                                                                                |
        |                         Si vous ajoutez/modifier des contr�les, ce serait                                                                    |
        |                        sympa de me les faire parvenir  : merci d'avance.                                                                         |
        |                        Si vous voulez que j'en ajoute  : contactez-moi.                                                                        |
        |                                                                                                                                                                                                                                |
        |==================================================================================*/

//######################################################################
function RLtrim(zone)        //## supprimer les espaces en d饕ut et en fin ##
//######################################################################
{
        return zone.replace(/(^\s*)|(\s*$)/g,"");
}
//###########################################################
function SignalErreur(z1,frm,z2)        //## signaler les erreurs ##
//###########################################################
{
		frm.elements[z2].focus();
        if ( z1["erreurfond"] )
        {
                frm.elements[z2].style.backgroundColor=z1["erreurfond"] ;
        }
        if ( z1["erreurtexte"] )
        {
                frm.elements[z2].style.color=z1["erreurtexte"] ;
        }
        return "\r\n"+z1["erreur"];
}
//#####################################################################
function conform(formulaire)        //## contr�le des champs du formulaire ##
//#####################################################################
{
  var retour="",tester;
  for (  no_element=0; no_element<formulaire.elements.length;no_element++)        // pour toutes les champs d'un formulaire
  {
          tester=formulaire.elements[no_element].controle;        //#### non trait� par moteurs Gecko
  //        tester=formulaire.elements[no_element].alt;                        //#### non valable pour textarea
          tester=formulaire.elements[no_element].lang;                        //        version actuelle
          if (tester)
          {        //~~~~~~~~ il y a un alt="contr�le � faire" ~~~~~~~~
                  var zones=RLtrim(tester).split(";");
                  // format : alt="id1:valeur1;id2:valeur2...."
                  var        valeur=new Array();
                  for (  var z=0; z<zones.length;   z++ )
                      // pour toutes les zones du controle
                  {        // valeur["id#"]=valeur#
                          trv=RLtrim(zones[z]).split(":");        // id#:valeur#
                          if (trv.length==2)
                          {
                                  valeur[RLtrim(trv[0].toLowerCase())]=RLtrim(trv[1].toLowerCase());
                          }
                  }
                  if ( !valeur["nom"] )
                  {
                          valeur["nom"]="Champ("+(no_element+1)+")";
                           // valeurs par d馭aut
                  }
                  if ( !valeur["erreur"] )
                  {
                          valeur["erreur"]=valeur["nom"]+" invalide";
                          // valeurs par d馭aut
                  }
                  if ( valeur["bonfond"] )
                  {
                          formulaire.elements[no_element].style.backgroundColor=valeur["bonfond"] ;
                  }
                  if ( valeur["bontexte"] )
                  {
                          formulaire.elements[no_element].style.color=valeur["bontexte"] ;
                  }
                  switch ( valeur["type"] )
                  {
                           //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ une
                                case "snombre":        //~~ nombre ~~~~~~~~~~~~~~~~~~~~~ valeur
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ >= mini et <= maxi
                                 if (   formulaire.elements[no_element].value.length<1 )
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);

                                          alert ("Le champ "+formulaire.elements[no_element].id+" est Obligatoire ");
                                          return false;
                                           break;
                                  }
                                        if (isNaN(formulaire.elements[no_element].value))
                                        {
                                                retour=SignalErreur(valeur,formulaire,no_element);

                                               alert ("Le champ "+formulaire.elements[no_element].id+" doit 黎re un nombre ");
                                          		return false;
                                                break;
                                        }
                                        if( formulaire.elements[no_element].value.length !=valeur["maxi"])
                                  {
                                     if( formulaire.elements[no_element].value.length !=valeur["maxi"])
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);
                                          alert(formulaire.elements[no_element].id+ " doit avoir "+valeur["maxi"]+ " Chiffres");
                                          return false;
                                          break;
                                       }
                                  }

                                    break;
                           //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ une
                                case "inombre":        //~~ nombre ~~~~~~~~~~~~~~~~~~~~~ valeur
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ >= mini et <= maxi
                                 if (   formulaire.elements[no_element].value.length<1 )
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);

                                          alert ("Le champ "+formulaire.elements[no_element].id+" est Obligatoire ");
                                          return false;
                                           break;
                                  }
                                        if (isNaN(formulaire.elements[no_element].value))
                                        {
                                                retour=SignalErreur(valeur,formulaire,no_element);

                                               alert ("Le champ "+formulaire.elements[no_element].id+" doit 黎re un nombre ");
                                          		return false;
                                                break;
                                        }

                                    break;
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ champ non vide
                          case "obligatoire1":        //~~ obligatoire ~~~~~~~~~~~~~~~~~~~ et/ou longueur
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ saisie contr�l馥
                                  if(formulaire.elements[no_element].value.length !=valeur["maxi"])
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);
                                          alert("Le champ "+formulaire.elements[no_element].id+" doit avoir "+valeur["maxi"]+ " chiffres");
                                          return false;
                                          break;

                                  }
                                  else if( formulaire.elements[no_element].value.substr(0,3)!=120){                                                if ((formulaire.elements[no_element].value.substr(0,3))!=125 ) {
                                                    alert (formulaire.elements[no_element].id+" doit  commencer par 120 ou 125");
                                                    return false;
													break;
                                                 }
                                                 else {

                                                 }                                   }
                                  else if( formulaire.elements[no_element].value.substr(0,3)!=125){
                                                if (formulaire.elements[no_element].value.substr(0,3)!=120) {
                                                    alert (formulaire.elements[no_element].id+" doit  commencer par 120 ou 125");
                                                    return false;
													break;
                                                }
                                                else {

                                                }

                                   }

                                  break;
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                          case "obligatoire_sc1":        //~~ obligatoire ~~~~~~~~~~~~~~~~~~~ et/ou longueur
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ saisie contr�l馥
                                 //  alert("Dieuredieuf Mame Saliou");
                                  if(formulaire.elements[no_element].value.length !=valeur["maxi"])
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);
                                          alert(formulaire.elements[no_element].id+ " doit avoir "+valeur["maxi"]+ " Chiffres");
                                          return false;
                                          break;

                                  }

                                  break;
                           case "obligatoire_sc1a":        //~~ obligatoire ~~~~~~~~~~~~~~~~~~~ et/ou longueur
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ saisie contr�l馥
                                 //  alert("Dieuredieuf Mame Saliou");
                                  if(formulaire.elements[no_element].value.length !=valeur["maxi"] & isNaN(formulaire.elements[no_element].value))
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);
                                          alert(formulaire.elements[no_element].id+ " doit avoir "+valeur["maxi"]+ " Chiffres");
                                          return false;
                                          break;

                                  }

                                  break;
                         case "obligatoire2":        //~~ obligatoire ~~~~~~~~~~~~~~~~~~~ et/ou longueur
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ saisie contr�l馥
                                  if(formulaire.elements[no_element].value.length <valeur["mini"])
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);
                                         // alert("Le champ "+formulaire.elements[no_element].id+" doit avoir "+valeur["maxi"]+ " chiffres");
                                          alert("Le nombre de Caractere doit 黎re au minimum"+valeur["mini"]);
                                          return false;
                                          break;

                                  }
                                  else if( formulaire.elements[no_element].value.substr(0,3)!=120){
                                                if ((formulaire.elements[no_element].value.substr(0,3))!=125 ) {
                                                    alert (formulaire.elements[no_element].id+" doit  commencer par 120 ou 125");
                                                    return false;
													break;
                                                 }
                                                 else {

                                                 }

                                   }
                                  else if( formulaire.elements[no_element].value.substr(0,3)!=125){
                                                if (formulaire.elements[no_element].value.substr(0,3)!=120) {
                                                    alert (formulaire.elements[no_element].id+" doit  commencer par 120 ou 125");
                                                    return false;
													break;
                                                }
                                                else {

                                                }

                                   }

                                  break;
                         case "obligatoire":        //~~ obligatoire ~~~~~~~~~~~~~~~~~~~ et/ou longueur
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ saisie contr�l馥


                                  if (   formulaire.elements[no_element].value.length<1
                                          || ( valeur["mini"] && formulaire.elements[no_element].value.length<Number(valeur["mini"]) )
                                          || ( valeur["maxi"] && formulaire.elements[no_element].value.length>Number(valeur["maxi"]) ) )
                                  {
                                        retour=SignalErreur(valeur,formulaire,no_element);
                                           //alert ( retour );
                                           alert ("Le champ "+formulaire.elements[no_element].id+" est Obligatoire ");
                                           return false;
                                           break;

                                  }

                           break;
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ diff駻ents format
                          case "date":        //~~ date ~~~~~~~~~~~~~~~~~~~~~ possible d'une date
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ "adaptable facilement"
                                  var j,m,a,la,s;
                                  switch ( valeur["format"] )
                                  {
                                          case "jjmmaaaa":
                                                  la=4;
                                                  j=0;
                                                  m=2;
                                                  a=4;
                                                  s=new Array();
                                                  break;
                                          default:
                                                  //~~ jj/mm/aaaa par d馭aut
                                          case "jj/mm/aaaa":
                                                  la=4;
                                                  j=0;
                                                  m=3;
                                                  a=6;
                                                  s=new Array(2,5);
                                                  break;
                                  }
                                  if ( formulaire.elements[no_element].value.length  != (la+s.length+4) )
                                  {
                                          retour=SignalErreur(valeur,formulaire,no_element);
                                           //alert ( retour );
                                           alert (formulaire.elements[no_element].id+" est Incorrecte ");
                                           return false;
                                          break;
                                  }
                                  if ( valeur["separateur"] )
                                  {
                                          for ( var n=0; n<s.length; n++ )
                                          {
                                                  if (formulaire.elements[no_element].value.charAt(s[n])!=valeur["separateur"] )
                                                  {
                                                          retour=SignalErreur(valeur,formulaire,no_element);
                                                           //alert ( retour );
                                                           alert (formulaire.elements[no_element].id+" est Incorrecte ");
                                                           return false;
                                                          break;
                                                  }
                                          }
                                  }
                                  j=Number(formulaire.elements[no_element].value.substring(j,2));
                                  m=Number(formulaire.elements[no_element].value.substring(m,m+2));
                                  a=Number(formulaire.elements[no_element].value.substring(a,a+la));
                                  if ( isNaN(j) || isNaN(m) || isNaN(a) || j<1 ||  m<1 || m>12 )
                                  {
                                          retour=SignalErreur(valeur,formulaire,no_element);
                                           //alert ( retour );
                                           alert (formulaire.elements[no_element].id+" est Incorrecte ");
                                           return false;
                                          break;
                                  }
                                  var fm;
                                  switch (m)
                                  {
                                          case 4:
                                          case 6:
                                          case 9:
                                          case 11:
                                                  fm=30;
                                                  break;
                                          case 2:
                                                  if ( (a%4)==0 && ((a%100)!=0 || (a%400)==0) )
                                                                  {
                                                                          fm=29;
                                                                  }
                                                  else        {
                                                                          fm=28;
                                                                  }
                                                  break;
                                          default:
                                                  fm=31;
                                                  break;
                                  }
                                  if ( j>fm )
                                  {
                                          retour=SignalErreur(valeur,formulaire,no_element);
                                           //alert ( retour );
                                           alert (formulaire.elements[no_element].id+" est Incorrecte ");
                                           return false;
                                          break;
                                  }
                                  break;
                           //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ n checkbox doivent
                                case "cocher":        //~~ checkbox ~~~~~~~~~~~~~~~~~~~~~   黎re coch駸
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ >= mini et <= maxi
                                        var nom=formulaire.elements[no_element].name;
                                        var nbc=0;
                                        for ( var n=0;n<formulaire[nom].length;n++ )
                                        {
                                                if ( formulaire[nom][n].checked )
                                                {
                                                        nbc++;
                                                }
                                        }
                                        if ( nbc<valeur["mini"] || nbc>valeur["maxi"] )
                                        {
                                                retour=SignalErreur(valeur,formulaire,no_element);
                                                //alert ( retour );
                                                alert (formulaire.elements[no_element].id+" est Obligatoire "+retour);
                                                return false;
                                                break;
                                        }
                                        break;
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ format ( minimaliste )
                                case "mail":        //~~ mail ~~~~~~~~~~~~~~~~~~~~~ du
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ mail
                                        if ( !formulaire.elements[no_element].value.match
                                                                ("[-\./w]*@[/w]*.[/w]*") )        // pas terrible 軋 !
                                        {
                                                retour=SignalErreur(valeur,formulaire,no_element);
                                               // alert ( retour );
                                               alert (formulaire.elements[no_element].id+" est Incorrect "+retour);
                                                return false;
                                        }
                                        break;
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ une
                                case "nombre":        //~~ nombre ~~~~~~~~~~~~~~~~~~~~~ valeur
                                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ >= mini et <= maxi
                                 if (   formulaire.elements[no_element].value.length<1 )
                                  {
                                          retour =SignalErreur(valeur,formulaire,no_element);
                                          //alert ( retour );
                                          alert ("Le champ "+formulaire.elements[no_element].id+" est Obligatoire ");
                                          return false;
                                           break;
                                  }
                                        if (isNaN(formulaire.elements[no_element].value))
                                        {
                                                retour=SignalErreur(valeur,formulaire,no_element);
                                               // alert ( retour );
                                               alert ("Le champ "+formulaire.elements[no_element].id+" doit 黎re un nombre ");
                                          		return false;
                                                break;
                                        }
                                        if (valeur["mini"])
                                        {
                                                if (Number(formulaire.elements[no_element].value)<Number(valeur["mini"]))
                                                {
                                                        retour=SignalErreur(valeur,formulaire,no_element);
                                                       // alert.width>20;
                                                        alert ( retour );
                                                       //alert (formulaire.elements[no_element].id+" minimum "+Number(valeur["mini"]));
                                                        /* if ((formulaire.elements[no_element].id=="Num駻o Demande Abonnement" || formulaire.elements[no_element].id=="Police")) {
				                                          	//(formulaire.elements[no_element].value.substr(0,3)!=120 || formulaire.elements[no_element].value.substr(0,3)!=125)
				                                            var code=formulaire.elements[no_element].value.substr(0,3);
				                                            //document.write(code.substr(0,3));
				                                            if (parseInt(code)!=120 ) {
				                                                    alert (formulaire.elements[no_element].id+" est Obligatoire minimum 10 chiffres  "+code.substr(0,3));
				                                                    return false;
				                                            }
				                                            else {
				                                               		//alert (formulaire.elements[no_element].id+" est Obligatoire minimum 10chiffres  et doit commencer par 120 ou 125");
				                                            }

				                                          }
				                                          else {
				                                             alert (formulaire.elements[no_element].id+" est Obligatoire ");

				                                          } */
                                                         return false;
                                                        break;
                                                }
                                        }
                                        if (valeur["maxi"])
                                        {
                                                if (Number(formulaire.elements[no_element].value)>Number(valeur["maxi"]))
                                                {
                                                        retour=SignalErreur(valeur,formulaire,no_element);
                                                     alert ( retour );

                                                        return false;
                                                        break;
                                                }
                                        }
                                        break;



                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ controle
                          default:        //~~ pas de contr�le alors ? ~~~~~~~~~~~~~~~~~~~~~~~ non trait�.
                          //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ enfin pour le moment
                                  break;
                       }
                }
  }
}
