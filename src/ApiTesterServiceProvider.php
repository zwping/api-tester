<?php

namespace Encore\Admin\ApiTester;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class ApiTesterServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/index.js', 'js/prism.js', 
    ];
	protected $css = [
		'css/index.css', 'css/prism.css', 
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		//
		
	}

	public function settingForm() {
		return new Setting($this);
	}

	/** 
	 * 菜单
	 * dcat-admin 扩展中不支持直接添加权限, 未绑定权限的菜单为公共菜单
	 * */
    protected $menu = [
        [
            'title' => 'Api tester',
            'uri'   => 'api-tester',
            'icon'  => 'fa-sliders',
        ],
    ];

}
