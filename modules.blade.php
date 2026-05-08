<?php
add_option('template',[
     ['Logo Header','file','image/png,image/jpeg'],
    ['Body Style',['Default','Boxed']],
    ['Body Background Color','color'],
    ['Body Background Image','file','image/png,image/jpeg'],
    ['Header Style',['Default','Header 1','Header 2','Header 3','Header 4','Header 5','Header 6','Header 7']],
    ['Navigation Style',['Static','Fixed']],
    ['Home Style',['Default','Home 1','Home 2']],
    ['Scheme Color',['Skin 1','Skin 2','Skin 3','Skin 4','Skin 5','Skin 6','Skin 7','Skin 8']],

]);
use_module([
    'sambutan'=>true,
    'download'=>['active'=>true,'web'=>['auto_query'=>true,'post_perpage'=>20]] ,
    'pengumuman'=>true,
    'kepegawaian'=>true,
    'galeri'=>true,
]);
add_controller(['StatistikController.php']);

// ==========================================
// STATISTIK - HALAMAN UTAMA
// ==========================================
add_route('admin',[
    'title'=>'Statistik',
    'name'=>'admin.statistik',
    'icon'=>'fa-solid fa-chart-bar',
    'path'=>'statistik',
    'method'=>['get','post'],
    'function'=>'index',
    'controller'=>'App\Http\Controllers\StatistikController',
    'show_in_sidebar'=>true,
]);
add_route('admin', [
    'title' => 'Statistik',
    'name' => 'admin.statistik.type',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik/{type}',
    'method' => ['get', 'post'],
    'function' => 'type',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);

// ==========================================
// DATA UMUM - CRUD API
// ==========================================
add_route('admin', [
    'title' => 'Data Umum Datatables',
    'name' => 'admin.statistik.dataumum.datatables',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/data-umum/datatables',
    'method' => ['get','post'],
    'function' => 'dataUmumDatatables',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Data Umum Store',
    'name' => 'admin.statistik.dataumum.store',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/data-umum/store',
    'method' => ['post'],
    'function' => 'dataUmumStore',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Data Umum Edit',
    'name' => 'admin.statistik.dataumum.edit',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/data-umum/edit/{id}',
    'method' => ['get'],
    'function' => 'dataUmumEdit',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Data Umum Delete',
    'name' => 'admin.statistik.dataumum.delete',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/data-umum/delete/{id}',
    'method' => ['post'],
    'function' => 'dataUmumDelete',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);

// ==========================================
// TOPOGRAFI - CRUD API
// ==========================================
add_route('admin', [
    'title' => 'Topografi Datatables',
    'name' => 'admin.statistik.topografi.datatables',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/topografi/datatables',
    'method' => ['get','post'],
    'function' => 'topografiDatatables',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Topografi Store',
    'name' => 'admin.statistik.topografi.store',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/topografi/store',
    'method' => ['post'],
    'function' => 'topografiStore',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Topografi Edit',
    'name' => 'admin.statistik.topografi.edit',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/topografi/edit/{id}',
    'method' => ['get'],
    'function' => 'topografiEdit',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Topografi Delete',
    'name' => 'admin.statistik.topografi.delete',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/topografi/delete/{id}',
    'method' => ['post'],
    'function' => 'topografiDelete',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);

// ==========================================
// PENDUDUK - CRUD API
// ==========================================
add_route('admin', [
    'title' => 'Penduduk Datatables',
    'name' => 'admin.statistik.penduduk.datatables',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/penduduk/datatables',
    'method' => ['get','post'],
    'function' => 'pendudukDatatables',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Penduduk Store',
    'name' => 'admin.statistik.penduduk.store',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/penduduk/store',
    'method' => ['post'],
    'function' => 'pendudukStore',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Penduduk Edit',
    'name' => 'admin.statistik.penduduk.edit',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/penduduk/edit/{id}',
    'method' => ['get'],
    'function' => 'pendudukEdit',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Penduduk Delete',
    'name' => 'admin.statistik.penduduk.delete',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/penduduk/delete/{id}',
    'method' => ['post'],
    'function' => 'pendudukDelete',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Penduduk Chart',
    'name' => 'admin.statistik.penduduk.chart',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/penduduk/chart',
    'method' => ['get'],
    'function' => 'pendudukChart',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);

// ==========================================
// MONOGRAFI - CRUD API
// ==========================================
add_route('admin', [
    'title' => 'Monografi Datatables',
    'name' => 'admin.statistik.monografi.datatables',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/monografi/datatables',
    'method' => ['get','post'],
    'function' => 'monografiDatatables',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Monografi Store',
    'name' => 'admin.statistik.monografi.store',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/monografi/store',
    'method' => ['post'],
    'function' => 'monografiStore',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Monografi Delete',
    'name' => 'admin.statistik.monografi.delete',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/monografi/delete/{id}',
    'method' => ['post'],
    'function' => 'monografiDelete',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);

// ==========================================
// INFOGRAFIS - CRUD API
// ==========================================
add_route('admin', [
    'title' => 'Infografis Datatables',
    'name' => 'admin.statistik.infografis.datatables',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/infografis/datatables',
    'method' => ['get','post'],
    'function' => 'infografisDatatables',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Infografis Store',
    'name' => 'admin.statistik.infografis.store',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/infografis/store',
    'method' => ['post'],
    'function' => 'infografisStore',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
add_route('admin', [
    'title' => 'Infografis Delete',
    'name' => 'admin.statistik.infografis.delete',
    'icon' => 'fa-solid fa-chart-bar',
    'path' => 'statistik-api/infografis/delete/{id}',
    'method' => ['post'],
    'function' => 'infografisDelete',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);

// ==========================================
// CETAK PDF
// ==========================================
add_route('admin', [
    'title' => 'Cetak PDF Statistik',
    'name' => 'admin.statistik.cetak-pdf',
    'icon' => 'fa-solid fa-file-pdf',
    'path' => 'statistik-api/cetak-pdf',
    'method' => ['get'],
    'function' => 'cetakPdf',
    'controller' => 'App\Http\Controllers\StatistikController',
    'show_in_sidebar' => false,
]);
