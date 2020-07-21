<?php
class Connection extends PDO
{
	protected $host = '127.0.0.1';
	protected $user = 'root';
	protected $pass = '';
	protected $base = 'test';

	public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->base", $this->user, $this->pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
