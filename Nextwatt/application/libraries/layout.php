<?php
/**
 * CodeIgnighter layout support library
 *  with Twig like inheritance blocks
 *
 * v 1.0
 *
 *
 * @author Constantin Bosneaga
 * @email  constantin@bosneaga.com
 * @url    http://a32.me/
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    private $obj;
    private $layout_view;
    private $title = '';
    private $bread = '';
    private $css_list = array(), $js_list = array(), $img_list = array(), $funcjs_list = array();
    private $block_list, $block_new, $block_replace = false;

    function Layout()
    {
        $this->obj =& get_instance();
        $this->layout_view = "layout/default.php";
        // Grab layout from called controller
        if (isset($this->obj->layout_view)) $this->layout_view = $this->obj->layout_view;
    }

    function view($view, $data = null, $return = false)
    {
        // Render template
        $data['content_for_layout'] = $this->obj->load->view($view, $data, true);
        $data['title_for_layout'] = $this->title;


        // Render resources
        $data['js_for_layout'] = '';
        foreach ($this->js_list as $v)
            $data['js_for_layout'] .= sprintf('<script type="text/javascript" src="%s"></script>', $v);
        $data['funcjs_for_layout'] = '';
        foreach ($this->funcjs_list as $v)
            $data['funcjs_for_layout'] .= sprintf('<script type="text/javascript">onload=%s</script>', $v);
        $data['css_for_layout'] = '';
        foreach ($this->css_list as $v)
            $data['css_for_layout'] .= sprintf('<link rel="stylesheet" type="text/css"  href="%s" />', $v);

        $data['images_layout'] = '';
        $tabimages = array();
        foreach ($this->img_list as $v) {
            $img = '<img src="' . $v . '"/>';
            array_push($tabimages, $img);
        }
        $data['images_layout'] = $tabimages;


        if ($this->bread != '') {
            $data['breadcrumbs_for_layout'] = '  <div id="my-wizard" data-target="#step-container">
                                             <ul class="wizard-steps">';
            $step = 1;
            foreach ($this->bread as $v) {
                $data['breadcrumbs_for_layout'] .=
                    '<li data-target="#step' . $step . '" class=' . $v['actif'] . '>
                    <a href="'.$v['link'].'">
                    <span class="step">' . $step . '</span>
                    <span class="title">' . $v['title'] . '</span>
                    </a></li>';
                $step++;
            }
            $data['breadcrumbs_for_layout'] .= '</ul></div>';
        }

        // Render template
        $this->block_replace = true;
        $output = $this->obj->load->view($this->layout_view, $data, $return);

        return $output;
    }

    /**
     * Set page title
     *
     * @param $title
     */
    function title($title)
    {
        $this->title = $title;
    }

    /**
     * Adds Javascript resource to current page
     * @param $item
     */
    function js($item)
    {
        $this->js_list[] = $item;
    }

    /**
     * Adds Javascript resource to current page
     * @param $item
     */
    function function_js($item)
    {
        $this->funcjs_list[] = $item;
    }

    /**
     * Adds CSS resource to current page
     * @param $item
     */
    function css($item)
    {
        $this->css_list[] = $item;
    }

    /**
     * Adds Images resource to current page
     * @param $item
     */
    function image($item)
    {
        $this->img_list[] = $item;
    }

    function breadcrumbs($item)
    {
        $this->bread = $item;
    }

    /**
     * Twig like template inheritance
     *
     * @param string $name
     */
    function block($name = '')
    {
        if ($name != '') {
            $this->block_new = $name;
            ob_start();
        } else {
            if ($this->block_replace) {
                // If block was overriden in template, replace it in layout
                if (!empty($this->block_list[$this->block_new])) {
                    ob_end_clean();
                    echo $this->block_list[$this->block_new];
                }
            } else {
                $this->block_list[$this->block_new] = ob_get_clean();
            }
        }
    }

}