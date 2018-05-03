<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pengguna extends MY_Model
{
	public function __construct()
	{
        $this->table = 'pengguna';
        $this->primary_key = 'pengguna_id';
        $this->soft_deletes = true;

		parent::__construct();
	}
}
/* End of file '/User_model.php' */
/* Location: ./application/models//User_model.php */