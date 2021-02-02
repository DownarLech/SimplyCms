<?php

declare(strict_types=1);

namespace App\Services;

class ViewService
{

    private \Smarty $smarty;
    private string $template;

    private array $params = [];

    public function __construct()
    {
        $this->template = '';

        $this->smarty = new \Smarty();

        $this->smarty->setTemplateDir('App/Smarty/templates');
        $this->smarty->setCompileDir('App/Smarty/templates_c');
        $this->smarty->setCacheDir('App/Smarty/cache');
        $this->smarty->setConfigDir('App/Smarty/configs');

    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template): void
    {
        $this->template = dirname(__DIR__,1).'/Smarty/templates/'.$template;
    }


    public function display(): void
    {
        try {
            $this->smarty->assign($this->params);
            $this->smarty->display($this->template);
        } catch (\SmartyException $e) {
        }
    }

    public function addTlpParam(string $name, $value): void
    {
        $this->params[$name] = $value;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }


}