<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 24.09.21
 * Time: 10:19
 */

require_once '../system/DatabaseInterface.php';

class Database extends \PDO implements DatabaseInterface {

    public  function  __construct()
    {
        /*
        $cfg = Config::getInstance();
        $dsn = $cfg->get('adapter').':host='.$cfg->get('host').';dbname='.$cfg->get('dbname').';charset='.$cfg->get('charset');
        parent::__construct($dsn, $cfg->get('username'), $cfg->get('password'));
        */

        $cfg = Config::getInstance();
        $dsn = DB_ADAPTER.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
        parent::__construct($dsn, DB_USER, DB_PASSWORD);
    }

    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE $where";
        return $this->exec($query);
    }

    public function get($table): array {
        $query = "SELECT * FROM $table";
        $stmt  = $this->query($query);
        return $stmt->fetchAll();
    }

    public function getWhere($table, $where): array {
        $query = "SELECT * FROM $table WHERE $where";
        $stmt  = $this->query($query);
        return $stmt->fetchAll();
    }

    public function insert($table, array $data) {
        foreach ($data as $key => $value) {
            $cols[] = $key;
            $placeholder[] = ':'.$key;
            $values[] = $value;
        }

        $query = "INSERT INTO $table (".implode(',', $cols).") VALUES ("
            .implode(',', $placeholder).")";
        $stmt = $this->prepare($query);
        foreach ($values as $key => $value) {
            $stmt->bindParam($placeholder[$key], $values[$key]);
        }
        return $stmt->execute();
    }

    public function update($table, array $data, $where) {
        $placehoder =[];
        // UPDATE kunde SET vorname=:vorname,nachname=:nachname WHERE id=123
        if (sizeof($data) > 0) {
            foreach ($data as $key => $value) {
                $placeholder[] = ':' . $key;
                $values[] = $value;
                $set[] = $key . '=:' . $key;
            }
        }
        $query = "UPDATE $table SET ".implode(',', $set)." WHERE $where";
        $stmt  = $this->prepare($query);
        if (sizeof($values) > 0) {
            foreach ($values as $key => $value) {
                $stmt->bindParam($placeholder[$key], $values[$key]);
            }
        }
        return $stmt->execute();
    }

}
