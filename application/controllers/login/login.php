<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function main() {
        $data = array();
        $data['title'] = 'Log In';
        $data['current'] = null;
    
        $this->load->helper('form');
        $this->load->model('User_model');
        
        if($this->input->post('login-submit')){
            $user = $this->User_model->validate_user($_POST['username'], $_POST['password']);
            if($user['user_valid']===true) {
                $_SESSION['user'] = $user;
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('login/login_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function logout() {
        $data = array();
        $data['title'] = 'Add New Post';
        $data['current'] = null;
    
        $this->load->helper('form');
        $this->load->model('User_model');
        
        
    }
    
    public function register() {
        $data = array();
        $data['title'] = 'Register';
        $data['current'] = null;
    
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
        
        // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[64]|callback_form_validate_username|xss_clean');
        $this->form_validation->set_rules('password_1', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_2', 'Password Confirmation', 'required|matches[password_1]');
        
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() == FALSE ){
            $this->load->view('login/register_view', $data);
        } else {
            $this->User_model->create_user($_POST['username'], $_POST['password'], $_POST['email']);
            $this->load->view('login/register_success_view', $data);
        }
        $this->load->view('templates/footer', $data);
    }
    
    public function form_validate_username($username) {
        $this->load->model('User_model');
        $this->form_validation->set_message('form_validate_username', 'That %s is already in use, please select a different one.');
        $valid = $this->User_model->username_is_unique($username);
        return $valid;
    }
}
?>