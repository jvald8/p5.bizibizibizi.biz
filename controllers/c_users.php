<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		echo "users_controller construct called<br><br>";
	}

	public function index() {
		echo "This is the index page";
	}

	public function signup() {
		/*echo "This is the signup page";*/
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign up";

		echo $this->template;
	}

	public function p_signup() {
		/*echo '<pre>';
		print_r($_POST);
		echo '</pre>';*/
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());


		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

		echo 'You\'re signed up maybe!';
	}

	public function login() {
		echo "This is the login page";
	}

	public function profile($user_name = NULL) {

		$this->template->content = View::instance('v_users_profile');

		$this->template->title = "Profile";

		$this->template->content->user_name = $user_name;

		echo $this->template;


		/*$view = View::instance('v_users_profile');

		$view->user_name = $user_name;

		echo $view;*/

		/*if($user_name == NULL) {
			echo "No user specified";
		}
		else {
			echo "This is the profile for ".$user_name;
		}*/
	}
}