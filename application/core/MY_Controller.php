<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();     
    }


    function filldropdown(){
        $this->load->model(array("m_kecamatan","m_desa"));

        $id = $this->uri->segment(4);
        $dropdown = $this->uri->segment(3);

        if (!isset($id) || !is_numeric($id)){
            $reponse = array('success' => FALSE);
        }else {

            if($dropdown == "kecamatan"){
                $rows = $this->m_kecamatan->get_kecamatan($id)->result();

                $options = "";
                foreach ($rows as $row) {
                    $options .= "<option value='". $row->id_kecamatan ."'>". $row->nm_kecamatan ."</option>";
                }
                $options .= "<option value='manual'>Masukkan Secara Manual</option>";


            }else if($dropdown == "desa"){
                $rows = $this->m_desa->get_desa($id)->result();

                $options = "";
                foreach ($rows as $row) {
                    $options .= "<option value='". $row->id_desa ."'>". $row->nm_desa ."</option>";
                }
                $options .= "<option value='manual'>Masukkan Secara Manual</option>";

            }
            $response = array(
                'success' => TRUE,
                'options' => $options
            );

        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }


    /*
    *
    *
    *                 _    _ _______ _    _ 
    *            /\  | |  | |__   __| |  | |
    *           /  \ | |  | |  | |  | |__| |
    *          / /\ \| |  | |  | |  |  __  |
    *         / ____ \ |__| |  | |  | |  | |
    *        /_/    \_\____/   |_|  |_|  |_|
    *                                
    *                                
    *
    */

    function generatePassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function encryptPassword($pwd){
        $md5 = md5("taesa%#@2%^#" . $pwd . "2345#$%@3e");
        $hash = sha1($md5); 
        return $hash;   
    }

    function sendMail($email,$msg,$subject){
        //https://myaccount.google.com/lesssecureapps
        //In Gmail: configuration -> pop/imap -> enable pop 
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'm.faiznoeris@gmail.com';
        $config['smtp_pass']    = 'mynameisroccat7';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // text or html
        $config['validation'] = TRUE; // bool whether to validate email or not  

        /*$config = array(
        "protocol" => "smtp", 
        "smtp_host" => "ssl://smtp.googlemail.com",
        "smtp_port" => 465,
        "smtp_user" => "m.faiznoeris@gmail.com",
        "smtp_pass" => "mynameisroccat7",
        "mailtype" => "html",
        "charset" => "iso-8859-1",
        "wordwrap" => TRUE);*/

        $this->email->initialize($config);

        $this->email->from('m.faiznoeris@gmail.com', 'Admin');
        $this->email->to($email);

        $this->email->subject($subject);
        $this->email->message($msg);

        if($this->email->send()){
            return true;
        }

        //echo $this->email->print_debugger();
    }

    function isLoggedin() {
        $session = $this->session->all_userdata();

        if (isset($session['loggedin'])){
            return true;
        }

        return false;
    }

}