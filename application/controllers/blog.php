<?php
class Blog extends CI_Controller {
    public function boilerplate($data) {
        if (!isset($_SESSION)) {session_start();}
        $_SESSION['user'] = 'Admin';
        
        require('application/libraries/debug.php');
        
        $data['current'] = 'blog';
        
        $this->load->helper('url');
        $this->load->model('Blog_model');
        $this->load->view('templates/header', $data);
        if (isset($_SESSION) && $_SESSION['user'] == 'Admin') {
            $this->load->view('templates/admin');
        }
    }
    
    public function post($id=0) {
        $data = array();
        $this->boilerplate($data);
        
        if ($id == 0) {
            $blog_post = $this->Blog_model->get_recent_posts(1);
        } else {
            $blog_post = $this->Blog_model->get_post($id);
        }

        $data['title'] = $blog_post[0]->title;
        $data['body'] = $blog_post[0]->body;
        $data['tag_list'] = explode(',', $blog_post[0]->tag_list);
        
        $this->load->view('blog/post', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function all() {
        
        $data = array();
        $data['title'] = 'All Posts';
        $this->boilerplate($data);
        
        $blog_posts = $this->Blog_model->get_recent_posts(100);
        foreach($blog_posts as $blog_post) {
            $data['title'] = $blog_post->title;
            $data['body'] = $blog_post->body;
            $data['tag_list'] = explode(',', $blog_post->tag_list);
            $this->load->view('blog/snippet', $data);
        }
        
        $this->load->view('templates/footer', $data);
    }
    
    public function add() {
        $data = array();
        $data['title'] = 'Add New Post';
        $this->boilerplate($data);
    
        $this->load->helper('form');
        
        if($this->input->post('add-submit')){
            $this->Blog_model->add_post();
            if (isset($_SESSION['form']['post_id'])) {
                $post_id = $_SESSION['form']['post_id'];
                redirect('/blog/post/'.$post_id, 'refresh');
            }
        }
        
        $this->load->view('blog/add', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>