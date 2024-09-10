<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Exceptions\InvalidArgumentException;

class User extends ActiveRecordEntity
{
	/** @var string */
	protected $login;
	/** @var string */
	protected $email;
	/** @var int */
	protected $isConfirmed;
	/** @var string */
	protected $passwHash;
	/** @var string */
	protected $authToken;
	/** @var string */
	protected $fullName;
	/** @var int */
	protected $phone;
	/** @var string */
	protected $address;
	/** @var string */
	protected $passportNum;
	/** @var string */
	protected $birthday;
	/** @var string */
	protected $userGroup;
	/** @var string */
	protected $createdAt;

	/** 
	 * @return string
	 */
	public function getLogin(): string
	{
		return $this->login;
	}

	/** 
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @return int
	 */
	public function getIsConfirmed(): int
	{
		return $this->isConfirmed;
	}

	/**
	 * @return string
	 */
	public function getPasswHash(): string
	{
		return $this->passwHash;
	}

	/** 
	 * @return string
	 */
	public function getAuthToken(): string
	{
		return $this->authToken;
	}

	/** 
	 * @return string
	 */
	public function getFullName(): string
	{
		return $this->fullName;
	}

	/** 
	 * @return int
	 */
	public function getPhone(): int
	{
		return $this->phone;
	}

	/** 
	 * @return string
	 */
	public function getAddress(): string
	{
		return $this->address;
	}

	/** 
	 * @return string
	 */
	public function getPassportNum(): string
	{
		return $this->passportNum;
	}

	/** 
	 * @return string
	 */
	public function getBirthday(): string
	{
		return $this->birthday;
	}

	/**
	 * @return string
	 */
	public function getUserGroup(): string 
	{
		return $this->userGroup;
	}

	/** 
	 * @return string
	 */
	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}

	protected static function getTableName(): string
	{
		return 'users';
	}

	public static function signUp(array $userData)
	{
		if (empty($userData['login'])) {
			throw new InvalidArgumentException('Не передан логин');
		}

		if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['login'])) {
			throw new InvalidArgumentException('Логин может состоять только из символов латинского алфавита и цифр');
		}

		if (empty($userData['email'])) {
			throw new InvalidArgumentException('Не передан email');
		}

		if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Email некорректен');
		}

		if (empty($userData['fullName'])) {
			throw new InvalidArgumentException('Не передано имя');
		}

		if (!preg_match('/^[a-яA-Я]*$/', $userData['fullName'])) {
			throw new InvalidArgumentException('Имя может состоять только из символов латинского алфавита');
		}

		if (empty($userData['phone'])) {
			throw new InvalidArgumentException('Не передан телефон');
		}

		if (!preg_match('/^[0-9]+$/', $userData['phone'])) {
			throw new InvalidArgumentException('Телефон может состоять только из цифр');
		}

		if (strlen($userData['phone']) != 10) {
			throw new InvalidArgumentException('Телефон должен состоять из 10 цифр (без +7)');
		}

		if (empty($userData['address'])) {
			throw new InvalidArgumentException('Не передан адрес');
		}

		if (empty($userData['passportNum'])) {
			throw new InvalidArgumentException('Не переданы паспортные данные');
		}

		if (strlen($userData['passportNum']) != 10) {
			throw new InvalidArgumentException('Неправильный номер и серия паспорта (10 цифр)');
		}

		if (empty($userData['birthday'])) {
			throw new InvalidArgumentException('Не передан день рождения');
		}

		if (strtotime(date('Y-m-d')) <= strtotime(date('Y-m-d', strtotime($userData['birthday'])))) {
			throw new InvalidArgumentException('Дата рождения не может быть больше текущей даты');
		}

		if (empty($userData['password'])) {
			throw new InvalidArgumentException('Не передан password');
		}

		if (mb_strlen($userData['password']) < 8) {
			throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
		}

		if (static::findOneByColumn('login', $userData['login']) !== null) {
			throw new InvalidArgumentException('Пользователь с таким логином уже существует');
		}

		if (static::findOneByColumn('email', $userData['email']) !== null) {
			throw new InvalidArgumentException('Пользователь с таким email уже существует');
		}

		if (static::findOneByColumn('passport_num', $userData['passportNum']) !== null) {
			throw new InvalidArgumentException('Пользователь с такими паспортными данными уже существует');
		}

		$user = new User();
		$user->login = $userData['login'];
		$user->email = $userData['email'];
		$user->passwHash = password_hash($userData['password'], PASSWORD_DEFAULT);
		$user->isConfirmed = false;
		$user->fullName = $userData['fullName'];
		$user->phone = $userData['phone'];
		$user->address = $userData['address'];
		$user->passportNum = $userData['passportNum'];
		$user->birthday = $userData['birthday'];
		$user->userGroup = 'user';
		$user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
		$user->save();

		return $user;
	}

	public function activate(): void
	{
		$this->isConfirmed = true;
		$this->save();
	}

	public static function login(array $loginData): User
	{
		if (empty($loginData['email'])) {
			throw new InvalidArgumentException('Не передан email');
		}

		if (!filter_var($loginData['email'], FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Email некорректен');
		}

		if (empty($loginData['password'])) {
			throw new InvalidArgumentException('Не передан password');
		}

		$user = User::findOneByColumn('email', $loginData['email']);
		if ($user === null) {
			throw new InvalidArgumentException('Нет пользователя с таким email');
		}

		if (!password_verify($loginData['password'], $user->getPasswHash())) {
			throw new InvalidArgumentException('Неправильный пароль');
		}

		if (!$user->getIsConfirmed()) {
			throw new InvalidArgumentException('Пользователь не подтверждён');
		}

		$user->refreshAuthToken();
		$user->save();

		return $user;
	}

	public function isAdmin(): bool 
	{
		return $this->getUserGroup() === 'admin';
	}
	
	private function refreshAuthToken()
	{
		$this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
	}
}
