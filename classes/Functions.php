<?php
/**
 * Class: Functions
 * All functions related to SELECT, INSERT, UPDATE and DELETE
 */
class Functions {
	
	private $conn;

	public function __construct() {
		include('Connection.php');
		$this->conn = new Connection();
	}

	/**
	 * Register the client
	 * @return boolean
	 */
	public function createCustomers()
	{
		$insertCustomer = $this->conn->prepare("INSERT INTO customers 
													(name, email, password) 
												VALUES 
													(:name, :email, :password)");
		try {

			$insertCustomer->execute([
				':name'		=> $_POST['name'],
				':email'	=> $_POST['email'],
				':password'	=> md5($_POST['password']),
			]);
			if ($this->conn->lastInsertId() > 0) {
				return true;
			} else { return false; }

		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (insertCustomer): ' . $e->getMessage() . '</br>';
		}
	}

	/**
	 * Checks if the email has already been used
	 * @param string $email
	 * @return boolean
	 */
	public function checkCustomer($email)
	{
		$select = $this->conn->prepare("SELECT * FROM customers WHERE email = :email");
		try {

			$select->execute([
				':email'	=> $_POST['email'],
			]);
			if ($select->rowCount() > 0) {
				return true;
			} else { return false; }

		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (select): ' . $e->getMessage() . '</br>';
		}
	}

	/**
	 * Checks if the email has already been used
	 * @param string $email
	 * @return boolean
	 */
	public function login($email, $senha)
	{
		$select = $this->conn->prepare("SELECT * FROM customers WHERE email = :email and password = :password");
		try {

			$select->execute([
				':email'	=> $_POST['email'],
				':password'	=> md5($_POST['password']),
			]);
			if ($select->rowCount() > 0) {
				return true;
			} else { return false; }

		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (select): ' . $e->getMessage() . '</br>';
		}
	}

	/**
	 * Checks if the email has already been used
	 * @param string $email
	 * @return boolean
	 */
	public function checkContact($email)
	{
		$select = $this->conn->prepare("SELECT * FROM contacts WHERE email = :email");
		try {

			$select->execute([
				':email'	=> $email,
			]);
			if ($select->rowCount() > 0) {
				return true;
			} else { return false; }

		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (select): ' . $e->getMessage() . '</br>';
		}
	}

	/**
	 * Register the contact
	 * @return boolean
	 */
	public function createContacts($data=NULL)
	{
		// insert contact
		$insertContact = $this->conn->prepare("INSERT INTO contacts 
													(name, email, address, number, complement, neighborhood, zipcode, city, state) 
											   VALUES 
													(:name, :email, :address, :number, :complement, :neighborhood, :zipcode, :city, :state)");
		try {

			$insertContact->execute([
				':name'			=> $data['name'],
				':email'		=> $data['email'],
				':address'		=> $data['address'],
				':number'		=> $data['number'],
				':complement'	=> $data['complement'],
				':neighborhood'	=> $data['neighborhood'],
				':zipcode'		=> $data['zipcode'],
				':city'			=> $data['city'],
				':state'		=> $data['state'],
			]);

			if ($this->conn->lastInsertId() > 0) {

				$idInsertContact = $this->conn->lastInsertId();

				$insertPhone = $this->conn->prepare("INSERT INTO phones (phone, contacts_id) VALUES (:phone, :contacts_id)");
				try {

					for ($i=1; $i<=6; $i++) {

						$phone = 'phone' . $i;

						if (!empty($data[$phone])) {

							$insertPhone->execute([
								':phone'		=> $data[$phone],
								':contacts_id'	=> $idInsertContact,
							]);

						}

					}

					return true;

				} catch(PDOExecption $e) {
					$this->conn->rollback();
					print 'Error (insertContact): ' . $e->getMessage() . '</br>';
				}
			
			} else { return false; }

		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (insertContact): ' . $e->getMessage() . '</br>';
		}
	}

	/**
	 * Register the phone
	 * @return boolean
	 */
	public function createPhones($data=NULL)
	{
		// insert phone
		
	}

	/**
	 * Checks if the email has already been used
	 * @param string $email
	 * @return boolean
	 */
	public function contacts()
	{
		$select = $this->conn->prepare("SELECT * FROM contacts");
		try {

			$select->execute();
			if ($select->rowCount() > 0) {

				$result = $select->fetchAll();
				return json_encode($result);

			} else { return false; }

		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (select): ' . $e->getMessage() . '</br>';
		}
	}

	/**
	 * Delete the contact
	 * @return boolean
	 */
	public function deleteContact($id)
	{
		// delete contact
		$delete = $this->conn->prepare("DELETE FROM contacts WHERE id = :id");
		try {

			$delete->execute([
				':id'	=> $id,
			]);
			
			return true;
			
		} catch(PDOExecption $e) {
			$this->conn->rollback();
			print 'Error (insertContact): ' . $e->getMessage() . '</br>';
		}
	}

}
?>