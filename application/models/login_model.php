<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model 
{
	public function register($first_name, $last_name, $screen_name, $email, $password)
	{
	$query = "INSERT INTO users (first_name, last_name, screen_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
	$value = array($first_name, $last_name, $screen_name, $email, $password);
	// var_dump($first_name, $last_name, $screen_name, $email);
	// 	die('here');

	// $query1 = "INSERT INTO birth_date (day, month, year, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
	// $values1 = array($birth_day, $birth_month, $birth_year);
	return $this->db->query($query, $value);
	}
	public function login($email)
	{
	$query = "SELECT * FROM users WHERE email = {$email}";
	$value = array($email);
	return $this->db->query($query, $value);
	}
}