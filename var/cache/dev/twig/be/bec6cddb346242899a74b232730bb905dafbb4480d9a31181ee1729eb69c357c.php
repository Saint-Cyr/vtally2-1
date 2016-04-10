<?php

/* @Framework/Form/money_widget.html.php */
class __TwigTemplate_8f333eb72f0b4965c02f0420d1861db97bcb622a03706fd924601430fc02ad74 extends Twig_Template
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
        $__internal_dfd7e7fe373c2902be685109e5eded2fb10abfd4d70dfd4ec986032cf6637ee8 = $this->env->getExtension("native_profiler");
        $__internal_dfd7e7fe373c2902be685109e5eded2fb10abfd4d70dfd4ec986032cf6637ee8->enter($__internal_dfd7e7fe373c2902be685109e5eded2fb10abfd4d70dfd4ec986032cf6637ee8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/money_widget.html.php"));

        // line 1
        echo "<?php echo str_replace('";
        echo twig_escape_filter($this->env, (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "html", null, true);
        echo "', \$view['form']->block(\$form, 'form_widget_simple'), \$money_pattern) ?>
";
        
        $__internal_dfd7e7fe373c2902be685109e5eded2fb10abfd4d70dfd4ec986032cf6637ee8->leave($__internal_dfd7e7fe373c2902be685109e5eded2fb10abfd4d70dfd4ec986032cf6637ee8_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/money_widget.html.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php echo str_replace('{{ widget }}', $view['form']->block($form, 'form_widget_simple'), $money_pattern) ?>*/
/* */
