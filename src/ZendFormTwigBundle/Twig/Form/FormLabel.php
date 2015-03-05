<?php

class FormLabel extends FormElement
{
    /**
     * Generates a 'label' element.
     *
     * @param  string $name The form element name for which the label is being generated
     * @param  string $value The label text
     * @param  array $attribs Form element attributes (used to determine if disabled)
     * @return string The element XHTML.
     */
    public function formLabel($name, $value = null, array $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable, escape

        // build the element
        if ($disable) {
            // disabled; display nothing
            return '';
        }

        $value = ($escape) ? $this->escape($value) : $value;
        $for = (empty($attribs['disableFor']) || !$attribs['disableFor'])
            ? ' for="' . $this->escape($id) . '"'
            : '';
        if (array_key_exists('disableFor', $attribs)) {
            unset($attribs['disableFor']);
        }

        // enabled; display label
        $xhtml = '<label'
            . $for
            . $this->_htmlAttribs($attribs)
            . '>' . $value . '</label>';

        return $xhtml;
    }
}
