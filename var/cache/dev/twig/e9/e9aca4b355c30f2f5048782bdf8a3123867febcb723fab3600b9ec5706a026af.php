<?php

/* ::base.html.twig */
class __TwigTemplate_3bf53c45d163349a2aa2e1eb84d489b3b7020af5aad46886c0531758107e4518 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_37e0c17d9afa9333c2960ed8a705697202a715cb404cd2ac3ba665a0ffb72e31 = $this->env->getExtension("native_profiler");
        $__internal_37e0c17d9afa9333c2960ed8a705697202a715cb404cd2ac3ba665a0ffb72e31->enter($__internal_37e0c17d9afa9333c2960ed8a705697202a715cb404cd2ac3ba665a0ffb72e31_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_37e0c17d9afa9333c2960ed8a705697202a715cb404cd2ac3ba665a0ffb72e31->leave($__internal_37e0c17d9afa9333c2960ed8a705697202a715cb404cd2ac3ba665a0ffb72e31_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_2767334fad0a18db21e744079335b41eafbbe55050036f8f86102a2386764fde = $this->env->getExtension("native_profiler");
        $__internal_2767334fad0a18db21e744079335b41eafbbe55050036f8f86102a2386764fde->enter($__internal_2767334fad0a18db21e744079335b41eafbbe55050036f8f86102a2386764fde_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_2767334fad0a18db21e744079335b41eafbbe55050036f8f86102a2386764fde->leave($__internal_2767334fad0a18db21e744079335b41eafbbe55050036f8f86102a2386764fde_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_4d826efb1c9e5791986256929c569933015f2a40c165053e8cdd1afa30c283c1 = $this->env->getExtension("native_profiler");
        $__internal_4d826efb1c9e5791986256929c569933015f2a40c165053e8cdd1afa30c283c1->enter($__internal_4d826efb1c9e5791986256929c569933015f2a40c165053e8cdd1afa30c283c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_4d826efb1c9e5791986256929c569933015f2a40c165053e8cdd1afa30c283c1->leave($__internal_4d826efb1c9e5791986256929c569933015f2a40c165053e8cdd1afa30c283c1_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_b382a882c5f42dd4f3303a6fc39e1edf1c38f50b0d8c1ff1e8beed01f83671e4 = $this->env->getExtension("native_profiler");
        $__internal_b382a882c5f42dd4f3303a6fc39e1edf1c38f50b0d8c1ff1e8beed01f83671e4->enter($__internal_b382a882c5f42dd4f3303a6fc39e1edf1c38f50b0d8c1ff1e8beed01f83671e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_b382a882c5f42dd4f3303a6fc39e1edf1c38f50b0d8c1ff1e8beed01f83671e4->leave($__internal_b382a882c5f42dd4f3303a6fc39e1edf1c38f50b0d8c1ff1e8beed01f83671e4_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f2f8f4aaa02243ef8490b19ebd84f694d7b1a179b269396cf149e6e01216b221 = $this->env->getExtension("native_profiler");
        $__internal_f2f8f4aaa02243ef8490b19ebd84f694d7b1a179b269396cf149e6e01216b221->enter($__internal_f2f8f4aaa02243ef8490b19ebd84f694d7b1a179b269396cf149e6e01216b221_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_f2f8f4aaa02243ef8490b19ebd84f694d7b1a179b269396cf149e6e01216b221->leave($__internal_f2f8f4aaa02243ef8490b19ebd84f694d7b1a179b269396cf149e6e01216b221_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
