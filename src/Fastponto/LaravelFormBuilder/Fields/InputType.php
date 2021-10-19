<?php

namespace  Fastponto\LaravelFormBuilder\Fields;

class InputType extends FormField
{

    /**
     * @inheritdoc
     */
    protected function getTemplate()
    {
        return 'text';
    }

}
