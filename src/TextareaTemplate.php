<?php

namespace Gkermer\TextareaTemplate;

use Laravel\Nova\Fields\Textarea;

class TextareaTemplate extends Textarea
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'textarea-template';

    /**
     * Set the templates for the select menu.
     *
     * @param  array  $templates
     * @return $this
     */
    public function templates($templates)
    {
        return $this->withMeta([
            'templates' => collect($templates ?? [])->map(function ($value, $label) {
                return ['label' => $label, 'value' => $value];
            })->values()->all()
        ]);
    }
}
