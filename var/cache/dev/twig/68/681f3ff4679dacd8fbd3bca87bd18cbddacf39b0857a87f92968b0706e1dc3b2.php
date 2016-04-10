<?php

/* @Framework/Form/form_errors.html.php */
class __TwigTemplate_531aa8adebe993fb91dfb792e469f5766657a2d4955ed5a38a35263d0ba2dad1 extends Twig_Template
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
        $__internal_dc35881e3fda04d4a2fe151001f96f11863f40de19feac62e2ca83302d8c20dc = $this->env->getExtension("native_profiler");
        $__internal_dc35881e3fda04d4a2fe151001f96f11863f40de19feac62e2ca83302d8c20dc->enter($__internal_dc35881e3fda04d4a2fe151001f96f11863f40de19feac62e2ca83302d8c20dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_errors.html.php"));

        // line 1
        echo "<?php if (count(\$errors) > 0): ?>
    <ul>
        <?php foreach (\$errors as \$error): ?>
            <li><?php echo \$error->getMessage() ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>
";
        
        $__internal_dc35881e3fda04d4a2fe151001f96f11863f40de19feac62e2ca83302d8c20dc->leave($__internal_dc35881e3fda04d4a2fe151001f96f11863f40de19feac62e2ca83302d8c20dc_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_errors.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (count($errors) > 0): ?>*/
/*     <ul>*/
/*         <?php foreach ($errors as $error): ?>*/
/*             <li><?php echo $error->getMessage() ?></li>*/
/*         <?php endforeach; ?>*/
/*     </ul>*/
/* <?php endif ?>*/
/* */
