<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 24.09.21
 * Time: 10:18
 */
interface DatabaseInterface {
    /**
     * Trägt einen Datensatz ein
     * @param string $table Tabelle
     * @param array $data Datenarray, die Schlüssel sind die Spaltennamen
     */
    public function insert($table, array $data);
    /**
     * Löscht einen oder mehrere Datensätze
     * @param string $table Tabelle
     * @param string $where Where-Klausel
     */
    public function delete($table, $where);
    /**
     * Aktualisiert einen Datensatz
     * @param string $table Tabelle
     * @param array $data Datenarray, die Schlüssel sind die Spaltennamen
     * @param string $where Where-Klausel
     */
    public function update($table, array $data, $where);
    /**
     * Liefert alle Datensätze einer Tabelle zurück (Hinweis: Methode fetchAll() nutzen)
     * @param string $table Tabelle
     * @return array Assoziatives Result-Array
     */
    public function get($table);
    /**
     * Liefert bestimmte Datensätze einer Tabelle zurück (Hinweis: Methode fetchAll() nutzen)
     * @param string $table Tabelle
     * @param string $where Where-Klausel
     * @return array Assoziatives Result-Array
     */
    public function getWhere($table, $where);
}
