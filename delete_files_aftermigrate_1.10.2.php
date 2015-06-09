<?php
$files =array(
"/admin/components/price", 
"/admin/components/statistics", 
"/admin/components/price/backend.php", 
"/admin/components/statistics/backend.php", 
"/admin/images/components/price.png", 
"/admin/images/components/statistics.png", 
"/admin/images/toolmenu/calendar.gif", 
"/admin/images/toolmenu/clock.gif", 
"/admin/images/toolmenu/refers.gif", 
"/admin/modules/mod_pricecat", 
"/admin/modules/mod_uc_latest",
"/admin/modules/mod_uc_popular", 
"/admin/modules/mod_pricecat/backend.xml", 
"/admin/modules/mod_uc_latest/backend.xml", 
"/admin/modules/mod_uc_popular/backend.xml", 
"/components/price", 
"/components/price/cart.php", 
"/components/price/common.js", 
"/components/price/frontend.php", 
"/components/price/psearch.php", 
"/components/price/router.php", 
"/components/users/plugins", 
"/components/users/plugins/get_demo.php", 
"/images/markers/priceitem.png", 
"/images/markers/pricelist.png", 
"/includes/dbexport.inc.php", 
"/includes/phpmailer/phpmailer.php", 
"/includes/phpmailer/language/phpmailer.lang-en.php", 
"/languages/ru/components/price.php", 
"/languages/ru/modules/mod_uc_latest.php", 
"/languages/ru/modules/mod_uc_popular.php", 
"/modules/mod_pricecat", 
"/modules/mod_uc_latest", 
"/modules/mod_uc_popular", 
"/modules/mod_pricecat/module.php", 
"/modules/mod_uc_latest/module.php", 
"/modules/mod_uc_popular/module.php", 
"/templates/_default_/modules/mod_latest_uc.tpl", 
"/templates/_default_/modules/mod_pricecat.tpl", 
"/templates/_default_/modules/mod_uc_popular.tpl");

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