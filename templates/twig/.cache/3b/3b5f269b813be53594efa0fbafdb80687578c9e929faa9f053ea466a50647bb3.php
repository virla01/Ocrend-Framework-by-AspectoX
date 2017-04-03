<?php

/* overall/header.twig */
class __TwigTemplate_e69438bd7faaffcf24e8eca88dc37191d3f9dfb1d0b5cc18fa8ab0b16f12b0c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
  <head>
    <base href=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_constant("URL"), "html", null, true);
        echo "\" />
    <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"application-name\" content=\"Ocrend Framework\" />
    <meta name=\"author\" content=\"www.ocrend.com\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <link rel=\"stylesheet\" href=\"https://bootswatch.com/flatly/bootstrap.min.css\" />
    <link rel=\"stylesheet\" href=\"views/app/css/framework.css\">

    <link rel=\"apple-touch-icon-precomposed\" href=\"views/app/images/apple-touch-icon.png\" />
    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"views/favicon.ico\" />

    <title>";
        // line 17
        echo twig_escape_filter($this->env, twig_constant("APP"), "html", null, true);
        echo "</title>
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>
";
    }

    public function getTemplateName()
    {
        return "overall/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 17,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "overall/header.twig", "D:\\wamp64\\www\\Ocrend-Framework\\templates\\twig\\overall\\header.twig");
    }
}
