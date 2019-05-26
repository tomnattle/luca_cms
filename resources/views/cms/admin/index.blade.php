@extends('layouts.cms')
@section('breadcrumb')
<li ><a class="active" href="/home">{{ $site['en_name'] }}.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}</a></li>
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
                    <h4>文章</h4>
                    <h5><a href="/home/articles">{{ $report['article'] }}</a></h5>
                </div>
                
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-gift"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>商品</h4>
                    <h5><a href="/home/goods">{{ $report['goods'] }}</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>订单</h4>
                    <h5><a href="/home/orders">{{ $report['order_new'] }}/{{ $report['order'] }}</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-flag"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>职位</h4>
                    <h5><a href="/home/jobs">{{ $report['job'] }}</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-globe"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>图片</h4>
                    <h5><a href="/home/sites">{{ $report['site'] }}/3</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="dashboard-item">
                <div class="side-left pull-left">
                    <span class="glyphicon glyphicon-globe"></span>
                </div>
                <div class="side-right pull-left">
                    <h4>消息</h4>
                    <h5><a href="/home/sites">{{ $report['site'] }}/3</a></h5>
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
        <div class="col-md-8">
            <div id="visite" style="width: 100%;height:250px; border:solid 0px #ccc;"></div>
        </div>
        <div class="col-md-4">
            <div id="source" style="width: 100%;height:250px;"></div>
        </div>
    </div>
    
</div>

@endsection
@section('footscript')
<script type="text/javascript">

var visit_today = {!! $report->formatdata['visit_today'] !!};
var visit_yesterday = {!! $report->formatdata['visit_yesterday'] !!};
var visit_week = {!! $report->formatdata['visit_week'] !!};
var visit_month = {!! $report->formatdata['visit_month'] !!};
var visit_ip_today = {!! $report->formatdata['visit_ip_today'] !!};
var visit_ip_yesterday = {!! $report->formatdata['visit_ip_yesterday'] !!};
var visit_ip_week = {!! $report->formatdata['visit_ip_week'] !!};
var visit_ip_month = {!! $report->formatdata['visit_ip_month'] !!};
var source_today =  {!! $report->formatdata['source_today'] !!};
var source_yesterday = {!! $report->formatdata['source_yesterday'] !!};
var source_week = {!! $report->formatdata['source_week'] !!};
var source_month = {!! $report->formatdata['source_month'] !!};

var myChart = echarts.init(document.getElementById('visite'), 'macarons');
myChart.setOption(getVisiteOption("访问量", visit_today, visit_ip_today, range(0,24)));

var myChartSource = echarts.init(document.getElementById('source'), 'macarons');
myChartSource.setOption(getSourceOption(source_today));

$('.btn-alt').on('click', function(){
    $(this).parent().parent().find('li').removeClass('active');
    $(this).parent().addClass('active');
    if($(this).data('name') == 'today'){
        myChart.setOption(getVisiteOption("[{{ $site['en_name'] }}]访问量", visit_today, visit_ip_today, range(0,24)));
        myChartSource.setOption(getSourceOption(source_today));
    }
    if($(this).data('name') == 'yesterday'){
        myChart.setOption(getVisiteOption("[{{ $site['en_name'] }}]访问量", visit_yesterday, visit_ip_yesterday, range(0,24)));
        myChartSource.setOption(getSourceOption(source_yesterday));
    }
    if($(this).data('name') == 'week'){
        myChart.setOption(getVisiteOption("[{{ $site['en_name'] }}]访问量", visit_week, visit_ip_week, range(0,7)));
        myChartSource.setOption(getSourceOption(source_week));
    }
    if($(this).data('name') == 'month'){
        myChart.setOption(getVisiteOption("[{{ $site['en_name'] }}]访问量", visit_month, visit_ip_month, range(0,30)));
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

function getVisiteOption(name, visit_today, visit_ip_today, cols){
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
            data:['页面访问','独立访问']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                //dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                //restore : {show: true},
                //saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : cols
            }
        ],
        yAxis : [
            {
                type : 'value',
                axisLabel : {
                    formatter: '{value}'
                }
            }
        ],
        series : [
            {
                name:'页面访问',
                type:'line',
                data: visit_today,
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
                
            }
        ]
    };
    return option;
}
</script>
@endsection