<?php
class m_blacklist extends CI_Model{
	function get_data(){
		return $this->db->get('blacklist_temp');
	}
}
?>