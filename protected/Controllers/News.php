<?php

namespace App\Controllers;


use App\Models\Article;
use T4\Core\Exception;
use T4\Mvc\Controller;

class News
    extends Controller
{
    public function actionDefault()
    {

    }

    public function actionOne($id)
    {
        try {
            $id = (int)$id;
            $news = new \App\Models\News($this->app->config['file_with_news']);
            $this->data->article = $news->findOne($id);
        } catch (Exception $e) {
            $this->data['error_message'] = $this->app->config['news_error_msg'];
        }
    }

    public function actionAll()
    {
        $news = new \App\Models\News($this->app->config['file_with_news']);
        $this->data->articles = $news->findAllSortedByIdDesc();
    }

    public function actionLast()
    {
        $news = new \App\Models\News($this->app->config['file_with_news']);
        $this->data->article = $news->findLast();
    }

    public function actionAdd($title = null, $text = null, $img = null)
    {
        $article = new Article(['title' => $title, 'text' => $text, 'img' => $img]);
        if ($article->isComplete()) {
            $this->add($article);
            $this->data->msg = 'Новость успешно добавлена!';
        }
    }

    public function add(Article $article)
    {
        $news = new \App\Models\News($this->app->config['file_with_news']);
        $article->id = $news->generateNextId();
        $news->news[] = $article->toArray();
        $news->save();
    }
}