<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/17
 * Time: 14:37
 */
function human_filesize($bytes,$decimals = 2){
    $size = ['B','KB','MB','GB','TB','PB'];
    $factor = floor((strlen($bytes))-1)/3;

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

function checked($value){
    return $value ? 'checked':'';
}

function page_image($value=null){
    if (empty($value)){
        $value = config('blog,page_image');
    }
    if (!starts_with($value,'http')&& $value[0]!=='/'){
        $value = config('blog.uploads.webpath').'/'.$value;
    }
    return $value;
}