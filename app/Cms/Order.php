<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    const TYPE_CONSUMER_lOG = 0;
    const TYPE_PROVIDER_lOG = 1;
    protected $table = 'orders';
    use SoftDeletes;

    protected $casts = [
        'log' => 'array',
    ];

    protected $dates = ['deleted_at'];

    public function addLog($type = 0, $msg){
        $data = [
            'type' => $type,
            'date' => date('Y-m-d H:i:s'),
            'msg' => $msg
        ];
        $logs = $this->log;
        $logs[] = $data;
        $this->log = $logs;
    }

     public function getStatus($v, $dir = 0){
        $conf = [
            '更新' => -1,
            '未支付' => 0,
            '已支付' => 1,
            '已发货' => 2,
            '已收货' => 3,
            '已删除' => 4,
            '已取消' => 5,
            '已完成' => 6,
            '发货' => 2,
            '完成' => 6,
            '删除' => 4,
        ];
        if ($dir == 0){
            return $conf[$v];
        }elseif ($dir == 1){
            return array_search($v, $conf);
        }else{
            return $conf;
        }
        
        
    }
}
