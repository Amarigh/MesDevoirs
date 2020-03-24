
devoire 2 debase de données

binome:
- Amarigh Mustapha  G1  
-Farid Elkharrazi   G2






-------  Question  C7): --------------------------------------------------------------------
Question:----

		PL/SQL offre la possibilité d’utiliser l’option CURRENT OF nom_curseur dans la clause
		WHERE des instructions UPDATE et DELETE. Cette option permet de modifier ou de
		supprimer la ligne distribuée par la commande FETCH. Pour utiliser cette option il faut ajouter
		la clause FOR UPDATE à la fin de la définition du curseur.
		Compléter le script suivant qui permet de modifiant le salaire d’un pilote avec les contraintes
		suivantes :
		- Si la commission est supérieure au salaire alors on rajoute au salaire la valeur de la
		commission et la commission sera mise à la valeur nulle.
		- Si la valeur de la commission est nulle alors supprimer le pilote du curseur.
		DECLARE
		CURSOR C_pilote IS
		 SELECT nom, sal, comm
		FROM pilote
		WHERE nopilot BETWEEN 1280 AND 1999 FOR UPDATE;
		 v_nom pilote.nom%type;
		 v_sal pilote.sal%type;
		 v_comm pilote.comm%type;
		BEGIN
		. . .
		END;

Reponse:---




		set serveroutput on;
	DECLARE 
		CURSOR C_pilote  IS 
		  	SELECT nom,sal,comm FROM 	 pilote 
		WHERE  nopilot BETWEEN 1280 AND 1999 FOR UPDATE ;
		   v_nom pilote.nom%type;
		  v_sal pilote.sal%type;
		  v_comm pilote.comm%type;

	BEGIN
		open C_pilote;
		loop
		exit WHEN(C_pilote%notfound);
		FETCH C_pilote into v_nom,v_sal,v_comm;

		if(v_comm>v_sal)  then
		        update pilote
		         set sal=v_sal+v_comm , comm=null 
		         where CURRENT OF C_pilote;
		          
		elsif(v_comm=null) then   
		        delete from pilote
		        where CURRENT OF C_pilote;
		end if;

		end loop;
	close C_pilote ;	

	END;



------ question C8):--------------------------------------------------------------
question:---

		Écrire une procédure PL/SQL qui réalise l’accès à la table PILOTE par l’attribut nopilote.Si le
		numéro de pilote existe, elle envoie dans la table ERREUR, le message « NOM PILOTE-OK »
		sinon le message « PILOTE INCONNU ». De plus si sal<comm, elle envoie dans la table
		ERREUR le message « « NOM PILOTE, COMM >SAL ».
		Indication : une erreur utilisateur doit être explicitement déclenchée dans la procédure PL/SQL par
		l’ordre RAISE. La commande RAISE arrête l’exécution normale du bloc et transfert le contrôle
		au traitement de l’exception.


Reponse:----


	Create or replace procedure Acce_pilote(npilote_ in pilote.nopilot%type) is
		cursor c_pilote is select nopilot,sal,comm from pilote ;
		v_nop   pilote.nopilot%type;
		v_sal   pilote.sal%type;
		v_comm  pilote.comm%type;
		v_inconnue  exception;
		v_connue EXCEPTION;
		v_salcomm  exception;

	begin

		open c_pilote;
		loop
		   fetch c_pilote into v_nop,v_sal,v_comm;
		   exit when(c_pilote%notfound);
		                if(npilote_=v_nop) then
		                            if(v_sal<v_comm) then
		                               raise v_salcomm;
		                            else
		                                 raise v_connue;
		                            end if;
		                end if;
		end loop;

		raise v_inconnue;
		 
		 close c_pilote ;

	EXCEPTION 
		 WHEN v_connue THEN
		      dbms_output.put_line('NOM PILOTE-OK ');
		when v_inconnue then 
		  dbms_output.put_line('PILOTE INCONNU ');
		 when v_salcomm THEN 
		   dbms_output.put_line('pNOM PILOTE, COMM >SAL');
	end;




---------------- Question D1):---------------------------------------

Créer une vue (v-pilote) constituant une restriction de la table pilote,
     	  aux pilote qui habitent Paris. 
				

					create view v_pilote 
					as 
					select * from pilote where ville like 'Paris';


----- Qusetion D2):---------------------------------------------------

Vérifier est ce qu’il est possible de modifier les salaires des pilotes habitant Paris à travers la vue
v-pilote.

oui il possible

        update v_pilote 
						set sal = 20000
						where nopilote = 6589;



----------------Question D3):--------------------------------------------------------------

Créer une vue (dervol) qui donne la date du dernier vol réalisé par chaque avion.

      create view dervol 
					as 
					select max(date_vol) , pilote from affection group by pilote;




----------Question D4):------------------------------------------------------------------

 Une vue peut être utilisée pour contrôler l’intégrité des données grâce à la clause ‘CHECK OPTION’.
Créer une vue (cr_pilote) qui permette de vérifier lors de la modification ou de l’insertion d’un
pilote dans la table PILOTE les critères suivants :
- Un pilote habitant Paris a toujours une commission
- Un pilote qui n’habite pas Paris n’a jamais de valeur de commission.

      create view cr_pilote 
					as
					select * from pilote 
					where 
					( ville = 'Paris' and comm is not null)
					or
					( ville <> 'paris' and comm is null)

					WITH CHECK OPTION;

------------Question D5)---------------------------------------------------------------------

Créer une vue (nomcomm) qui permette de valider, en saisie et mise à jour, le montant
commission d’un pilote selon les critères suivant :
- Un pilote qui n’est affecté à au moins un vol, ne peut pas avoir de commission
- Un pilote qui est affecté à au moins un vol peut recevoir une commission.
Vérifier les résultats par des mises à jour sur la vue nomcomm.


create view nomcom as
	       select * from pilote 
	        where 
	        (nopilot in (select pilote from affectation) and comm is not null)
            or
            (nopilot not in (select pilote from affectation) and comm is  null)
            with CHECK option;




