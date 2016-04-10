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
        $__internal_e9af150db17acaeadd879d4362ad627e57c3dbc2aeb84ec55bb60330796546a4 = $this->env->getExtension("native_profiler");
        $__internal_e9af150db17acaeadd879d4362ad627e57c3dbc2aeb84ec55bb60330796546a4->enter($__internal_e9af150db17acaeadd879d4362ad627e57c3dbc2aeb84ec55bb60330796546a4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e9af150db17acaeadd879d4362ad627e57c3dbc2aeb84ec55bb60330796546a4->leave($__internal_e9af150db17acaeadd879d4362ad627e57c3dbc2aeb84ec55bb60330796546a4_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_a11dc1f34be09e6d6da9a2572b3314318f3a7e25eb4128052a0d08b217da3ba9 = $this->env->getExtension("native_profiler");
        $__internal_a11dc1f34be09e6d6da9a2572b3314318f3a7e25eb4128052a0d08b217da3ba9->enter($__internal_a11dc1f34be09e6d6da9a2572b3314318f3a7e25eb4128052a0d08b217da3ba9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_a11dc1f34be09e6d6da9a2572b3314318f3a7e25eb4128052a0d08b217da3ba9->leave($__internal_a11dc1f34be09e6d6da9a2572b3314318f3a7e25eb4128052a0d08b217da3ba9_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_9a34a541a9149d221b6e688e5ee13b719c87aed25f9e9752ea0271639fb23848 = $this->env->getExtension("native_profiler");
        $__internal_9a34a541a9149d221b6e688e5ee13b719c87aed25f9e9752ea0271639fb23848->enter($__internal_9a34a541a9149d221b6e688e5ee13b719c87aed25f9e9752ea0271639fb23848_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_9a34a541a9149d221b6e688e5ee13b719c87aed25f9e9752ea0271639fb23848->leave($__internal_9a34a541a9149d221b6e688e5ee13b719c87aed25f9e9752ea0271639fb23848_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_075abddba257f2393e431cdbee1cca8685e069d41440befdefd8033aff83706e = $this->env->getExtension("native_profiler");
        $__internal_075abddba257f2393e431cdbee1cca8685e069d41440befdefd8033aff83706e->enter($__internal_075abddba257f2393e431cdbee1cca8685e069d41440befdefd8033aff83706e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_075abddba257f2393e431cdbee1cca8685e069d41440befdefd8033aff83706e->leave($__internal_075abddba257f2393e431cdbee1cca8685e069d41440befdefd8033aff83706e_prof);

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
