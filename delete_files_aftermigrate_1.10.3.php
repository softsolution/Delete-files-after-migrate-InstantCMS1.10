<?php
$files =array(
"/templates/_default_/special/images/regcomplete.png",
"/templates/_default_/modules/mod_hmenu.tpl",
"/modules/mod_clock",
"/languages/ru/modules/mod_arhive.php",
"/languages/ru/modules/mod_usersearch.php",
"/languages/ru/admin/applet_components.php",
"/languages/ru/admin/applet_plugins.php",
"/languages/ru/admin/com_actions.php",
"/includes/spyc/spyc.yaml",
"/includes/letters",
"/includes/jquery/tabs/tab.png",
"/includes/jquery/superfish",
"/includes/jquery/lightbox",
"/includes/jquery/datepicker",
"/includes/jquery/jquery.blockUI.js",
"/images/icons/download.gif",
"/images/swf",
"/core/js/pagesel.js",
"/core/auth",
"/core/messages",
"/core/splash",
"/admin/modules/mod_tags/backend.php",
"/admin/modules/mod_respect/backend.php",
"/admin/modules/mod_polls/backend.php",
"/admin/modules/mod_hmenu",
"/admin/modules/mod_swftags",
"/admin/js/config.js");

foreach ($files as $key => $file) {
    if(is_dir($_SERVER['DOCUMENT_ROOT'].''.$file)){
        RDir($_SERVER['DOCUMENT_ROOT'].''.$file);
    } else {
        @unlink($_SERVER['DOCUMENT_ROOT'].''.$file);
    }
}


function RDir( $path ) {
    // если путь существует и это папка
    if ( file_exists( $path ) AND is_dir( $path ) ) {
        // открываем папку
        $dir = opendir($path);
 
        while ( false !== ( $element = readdir( $dir ) ) ) {
            // удаляем только содержимое папки
            if ( $element != '.' AND $element != '..' )  {
                $tmp = $path . '/' . $element;
                chmod( $tmp, 0777 );
 
                // если елемент является папкой, то удаляем его используя нашу функцию RDir
                if ( is_dir( $tmp ) ) {
                    RDir( $tmp );
                // если елемент является файлом, то удаляем файл
                } elseif( file_exists( $tmp ) ) {
                        unlink( $tmp );
                    }
            }
        }
        // закрываем папку
        closedir($dir);
 
        // удаляем саму папку
        if ( file_exists( $path ) ) {
            rmdir( $path );
        }
    }
}

echo ('Готово');
?>