<?php
 
/**
 * SQLite connection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;
 
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        echo __DIR__;
        if ($this->pdo == null) {
            $this->pdo = new PDO('sqlite:'.__DIR__.'/api_db.sqlite');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        }
        return $this->pdo;
    }
}