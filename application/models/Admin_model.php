<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getRoleName()
    {
        $query = "SELECT `user`.`name`, `user`.`email`, `user_role`.`id`, `user_role`.`role`
                    FROM `user` JOIN `user_role`
                    ON `user`.`role_id` = `user_role`.`id` WHERE `user`.`role_id` != 1";

        return $this->db->query($query)->result_array();
    }
}
