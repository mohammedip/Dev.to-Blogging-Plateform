<?php 

namespace App;
use Src\Database;

require '../vendor/autoload.php'; 

class CRUD {

public function insert($table, $data) {
    $columns = implode(',', array_keys($data));
    $placeholders = implode(',', array_fill(0, count($data), '?'));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute(array_values($data));
}

public function update($table, $data, $where, $params = []) {
    $setClause = implode(',', array_map(fn($key) => "$key = ?", array_keys($data)));

    $sql = "UPDATE $table SET $setClause WHERE $where";
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute(array_merge(array_values($data), $params));
}

public function delete($table, $where, $params = []) {
    $sql = "DELETE FROM $table WHERE $where";
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute($params);
}

public function select($table, $columns = "*", $where = null, $params = []) {
    $sql = "SELECT $columns FROM $table";
    if ($where) {
        $sql .= " WHERE $where";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function close() {
    $this->pdo = null;
}

}
$conx = Database::getInstance();
$pdo = $conx->getConnection();




?>