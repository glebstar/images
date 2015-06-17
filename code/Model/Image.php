<?php

require_once TF_CODE_DIR . '/Model.php';

class Model_Image extends Model {

    public static function addImage($url) {
        $image = Model::getRow('SELECT id, width FROM image WHERE url=?', array($url));
        if ($image) {
            return array(
                $image['id'] . '.jpg',
                $image['width']
            );
        }

        $path = TF_ROOT_DIR . '/web/images/tmp';
        file_put_contents($path, file_get_contents($url));

        $size = getimagesize($path);

        if ($size) {
            $oldimg = false;
            if ($size[2] == IMAGETYPE_PNG) {
                $oldimg = imagecreatefrompng($path);
            }

            if ($size[2] == IMAGETYPE_GIF) {
                $oldimg = imagecreatefromgif($path);
            }

            if ($size[2] == IMAGETYPE_JPEG) {
                $oldimg = imagecreatefromjpeg($path);
            }

            if (!$oldimg) {
                throw new Model_Image_Exception('Тип изображения ' . $url . ' не поддерживается');
            }

            $insertData = array();
            $insertData['url'] = $url;
            $insertData['width'] = round($size[0] / ($size['1'] / 200));
            Model::insertArray('image', $insertData);
            $id = Model::getOne('SELECT id FROM image WHERE url=?', array($url));

            $newimg = imagecreatetruecolor($insertData['width'], 200);
            imagecopyresampled($newimg, $oldimg, 0, 0, 0, 0, $insertData['width'], 200, $size[0], $size[1]);

            $water = imagecreatefrompng(TF_ROOT_DIR . '/web/images/watermark.png');
            $waterX = round(($insertData['width'] - 150) / 2);

            imagecopyresampled($newimg, $water, $waterX, 0, 0, 0, 150, 200, 150, 200);

            imagejpeg($newimg, TF_ROOT_DIR . '/web/images/' . $id . '.jpg');

            return array(
                $id . '.jpg',
                $insertData['width']
            );
        } else {
            throw new Model_Image_Exception('Некорректное изображение ' . $url);
        }
    }

}

class Model_Image_Exception extends Exception {
    
}
