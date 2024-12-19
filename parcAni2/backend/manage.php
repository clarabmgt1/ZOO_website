<?php
session_start();
require_once '../php/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header('Location: ../html/login.html');
    exit;
}

// Gestion des actions selon l'onglet
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $section = $_POST['section'];
    if ($section == 'enclosures') {
        $action = $_POST['action'];
        if ($action == 'add') {
            $name = $_POST['name'];
            $biome_id = $_POST['biome_id'];
            $db->prepare("INSERT INTO enclosures (name, biome_id) VALUES (?, ?)")->execute([$name, $biome_id]);
        } elseif ($action == 'update') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $status = $_POST['status'];
            $db->prepare("UPDATE enclosures SET name = ?, status = ? WHERE id = ?")->execute([$name, $status, $id]);
        } elseif ($action == 'delete') {
            $id = $_POST['id'];
            $db->prepare("DELETE FROM enclosures WHERE id = ?")->execute([$id]);
        }
    } elseif ($section == 'biomes') {
        $action = $_POST['action'];
        if ($action == 'add') {
            $name = $_POST['name'];
            $color = $_POST['color'];
            $db->prepare("INSERT INTO biomes (name, color) VALUES (?, ?)")->execute([$name, $color]);
        } elseif ($action == 'delete') {
            $id = $_POST['id'];
            $db->prepare("DELETE FROM biomes WHERE id = ?")->execute([$id]);
        }
    } elseif ($section == 'tickets') {
        $type = $_POST['type'];
        $price = $_POST['price'];
        $db->prepare("INSERT INTO tickets (type, price) VALUES (?, ?)")->execute([$type, $price]);
    }
    header('Location: manage.php');
    exit;
}

$biomes = $db->query("SELECT * FROM biomes")->fetchAll();
$enclosures = $db->query("SELECT * FROM enclosures")->fetchAll();
$tickets = $db->query("SELECT * FROM tickets")->fetchAll();
include '../html/manage.html';
?>
