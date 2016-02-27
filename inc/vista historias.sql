
CREATE VIEW historias AS 
SELECT b.nombre,
	   b.apellido,
       b.sexo,
       b.edad,
       b.direccion,
       b.colonia,
       b.cp,
       b.telefono,
       b.email,
       s.peticion,
       s.descripcion,
       s.porque,
       l.nombre as ciudad,
       r.nombre as estado,
       p.nombre as pais
FROM beneficiario_solicitud b
	join solicitud s on b.id_solicitud = s.id
	join localidades l on b.ciudad = l.id
	join regiones r on b.estado = r.id
	join paises p on b.pais = p.id

