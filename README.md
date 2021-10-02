# PDO-MYSQL-API
Very easy to use PDO MYSQL API. Just Include in PHP file and get it working.

## INSTALATION 
#### Step 1:
```bash
git clone [URL]
```
#### Step 2.
Copy the files in core directory of project.
Done...

## USAGE
### Establish Connection
```php
$con = new DB('DATABASE_HOST', 'DATABASE_NAME', 'DATABASE_USERNAME', 'DATABASE_PASSWORD');
```
Example:
```php
$con = new DB('127.0.0.1', 'myDB', 'root', 'toor');
```
### Insert Row
```php
$ARRAY_OF_DATA = [FIELD_1, FIELD_2, ....];
$con->insert_row([TABLE_NAME], [ARRAY_OF_DATA]); # List of all fields to insert.
```
Example:
```php
$data = ['ARHEX', 'LABS', 'arhexlabs@gmail.com'];
$con->insert_row('users', $data); # List of all fields to insert.
```
``Note: ID AUTOINCREMENT FIELD IS AUTOMATICALLY ADDED.``
