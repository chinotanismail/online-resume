<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct()
	{
		parent::__construct();
		$this->load->model("word_model");
		$this->load->model("message_model");
		$this->load->model("visit_model");
		$this->load->model("parameters_model");
    $this->load->library('session');
	}

  public function login()
  {
    if($this->session->has_userdata("username"))
      redirect("Admin/index");

    $this->load->view('admin/include/header');
    $this->load->view('admin/login');
  }

  public function authenticate_login()
  {
    $username = $this->parameters_model->get_parameter("LGN_USERNAME")[0]->value;
    $password = $this->parameters_model->get_parameter("LGN_PASSWORD")[0]->value;

    if($_POST['username'] == $username && md5($_POST['password']) == $password)
    {
      $this->session->unset_userdata("violation");
      $this->session->set_userdata("username", $username);
      redirect("Admin/index");
    }

    else{
      $this->session->set_userdata("violation", "Username and password does not match.");
      redirect("Admin/login");
    }
  }

  public function logout()
  {
    $this->session->unset_userdata("username");
    redirect("Admin/login");
  }

	public function index()
	{
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    $data['views'] = $this->visit_model->get_by_date_visit();
    $data['message_counts'] = $this->message_model->get_by_date_message();
    $data['visits'] = $this->visit_model->get_all_views();
    $data['messages'] = $this->message_model->get_messages();
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/navbar');
		$this->load->view('admin/dashboard', $data);
    $this->load->view('admin/include/footer');
	}


  public function messages()
  {
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    $data['messages'] = $this->message_model->get_messages();

    $this->load->view('admin/include/header');
    $this->load->view('admin/include/navbar');
		$this->load->view('admin/messages', $data);
    $this->load->view('admin/include/footer');
  }

  public function message_read()
  {
    echo $this->message_model->set_read($_POST['id']);
  }

  public function message_delete()
  {
    echo $this->message_model->set_delete($_POST['id']);
  }

  public function get_unread_message_count()
  {
    echo $this->message_model->get_unread_message_count();
  }

  public function template()
  {
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    $data['template'] = $this->parameters_model->get_parameter("MSG_TEMPLATE");
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/navbar');
		$this->load->view('admin/template', $data);
    $this->load->view('admin/include/footer');
  }

  public function words()
  {
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    $data['words'] = $this->word_model->get_words();
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/navbar');
		$this->load->view('admin/words', $data);
    $this->load->view('admin/include/footer');
  }

  public function delete_word()
  {
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    $this->word_model->delete_word($_POST['id']);

    $words = $this->word_model->get_words();

    foreach($words AS $word){
      echo '<div class="col-xl-3 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 word-card">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">'.$word->word.'</div>
              </div>
              <div class="col-auto word-trasha">
                <a href="javascript:void(0);" onclick="deleteWord('.$word->id.')">
                  <i class="fas fa-trash fa-2x text-gray-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>';
    }
  }

  public function save_template()
  {
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    echo $this->parameters_model->save($_POST['value'], "MSG_TEMPLATE");
  }

  public function send_cv()
  {
    if(!$this->session->has_userdata("username"))
      redirect("Admin/login");

    $user = $this->message_model->get_message($_POST['id']);

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
    $mail->addReplyTo('chino.ismail@gmail.com', 'Chino Ismail');
    $mail->addAddress($user->email_address);
    $mail->Subject = '[CV] Chino Tan Ismail';
    $mail->isHTML(true);
    $mail->addAttachment("uploads/CV-JULY-2020.pdf");
    $mailContent = $this->parameters_model->get_parameter("MSG_TEMPLATE");
    $mail->Body = str_replace("{NAME_HERE}", $user->name, $mailContent[0]->value);

    if(!$mail->send()){
      echo "0";
    }else{
      echo $this->message_model->set_cv_sent($_POST['id']);
    }
  }
}
