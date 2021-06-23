<?php

// fungsi untuk mengecek apakah sudah login atau belum
// Jika sudah login maka akan dialhikan ke halaman admin
// Difokuskan untuk yang sudah login
function is_logged_in()
{
	$ths = &get_instance();
	// Cek jika user udah login, tapi mau balik ke halaman login
	if ($ths->session->userdata('username')) {
		// Redirect in aja ke admin
		redirect('admin');
	}
}

// fungsi untuk mengecek apakah sudah login atau belum
// Jika belum login maka akan dialhikan ke halaman user
// Difokuskan untuk yang belum login
// Agar admin tidak bisa mengakses halaman user/customer
// Agar user/customer tidak bisa mengakses halaman admin
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

// Untuk mengaktifkan menu di home
function activeMenu($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(2), $arrayMenu) ?: 'class="active"';
}
// Untuk mengaktifkan menu di home
function activeMenuHome($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(1), $arrayMenu) ?: 'class="active"';
}
// Untuk memfilter string yang masuk dari input customer/user
function xss_filter($input)
{
	return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}
