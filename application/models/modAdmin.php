<?php

class modAdmin extends CI_Model
{
    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');

        // call the model constructor
        parent::__construct();
    }

    public function checkedAdmin($data)
    {
        return $this->db->get_where('users',$data) //'admin'-----> table
        ->result_array();
    }

    function get_user_data($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE aId='$id'");
        $result = $query->result_array();
        $count = count($result);

        if(empty($count) || $count > 1)
        {
            $log = 0;
            return $log ;
        }
        else
        {
            return $result;
        }
    }

    public function createUser($data)
    {
        return $this->db->insert('users', $data);
    }

    public function updateUser($data)
    {
        $this->db->where('aId',$id);
        return $this->db->update('users', $data);
    }
    
    public function get_user($id)
    {
        $this->db->where('aId', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_user($id, $userdata)
    {

        return $this->db->query("UPDATE users set aPassword='$userdata'  where aId='$id'");
    }
    // function change_pass($id,$new_pass)
	// {
	// return $this->db->query("UPDATE users set pass='$new_pass'  where aId='$id'");
	// }

    


//CRUD Functionality
    public function addnewProduct($data)
    {
        return $this->db->insert('products', $data);
    }

    public function getAllProducts()
    {
        return $this->db->get_where('products', array())->num_rows();
        // $this->db->select('*');
        // $this->db->from('register');
        // $objQuery = $this->db->get(); ALTER TABLE register RENAME TO products;
        // return $objQuery->result_array();
    }

    public function fetchAllProducts($limit,$start)
    {
        $this->db->limit($limit,$start);
        $query = $this->db->get_where('products', array());
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }

    }

    public function checkProductbyId($p_id)
    {
       return $this->db->get_where('products',array('p_id'=>$p_id))->result_array();
    }

    public function updateProduct($data,$pid)
    {
        $this->db->where('p_id',$pid);
        return $this->db->update('products', $data);
    }

    public function deletedProduct($pId)
    {
        // $this->db->where('u_id',$uId);
        // return $this->db->delete('register');
        return $this->db->delete('products', array('p_id' => $pId));

    }

    // public function get_all_register_detail()
    // {
    //     $this->db->select('*');
    //     $this->db->from('register');
    //     $objQuery = $this->db->get();
    //     return $objQuery->result_array();
    // }
    // public function get_id_wise_register_detail($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('register');
    //     $this->db->where('id', $id);
    //     $objQuery = $this->db->get();
    //     return $objQuery->result_array();
    // }

    // public function insert($arrData)
    // {
    //     if ($this->db->insert('register', $arrData))
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    // public function update($editData, $id) 
    // {
    //     $this->db->where('id', $id);

    //     if ($this->db->update('register', $editData))
    //     {
    //         return true;
    //     } 
    //     else 
    //     {
    //         return false;
    //     }
    // }

    // function delete($id)
    // {

    //     if ($this->db->delete('register', array('id' => $id)))
    //     {
    //         return true;
    //     } 
    //     else 
    //     {
    //         return false;
    //     }
    // }
}
?>