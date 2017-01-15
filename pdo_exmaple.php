<?php
/*

// Процедурный подход. Библиотека mysqli
mysqli_query()

// ООП подход mysqli
$mysqli->query();


// ООП подход. Библиотека PDO
$pdo->exec



PDO::prepare — Подготавливает запрос к выполнению и возвращает ассоциированный с этим запросом объект
PDO::query — Выполняет SQL запрос и возвращает результирующий набор в виде объекта PDOStatement
PDO::quote — Заключает строку в кавычки для использования в запросе
PDO::exec — Запускает SQL запрос на выполнение и возвращает количество строк, задействованных в ходе его выполнения

*/


define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'lesson');
$pdo = new PDO('mysql:host=' .MYSQL_SERVER . ';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);

/*$affected_rows = $pdo->exec('INSERT INTO users SET id_role = 5 WHERE id_role=6');
echo $affected_rows;*/

$id_role = 5;
$id_role_where = 6;

$query = 'UPDATE users SET id_role1 = :my_id_role WHERE id_role=:where_id';

// PDOStatement
$stmt = $pdo->prepare($query);

/*$stmt->bindParam('my_id_role', $id_role);
$stmt->bindParam('where_id', $id_role_where);
*/
/*
if (!$stmt->execute(array('my_id_role' => $id_role, 'where_id' => $id_role_where))) {
	
	if($stmt->errorCode() != PDO::ERR_NONE){
		$info = $stmt->errorInfo();
		die($info[2]);
	} else {
		die('запрос не выполнен');
	}
}
*/

$q = 'SELECT * FROM users WHERE id_role = :my_role';
$stmt = $pdo->prepare($q);
$stmt->execute(array('my_role' => 5));

// в цикле получать каждую строку по отдельности
/*while ($row = $stmt->fetch()) {
	var_dump($row);
}
*/

// получить весь набор полностью
$rows = $stmt->fetchAll(PDO::FETCH_OBJ);
var_dump($rows);


