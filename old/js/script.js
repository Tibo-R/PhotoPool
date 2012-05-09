var choco;

function main(obj){

    $("#photos").height($(window).height() - 120);

    
    var currentnb = 0;
    $(".gallerie").click(function(){
      $("#photos").empty();
      $("#thumbs").empty();
      $("#serieTitle").html($(this).html());
      var id = $(this).attr('id');
      var scrollId = id + "_scroller";
      var photos = obj[id];
      currentnb = 0;
      var cpt = 0;
      for(var key in photos){
        cpt++;
        var photo = $(this).attr('href') + "/" + photos[key];
        $("#photos").append('<a href ="' + photo + '" />');

        var thumb = new Image();
        $(thumb).attr("src", $(this).attr('href') + "/thumb/" + photos[key]);
        $(thumb).attr("nb", key);
        $(thumb).click(function(){
          choco.load($(this).attr("nb"), false);
          $("#thumbs img").removeClass("selected");
          $(this).addClass("selected");
        });
        
        var link = $('<a href="#"></a>');
        link.append(thumb);
        $("#thumbs").append(link);
        if(cpt >= photos.length){
        	//$("#thumbs").outerWidth(photos.length * 45 + "px");
          displayThumbs(scrollId)
          //link.load(function(){displayThumbs(scrollId)});
        }
      }
      
      
      choco = $('#photos a').Chocolat({container : $('#photos'),
                               fadeInImageduration : 300,
                               fadeOutImageduration : 300,
                               closeImg : "",
                               vache: false,
                               leftImg: 'images/left.png',  
                               rightImg: 'images/right.png',
                               separator1: ""
                             });

      //$("#scroller").html('<div class="jTscrollerContainer"><div id="thumbs" class="jTscroller"></div></div>');
      

      $('#photos').find("a").hide();
      $('#photos a').first().click();
      return false;
    });

    $(window).resize(function() {
      $("#photos").height($(window).height()-80);
    });

    $(".expand").click(function(){
      var ul = $(this).children("ul");
      $(".expand ul:not(#" + ul.attr("id") + ")").css('opacity', 1)
               .slideUp()
               .animate(
                  { opacity: 0 },
                  { queue: false, duration: 'slow' }
                );

      if(ul.is(':visible')){
        ul.css('opacity', 1)
               .slideUp()
               .animate(
                  { opacity: 0 },
                  { queue: false, duration: 'slow' }
                );

      }else{
        ul.css('opacity', 0)
          .slideDown()
          .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
                  );

      }


    });

    $("#viewer").on("changePage", function(e, data){
        var oldSelectedThumb = $("#thumbs img.selected");
        oldSelectedThumb.removeClass("selected");
        $("#thumbs").find('*[nb]').each(function(index){
            if($(this).attr('nb') == data.page){
              $(this).addClass("selected");
            }
        });

      });   

}

function displayThumbs(scrollId){
  $("#thumbs img:first").addClass("selected");
  $(".jTscroller").removeAttr("style");
  $(".jTscrollerContainer").removeAttr("style");
  $(".jThumbnailScroller").removeAttr("style");
  $(".jThumbnailScroller").attr("id", scrollId);
  $("#" + scrollId).thumbnailScroller({ 
    scrollerType:"hoverPrecise", 
    scrollerOrientation:"horizontal", 
    scrollSpeed:2, 
    scrollEasing:"easeOutCirc", 
    scrollEasingAmount:600, 
    acceleration:4, 
    scrollSpeed:800, 
    noScrollCenterSpace:10, 
    autoScrolling:0, 
    autoScrollingSpeed:2000, 
    autoScrollingEasing:"easeInOutQuad", 
    autoScrollingDelay:500 
  });
}