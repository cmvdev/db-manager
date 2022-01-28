<?php
class AdminModel extends \system\Model 
{	public  function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
		return $this->db->get('customer');
	}

	public function getCustomerById($id)
	{
		return $this->db->getWhere('customer', 'id='.$id);
	}

	public function setCustomerById($id, $data)
	{
		return $this->db->update('customer',$data, 'id='.$id);
	}

	public function deleteCustomerById($id)
	{
		return $this->db->delete('customer', 'id='.$id);
	}

	public function insertCustomer($data)
	{
		return $this->db->insert('customer', $data);
	}


	public function getCustomerWhere($data)
	{
		$where ="";
		foreach ($data as $key=>$value) {
			$where.=$key."='".$value."'";
			if(array_search($key, array_keys($data)) !== (sizeof($data)-1)){
				$where.=" AND ";
			}
		}
		return $this->db->getWhere('customer', $where);
	}


	public function getLastId()
	{
		return $this->db->lastInsertId();
	}
}
?>