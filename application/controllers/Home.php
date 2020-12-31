<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("word_model");
		$this->load->model("message_model");
		$this->load->model("visit_model");
	}

	public function index()
	{
		$data['words'] = $this->word_model->get_words();
		$this->load->view('landing', $data);
	}

	public function add_word()
	{
		echo $this->word_model->save($_POST["word"]);
	}

	public function send_message()
	{
		$this->load->library('phpmailer_lib');
    $mail = $this->phpmailer_lib->load();

    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->setFrom('chino.ismail@gmail.com', 'Chino Ismail');
    $mail->addReplyTo($_POST['email_address'], $_POST['name']);
    $mail->addAddress('chino.ismail@gmail.com');
    $mail->Subject = 'New Message from '.$_POST['name'];
    $mail->isHTML(true);
    $mail->Body = $_POST['message'];

		echo $this->message_model->save($_POST);
	}

	public function add_visit()
	{
		echo $this->visit_model->save($_POST["device"]);
	}
}
