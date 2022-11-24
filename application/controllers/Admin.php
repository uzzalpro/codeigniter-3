<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modadmin');
    }

    public function index()
    {

        if ($this->session->userdata('aId'))
        {
            // $result = $this->Model_name->get_user_data($id);
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');        
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/index');
            $this->load->view('admin/header/footer');        
            $this->load->view('admin/header/htmlclose');
        }
        else
        {
            // $this->session->set_flashdata('error','please logged in first to access your admin panel');
            setFlashData('alert-danger', 'please logged in first to access your admin panel','admin/login');
            // redirect('admin/login'); 
        }

        
    }
    
    public function login()
    {
        $this->load->view('admin/login');
    }

    public function checkAdmin()
    {
        $data['aEmail'] = $this->input->post('email',true);
        $data['aPassword'] = sha1($this->input->post('password',true));
        

        if (!empty($data['aEmail']) && !empty($data['aPassword']))
        
        {
            $admindata= $this->modAdmin->checkedAdmin($data);
            if(count($admindata)==1)
                   {
                    $forSession = array('aId'=>$admindata[0]['aId'],'aFirst_name'=>$admindata[0]['aFirst_name'],'aLast_name'=>$admindata[0]['aLast_name'],'aEmail'=>$admindata[0]['aEmail'],'aPhoto'=>$admindata[0]['aPhoto']);
                    $this->session->set_userdata($forSession);
                    if ($this->session->userdata('aId'))
                    {
                        redirect('admin');
                    }
                    else
                    {
                        echo 'session is expaired';
                    }
                    // var_dump($admindata);
                    // redirect('admin/index');
                   }
                   else
                   {
                    // $this->session->set_flashdata('error','Email or Password are not match please check your email and password');
                    // redirect('admin/login');
                    setFlashData('alert-warning', 'Email or Password are not match please check your email and password','admin/login');
 
                   }
        }
        else
        {
        //   $this->session->set_flashdata('error','Please check the required fields');
        //   redirect('admin/login');       
        setFlashData('alert-warning', 'Please check the required fields','admin/login');
     
        }

   
        
    }


    public function logOut()
    {
        if ($this->session->userdata('aId'))
        {
            $this->session->set_userdata('aId','');
            $this->session->set_flashdata('error','you have successfully log out');
            redirect('admin/login');
            // $this->session->sess_destroy();
            // redirect('admin/login');
        }
        else
        {
            $this->session->set_flashdata('error','please logged now..');
            redirect('admin/login');
        }
    }


//Admin User Register
    public function RegisterAuser()
    {
        if (adminLoggedIn())
        {
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');        
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/RegisterUser');
            $this->load->view('admin/header/footer');        
            $this->load->view('admin/header/htmlclose');
        }
        else
        {
            setFlashData('alert-warning', 'login first to add user','admin/login');
        }
    }

    public function createAdminUser()
    {
        if (adminLoggedIn())
        {
            $data['aFirst_name'] = $this->input->post('FirstName', TRUE);
            $data['aLast_name'] = $this->input->post('LastName', TRUE);
            $data['aEmail'] = $this->input->post('UserEmail', TRUE);
            // $data['u_photo'] = $this->input->post('UserPhoto', TRUE);
            $data['aPassword'] = sha1($this->input->post('UserPassword', TRUE));
            // $password_encrypt = $this->encryption->encrypt($data);
            // $password_decrypt = $this->encryption->decrypt($password_encrypt);
            if (!empty($data['aFirst_name']) && !empty($data['aLast_name']) && !empty($data['aEmail']) && !empty($data['aPassword']))
            {
                $path = realpath(APPPATH.'../assets/profile/');
                $config['upload_path'] = $path;
                // $config['max_size'] = 100;
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('ProfilePhoto'))
                {
                    $error = $this->upload->display_errors();
                    setFlashData('alert-danger', 'error','admin/RegisterAuser');
                }
                else
                {
                    $fileName = $this->upload->data();
                    $data['aPhoto'] = $fileName['file_name'];
                    
                    // $customer_password = md5($_POST['customer_password']);   
                    // $customer_password_encrypt = $this->encryption->encrypt($customer_password);
                    // $customer_password_decrypt = $this->encryption->decrypt($customer_password_encrypt);
                }
                
                // $data['date'] = date('Y-M-d h:i:ss', TRUE);
                $addAdminData = $this->modAdmin->createUser($data);
                if ($addAdminData)
                {
                    setFlashData('alert-success', 'User Added Successfully','admin/RegisterAuser');
                }
                else
                {
                    setFlashData('alert-danger', 'User can not added try again','admin/RegisterAuser');
                }

            
            }
            else
            {
                setFlashData('alert-danger', 'blank field are requerid','admin/RegisterAuser');
            }
            
        }
        else
        {
            setFlashData('alert-danger', 'login first to add user','admin/login');
        }
    }

    public function editUserProfile($a_id)
    {
        if (adminLoggedIn())
        {
            if(!empty($a_id) && isset($a_id))
            {
                $data['user']=$this->modAdmin->get_user_data($a_id);
                if (count($data['user'])==1)
                {
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');        
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/editProfile',$data);
                    $this->load->view('admin/header/footer');        
                    $this->load->view('admin/header/htmlclose');
                }
                else
                {
                    setFlashData('alert-warning', 'user not found','admin/');
                }

            }
            else
            {
                setFlashData('alert-warning', 'something went worng ','admin/');
            }
        }
        else
        {
            setFlashData('alert-danger', 'login first to edit user','admin/');
        }
    }

    public function updateUser() //under construction
    {
        if (adminLoggedIn())
        {
            $this->load->library('form_validation');

            $userId = $this->session->userdata('aId');

            $this->form_validation->set_rules('aFirst_name','First Name','trim|required|max_length[200]|xss_clean');
            $this->form_validation->set_rules('aLast_name','Last Name','trim|required|max_length[200]|xss_clean');
            $this->form_validation->set_rules('aEmail','Email','trim|required|valid_email|xss_clean|max_length[200]');
            $this->form_validation->set_rules('aPhoto','Photo','trim|required|valid_email|xss_clean|max_length[]');


            if($this->form_validation->run() == FALSE)
            {
                $this->editUserProfile($userId);
            }
            else
            {
                $first_name = $this->input->post('aFirst_name');
                $first_name = $this->input->post('aLast_name');
                $email = $this->input->post('aEmail');
                $oldimg=$this->input->post('oldimgs',TRUE);
                if (!empty($data['aFirst_name']) && !empty($data['aLast_name']) && !empty($data['aEmail']) && isset($data['aFirst_name'],$data['aLast_name'],$data['aEmail']))
                {
                    if (isset($_FILES['ProfilePhoto']) && is_uploaded_file($_FILES['ProfilePhoto']['tmp_name']))
                    {
                        $path = realpath(APPPATH.'../assets/profile/');
                        $config['upload_path'] = $path;
                        // $config['max_size'] = 100;
                        $config['allowed_types'] = 'gif|png|jpg|jpeg';
                        $this->load->library('upload',$config);
                        if(!$this->upload->do_upload('ProfilePhoto'))
                        {
                            $error = $this->upload->display_errors();
                            setFlashData('alert-danger', 'error','admin/editUserProfile');
                        }
                        else
                        {
                            $fileName = $this->upload->data();
                            $data['aPhoto'] = $fileName['file_name'];                        
                        }
                    }//img cheking
                    
                $userInfo = array();

                if(empty($password))
                {
                    $userInfo = array('aEmail'=>$email, 'aFirst_name'=>$firstname, 'aLast_name'=>$lastname,'aPhoto'=>$photo);
                }
                else
                {
                    $userInfo = array('aEmail'=>$email, 'aFirst_name'=>$firstname, 'aLast_name'=>$lastname,'aPhoto'=>$photo);
                }
                    $reply = $this->modAdmin->updateUser($userInfo,$userId);
                    if($reply)
                    {
                        if (!empty($data['aPhoto']) && isset($data['aPhoto']))
                        {
                            if (file_exists($path.'/'.$oldimgs))
                            {
                                unlink($path.'/'.$oldimgs);
                            }
                        }
                        setFlashData('alert-success', 'User Updated Successfully','admin/editUserProfile');
                    }
                    else
                    {
                        setFlashData('alert-danger', 'cant not update user','admin/editUserProfile');
                    }

                }
                else
                {
                    setFlashData('alert-danger', 'user fieldrequeried','admin/editUserProfile');
                }
                
            }
            
           
        }
        else
        {
            setFlashData('alert-danger', 'login first to edit user','admin/editUserProfile');
        }
    }

    public function changePassword()
    {
        if (adminLoggedIn())
        {
            $data['title'] = 'Change Password';

            $this->load->library('form_validation');
    
            $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
            $this->form_validation->set_rules('newpass', 'new password', 'required');
            $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
    
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
            if($this->form_validation->run() == false)
            {
                $this->load->view('admin/header/header');
                $this->load->view('admin/header/css');        
                $this->load->view('admin/header/navtop');
                $this->load->view('admin/header/navleft');
                $this->load->view('admin/home/passwordChange',$data);
                $this->load->view('admin/header/footer');        
                $this->load->view('admin/header/htmlclose');
            }
            else
            {
    
                $id = $this->session->userdata('aId');
    
                $newpass = $this->input->post('newpass');
    
                $this->modAdmin->update_user($id, sha1($newpass));
                
    
                redirect('admin/logOut');          
            }
        }
    }

    public function password_check($oldpass)
    {
        $id = $this->session->userdata('aId');
        $user = $this->modAdmin->get_user($id);

        if($user->password == sha1($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }

// CRUD Functionality

    public function newProduct()
    {
        if (adminLoggedIn())
        {
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');        
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/addProduct');
            $this->load->view('admin/header/footer');        
            $this->load->view('admin/header/htmlclose');
        }
        else
        {
            setFlashData('alert-warning', 'login first to add Products','admin/login');
        }
    }
    
    public function addnewProduct()
    {
        if (adminLoggedIn())
        {
            $data['product_name'] = $this->input->post('ProductName', TRUE);
            $data['product_offer'] = $this->input->post('ProductOffer', TRUE);
            $data['product_details'] = $this->input->post('ProductDetails', TRUE);
            // $data['u_photo'] = $this->input->post('UserPhoto', TRUE);
            if (!empty($data['product_name']) && !empty($data['product_offer']) && !empty($data['product_details']))
            {
                $path = realpath(APPPATH.'../assets/Products/');
                $config['upload_path'] = $path;
                // $config['max_size'] = 100;
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('ProductPhoto'))
                {
                    $error = $this->upload->display_errors();
                    setFlashData('alert-danger', 'error','admin/newProduct');
                }
                else
                {
                    $fileName = $this->upload->data();
                    $data['product_photo'] = $fileName['file_name'];
                    $data['product_price'] = $this->input->post('ProductPrice', TRUE);
                }
                
                // $data['date'] = date('Y-M-d h:i:ss', TRUE);
                $addData = $this->modAdmin->addnewProduct($data);
                if ($addData)
                {
                    setFlashData('alert-success', 'Products Added Successfully','admin/newProduct');
                }
                else
                {
                    setFlashData('alert-danger', 'Products can not added try again','admin/newProduct');
                }

            
            }
            else
            {
                setFlashData('alert-danger', 'blank field are requerid','admin/newProduct');
            }
            
        }
        else
        {
            setFlashData('alert-danger', 'login first to add Products','admin/login');
        }
    }

    public function allProducts()
    {
        if (adminLoggedIn())
        {
            $config['base_url'] = site_url('admin/allProducts');
            $totalRows = $this->modAdmin->getAllProducts();
            $config['total_rows'] = $totalRows;
            $config['per_page'] = 5; 
            $config['uri_segment'] = 3;  
            $this->load->library('pagination');
            $this->load->initialize($config); 
            $page = ($this->uri->segment(3))? ($this->uri->segment(3)):0;        
            $data['allProduct'] = $this->modAdmin->fetchAllProducts($config['per_page'],$page);
            $data['links'] = $this->pagination->create_links(); 
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');        
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/productAll', $data);
            $this->load->view('admin/header/footer');        
            $this->load->view('admin/header/htmlclose');
        }
        else
        {
            setFlashData('alert-danger', 'login first to see all Products','admin/login');
        }
    }

    public function editProduct($p_id)
    {
        if (adminLoggedIn())
        {
            if(!empty($p_id) && isset($p_id))
            {
                $data['product']=$this->modAdmin->checkProductbyId($p_id);
                if (count($data['product'])==1)
                {
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');        
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/productEdit',$data);
                    $this->load->view('admin/header/footer');        
                    $this->load->view('admin/header/htmlclose');
                }
                else
                {
                    setFlashData('alert-warning', 'Products not found','admin/allProducts');
                }

            }
            else
            {
                setFlashData('alert-warning', 'something went worng ','admin/allProducts');
            }
        }
        else
        {
            setFlashData('alert-danger', 'login first to edit Products','admin/allProducts');
        }
    }

    public function updateProduct()
    {
        if (adminLoggedIn())
        {
            $data['product_name'] = $this->input->post('ProductName', TRUE);
            $data['product_offer'] = $this->input->post('ProductOffer', TRUE);
            $data['product_details'] = $this->input->post('ProductDetails', TRUE);
            $data['product_price'] = $this->input->post('ProductPrice', TRUE);
            $pid=$this->input->post('xid',TRUE);
            $oldimg=$this->input->post('oldimg',TRUE);
            if (!empty($data['product_name']) && !empty($data['product_offer']) && !empty($data['product_details']) && !empty($data['product_price']) && isset($data['product_name'],$data['product_offer'],$data['product_details'],$data['product_price']))
            {
                if (isset($_FILES['ProductPhoto']) && is_uploaded_file($_FILES['ProductPhoto']['tmp_name']))
                {
                    $path = realpath(APPPATH.'../assets/Products/');
                    $config['upload_path'] = $path;
                    // $config['max_size'] = 100;
                    $config['allowed_types'] = 'gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('ProductPhoto'))
                    {
                        $error = $this->upload->display_errors();
                        setFlashData('alert-danger', 'error','admin/newProduct');
                    }
                    else
                    {
                        $fileName = $this->upload->data();
                        $data['product_photo'] = $fileName['file_name'];                        
                    }
                }//img cheking
                $reply = $this->modAdmin->updateProduct($data,$pid);
                if($reply)
                {
                    if (!empty($data['product_photo']) && isset($data['product_photo']))
                    {
                        if (file_exists($path.'/'.$oldimg))
                        {
                            unlink($path.'/'.$oldimg);
                        }
                    }
                    setFlashData('alert-success', 'product Updated Successfully','admin/allProducts');
                }
                else
                {
                    setFlashData('alert-danger', 'cant not update product','admin/allProducts');
                }

            }
            else
            {
                setFlashData('alert-danger', 'product information fieldrequeried','admin/allProducts');
            }
           
        }
        else
        {
            setFlashData('alert-danger', 'login first to edit product','admin/allProducts');
        }
    }

    public function deleteProduct($id)
    {
        $delete = $this->modAdmin->deletedProduct($id);
        if ($delete)
        {
            setFlashData('alert-success', 'Product Delete Successfully','admin/allProducts');
        }
    }


    // public function deleteUser()
    // {
    //     if (adminLoggedIn())
    //     {
    //         if($this->input->is_ajax_request())
    //         {
    //             $this->input->post('id',TRUE);
    //             $uId = $this->input->post('text',TRUE);
    //             if (!empty($uId) && isset($uId))
    //             {
    //                 $this->encryption->decrypt($uId);
    //                 // die();
    //                 $checkMd = $this->modAdmin->deletedUser($uId);
    //                 // die();
    //                 if($checkMd)
    //                 {
    //                     echo 'successfully deleted';
    //                 }
    //                 else
    //                 {
    //                     echo 'can not deleted';
    //                 }
    //             }
    //             else
    //             {
    //                 echo 'value not exist';
    //             }
    //         }
    //         else
    //         {
    //             setFlashData('alert-danger', 'login first to edit user','admin/usersAll');
    //         }
    //     }
    //     else
    //     {
    //         setFlashData('alert-danger', 'login first to edit user','admin/usersAll');
    //     }
    // }


} //class end here
