<?php

namespace App\Http\Controllers\Cms;

use App\Cms\ArticleGroup;
use App\Cms\Site;
use App\Cms\Template;
use App\Cms\User;
use App\Cms\Report;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\StoreSite;
use Illuminate\Http\Request;
use View;

class SiteController extends Controller
{
    const MAX_SITE_PER_USER = 3;
    public $module          = 'site';
    public function index(Request $request)
    {
        $sites = Site::where('u_id', $request->user()->id)
            ->get();
        return View('cms.site.index', [
            'sites' => $sites,
        ]);
    }

    public function admin(Request $request)
    {
        $sites = Site::where('u_id', $request->user()->id)->get();
        View::share('active', ['site-admin' => 'active']);
        $site = $request->user()->getSite();

        $report = new Report();

        $report = Report::firstOrCreate([
            'u_id'    => $request->user()->id,
            'site_id' => $site->id,
        ]);

        return View('cms.admin.index', [
            'siteid' => $site->id,
            'sites' => $sites,
            'report' => $this->format($report),
            'site' => $site
        ]);

        //
        //return redirect('/home/companies/config');
    }



    public function select(Request $request, $siteid)
    {
        $request->session()->put('site_id', (int) $siteid);
        return redirect('/home/sites/admin');
    }

    public function selectBack(Request $request, $siteid)
    {
        $request->session()->put('site_id', (int) $siteid);
        return redirect()->back();
    }

    public function init(Request $request, $siteid)
    {
        //$request->user()->init();
        return redirect()->route('sites.index', []);

    }

    public function create(Request $request)
    {
        return View('cms.site.create', [
        ]);
    }

    public function config(Request $request)
    {
        $site    = $request->user()->getSite();
        $tplConf = $site['tpl_config'];
        if (empty($tplConf)) {
            $tplConf = Template::findOrFail($site['tpl_id'])['config'];
        }

        return View('cms.template.config', [
            'groups' => ArticleGroup::where('site_id', $request->user()->getSite()['id'])->get(),
            'conf'   => $tplConf,
        ]);
    }

    public function configUpdate(Request $request)
    {

        if ($request->ajax()) {
            $site             = $request->user()->getSite();
            $tplConf          = $site['tpl_config'];
            $tplConf['menus'] = $request->input('menus');
            if (!is_array($tplConf['menus'])) {
                throw new ApiException("menu's format unvalid");
            }
            if (count($tplConf['menus']) < 1) {
                throw new ApiException("menu's items count must be greater than 1");
            }
            foreach ($tplConf['menus'] as $item) {
                if (!isset($item['g_id']) || !isset($item['name']) || !isset($item['index']) || !isset($item['is_show'])) {
                    throw new ApiException("menu's item format");
                }
            }

            $site->tpl_config = $tplConf;
            $site->save();
            return $tplConf;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSite $request)
    {
        if (in_array($request->input('en_name'), config('forbidden_word'))) {
            throw new \Exception("unvalid en_name");
        }
        $count = Site::where('u_id', $request->user()->id)->count();

        if ($count >= self::MAX_SITE_PER_USER) {
            $request->session()->flash('no', '创建失败，每位用户可最多创建3个站点。');
            return redirect()->route('sites.index');
        }

        $site             = new Site();
        $site->u_id       = $request->user()->id;
        $site->tpl_id     = 1; //$request->input('tpl_id', '');
        $site->name       = $request->input('name', '');
        $site->desc       = $request->input('desc', '');
        $site->en_name    = $request->input('en_name', '');
        $site->tpl_config = [];
        $site->password   = $request->input('password', '');
        $site->save();
        $request->session()->put('site_id', $site->id);
        //$request->user()->init();
        $request->session()->flash('yes', '创建成功，每位用户可最多创建{self::MAX_SITE_PER_USER - $count}个站点。');
        return redirect()->route('sites.index');
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $site = Site::findOrFail($request->user()->getSite()['id']);
            if ($request->has('tpl_id')) {
                $site->tpl_id = (int) $request->input('tpl_id');
                if ($site->tpl_id <= 0) {
                    throw new Exception("unvalid operation");
                }

                $site->save();
            }
            return $site->id;
        }
    }

    private function format($report){
        $report['source_today'] = json_decode($report['source_today'], 1);
        $report['source_yesterday'] = json_decode($report['source_yesterday'], 1);
        $report['source_week'] = json_decode($report['source_week'], 1);
        $report['source_month'] = json_decode($report['source_month'], 1);

        if(empty($report['source_today'])){
            $report['source_today'] = [0, 0, 0];
        }
        if(empty($report['source_yesterday'])){
            $report['source_yesterday'] = [0, 0, 0];
        }
        if(empty($report['source_week'])){
            $report['source_week'] = [0, 0, 0];
        }
        if(empty($report['source_month'])){
            $report['source_month'] = [0, 0, 0];
        }
        // 今天的数据
        $visit_today = json_decode($report['visit_today']);
        $len_visit_today = count($visit_today);

        if($len_visit_today != date('H')){
            foreach (range(0, date('H')) as  $i) {
                if($i >= $len_visit_today)
                    $visit_today[] = 0;
            }
        }
        $report['visit_today'] = json_encode($visit_today);
        // 今天的数据
        $visit_ip_today = json_decode($report['visit_ip_today']);
        $len_visit_ip_today = count($visit_ip_today);

        if($len_visit_ip_today != date('H')){
            foreach (range(0, date('H')) as  $i) {
                if($i >= $len_visit_ip_today)
                    $visit_ip_today[] = 0;
            }
        }
        $report['visit_ip_today'] = json_encode($visit_ip_today);


        // 昨天的数据
        $visit_yesterday = json_decode($report['visit_yesterday']);
        $len_visit_yesterday = count($visit_yesterday);

        if($len_visit_yesterday != 24){
            foreach (range(0, 24) as  $i) {
                if($i >= $len_visit_yesterday)
                    $visit_yesterday[] = 0;
            }
        }
        $report['visit_yesterday'] = json_encode($visit_yesterday);

        // 昨天的数据
        $visit_ip_yesterday = json_decode($report['visit_ip_yesterday']);
        $len_visit_ip_yesterday = count($visit_ip_yesterday);

        if($len_visit_ip_yesterday != 24){
            foreach (range(0, 24) as  $i) {
                if($i >= $len_visit_ip_yesterday)
                    $visit_ip_yesterday[] = 0;
            }
        }
        $report['visit_ip_yesterday'] = json_encode($visit_ip_yesterday);

        // 本周
        $visit_week = json_decode($report['visit_week']);
        $len_visit_week = count($visit_week);

        if($len_visit_week != date("w")){
            foreach (range(0, date("w")) as  $i) {
                if($i > $len_visit_week)
                    $visit_week[] = 0;
            }
        }
        $report['visit_week'] = json_encode($visit_week);

        // 本周
        $visit_ip_week = json_decode($report['visit_ip_week']);
        $len_visit_ip_week = count($visit_ip_week);

        if($len_visit_ip_week != date("w")){
            foreach (range(0, date("w")) as  $i) {
                if($i > $len_visit_ip_week)
                    $visit_ip_week[] = 0;
            }
        }
        $report['visit_ip_week'] = json_encode($visit_ip_week);

        // 本月
        $visit_month = json_decode($report['visit_month']);
        $len_visit_month = count($visit_month);

        if($len_visit_month != date("m")){
            foreach (range(0, date("m")) as  $i) {
                if($i > $len_visit_month)
                    $visit_month[] = 0;
            }
        }
        $report['visit_month'] = json_encode($visit_month);

        // 本月
        $visit_ip_month = json_decode($report['visit_ip_month']);
        $len_visit_ip_month = count($visit_ip_month);

        if($len_visit_ip_month != date("m")){
            foreach (range(0, date("m")) as  $i) {
                if($i > $len_visit_ip_month)
                    $visit_ip_month[] = 0;
            }
        }
        $report['visit_ip_month'] = json_encode($visit_ip_month);

        $report->formatdata = [
            'visit_today' => empty($report['visit_today']) ? '[]': $report['visit_today'],
            'visit_yesterday' => empty($report['visit_yesterday']) ? '[]': $report['visit_yesterday'],
            'visit_week' => empty($report['visit_week']) ? '[]': $report['visit_week'],
            'visit_month' => empty($report['visit_month']) ? '[]': $report['visit_month'],
            'visit_ip_today' => empty($report['visit_ip_today']) ? '[]': $report['visit_ip_today'],
            'visit_ip_yesterday' => empty($report['visit_ip_yesterday']) ? '[]': $report['visit_ip_yesterday'],
            'visit_ip_week' => empty($report['visit_ip_week']) ? '[]': $report['visit_ip_week'],
            'visit_ip_month' => empty($report['visit_ip_month']) ? '[]': $report['visit_ip_month'],
            'source_today' => empty($report['source_today']) ? '[]': sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]',$report['source_today'][0], $report['source_today'][1], $report['source_today'][2]),
            'source_yesterday' => empty($report['source_yesterday']) ? '[]': sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]',$report['source_yesterday'][0], $report['source_yesterday'][1], $report['source_yesterday'][2]),
            'source_week' => empty($report['source_week']) ? '[]': sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]',$report['source_week'][0], $report['source_week'][1], $report['source_week'][2]),
            'source_month' => empty($report['source_month']) ? '[]': sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]',$report['source_month'][0], $report['source_month'][1], $report['source_month'][2]),
        ];

        return $report;
    }
}
