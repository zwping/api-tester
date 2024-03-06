<?php

namespace Encore\Admin\ApiTester;

use Dcat\Admin\Extend\Setting as Form;

class Setting extends Form
{
    public function form()
    {
        $this->text('prefix')
            ->default('api')
            ->help('route prefix for APIs')
            ->required();
        $this->text('guard')
            ->default('api')
            ->help('auth guard for api')
            ->required();
        $this->text('user_retriever')
            ->default('\App\User')
            ->help('If you are not using the default user model as the authentication model, set it up')
            ->required();
    }
}
