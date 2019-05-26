<?php

namespace App;

use Log;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserIdAllot extends Model
{
    protected $table = 'user_id_allot';
    public $timestamps = false;

    public static function genId(){
        DB::beginTransaction();
        try{
            $uid = UserIdAllot::lockForUpdate()->first();
            $uid['id'] += 1;
            $uid->save();
            DB::commit();
        }catch(\Exception $e){
            Log::info('get id error,' . $e->getMessage());
            DB::rollback();
            throw $e;
        }
    }
}


