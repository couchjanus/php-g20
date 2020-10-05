<?php

/**
 * The view class.
 *
 * Responsible for rendering files as HTML with some helper methods
 *
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author     Janus Nic <couchjanus@gmail.com>
 */

class View {

    /**
     * Renders and returns output for the given file with its array of data.
     *
     * @param  string  $template
     * @param  string  $layout
     * @param  array   $data
     * @return string  Rendered output
     *
     */
        
    public function render($template, $data = null, $layout='app', $error = false)
    {
        if(!empty($data)) {
            extract($data);
        }
        
        $template .= '.php';
        return require VIEWS."/layouts/${layout}.php";
    }
} 
