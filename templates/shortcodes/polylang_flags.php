<?php

    function polylang_flags_shortcode() {

        $polylang_options_flags = get_fields('options')['language_flags'] ?? '';
        $polylang_options_names = get_fields('options')['language_names'] ?? '';
        $polylang_options_dropdowns = get_fields('options')['language_dropdowns'] ?? '';

        ob_start();
        if (function_exists('pll_the_languages')){
            pll_the_languages(array('show_flags'=>$polylang_options_flags,'show_names'=>$polylang_options_names, 'dropdown' =>$polylang_options_dropdowns));
        }

        $flags = ob_get_clean();
        return '<ul class="polylang-flags">' . $flags . '</ul>';
    }
    add_shortcode('POLYLANG', 'polylang_flags_shortcode');

    /**
     * To uninstall Polylang, please read further oficial documentation: https://polylang.pro/doc/how-to-uninstall-polylang/
     */

?>