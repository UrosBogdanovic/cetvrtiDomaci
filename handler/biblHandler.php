<?php

require_once __DIR__.'/../db.php';
require_once __DIR__.'/../model/bibl.php';

// vrati bibloteke
function vratiBibl()
{
    $BiblList = array();
    $sql = 'SELECT id, name FROM bibl';
    $result = $GLOBALS['db']->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mesto = new Bibl(); 
            $mesto->setId($row['id']);
            $mesto->setName($row['name']);
            $BiblList[] = $mesto;
        }

        return $BiblList;
    } else {
        echo 'Nema biblioteka';
    }
}

// dodaj
if (isset($_POST['add']) && !empty($_POST['add'])) {
    $nazivBibl = trim($_POST['add']);
    $sql = "INSERT INTO bibl (name) VALUES ('$nazivBibl')";
    $db->query($sql) or die($db->error());
}

// obrisi
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM bibl WHERE id=$id";
    $db->query($sql) or die($db->error());
}

// On Edit click return data about that filed
if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $sql = "SELECT id, name FROM bibl WHERE id=$id";
    $result = $db->query($sql) or die($db->error());
    $row = $result->fetch_array();
    $data = array(
          'id' => $row['id'],
          'name' => $row['name'],
        );
    echo json_encode($data);
}

// azuriraj
if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $name = trim($_POST['name']);
    $sql = "UPDATE bibl SET name = '$name' WHERE id = '$id'";
    $db->query($sql) or die($db->error());
}
