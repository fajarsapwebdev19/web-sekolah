<?php
    // set default value
    $current_page = 'home';

    if(array_key_exists('page', $_GET)){
        $current_page = $_GET['page'];
    }

    switch($current_page){
        case 'profile';
        $title = 'Profile User | Admin Panel';
        break;

        case 'home':
        $title = 'Dashboard | Admin Panel';
        break;

        case 'update_password';
        $title = 'Update Password | Admin Panel';
        break;

        case 'account';
        $title = 'Manajemen Akun | Admin Panel';
        break;

        case 'slider';
        $title = 'Slider Data | Admin Panel';
        break;

        case 'portal';
        $title = 'Portal Berita | Admin Panel';
        break;

        case 'anggota';
        $title = 'PTK | Admin Panel';
        break;

        case 'galery_foto';
        $title = 'Galeri Foto | Admin Panel';
        break;

        case 'galery_video';
        $title = 'Galeri Video | Admin Panel';
        break;

        case 'about';
        $title = 'Tentang Kami | Admin Panel';
        break;

        case 'kontak';
        $title = 'Kontak | Admin Panel';
        break;

        case 'hub';
        $title = 'Hubungan Kemitraan | Admin Panel';
        break;

        case 'logs';
        $title = 'Riwayat Pembaruan | Admin Panel';
        break;

        case 'help';
        $title = 'Help | Admin Panel';
        break;

        case 'info_ppdb';
        $title = 'Info PPDB | Admin Panel';
        break;

        case 'ticket';
        $title = 'Tiket | Admin Panel';
        break;

        case 'koperasi';
        $title = 'Koperasi | Admin Panel';
        break;
        
        default:
            $title = 'Error Page | Admin Panel';
    }
?>