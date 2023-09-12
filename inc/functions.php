<?php
if( !function_exists('pr') ){
    function pr($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if( !function_exists('dd') ){
    function dd($data){
        pr($data);
        die();
    }
}

if( !function_exists('mc_selected') ){
    function mc_selected($condition){
        echo $condition ? 'selected' : '';
    }
}

if( !function_exists('mc_checked') ){
    function mc_checked($condition){
        echo $condition ? 'checked' : '';
    }
}
if( !function_exists('mc_lang') ){
    function mc_lang($text){
        return __($text,'medical-connect');
    }
}