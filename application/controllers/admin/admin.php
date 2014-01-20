<?php
class Blog extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function main() {
        $data = array();
        $data['title'] = 'Administration';
        
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('home_view', $data);
        } else {
            //If no session, redirect to login page
            /* redirect('login', 'refresh'); */
        }
        
        
        $this->load->view('templates/header', $data);
        if (isset($_SESSION) && $_SESSION['user'] == 'Admin') {
            $this->load->view('templates/admin');
        }
        $this->load->view('blog/post', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>