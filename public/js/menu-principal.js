// Trabalha com as interações realizadas com o menu: dropdonw e exibição do menu mobile

const fechaTodosDowpdownsMenu = () => {
    const dropdowns = $('[data-dropdown]');
    
    if($.isArray(dropdowns)){
        dropdowns.forEach(dropdown => {
            dropdown.removeClass('menu-principal__dropdown--active');
        })
    }
    else{
        dropdowns.removeClass('menu-principal__dropdown--active')
    }
}

const abreUmDropdownMenu = elemento => {
    elemento.attr('data-dropdown-pai', 'aberto');
    
    const dropdownAbrir = elemento.find('[data-dropdown]');
    dropdownAbrir.addClass('menu-principal__dropdown--active');
}

const fechaUmDropdownMenu = elemento => {
    elemento.attr('data-dropdown-pai', 'fechado');
    
    const dropdownFechar = elemento.find('[data-dropdown]');
    dropdownFechar.removeClass('menu-principal__dropdown--active');
}

(() => {
    const bodyElemento              = $("[data-body]");
    const menuElemento              = $("[data-div-menu-principal]");
    const dropdownsPaiElemento      = $("[data-dropdown-pai]");
    const iconeMenuElemento         = $("[data-icone-menu]");
    const iconeMenuInputElemento    = $("[data-icone-menu-input]");

    console.log(bodyElemento.html());
    $(window).click(function() {
        fechaTodosDowpdownsMenu();
    });

    dropdownsPaiElemento.click(function(){
        // abre dropdown ao clicar no elemento pai. Estando aberto,
        // fecha se clicar no elemento pai ou fora dele.
        event.stopPropagation();
        const statusElementoPai = $(this).attr('data-dropdown-pai');   
        
        if( statusElementoPai === 'fechado' ){
            abreUmDropdownMenu($(this));
        }
        else if( statusElementoPai === 'aberto' ){
            fechaUmDropdownMenu($(this));
        }
        else{
            console.error(`Opção inválida: ${statusElementoPai}`);
        }
    });

    iconeMenuElemento.click(function(){
        // exibe ou esconde o menu quando clicar no menu hambúrguer 

        const menuCheckAtivo =  iconeMenuInputElemento.prop("checked");

        if(menuCheckAtivo === true){
            menuElemento.show("slow");
            bodyElemento.addClass('barraRolagemDesativada');
        }
    
        else{
            menuElemento.hide("slow");
            bodyElemento.removeClass('barraRolagemDesativada');
        }
    });

    $( window ).resize(function() {
        // Exibe o menu quando a janela estiver maior que 800px.
        // Quando estiver menor que 800px, o menu irá ficar oculto quando houver alteração
        // na largura da tela 

        const larguraTela = $( window ).width();
        
        if(larguraTela > 800){
            menuElemento.show("slow");
            iconeMenuInputElemento.prop("checked", false);
        }
        else{
            menuElemento.hide();
            iconeMenuInputElemento.prop("checked", false);
        }
      });
})();