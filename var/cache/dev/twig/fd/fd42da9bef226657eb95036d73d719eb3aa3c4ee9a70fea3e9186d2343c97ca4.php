<?php

/* @Framework/FormTable/form_widget_compound.html.php */
class __TwigTemplate_73553125f09de09ed59b14af04de09b849b732834171de9ffa315abdf4caf123 extends Twig_Template
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
        $__internal_d6c66a9f3a8462044f2992341633f68e1e1f8802b3192a130314b4a19c1fc0d3 = $this->env->getExtension("native_profiler");
        $__internal_d6c66a9f3a8462044f2992341633f68e1e1f8802b3192a130314b4a19c1fc0d3->enter($__internal_d6c66a9f3a8462044f2992341633f68e1e1f8802b3192a130314b4a19c1fc0d3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_widget_compound.html.php"));

        // line 1
        echo "<table <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <tr>
        <td colspan=\"2\">
            <?php echo \$view['form']->errors(\$form) ?>
        </td>
    </tr>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</table>
";
        
        $__internal_d6c66a9f3a8462044f2992341633f68e1e1f8802b3192a130314b4a19c1fc0d3->leave($__internal_d6c66a9f3a8462044f2992341633f68e1e1f8802b3192a130314b4a19c1fc0d3_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <table <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <tr>*/
/*         <td colspan="2">*/
/*             <?php echo $view['form']->errors($form) ?>*/
/*         </td>*/
/*     </tr>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </table>*/
/* */
