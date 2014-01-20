<?php

class Blog_model extends CI_model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_post($post_id=1) {
        // $query = $this->db->get_where('blog_posts', array('post_id'=>$post_id), 1);
        // $return = $query->result();
        $sql = "SELECT 
                    post_id,
                    post_date,
                    title, 
                    body,
                    COALESCE(GROUP_CONCAT(tag_name), 'No Tags') as tag_list
                FROM blog_posts LEFT JOIN blog_tags USING (post_id) 
                WHERE post_id = ?";
        $return = $this->db->query($sql, array($post_id))->result();
        return $return;
    }
    
    public function get_recent_posts($num=5) {
        $sql = "SELECT 
                    post_id,
                    post_date,
                    title, 
                    body,
                    COALESCE(GROUP_CONCAT(tag_name), 'No Tags') as tag_list
                FROM blog_posts LEFT JOIN blog_tags USING (post_id)
                GROUP BY title, body
                ORDER BY post_date DESC
                LIMIT ?";
        $return = $this->db->query($sql, array($num))->result();
        return $return;
    }
    
    public function add_post() {
        $this->title = $_POST['title'];
        $this->body = $_POST['body'];
        
        // $test = $this->db->insert('blog_posts', $this);
        
        $sql = "INSERT INTO blog_posts (title, body, post_date)
                VALUES(?, ?, CURRENT_TIMESTAMP());";
        $ret = $this->db->query($sql, array($_POST['title'], $_POST['body']));
        
        if ($ret) {
            $sql = "SELECT LAST_INSERT_ID() as post_id;";
            $id = $this->db->query($sql)->row_array();
            $_SESSION['form']['post_id'] = $id['post_id'];
            $this->add_tags($id['post_id'], $_POST['tags']);
        } else {
            $_SESSION['messages']['form_error'] = 'There was a problem inserting data into the database, please try again.';
        }
    }
    
    protected function add_tags($post_id, $tags) {
        $sql = "INSERT INTO blog_tags (post_id, tag_name)
                VALUES (?, ?)";
        $tags = explode(',', $tags);
        $tags_clean = array_map("trim", $tags);
        foreach($tags_clean as $tag) {
            $this->db->query($sql, array($post_id, $tag));
        }
    }
}
?>