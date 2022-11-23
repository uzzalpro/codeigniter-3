<?php

class Home extends CI_Controller
{
    public function index()
    {
        // $this->load->database();
        $this->load->view('header/header');
        $this->load->view('header/css');        
        $this->load->view('header/navbar');
        $this->load->view('home/mainHome');
        $this->load->view('header/footer');        
        $this->load->view('header/htmlclose');

    }

    public function about()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('css/extracss');
        $this->load->view('header/navbar');
        $this->load->view('about/about');
        $this->load->view('header/footer');
        $this->load->view('js/extrajs');
        $this->load->view('header/htmlclose');
    }

    public function login()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('login/index');
        $this->load->view('header/footer');
    }
}
