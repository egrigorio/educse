<?php include '../include/config.inc.php';
pr($_GET);
$sql = "DELETE FROM rel_instituicao_disciplinas WHERE id_instituicao = {$_SESSION['id_instituicao']} AND id_disc = {$_GET['id_disciplina']}";
my_query($sql);
$sql = "DELETE FROM disciplinas WHERE id = {$_GET['id_disciplina']}";
my_query($sql);
$sql = "DELETE FROM rel_disciplina_curso WHERE id_disciplina = {$_GET['id_disciplina']}";
my_query($sql);
$sql = "DELETE FROM rel_disciplina_user WHERE id_disciplina = {$_GET['id_disciplina']}";
my_query($sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);