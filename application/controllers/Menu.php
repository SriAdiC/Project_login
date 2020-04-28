<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    calendar();
    $this->load->model('Menu_model', 'menu');
  }

  // start from menu

  // add new menu
  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['calendar'] = $this->calendar->generate();
    $data['menu'] = $this->db->get('user_menu')->result_array();


    $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', 'Added');
      redirect('menu');
    }
  }
  // end add new menu

  // start edit menu

  public function editMenu()
  {

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Updated Failed!');
      redirect('menu');
    } else {
      $this->db->set('menu', $this->input->post('menu'));
      $this->db->where('id', $this->input->post('menu_id'));
      $this->db->update('user_menu');
      $this->session->set_flashdata('message', 'Updated');
      redirect('menu');
    }
  }

  // end edit menu

  // start delete menu

  public function delete($id)
  {
    $this->menu->deleteMenu($id);
    $this->session->set_flashdata('message', 'Deleted!');
    redirect('menu');
  }

  // end delete menu

  // end from menu


  // start submenu

  // add submenu

  public function subMenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['calendar'] = $this->calendar->generate();
    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', 'Added');
      redirect('menu/submenu');
    }
  }

  // end add submenu

  // edit submenu

  public function editsubmenu()
  {
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Update failed!');
      redirect('menu/submenu');
    } else {
      $data = [
        'id' => $this->input->post('submenu_id'),
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->where('id', $this->input->post('submenu_id'));
      $this->db->update('user_sub_menu', $data);
      $this->session->set_flashdata('message', 'Updated');
      redirect('menu/submenu');
    }
  }

  // end edit submenu

  // start delete submenu

  public function deleteSubmenu($id)
  {
    $this->menu->deleteSubmenu($id);
    $this->session->set_flashdata('message', 'Deleted');
    redirect('menu/submenu');
  }
  // end delete submenu
  // end submenu

}
