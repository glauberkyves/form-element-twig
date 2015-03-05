<?php

class Form extends FormElement
{
    /**
     * Render HTML form
     *
     * @param  string $name Form name
     * @param  null|array $attribs HTML form attributes
     * @param  false|string $content Form content
     * @return string
     */
    public function form($name, $attribs = null, $content = false)
    {
        $info = $this->_getInfo($name, $content, $attribs);
        extract($info);

        if (!empty($id)) {
            $id = ' id="' . $this->escape($id) . '"';
        } else {
            $id = '';
        }

        if (array_key_exists('id', $attribs) && empty($attribs['id'])) {
            unset($attribs['id']);
        }

        if (!empty($name) && !($this->_isXhtml() && $this->_isStrictDoctype())) {
            $name = ' name="' . $this->escape($name) . '"';
        } else {
            $name = '';
        }

        if ($this->_isHtml5() && array_key_exists('action', $attribs) && !$attribs['action']) {
            unset($attribs['action']);
        }

        if (array_key_exists('name', $attribs) && empty($attribs['id'])) {
            unset($attribs['id']);
        }

        $xhtml = '<form'
            . $id
            . $name
            . $this->_htmlAttribs($attribs)
            . '>';

        if (false !== $content) {
            $xhtml .= $content
                . '</form>';
        }

        return $xhtml;
    }
}
