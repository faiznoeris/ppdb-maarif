<?php
class m_auth extends CI_Model{
	function test(){
		$this->db->select('*');
		$this->db->from('users');
		return $this->db->get()->result();
	}
	function test2(){
		$this->db->select('*');
		$this->db->from('users');
		return $this->db->get()->result_array();
	}
	
	function login($uname, $pwd_hash){
		$query = "SELECT id_user,username,date_joined,email,ava_path FROM users WHERE username LIKE '" . $uname . "' AND password LIKE '" . $pwd_hash . "' LIMIT 1";
		$query_chkexist = "SELECT username FROM users WHERE username = '" . $uname . "' LIMIT 1";

		$res = $this->db->query($query);
		$res_chkexist = $this->db->query($query_chkexist);

		if ($res->num_rows() == 1) {
			$row = $res->row();
			$newdata = array(
				'id_user'		=> $row->id_user,
				'email'			=> $row->email,
				'user_lvl'		=> $row->user_lvl,
				'username'  	=> $row->username,
				'date_joined' 	=> $row->date_joined,
				'ava_path' 		=> $row->ava_path,
				'loggedin' 		=> TRUE
				);
			$this->session->set_userdata($newdata);

			/*$_SESSION["id_user"] 		= $row->id_user;
			$_SESSION["email"] 			= $row->email;
			$_SESSION["user_lvl"] 		= $row->user_lvl;
			$_SESSION["username"] 		= $row->username;
			$_SESSION["date_joined"] 	= $row->date_joined;
			$_SESSION["ava_path"]		= $row->ava_path;
			$_SESSION["loggedin"] 		= TRUE;*/

			//UPDATE LAST LOGIN
			$lastlogin = date('Y-m-d H:i:s');

			$this->db->set('last_login', $lastlogin);
			$this->db->where('id_user', $row->id_user);
			$this->db->update('users');

			return true;

		}else if($res_chkexist->num_rows() == 0){
			$this->session->set_flashdata('error','*Username / Email tidak terdaftar.');	
		}else{
			$this->session->set_flashdata('error','*Password salah!');			
		}

		return false;
	}

	function isloggedin() {
		$session = $this->session->all_userdata();

		if (isset($session['loggedin'])){
			return true;
		}

		return false;
	}

	function encryptpwd($pwd){
		$md5 = md5("taesa%#@2%^#" . $pwd . "2345#$%@3e");
		$hash = sha1($md5);	
		return $hash;	
	}

	function forgotpassword($email, $pin){
		$query_chkemail = "SELECT email FROM users WHERE email LIKE '%" . $email . "%' LIMIT 1";
		$query_chkcombination = "SELECT email,pin FROM users WHERE email LIKE '%" . $email . "%' AND pin LIKE '%". $pin ."%' LIMIT 1";

		$res_chkemail = $this->db->query($query_chkemail);
		$res_chkcombination = $this->db->query($query_chkcombination);

		if($res_chkemail->num_rows() == 0){
			$this->session->set_flashdata('error','*Email tidak terdaftar!');
			return false;
		}

		if($res_chkcombination->num_rows() == 0){
			$this->session->set_flashdata('error','*Kombinasi email dan pin tidak cocok!');	
			return false;
		}

		$newpwd = $this->generateRandomString();
		$newpwd_hash = $this->encryptpwd($newpwd);


		$this->db->set('password', $newpwd_hash);
		$this->db->where('email', $email);
		$this->db->where('pin', $pin);	
		
		if($this->db->update('users')){
			$msg = "Password baru anda adalah <b>".$newpwd."</b>. <br>Silahkan login dan kemudian ganti password anda agar memudahkan dalam proses login selanjutnya.";
			$subject = "Password baru anda. - SMK Ma'arif NU 1 Sumpiuh";
			if($this->mail($email,$msg,$subject)){
				$this->session->set_flashdata('emailsent',$email);
				return true;
			}
		} 

		//return true;	
	}

	function mail($email,$msg,$subject){
		//https://myaccount.google.com/lesssecureapps
		//In Gmail: configuration -> pop/imap -> enable pop 
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = '***REMOVED***';
		$config['smtp_pass']    = '***REMOVED***';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // text or html
		$config['validation'] = TRUE; // bool whether to validate email or not  

		/*$config = array(
		"protocol" => "smtp", 
		"smtp_host" => "ssl://smtp.googlemail.com",
		"smtp_port" => 465,
		"smtp_user" => "***REMOVED***",
		"smtp_pass" => "***REMOVED***",
		"mailtype" => "html",
		"charset" => "iso-8859-1",
		"wordwrap" => TRUE);*/

		$this->email->initialize($config);

		$this->email->from('***REMOVED***', 'Admin');
		$this->email->to($email);

		$this->email->subject($subject);
		$this->email->message($msg);

		if($this->email->send()){
			return true;
		}

		//echo $this->email->print_debugger();
	}


	function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
?>