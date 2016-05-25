delimiter //
CREATE TRIGGER trigger_beneficiario after insert
    ON gallbo_markoptic_b.beneficiario_solicitud FOR EACH ROW
    BEGIN
    #se guardan los id's de la nueva solicitud
    set @new_id = NEW.id;
    set @new_sol = NEW.id_solicitud;
    
    #se crea la pagina nueva en el sistema cms
	INSERT INTO gallbo_cms_b.cmscouch_pages(template_id,page_title)
    VALUES(7, (SELECT lower(CONCAT_WS(' ',b.nombre, b.apellido)) as nombre
				FROM gallbo_markoptic_b.beneficiario_solicitud b
				WHERE b.id = @new_id));
                
    #se obtiene el id de la neva pagina            
	set @id = LAST_INSERT_ID();
    
    #se rellena el campo de edad
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
        VALUES(@id,7,(SELECT b.edad FROM gallbo_markoptic_b.beneficiario_solicitud b
						WHERE b.id = @new_id),
					 (SELECT b.edad FROM gallbo_markoptic_b.beneficiario_solicitud b
						WHERE b.id = @new_id));
    
    #se rellena el campo de ciudad
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,20,(SELECT l.nombre
					FROM gallbo_markoptic_b.beneficiario_solicitud b
					join gallbo_markoptic_b.localidades l on b.ciudad = l.id
                    WHERE b.id = @new_id),
				  (SELECT l.nombre
					FROM gallbo_markoptic_b.beneficiario_solicitud b
					join gallbo_markoptic_b.localidades l on b.ciudad = l.id
                    WHERE b.id = @new_id));  
                    
    #se rellena el campo de estado                
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,21,(SELECT r.nombre
					FROM gallbo_markoptic_b.beneficiario_solicitud b
					join gallbo_markoptic_b.regiones r on b.estado = r.id
                    WHERE b.id = @new_id),
				  (SELECT r.nombre
					FROM gallbo_markoptic_b.beneficiario_solicitud b
					join gallbo_markoptic_b.regiones r on b.estado = r.id
                    WHERE b.id = @new_id));
    
    #se rellena el campo de pais
	INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,22,(SELECT p.nombre
					FROM gallbo_markoptic_b.beneficiario_solicitud b
					join gallbo_markoptic_b.paises p on b.pais = p.id
                    WHERE b.id = @new_id),
				  (SELECT p.nombre
					FROM gallbo_markoptic_b.beneficiario_solicitud b
					join gallbo_markoptic_b.paises p on b.pais = p.id
                    WHERE b.id = @new_id)); 
    
    #se rellena el campo de dispositivo
	INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,19,(SELECT s.peticion
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				   (SELECT s.peticion
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
	
    #se rellena el campo de descripcion del dispositivo
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,23,(SELECT s.descripcion
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				   (SELECT s.descripcion
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
    
    #se rellena el campo de descripcion de la necesidad
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,9,(SELECT lower(s.porque)
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				 (SELECT lower(s.porque)
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
	
    #se rellena el campo de fotografia
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,10,(SELECT CONCAT(':historias/',s.folio,'.jpg')
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				  (SELECT CONCAT(':historias/',s.folio,'.jpg')
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
    
    #se rellena el campo de la miniatura de la fotografia
    INSERT INTO gallbo_cms_b.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,11,(SELECT CONCAT(':historias/',s.folio,'-170x170.jpg')
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				  (SELECT CONCAT(':historias/',s.folio,'-170x170.jpg')
					FROM gallbo_markoptic_b.beneficiario_solicitud b
                    join gallbo_markoptic_b.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));

                    
	#se guarda el id de la pagina que le toco al solicitante
	UPDATE gallbo_markoptic_b.solicitud s SET s.id_page = @id WHERE s.id = @new_sol;


END;//
delimiter ;
    
    /*SELECT CONCAT_WS(' ',b.nombre, b.apellido) as nombre,
		   b.edad,
           CONCAT_WS(', ',l.nombre,r.nombre,p.nombre) as ubicacion,
           s.porque,
           CONCAT_WS(' ',s.peticion,s.descripcion) as dispositivo
	FROM markoptic.beneficiario_solicitud b
		join markoptic.solicitud s on b.id_solicitud = s.id
		join markoptic.localidades l on b.ciudad = l.id
		join markoptic.regiones r on b.estado = r.id
		join markoptic.paises p on b.pais = p.id*/
	
    
#drop TRIGGER trigger_beneficiario