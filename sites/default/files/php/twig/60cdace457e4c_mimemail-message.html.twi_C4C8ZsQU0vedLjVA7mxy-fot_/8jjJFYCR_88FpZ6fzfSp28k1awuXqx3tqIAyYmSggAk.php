<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* profiles/opigno_lms/modules/contrib/mimemail/templates/mimemail-message.html.twig */
class __TwigTemplate_c75a7544594138af122a53bd818617938aec918a1e1b06aa050f62268da271fb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 32, "if" => 38];
        $filters = ["escape" => 40, "raw" => 47];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'raw'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 32
        $context["classes"] = ((($context["module"] ?? null)) ? (((($context["key"] ?? null)) ? ((($this->sandbox->ensureToStringAllowed(($context["module"] ?? null)) . "-") . $this->sandbox->ensureToStringAllowed(($context["key"] ?? null)))) : (""))) : (""));
        // line 33
        echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <title>Mime Mail message template</title>
";
        // line 38
        if (($context["css"] ?? null)) {
            // line 39
            echo "    <style type=\"text/css\">
      <!-- ";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["css"] ?? null)), "html", null, true);
            echo " -->
    </style>
";
        }
        // line 43
        echo "  </head>
  <body id=\"mimemail-body\"";
        // line 44
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
    <div id=\"center\">
      <div id=\"main\">
        ";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["body"] ?? null)));
        echo "
      </div>
    </div>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "profiles/opigno_lms/modules/contrib/mimemail/templates/mimemail-message.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 47,  78 => 44,  75 => 43,  69 => 40,  66 => 39,  64 => 38,  57 => 33,  55 => 32,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/opigno_lms/modules/contrib/mimemail/templates/mimemail-message.html.twig", "/var/www/html/profiles/opigno_lms/modules/contrib/mimemail/templates/mimemail-message.html.twig");
    }
}
