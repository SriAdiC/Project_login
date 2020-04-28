<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function editMenu($id)
    {
        $this->db->get_where('user_menu', ['id', $id])->row_array();
    }

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
    ON `user_sub_menu`.`menu_id` = `user_menu`.`id` ORDER BY `user_sub_menu`.`menu_id` ASC";

        return $this->db->query($query)->result_array();
    }

    public function editsubMenu($id)
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
    ON `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_sub_menu`.`id` = $id ORDER BY `user_sub_menu`.`menu_id` ASC";

        return $this->db->query($query)->row_array($id);
    }



    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function deleteSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}
