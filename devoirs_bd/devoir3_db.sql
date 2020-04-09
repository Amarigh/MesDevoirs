---------------------------------------

binom:
       > Amarigh Mustapha G1
       > Farid Elkharrazi G2


--------------------------------------------------- tp  -Procédures, Fonctions & Packages -----------------------------------------------------




------------------- Procédures Stockées ___________________


>>

Create Or REPLACE procedure AjoutePilote(nopilote_  in  pilote.nopilot%type, nom_ in pilote.nom%type , ville_ in pilote.ville%type , sal_ in pilote.sal%type, comm_ in pilote.comm%type, embauche_ in pilote.embauche%type)
as

			 Existe_ exception;
			 succes_   exception;
			cursor  pilote_ is select nopilot from pilote;
			numpilote_  pilote.nopilot%type;
			 begin 
			 open pilote_;
			 loop

			 fetch pilote_ into numpilote_;
			  exit when(pilote_%notfound);
			 if(numpilote_=nopilote_) then Raise   Existe_;
			 end if;
			 end loop;
			 close pilote_;
			 INSERT INTO  pilote(nopilot,nom,ville,sal,comm,embauche) values(nopilote_,nom_,ville_,sal_,comm_,embauche_);
			 
			 raise succes_;
			 
			 Exception
			 when Existe_ then  dbms_output.put_line('Pilote existe ');
			 when succes_ then dbms_output.put_line(' inserting has been succed !!!!!');              
 
 end;


 >>>>


Create Or REPLACE procedure SuprimerPilote(nopilote_  in  pilote.nopilot%type)
as

		 NoExiste_ exception;
		 AfectVol_   exception;
		 succes_   exception;
		cursor  pilote_ is select nopilot from pilote where nopilot not in (select pilote from  affectation );
		cursor  pilotevol_ is select pilote from  affectation ;
		numpilotevol_  affectation.pilote%type;
		numpilote_  pilote.nopilot%type;
		 begin 
		 open pilote_;
		 
		 
		 loop

		 fetch pilote_ into numpilote_;
		  exit when(pilote_%notfound);
		 if(numpilote_=nopilote_) then
		 delete from  pilote
		 where nopilot=nopilote_;
		 Raise   succes_;
		 end if;
		 end loop;
		 close pilote_;
		 open pilotevol_ ;
		 loop
		 fetch  pilotevol_  into numpilotevol_;
		  exit when(pilotevol_%notfound);
		  if(numpilotevol_=nopilote_) then raise  AfectVol_;
		  end if;
		 
		 end loop;
		 close pilotevol_;
		 raise NoExiste_;
		 

		 Exception
		 when AfectVol_ then dbms_output.put_line('Pilote Naffect vol ');
		 when NoExiste_ then  dbms_output.put_line('Pilote Not existe ');
		 when succes_ then dbms_output.put_line(' delete has been succed !!!!!');              
		 
 end;


>>>>

create or replace procedure affichePilote_N(nombre_ in int ) 
as 

			sup_   exception;
			cursor pilotename_ is  select nom from pilote where rownum<=nombre_;
			cursor count_  is select count(*) from pilote ;
			 
			 name_  pilote.nom%type;
			 uplet_  int ;
			 
			 begin
			 open count_ ;
			 fetch count_ into uplet_;
			 close count_;
			 if(nombre_>uplet_) then raise sup_;
			 end if;
			 open pilotename_ ;
			 loop
			 fetch pilotename_ into name_;
			 exit when(pilotename_%notfound);
			    dbms_output.put_line(name_);                                                                
			 end loop;
			 
			 exception 
			 when sup_ then  dbms_output.put_line('le nombre que tu as demandé sup a upletes');
 
 end;
 

 

 ------------------------ Function ------------------------


 create or replace  function nombreMoyenHeureVol(type_ in avion.type%type) RETURN number 
 as 

				dont_existe exception ;
				CURSOR  moyen_nombre_heure is  select type ,avg(nbhvol)  from avion  where  type=type_  group by type;


				avg_  number;
				type__  avion.type%type;

				begin

				open moyen_nombre_heure;
				fetch  moyen_nombre_heure into type__,avg_;
				if(type__!=type_) then raise dont_existe;
				end if ;
				return avg_;
				exception 
				when dont_existe then  dbms_output.put_line('ce type ne existe pas !!!!!!');
end;




-------------------- package ----------------------------------


CREATE OR REPLACE  PACKAGE BODY GEST_PILOTE 
aS

			 FUNCTION  Nbr_Pilote_S() return number IS
			  
					  vn NUMBER ;
					  cursor nbr is 
					  SELECT count(*) from pilote where nom like 'Ah%' group by nom ;
					  BEGIN
					open nbr ;
					
					fetch nbr into vn ;
					
					return vn ;
			  END ;

		 

		 function nombreMoyenHeureVol(avion.type%type) ;   // fonction déja crée

		  PROCEDURE affich_pilote(N IN pilote.Nopilote%type ) 
		   as
				   v_num     pilote.Nopilote%type    ;
				   v_nom     pilote.nom%type     ;
				   v_ville     pilote.adresse%type ;
				   v_salaire pilote.sal%type      ;
				   cursor pilote_ is  
				   SELECT Nopilote,nom,adresse,sal I
				   FROM pilote   where Nopilote=N;
				    BEGIN
				  
				   open pilote_;
				   fetch pilote_ into v_num,v_nom,v_ville,v_salaire ;
				   DBMS_OUTPUT.PUT_LINE('Numéro :  '||v_num||'  Nom :  '||v_nom||'   ville :  '||v_ville||'   salaire :  '||v_salaire);
		   END ;



		  PROCEDURE supprime_pilote(m in pilote.Nopilote%type)  AS
		  BEGIN
				    delete  from pilote
				    where Nopilote=m ;
		  END ;



		  

		  PROCEDURE modifier (
		  N  IN pilote.Nopilote%type ,
		  NOM IN pilote.nom%type ,
		  VILLE IN pilote.adresse%type ,
		  SALAIRE IN pilote.sal%type ) AS
		  BEGIN
		    UPDATE pilote
		   SET Nopilote=N and nom=NOM and adresse=VILLE  and Sal=SALAIRE 
		  where  Nopilote=N   ;
		  END ;




END ;
