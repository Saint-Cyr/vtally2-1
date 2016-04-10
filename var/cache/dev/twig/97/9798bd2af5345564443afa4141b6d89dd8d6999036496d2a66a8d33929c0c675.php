<?php

/* @Framework/FormTable/form_row.html.php */
class __TwigTemplate_d9bfebd3aa26251f33c443163ff2dddc62d2022b5f9b43753afd81eedb7de20e extends Twig_Template
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
        $__internal_fc37c0957b27b3fb46db2fe854191a27d87727b37b512872ea0b495e4dc0759c = $this->env->getExtension("native_profiler");
        $__internal_fc37c0957b27b3fb46db2fe854191a27d87727b37b512872ea0b495e4dc0759c->enter($__internal_fc37c0957b27b3fb46db2fe854191a27d87727b37b512872ea0b495e4dc0759c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_row.html.php"));

        // line 1
        echo "<tr>
    <td>
        <?php echo \$view['form']->label(\$form) ?>
    </td>
    <td>
        <?php echo \$view['form']->errors(\$form) ?>
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_fc37c0957b27b3fb46db2fe854191a27d87727b37b512872ea0b495e4dc0759c->leave($__internal_fc37c0957b27b3fb46db2fe854191a27d87727b37b512872ea0b495e4dc0759c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr>*/
/*     <td>*/
/*         <?php echo $view['form']->label($form) ?>*/
/*     </td>*/
/*     <td>*/
/*         <?php echo $view['form']->errors($form) ?>*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
