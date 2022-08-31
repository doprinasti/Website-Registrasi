<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogActivities_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function list()
    {
        $this->db->select('*');
        $this->db->where('active', 1);
        $query = $this->db->get("log_activities");
        return $query;
    }

    function insert($tables_name, $description, $create_date, $create_by)
    {

        $data = array(
            'tables_name' => $tables_name,
            'description' => $description,
            'create_date' => $create_date,
            'create_by' => $create_by,
            'active' => '1',
        );
        $this->db->insert('log_activities', $data);
    }

    public function make_query()
    {
        $query = "SELECT * from log_activities";

        return $query;
    }

    public function make_query_user($username)
    {
        $query = "SELECT * from log_activities WHERE active=1 AND create_by='$username'";

        return $query;
    }

    public function fetch_data($limit, $start)
    {
        $query = $this->make_query();
        $query .= ' order by  id desc';
        $query .= ' LIMIT ' . $start . ', ' . $limit;
        $data = $this->db->query($query);

        return $data->result();
    }

    public function fetch_data_user($username, $limit, $start)
    {
        $query = $this->make_query_user($username);
        $query .= ' order by  id desc';
        $query .= ' LIMIT ' . $start . ', ' . $limit;
        $data = $this->db->query($query);

        return $data->result();
    }

    public function count_all()
    {
        $query = $this->make_query();
        $data = $this->db->query($query);

        return $data->num_rows();
    }

    public function count_all_user($username)
    {
        $query = $this->make_query_user($username);
        $data = $this->db->query($query);

        return $data->num_rows();
    }

    public function getDataUser()
    {
        $query = $this->db->query("SELECT * from tbuser ORDER BY username ASC");

        return $query->result();
    }
}
