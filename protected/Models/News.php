<?php

namespace App\Models;


use T4\Core\Config;
use T4\Core\Exception;

class News
    extends Config
{

    public function findAll() : array 
    {
        return $this->createArticlesFromRawNewsInfo();
    }

    public function findAllSortedByIdDesc() : array 
    {
        $articles = $this->createArticlesFromRawNewsInfo();
        usort($articles, function ($a, $b) {
            return ($b->id <=> $a->id);
        });

        return $articles;
    }

    public function findAllSortedByIdAsc() : array 
    {
        $articles = $this->createArticlesFromRawNewsInfo();
        usort($articles, function ($a, $b) {
            return ($a->id <=> $b->id);
        });

        return $articles;
    }

    public function findOne(int $id) : Article
    {
        $articles = $this->createArticlesFromRawNewsInfo();
        foreach ($articles as $article) {
            if($article->id == $id) { return $article; }
        }
        
        throw new Exception('Нет новости с таким идентификатором');
    }

    public function findLast() : Article
    {
        return $this->findAllSortedByIdDesc()[0];
    }

    protected function createArticlesFromRawNewsInfo() : array 
    {
        foreach ($this->news as $rawInfo) {
            $articles[] = new Article($rawInfo->toArray());
        }

        return $articles;
    }

    public function generateNextId()
    {
        $lastId = $this->findLast()->id;
        
        return ++$lastId;
    }

}