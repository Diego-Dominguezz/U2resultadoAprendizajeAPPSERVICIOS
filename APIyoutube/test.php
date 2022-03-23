<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
$url = $_POST['url'];

}else{
    //echo "no entry";
    return;
}


function getYoutubeVideoID($url){

    $queryString = parse_url($url,PHP_URL_QUERY);
    parse_str($queryString,$params);
    // var_dump($queryString);
    // die();
    if(isset($params['v']) && strlen($params['v'])>0){
        return $params['v'];
    }else{
        return "Wrong youtube video url";
    }
}
$vidEoID = getYoutubeVideoID($url);
//$vidEoID = "https://www.youtube.com/watch?v=Kcm6LvSBfpg";
$api_key = "AIzaSyB-ODZFpeUFgHhKyzdpeBxZTJ7d235N08M"; //your API Key
$api_ur='https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='. $vidEoID.'&key='.$api_key;

$data = json_decode(file_get_contents($api_ur));
// echo " <pre>";
// print_r($data);
// echo "</pre>";
