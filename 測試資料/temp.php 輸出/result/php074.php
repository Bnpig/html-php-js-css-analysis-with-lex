<?php
            }
            // Image info
            if ($is_image) {
                $image_size = getimagesize($file_path);
                echo fm_t('Image sizes:') . ' ' . (isset($image_size[0]) ? $image_size[0] : '0') . ' x ' . (isset($image_size[1]) ? $image_size[1] : '0') . '<br>';
            }
            // Text info
            if ($is_text) {
                $is_utf8 = fm_is_utf8($content);
                if (function_exists('iconv')) {
                    if (!$is_utf8) {
                        $content = iconv(FM_ICONV_INPUT_ENC, 'UTF-8//IGNORE', $content);
                    }
                }
                echo fm_t('Charset:') . ' ' . ($is_utf8 ? 'utf-8' : '8 bit') . '<br>';
            }
            ?>