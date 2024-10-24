(function(){
    
    let container = $('.xm-dropdown');
    let collapsible = $('.xm-dropdown > div');
    let items = $('.xm-dropdown > div > a');
    let selectedItem = $('.xm-dropdown > a');
    let showing = false;
    let handler = function (event) {
        console.log(event);
        if (!container.is(event.target) && container.has(event.target).length === 0) {
            showing = false;
            selectedItem.removeClass('active');
            collapsible.fadeOut();
            $(document).unbind('mouseup', handler);
        }
    }
    
    selectedItem.on('click', function (event) {
        // console.log(event, this);
        showing = !showing;
        if (showing) {
            selectedItem.addClass('active');
            collapsible.fadeIn();
            $(document).on('mouseup', handler);
        }
        else {
            selectedItem.removeClass('active');
            collapsible.fadeOut();
            $(document).unbind('mouseup', handler);
        }
    });
    
    items.on('click', function (event) {
        selectedItem.children('.flag-icon').attr('class', $(this).children('.flag-icon').attr('class'));

        selectedItem.children('.label').text( $(this).attr("slug") );
        changeLanguage($(this).attr("slug"));
        showing = false;
        collapsible.fadeOut();
    });
    
})();