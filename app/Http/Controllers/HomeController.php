<?php

namespace App\Http\Controllers;

use App\Cms\Report;
use App\Cms\Site;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    protected $module = 'homepage';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        View::share('active', [$this->module => 'active']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sites  = Site::where('u_id', $request->user()->id)->get();
        $site   = new Site();
        $siteid = 0;
        $report = new Report();
        // 默认选中第一个站点
        if (!$request->session()->has('site_id') && count($sites) > 0) {
            $request->session()->put('site_id', $sites->first()->id);
        }
        if ($request->session()->has('site_id')) {
            $siteid = $request->session()->get('site_id');
            $site   = $request->user()->getSite();
            $report = Report::firstOrCreate([
                'u_id'    => $request->user()->id,
                'site_id' => $siteid,
            ]);
        }

        View::share('active', ['site-' . $siteid => 'active',
            $this->module                            => 'active',
            'admin.index'                                       => 'active',
        ]);

        return view('home', [
            'siteid' => $siteid,
            'sites'  => $sites,
            'report' => $this->format($report),
            'site'   => $site,
        ]);
    }
    public function document(Request $request)
    {
        View::share('active', ['admin.document' => 'active',
            $this->module                          => 'active',
        ]);
        return view('admin.document', [

        ]);
    }

    private function format($report)
    {
        $report['source_today']     = json_decode($report['source_today'], 1);
        $report['source_yesterday'] = json_decode($report['source_yesterday'], 1);
        $report['source_week']      = json_decode($report['source_week'], 1);
        $report['source_month']     = json_decode($report['source_month'], 1);

        if (empty($report['source_today'])) {
            $report['source_today'] = [0, 0, 0];
        }
        if (empty($report['source_yesterday'])) {
            $report['source_yesterday'] = [0, 0, 0];
        }
        if (empty($report['source_week'])) {
            $report['source_week'] = [0, 0, 0];
        }
        if (empty($report['source_month'])) {
            $report['source_month'] = [0, 0, 0];
        }
        // 今天的数据
        $visit_today     = json_decode($report['visit_today']);
        $len_visit_today = count($visit_today);

        if ($len_visit_today != date('H')) {
            foreach (range(0, date('H')) as $i) {
                if ($i >= $len_visit_today) {
                    $visit_today[] = 0;
                }

            }
        }
        $report['visit_today'] = json_encode($visit_today);
        // 今天的数据
        $visit_ip_today     = json_decode($report['visit_ip_today']);
        $len_visit_ip_today = count($visit_ip_today);

        if ($len_visit_ip_today != date('H')) {
            foreach (range(0, date('H')) as $i) {
                if ($i >= $len_visit_ip_today) {
                    $visit_ip_today[] = 0;
                }

            }
        }
        $report['visit_ip_today'] = json_encode($visit_ip_today);

        // 昨天的数据
        $visit_yesterday     = json_decode($report['visit_yesterday']);
        $len_visit_yesterday = count($visit_yesterday);

        if ($len_visit_yesterday != 24) {
            foreach (range(0, 24) as $i) {
                if ($i >= $len_visit_yesterday) {
                    $visit_yesterday[] = 0;
                }

            }
        }
        $report['visit_yesterday'] = json_encode($visit_yesterday);

        // 昨天的数据
        $visit_ip_yesterday     = json_decode($report['visit_ip_yesterday']);
        $len_visit_ip_yesterday = count($visit_ip_yesterday);

        if ($len_visit_ip_yesterday != 24) {
            foreach (range(0, 24) as $i) {
                if ($i >= $len_visit_ip_yesterday) {
                    $visit_ip_yesterday[] = 0;
                }

            }
        }
        $report['visit_ip_yesterday'] = json_encode($visit_ip_yesterday);

        // 本周
        $visit_week     = json_decode($report['visit_week']);
        $len_visit_week = count($visit_week);

        if ($len_visit_week != date("w")) {
            foreach (range(0, date("w")) as $i) {
                if ($i > $len_visit_week) {
                    $visit_week[] = 0;
                }

            }
        }
        $report['visit_week'] = json_encode($visit_week);

        // 本周
        $visit_ip_week     = json_decode($report['visit_ip_week']);
        $len_visit_ip_week = count($visit_ip_week);

        if ($len_visit_ip_week != date("w")) {
            foreach (range(0, date("w")) as $i) {
                if ($i > $len_visit_ip_week) {
                    $visit_ip_week[] = 0;
                }

            }
        }
        $report['visit_ip_week'] = json_encode($visit_ip_week);

        // 本月
        $visit_month     = json_decode($report['visit_month']);
        $len_visit_month = count($visit_month);

        if ($len_visit_month != date("m")) {
            foreach (range(0, date("m")) as $i) {
                if ($i > $len_visit_month) {
                    $visit_month[] = 0;
                }

            }
        }
        $report['visit_month'] = json_encode($visit_month);

        // 本月
        $visit_ip_month     = json_decode($report['visit_ip_month']);
        $len_visit_ip_month = count($visit_ip_month);

        if ($len_visit_ip_month != date("m")) {
            foreach (range(0, date("m")) as $i) {
                if ($i > $len_visit_ip_month) {
                    $visit_ip_month[] = 0;
                }

            }
        }
        $report['visit_ip_month'] = json_encode($visit_ip_month);

        $report->formatdata = [
            'visit_today'        => empty($report['visit_today']) ? '[]' : $report['visit_today'],
            'visit_yesterday'    => empty($report['visit_yesterday']) ? '[]' : $report['visit_yesterday'],
            'visit_week'         => empty($report['visit_week']) ? '[]' : $report['visit_week'],
            'visit_month'        => empty($report['visit_month']) ? '[]' : $report['visit_month'],
            'visit_ip_today'     => empty($report['visit_ip_today']) ? '[]' : $report['visit_ip_today'],
            'visit_ip_yesterday' => empty($report['visit_ip_yesterday']) ? '[]' : $report['visit_ip_yesterday'],
            'visit_ip_week'      => empty($report['visit_ip_week']) ? '[]' : $report['visit_ip_week'],
            'visit_ip_month'     => empty($report['visit_ip_month']) ? '[]' : $report['visit_ip_month'],
            'source_today'       => empty($report['source_today']) ? '[]' : sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]', $report['source_today'][0], $report['source_today'][1], $report['source_today'][2]),
            'source_yesterday'   => empty($report['source_yesterday']) ? '[]' : sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]', $report['source_yesterday'][0], $report['source_yesterday'][1], $report['source_yesterday'][2]),
            'source_week'        => empty($report['source_week']) ? '[]' : sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]', $report['source_week'][0], $report['source_week'][1], $report['source_week'][2]),
            'source_month'       => empty($report['source_month']) ? '[]' : sprintf('[{"value":%s, "name":"直接访问"},{"value":%s, "name": "第三方网站"},{"value": %s,"name": "搜索引擎"}]', $report['source_month'][0], $report['source_month'][1], $report['source_month'][2]),
        ];

        return $report;
    }
}
