<?php

/* overall/login.twig */
class __TwigTemplate_4d6a28a84bb6a38f910c22bc9c18ce7537a3c55076a493f2592c20d751b58559 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"iniciar_sesion\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
  <div class=\"modal-dialog modal-sm\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Iniciar Sesión</h4>
      </div>
      <div class=\"modal-body\">
        <form role=\"form\" enctype=\"application/x-www-form-urlencoded\" id=\"login_form\">

          <div class=\"alert hide\" id=\"ajax_login\"></div>

          <div class=\"form-group\">
            <label>Usuario:</label>
            <input type=\"text\" name=\"user\" class=\"form-control\" required=\"\" />
          </div>

          <div class=\"form-group\">
            <label>Contraseña:</label>
            <input type=\"password\" name=\"pass\" class=\"form-control\" required=\"\" />
          </div>

          <a href=\"#\" data-toggle=\"modal\" data-dismiss=\"modal\" data-target=\"#lost_pass\">¿Contraseña Perdida?</a>

        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-sm btn-default\" data-dismiss=\"modal\">Cerrar</button>
        <button type=\"button\" id=\"login\" class=\"btn btn-sm btn-primary\">Iniciar Sesión</button>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "overall/login.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "overall/login.twig", "D:\\wamp64\\www\\Ocrend-Framework\\templates\\twig\\overall\\login.twig");
    }
}
