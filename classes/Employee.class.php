<?php 

class Employee extends Dbh {

	public function select() {
		$sql = "SELECT * FROM employees";
		$result = $this->connect()->query($sql);
		return $result;
	}
		
		

	public function insert($fields) {
		$implodeCols = implode(', ', array_keys($fields));

		$implodePlaceholder = implode(', :', array_keys($fields));

		$sql = "INSERT INTO employees($implodeCols) VALUES(:".$implodePlaceholder.");";
		// INSERT INTO employees(name, city, designation) VALUES(:name, :city, :designation);
		$stmt = $this->connect()->prepare($sql);

		foreach ($fields as $key => $value) {

			$stmt->bindValue(':'.$key, $value);

		}

		$stmtExec = $stmt->execute();

		if ($stmtExec) {
			header('location: index.php');
		}

	}

	public function edit($id) {
		$sql = "SELECT * FROM employees WHERE id = :id;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	
	public function update($fields, $id) {

		$counter = 1;
		$total_fields = count($fields);
		$st = "";

		foreach ($fields as $key => $value) {
			
			if ($counter === $total_fields) {
				$set = $key.'= :'.$key;
				$st .= $set;
			} else {
				$set = $key.'= :'.$key.', ';
				$st .= $set;
				$counter++;
			}
		}

		$sql = "UPDATE employees SET ".$st." WHERE id = :id";

		$stmt = $this->connect()->prepare($sql);

		foreach ($fields as $key => $value) {
			
			$stmt->bindValue(':'.$key, $value);

		}

		$stmt->bindValue(':id', $id);

		$stmtExec = $stmt->execute();

		if ($stmtExec) {
			header('location: index.php');
		}

	}

	public function delete($id) {
		$sql = "DELETE FROM employees WHERE id = :id;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(':id', $id);

		if ($stmt->execute()) {
			header('location: index.php');
		}
	}

}