<?php

function is_logged_in()
{
	$ths = &get_instance();
	if ($ths->session->userdata('username')) {
		redirect('admin');
	}
}
function is_logged_not_in()
{
	$ths = &get_instance();
	if ($ths->session->userdata('role_id') == 2 && $ths->uri->segment(1) == 'admin') {
		redirect('user');
	}
	if ($ths->session->userdata('role_id') == 1 && $ths->uri->segment(1) == 'user') {
		redirect('admin');
	}
	if (!$ths->session->userdata('username')) {
		$ths->session->set_flashdata('error', 'Login terlebih dahulu');
		redirect('auth');
	}
}

function activeMenu($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(2), $arrayMenu) ?: 'class="active"';
}
function activeMenuHome($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(1), $arrayMenu) ?: 'class="active"';
}
function xss_filter($input)
{
	return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}
