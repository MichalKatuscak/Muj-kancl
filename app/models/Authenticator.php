<?php

use Nette\Security as NS;


/**
 * Users authenticator.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Authenticator extends Nette\Object implements NS\IAuthenticator
{
	/** @var Nette\Database\Table\Selection */
	private $users;



	public function __construct(Nette\Database\Table\Selection $users)
	{
		$this->users = $users;
	}



	/**
	 * Performs an authentication
	 * @param  array
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		
		$row = $this->users->where('login', $username)->fetch();

		if (!$row) {
			throw new NS\AuthenticationException("User '$username' not found.", self::IDENTITY_NOT_FOUND);
		}

		if ($row->password !== $this->calculateHash($password)) {
			throw new NS\AuthenticationException("Invalid password.", self::INVALID_CREDENTIAL);
		}

		//unset($row->password);
		return new NS\Identity($row->id_user, $row->group_id, $row->toArray());
	}



	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public function calculateHash($password)
	{
		return md5($password);
	}

}
