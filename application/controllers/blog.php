<?php
class Blog extends CI_Controller {
    
    public function post($id=0) {
        require('application/libraries/debug.php');
        /* if (!file_exists('application/views/pages/'.$page.'.php')) {
            $page = 'awkward';
        } */
        $data = array();
        $data['current'] = 'blog';
        $data['tag_list'] = '<li>tag1</li><li>tag2</li>';
        
        $this->load->model('Blog_model');
        
        if ($id == 0) {
            $blog_post = $this->Blog_model->get_recent_posts(1);
        } else {
            $blog_post = $this->Blog_model->get_post($id);
        }
        var_dump($blog_post);
        $data['title'] = $blog_post[0]->title;
        $data['body'] = $blog_post[0]->body;
        
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('blog/blog', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function add() {
        $data = array();
        $data['current'] = 'blog';
        $data['title'] = 'Add New Post';
    
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Blog_model');
        
        if($this->input->post('add-submit')){
            var_dump($_POST);
            $this->Blog_model->add_post();
        }  
        
        $this->load->view('templates/header', $data);
        $this->load->view('blog/add', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>