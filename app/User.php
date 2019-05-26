<?php

namespace App;

use Log;
use App\UserExtra;
use App\Cms\Site;
use App\Cms\Report;
use App\Cms\Config;
use App\Cms\Company;
use App\Observers\UserObserver;
use App\Cms\Init;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    static $site = null;
    static $info = null;
    static $company = null;
    static $report = null;
    //如果用户信息发生变化时设置该值为1
    static $forceRead = 0;
    static $config = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot(); 
        static::observe(new UserObserver());
    }

    // 获取当前站点
    public function getSite(){
        $siteId = session()->get('site_id');
        if((int)$siteId == 0)
            throw new \Exception("erro operation");

        if(!self::$site || self::$forceRead === 1){
            self::$site = Site::findOrFail((int)$siteId);

            if(self::$site->u_id != $this->id)
                throw new \Exception("access denied.");
        } 

        return self::$site;
    }

    // 获取当前公司
    public function getCompany(){
        if(!self::$company || self::$forceRead === 1){
            self::$company = Company::findOrFail($this->getSite()['cmp_id']);
        } 
        return self::$company;
    }

    // 获取报告
    public function getReport(){
        if(!self::$report || self::$forceRead === 1){
            self::$report = Report::where('site_id', $this->getSite()['id'])
                ->where('u_id', $this->id)
                ->first();
            if(!self::$report)
                Report::create([
                    'u_id' => $this->id,
                    'site_id' => $this->getSite()['id']
                ]);
        } 
        return self::$report;
    }

    // 获取当前用户信息
    public function getExtra(){
        try{
            $userExtra = UserExtra::findOrFail($this->id);
        }catch(\Exception $e){
            UserExtra::firstOrCreate([
                'u_id' => $this->id
            ]);
            $userExtra = UserExtra::findOrFail($this->id);
        }

        if(!self::$info || self::$forceRead === 1){
            return array_merge($this->toArray(), $userExtra->toArray());
        }
        return self::$info;
    }

    // 获取当前用户信息
    public function getConfig(){
        if(!self::$config || self::$forceRead === 1){
            self::$config = Config::where('site_id', $this->getSite()['id'])
                ->where('u_id', $this->id)
                ->firstOrFail();
        } 
        return self::$config;
    }

    //初始化
    public function init(){
        $initConf = Config('user.init');
        $init = Init::where('u_id', $this->id)
            ->where('site_id', $this->getSite()['id'])
            ->first();
        if(!$init){
            $init = new Init();
            $init->u_id = $this->id;
            $init->site_id = $this->getSite()['id'];
        }
        $flags = str_split($init->flags_text);
        foreach ($initConf as $name => $id) {
            if(!isset($flags[$id]) || (int)$flags[$id] === 0)
            {
                try{
                    $this->exec($name);
                    $flags[$id] = 1; 
                }catch(\Exception $e){
                    //throw $e;
                    Log::warning($e->getMessage());
                    $flags[$id] = 0;
                    continue; 
                }
            }
        }
        $init->flags_text = implode('', $flags);
        $init->save();
    }

    private function exec($name) {
        switch ($name) {
            case 'create-company':
                try{
                    $this->getCompany();
                }catch(\Exception $e){
                    Log::warning($e->getMessage());
                    Company::create([
                        'u_id' => $this->id
                    ]);
                }
                break;
            case 'create-report':
                try{
                    $this->getReport();
                }catch(\Exception $e){
                    Log::warning($e->getMessage());
                    Report::create([
                        'u_id' => $this->id,
                        'site_id' => $this->getSite()['id']
                    ]);
                }
                break;
            case 'create-config':
                try{
                    $this->getConfig();
                }catch(\Exception $e){
                    Log::warning($e->getMessage());
                    Config::create([
                        'u_id' => $this->id,
                        'site_id' => $this->getSite()['id'],
                        'value' => '[]'
                    ]);
                }
                break;
            case 'user-extra':
                try{
                    $this->getExtra();
                }catch(\Exception $e){
                    Log::warning($e->getMessage());
                    UserExtra::create([
                        'u_id' => $this->id,
                    ]);
                }
                break;
            default:
                throw new \Exception("unkown flag");
                break;
        }
    }
}
