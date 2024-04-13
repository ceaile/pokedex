<?php





//metodos para hacer queries aquí????

//añadir user a bbdd

//iniciar sesion del user

//


/*

class Bbdd{

    private function __construct() {
        //??? no se de momento
    }


    public static function addPokemon(){
        
    
    }

}
methods que me ha dicho copilot
1. **`PDO::exec`**:
   - Executes an SQL statement and returns the number of affected rows.
   - Useful for executing non-query statements (e.g., `INSERT`, `UPDATE`, `DELETE`).
   - Example:
     ```php
     $pdo = new PDO($dsn, $username, $password);
     $affectedRows = $pdo->exec("DELETE FROM users WHERE id = 42");
     ```

2. **`PDO::getAttribute`**:
   - Retrieves a database connection attribute.
   - Allows you to fetch information about the database connection (e.g., server version, client version).
   - Example:
     ```php
     $pdo = new PDO($dsn, $username, $password);
     $serverVersion = $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
     ```

3. **`PDO::getAvailableDrivers`**:
   - Returns an array of available PDO drivers.
   - Useful for checking which database drivers are supported by your PHP installation.
   - Example:
     ```php
     $availableDrivers = PDO::getAvailableDrivers();
     print_r($availableDrivers);
     ```

4. **`PDO::inTransaction`**:
   - Checks if the current connection is inside a transaction.
   - Helpful for managing transactions (begin, commit, rollback).
   - Example:
     ```php
     $pdo = new PDO($dsn, $username, $password);
     if ($pdo->inTransaction()) {
         // Handle transaction logic
     }
     ```

5. **`PDO::lastInsertId`**:
   - Returns the ID of the last inserted row or sequence value.
   - Useful after an `INSERT` operation to retrieve the auto-generated primary key.
   - Example:
     ```php
     $pdo = new PDO($dsn, $username, $password);
     $newUserId = $pdo->lastInsertId();
     ```
*/