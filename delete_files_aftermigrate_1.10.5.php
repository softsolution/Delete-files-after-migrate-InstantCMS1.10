<?php
$files =array(
"/admin/images/inputbg.jpg",
"/admin/images/stitle.jpg",
"/admin/images/toolmenubg.jpg",
"/admin/images/toplogo.gif",
"/includes/codegen/",
"/languages/ru/modules/mod_usermenu.php",
"/modules/mod_usermenu/",
"/plugins/p_fckeditor/",
"/templates/_default_/modules/mod_content_cats.tpl",
"/templates/_default_/modules/mod_usermenu.tpl",
"/templates/_default_/special/captcha.php"
);

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