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
