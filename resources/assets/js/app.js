(function($){
    'use strict';
    
    /**
     * Fermeture du message des action du PostController
     */
    $('.action_response > span').on('click', function(){
        $(this).parent().hide();
    });
    
    /**
     * Lancemnet de la popin de confirmation de suppression d'un article
     */
    $('.delete_post_request').on('click', function(){
        var delete_form = $(this).next('.delete_post_confirmation');
        modal(delete_form);
    });
    
    /**
     * Fermeture de la popin de confirmation de suppression d'un article
     */
    $('.canncel_delete').on('click', function(){
        $(this).trigger('closeModal');
    });
    
    function modal(el){
        $(el).easyModal({
            top: 200,
            autoOpen: true,
            overlayOpacity: 0.3,
            overlayColor: "#333",
            overlayClose: true,
            closeOnEscape: true
        });
    }
    
})(jQuery);

const tl = new TimelineMax({ paused: true, completed: true});

// tl.to(".sidebar-wrapper", 1.7, { left: "0%", ease: Expo.easeOut }, 0);
tl.staggerFrom(".sidebar-wrapper ul li", 1.2, { left: "-100%", opacity: 0, ease: Expo.easeOut }, 0.2, 0.8);
tl.staggerFrom(".panel.panel-default", 1.2, { y: "100%", opacity: 0, ease: Expo.easeOut }, 0.2, 0.8);
tl.restart(); 