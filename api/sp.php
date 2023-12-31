<?php
$url = $_REQUEST['url'];
ini_set('memory_limit', '1024M'); //修改脚本的最大运行内存
set_time_limit(600); //设置超时限制为 10分钟
 
//输出视频流
function outPutStream($videoUrl) {
    
    if(!$videoUrl){
        header('HTTP/1.1 500 Internal Server Error');
        echo "Error: Video cannot be played !";
	    exit();
    }
    
    //获取视频大小
    $header_array = get_headers($videoUrl, true);
    $sizeTemp = $header_array['Content-Length'];
    if (is_array($sizeTemp)) {
        $size = $sizeTemp[count($sizeTemp) - 1];
    } else {
        $size = $sizeTemp;
    }
   
    //初始参数
    $start = 0;
    $end = $size - 1;
    $length = $size;
    $buffer = 1024 * 1024 * 5; // 输出的流大小 5m
    
    //计算 Range
    $ranges_arr = array();
    if (isset($_SERVER['HTTP_RANGE'])) {
        
        if (!preg_match('/^bytes=\d*-\d*(,\d*-\d*)*$/i', $_SERVER['HTTP_RANGE'])) {
            header('HTTP/1.1 416 Requested Range Not Satisfiable');
        }
        $ranges = explode(',', substr($_SERVER['HTTP_RANGE'], 6));
        foreach ($ranges as $range) {
            $parts = explode('-', $range);
            $ranges_arr[] = array($parts[0], $parts[1]);
        }
        $ranges = $ranges_arr[0];
        $start = (int)$ranges[0];
        if ($ranges[1] != '') {
            $end = (int)$ranges[1];
        }
        $length = min($end - $start + 1, $buffer);
        $end = $start + $length - 1;
    }else{
        
        // php 文件第一次浏览器请求不会携带 RANGE 为了提升加载速度 默认请求 1 个字节的数据
        $start=0;
        $end=1;
        $length=2;
    }
 
    //添加 Range 分段请求
    $header = array("Range:bytes={$start}-{$end}");
    #发起请求
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $videoUrl);
    curl_setopt($ch2, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, $header);
    //设置读取的缓存区大小
    curl_setopt($ch2, CURLOPT_BUFFERSIZE, $buffer);
    // 关闭安全认证
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
    //追踪返回302状态码，继续抓取
    curl_setopt($ch2, CURLOPT_HEADER, false);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch2, CURLOPT_NOBODY, false);
    curl_setopt($ch2, CURLOPT_REFERER, $videoUrl);
    //模拟来路
    curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36 Edg/85.0.564.44");
    $content = curl_exec($ch2);
    curl_close($ch2);
    #设置响应头
    header('HTTP/1.1 206 PARTIAL CONTENT');
    header("Accept-Ranges: bytes");
    header("Connection: keep-alive");
    header("Content-Type: video/mp4");
    header("Access-Control-Allow-Origin: *");
    //为了兼容 ios UC这类浏览器 这里加个判断 UC的 Content-Range 是 起始值-总大小减一
    if($end!=1){
        $end=$size-1;
    }
    header("Content-Range: bytes {$start}-{$end}/{$size}");
    //设置流的实际大小
    header("Content-Length: ".strlen($content));
    //清空缓存区
    ob_clean();
    //输出视频流
    echo $content;
    //销毁内存
    unset($content);
}
 
#输出视频流 视频地址可能失效，您可以换成你的来测试
outPutStream($url);
die();
?>
