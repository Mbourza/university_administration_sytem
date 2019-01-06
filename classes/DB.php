<?php 

class DB{
    
    private static $_instance = null;
	       private $_pdo,
	               $_query,
	               $_error = false,
	               $_results,
	               $_count = 0;

	private function __construct(){

		try{

			$this->_pdo = new PDO('mysql:host='. Config::get('mysql/host').';
			                     dbname='. Config::get('mysql/db'), 
			                               Config::get('mysql/user'),
			                               Config::get('mysql/pass'));
		}catch(PDOException $e){

			die($e->getMessage());
		}
	}

	public static function getInstance(){

		if(!isset(self::$_instance)){

			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	public function query($sql, $params = array()){

		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){

			$x = 1;
			if(count($params)){

				foreach ($params as $param) {
					
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if($this->_query->execute()){

				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();

			}else{

				$this->_error = true;
			}
		}
		return $this;
	}

    public function action($action, $table, $where = array()){

		if(count($where) === 3){

			$operators = array('=', '>', '<', '>=', '<=');

			$field    = $where[0];
			$operator = $where[1];
			$value    = $where[2];

			if(in_array($operator, $operators)){

				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if(!$this->query($sql, array($value))->error()){

					return $this;
				}
			}
		}
		return false;
	}

	public function get($table, $where){

		return $this->action('SELECT *', $table, $where);
	}
	public function delete($table, $where){

		return $this->action('DELETE ', $table, $where);
	}

	public function insert($table, $fields = array()){

		if(count($fields)){

			$keys = array_keys($fields);
			$values = "";
			$x = 1;

			foreach ($fields as $field) {
				
				$values .= "?";
				if($x < count($fields)){

					$values .= ', ';
				}
				$x++;
			}

			$sql = "INSERT INTO $table (`".implode('`, `', $keys) ."`) VALUES ({$values})";

			if(!$this->query($sql, $fields)->error()){

				return true;
			}
		}

		return false;
	}

	public function update($table, $id, $fields){

		$set = '';
		$x = 1;

		foreach($fields as $name=> $value){

			$set .= "{$name} = ?";
			if($x < count($fields)){

				$set .= ', ';
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE id= {$id}";

		if(!$this->query($sql, $fields)->error()){

			return true;
		}

		return false;

	}

	public function getAll($where){


		$query = $this->_pdo->prepare('SELECT * FROM members WHERE memb_group = ?');
		$query->bindValue(1, $where);
		$query->execute();
		while ($row = $query->fetchObject()) {

			$results[] = $row;
		}

		if(!empty($results)) {

			return $results;
		}

		$this->_count = $query->rowCount();	
	}

	public function getMssgs($id){


		$query = $this->_pdo->prepare('SELECT * FROM messages WHERE sento_id = ? order by id desc');
		$query->bindValue(1, $id);
		$query->execute();
		while ($row = $query->fetchObject()) {

			$results[] = $row;
		}

		if(!empty($results)) {

			return $results;
		}	
	}

	public function getTable($table) {

		$query = $this->_pdo->prepare("SELECT * FROM {$table}");

		$query->execute();

		while ($row = $query->fetchObject()) {

			$results[] = $row;
		}

		if(!empty($results)) {

			return $results;
		}
	}

	public function results(){

		return $this->results()[0];
	}
	public function first(){

		return $this->_results[0];
	}

	public function firsts($i){

		return $this->_results[$i];
	}

	public function error(){

		return $this->_error;
	}

	public function count(){

		return $this->_count;
	}

}






?>