<?php

/* footer.html.twig */
class __TwigTemplate_33b13775e5592cbe00471f400148ca12e0f55f97a9b917e76f329e7663f3747f extends Twig_Template
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
        echo "<footer>
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-4 col-sm-6 col-xs-6 text-center footer border-right rounded-left\" id=\"accordionFooter\" data-toggle=\"collapse\" data-target=\"#collapseContact\" aria-expanded=\"true\" aria-controls=\"collapseContact\">
            <div class=\"card card-footer\">
                <div class=\"card-header\" id=\"headingContact\" >
                    <img src=\"dark/images/icons-png/mail-white.png\" class=\"img-fluid\" alt=\"Responsive image\"> <br>
                    Kontakt
                </div>

                <div id=\"collapseContact\" class=\"collapse\" aria-labelledby=\"headingContact\" data-parent=\"#accordionFooter\">
                    <div class=\"card-body\">
                        <b>";
        // line 12
        echo twig_escape_filter($this->env, ($context["instytut_nazwa"] ?? null), "html", null, true);
        echo "</b> <br>
                        ";
        // line 13
        echo twig_escape_filter($this->env, ($context["kod_poczta"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["miasto"] ?? null), "html", null, true);
        echo " <br>
                        ul. ";
        // line 14
        echo twig_escape_filter($this->env, ($context["ulica"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["numer_budynku"] ?? null), "html", null, true);
        echo " <br>
                        <div class=\"alert alert-dark d-flex bd-highlight mt-2\" role=\"alert\">
                            <div class=\" bd-highlight\">
                                <img src=\"dark/images/icons-png/mail-black.png\">
                            </div>
                            <div class=\"flex-grow-1 bd-highlight\" id=\"email\">
                                <!-- ";
        // line 20
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo " -->
                            </div>
                            <script>
                                var x = \"";
        // line 23
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "\";
                                document.getElementById('email').innerHTML = x.split('(kropka)').join('.').split('(malpa)').join(\"@\");
                            </script>
                        </div>
                        <div class=\"alert alert-dark d-flex bd-highlight\" role=\"alert\">
                            <div class=\" bd-highlight\">
                                <img src=\"dark/images/icons-png/phone-black.png\">
                            </div>
                            <div class=\"flex-grow-1 bd-highlight\">
                                Tel: ";
        // line 32
        echo twig_escape_filter($this->env, ($context["num_telefon"] ?? null), "html", null, true);
        echo "
                            </div>
                        </div>
                        <div class=\"alert alert-dark\" role=\"alert\">
                            Fax: ";
        // line 36
        echo twig_escape_filter($this->env, ($context["num_fax"] ?? null), "html", null, true);
        echo "
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-sm-6 col-xs-6 text-center footer border-right rounded-left\" id=\"accordionFooter\" data-toggle=\"collapse\" data-target=\"#collapseContact\" aria-expanded=\"true\" aria-controls=\"collapseContact\">
            <div class=\"card card-footer\">
                <div class=\"card-header\" id=\"headingContact\" >
                    <img src=\"dark/images/icons-png/info-white.png\" class=\"img-fluid\" alt=\"Responsive image\"><br>
                    O programie
                </div>

                <div id=\"collapseContact\" class=\"collapse\" aria-labelledby=\"headingContact\" data-parent=\"#accordionFooter\">
                    <div class=\"card-body\">
                        <img src=\"dark/";
        // line 51
        echo twig_escape_filter($this->env, ($context["logo_app"] ?? null), "html", null, true);
        echo "\" class=\"img-fluid\" alt=\"Responsive image\"> <br>
                        <b>Autorzy</b><br>
                        ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["opiekunowie"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["opiekun"]) {
            // line 54
            echo "                            ";
            echo twig_escape_filter($this->env, $context["opiekun"], "html", null, true);
            echo " (opiekun, autor) <br>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opiekun'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["autorzy"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["autor"]) {
            // line 57
            echo "                            ";
            echo twig_escape_filter($this->env, $context["autor"], "html", null, true);
            echo " (autor) <br>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['autor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "                        <b>Licencja</b> <br>
                        Program na licencji <b>MIT</b>. <br>
                        <b>Podziękowania</b> <br>
                        Autorzy pragną podziękować wszystkim członkom Informatycznego Koła Naukowego UwB oraz dyrekcji Instytutu Informatyki.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 59,  123 => 57,  118 => 56,  109 => 54,  105 => 53,  100 => 51,  82 => 36,  75 => 32,  63 => 23,  57 => 20,  46 => 14,  40 => 13,  36 => 12,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "footer.html.twig", "C:\\xampp\\htdocs\\ikntemptwig\\vendor\\dark\\footer.html.twig");
    }
}
