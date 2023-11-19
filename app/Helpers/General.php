<?php

function uploadImage($folder , $image){
    // $image -> store('/' , $folder);
    $filename = $image->hashName();
    $image->move('images/'.$folder , $filename);
    $path = '/images/' . $folder . '/' . $filename;
    return $path;
}


