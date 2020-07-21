<?php
class Connection extends PDO
{
	protected $host = '51.81.1.156';
	protected $user = 'innovowe_dd';
	protected $pass = 'WH#8uvl7NfaL';
	protected $base = 'innovowe_dartdigital';

	public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->base", $this->user, $this->pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
