<?php
    include( $_SERVER['DOCUMENT_ROOT'] ."/cadastro/conne.php" );
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cadastro/raelgc/view/Template.php");
    use raelgc\view\Template;

    $CFG = getConfig();
    if( !isset($CFG["cache"] ) ){
        $CFG["cache"] = 0;
    }    

    // Seleciona Template
    $tpl = new Template($_SERVER['DOCUMENT_ROOT'] . "/views/site/layout_base.html");
    //Seleciona Conteúdo
    $tpl->addFile('SECAO_01', $_SERVER['DOCUMENT_ROOT'] . "/views/site/home.html");
    $tpl->TXT_HOME    = $CFG["txt_home"]; 
    $tpl->IMG_HOME    = $CFG["img_home"];  

    $tpl->addFile('SECAO_02', $_SERVER['DOCUMENT_ROOT'] . "/views/site/servicos.html");
    for( $i = 0; $i < count($CFG["produtos"]); $i++){
        $CFG["produtos"][$i]["imagem"] = "cadastro/produtos/fotos/".$CFG["produtos"][$i]["imagem"];
    }    
    $tpl->TBL_PROD    = json_encode($CFG["produtos"]); 
    //$tpl->ITM_PAGE    = $user["name"];    

    $tpl->addFile('SECAO_03', $_SERVER['DOCUMENT_ROOT'] . "/views/site/parallax_contato.html");
    $tpl->IMG_PARRALAX_CONTATO    = $CFG["img_parallax_1"];
    //$tpl->IMG_INST    = $user["name"];    

    $tpl->addFile('SECAO_04', $_SERVER['DOCUMENT_ROOT'] . "/views/site/institucional.html");
    $tpl->TXT_INST    = $CFG["descricao_inst"];
    $tpl->IMG_INST    = "/img/inst.jpg?v=". $CFG["cache"];      

    $tpl->addFile('SECAO_05', $_SERVER['DOCUMENT_ROOT'] . "/views/site/parallax_redes_sociais.html");
    $tpl->IMG_PARRALAX_SOCIAL    = $CFG["img_parallax_2"];
    $tpl->WHATSAPP    = preg_replace('/[^0-9]/', '', $CFG["celular"] );
    $tpl->FACEBOOK    = $CFG["facebook"];
    $tpl->INSTAGRAM   = $CFG["instagram"];

    //Footer
    $tpl->addFile('SECAO_06', $_SERVER['DOCUMENT_ROOT'] . "/views/site/footer.html");
    $tpl->TELEFONE    = $CFG["telefone"];
    $tpl->CELULAR     = $CFG["celular"];
    $tpl->EMAIL       = $CFG["email"];
    $tpl->SRC_MAPS    = $CFG["maps"];
    $tpl->CFG_LOCAL       = $CFG["local"];
    $tpl->CFG_COORDENADAS = $CFG["coordenadas"];

    //Cores
    $tpl->CFG_COR_BARRA          = $CFG["color_barra"];
    $tpl->CFG_COR_TXT_BARRA      = $CFG["color_txt_barra"];
    $tpl->CFG_COR_TITULOS        = $CFG["color_titulos"];
    $tpl->CFG_COR_FOOTER         = $CFG["color_footer"];
    // $tpl->CFG_COR_TITULO_FOOTER  = $CFG["color_titulo_footer"];
    $tpl->CFG_COR_TXT_FOOTER     = $CFG["color_txt_footer"];    

    // Exibe
    $tpl->show();

?>