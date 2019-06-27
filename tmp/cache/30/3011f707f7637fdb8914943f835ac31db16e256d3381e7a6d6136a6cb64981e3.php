<?php

/* index.html.twig */
class __TwigTemplate_788ef9ec879210743f3d165454d6fd6e4285e839988211a50b0a077514ff8946 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"dark//css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"dark/css/custom.css\">

    <title>";
        // line 12
        echo twig_escape_filter($this->env, ($context["title_page"] ?? null), "html", null, true);
        echo "</title>
</head>
<body>
<div class=\"container-fluid\">
    ";
        // line 16
        $this->loadTemplate("header.html.twig", "index.html.twig", 16)->display($context);
        // line 17
        echo "
    ";
        // line 18
        $this->displayBlock('body', $context, $blocks);
        // line 20
        echo "
    ";
        // line 21
        $this->loadTemplate("footer.html.twig", "index.html.twig", 21)->display($context);
        // line 22
        echo "</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\"
        integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\"
        integrity=\"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49\"
        crossorigin=\"anonymous\"></script>
<script src=\"dark/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 18
    public function block_body($context, array $blocks = [])
    {
        // line 19
        echo "    ";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 19,  73 => 18,  56 => 22,  54 => 21,  51 => 20,  49 => 18,  46 => 17,  44 => 16,  37 => 12,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html.twig", "C:\\xampp\\htdocs\\ikntemptwig\\vendor\\dark\\index.html.twig");
    }
}
