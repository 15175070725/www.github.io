<?php
$myfile = fopen("1.dat", "r") or die("Unable to open file!");
$cs = fread($myfile,filesize("1.dat"));
fclose($myfile);
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>小荭薯解析工具</title>
  <meta name="keywords" content="小荭薯解析工具">
  <meta name="renderer" content="webkit">
  <link rel="shortcut icon" href="https://tse2-mm.cn.bing.net/th/id/OIP-C.Ghn3imxcANo7WurcPbtFvwHaHf?w=212&h=215&c=7&r=0&o=5&pid=1.7" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://www.layuicdn.com/layui-v2.8.17/css/layui.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/mui-player.min.css"/>
  <script type="text/javascript" src="js/mui-player.min.js"></script>
  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/viewerjs/1.9.0/viewer.css">
<script src="https://cdn.bootcdn.net/ajax/libs/viewerjs/1.9.0/viewer.js"></script>
</head>

<body style="background-color: #ebebeb;">
  <div class="site-banner">
    <div class="site-banner-bg"
      style="background-image: url(https://t.mwm.moe/pc);background-color: rgb(45 47 54 / 26%);background-blend-mode:multiply;background-size: cover;"
      autumn="">
    </div>
    <div class="site-banner-main">
      <div class="layui-anim site-desc site-desc-anim">
        <p class="web-font-desc" style="text-align:center;font-weight:bold;">小荭薯视频/图集解析</p>
        <cite style="text-align:center;font-weight:bold;">小荭薯解析工具总被使用 <?php echo $cs; ?> 次</cite>
      </div>
    </div>
  </div>
  <div class="layui-container">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md">
        <div class="layui-panel showInUp">
          <div style="padding: 10px 18px;">
            <div class="layui-row">
              <div class="site-title">
                <fieldset>
                  <legend>
                    <a name="pane">解析功能</a>
                  </legend>
                </fieldset>
              </div>
              <div class="layui-form layui-form-pane">
                <div class="layui-form-item">
                  <label class="layui-form-label">小荭薯分享</label>
                  <div class="layui-input-block">
                    <input type="text" id="link" placeholder="小荭薯分享链接" autocomplete="off" class="layui-input">
                  </div>
                </div>
                <div class="layui-form-item">
                  <button class="layui-btn" lay-submit="" onclick="jx()" lay-filter="formDemo">立即解析</button>
                  <button type="reset" onclick="cz()" class="layui-btn layui-btn-primary">清空内容</button>
                </div>
              </div>
              <!--显示解析结果的区域-->
              <!--视频-->
              <div class="site-title" id="xhsv1" style="display:none;">
                <fieldset>
                  <legend>
                    <a name="musicdiv1">视频信息</a>
                  </legend>
                </fieldset>
              </div>
              <div id="shiping" class="layui-form layui-form-pane" style="display:none;">
                <div class="layui-form-item">
                  <label class="layui-form-label">视频标题</label>
                  <div class="layui-input-block">
                    <input type="text" id="spbt" autocomplete="off" class="layui-input">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">视频封面</label>
                  <div class="layui-input-block">
                    <input type="text" id="spfm" autocomplete="off" class="layui-input">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">视频链接</label>
                  <div class="layui-input-block">
                    <input type="text" id="splj" autocomplete="off" class="layui-input">
                  </div>
                </div>
                <div id="sp" align="center" class="layui-form-item">
                </div>
              </div>
              <!--图集-->
            <div class="site-title" id="xhsv2"  style="display:none;">
              <fieldset>
                 <legend>
                   <a name="musicdiv1">图集信息</a>
                 </legend>
              </fieldset>
            </div>
            <div id="tuji" class="layui-form layui-form-pane"  style="display:none;">
                <div class="layui-form-item">
                  <label class="layui-form-label">图集标题</label>
                  <div class="layui-input-block">
                    <input type="text" id="tj" autocomplete="off" class="layui-input">
                  </div>
                </div>
                <div class="layui-form-item" id="view" align="center">
                  <!--图片列表-->
                </div>
              </div>
              <!--显示解析结果的区域-->
              <div class="site-title">
                <fieldset>
                  <legend>
                    <a>站点信息</a>
                  </legend>
                </fieldset>
              </div>
              <div class="layui-collapse">
                <div class="layui-colla-item">
                  <h2 class="layui-colla-title">联系站长
                    <i class="layui-icon layui-colla-icon"></i>
                  </h2>
                  <div class="layui-colla-content">
                    <div class="layui-field-box">联系方式：3310569213</div>
                  </div>
                </div>
              </div>
              <div class="layui-collapse">
                <div class="layui-colla-item">
                  <h2 class="layui-colla-title">使用说明
                    <i class="layui-icon layui-colla-icon"></i>
                  </h2>
                  <div class="layui-colla-content">
                    <div class="layui-field-box">上方输入想要解析的小荭薯分享链接
                      <br>等待解析完毕后点击链接即可进行下载
                      <br>如果输入后出现错误则是粘贴的链接有问题
                    </div>
                  </div>
                </div>
              </div>
              <div class="layui-collapse">
                <div class="layui-colla-item">
                  <h2 class="layui-colla-title">关于版权

                    <i class="layui-icon layui-colla-icon"></i>
                  </h2>
                  <div class="layui-colla-content">
                    <div class="layui-field-box">本站不提供任何音视频存储服务
                      <br>只提供最基本的解析服务
                      <br>如有版权问题 可以联系上方本站作者
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="layui-footer footer footer-index">
      <p>
        <span>Copyright © 2022-
          <a class="year">2023</a>
        </span>
        <a href="#" tppabs="#">小荭薯</a>
      </p>
      <p>
        <a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow">冀ICP备2023031367号</a>
      </p>
    </div>
    <br/>
  </div>
  <!--引入layui以及layer的js文件-->
  <script src="https://www.layuicdn.com/layui-v2.8.17/layui.js">
  </script>
  <script src="js/jquery.min.js">
  </script>
  <script>
      document.write('<script src="js/main.js?' + Math.random() + '"><\/script\>');
  </script>
  
</body>

</html>