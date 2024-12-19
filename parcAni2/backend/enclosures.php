<?php
require_once '../php/db_connect.php';

$biome_id = $_GET['biome'];

$query = $db->prepare("SELECT * FROM enclosures WHERE biome_id = ?");
$query->execute([$biome_id]);
$enclosures = $query->fetchAll();
$enclosure_id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM enclosures WHERE id = ?");
$stmt->execute([$enclosure_id]);
$enclosure = $stmt->fetch();

include '../html/enclosures.html';
?>
