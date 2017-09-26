<?php
get_header();
if (is_paged()) {
    get_template_part( 'parts/loop');
} else {
    $layout = simpleshift_pro_get_option('frontpage-layout');
    if (empty($layout)){
        $layout=array("featured"=>"featured","action"=>"action","about"=>"about","test"=>"test","team"=>"team","news"=>"news","action2"=>"action2","social"=>"social","contact"=>"contact");
    } 
    if ($layout){
        foreach ($layout as $key=>$value) {
            get_template_part( 'parts/frontpage',$key);
        }
    }
}
get_footer();
?>