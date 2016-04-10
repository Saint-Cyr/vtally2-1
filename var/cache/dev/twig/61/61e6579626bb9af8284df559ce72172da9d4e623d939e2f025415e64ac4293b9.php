<?php

/* @Framework/Form/form_row.html.php */
class __TwigTemplate_4ef22dfe9165b603951cf08752729a5caeabae58a5798af264440a67759c413b extends Twig_Template
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
        $__internal_48960c813552d27c3a75c95c83befe1f74daabb85f9968abdc3e448a440bceac = $this->env->getExtension("native_profiler");
        $__internal_48960c813552d27c3a75c95c83befe1f74daabb85f9968abdc3e448a440bceac->enter($__internal_48960c813552d27c3a75c95c83befe1f74daabb85f9968abdc3e448a440bceac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->label(\$form) ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_48960c813552d27c3a75c95c83befe1f74daabb85f9968abdc3e448a440bceac->leave($__internal_48960c813552d27c3a75c95c83befe1f74daabb85f9968abdc3e448a440bceac_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div>*/
/*     <?php echo $view['form']->label($form) ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php echo $view['form']->widget($form) ?>*/
/* </div>*/
/* */
