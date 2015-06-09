<?php
$files =array(
"/components/search/install.php",
"/components/actions/install.php",
"/modules/mod_bestblogs",
"/modules/mod_bestclubs",
"/modules/mod_bestphoto",
"/modules/mod_latestblogs",
"/modules/mod_latestclubs",
"/modules/mod_latestphoto",
"/admin/editor",
"/backups",
"/core/lib_clubs.php",
"/core/lib_content.php",
"/core/lib_photos.php",
"/core/messages/siteoff.php",
"/core/auth/autherror.html",
"/core/auth/install.html",
"/core/auth/installation.html",
"/plugins/p_fckeditor/fckeditor/editor/filemanager/browser",
"/components/comments/images",
"/components/forum/js/attach.js",
"/components/forum/images",
"/components/forum/includes",
"/components/actions/install.php",
"/components/users/ajax/wall.php",
"/components/users/js/view.js",
"/components/users/js/newmessage.js",
"/components/users/images",
"/components/users/includes",
"/components/blogs/images",
"/components/blogs/includes",
"/components/clubs/ajax/deletealbum.php",
"/components/clubs/images",
"/components/photos/ajax/pubphoto.php",
"/components/photos/images",
"/components/ratings",
"/admin/includes/mainmenu.php",
"/admin/includes/editor.php",
"/admin/applets/frules.php",
"/templates/_default_/components/com_blog_authors.tpl",
"/templates/_default_/components/com_photos_added.tpl",
"/templates/_default_/components/com_users_awards.tpl",
"/templates/_default_/components/com_users_comments.tpl",
"/templates/_default_/components/com_blog_catslist.tpl",
"/templates/_default_/components/com_users_forumposts.tpl",
"/templates/_default_/components/com_blog_moderate.tpl",
"/templates/_default_/components/com_users_newfriends.tpl",
"/templates/_default_/components/com_photos_best.tpl",
"/templates/_default_/components/com_photos_latest.tpl",
"/templates/_default_/components/com_photos_order.tpl",
"/templates/_default_/components/com_forum_view_act.tpl",
"/languages/ru/modules/mod_tags.php",
"/languages/ru/modules/mod_search.php",
"/languages/ru/modules/mod_latestphoto.php",
"/languages/ru/modules/mod_bestphoto.php",
"/languages/ru/modules/mod_category.php",
"/languages/ru/modules/mod_latestblogs.php",
"/languages/ru/modules/mod_bestblogs.php",
"/languages/ru/modules/mod_polls.php",
"/languages/ru/modules/mod_pricecat.php",
"/languages/ru/modules/mod_latestclubs.php",
"/languages/ru/modules/mod_bestclubs.php");

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