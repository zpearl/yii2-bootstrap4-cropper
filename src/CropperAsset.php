<?php
/**
 * @author      Dmitriy Sabirov <web8dew@yandex.ru>
 * @copyright   Dmitriy Sabirov 15.12.18
 * @license     MIT
 * @license     https://opensource.org/licenses/MIT
 * @since       15.12.18
 */

namespace zpearl\cropper;

use yii\web\AssetBundle;

class CropperAsset extends AssetBundle
{
    public $sourcePath = '@npm/cropperjs';
    public $css = [
        'dist/cropper.min.css'
    ];
    public $js = [
        'dist/cropper.min.js'
    ];
}
