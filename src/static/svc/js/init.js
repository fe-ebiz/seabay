$(function() {
	
    //vidFunc();
	
});


/* movie */
function vidFunc(){
    $('body').css({'overflow': 'hidden', 'height': '100%'});
    
    vidWH();
    $(window).resize(function(){
        vidWH();
    }).resize();
    
    $('.vid-wrap').find('.vid-txt').on('click', function(){
        $(this).parents('.vid-wrap').fadeOut();
        $('.header, .weather').removeClass('vid');
        $('body').css({'overflow': 'auto', 'height': '100%'});
    });
}

function vidWH(){
    var winWid = $(window).width(),
        winHt = $(window).height(),
        vid = $('.vid-wrap');
    
    vid.css({'width' : winWid+'px', 'height' : winHt+'px'}); 
    
    if( winWid <= '991' ){
        //console.log('m');
        var txtBoxM = $('.vid-txt-box');
        var txtBoxWid = txtBoxM.width();
        $('#vidM').get(0).load();
        $('.vid-area.m .vid-box').css({'height' : winHt+'px'}); 
        /*if( winWid <= '500' ){
            $('.vid-area.m .vid-box #vidM').css({'margin-left' : '-'+(winWid/2)+'px'}); 
        }*/

        $('.vid-area.m .vid-box').fadeIn(500, function(){
            $('#vidM').get(0).play();
            $(this).find('#vidM').on('ended',function(){
                $(this).parents('.vid-area.m .vid-box').fadeOut(500);
            });
        });
        
        txtBoxM.css({'left' : '50%', 'margin-left' : '-'+(txtBoxWid/2)+'px'})
    }else {
        var myPlayer;
        $("#vidM").stop();
        
        $('.weather').css({'cursor' : 'pointer'}); 
        $('.vid-wrap, .weather').hover(function(){
            vid.find('.vid-txt-box').addClass('on');
            $('.weather').addClass('active');
        }, function(){
            vid.find('.vid-txt-box').removeClass('on');
            $('.weather').removeClass('active');
        });
        
        $(window).ready(function(){
            var isIframe = function () {
                var a = !1;
                try {
                    self.location.href != top.location.href && (a = !0)
                } catch (b) {
                    a = !0
                }
                return a
            };

            var options = {
                playOnlyIfVisible: true
            };
            
            myPlayer = $(".vidPc").YTPlayer({align:"center,left"});
        });

        vid.find('.vidPc').css({'width' : winWid+'px', 'height' : '100%'}); 
        
        
        $('#pcVid').on("YTPTime", function(e){
            var currentTime = e.time;

            curTime = $("#pcVid").YTPGetTime(); 
            allTime = $("#pcVid").YTPGetTotalTime();
            timeStr = allTime.split(':'); 

            //console.log('time - ', curTime, '/ alltime - ', allTime, timeStr[1]);

            if( curTime == ('00 : '+ (Number(timeStr[1]) -1)) ){
                //console.log('true')
                $('#pcVid').css('opacity', '0');
                $('.vid-txt-box').addClass('end');
                $('.weather').addClass('end');
            }

        });
    }
}
