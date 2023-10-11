<?php
    // set default value
    $current_page = 'home';

    if(array_key_exists('page', $_GET))
    {
        $current_page = $_GET['page'];
    }

    switch($current_page){
        case 'profile';
        require 'page/profile.php';
        break;

        case 'home':
        require 'page/home.php';
        break;

        case 'update_password';
        require 'page/update-password.php';
        break;

        case 'account';
        require 'page/manajemen-akun.php';
        break;

        case 'slider';
        require 'page/slider.php';
        break;

        case 'portal';
        require 'page/portal.php';
        break;

        case 'anggota';
        require 'page/anggota.php';
        break;

        case 'galery_foto';
        require 'page/galery_foto.php';
        break;

        case 'galery_video';
        require 'page/galery_video.php';
        break;

        case 'about';
        require 'page/about.php';
        break;

        case 'kontak';
        require 'page/kontak.php';
        break;

        case 'hub';
        require 'page/hub.php';
        break;

        case 'info_ppdb';
        require 'page/ppdb_info.php';
        break;

        case 'logs';
        require 'page/logs.php';
        break;

        case 'help';
        require 'page/help.php';
        break;

        case 'ticket';
        require 'page/tiket.php';
        break;

        case 'info_hd';
        require 'page/info_hd.php';
        break;

        case 'version_control';
        require 'page/ver-control.php';
        break;
        
        default:
            require 'page/wrong-page.php';
    }
?>