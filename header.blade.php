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

</style>
</head>
<body id="bg" class="layout-light {{ !empty(get_option('body_style'))  ? str(get_option('body_style'))->lower() : ''}}" style="padding:0;{{ !empty(get_option('body_background_color'))?'background-color:'.get_option('body_background_color').';' : 'background-color:#fff;' }}{{ !empty(get_option('body_background_image')) && media_exists(get_option('body_background_image')) ?'background-image:url('.get_option('body_background_image').');' : null }}"><div id="loading-area"></div>
<div class="page-wraper">

@if(!empty(get_option('header_style')))
{{ get_element('header.'.str(get_option('header_style'))->slug()) }}
@else
{{ get_element('header.default') }}
@endif
