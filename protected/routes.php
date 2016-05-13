<?php

use T4\Mvc\Route;

return [
    '/news' => '//News/All',
    '/news/add' => '//News/Add',
    '/news/<1>' => function ($request, $matches) {
        if ($matches[1] == 'index') {
            $route = new Route('//News/All');
        } else {
            $route = new Route([
                'module' => '',
                'controller' => 'News',
                'action' => 'One',
                'params' => ['id' => $matches[1]],
            ]);
        }

        return $route;
    },
];