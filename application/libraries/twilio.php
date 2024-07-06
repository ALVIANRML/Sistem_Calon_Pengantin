<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class twilio {

    protected $CI; // Properti untuk menyimpan instance CodeIgniter
    protected $account_sid;
    protected $auth_token;
    protected $base_url = 'https://api.twilio.com/2010-04-01/';

    public function __construct() {
        // Jangan lakukan ini di sini:
        // $this->CI = &get_instance();
        // $this->CI->load->config('twilio');

        // Di sini, kita hanya mendefinisikan properti, nanti akan diinisialisasi dalam metode yang tepat
        $this->CI = NULL;
    }

    public function initialize() {
        // Inisialisasi instance CodeIgniter dan konfigurasi Twilio
        $this->CI = &get_instance();
        $this->CI->load->config('twilio');

        // Initialize Twilio credentials from config file
        $this->account_sid = $this->CI->config->item('twilio_account_sid');
        $this->auth_token = $this->CI->config->item('twilio_auth_token');
    }

    public function send_message($to, $from, $body) {
        // Memastikan bahwa instance CodeIgniter telah diinisialisasi sebelum menggunakan
        if (!$this->CI) {
            $this->initialize();
        }

        // Prepare curl request
        $ch = curl_init($this->base_url . 'Accounts/' . $this->account_sid . '/Messages.json');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'To' => $to,
            'From' => $from,
            'Body' => $body
        ]));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->account_sid . ':' . $this->auth_token);

        // Execute curl request
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
