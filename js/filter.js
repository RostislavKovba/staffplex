"use strict";

$(function () {
    
        // Range Slider
    $(".js-filter-experience").ionRangeSlider();
    $(".js-filter-payment").ionRangeSlider();

    var filter     = $('#js-filter'),
        item       = filter.find('.filter-item'),
        itemCheck  = item.find('input[type=checkbox]'),
        itemRange  = item.find('.js-range'),
        clear      = filter.find('#js-clear'),
        submit     = filter.find('#js-submit'),
        preloader  = $('#js-preloader');


    // Filter submit
    function submitFilter(){
        var ajaxurl = filter.attr('action');
        $.ajax({
            url:ajaxurl, // обработчик
            data:filter.serialize(),
            type:filter.attr('method'),
            beforeSend:function(xhr){
                preloader.next().hide();
                preloader.parent().addClass('flex');
                preloader.addClass('show'); 
            },
            success:function(data){
                preloader.removeClass('show');
                preloader.parent().removeClass('flex');
                preloader.next().show();
                $('#js-filter-data').html(data);
            }
        });
        
        return false;
    };

    // Show clear button
    function showClear(){
        clear.addClass('show');
    };


    // Filter clear
    function clearFilter(){
        itemCheck.each(function(){
            $(this).prop( "checked", false );
        });
        
        itemRange.each(function(){
            //min = $(this).data('min', 10);
            //console.log(min);
            //console.log($(this).data('from', min));
            //$(this).data('from', min);
            //$(this).data('to')  = 10000;
            //$(this).ionRangeSlider().update({
                //from: 0,
                //to: 1000,
            //});

        });
        
        clear.removeClass('show');        
        submitFilter();
    };
    

    // Add events    
    filter.on( 'submit', submitFilter );    
    item.find('input').on( 'change', submitFilter );    
    item.find('input').on( 'change', showClear );    
    clear.on( 'click', clearFilter );
    
    

});