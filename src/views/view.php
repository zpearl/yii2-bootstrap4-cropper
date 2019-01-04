<?php
/**
 * @author      Dmitriy Sabirov <web8dew@yandex.ru>
 * @copyright   Dmitriy Sabirov 19.12.18
 * @license     MIT
 * @license     https://opensource.org/licenses/MIT
 * @since       19.12.18
 */

use yii\bootstrap4\Modal;
use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $imageId string
 * @var $imageUrl string
 * @var $extensionOptions array
 * @var $modalId string
 * @var $inputImageId string id of image input field
 */
?>
    <div class="cropper-wrapper clearfix">
        <div class="cropper-preview">
            <div class="cropper-preview-img">
                <?= Html::img(
                    $imageUrl,
                    [
                        'width' => $extensionOptions['preview']['width'],
                        'height' => $extensionOptions['preview']['height'],
                        'alt' => 'cropper image preview'
                    ]
                ) ?>
            </div>
            <div class="cropper-preview-buttons">
                <?php
                echo Html::button(
                    'Change',
                    [
                        'class' => 'btn btn-primary',
                        'type' => 'button',
                        'data-toggle' => 'modal',
                        'data-target' => $modalId
                    ]
                );
                ?>
            </div>
        </div>
    </div>
<?php
Modal::begin([
    'id' => $modalId,
    'class' => 'modal fade',
    'title' => 'Cropping the Image',
    'footer' => '<div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    ' . $extensionOptions['browseButtonText'] . ' <input type="file" id="' . $inputImageId . '">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>',
    'size' => Modal::SIZE_LARGE
]);

echo '<div>';
echo Html::img('#', [
    'id' => $imageId,
    'class' => 'sabirov-cropper-image',
    'alt' => 'Upload a picture',
]);
echo '</div>';

Modal::end();

/* passing variables to JS */
$passVariables = <<<JS
const inputImageId = '#'+'$inputImageId';
const imageId = '#'+'$imageId';
JS;
Yii::$app->view->registerJs($passVariables, $this::POS_HEAD);
