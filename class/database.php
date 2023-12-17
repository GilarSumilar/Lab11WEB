<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->db_name
        );
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db_name = "latihan1";
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $rows = array();

            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
        } else {
            // Tidak ada hasil, kembalikan null atau array kosong sesuai kebutuhan.
            return null;
        }
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'{$val}'";
            }
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = [];
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "$key='{$val}'";
            }
            $update_value = implode(",", $update_value);
        }

        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $filter)
    {
        $sql = "DELETE FROM $table WHERE $filter";

        $delete = $this->conn->query($sql);
        if ($delete == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getbyid($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id_barang = $id";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc();
    }
}
