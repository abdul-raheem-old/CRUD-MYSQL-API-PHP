# PDO-MYSQL-API
Very easy to use PDO MYSQL API. Just Include in PHP file and get it working.

## INSTALATION 
#### Step 1:
```bash
git clone [URL]
```
#### Step 2:
Copy the files in core directory of project.
Done...

## USAGE
### 1. Establish Connection
```php
$con = new DB('DATABASE_HOST', 'DATABASE_NAME', 'DATABASE_USERNAME', 'DATABASE_PASSWORD');
```
Example:
```php
$con = new DB('127.0.0.1', 'myDB', 'root', 'toor');
```
### 2. Insert Row
```php
$ARRAY_OF_DATA = [FIELD_1, FIELD_2, ....];
$con->insert_row([TABLE_NAME], [ARRAY_OF_DATA]); # List of all fields to insert.
```
Example:
```php
$data = ['ARHEX', 'LABS', 'arhexlabs@gmail.com'];
$con->insert_row('users', $data); # List of all fields to insert.
```
``````Note: ID AUTOINCREMENT FIELD IS AUTOMATICALLY ADDED.``````

### 3. Delete Row
```php
$con->delete_row([TABLE_NAME], [FIELD_NAME], [KEY]);
```
Example:
```php
$con->delete_row('users', 'users_id', '3');
```

### 4. Update Row
```php
$con->update_row([TABLE_NAME], [FIELD_NAME], [DATA], [KEY], [VALUE]);
```
Example:
```php
$con->update_row('users', 'users_email', 'user@domin.com', 'users_id', '1');
```

### 5. Get Field Value
```php
$con->get_field_value([TABLE_NAME], [KEY], [VALUE], [FIELD_NAME]);
```
Example:
```php
$con->get_field_value('users', 'users_id', '3', 'users_email');
```

### 6. Get Last Id
```php
$con->get_last_id([TABLE_NAME], [NAME_OF_PRIMARY_KEY_FIELD]);
```
Example:
```php
$con->get_last_id('users', users_id);
```
