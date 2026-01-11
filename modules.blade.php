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
]);