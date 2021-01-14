<?php declare(strict_types=1);

namespace App\Models;

class Article
{


    public string $title;
    public string $content;

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
