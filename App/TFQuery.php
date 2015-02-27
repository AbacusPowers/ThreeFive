<?php
namespace App;
use \PDO, \PDOException;

class TFQuery {

	/**
	 * @method fetch_all
	 *
	 * fetches all adventurers from database
	 */

	public function fetch_all() {
		global $handler;
		$query = $handler->prepare("SELECT * FROM adventurers");
		$query->execute();

		return $query->fetchAll();
	}

	public function fetch_data($id, $table) {
		global $handler;
		$query = $handler->prepare("SELECT * FROM " . $table ." WHERE id = :id");
		//$query->bindValue(':table', $table);
		$query->bindValue(':id', $id);
		$query->execute();

		return $query->fetch();
	}

}