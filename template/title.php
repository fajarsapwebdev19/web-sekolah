<?php
    // set default value
    $current_page = 'home';

    if(array_key_exists('page', $_GET)){
        $current_page = $_GET['page'];
    }

    switch($current_page){
        case 'artikel';
        $title = 'Artikel';
        break;

        case 'about';
        $title = 'Tentang Kami';
        break;

        case 'team';
        $title = 'Tim';
        break;

        case 'registrasi_anggota';
        $title = 'Registrasi Anggota';
        break;

        case 'foto';
        $title = 'Foto';
        break;

        case 'video';
        $title = 'Video';
        break;

        case 'kontak';
        $title = 'Kontak';
        break;

        case 'read';
        $title = 'Read Artikel';
        break;

        case 'yayasan';
        $title = 'Yayasan';
        break;

        case 'klinik';
        $title = 'Klinik';
        break;

        case 'koperasi':
        $title = 'Koperasi';
        break;

        case 'home':
        $title = 'Home';
        break;
        
        default:
            $title = 'Wrong Page';
    }
?>