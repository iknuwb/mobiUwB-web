<?php

/* header.html.twig */
class __TwigTemplate_efbe0b833e8aa47c5e18ad878d58dd96d60d8594a21b727dcd26b228ba68f85d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<header class=\"text-center\">
    <img src=\"dark/";
        // line 2
        echo twig_escape_filter($this->env, ($context["logo32"] ?? null), "html", null, true);
        echo "\" class=\"img-fluid\" alt=\"Responsive image\"> <span><b>MobiUwB</b></span> <span>Instytut Informatyki</span>
</header>";
    }

    public function getTemplateName()
    {
        return "header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "header.html.twig", "C:\\xampp\\htdocs\\ikntemptwig\\vendor\\dark\\header.html.twig");
    }
}
