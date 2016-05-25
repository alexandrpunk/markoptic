SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE Apadrinamientos; 
TRUNCATE beneficiario_solicitud;
TRUNCATE Donadores;
TRUNCATE Donativos;
TRUNCATE solicitud;
TRUNCATE tutor_beneficiario;
SET FOREIGN_KEY_CHECKS = 1;
delete FROM cms.cmscouch_pages where id > 171;
delete FROM cms.cmscouch_data_text where page_id > 171;
ALTER TABLE cms.cmscouch_pages AUTO_INCREMENT = 172;

#171 pagina de inicio de las historias