<?php

namespace Adaptcms\FieldRadio\Field;

use Adaptcms\Fields\FieldType;

class FieldRadio extends FieldType
{
  /**
  * Create Field Rules
  *
  * @return array
  */
  public function createFieldRules()
  {
    return [
      'meta.options' => 'required'
    ];
  }
}
