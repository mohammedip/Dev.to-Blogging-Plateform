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

// statistique ------------------------------------

public static function getTopArticles($limit = 3)
{
    try {
        $sql = "SELECT a.*, u.username
                FROM articles a
                LEFT JOIN users u ON a.author_id = u.id
                ORDER BY a.views DESC, a.created_at DESC
                LIMIT " . (int)$limit;

        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}
public static function getTopUsers($limit = 3) {
    try {
        $sql = "SELECT u.*, COUNT(a.id) as article_count, SUM(a.views) as total_views
                FROM users u
                LEFT JOIN articles a ON u.id = a.author_id
                WHERE u.role in ('auteur','admin')
                GROUP BY u.id
                ORDER BY total_views DESC, article_count DESC
                LIMIT " . (int)$limit;

        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}
public static function getCategoryStats(){
    $sql = "SELECT COUNT(*) as article_count, categories.name as category_name FROM articles JOIN categories ON articles.category_id = categories.id GROUP BY category_name;";
    $stmt = self::$pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);
    return $result;
} 
}

$conx = Database::getInstance();
$pdo = $conx->getConnection();
CRUD::setConnection($pdo);





?>