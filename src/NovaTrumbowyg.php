<?php

namespace Alfonsobries\NovaTrumbowyg;

use Laravel\Nova\Fields\Field;

class NovaTrumbowyg extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-trumbowyg';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'options' => [
                'btns' => [
                    ['bold', 'italic'],
                    ['unorderedList', 'orderedList'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['link', 'insertImage'],
                ],
            ]
        ]);
    }

    /**
     * Allow to pass any existing Trumbowyg option to the editor.
     * Consult the Trumbowyg documentation [https://alex-d.github.io/Trumbowyg/documentation/#basic-options]
     * to view the list of all the available options.
     *
     * @param  array  $options
     * @return self
     */
    public function options(array $options)
    {
        $currentOptions = $this->meta['options'];
        
        return $this->withMeta([
            'options' => array_merge($currentOptions, $options)
        ]);
    }
}
