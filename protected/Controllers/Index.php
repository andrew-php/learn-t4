<?php

namespace App\Controllers;

use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $this->data->h1 = $this->app->config['application_title'];
    }

    public function actionAbout()
    {
        
    }

}