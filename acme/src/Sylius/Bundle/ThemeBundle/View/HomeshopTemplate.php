<?php

namespace Sylius\Bundle\ThemeBundle\View;

use Pagerfanta\View\Template\Template;

class HomeshopTemplate extends Template
{
    static protected $defaultOptions = array(
        'previous_message'   => '<div class="previous"><i class="icons icon-left-dir"></i></div>',
        'next_message'       => '<div class="next"><i class="icons icon-right-dir"></i></div>',
        'css_disabled_class' => 'disabled',
        'css_dots_class'     => '',
        'css_current_class'  => '',
        'dots_text'          => '...',
        'container_template' => '<div class="col-lg-6 col-md-6 col-sm-6"><div class="pagination">%pages%</div></div>',
        'page_template'      => '<a href="%href%"><div class="page-button">%text%</div></a>',
        'span_template'      => '<a href="#"><div class="page-button %class%">%text%</div></a>',
    );

    public function container()
    {
        return $this->option('container_template');
    }

    public function page($page)
    {
        $text = $page;
        return $this->pageWithText($page, $text);
    }

    public function pageWithText($page, $text)
    {
        $search = array('%href%', '%text%');

        $href = $this->generateRoute($page);
        $replace = array($href, $text);

        return str_replace($search, $replace, $this->option('page_template'));
    }

    public function previousDisabled()
    {
        return $this->generateSpan($this->option('css_disabled_class'), $this->option('previous_message'));
    }

    public function previousEnabled($page)
    {
        return $this->pageWithText($page, $this->option('previous_message'));
      #  return '<a href="#"><div class="page-button">'.$page.'</div></a>';
    }

    public function nextDisabled()
    {
        return $this->generateSpan($this->option('css_disabled_class'), $this->option('next_message'));
    }

    public function nextEnabled($page)
    {
        return $this->pageWithText($page, $this->option('next_message'));
    }

    public function first()
    {
        return $this->page(1);
    }

    public function last($page)
    {
        return $this->page($page);
    }

    public function current($page)
    {
       return '<a href="#"><div class="page-button">'.$page.'</div></a>';
    }

    public function separator()
    {
        return $this->generateSpan($this->option('css_dots_class'), $this->option('dots_text'));
    }

    private function generateSpan($class, $page)
    {
        $search = array('%class%', '%text%');
        $replace = array($class, $page);

        return str_replace($search, $replace, $this->option('span_template'));
    }


}