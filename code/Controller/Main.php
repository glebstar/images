<?php

require_once TF_CODE_DIR . '/Model/Image.php';

class Controller_Main extends Controller {

    public function mainAction() {
        $this->_addScript('/js/ajaxupload.js');
        $this->_addScript('/js/main.js');
    }

    public function loadAction() {
        set_time_limit(0);
        
        $data = array(
            'status' => true,
            'error' => '',
            'images' => array()
        );

        if (!isset($_FILES['uploads']['tmp_name'])) {
            $data['status'] = false;
            $data['error'] = 'Не загружен файл';
            $this->_echoJson($data);
        }
        
        $file = file($_FILES['uploads']['tmp_name']);
        if (!$file) {
            $data['status'] = false;
            $data['error'] = 'Не удалось прочитать файл';
            $this->_echoJson($data);
        } else {
            foreach ($file as $url) {
                if (preg_match('/^http|^https/', $url)) {
                    try {
                        $data['images'][] = Model_Image::addImage(trim($url));
                    } catch (Model_Image_Exception $e) {
                        $data['status'] = false;
                        $data['error'] = $e->getMessage();
                        $this->_echoJson($data);
                    }
                } else {
                    $data['status'] = false;
                    $data['error'] = 'Некорректная строка в файле ' . $url;
                    $this->_echoJson($data);
                }
            }
        }

        $this->_echoJson($data);
    }

    private function _echoJson($value) {
        echo json_encode($value);
        exit;
    }
}
