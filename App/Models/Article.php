<?php
declare(strict_types=1);

class Article
{


    public $title;
    public $content;

    /**
     * Article constructor.
     * @param $title
     * @param $content
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }


}
