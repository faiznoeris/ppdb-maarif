<?php
class m_bobot_nilai extends CI_Model{
	function get_bobotnilai(){
		return $this->db->get_where("bobot_nilai",array('id' => '0'));
	}

	function update_bobot($data){
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$this->db->set($key, $value);
			}
		}

		$this->db->where('id', '0');
		$this->db->update('bobot_nilai');
		
		return true;
	}
}
?>