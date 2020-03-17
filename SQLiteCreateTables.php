<?php
 
/**
 * SQLite Create Table Demo
 */
class SQLiteCreateTables {
 
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;
 
    /**
     * connect to the SQLite database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
 
    /**
     * create tables 
     * CREATE TABLE IF NOT EXISTS `products` (
     */
    public function createTables() {
        $commands = ['CREATE TABLE IF NOT EXISTS categories (
                        id   INTEGER PRIMARY KEY AUTOINCREMENT,
                        name TEXT NOT NULL,
                        description TEXT NOT NULL, 
                        created TEXT NOT NULL
                      )' ,
            'CREATE TABLE IF NOT EXISTS products (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name  VARCHAR (255) NOT NULL,
                    description  TEXT NOT NULL,
                    price REAL NOT NULL,
                    category_id INTEGER NOT NULL,
                    created TEXT,
                    project_id VARCHAR (255),
                    FOREIGN KEY (category_id)
                    REFERENCES categories(id) )' ,
                    'INSERT INTO categories ( name, description, created) VALUES
                    ( "Fashion", "Category for anything related to fashion.", "2014-06-01 00:35:07"),
                    ( "Electronics", "Gadgets, drones and more.", "2014-06-01 00:35:07"),
                    ( "Motors", "Motor sports and more", "2014-06-01 00:35:07"),
                    ( "Movies", "Movie products.", "0000-00-00 00:00:00"),
                    ( "Books", "Kindle books, audio books and more.", "0000-00-00 00:00:00"),
                    ( "Sports", "Drop into new winter gear.", "2016-01-09 02:24:24")',
                    'INSERT INTO products ( name, description, price, category_id, created) VALUES
                    ( "LG P880 4X HD", "My first awesome phone!", "336", 3, "2014-06-01 01:12:26"),
                    ( "Google Nexus 4", "The most awesome phone of 2013!", "299", 2, "2014-06-01 01:12:26"),
                    ( "Samsung Galaxy S4", "How about no?", "600", 3, "2014-06-01 01:12:26"),
                    ( "Bench Shirt", "The best shirt!", "29", 1, "2014-06-01 01:12:26"),
                    ( "Lenovo Laptop", "My business partner.", "399", 2, "2014-06-01 01:13:45"),
                    ( "Samsung Galaxy Tab 10.1", "Good tablet.", "259", 2, "2014-06-01 01:14:13"),
                    ( "Spalding Watch", "My sports watch.", "199", 1, "2014-06-01 01:18:36"),
                    ( "Sony Smart Watch", "The coolest smart watch!", "300", 2, "2014-06-06 17:10:01"),
                    ( "Huawei Y300", "For testing purposes.", "100", 2, "2014-06-06 17:11:04"),
                    ( "Abercrombie Lake Arnold Shirt", "Perfect as gift!", "60", 1, "2014-06-06 17:12:21"),
                    ( "Abercrombie Allen Brook Shirt", "Cool red shirt!", "70", 1, "2014-06-06 17:12:59"),
                    ( "Another product", "Awesome product!", "555", 2, "2014-11-22 19:07:34"),
                    ( "Wallet", "You can absolutely use this one!", "799", 6, "2014-12-04 21:12:03"),
                    ( "Amanda Waller Shirt", "New awesome shirt!", "333", 1, "2014-12-13 00:52:54"),
                    ( "Nike Shoes for Men", "Nike Shoes", "12999", 3, "2015-12-12 06:47:08"),
                    ( "Bristol Shoes", "Awesome shoes.", "999", 5, "2016-01-08 06:36:37"),
                    ( "Rolex Watch", "Luxury watch.", "25000", 1, "2016-01-11 15:46:02")'
                ];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }
 
    /**
     * get the table list in the database
     */
    public function getTableList() {
 
        $stmt = $this->pdo->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }
 
        return $tables;
    }
 
}
?>