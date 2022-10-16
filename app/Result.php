<?php
// classe che descrive l'entità department salvata sul DB

include_once __DIR__ . '/DB.php';

class Result
{

    function __construct($id, $nickname, $points)
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->points = $points;
    }

    static public function all()
    {
        $conn = DB::getConn();
        $sql = "SELECT * FROM `records` ORDER BY `points` ASC";
        $result = $conn->query($sql);
        $conn->close();
        $res = Result::resultToArray($result);
        return $res;
    }

    static public function records()
    {
        $conn = DB::getConn();
        $sql = "SELECT * FROM `records` ORDER BY `points` DESC";
        $result = $conn->query($sql);
        $conn->close();
        $res = Result::resultToArray($result);
        return $res;
    }

    // vorrei come risultato un array in cui ogni elemento è un istanza di department
    static public function resultToArray($result)
    {
        if ($result && $result->num_rows > 0) {

            $items = [];

            while ($row = $result->fetch_assoc()) {
                $el = new Result(
                    $row['id'],
                    $row['nickname'],
                    $row['points'],
                );
                $items[] = $el;
            }

            return $items;
        } else {
            return [];
        }
    }

    public function add()
    {
        $conn = DB::getConn();
        $sql = "INSERT INTO `records` (nickname, points)  VALUES ('{$this->nickname}', {$this->points})";
        $conn->query($sql);
        $conn->close();
        // var_dump($this->points);
    }

    public function remove()
    {
        $conn = DB::getConn();
        $sql = "DELETE FROM `records` WHERE `id` = {$this->id}";
        $conn->query($sql);
        $conn->close();
        // var_dump($this->points);
    }
}
