# CRUD-MYSQL-API
Very easy to use PDO MYSQL API. Just Include in PHP file and get it working.

## INSTALATION 
#### Step 1:
```bash
git clone https://github.com/arhex-labs/PDO-MYSQL-API
```
#### Step 2:
Copy the files in core directory of project.
Done.

## USAGE
### 1. Establish Connection
Establish a connection between server and database.
**Example:**
```php
$con = new DB('127.0.0.1', 'myDB', 'root', 'toor');
```
**Syntax:**
```php
$con = new DB('DATABASE_HOST', 'DATABASE_NAME', 'DATABASE_USERNAME', 'DATABASE_PASSWORD');
```
### 2. Insert Row
Insert a row in database table.
**Example:**
```php
$data = ['ARHEX', 'LABS', 'arhexlabs@gmail.com'];
$con->insert_row('users', $data); # List of all fields to insert.
```
``````Note: ID AUTOINCREMENT FIELD IS AUTOMATICALLY ADDED.``````
**Syntax:**
```php
$ARRAY_OF_DATA = [FIELD_1, FIELD_2, ....];
$con->insert_row([TABLE_NAME], [ARRAY_OF_DATA]); # List of all fields to insert.
```

### 3. Delete Row
Delete a row in database table by using **field name** and **key**.
**Example:**
```php
$con->delete_row('users', 'users_id', '3');
```
**Syntax:**
```php
$con->delete_row([TABLE_NAME], [FIELD_NAME], [KEY]);
```

### 4. Update Row
Update a row in database table using **key** to select row and **field name** to update data.
**Example:**
```php
$con->update_row('users', 'users_email', 'user@domin.com', 'users_id', '1');
```
**Syntax:**
```php
$con->update_row([TABLE_NAME], [FIELD_NAME], [DATA], [KEY], [VALUE]);
```

### 5. Get Field Value
Return field value from selected database table using **key** to select row and **field name** to select field.
**Example:**
```php
$con->get_field_value('users', 'users_id', '3', 'users_email');
```
**Snytax:**
```php
$con->get_field_value([TABLE_NAME], [KEY], [VALUE], [FIELD_NAME]);
```

### 6. Get Last Id
Return the last row in database table sorted by primary integer keys.
**Example:**
```php
$con->get_last_id('users', users_id);
```
**Syntax:**
```php
$con->get_last_id([TABLE_NAME], [NAME_OF_PRIMARY_KEY_FIELD]);
```
