<?php
        $path = fm_clean_path($path);
        $root_url = "<a href='?p='><i class='icon-home' title='" . FM_ROOT_PATH . "'></i></a>";
        $sep = '<i class="icon-separator"></i>';
        if ($path != '') {
            $exploded = explode('/', $path);
            $count = count($exploded);
            $array = array();
            $parent = '';
            for ($i = 0; $i < $count; $i++) {
                $parent = trim($parent . '/' . $exploded[$i], '/');
                $parent_enc = urlencode($parent);
                $array[] = "<a href='?p={$parent_enc}'>" . fm_convert_win($exploded[$i]) . "</a>";
            }
            $root_url .= $sep . implode($sep, $array);
        }
        echo '<div class="break-word">' . $root_url . '</div>';
        ?>