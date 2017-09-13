SET SESSION group_concat_max_len = 1000000;
insert into cmscouch_fulltext
SELECT d.page_id, p.page_title title, GROUP_CONCAT(d.search_value SEPARATOR ' ') content
FROM cmscouch_data_text d
join cmscouch_pages p on d.page_id = p.id
where p.template_id = 7 group by d.page_id

-- select * from cmscouch_data_text;

'940', 'Yaritzi Garcia', '12 A la edad de 5 meses tuvo un accidente automovilístico y como consecuencia le quedaron diferentes secuelas. Es una niña totalmente dependiente, tiene discapacidad múltiple, y pues su movilidad es poca, y requiere de aditamentos que le ayuden a tener mejor postura y así tener calidad de vida plena, es por eso que recurro a ustedes para que pudieran donarle ese colchón que seria de gran beneficio para ella, muchas gracias. Colchon Antiescaras Lagunillas Michoacán de Ocampo México '
