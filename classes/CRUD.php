<?php 

namespace App;
use Src\Database;

require_once dirname(__DIR__) . './vendor/autoload.php'; 

class CRUD {
    private static $pdo;

    public static function setConnection($pdo) {
        self::$pdo = $pdo;
    }

    public static function insert($table, $data) {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = self::$pdo->prepare($sql);

        return $stmt->execute(array_values($data));
    }

    public static function update($table, $data, $where, $params = []) {
        $setClause = implode(',', array_map(fn($key) => "$key = ?", array_keys($data)));

        $sql = "UPDATE $table SET $setClause WHERE $where";
        $stmt = self::$pdo->prepare($sql);

        return $stmt->execute(array_merge(array_values($data), $params));
    }

    public static function delete($table, $where, $params = []) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = self::$pdo->prepare($sql);

        return $stmt->execute($params);
    }

    public static function select($table, $columns = "*", $where = null, $params = []) {
        $sql = "SELECT $columns FROM $table";
        if ($where) {
            $sql .= " WHERE $where";
        }

        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

$conx = Database::getInstance();
$pdo = $conx->getConnection();
CRUD::setConnection($pdo);





?>