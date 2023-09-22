<?php
    // set default value
    $current_page = 'home';

    if(array_key_exists('page', $_GET)){
        $current_page = $_GET['page'];
    }

    switch($current_page){
        case 'artikel';
        require 'page/artikel.php';
        break;

        case 'about';
        require 'page/about.php';
        break;

        case 'team';
        require 'page/team.php';
        break;

        case 'registrasi_anggota';
        require 'page/reg_anggota.php';
        break;

        case 'foto';
        require 'page/foto.php';
        break;

        case 'video';
        require 'page/video.php';
        break;

        case 'kontak';
        require 'page/kontak.php';
        break;

        case 'read';
        require 'page/read.php';
        break;

        case 'info_ppdb';
        require 'page/info_ppdb.php';
        break;

        case 'home':
        require 'page/home.php';
        break;
        
        default:
            require 'page/wrong-page.php';
    }
?>