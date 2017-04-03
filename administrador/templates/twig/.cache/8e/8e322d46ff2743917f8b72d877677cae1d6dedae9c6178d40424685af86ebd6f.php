<?php

/* home/home.twig */
class __TwigTemplate_1ae724391d7259b4fc6e1767371a63aa73ff546a316a302f3929879945fbe621 extends Twig_Template
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
        $this->loadTemplate("overall/header", "home/home.twig", 1)->display($context);
        // line 2
        echo "  <body>
    <div class=\"container\">
      <div class=\"presentacion center\">
        <div class=\"row\">
          <div class=\"col-xs-12\">
            <h1>Ocrend Framework</h1>
            <p>Framework MVC PHP 7. Para expertos y aprendices.</p>
            <p>Estás usando <a href=\"http://twig.sensiolabs.org\" target=\"_blank\">Twig</a> :)</p>

            <div class=\"documentacion\">
              <a class=\"fa fa-youtube\" href=\"https://www.youtube.com/playlist?list=PLDQZoQpLCoUBVbDUxr8cxVX0ik8uh5WBh\" target=\"_blank\"></a>
              <a class=\"fa fa-github\"  href=\"https://github.com/prinick96/Ocrend-Framework/wiki\" target=\"_blank\"></a>
              <a class=\"fa fa-globe\" href=\"http://framework.ocrend.com\" target=\"_blank\"></a>
            </div>

          </div>
          <div class=\"col-xs-12 botones\">
            ";
        // line 20
        echo "            ";
        if ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["session"] ?? null), twig_constant("SESS_APP_ID"), array(), "array", true, true)) {
            // line 21
            echo "              <a href=\"#\" data-toggle=\"modal\" data-target=\"#iniciar_sesion\" class=\"btn btn-sm btn-primary\">
                <i class=\"glyphicon glyphicon-user\"></i> Empezar
              </a>
              <a href=\"#\" data-toggle=\"modal\" data-target=\"#registro\" class=\"btn btn-sm btn-primary\">
                <i class=\"glyphicon glyphicon-list-alt\"></i> Registro
              </a>
            ";
            // line 28
            echo "            ";
        } else {
            // line 29
            echo "              Bienvenido usuario de <b>id: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["session"] ?? null), twig_constant("SESS_APP_ID"), array(), "array"), "html", null, true);
            echo "</b>, <a href=\"logout/\">Salir</a>
            ";
        }
        // line 31
        echo "          </div>
        </div>
      </div>
    </div>
    ";
        // line 35
        $this->loadTemplate("overall/footer", "home/home.twig", 35)->display($context);
        // line 36
        echo "  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "home/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 36,  66 => 35,  60 => 31,  54 => 29,  51 => 28,  43 => 21,  40 => 20,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home/home.twig", "D:\\wamp64\\www\\Ocrend-Framework\\templates\\twig\\home\\home.twig");
    }
}
