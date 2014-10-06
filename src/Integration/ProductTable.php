<?php

require_once 'Database.php';

class ProductTable
{
    /** @var \PDO */
    protected $dbh;

    /** @var string */
    protected $table = 'product';

    public function __construct($host = Database::HOSTNAME, $data = Database::DATABASE, $user = Database::USERNAME, $pass = Database::PASSWORD)
    {
        $this->dbh = new PDO("mysql:host={$host};dbname={$data}", $user, $pass);
    }

    public function readAll()
    {
        $statement = $this->dbh->prepare("
            SELECT *
            FROM `product`
        ");

        $this->execute($statement);

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $name
     * @param float $price
     * @return \PDOStatement
     */
    public function insert($name, $price)
    {
        $statement = $this->dbh->prepare("
            INSERT INTO `product` (name, price)
            VALUES (?,?)
        ");
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $price);

        return $this->execute($statement);
    }

    public function delete($id)
    {
        $statement = $this->dbh->prepare("
            DELETE FROM `product`
            WHERE id = ?
        ");
        $statement->bindValue(1, $id);

        return $this->execute($statement);
    }

    public function readById($id)
    {
        $statement = $this->dbh->prepare("
            SELECT *
            FROM `product`
            WHERE id = ?"
        );
        $statement->bindParam(1, $id);

        $this->execute($statement);

        return $statement->fetchObject();
    }

    public function update($id, $name, $price)
    {
        $statement = $this->dbh->prepare("
            UPDATE `product`
            SET
                `name` = ?,
                `price` = ?
            WHERE `id` = ?"
        );
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $price);
        $statement->bindParam(3, $id);

        return $this->execute($statement);
    }

    /**
     * @param \PDOStatement $statement
     * @return \PDOStatement
     * @throws Exception
     */
    protected function execute($statement)
    {
        if (!$statement->execute()) {
            throw new \PDOException("Execute failed: " . $statement->errorInfo()[2]);
        }

        return $statement;
    }
} 