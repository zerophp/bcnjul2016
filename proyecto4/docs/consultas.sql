SELECT * FROM users;

SELECT iduser, name FROM users;

SELECT * FROM users WHERE name LIKE "%u%";

SELECT * FROM users ORDER BY name ASC;

SELECT * FROM users ORDER BY name DESC;

SELECT * FROM users ORDER BY password DESC, photo DESC;
SELECT * FROM users ORDER BY genders_idgender ASC, cities_idcity DESC;

SELECT genders.gender, users.name FROM users, genders 
WHERE users.genders_idgender = genders.idgender AND 
genders.gender = "Mujer";

SELECT genders.gender, users.name 
FROM users
INNER JOIN genders ON genders.idgender = users.genders_idgender
WHERE genders.gender = "Mujer";



SELECT genders.gender, users.name 
FROM users
INNER JOIN genders ON genders.idgender = users.genders_idgender;

SELECT genders.gender, users.name 
FROM users RIGHT JOIN genders 
ON genders.idgender = users.genders_idgender;

SELECT genders.gender, users.name 
FROM genders LEFT JOIN users 
ON genders.idgender = users.genders_idgender;

SELECT genders.gender, users.name 
FROM users LEFT JOIN genders 
ON genders.idgender = users.genders_idgender;

SELECT count(name)
FROM users 
JOIN genders ON genders.idgender = users.genders_idgender
JOIN users_has_languages ON users_has_languages.users_iduser = users.iduser
JOIN languages ON languages.idlanguage = users_has_languages.languages_idlanguage
WHERE genders.gender = "Mujer" AND languages.language="English";

/*
SELECT count(name)
FROM users as m
JOIN genders as k ON k.idgender = m.genders_idgender
JOIN users_has_languages as j ON j.users_iduser = m.iduser
JOIN languages as d ON d.idlanguage = j.languages_idlanguage
WHERE k.gender = "Mujer" AND d.language="English";
*/

SELECT iduser, name, email , gender, city, 
	group_concat(distinct transport), 
    group_concat(distinct language)
FROM users 
JOIN genders ON genders.idgender = users.genders_idgender
JOIN cities ON cities.idcity = users.cities_idcity
JOIN users_has_languages ON users_has_languages.users_iduser = users.iduser
JOIN languages ON languages.idlanguage = users_has_languages.languages_idlanguage
JOIN users_has_transports ON users_has_transports.users_iduser = users.iduser
JOIN transports ON transports.idtransport = users_has_transports.transports_idtransport
GROUP BY name;

INSERT INTO transports (idtransport,transport) VALUES (null,'avion');
INSERT INTO transports (transport) VALUES ('submarino');

 /* UPDATE transports SET transport = 'avión';*/

UPDATE transports SET transport = 'avión' WHERE idtransport = 4;

UPDATE transports SET transport = 'avión' WHERE idtransport IN(4,5);


DELETE FROM transports WHERE idtransport = 5;








