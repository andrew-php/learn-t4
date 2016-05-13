<?php

namespace App\Models;


use T4\Core\Std;

class Article
    extends Std
{
    protected function sanitizeTextProperty($value)
    {
        if (!is_null($value)) {
            $value = trim($value);
            $value = htmlspecialchars($value);
        }

        return $value;
    }

    protected function sanitizeImgUrl($value)
    {
        if (!is_null($value)) {
            $value = $this->sanitizeTextProperty($value);
            if ((substr($value, 0, 7) != "http://") && (substr($value, 0, 8) != "https://")) {
                $value = 'http://' . $value;
            }
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                preg_match("/(?i)\.(jpg|jpeg|png|gif)$/", $value, $imgExtentionWasFound);
            }
            if (!empty($imgExtentionWasFound)) {
                return $value;
            }
        }

        return '';
    }

    protected function setTitle($value)
    {
        $this->__data['title'] = $this->sanitizeTextProperty($value);
    }

    protected function setText($value)
    {
        $this->__data['text'] = $this->sanitizeTextProperty($value);
    }

    protected function setImg($value)
    {
        $this->__data['img'] = $this->sanitizeImgUrl($value);
    }

    public function isComplete()
    {
        if(!is_null($this->__data['title']) && !is_null($this->__data['text'])) {
            return true;
        }
        
        return false;
    }
}