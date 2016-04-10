<?php

/* @Framework/Form/textarea_widget.html.php */
class __TwigTemplate_5577f764d71b4034d2ed129ae6b0b9e946af61022ff1d72d2c26f37ed0163473 extends Twig_Template
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
        $__internal_c44b3172b65bce3a5b240ab654b6552d388b0daefdcdc6c1750e589d3d68aa8b = $this->env->getExtension("native_profiler");
        $__internal_c44b3172b65bce3a5b240ab654b6552d388b0daefdcdc6c1750e589d3d68aa8b->enter($__internal_c44b3172b65bce3a5b240ab654b6552d388b0daefdcdc6c1750e589d3d68aa8b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/textarea_widget.html.php"));

        // line 1
        echo "<textarea <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>><?php echo \$view->escape(\$value) ?></textarea>
";
        
        $__internal_c44b3172b65bce3a5b240ab654b6552d388b0daefdcdc6c1750e589d3d68aa8b->leave($__internal_c44b3172b65bce3a5b240ab654b6552d388b0daefdcdc6c1750e589d3d68aa8b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/textarea_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <textarea <?php echo $view['form']->block($form, 'widget_attributes') ?>><?php echo $view->escape($value) ?></textarea>*/
/* */
