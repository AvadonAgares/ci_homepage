<?php
class Blog extends MY_Controller {
    public function __construct() {
        
    }

    public function boilerplate(&$data) {
        $data['title'] = 'Blog | Page Bonifaci';
        parent::__construct($data);
        
        $this->load->helper('url');
        $this->load->model('Blog_model');
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
        
        $data['post_id'] = $blog_post[0]->post_id;
        $data['post_date'] = $blog_post[0]->post_date;
        $data['body'] = $blog_post[0]->body;
        $data['tag_list'] = explode(',', $blog_post[0]->tag_list);
        
        
        $this->load->view('templates/header', $data);
        if (isset($_SESSION) && $_SESSION['user_type'] == 'Admin') {
            $this->load->view('templates/admin');
        }
        $this->load->view('blog/post', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function all() {
        
        $data = array();
        $data['title'] = 'All Posts';
        $this->boilerplate($data);
        // $this->load->view('templates/header', $data);
        if (isset($_SESSION) && $_SESSION['user_type'] == 'Admin') {
            $this->load->view('templates/admin');
        }
        
        $blog_posts = $this->Blog_model->get_recent_posts(100);
        foreach($blog_posts as $blog_post) {
            $data['post_id'] = $blog_post->post_id;
            $data['post_date'] = $blog_post->post_date;
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
        $data['security_level'] = 'admin';
        $this->boilerplate($data);
    
        $this->load->helper('form');
        
        if($this->input->post('add-submit')){
            $this->Blog_model->add_post();
            if (isset($_SESSION['form']['post_id'])) {
                $post_id = $_SESSION['form']['post_id'];
                redirect('/blog/post/'.$post_id, 'refresh');
            }
        }
        
        $this->load->view('templates/header', $data);
        if (isset($_SESSION) && $_SESSION['user_type'] == 'Admin') {
            $this->load->view('templates/admin');
        }
        $this->load->view('blog/add', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>