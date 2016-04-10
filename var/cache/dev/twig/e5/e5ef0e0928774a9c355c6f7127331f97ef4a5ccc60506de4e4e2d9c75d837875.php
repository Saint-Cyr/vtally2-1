<?php

/* @Framework/FormTable/hidden_row.html.php */
class __TwigTemplate_05eb726049ca3376da1c4038140f0be75cecec8c89a4f6fb8b88799c9870b7a6 extends Twig_Template
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
        $__internal_56e8130138fb626917adc9808f3c6891e4ed0fa0aeaee6c65035c33cc6c3e128 = $this->env->getExtension("native_profiler");
        $__internal_56e8130138fb626917adc9808f3c6891e4ed0fa0aeaee6c65035c33cc6c3e128->enter($__internal_56e8130138fb626917adc9808f3c6891e4ed0fa0aeaee6c65035c33cc6c3e128_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        // line 1
        echo "<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_56e8130138fb626917adc9808f3c6891e4ed0fa0aeaee6c65035c33cc6c3e128->leave($__internal_56e8130138fb626917adc9808f3c6891e4ed0fa0aeaee6c65035c33cc6c3e128_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/hidden_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr style="display: none">*/
/*     <td colspan="2">*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
