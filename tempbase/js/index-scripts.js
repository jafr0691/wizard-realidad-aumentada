/**
 * Created by Personal on 13/12/2017.
 */
var bus_page = 0;
var last_page = false;
var load_finish = true;

var comments_page = 0;
var comments_last_page = false;
var comments_load_finish = true;
$(document).ready(function(){
    $(".scrollbar-bus").mCustomScrollbar({
        theme:"dark",
        callbacks:{
            whileScrolling :function(){

                if(this.mcs.topPct > 85){
                    if (!last_page){
                        if (load_finish){
                            bus_page++;
                            ajax_most_viewed_buses(bus_page);
                        }
                    }
                }

            },

        }
    });
    $(".scrollbar-comments").mCustomScrollbar({
        theme:"dark",
        callbacks:{
            whileScrolling:function(){
                if(this.mcs.topPct > 85){
                    if (!comments_last_page){
                        if (comments_load_finish){
                            comments_page++;
                            ajax_comments_index(comments_page);
                        }
                    }
                }
            }
        }
    });
    //ajax_most_viewed_buses(bus_page);
    /*comments_page++;
     ajax_comments_index(comments_page);*/
    /*
     $('#bus_section .mCustomScrollBox').bind('scroll', function(){
     if( ($(this).scrollTop() + $(this).innerHeight() ) >= ($(this)[0].scrollHeight - 5) )
     {
     if (!last_page){
     if (load_finish){
     bus_page++;
     ajax_most_viewed_buses(bus_page);
     }
     }
     }
     });*/
    /*$('#comments_section').bind('scroll', function(){
     console.log("0");
     if( ($(this).scrollTop() + $(this).innerHeight() ) >= ($(this)[0].scrollHeight - 5) )
     {
     if (!comments_last_page){
     if (comments_load_finish){
     comments_page++;
     ajax_comments_index(comments_page);
     }
     }
     }
     });*/
});


function ajax_comments_index(comment){
    var per_page = 5;
    $("#load-comments").fadeIn();
    comments_load_finish = false;
    $.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: 'json',
        async: true,
        data: {'action':'get_last_comments',page: comment,per_page: per_page},
        success: function(data){
            var cant = data.length;
            if (cant < 1) {
                $('#no-viwed').show();
                //console.log("no more");
            }
            else {
                if (cant<per_page){
                    comments_last_page = true;
                }
                for (var i = 0; i < cant; i++) {
                    createComment(data[i]);
                }
            }
            comments_load_finish = true;
        },
        error: function(msg,data){
            //console.log(data);

        },
        complete: function(data){
            $("#load-comments").fadeOut();
        }
    });
}

function createComment(data){
    $('#comments_section').append(
        '<div class="row comment">' +
        '<div class="col s12 m2 no-padding">' +
        '<div class="comment-img" style="background-image: url(' + data.image +')"> ' +
        '</div>' +
        '</div>' +
        '<div class="col s12 m10">' +
        '<div class="comment-info">' +
        '<div class="row">' +
        '<span class="left username">'+ data.author +'</span>' +
        '<span class="right date">' + data.date +
        '</span>' +
        '</div>' +
        '<div class="row"><p>'+ data.comment +'</p>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>');
}

function ajax_most_viewed_buses(page){
    var per_page = 8;
    //console.log(per_page + " " + page);
    $("#indeterminate-most").show();
    load_finish = false;
    $.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: 'json',
        async: true,
        data: {'action':'get_most_viewed_buses',page: page,per_page: per_page},
        success: function(data){
            var cant = data.length;
            if (cant < 1) {
                $('#no-viwed').show();
            }
            else {
                if (cant<per_page){
                    last_page = true;
                }
                for (var i = 0; i < cant; i++) {
                    createBus(data[i]);
                }
            }
            load_finish = true;
        },
        error: function(msg,data){
            //console.log(msg.statusText);
        },
        complete: function(data){
            $("#indeterminate-most").hide();
        }
    });
    //console.log(page+"|| per_page:"+per_page);
}

function createBus(bus){
    $('#bus_section').append(
        '<div class="col s12 m6"> ' +
        '<div class="bus-container" style="background-image: url('+ bus.img +')">' +
        '<div class="hover"> ' +
        '<a href="'+ bus.url +'">' +
        '<i class="material-icons">&#xE000;</i>' +
        '</a>' +
        '</div>' +
        '</div>' +
        '</div>'
    );
}