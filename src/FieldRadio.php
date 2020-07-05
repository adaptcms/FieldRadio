<?php

namespace Adaptcms\FieldRadio;

use Adaptcms\Base\Models\Package;

class FieldRadio
{
  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
