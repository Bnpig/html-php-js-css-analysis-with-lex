<?php
}

/**
 * Show image
 * @param string $img
 */
function fm_show_image($img)
{
    $modified_time = gmdate('D, d M Y 00:00:00') . ' GMT';
    $expires_time = gmdate('D, d M Y 00:00:00', strtotime('+1 day')) . ' GMT';

    $img = trim($img);
    $images = fm_get_images();
    $image = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAEElEQVR42mL4//8/A0CAAQAI/AL+26JNFgAAAABJRU5ErkJggg==';
    if (isset($images[$img])) {
        $image = $images[$img];
    }
    $image = base64_decode($image);
    if (function_exists('mb_strlen')) {
        $size = mb_strlen($image, '8bit');
    } else {
        $size = strlen($image);
    }

    if (function_exists('header_remove')) {
        header_remove('Cache-Control');
        header_remove('Pragma');
    } else {
        header('Cache-Control:');
        header('Pragma:');
    }

    header('Last-Modified: ' . $modified_time, true, 200);
    header('Expires: ' . $expires_time);
    header('Content-Length: ' . $size);
    header('Content-Type: image/png');
    echo $image;

    exit;
}

/**
 * Get base64-encoded images
 * @return array
 */
function fm_get_images()
{
    return array(
        'favicon' => 'iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ
bWFnZVJlYWR5ccllPAAAAZVJREFUeNqkk79Lw0AUx1+uidTQim4Waxfpnl1BcHMR6uLkIF0cpYOI
f4KbOFcRwbGTc0HQSVQQXCqlFIXgFkhIyvWS870LaaPYH9CDy8vdfb+fey930aSUMEvT6VHVzw8x
rKUX3N3Hj/8M+cZ6GcOtBPl6KY5iAA7KJzfVWrfbhUKhALZtQ6myDf1+X5nsuzjLUmUOnpa+v5r1
Z4ZDDfsLiwER45xDEATgOI6KntfDd091GidzC8vZ4vH1QQ09+4MSMAMWRREKPMhmsyr6voYmrnb2
PKEizdEabUaeFCDKCCHAdV0wTVNFznMgpVqGlZ2cipzHGtKSZwCIZJgJwxB38KHT6Sjx21V75Jcn
LXmGAKTRpGVZUx2dAqQzSEqw9kqwuGqONTufPrw37D8lQFxCvjgPXIixANLEGfwuQacMOC4kZz+q
GdhJS550BjpRCdCbAJCMJRkMASEIg+4Bxz4JwAwDSEueAYDLIM+QrOk6GHiRxjXSkJY8KUCvdXZ6
kbuvNx+mOcbN9taGBlpLAWf9nX8EGADoCfqkKWV/cgAAAABJRU5ErkJggg==',
        'sprites' => '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
RK5CYII=',
    );
}

/**
 * Get all translations
 * @return array
 */
function fm_get_strings()
{
    static $strings;
    if ($strings !== null) {
        return $strings;
    }
    $strings = array();
    $strings['ru'] = array(
        'Folder <b>%s</b> deleted' => 'Папка <b>%s</b> удалена',
        'Folder <b>%s</b> not deleted' => 'Папка <b>%s</b> не удалена',
        'File <b>%s</b> deleted' => 'Файл <b>%s</b> удален',
        'File <b>%s</b> not deleted' => 'Файл <b>%s</b> не удален',
        'Wrong file or folder name' => 'Имя папки или файла задано не верно',
        'Folder <b>%s</b> created' => 'Папка <b>%s</b> создана',
        'Folder <b>%s</b> already exists' => 'Папка <b>%s</b> уже существует',
        'Folder <b>%s</b> not created' => 'Папка <b>%s</b> не создана',
        'Wrong folder name' => 'Имя папки задано не верно',
        'Source path not defined' => 'Не задан исходный путь',
        'Moved from <b>%s</b> to <b>%s</b>' => 'Перемещено из <b>%s</b> в <b>%s</b>',
        'File or folder with this path already exists' => 'Файл или папка уже есть по указанному пути',
        'Error while moving from <b>%s</b> to <b>%s</b>' => 'Произошла ошибка при перемещении из <b>%s</b> в <b>%s</b>',
        'Copyied from <b>%s</b> to <b>%s</b>' => 'Скопировано из <b>%s</b> в <b>%s</b>',
        'Error while copying from <b>%s</b> to <b>%s</b>' => 'Произошла ошибка при копировании из <b>%s</b> в <b>%s</b>',
        'Paths must be not equal' => 'Пути не должны совпадать',
        'Unable to create destination folder' => 'Невозможно создать папку назначения',
        'Selected files and folders moved' => 'Все отмеченные файлы и папки перемещены',
        'Selected files and folders copied' => 'Все отмеченные файлы и папки сопированы',
        'Error while moving items' => 'При перемещении возникли ошибки',
        'Error while copying items' => 'При копировании возникли ошибки',
        'Nothing selected' => 'Ничего не выбрано',
        'Renamed from <b>%s</b> to <b>%s</b>' => 'Переименовано из <b>%s</b> в <b>%s</b>',
        'Error while renaming from <b>%s</b> to <b>%s</b>' => 'Произошла ошибка при переименовании из <b>%s</b> в <b>%s</b>',
        'Names not set' => 'Не заданы имена',
        'File not found' => 'Файл не найден',
        'All files uploaded to <b>%s</b>' => 'Все файлы загружены в папку <b>%s</b>',
        'Nothing uploaded' => 'Ничего не загружено',
        'Error while uploading files. Uploaded files: %s' => 'При загрузке файлов возникли ошибки. Загружено файлов: %s',
        'Selected files and folder deleted' => 'Все отмеченные файлы и папки удалены',
        'Error while deleting items' => 'При удалении возникли ошибки',
        'Archive <b>%s</b> created' => 'Архив <b>%s</b> успешно создан',
        'Archive not created' => 'Ошибка. Архив не создан',
        'Archive unpacked' => 'Архив распакован',
        'Archive not unpacked' => 'Архив не распакован',
        'Uploading files' => 'Загрузка файлов',
        'Destination folder:' => 'Папка назначения:',
        'Upload' => 'Загрузить',
        'Cancel' => 'Отмена',
        'Copying' => 'Копирование',
        'Files:' => 'Файлы:',
        'Source folder:' => 'Исходная папка:',
        'Move' => 'Переместить',
        'Select folder:' => 'Выбрать папку:',
        'Source path:' => 'Исходный путь:',
        'Archive' => 'Архив',
        'Full path:' => 'Полный путь:',
        'File size:' => 'Размер файла:',
        'Files in archive:' => 'Файлов в архиве:',
        'Total size:' => 'Общий размер:',
        'Size in archive:' => 'Размер в архиве:',
        'Compression:' => 'Степень сжатия:',
        'Open' => 'Открыть',
        'Unpack' => 'Распаковать',
        'Unpack to' => 'Распаковать в',
        'Unpack to folder' => 'Распаковать в папку',
        'Back' => 'Назад',
        'Error while fetching archive info' => 'Ошибка получения информации об архиве',
        'Image' => 'Изображение',
        'MIME-type:' => 'MIME-тип:',
        'Image sizes:' => 'Размеры изображения:',
        'File' => 'Файл',
        'Charset:' => 'Кодировка:',
        'Name' => 'Имя',
        'Size' => 'Размер',
        'Modified' => 'Изменен',
        'Folder' => 'Папка',
        'Delete' => 'Удалить',
        'Delete folder?' => 'Удалить папку?',
        'Delete file?' => 'Удалить файл?',
        'Rename' => 'Переименовать',
        'Copy to...' => 'Копировать в...',
        'File info' => 'Информация о файле',
        '%s byte' => '%s байт',
        '%s KB' => '%s КБ',
        '%s MB' => '%s МБ',
        '%s GB' => '%s ГБ',
        'Download' => 'Скачать',
        'Folder is empty' => 'Папка пуста',
        'Select all' => 'Выделить все',
        'Unselect all' => 'Снять выделение',
        'Invert selection' => 'Инвертировать выделение',
        'Delete selected files and folders?' => 'Удалить выбранные файлы и папки?',
        'Pack' => 'Упаковать',
        'Copy' => 'Копировать',
        'Upload files' => 'Загрузить файлы',
        'New folder' => 'Новая папка',
        'New folder name' => 'Имя новой папки',
        'New name' => 'Новое имя',
        'Operations with archives are not available' => 'Операции с архивами недоступны',
        'Full size:' => 'Общий размер:',
        'files:' => 'файлов:',
        'folders:' => 'папок:',
        'Perms' => 'Права',
        'Username' => 'Имя пользователя',
        'Password' => 'Пароль',
        'Login' => 'Войти',
        'Logout' => 'Выход',
        'Wrong password' => 'Неверный пароль',
        'You are logged in' => 'Вы успешно вошли',
        'Change Permissions' => 'Изменение прав доступа',
        'Permissions:' => 'Права доступа:',
        'Change' => 'Изменить',
        'Owner' => 'Владелец',
        'Group' => 'Группа',
        'Other' => 'Прочие',
        'Read' => 'Чтение',
        'Write' => 'Запись',
        'Execute' => 'Выполнение',
        'Permissions changed' => 'Права изменены',
        'Permissions not changed' => 'Права не изменены',
        'Video' => 'Видео',
        'Audio' => 'Аудио',
        'Direct link' => 'Прямая ссылка',
        'Create archive?' => 'Создать архив?',
    );
    $strings['fr'] = array(
        'Folder <b>%s</b> deleted' => 'Dossier <b>%s</b> supprimé',
        'Folder <b>%s</b> not deleted' => 'Dossier <b>%s</b> non supprimé',
        'File <b>%s</b> deleted' => 'Fichier <b>%s</b> supprimé',
        'File <b>%s</b> not deleted' => 'Fichier <b>%s</b> non supprimé',
        'Wrong file or folder name' => 'Nom de fichier ou dossier incorrect',
        'Folder <b>%s</b> created' => 'Dossier <b>%s</b> créé',
        'Folder <b>%s</b> already exists' => 'Dossier <b>%s</b> déjà existant',
        'Folder <b>%s</b> not created' => 'Dossier <b>%s</b> non créé',
        'Wrong folder name' => 'Nom de dossier inccorect',
        'Source path not defined' => 'Chemin source non défini',
        'Moved from <b>%s</b> to <b>%s</b>' => 'Déplacé de <b>%s</b> à <b>%s</b>',
        'File or folder with this path already exists' => 'Fichier ou dossier avec ce chemin déjà existant',
        'Error while moving from <b>%s</b> to <b>%s</b>' => 'Erreur lors du déplacement de <b>%s</b> à <b>%s</b>',
        'Copyied from <b>%s</b> to <b>%s</b>' => 'Copié de <b>%s</b> à <b>%s</b>',
        'Error while copying from <b>%s</b> to <b>%s</b>' => 'Erreur lors de la copie de <b>%s</b> à <b>%s</b>',
        'Paths must be not equal' => 'Les chemins doivent être différents',
        'Unable to create destination folder' => 'Impossible de créer le dossier de destination',
        'Selected files and folders moved' => 'Fichiers et dossiers sélectionnés déplacés',
        'Selected files and folders copied' => 'Fichiers et dossiers sélectionnés copiés',
        'Error while moving items' => 'Erreur lors du déplacement des éléments',
        'Error while copying items' => 'Erreur lors de la copie des éléments',
        'Nothing selected' => 'Sélection vide',
        'Renamed from <b>%s</b> to <b>%s</b>' => 'Renommé de <b>%s</b> à <b>%s</b>',
        'Error while renaming from <b>%s</b> to <b>%s</b>' => 'Erreur lors du renommage de <b>%s</b> en <b>%s</b>',
        'Names not set' => 'Noms indéfinis',
        'File not found' => 'Fichier non trouvé',
        'All files uploaded to <b>%s</b>' => 'Tous les fichiers ont été envoyé dans <b>%s</b>',
        'Nothing uploaded' => 'Rien a été envoyé',
        'Error while uploading files. Uploaded files: %s' => 'Erreur lors de l\'envoi des fichiers. Fichiers envoyés : %s',
        'Selected files and folder deleted' => 'Fichiers et dossier sélectionnés supprimés',
        'Error while deleting items' => 'Erreur lors de la suppression des éléments',
        'Archive <b>%s</b> created' => 'Archive <b>%s</b> créée',
        'Archive not created' => 'Archive non créée',
        'Archive unpacked' => 'Archive décompressée',
        'Archive not unpacked' => 'Archive non décompressée',
        'Uploading files' => 'Envoie des fichiers',
        'Destination folder:' => 'Dossier de destination :',
        'Upload' => 'Envoi',
        'Cancel' => 'Annuler',
        'Copying' => 'Copie en cours',
        'Files:' => 'Fichiers :',
        'Source folder:' => 'Dossier source :',
        'Move' => 'Déplacer',
        'Select folder:' => 'Dossier sélectionné :',
        'Source path:' => 'Chemin source :',
        'Archive' => 'Archive',
        'Full path:' => 'Chemin complet :',
        'File size:' => 'Taille du fichier :',
        'Files in archive:' => 'Fichiers dans l\'archive :',
        'Total size:' => 'Taille totale :',
        'Size in archive:' => 'Taille dans l\'archive :',
        'Compression:' => 'Compression :',
        'Open' => 'Ouvrir',
        'Unpack' => 'Décompresser',
        'Unpack to' => 'Décompresser vers',
        'Unpack to folder' => 'Décompresser vers le dossier',
        'Back' => 'Retour',
        'Error while fetching archive info' => 'Erreur lors de la récupération des informations de l\'archive',
        'Image' => 'Image',
        'MIME-type:' => 'MIME-Type :',
        'Image sizes:' => 'Taille de l\'image :',
        'File' => 'Fichier',
        'Charset:' => 'Charset :',
        'Name' => 'Nom',
        'Size' => 'Taille',
        'Modified' => 'Modifié',
        'Folder' => 'Dossier',
        'Delete' => 'Supprimer',
        'Delete folder?' => 'Supprimer le dossier ?',
        'Delete file?' => 'Supprimer le fichier ?',
        'Rename' => 'Renommer',
        'Copy to...' => 'Copier vers...',
        'File info' => 'Informations',
        '%s byte' => '%s octet',
        '%s KB' => '%s Кb',
        '%s MB' => '%s Мb',
        '%s GB' => '%s Gb',
        'Download' => 'Télécharger',
        'Folder is empty' => 'Dossier vide',
        'Select all' => 'Tout sélectionner',
        'Unselect all' => 'Tout désélectionner',
        'Invert selection' => 'Inverser la sélection',
        'Delete selected files and folders?' => 'Supprimer les fichiers et dossiers sélectionnés ?',
        'Pack' => 'Archiver',
        'Copy' => 'Copier',
        'Upload files' => 'Envoyer des fichiers',
        'New folder' => 'Nouveau dossier',
        'New folder name' => 'Nouveau nom de dossier',
        'New name' => 'Nouveau nom',
        'Operations with archives are not available' => 'Opérations d\archivage non disponibles',
        'Full size:' => 'Taille totale :',
        'files:' => 'fichiers :',
        'folders:' => 'dossiers :',
        'Perms' => 'Permissions',
        'Username' => 'Nom d\'utilisateur',
        'Password' => 'Mot de passe',
        'Login' => 'Identifiant',
        'Logout' => 'Déconnexion',
        'Wrong password' => 'Mauvais mot de passe',
        'You are logged in' => 'Vous êtes connecté',
        'Change Permissions' => 'Modifier les permissions',
        'Permissions:' => 'Permissions:',
        'Change' => 'Modifier',
        'Owner' => 'Propriétaire',
        'Group' => 'Groupe',
        'Other' => 'Autre',
        'Read' => 'Lire',
        'Write' => 'Écrire',
        'Execute' => 'Exécuter',
        'Permissions changed' => 'Permissions modifiées',
        'Permissions not changed' => 'Permission non modifiées',
        'Video' => 'Vidéo',
        'Audio' => 'Audio',
        'Direct link' => 'Lien direct',
        'Create archive?' => 'Créer une archive?',
    );

    // get additional translations from 'filemanager-l10n.php'
    $l10n_path = __DIR__ . '/filemanager-l10n.php';
    if (is_readable($l10n_path)) {
        $l10n_strings = include $l10n_path;
        if (!empty($l10n_strings) && is_array($l10n_strings)) {
            $strings = array_merge($strings, $l10n_strings);
        }
    }

    return $strings;
}

/**
 * Get all available languages
 * @return array
 */
function fm_get_available_langs()
{
    $strings = fm_get_strings();
    $languages = array_keys($strings);
    $languages[] = 'en';
    return $languages;
}
?>