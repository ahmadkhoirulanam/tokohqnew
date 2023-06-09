<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

    }

    public function count_all_reviews()
    {
        return $this->db->get('reviews')->num_rows();
    }

    public function get_all_reviews()
    {
        $reviews = $this->db->query("
            SELECT r.*, o.order_number, c.*
            FROM reviews r
            JOIN orders o
                ON o.id = r.order_id
            JOIN customers c
                ON c.user_id = r.user_id
        ");

        return $reviews->result();
    }
    public function get_all_categories()
    {
        return $this->db->get('product_category')->result();
    }

    public function best_deal_product()
    {
        $data = $this->db->where('is_available', 1)
            ->order_by('current_discount', 'DESC')
            ->limit(1)
            ->get('products')
            ->row();

        return $data;
    }

    public function is_review_exist($id)
    {
        return ($this->db->where('id', $id)->get('reviews')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function review_data($id)
    {
        $review = $this->db->query("
            SELECT r.*, o.order_number
            FROM reviews r
            JOIN orders o
                ON o.id = r.order_id
            WHERE r.id = '$id'
        ");

        return $review->row();
    }
}