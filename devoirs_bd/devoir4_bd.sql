-----------------------------------
Binome:
   > Amarigh Mustapha G1
   > Farid Elkharrazi G2


------------------------------------------
-------------- exercice 1) ----------------------

>>>> Créer un Trigger qui restreindra toutes les opérations de manipulation de données sur la table Pilote aux
heures de travail entre 08H et 18H. Ce trigger restreint les ordres DML sur la table Pilote en utilisant
des attributs Conditionnels pour l’insertion, la mise à jour et la suppression et afficher le message
d’erreurs suivant dans les cas où la condition du trigger n’est pas vérifié :
(-20501, 'Insertion impossible à cette heure.');
(-20502, 'Mise à jour impossible à cette heure.');
(-20503, 'Suppression impossible à cette heure.').

>>>>

                  CREATE OR REPLACE TRIGGER trg_manipul_pilote AFTER INSERT OR UPDATE OR DELETE ON pilote
						FOR EACH ROW
						DECLARE
						heure_actuel DATE;
						BEGIN
							heure_actuel :=to_char(SYSDATE,'HH:MM:SS') ;
							DBMS_OUTPUT.PUT_LINE('------------------------------------------------') ;
							DBMS_OUTPUT.PUT_LINE(to_char(SYSDATE,'HH:MM:SS')) ;
							DBMS_OUTPUT.PUT_LINE('------------------------------------------------') ;
							IF (heure_actuel < '08:00:00' OR heure_actuel > '18:00:00') THEN
							  IF INSERTING THEN
							      RAISE_APPLICATION_ERROR(-20000,'inserting impossible') ;
							  END IF ;
							  IF UPDATING THEN
							        RAISE_APPLICATION_ERROR(-20000,'MAJ impossible') ;
							  END IF ;
							  IF DELETING THEN
							        RAISE_APPLICATION_ERROR(-20000,'suppression  impossible') ;
							  END IF ;
							END IF ;
						END;    



------------------------------------------------------------------------------------------------------

--------------------- Exercice 2) ------------------------------------

>>>> Utiliser une table nommée Audit_Pilote_Table, cette table est constituée des colonnes username, timestamp,
id, old_last_name, new_last_name, old_comm, new_comm, old_salary, new_salary). Créer un trigger qui
pour tout ordre DML sur la table PILOTE insérera une ligne d’audit en enregistrant l’ancienne et la nouvelle
valeur du nom, de la commission et salaire

>>>> 
                    drop table audit_pilote ;
					create  table audit_pilote(
						pilnum       number(5) ,
						pilnom       varchar2(12) ,
						pilOldSal    number(7,2) not null ,
						pilNewSal    number(7,2) ,
						pilOldComm   number(7,2) ,
						pilNewComm   number(7,2),
						utilisateur  varchar2(12),
						dateModif    DATE ,
						action       varchar2(12)
					) ;
					create or replace trigger trg_audit_pilote after insert or update or delete on pilote
					for each row
					BEGIN
					if inserting then
					   insert into audit_pilote values
					   (:new.pilnum,:new.pilnom,:new.pilsal,:new.pilsal,null,:new.pilcomm,user,sysdate,'INSERT') ;
					end if ;
					if updating then
					    insert into audit_pilote values
					    (:new.pilnum,:old.pilnom,:old.pilsal,:new.pilsal,:old.pilcomm,:new.pilcomm,user,sysdate,'UPDATE') ;
					end if ;
					if deleting then
					   insert into audit_pilote values
					    (:old.pilnum,:old.pilnom,:old.pilsal,null,:old.pilcomm,null,user,sysdate,'DELETE') ;
					END if ;
					END ;
--------------------------------------------------------------------------

-----------------------Exercice 3)--------------------------

>>> Créer un trigger qui permet de calculer la nouvelle commission quand une ligne est ajoutée ou modifiée dans
la table PILOTE.

>>>>
		create or replace trigger trg_comm_pilote after insert or update on PILOTE
		FOR EACH ROW
		BEGIN
		IF INSERTING OR UPDATING THEN
		UPDATE PILOTE
		   set PILCOMM = :NEW.PILSAL + :NEW.PILSAL* 10/100 ;
		END IF ;
		END;


------------------------------------------------------------

---------------- exercice 4) --------------------------------------------

>>> Créer un trigger qui permet de s’assurer que le salaire ne sera jamais augmenté ou réduit de plus de 10%
d’un coup.

>>> 
    CREATE OR REPLACE TRIGGER trg_sal_pilote BEFORE UPDATE ON pilote for(PILSAL)
		FOR EACH ROW
	DECLARE
		tauxLimite  pilote.pilsal%type ;
	BEGIN
		tauxLimite := ABS((:OLD.pilsal - :NEW.pilsal)/:OLD.pilsal)*100 ;
		DBMS_OUTPUT.PUT_LINE(tauxLimite) ;
		IF tauxLimite >10.0
		THEN
		 RAISE_APPLICATION_ERROR(-20000,'Taux max depasse. MAJ impossible') ;
		END IF;
    END ;


 ---------------------------------------------------------------------

 ------------------ exercice 5) ---------------------

 >>> Créer un trigger nommé Ajout-pilote qui limite l’ajout d’un nouveau pilote à l’utilisateur ‘SYSTEM’, et qui
génère le message suivant « Utilisateur non autorisé » lorsque cette contrainte est violée.



>>>> 
		create or replace trigger trg_ajoute_pilote  before  insert ON pilote 
			FOR EACH ROW
		DECLARE 
		BEGIN
			if user <> 'SYSTEM'   
			 then
			 raise_APPLICATION_ERROR(-20000,'Utilisateur non autorise |') ;
			end  if ;
		end ;


---------------------------------------

------------------------- Exercice 6) ---------------------------------

>>>>> Un déclencheur avec l’option After peut être utilisé pour faire des validations à posteriori afin de vérifier que
les modifications se sont bien déroulées

>>> 
			create or replace trigger trg_verif_nhvol AFTER  insert or update ON AVION 
				FOR EACH ROW
			DECLARE
				NBR AVION.AVINBHVOL%TYPE ;
			BEGIN
				select AVG(AVINBHVOL)
				INTO NBR 
				FROM AVION ;

				IF NBR >= 24500 THEN
				  RAISE_APPLICATION_ERROR(-20000,'NBR MAX VOL depasse, INSERT OR UPDATE impossible') ;
				END IF ;
			END;
----------------------------------------------------------------------

------------------ Exercice 7)-------------------------------

>>>> Un trigger ligne avec l’option before peut permette d’effectuer des traitements d’initialisation avant
exécution des modifications sur la table

>>>> 
		create or replace trigger trg_count_maj AFTER  insert or update or delete ON pilote
			FOR EACH ROW
		DECLARE
			nbmodif number ;
		BEGIN
			nbmodif :=  0 ;
			if inserting or updating or deleting
			then 
			nbmodif := nbmodif + 1 ;
			DBMS_OUTPUT.PUT_LINE('le nombre des lignes que vous avez traité :['||nbmodif||']') ;
			end if;
		END ;