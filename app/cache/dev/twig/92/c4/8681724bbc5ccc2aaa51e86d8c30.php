<?php

/* WebProfilerBundle:Profiler:base_js.html.twig */
class __TwigTemplate_92c48681724bbc5ccc2aaa51e86d8c30 extends Twig_Template
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
        // line 1
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},
            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },
            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },
            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },
            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            };

        return {
            hasClass: hasClass,
            removeClass: removeClass,
            addClass: addClass,
            request: request,
            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },
            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }

        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  50 => 15,  47 => 14,  43 => 13,  35 => 11,  30 => 5,  26 => 3,  24 => 2,  101 => 50,  88 => 40,  84 => 39,  73 => 35,  45 => 20,  19 => 1,  119 => 38,  116 => 37,  114 => 36,  111 => 35,  106 => 27,  103 => 26,  95 => 14,  89 => 8,  83 => 40,  81 => 38,  77 => 33,  75 => 36,  70 => 34,  68 => 26,  63 => 23,  61 => 30,  54 => 26,  52 => 14,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  23 => 4,  315 => 264,  238 => 190,  202 => 157,  166 => 124,  130 => 91,  113 => 77,  96 => 63,  32 => 6,  29 => 6,  72 => 20,  67 => 18,  60 => 14,  55 => 16,  51 => 15,  46 => 14,  42 => 12,  39 => 12,  33 => 10,  31 => 9,  28 => 3,);
    }
}
