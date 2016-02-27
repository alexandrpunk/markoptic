delimiter //
CREATE TRIGGER trigger_beneficiario after insert
    ON markoptic.beneficiario_solicitud FOR EACH ROW
    BEGIN
    set @new_id = NEW.id;
	INSERT INTO cms.cmscouch_pages(template_id,page_title)
    VALUES(7, (SELECT CONCAT_WS(' ',b.nombre, b.apellido) as nombre
				FROM markoptic.beneficiario_solicitud b
				WHERE b.id = @new_id));
                
	set @id = LAST_INSERT_ID();
    
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
        VALUES(@id,7,(SELECT b.edad FROM markoptic.beneficiario_solicitud b
						WHERE b.id = @new_id),
					 (SELECT b.edad FROM markoptic.beneficiario_solicitud b
						WHERE b.id = @new_id));
    
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,20,(SELECT l.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.localidades l on b.ciudad = l.id
                    WHERE b.id = @new_id),
				  (SELECT l.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.localidades l on b.ciudad = l.id
                    WHERE b.id = @new_id));    
                    
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,21,(SELECT r.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.regiones r on b.estado = r.id
                    WHERE b.id = @new_id),
				  (SELECT r.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.regiones r on b.estado = r.id
                    WHERE b.id = @new_id));
                    
	INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,22,(SELECT p.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.paises p on b.pais = p.id
                    WHERE b.id = @new_id),
				  (SELECT p.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.paises p on b.pais = p.id
                    WHERE b.id = @new_id)); 
                    
	INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,19,(SELECT s.peticion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				   (SELECT s.peticion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
	
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,23,(SELECT s.descripcion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				   (SELECT s.descripcion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
    
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,9,(SELECT s.porque
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				 (SELECT s.porque
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));    

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