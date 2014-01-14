<?php
class Pages extends CI_Controller {
    
    public function view($page='home') {
        require('application/libraries/debug.php');
        if (!file_exists('application/views/pages/'.$page.'.php')) {
            $page = 'awkward';
        }
        
        $data = array();
        $data['title'] = ucfirst($page);
        $data['current'] = ($page);
        
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
?>