<?php

/* home.html.twig */
class __TwigTemplate_9f2aab4eed9fcd29f6ef4ada70a4b0f0eb6566969af8c742598e02847aad6ab6 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("index.html.twig", "home.html.twig", 1);
        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        // line 3
        echo "<main>
    <script>
        var temp = false;
        if(document.cookie == \"\") {
            temp = true;
        }
    </script>
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-8 col-sm-12 col-xs-12\">
            <div id=\"accordion\">

                ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sekcje"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["sekcja"]) {
            // line 15
            echo "                    <div class=\"card menu\">
                        <div class=\"card-header d-inline-flex\" id=\"heading";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", []), "html", null, true);
            echo "collapse\" data-toggle=\"collapse\" data-target=\"#collapse";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", []), "html", null, true);
            echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", []), "html", null, true);
            echo "\">
                            ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "tytul_sekcji", []), "html", null, true);
            echo "
                            <div class=\"align-self-center d-flex ml-auto\">
                                <span class=\"badge badge-primary badge-pill\" id=\"";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
            echo "\">0</span>
                            </div>
                        </div>
                        <div id=\"collapse";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", []), "html", null, true);
            echo "\" class=\"collapse\" aria-labelledby=\"heading";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", []), "html", null, true);
            echo "collapse\" data-parent=\"#accordion\">
                            <div class=\"card-body\">
                                ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["json"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["id_sek"]) {
                // line 25
                echo "                                        ";
                if (($context["key"] == twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []))) {
                    // line 26
                    echo "                                            <script>
                                                if(temp == true){
                                                    document.cookie = \"";
                    // line 28
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "=";
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $context["id_sek"]), "html", null, true);
                    echo "\";
                                                    //document.cookie = \"";
                    // line 29
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "=";
                    echo twig_escape_filter($this->env, (twig_length_filter($this->env, $context["id_sek"]) - 2), "html", null, true);
                    echo "\";
                                                } else {
                                                    document.getElementById(\"";
                    // line 31
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "\").innerHTML = ";
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $context["id_sek"]), "html", null, true);
                    echo "-parseInt(getCookie_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "());
                                                    document.cookie = \"";
                    // line 32
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "=";
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $context["id_sek"]), "html", null, true);
                    echo "\";
                                                }
                                                function  getCookie_";
                    // line 34
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "() {
                                                    return document.cookie.replace(/(?:(?:^|.*;\\s*)";
                    // line 35
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "\\s*\\=\\s*([^;]*).*\$)|^.*\$/, \"\$1\");
                                                }
                                            </script>
                                            ";
                    // line 38
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $context["id_sek"], ($context["start"] ?? null), 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                        // line 39
                        echo "                                                <div class=\"card\">
                                                    <div class=\"card-header\">
                                                        ";
                        // line 41
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "data", []), "-1 hour"), "d.m.Y (H:i:s)"), "html", null, true);
                        echo "
                                                    </div>
                                                    <div class=\"card-body\">
                                                        <p class=\"card-text\">
                                                            ";
                        // line 45
                        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "tresc", []), ["<img" => "<img class=\"img-fluid\"", "<a" => "<a style=\"color:007bff;\" href"]);
                        echo "
                                                        </p>
                                                    </div>
                                                </div>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 50
                    echo "                                            <button type=\"button\" class=\"btn btn-dark btn-block mb-2\" onclick=\"ladowanie_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "()\">Pokaż więcej</button>
                                            <script>
                                                function ladowanie_";
                    // line 52
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "() {
                                                    var ukryte_";
                    // line 53
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo " = document.getElementById(\"ukryte_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "\");
                                                    if(ukryte_";
                    // line 54
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo ".style.display == 'none'){
                                                        ukryte_";
                    // line 55
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo ".style.display = 'block';
                                                    } else {
                                                        ukryte_";
                    // line 57
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo ".style.display = 'none';
                                                    }
                                                }
                                            </script>
                                             <div class=\"mt-3\" style=\"display: none;\" id=\"ukryte_";
                    // line 61
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []), "html", null, true);
                    echo "\">
                                                 ";
                    // line 62
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $context["id_sek"], 5, ($context["length"] ?? null)));
                    foreach ($context['_seq'] as $context["_key"] => $context["ukryte"]) {
                        // line 63
                        echo "                                                     <div class=\"card\">
                                                         <div class=\"card-header\">
                                                             ";
                        // line 65
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ukryte"], "data", []), "-1 hour"), "d.m.Y (H:i:s)"), "html", null, true);
                        echo "
                                                         </div>
                                                         <div class=\"card-body\">
                                                             <p class=\"card-text\">
                                                                 ";
                        // line 69
                        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["ukryte"], "tresc", []), ["<img" => "<img class=\"img-fluid\"", "<a" => "<a style=\"color:007bff;\" href"]);
                        echo "
                                                             </p>
                                                         </div>
                                                     </div>
                                                 ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ukryte'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 74
                    echo "                                             </div>
                                        ";
                }
                // line 76
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['id_sek'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, $context["sekcja"], "id_sekcji", []) == "plan")) {
                // line 78
                echo "                                    <div class=\"card text-center\">
                                        <div class=\"card-header\">
                                            Studia I stopnia
                                        </div>
                                        <div class=\"card-body\">
                                            ";
                // line 83
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["plany_i_st"] ?? null), "plan", []));
                foreach ($context['_seq'] as $context["_key"] => $context["plan"]) {
                    // line 84
                    echo "                                                <a style=\"color: white;\" class=\"btn btn-dark btn-block mb-2\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["plan"], "link", []), "html", null, true);
                    echo "\" role=\"button\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["plan"], "opis", []), "html", null, true);
                    echo "</a>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plan'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 86
                echo "                                        </div>
                                    </div>
                                    <div class=\"card text-center\">
                                        <div class=\"card-header\">
                                            Studia II stopnia
                                        </div>
                                        <div class=\"card-body\">
                                            ";
                // line 93
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["plany_ii_st"] ?? null), "plan", []));
                foreach ($context['_seq'] as $context["_key"] => $context["plan"]) {
                    // line 94
                    echo "                                                <a style=\"color: white;\" class=\"btn btn-dark btn-block mb-2\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["plan"], "link", []), "html", null, true);
                    echo "\" role=\"button\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["plan"], "opis", []), "html", null, true);
                    echo "</a>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plan'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 96
                echo "                                        </div>
                                    </div>
                                ";
            }
            // line 99
            echo "                            </div>
                        </div>
                    </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sekcja'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "            </div>
        </div>
    </div>
</main>
";
    }

    public function getTemplateName()
    {
        return "home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  312 => 103,  295 => 99,  290 => 96,  279 => 94,  275 => 93,  266 => 86,  255 => 84,  251 => 83,  244 => 78,  241 => 77,  235 => 76,  231 => 74,  220 => 69,  213 => 65,  209 => 63,  205 => 62,  201 => 61,  194 => 57,  189 => 55,  185 => 54,  179 => 53,  175 => 52,  169 => 50,  158 => 45,  151 => 41,  147 => 39,  143 => 38,  137 => 35,  133 => 34,  126 => 32,  118 => 31,  111 => 29,  105 => 28,  101 => 26,  98 => 25,  94 => 24,  87 => 22,  81 => 19,  76 => 17,  68 => 16,  65 => 15,  48 => 14,  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.html.twig", "C:\\xampp\\htdocs\\ikntemptwig\\vendor\\dark\\home.html.twig");
    }
}
