<?php

/* overall/footer.twig */
class __TwigTemplate_b504407fccb2ff1b36f3c48582e16a564742133f9dfeb1a810454704179fa1ec extends Twig_Template
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
        if (twig_constant("DEBUG")) {
            // line 2
            echo "  <script src=\"views/app/js/jdev.js\"></script>
";
        } else {
            // line 4
            echo "  <script src=\"views/app/js/jquery.js\"></script>
";
        }
        // line 6
        echo "
<script src=\"views/app/js/jquery.numeric.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>

";
        // line 10
        if ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["session"] ?? null), twig_constant("SESS_APP_ID"), array(), "array", true, true)) {
            // line 11
            echo "  ";
            // line 12
            echo "  ";
            $this->loadTemplate("overall/login", "overall/footer.twig", 12)->display($context);
            // line 13
            echo "  ";
            $this->loadTemplate("overall/register", "overall/footer.twig", 13)->display($context);
            // line 14
            echo "  ";
            $this->loadTemplate("overall/lostpass", "overall/footer.twig", 14)->display($context);
            // line 15
            echo "
  ";
            // line 17
            echo "  <script src=\"views/app/js/login.js\"></script>
  <script src=\"views/app/js/register.js\"></script>
  <script src=\"views/app/js/lostpass.js\"></script>
";
        }
        // line 21
        echo "
<script>
  \$('.numeric').numeric();
</script>
";
    }

    public function getTemplateName()
    {
        return "overall/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 21,  51 => 17,  48 => 15,  45 => 14,  42 => 13,  39 => 12,  37 => 11,  35 => 10,  29 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "overall/footer.twig", "D:\\wamp64\\www\\Ocrend-Framework\\templates\\twig\\overall\\footer.twig");
    }
}
