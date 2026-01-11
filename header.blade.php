<!DOCTYPE html>
<html lang="id">
<head>
	<link rel="stylesheet" type="text/css" href="/template/formal/assets/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/template/formal/assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="/template/formal/assets/css/skin/{{ !empty(get_option('scheme_color')) ? str(get_option('scheme_color'))->slug() : 'skin-1' }}.css">
	<link rel="stylesheet" type="text/css" href="/template/formal/assets/css/templete.css">
	
	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="/template/formal/assets/plugins/revolution/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="/template/formal/assets/plugins/revolution/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER CSS END -->
<style>

.hero-slider {
    width: 100%;
    background: #f8f9fa;
}

/* Wrapper tidak memaksa tinggi */
.hero-image {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Gambar menjaga rasio asli */
.hero-image img {
    width: 100%;
    height: auto;      /* kunci rasio */
    max-height: 80vh;  /* aman di layar kecil */
    object-fit: contain;
}
/* WRAPPER */
.sidebar-banner-slider {
    width: 100%;
    position: relative;
}

/* ITEM */
.sidebar-banner-item {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* GAMBAR TIDAK CROP */
.sidebar-banner-item img {
    width: 100%;
    height: auto;
    object-fit: contain;
    border-radius: 10px;
    background: #f2f2f2;
}

/* BUTTON KIRI KANAN */
.sidebar-carousel-prev,
.sidebar-carousel-next {
    width: 36px;
    opacity: 0.8;
}

.sidebar-carousel-prev-icon,
.sidebar-carousel-next-icon {
    filter: invert(1);
}

/* POSISI TOMBOL (TENGAH VERTIKAL) */
.sidebar-carousel-prev {
    left: -10px;
}
.sidebar-carousel-next {
    right: -10px;
}

/* MOBILE */
@media (max-width: 576px) {
    .sidebar-carousel-prev,
    .sidebar-carousel-next {
        width: 30px;
    }
}
    .sidebar-popular {
    font-size: 14px;
}

.popular-thumb {
    width: 90px;
    height: 65px;
    border-radius: 8px;
    overflow: hidden;
    background: #f1f1f1;
}

.popular-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.popular-title {
    font-size: 14px;
    font-weight: 600;
    color: #212529;
    line-height: 1.4;
}

.popular-meta {
    font-size: 12px;
    color: #6c757d;
}

.popular-item:hover .popular-title {
    color: #0d6efd;
}

                                .sidebar-download {
    font-size: 14px;

}
.sidebar-item:first-child{
    margin-top: 0 !important;
    padding-top: 0 !important
}

.download-icon {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 12px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.download-icon.pdf { background: #dc3545; }
.download-icon.doc { background: #0d6efd; }
.download-icon.xls { background: #198754; }

.download-title {
    font-size: 14px;
    font-weight: 600;
    color: #212529;
    line-height: 1.4;
}

.download-meta {
    font-size: 12px;
    color: #6c757d;
}

.download-item:hover .download-title {
    color: #0d6efd;
}

                  .sidebar-binder {
    overflow: hidden;
    font-size: 14px;
}

/* Header */
.binder-header {
    font-weight: 600;
    border-bottom: 1px solid #e9ecef;
}

/* Body */
.binder-body {
    padding: 0 12px;
}

/* Item */
.binder-item {
    position: relative;
    display: flex;
    gap: 12px;
    padding: 14px 0;
    border-bottom: 1px dashed #dee2e6;
}

.binder-item:last-child {
    border-bottom: none;
}

/* Ring Binder */
.binder-ring {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #adb5bd;
    margin-top: 6px;
    position: relative;
}

.binder-ring::after {
    content: "";
    position: absolute;
    left: 4px;
    top: 10px;
    width: 2px;
    height: 100%;
    background: #dee2e6;
}

/* Content */
.binder-content {
    flex: 1;
}

.binder-title {
    font-size: 14px;
    font-weight: 600;
    color: #212529;
    line-height: 1.4;
    margin-bottom: 4px;
}

.binder-meta {
    font-size: 12px;
    color: #6c757d;
}

/* Hover */
.binder-item:hover .binder-title {
    color: #0d6efd;
}
.sidebar-sticky {
    position: sticky !important;
    top: 90px; /* sesuaikan tinggi header/navbar */
}
.page-wraper {
    overflow: visible !important;
}
</style>
</head>
<body id="bg" class="layout-light {{ !empty(get_option('body_style'))  ? str(get_option('body_style'))->lower() : ''}}" style="padding:0;{{ !empty(get_option('body_background_color'))?'background-color:'.get_option('body_background_color').';' : 'background-color:#fff;' }}{{ !empty(get_option('body_background_image')) && media_exists(get_option('body_background_image')) ?'background-image:url('.get_option('body_background_image').');' : null }}"><div id="loading-area"></div>
<div class="page-wraper">

@if(!empty(get_option('header_style')))
{{ get_element('header.'.str(get_option('header_style'))->slug()) }}
@else
{{ get_element('header.default') }}
@endif