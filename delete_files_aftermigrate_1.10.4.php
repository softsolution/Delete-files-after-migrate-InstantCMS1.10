<?php
$files =array(
"/admin/images/auth/btn.png",
"/admin/images/auth/btn_hover.png",
"/admin/images/auth/form.jpg",
"/admin/images/auth/passw.png",
"/admin/images/auth/top.jpg",
"/admin/images/topbg.jpg",
"/plugins/p_fckeditor/fckeditor/editor/dialog/fck_spellerpages/spellerpages/server-scripts",
"/plugins/p_fckeditor/fckeditor/editor/dialog/fck_spellerpages/spellerpages/server-scripts/spellchecker.cfm",
"/plugins/p_fckeditor/fckeditor/editor/dialog/fck_spellerpages/spellerpages/server-scripts/spellchecker.php",
"/plugins/p_fckeditor/fckeditor/editor/dialog/fck_spellerpages/spellerpages/server-scripts/spellchecker.pl",
"/templates/_default_/images/core/b.png",
"/templates/_default_/images/core/bl.png",
"/templates/_default_/images/core/boxicon.gif",
"/templates/_default_/images/core/br.png",
"/templates/_default_/images/core/tl.png",
"/templates/_default_/images/core/tr.png",
"/templates/_default_/images/core/transpx.png");

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