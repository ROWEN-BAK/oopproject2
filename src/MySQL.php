<?php

namespace Oop2;

use Exception;
use PDO;
use PDOException;

class MySQL implements database
{

    private PDO $connection;

    public function connect(string $servername, string $database, string $username, string $password)
    {
        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
        } catch(PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }

    public function insert(string $table, array $params = [])
    {
        if(!empty($params) && is_array($params)) {
            $columns = implode(", ", array_keys($params));
            $values = ":" . implode(", :", array_keys($params));
            $query = "INSERT INTO $table ($columns) VALUES ($values)";
            $insert = $this->connection->prepare($query);


            foreach ($params as $key => $value) {
                $insert->bindValue(":$key", $value);
            }

            $insert->execute();
        }
    }

    public function update(string $table, array $params = [], array $conditions = [])
    {
        try {
            if (!empty($table) && !empty($params) && !empty($conditions))
            {
                $query = "UPDATE $table SET ";
                $query .= implode( ", ", array_map( function ($column){
                    return "$column = :$column";
                }, array_keys($params)));

                $query .= " WHERE ";
                $query .= implode( ", ", array_map( function ($column){
                    return "$column = :$column";
                }, array_keys($conditions)));


                $query = $this->connection->prepare($query);

                foreach ($params as $key => $value) {
                    $query->bindValue(":$key", $value);
                }

                foreach ($conditions as $key => $value) {
                    $query->bindValue(':'.$key, $value);
                }
                $query->execute();
            } else {
                echo "foutmelding";
            }
        } catch(PDOException $error) {
            throw new Exception($error->getMessage());
        }


    }

    public function delete(string $table, array $conditions = [])
    {
        if(!empty($conditions)) {
            try {
                $query = "DELETE FROM $table WHERE ";
                $query .= implode( ", ", array_map( function ($column){
                    return "$column = :$column";
                }, array_keys($conditions)));

                $query = $this->connection->prepare($query);

                foreach ($conditions as $key => $value) {
                    $query->bindValue("$key", $value);
                }
                $query->execute();
            } catch (PDOException $error) {
                throw new Exception($error->getMessage());
            }
        } else {
            echo "Error";
        }
    }

    public function select(array $columns, array $params = [])
    {
        try {
            $query = "SELECT ";
            $columnNameArray = [];
            foreach ($columns as $tableName => $columnArray) {
                if (is_array($columnArray)) {
                    foreach ($columnArray as $columnName) {
                        $columnNameArray[] = "$tableName.$columnName";
                    }
                }
            }
            $query .= implode(", ", $columnNameArray);
            $query .= " FROM ";
            $query .= implode(", ", array_keys($columns));
            if (!empty($params)) {
                $query .= " WHERE ";
                $conditions = [];
                foreach ($params as $key => $value) {
                    $tableAndColumn = explode(".", $key, 2);
                    if (count($tableAndColumn) == 2) {
                        $table = $tableAndColumn[0];
                        $column = $tableAndColumn[1];
                    } else {
                        $table = array_keys($columns)[0];
                        $column = $key;
                    }



                    if (is_array($value)) {
                        // between
                        $conditions[] = "$table.column BETWEEN '" . $value[0] . "'AND '" . $value[1] . "'";
                    } elseif (strpos($key, "LIKE") !== false) {
                        // like
                        $conditions[] = "$table.$column '$value'";
                    } elseif (strpos($value, "=") !== false) {
                        // =
                        $conditions[] = "$table.$column $value";
                    } else {
                        $conditions[] = "$table.$column = '$value'";
                    }
                }
                $query .= implode(" AND ", $conditions);
            }
            $result = $this->connection->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }
    }
}