<?php

namespace Encore\Admin\ApiTester\Http\Controllers;

use Dcat\Admin\Layout\Content;
use Dcat\Admin\Admin;
use Encore\Admin\ApiTester\ApiTester;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ApiTesterController extends Controller {

    public function index(Content $content) {
        return $content
            ->title('Api tester')
            ->description('')
            ->body(Admin::view('zwping.api-tester::index', [
                // 'routes'    => [],
                'routes' => (new ApiTester)->getRoutes(),
//                'logs'   => ApiLogger::load(),

            ]));
    }


    public function handle(Request $request) {
        $method = $request->get('method');
        $uri = $request->get('uri');
        $user = $request->get('user');
        $all = $request->all();

        $keys = array_get($all, 'key', []);
        $vals = array_get($all, 'val', []);

        ksort($keys);
        ksort($vals);

        $parameters = [];

        foreach ($keys as $index => $key) {
            $parameters[$key] = array_get($vals, $index);
        }

        $parameters = array_filter($parameters, function ($key) {
            return $key !== '';
        }, ARRAY_FILTER_USE_KEY);

        $tester = new ApiTester();

        $response = $tester->call($method, $uri, $parameters, $user);

        return [
            'status'    => true,
            'message'   => 'success',
            'data'      => $tester->parseResponse($response),
        ];
    }

}