<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * function getter rule set validasi
 * @param $rule_set : nama rule set yang diminta
 * @return rule set yang diminta dalam bentuk associative array
 */
function get_rules($rule_set){
/// Include file dimana rules validasi dideskripsikan, rules berada dalam variabel $config
    include 'application/config/form_validation.php';
/// ambil rules set yang diminta
    $rules = $config[$rule_set];
    return $rules;
}
