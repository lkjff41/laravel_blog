<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 15:20
 */

namespace App\Services;
use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

class Markdowner
{
    public function toHtml($text){
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = $this->postTransformText($text);
        return $text;
    }

    public function preTransformText($text){
        return $text;
    }

    protected function postTransformText($text)
    {
        return $text;
    }
}