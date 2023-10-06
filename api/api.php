<?php
error_reporting(0);
header("content-type:text/json;charset=UTF-8");

$url = $_REQUEST['url'];

if($url == ""){
    $data = array(
    'code' => 201, 
    'msg' =>"未检测到需要解析的小红书链接！"
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); 
    exit;
}

$jg = get("http://tools.txcnm.cn/xhs/api/api.php?url=".urlencode($url));

if($jg['code'] == 200){

//读取文本
$myfile = fopen("../1.dat", "r") or die("Unable to open file!");
$cs = fread($myfile,filesize("../1.dat"));
fclose($myfile);

$cs =(int)$cs+1;
//	写入文件
$myfile = fopen("../1.dat", "w") or die("Unable to open file!");
fwrite($myfile,$cs);
fclose($myfile);


    
    $data = array(
        'code' => 200, 
        'lx' =>$jg['lx'],
        'data'=>$jg['data']
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); 
}else{
    $data = array(
    'code' => 201, 
    'msg' =>$jg
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); 
}


function get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER,0);
    $output = curl_exec($ch);
    $jx = json_decode($output, true); 
    curl_close($ch);
    return $jx;
}
