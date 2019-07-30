<?php

/* forms.html */
class __TwigTemplate_27d402844cc8bda2602f886a67de490272453721b6d01eecb90a5cd6f0ed4354 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["json"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["id_sek"]) {
            // line 2
            if (($context["key"] == twig_get_attribute($this->env, $this->source, ($context["sekcja"] ?? null), "id_sekcji", []))) {
                // line 3
                echo "<div class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sekcja"] ?? null), "id_sekcji", []), "html", null, true);
                echo "\">
    ";
                // line 4
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $context["id_sek"], ($context["start"] ?? null), ($context["end"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                    // line 5
                    echo "    <div class=\"card\">
        <div class=\"card-header\">
            ";
                    // line 7
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "data", []), "-1 hour"), "d.m.Y (H:i:s)"), "html", null, true);
                    echo "
        </div>
        <div class=\"card-body\">
            <p class=\"card-text\">
                ";
                    // line 11
                    echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "tresc", []), ["<img" => "<img class=\"img-fluid\""]);
                    echo "
            </p>
        </div>
    </div>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 16
                echo "</div>
";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['id_sek'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forms.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 16,  49 => 11,  42 => 7,  38 => 5,  34 => 4,  29 => 3,  27 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms.html", "C:\\xampp\\htdocs\\ikntemptwig\\vendor\\dark\\forms.html");
    }
}
