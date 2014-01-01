<?php

class Blog_model extends CI_model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_post($post_id=1) {
        $query = $this->db->get_where('blog_posts', array('post_id'=>$post_id), 1);
        $return = $query->result();
        return $return;
    }
    
    public function get_recent_posts($num=5) {
        $query = $this->db->get('blog_posts', $num);
        $return = $query->result();
        return $return;
    }
    
    public function add_post() {
        $this->title = $_POST['title'];
        $this->body = $_POST['body'];
        
        $this->db->insert('blog_posts', $this);
    }
}
?>