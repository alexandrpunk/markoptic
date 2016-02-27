insert into cmscouch_pages (template_id,page_title) values(7,'juan perez');
SET @id = (select last_insert_id());
insert into cmscouch_data_text (page_id,field_id,value,search_value) values(@id,7,'testing1','testing');
insert into cmscouch_data_text (page_id,field_id,value,search_value) values(@id,8,'testing2','testing');
insert into cmscouch_data_text (page_id,field_id,value,search_value) values(@id,9,'testing3','testing');
insert into cmscouch_data_text (page_id,field_id,value,search_value) values(@id,10,null,null);
insert into cmscouch_data_text (page_id,field_id,value,search_value) values(@id,11,null,null);
insert into cmscouch_data_text (page_id,field_id,value,search_value) values(@id,19,'testing4','testing');
select * from cmscouch_data_text where page_id =@id;

select * from historias

