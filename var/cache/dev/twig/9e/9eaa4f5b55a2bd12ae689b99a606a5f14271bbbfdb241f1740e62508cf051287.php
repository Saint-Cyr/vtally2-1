<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_2365a5ab11e5e7555801b58b2d26b4c46a4f188c58f3eb2ae768f517efd1f9ea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5525911393ed7da47f7b4a927e3bc01dde3027a4f88ea3758b20538b70297f50 = $this->env->getExtension("native_profiler");
        $__internal_5525911393ed7da47f7b4a927e3bc01dde3027a4f88ea3758b20538b70297f50->enter($__internal_5525911393ed7da47f7b4a927e3bc01dde3027a4f88ea3758b20538b70297f50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5525911393ed7da47f7b4a927e3bc01dde3027a4f88ea3758b20538b70297f50->leave($__internal_5525911393ed7da47f7b4a927e3bc01dde3027a4f88ea3758b20538b70297f50_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_69e90055263ab45eff01cb17d73a2eb117bd7b945567861e8014ae64a0cab7ab = $this->env->getExtension("native_profiler");
        $__internal_69e90055263ab45eff01cb17d73a2eb117bd7b945567861e8014ae64a0cab7ab->enter($__internal_69e90055263ab45eff01cb17d73a2eb117bd7b945567861e8014ae64a0cab7ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_69e90055263ab45eff01cb17d73a2eb117bd7b945567861e8014ae64a0cab7ab->leave($__internal_69e90055263ab45eff01cb17d73a2eb117bd7b945567861e8014ae64a0cab7ab_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_3da0e1f6cc720e3f22fbb4c77d4d2e46699acf262679d45588d527cebd63887a = $this->env->getExtension("native_profiler");
        $__internal_3da0e1f6cc720e3f22fbb4c77d4d2e46699acf262679d45588d527cebd63887a->enter($__internal_3da0e1f6cc720e3f22fbb4c77d4d2e46699acf262679d45588d527cebd63887a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_3da0e1f6cc720e3f22fbb4c77d4d2e46699acf262679d45588d527cebd63887a->leave($__internal_3da0e1f6cc720e3f22fbb4c77d4d2e46699acf262679d45588d527cebd63887a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_c889a905c16899af06296072204e10fb9ccdc75ba0f46e71c4ef79f9be8c8895 = $this->env->getExtension("native_profiler");
        $__internal_c889a905c16899af06296072204e10fb9ccdc75ba0f46e71c4ef79f9be8c8895->enter($__internal_c889a905c16899af06296072204e10fb9ccdc75ba0f46e71c4ef79f9be8c8895_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_c889a905c16899af06296072204e10fb9ccdc75ba0f46e71c4ef79f9be8c8895->leave($__internal_c889a905c16899af06296072204e10fb9ccdc75ba0f46e71c4ef79f9be8c8895_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
