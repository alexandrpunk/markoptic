SET SESSION group_concat_max_len = 1000000;
insert into cmscouch_fulltext
SELECT d.page_id, p.page_title title, GROUP_CONCAT(d.search_value SEPARATOR ' ') content
FROM cmscouch_data_text d
join cmscouch_pages p on d.page_id = p.id
where p.template_id = 7 group by d.page_id

-- select * from cmscouch_data_text;