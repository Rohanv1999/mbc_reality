<?php


if (!function_exists("_getWhere")) {
    function _getWhere($table, $whereCondition, $multipleRow = 'no')
    {
        $CI = &get_instance();
        $CI->db->from($table);
        $CI->db->where($whereCondition);
        if ($multipleRow == 'no') {
            return $CI->db->get()->row();
        } else {
            return $CI->db->get()->result();
        }
    }
}
