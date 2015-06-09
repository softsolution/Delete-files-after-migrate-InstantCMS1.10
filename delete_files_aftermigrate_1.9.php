<?php
$files =array(
"/admin/applets/backup.php",
"/admin/applets/repair.php",
"/admin/js/clubs.js",
"/admin/dbstructure.php",
"/components/arhive/install.php",
"/components/forum/images/closed.gif",
"/components/forum/images/new.gif",
"/components/forum/images/old.gif",
"/components/forum/images/pinned.gif",
"/components/frontend.template.php",
"/core/ajax/dumper.php",
"/images/board/icons/folder_grey.png",
"/includes/codegen/logo.png",
"/includes/jquery/lightbox/css/jquery.lightbox.packed.css",
"/includes/lightbox/js/jquery.lightbox.js",
"/includes/multifile/jquery.multifile.js",
"/templates/_default_/components/com_blog_create_error.tpl",
"/templates/_default_/components/com_blog_create_ok.tpl",
"/templates/_default_/components/com_blog_save_error.tpl",
"/templates/_default_/components/com_users_boards.tpl"
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