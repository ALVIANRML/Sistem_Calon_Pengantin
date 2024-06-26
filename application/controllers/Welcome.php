<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
    {
        // Load database library
        $this->load->database();

        // Initialize db_message
        $data['db_message'] = '';

        // Test query
        $query = $this->db->query('SELECT version()');

        if ($query->num_rows() > 0)
        {
            // Fetch result
            $row = $query->row();
            $data['db_message'] = "Database connected successfully. PostgreSQL version: " . $row->version;
        }
        else
        {
            $data['db_message'] = "Failed to connect to database.";
        }

        // Load view with database message
        $this->load->view('welcome_message', $data);
    }
}
