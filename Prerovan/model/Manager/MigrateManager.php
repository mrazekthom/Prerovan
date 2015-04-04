<?php

namespace Prerovan\Model\Manager;

use Nette\Object;
use Prerovan\Model\Entity\Articles;
use Prerovan\Model\Repository\AktualityRepository;
use Prerovan\Model\Repository\ArticleRepository;
use Nette\Utils\Strings;

class MigrateManager extends Object
{

    /** @var ArticleRepository */
    public $AsR;

    /** @var AktualityRepository */
    public $AkR;

    public function __construct(ArticleRepository $AsR, AktualityRepository $AkR){
        $this->AsR = $AsR;
        $this->AkR = $AkR;
    }

    public function migrate(){
        $entities = $this->AkR->migrate();

        foreach ($entities as $e){
            $newArticle = new Article;

            if ($e->typ == "URL"){
                $newArticle->title = $e->titulek;
                $newArticle->type = 'URL';
                $newArticle->content = NULL;
                $newArticle->url = NULL;
                $newArticle->image = NULL;
                $newArticle->confirmed = 1;
                $this->AsR->persist($newArticle);
            }elseif ($e->typ == "clanek"){
                $newArticle->title = $e->titulek;
                $newArticle->type = 'article';
                $str = file_get_contents(__DIR__ . '/../../../www/old/clanky/' . $e->clanek . '.htm');
                $str = Strings::replace($str, "#<h1[^>]*>([\s\S]*?)<\/h1[^>]*>#");
                $str = Strings::replace($str, "# class=\"[^\"]*\"#");
                $str = Strings::replace($str, "#<br />#", "<br>");
                $newArticle->content = $str;
                $newArticle->url = NULL;
                $newArticle->image = NULL;
                $newArticle->confirmed = 1;
                $this->AsR->persist($newArticle);
            }
        }
    }

}