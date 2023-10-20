<?php
namespace App\Core;

class View
{
    private string $templateName;
    private string $viewName;
    public function __construct(string $viewName, string $templateName = "back")
    {
        $this->setViewName($viewName);
        $this->setTemplateName($templateName);
    }

    public function setTemplateName(string $templateName): void
    {
        if (!file_exists("Views/Templates/" . $templateName . ".tpl.php")) {
            die("Le template Views/Templates/" . $templateName . ".tpl.php n'existe pas");
        }
        $this->templateName = "Views/Templates/" . $templateName . ".tpl.php";
    }

    public function setViewName(string $viewName): void
    {
        if (!file_exists("Views/" . $viewName . ".view.php")) {
            die("Le template Views/" . $viewName . ".view.php n'existe pas");
        }
        $this->viewName = "Views/" . $viewName . ".view.php";
    }

    public function __destruct()
    {
        include $this->templateName;
    }
}