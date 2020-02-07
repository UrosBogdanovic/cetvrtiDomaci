<?php

require_once __DIR__.'/../db.php';
require_once __DIR__.'/../model/knjiga.php';

// Vrati sve knjige
function getAllKnjiga()
{
    $knjigaList = array();
    $sql = 'SELECT knjiga.id AS knjigaId, knjiga.name AS knjigaName, bibl.id AS rmId, bibl.name AS biblName FROM knjiga JOIN bibl ON (knjiga.rmId = bibl.id)';
    $result = $GLOBALS['db']->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $knjiga = new Knjiga();
            $knjiga->setId($row['knjigaId']);
            $knjiga->setName($row['knjigaName']);
            $knjiga->setRmId($row['rmId']);
            $knjiga->setBiblName($row['biblName']);
            $knjigaList[] = $knjiga;
        }

        return $knjigaList;
    } else {
        echo 'Nema knjiga';
    }
}

// Add
if (isset($_POST['add']) && !empty($_POST['add'])) {
    $knjigaName = trim($_POST['add']);
    $rmId = $_POST['rmId'];
    $sql = "INSERT INTO knjiga (name, rmId) VALUES ('$knjigaName', '$rmId')";
    $db->query($sql) or die($db->error());
}

// Delete
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM knjiga WHERE id=$id";
    $db->query($sql) or die($db->error());
}

// On Edit click return data about that filed
if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $sql = "SELECT id, name, rmId FROM knjiga WHERE id=$id";
    $result = $db->query($sql) or die($db->error());
    $row = $result->fetch_array();
    $data = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'rmId' => $row['rmId'],
      );
    echo json_encode($data);
}

// Update
if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $name = trim($_POST['name']);
    $rmId = $_POST['rmId'];
    $sql = "UPDATE knjiga SET name = '$name', rmId = '$rmId' WHERE id = '$id'";
    $db->query($sql) or die($db->error());
}
