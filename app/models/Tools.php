<?php

include_once "AppModel.php";

class Tools extends AppModel {

    // extract form data from $_POST
    public static function extractFormData($formData) {
        $formData = array_map('trim', $formData);
        $formData = array_map('stripslashes', $formData);
        $formData = array_map('htmlspecialchars', $formData);
        return $formData;
    }
}