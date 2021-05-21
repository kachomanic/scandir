<?php

$function = $_POST['function'];

switch ($function) {
    case 'scan_dir':
        scan_url($_POST['main_dir']);
        break;
    default:
        //function not found, error or something
        break;
}

function scan_url($folder){
    $files = scandir($folder);
    $files = array_diff($files, array('.', '..'));
    display_content_folder($files, $folder);
}

function display_content_folder($files, $folder){
    $arr = array();
    $content = '';
    foreach($files as $elem => $value){
        if (is_dir($folder . '\\' . $value)){
            //$content .= '<a href="'. $folder .'\\'. $value .'">'. $folder . "\\" . $value .'</a>' . '<br>';
            array_push($arr, ['folder' => $folder . '\\' . $value]);
        }else{
            //$content .= $folder . "\\" . $value . '<br>';
            array_push($arr, ['url' => $folder . '\\' . $value]);
        }        
    }
    $json['resp'] = true;
    $json['content'] = $arr;
    echo json_encode($json);
}


?>