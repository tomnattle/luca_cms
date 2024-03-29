@extends('layouts.admin')
@section('breadcrumb')
@endsection
@section('content')
<div class="dashboard">
    <div class="row ">
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-list-alt"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>用户</h4>
                    <h5><a href="/home/articles">2/11</a></h5>
                </div>
                
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-gift"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>站点</h4>
                    <h5><a href="/home/goods">22</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>消息</h4>
                    <h5><a href="/home/orders">33</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>职位</h4>
                    <h5><a href="/home/orders">1/33</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>错误</h4>
                    <h5><a href="/home/orders">1/33</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>异常</h4>
                    <h5><a href="/home/orders">1/33</a></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="context-nav">
                <li class="active"><a class="btn-alt" data-name="today" href="javascript:void(0);">今天<span class="sr-only">(current)</span></a></li>
                <li><a class="btn-alt" data-name="yesterday" href="javascript:void(0);">昨天</a></li>
                <li><a class="btn-alt" data-name="week" href="javascript:void(0);">一周</a></li>
                <li><a class="btn-alt" data-name="month" href="javascript:void(0);">一月</a></li>
            </ul>
        </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
            <div id="visite" style="width: 100%;height:200px; border:solid 0px #ccc;"></div>
      </div>
    </div>
    <div class="row" style="margin-top: 15px;">
      <div class="col-md-5">
          <div id="source" style="width: 100%;height:250px; "></div>
        </div>
        <div class="col-md-7">
          <div id="location" style="width: 100%;height:550px; border:solid 0px #ccc;"></div>
        </div>
        
    </div>
    
</div>

@endsection
@section('footscript')
<script type="text/javascript">
var active_today = [3];
var register_today = [10, 20, 100, 30, 200];
var visit_today = [0,100,23,345,1234,112];
var visit_yesterday = [0,10,123,145,234,12,15,155,321,123,45,12,0,0,0,0,0,0,0,0,0,0,0,0,0];
var visit_week = [1000,2200,311,2222,2344];
var visit_month = [0,20,100];
var visit_ip_today = [0,151,210,326,166];
var visit_ip_yesterday = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var visit_ip_week = null;
var visit_ip_month = [0,10,30];
var source_today =  [{"value":355, "name":"直接访问"},{"value":211, "name": "第三方网站"},{"value": 116,"name": "搜索引擎"}];
var source_yesterday = [{"value":315, "name":"直接访问"},{"value":420, "name": "第三方网站"},{"value": 336,"name": "搜索引擎"}];
var source_week = [{"value":0, "name":"直接访问"},{"value":0, "name": "第三方网站"},{"value": 0,"name": "搜索引擎"}];
var source_month = [{"value":0, "name":"直接访问"},{"value":0, "name": "第三方网站"},{"value": 0,"name": "搜索引擎"}];

var myChart = echarts.init(document.getElementById('visite'), 'macarons');
myChart.setOption(getVisiteOption("访问量", visit_today, visit_ip_today, register_today, active_today, range(0,24)));

var myChartSource = echarts.init(document.getElementById('source'), 'macarons');
myChartSource.setOption(getSourceOption(source_today));

var myLocationSource = echarts.init(document.getElementById('location'), 'macarons');
myLocationSource.setOption(getLocationOption());

$('.btn-alt').on('click', function(){
    $(this).parent().parent().find('li').removeClass('active');
    $(this).parent().addClass('active');
    if($(this).data('name') == 'today'){
        myChart.setOption(getVisiteOption("访问量", visit_today, visit_ip_today, range(0,24)));
        myChartSource.setOption(getSourceOption(source_today));
    }
    if($(this).data('name') == 'yesterday'){
        myChart.setOption(getVisiteOption("访问量", visit_yesterday, visit_ip_yesterday, range(0,24)));
        myChartSource.setOption(getSourceOption(source_yesterday));
    }
    if($(this).data('name') == 'week'){
        myChart.setOption(getVisiteOption("访问量", visit_week, visit_ip_week, range(0,7)));
        myChartSource.setOption(getSourceOption(source_week));
    }
    if($(this).data('name') == 'month'){
        myChart.setOption(getVisiteOption("访问量", visit_month, visit_ip_month, range(0,30)));
        myChartSource.setOption(getSourceOption(source_month));
    }
});


function range(start, end) {
    let result = [];
    for (var i = start; i <= end; i++) {
        result.push(i)
    }
    return result;
}
function randomData() {
    return Math.round(Math.random()*1000);
}


function getSourceOption(source_today){
    var option = {
        title: {
            text: '用户访问来源',
            subtext: '',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['直接访问', '第三方网站', '搜索引擎']
        },
        series: [{
            name: '访问来源',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data: source_today,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }],
        grid: {
            bottom: '0',
        }
    };
    return option;
}

function getVisiteOption(name, visit_today, visit_ip_today, register_today, active_today, cols){
    var option = {
        title : {
            text: name,
            subtext: ''
        },
        grid: {
            top: '20%',
            left: '6%',
            right: '0%',
            bottom: '10%',
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['页面访问','独立访问', '注册量', '活跃度']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                //dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                //restore : {show: true},
                //saveAsImage : {show: true}
            },
            axisPointer: {
              type: 'cross'
          }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : true,
                data : cols
            }
        ],
        yAxis: {
          type: 'value',
          axisLabel: {
              formatter: '{value} W'
          },
          axisPointer: {
              snap: true
          }
      },
        series : [
            {
                name:'页面访问',
                type:'line',
                data: visit_today,
                smooth: true,
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
            },
            {
                name:'独立访问',
                type:'line',
                data: visit_ip_today,
                markPoint : {
                    data : [
                        {name : '周最低', value : -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
            },
            {
                name:'注册量',
                type:'line',
                data: register_today,
                markPoint : {
                    data : [
                        {name : '周最低', value : -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
            },
            {
                name:'活跃度',
                type:'line',
                data: active_today,
                markPoint : {
                    data : [
                        {name : '周最低', value : -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
            }
        ]
    };
    return option;
}
function getLocationOption(){
  let data = [
      {name: '海门', value: 9},
      {name: '鄂尔多斯', value: 12},
      {name: '招远', value: 12},
      {name: '舟山', value: 12},
      {name: '齐齐哈尔', value: 14},
      {name: '盐城', value: 15},
      {name: '赤峰', value: 16},
      {name: '青岛', value: 18},
      {name: '乳山', value: 18},
      {name: '金昌', value: 19},
      {name: '泉州', value: 21},
      {name: '南通', value: 23},
      {name: '拉萨', value: 24},
      {name: '云浮', value: 24},
      {name: '上海', value: 25},
      {name: '攀枝花', value: 25},
      {name: '承德', value: 25},
      {name: '汕尾', value: 26},
      {name: '丹东', value: 27},
      {name: '瓦房店', value: 30},
      {name: '延安', value: 38},
      {name: '咸阳', value: 43},
      {name: '南昌', value: 54},
      {name: '柳州', value: 54},
      {name: '三亚', value: 54},
      {name: '泸州', value: 57},
      {name: '克拉玛依', value: 72}
  ];

  var geoCoordMap = {
     '海门':[121.15,31.89],
     '鄂尔多斯':[109.781327,39.608266],
     '招远':[120.38,37.35],
     '舟山':[122.207216,29.985295],
     '齐齐哈尔':[123.97,47.33],
     '盐城':[120.13,33.38],
     '赤峰':[118.87,42.28],
     '青岛':[120.33,36.07],
     '乳山':[121.52,36.89],
     '金昌':[102.188043,38.520089],
     '泉州':[118.58,24.93],
     '莱西':[120.53,36.86],
     '日照':[119.46,35.42],
     '胶南':[119.97,35.88],
     '南通':[121.05,32.08],
     '拉萨':[91.11,29.97],
     '云浮':[112.02,22.93],
     '梅州':[116.1,24.55],
     '文登':[122.05,37.2],
     '上海':[121.48,31.22],
     '攀枝花':[101.718637,26.582347],
     '威海':[122.1,37.5],
     '承德':[117.93,40.97],
     '厦门':[118.1,24.46],
     '汕尾':[115.375279,22.786211],
     '潮州':[116.63,23.68],
     '丹东':[124.37,40.13],
     '太仓':[121.1,31.45],
     '曲靖':[103.79,25.51],
     '烟台':[121.39,37.52],
     '福州':[119.3,26.08],
     '瓦房店':[121.979603,39.627114],
     '即墨':[120.45,36.38],
     '抚顺':[123.97,41.97],
     '玉溪':[102.52,24.35],
     '张家口':[114.87,40.82],
     '阳泉':[113.57,37.85],
     '莱州':[119.942327,37.177017],
     '湖州':[120.1,30.86],
     '汕头':[116.69,23.39],
     '昆山':[120.95,31.39],
     '宁波':[121.56,29.86],
     '湛江':[110.359377,21.270708],
     '揭阳':[116.35,23.55],
     '荣成':[122.41,37.16],
     '连云港':[119.16,34.59],
     '葫芦岛':[120.836932,40.711052],
     '常熟':[120.74,31.64],
     '东莞':[113.75,23.04],
     '河源':[114.68,23.73],
     '淮安':[119.15,33.5],
     '泰州':[119.9,32.49],
     '南宁':[108.33,22.84],
     '营口':[122.18,40.65],
     '惠州':[114.4,23.09],
     '江阴':[120.26,31.91],
     '蓬莱':[120.75,37.8],
     '韶关':[113.62,24.84],
     '嘉峪关':[98.289152,39.77313],
     '广州':[113.23,23.16],
     '延安':[109.47,36.6],
     '太原':[112.53,37.87],
     '清远':[113.01,23.7],
     '中山':[113.38,22.52],
     '昆明':[102.73,25.04],
     '寿光':[118.73,36.86],
     '盘锦':[122.070714,41.119997],
     '长治':[113.08,36.18],
     '深圳':[114.07,22.62],
     '珠海':[113.52,22.3],
     '宿迁':[118.3,33.96],
     '咸阳':[108.72,34.36],
     '铜川':[109.11,35.09],
     '平度':[119.97,36.77],
     '佛山':[113.11,23.05],
     '海口':[110.35,20.02],
     '江门':[113.06,22.61],
     '章丘':[117.53,36.72],
     '肇庆':[112.44,23.05],
     '大连':[121.62,38.92],
     '临汾':[111.5,36.08],
     '吴江':[120.63,31.16],
     '石嘴山':[106.39,39.04],
     '沈阳':[123.38,41.8],
     '苏州':[120.62,31.32],
     '茂名':[110.88,21.68],
     '嘉兴':[120.76,30.77],
     '长春':[125.35,43.88],
     '胶州':[120.03336,36.264622],
     '银川':[106.27,38.47],
     '张家港':[120.555821,31.875428],
     '三门峡':[111.19,34.76],
     '锦州':[121.15,41.13],
     '南昌':[115.89,28.68],
     '柳州':[109.4,24.33],
     '三亚':[109.511909,18.252847],
     '自贡':[104.778442,29.33903],
     '吉林':[126.57,43.87],
     '阳江':[111.95,21.85],
     '泸州':[105.39,28.91],
     '西宁':[101.74,36.56],
     '宜宾':[104.56,29.77],
     '呼和浩特':[111.65,40.82],
     '成都':[104.06,30.67],
     '大同':[113.3,40.12],
     '镇江':[119.44,32.2],
     '桂林':[110.28,25.29],
     '张家界':[110.479191,29.117096],
     '宜兴':[119.82,31.36],
     '北海':[109.12,21.49],
     '西安':[108.95,34.27],
     '金坛':[119.56,31.74],
     '东营':[118.49,37.46],
     '牡丹江':[129.58,44.6],
     '遵义':[106.9,27.7],
     '绍兴':[120.58,30.01],
     '扬州':[119.42,32.39],
     '常州':[119.95,31.79],
     '潍坊':[119.1,36.62],
     '重庆':[106.54,29.59],
     '台州':[121.420757,28.656386],
     '南京':[118.78,32.04],
     '滨州':[118.03,37.36],
     '贵阳':[106.71,26.57],
     '无锡':[120.29,31.59],
     '本溪':[123.73,41.3],
     '克拉玛依':[84.77,45.59],
     '渭南':[109.5,34.52],
     '马鞍山':[118.48,31.56],
     '宝鸡':[107.15,34.38],
     '焦作':[113.21,35.24],
     '句容':[119.16,31.95],
     '北京':[116.46,39.92],
     '徐州':[117.2,34.26],
     '衡水':[115.72,37.72],
     '包头':[110,40.58],
     '绵阳':[104.73,31.48],
     '乌鲁木齐':[87.68,43.77],
     '枣庄':[117.57,34.86],
     '杭州':[120.19,30.26],
     '淄博':[118.05,36.78],
     '鞍山':[122.85,41.12],
     '溧阳':[119.48,31.43],
     '库尔勒':[86.06,41.68],
     '安阳':[114.35,36.1],
     '开封':[114.35,34.79],
     '济南':[117,36.65],
     '德阳':[104.37,31.13],
     '温州':[120.65,28.01],
     '九江':[115.97,29.71],
     '邯郸':[114.47,36.6],
     '临安':[119.72,30.23],
     '兰州':[103.73,36.03],
     '沧州':[116.83,38.33],
     '临沂':[118.35,35.05],
     '南充':[106.110698,30.837793],
     '天津':[117.2,39.13],
     '富阳':[119.95,30.07],
     '泰安':[117.13,36.18],
     '诸暨':[120.23,29.71],
     '郑州':[113.65,34.76],
     '哈尔滨':[126.63,45.75],
     '聊城':[115.97,36.45],
     '芜湖':[118.38,31.33],
     '唐山':[118.02,39.63],
     '平顶山':[113.29,33.75],
     '邢台':[114.48,37.05],
     '德州':[116.29,37.45],
     '济宁':[116.59,35.38],
     '荆州':[112.239741,30.335165],
     '宜昌':[111.3,30.7],
     '义乌':[120.06,29.32],
     '丽水':[119.92,28.45],
     '洛阳':[112.44,34.7],
     '秦皇岛':[119.57,39.95],
     '株洲':[113.16,27.83],
     '石家庄':[114.48,38.03],
     '莱芜':[117.67,36.19],
     '常德':[111.69,29.05],
     '保定':[115.48,38.85],
     '湘潭':[112.91,27.87],
     '金华':[119.64,29.12],
     '岳阳':[113.09,29.37],
     '长沙':[113,28.21],
     '衢州':[118.88,28.97],
     '廊坊':[116.7,39.53],
     '菏泽':[115.480656,35.23375],
     '合肥':[117.27,31.86],
     '武汉':[114.31,30.52],
     '大庆':[125.03,46.58]
  };

  function convertData(data) {
     var res = [];
     for (var i = 0; i < data.length; i++) {
         var geoCoord = geoCoordMap[data[i].name];
         if (geoCoord) {
             res.push({
                 name: data[i].name,
                 value: geoCoord.concat(data[i].value)
             });
         }
     }
     return res;
  };

  function randomValue() {
      return Math.round(Math.random()*1000);
  }


  option = {
      title: {
          text: 'iphone销量',
          subtext: '',
          left: 'center'
      },
      tooltip: {
          trigger: 'item'
      },
      legend: {
          orient: 'vertical',
          left: 'left',
          data:['访问量','用户量','站点量']
      },
      visualMap: {
          min: 0,
          max: 2500,
          left: 'left',
          top: 'bottom',
          text: ['高','低'],           // 文本，默认为数值文本
          calculable: true
      },
      toolbox: {
          show: true,
          orient: 'vertical',
          left: 'right',
          top: 'center',
          feature: {
              dataView: {readOnly: false},
              restore: {},
              saveAsImage: {}
          }
      },
      series: [
          {
              name: '访问量',
              type: 'map',
              mapType: 'china',
              roam: false,
              label: {
                  normal: {
                      show: false
                  },
                  emphasis: {
                      show: false
                  }
              },
              data:[
                  {name: '北京',value: randomData() },
                  {name: '天津',value: randomData() },
                  {name: '上海',value: randomData() },
                  {name: '重庆',value: randomData() },
                  {name: '河北',value: randomData() },
                  {name: '河南',value: randomData() },
                  {name: '云南',value: randomData() },
                  {name: '辽宁',value: randomData() },
                  {name: '黑龙江',value: randomData() },
                  {name: '湖南',value: randomData() },
                  {name: '安徽',value: randomData() },
                  {name: '山东',value: randomData() },
                  {name: '新疆',value: randomData() },
                  {name: '江苏',value: randomData() },
                  {name: '浙江',value: randomData() },
                  {name: '江西',value: randomData() },
                  {name: '湖北',value: randomData() },
                  {name: '广西',value: randomData() },
                  {name: '甘肃',value: randomData() },
                  {name: '山西',value: randomData() },
                  {name: '内蒙古',value: randomData() },
                  {name: '陕西',value: randomData() },
                  {name: '吉林',value: randomData() },
                  {name: '福建',value: randomData() },
                  {name: '贵州',value: randomData() },
                  {name: '广东',value: randomData() },
                  {name: '青海',value: randomData() },
                  {name: '西藏',value: randomData() },
                  {name: '四川',value: randomData() },
                  {name: '宁夏',value: randomData() },
                  {name: '海南',value: randomData() },
                  {name: '台湾',value: randomData() },
                  {name: '香港',value: randomData() },
                  {name: '澳门',value: randomData() }
              ]
          },
          {
              name: '用户量',
              type: 'map',
              mapType: 'china',
              label: {
                  normal: {
                      show: true
                  },
                  emphasis: {
                      show: true
                  }
              },
              data:[
                  {name: '北京',value: randomData() },
                  {name: '天津',value: randomData() },
                  {name: '上海',value: randomData() },
                  {name: '重庆',value: randomData() },
                  {name: '河北',value: randomData() },
                  {name: '安徽',value: randomData() },
                  {name: '新疆',value: randomData() },
                  {name: '浙江',value: randomData() },
                  {name: '江西',value: randomData() },
                  {name: '山西',value: randomData() },
                  {name: '内蒙古',value: randomData() },
                  {name: '吉林',value: randomData() },
                  {name: '福建',value: randomData() },
                  {name: '广东',value: randomData() },
                  {name: '西藏',value: randomData() },
                  {name: '四川',value: randomData() },
                  {name: '宁夏',value: randomData() },
                  {name: '香港',value: randomData() },
                  {name: '澳门',value: randomData() }
              ]
          },
          {
              name: '站点量',
              type: 'map',
              mapType: 'china',
              label: {
                  normal: {
                      show: false
                  },
                  emphasis: {
                      show: false
                  }
              },
              data:[
                  {name: '北京',value: randomData() },
                  {name: '天津',value: randomData() },
                  {name: '上海',value: randomData() },
                  {name: '广东',value: randomData() },
                  {name: '台湾',value: randomData() },
                  {name: '香港',value: randomData() },
                  {name: '澳门',value: randomData() }
              ]
          }
      ]
  };         
  return option;
}
</script>
@endsection