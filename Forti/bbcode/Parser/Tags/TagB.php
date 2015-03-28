<?php

namespace Forti\Bundle\BbcodeBundle\Parser\Tags;

use Forti\Bundle\BbcodeBundle\Parser\Tags\TagInterface;
use Forti\Bundle\BbcodeBundle\Parser\Tags\AbstractTag;

class TagB extends AbstractTag implements TagInterface
{
    private $parsed = false;
    private $tag = array(
        'from' => array("[b]", "[/b]"),
        'to' => array("<b>", "</b>"),
    );

    public function __construct()
    {
    }

    public function parse($text)
    {
        if ($this->validate($this->tag['from'], $text)) {
            $parsed = str_replace($this->tag['from'], $this->tag['to'], $text);
            $this->parsed = $parsed;
        } else {
            $this->parsed = $text;
        }
    }

    public function getParsed()
    {
        return $this->parsed;
    }
}