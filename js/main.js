//调用接口
function jx(){
    var ym = window.location.href;
    //获取到视频链接
    var url = $("#link").val();
    var hr  = "<hr style='border: 0; height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);'>";
    index = layer.load(2, { shade: [0.5, '#fff'] }); 
    $.ajax({
        url:'api/api.php',
        type:'POST',
        data: {url:url},
        dataType: "json", 
        success: function(data) {
            layer.close(index);
            if(data.code==200){
              if(data.lx == "图集"){
                //图集
                layer.msg("小红书图集解析成功！可点击放大观看~");
                var tj_html ="";
                //图集标题
                $("#tj").val(data['data']['title'])
                //图集照片
                for(var i=0;i < data['data']['img'].length;i++){
                    tj_html += '<div class="layui-colla-item"><img width="80%" data-original="'+ym+'api/tp.php?url='+data['data']['img'][i]+'" src="'+ym+'api/tp.php?url='+data['data']['img'][i]+'"></div>';
                }
                $('#xhsv2').show();
                $('#tuji').show();
                $('#xhsv').hide();
                $('#shiping').hide();
                $('#view').html(tj_html);
                var viewer = new Viewer(document.getElementById('view'),{
                    url: 'data-original'
                });
               }else{
                 //视频
                layer.msg("小红书短视频解析成功");
                var tj_html ='<div id="mui-player"></div>';
                //图集标题
                $("#spbt").val(data['data']['title'])
                $("#splj").val(data['data']['url'])
                $("#spfm").val(data['data']['fm'])
                //图集照片
                $('#xhsv').show();
                $('#shiping').show();
                $('#xhsv2').hide();
                $('#tuji').hide();
                $('#sp').html(tj_html); 
                 var mp = new MuiPlayer({
                    container: '#mui-player',
                    poster:ym+"api/tp.php?url="+data['data']['fm'],
                    src: ym+"api/sp.php?url="+data['data']['url'],
                    dragSpotShape:"square",
                    preload:"auto",
                    })
               }
            }else{
                layer.msg(data.msg);
            }
        }
    }); 
}

function cz(){
    //重置视频链接
    var url = $("#link").val("");
    layer.msg("重置完毕，干干净净")
}