<?php
namespace App;
use \PDO, \PDOException;

class TFQuery {

	/**
	 * @method fetch_all
	 *
	 * fetches all adventurers from database
	 */

	public function fetch_all_adventurers() {
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

	/**
	 * @method prepare_password
	 */
	public function blowfishCrypt($password,$cost) {
	    $chars='./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	    $salt=sprintf('$2y$%02d$',$cost);
	    //Create a 22 character salt -edit- 2013.01.15 - replaced rand with mt_rand
	    mt_srand();
	    for($i=0;$i<22;$i++) $salt.=$chars[mt_rand(0,63)];
	    return crypt($password,$salt);
	}
}