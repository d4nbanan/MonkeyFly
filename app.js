// new code 3










let refreshGraph;
let createBubbleTimeout;

let stateWindow = true;
let stateAnimation = false;



let animation = true;

document.querySelector("#animation_controller").onclick = (e) => {
  animation = !animation;
  e.preventDefault();
  // console.log(animation);
  $('#animation_controller').toggleClass("mactive");

  document.querySelector(".game__board").classList.toggle("play");
  document.querySelector(".game__board__sesion__line").classList.toggle("display_none_stopAnimation");

  if(stateAnimation && animation){
    createBubbles(50);
    drawGraph();
  }
}




window.onblur = () => stateWindow = false;
window.onfocus = () => stateWindow = true;


let frame = document.querySelector(".game__board").getBoundingClientRect();
const canvas = document.querySelector(".game__board__sesion__graph");
let object = document.querySelector(".game__board__sesion__monkey").getBoundingClientRect(); // object = monkey

function drawGraph(){
  clearInterval(refreshGraph);
  refreshGraph = setInterval(() => {
    const ctx = canvas.getContext('2d');
      if(animation && stateAnimation){
        object = document.querySelector(".game__board__sesion__monkey").getBoundingClientRect();
        frame = document.querySelector(".game__board").getBoundingClientRect();
        let posX = object.left - frame.left;
        let posY = object.top - frame.top;

        ctx.clearRect(0, 0, canvas.width, canvas.height)

        canvas.width = frame.width;
        canvas.height = frame.height;
        
        ctx.lineWidth = 0;
        ctx.strokeStyle = "#944EF5"; // #944EF5
        ctx.beginPath();

        ctx.moveTo(0, canvas.height);

        ctx.quadraticCurveTo(posX / 2 + posX/4, canvas.height, posX+20, posY + object.height - 20);

        ctx.fillStyle = "rgba(157, 122, 255, 0.5)"; // rgba(157, 122, 255, 0.5)

        ctx.lineTo(posX+20, posY + object.height-20);
        ctx.lineTo(posX+20, canvas.height);

        ctx.fill();

        ctx.closePath();

        ctx.stroke();

      } else {
        clearInterval(refreshGraph);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
      }

  }, 10);
}


function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}


const frame2 = document.querySelector(".game__board__sesion__bubbles");

frame2.width = frame.width;
frame2.height = frame.height;

function createBubbles(length){
    function createBubble(){
      object = document.querySelector(".game__board__sesion__monkey").getBoundingClientRect();
      frame = document.querySelector(".game__board").getBoundingClientRect();

      let posX = object.left - frame.left + 20;
      let posY = object.top - frame.top - 20;

      const startX_init = posX + getRandomInt(14)-7;
      const startY_init = posY + object.height + getRandomInt(14)-7;

      let startX = startX_init;
      let startY = startY_init;

      const bubble = document.createElement("div");
      bubble.style.position = "absolute";
      bubble.style.width = "4px";
      bubble.style.height = "4px";
      bubble.style.background = "linear-gradient(to right, #7ec930, #a6f367)";
      bubble.style.borderRadius = "50%";

      document.querySelector(".game__board").append(bubble);

      let counter = 0;
      function drawBubble(){
          const opacity = 1 - counter/length;

          bubble.style.left = startX + "px";
          bubble.style.top = startY + "px";

          bubble.style.opacity = opacity;

          startX -= 4;
          startY += 2;
          counter++;

          if(counter >= length){
              bubble.remove();
          } else {
              setTimeout(drawBubble, 25);
          }
      }
      drawBubble();

      if(stateWindow && stateAnimation && animation){
        createBubbleTimeout = setTimeout(createBubble, 75);
      } else {
        window.onfocus = () => {
          stateWindow = true;
          if(stateAnimation && animation){
            createBubbleTimeout = setTimeout(createBubble, 75);
          }
        }
      }
  }

  if(stateWindow && stateAnimation && animation){
    createBubble();
  }
}

// end new code 3

var on_sound=0;
$('body').click(function(){ 
  if(on_sound==0){
    document.getElementById('game_time').play(); 
    document.getElementById('audio_win').play();
    document.getElementById('audio_lose').play();
    on_sound=1;
  }
});
$(document).ready(function(){
  var online_game=1;


  $('.onsounds').click(function(){
    if($('.onsounds').attr('soundonoff')=="1"){
      $('.onsounds').attr('soundonoff','1');
      $('.onsounds').attr('style','background: #f1dff8;');
      document.getElementById('game_time').pause();document.getElementById('game_time').currentTime=0;
      document.getElementById('audio_win').pause();document.getElementById('game_time').currentTime=0;
      document.getElementById('audio_lose').pause();document.getElementById('game_time').currentTime=0;
    }else{
      $('.onsounds').attr('style','background: #281835;');
      $('.onsounds').attr('soundonoff','1');      
    }
  });
  
  function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
      if ((new Date().getTime() - start) > milliseconds){
        break;
      }
    }
  }


  function get_now_time() {
    // For todays date;
      Date.prototype.today = function () { 
          return ((this.getDate() < 10)?"0":"") + this.getDate() +"."+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1);
      }

      // For the time now
      Date.prototype.timeNow = function () {
           return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
      }
   var datetime = "" + new Date().today() + " " + new Date().timeNow();
      return "<d>"+datetime+"</d>";
  }


  var animations=0;

  $('.btn_bet').click(function(){
    if($(this).hasClass("btn_bet_minus")){
      //console.log("btn_bet_minus");
    }else if($(this).hasClass("btn_bet_plus")){
      //console.log("btn_bet_plus");
    }else{
      $('[name="my_bet"]').val($(this).html());
    }
  });
  $('.btn_bet_minus').click(function(){
    if(parseInt($('[name="my_bet"]').val())-50>-0){
      $('[name="my_bet"]').val(parseInt($('[name="my_bet"]').val())-50);
    }
  });
  $('.btn_bet_plus').click(function(){
      $('[name="my_bet"]').val(parseInt($('[name="my_bet"]').val())+50);
  });


  $('.cashout').click(function(){
    $('.cashout').removeClass("vis");
    var my_balance=parseFloat($('.my_balance').html());
    var bet=$('[name="my_bet"]').val();
    var coef_win=parseFloat($('.progress').html());
    var game_win=(bet*coef_win).toFixed(2);
    $('.process_game').html('x<x class="progress">'+coef_win+'</x>');
    $('.game_play').fadeIn(1);
    $('.cashout').fadeOut(1);
    my_balance=my_balance+parseFloat(game_win);
    parseFloat($('.my_balance').html(my_balance));
    
      document.getElementById('audio_win').currentTime=0;
      document.getElementById('audio_win').play();
    
    $.post( "/cashout.php",  { amount: game_win, bet: bet, coefz:coef_win})
        .done(function(data) { 
    });
    $('.win_notice1').find('.coef_wn').html("x"+coef_win);
    $('.win_notice1').find('.amount_wn').html(game_win+"$");
    $('.win_notice1').fadeIn(0);
    $('.win_notice1').attr("style","display:flex");
    setTimeout(() => {$('.win_notice1').fadeOut(1000);}, 3000);
  });

  $('.cashout2').click(function(){

    $('.cashout2').removeClass("vis");
    var my_balance=parseFloat($('.my_balance').html());
    var bet=$('[name="my_bet2"]').val();
    
    var coef_win=parseFloat($('.progress').html());
    var game_win=(bet*coef_win).toFixed(2);
    $('.process_game').html('x<x class="progress">'+coef_win+'</x>');
    $('.game_play2').fadeIn(1);
    $('.cashout2').fadeOut(1);
    my_balance=my_balance+parseFloat(game_win);
    parseFloat($('.my_balance').html(my_balance));
    
      document.getElementById('audio_win').currentTime=0;
      document.getElementById('audio_win').play();
    
    $.post( "/cashout.php",  { amount: game_win, bet: bet, coefz:coef_win})
        .done(function(data) { 
    });
    $('.win_notice2').find('.coef_wn').html("x"+coef_win);
    $('.win_notice2').find('.amount_wn').html(game_win+"$");
    $('.win_notice2').fadeIn(0);
    $('.win_notice2').attr("style","display:flex");
    setTimeout(() => {$('.win_notice2').fadeOut(1000);}, 3000);
  });


  $('.game_play').click(function(){
    $('.cashout').addClass("vis");
    $('.game_play').attr("disabled","disabled");
    $('.click_bet1').attr("disabled","disabled");
    $('.bet_minus1').attr("disabled","disabled");
    $('.bet_plus1').attr("disabled","disabled");
    $('.game_play').html("Ожидание");
    // new code 3
    $('.game_play').addClass("waiting_game_play");
    // end new code 3
    var bet=$('[name="my_bet"]').val();
    var my_balance=parseFloat($('.my_balance').html());
    my_balance=my_balance-parseFloat(bet);
    $('.my_balance').html(my_balance);
    $.post( "/bid.php",  { amount: bet}).done(function(data) {});
  });


  $('.game_play2').click(function(){
    $('.cashout2').addClass("vis");
    $('.game_play2').attr("disabled","disabled");
    $('.click_bet2').attr("disabled","disabled");
    $('.bet_minus2').attr("disabled","disabled");
    $('.bet_plus2').attr("disabled","disabled");
    $('.game_play2').html("Ожидание");
    // new code 3
    $('.game_play2').addClass("waiting_game_play");
    // end new code 3
    var bet=$('[name="my_bet2"]').val();
    var my_balance=parseFloat($('.my_balance').html());
    my_balance=my_balance-parseFloat(bet);
    $('.my_balance').html(my_balance);
    $.post( "/bid.php",  { amount: bet}).done(function(data) {});
  });


  function play_animation(invis="0",coef){
    $('.game_play').removeClass("waiting_game_play");
    $('.game_play2').removeClass("waiting_game_play");
      var upd_bid_us=setInterval(function () {
      $('.progress').html(parseFloat($('.progress').html()).toFixed(2));
      display_coef=parseFloat($('.progress').html());
      function getRandomInt(max) {
        return Math.floor(Math.random() * max);
      }
            
        var now_id = getRandomInt($('.bets-list__item').length);

        $('.bets-list__item').each(function(index){
          if($(this).hasClass('nm_'+now_id)){
            if($(this).find('.bet__user__name').text()!=$('.name_user').text()){
              if($(this).find('.coef').html()=="x"){
                $(this).find('.coef').html("x"+display_coef);
                $(this).find('.bet__all-win').html((parseFloat($(this).find('.bet__win').text())*display_coef).toFixed(2)+"$");

                if((display_coef>2)&&(display_coef<10)){
                  $(this).find('.coef').addClass('coef_purple');
                }else if(display_coef>=10){
                  $(this).find('.coef').addClass('coef_toxic');
                }else{
                  $(this).find('.coef').addClass('coef_blue');
                }


                // new code 3

                $(this).addClass('win_bet');

                // end new code 3

              }
            }
          }
        });

  }, 300);
     var bet=$('[name="my_bet"]').val();
     var bet2=$('[name="my_bet2"]').val();
    $('.game_play').html("Ставка");
    $('.game_play2').html("Ставка");
	// new code 3
	
	//end new code 3
    $('.game__board__preloader').fadeOut(0)
    $('.game__board__sesion').fadeIn(0)

    // new code 3


    if(animation){
      $(".game__board").removeClass("before_start");

      stateAnimation = true;
      drawGraph();
      createBubbles(50);

      $(".game__board").removeClass("win");
      $(".game__board").removeClass("lose");
    }

    
    // end new code 3


    // $(".game__board").removeClass("win");
    // $(".game__board").removeClass("lose");
    // $('.play').html("BET");
    if(invis=="0"){
      $('.game_play').fadeIn(0);
      $('.game_play2').fadeIn(0);
      $('.cashout').fadeOut(0);
      $('.cashout2').fadeOut(0);
      $('.stack_button_content').attr("style","opacity:0.5;");
    }else{      
      if($('.cashout').hasClass("vis")){
          $('.game_play').fadeOut(0);
          $('.cashout').fadeIn(0);
      }   
      if($('.cashout2').hasClass("vis")){
          $('.game_play2').fadeOut(0);
          $('.cashout2').fadeIn(0);
      }    
      
      $('.stack_button_content').attr("style","opacity:1;");
    }


    var display_coef=0;
    
    document.getElementById('game_time').play();
    
    
    $('.progress').html("1.00");

    var timing = 75;
    let time_animation;

function loop() {
      
      display_coef=parseFloat($('.progress').html());
        let isCheck1 = $('[name="autocash1"]')[0].checked
          if(isCheck1){
              if(parseFloat($('[name="autocashval1"]').val().split("x")[1])==display_coef){
                $('.cashout').click();
              }
          }         
        let isCheck2 = $('[name="autocash2"]')[0].checked
          if(isCheck2){
              if(parseFloat($('[name="autocashval2"]').val().split("x")[1])==display_coef){
                $('.cashout2').click();
              }
          }    
          if($('.cashout').hasClass("vis")){
            $('.cashout').html("Забрать<br>"+(display_coef*bet).toFixed(2)+"$");     
          }    
          if($('.cashout2').hasClass("vis")){
            $('.cashout2').html("Забрать<br>"+(display_coef*bet2).toFixed(2)+"$");     
          }
           

            if(display_coef+0.01>coef){
              if((coef>2)&&(coef<10)){
                $('.game__history__list').prepend("<li><div class='coef coef_purple'>x"+coef+"</div></li>");
                $('.game__history__all__list').prepend("<li><div class='coef coef_purple'>x"+coef+"</div></li>");
              }else if(coef>=10){
                $('.game__history__list').prepend("<li><div class='coef coef_toxic'><ul class='bublus'><li></li><li></li><li></li><li></li><li></li><li></li></ul>x"+coef+"</div></li>");
                $('.game__history__all__list').prepend("<li><div class='coef coef_toxic'><ul class='bublus'><li></li><li></li><li></li><li></li><li></li><li></li></ul>x"+coef+"</div></li>");
              }else{
                $('.game__history__list').prepend("<li><div class='coef coef_blue'>x"+coef+"</div></li>");
                $('.game__history__all__list').prepend("<li><div class='coef coef_blue'>x"+coef+"</div></li>");
              }
        
              // $(".game__board").addClass("win");

              // new code 3

              if(animation){
                $(".game__board").addClass("win");

                setTimeout(() => {
                  $(".game__board").addClass("before_start");
                }, 2000);

                clearInterval(refreshGraph);
                clearTimeout(createBubbleTimeout);
                stateAnimation = false;
              }


              // end new code 3
              
                document.getElementById('game_time').pause();document.getElementById('game_time').currentTime=0;
                document.getElementById('audio_lose').play();
              $('.process_game').append("<p style='margin-top:-8%' class='away'>Улетел</p>");
              setTimeout(() => $('.game__board__preloader').fadeIn(100), 2200);
              setTimeout(() => $('.game__board__sesion').fadeOut(0), 2200);
              setTimeout(() => $('.away').remove(),2200);

               $.post( "/lose.php", function(data) { });
                
                    $('.stack_button_content').attr("style","opacity:1;");          
                    $('.game_play').fadeIn(0);
                    $('.game_play2').fadeIn(0);
                    $('.cashout').fadeOut(0); 
                    $('.cashout2').fadeOut(0); 

                    
                    clearInterval(upd_bid_us);
              return 0;
            }


            $('.progress').html((display_coef+0.01).toFixed(2));

            if(display_coef<2){
              timing = 75;
            }else if((display_coef>=2)&&(display_coef<10)){
              timing = 100/display_coef;
            }else if(display_coef>=10){
              timing = 10/(display_coef*display_coef*display_coef);              
            }


            
            
            var new_timing=100;
            //$('.game__panel__btn ').html($('.wait_sec').html());
            //console.log(new_timing);


    time_animation = window.setTimeout(loop, timing);
}
loop();


          
          $('.game_play').removeAttr("disabled");
          $('.click_bet1').removeAttr("disabled");
          $('.bet_minus1').removeAttr("disabled");
          $('.bet_plus1').removeAttr("disabled");
          $('.game_play2').removeAttr("disabled");
          $('.click_bet2').removeAttr("disabled");
          $('.bet_minus2').removeAttr("disabled");
          $('.bet_plus2').removeAttr("disabled");


  }

  $('.click_bet1').click(function(){
    $('[name="my_bet"]').val(parseFloat($(this).html())+parseFloat($('[name="my_bet"]').val()));
    if(parseFloat($('[name="my_bet"]').val())>120){$('[name="my_bet"]').val("120");}
  });

  $('.click_bet2').click(function(){
    $('[name="my_bet2"]').val(parseFloat($(this).html())+parseFloat($('[name="my_bet2"]').val()));
    if(parseFloat($('[name="my_bet2"]').val())>120){$('[name="my_bet2"]').val("120");}
  });

  $('.bet_plus1').click(function(){
    $('[name="my_bet"]').val(parseFloat($('[name="my_bet"]').val())+1);
    if(parseFloat($('[name="my_bet"]').val())>120){$('[name="my_bet"]').val("120");}
  });
  $('.bet_minus1').click(function(){
    $('[name="my_bet"]').val(parseFloat($('[name="my_bet"]').val())-1);
    if(parseFloat($('[name="my_bet"]').val())>120){$('[name="my_bet"]').val("120");}
  });

  $('.bet_plus2').click(function(){
    $('[name="my_bet2"]').val(parseFloat($('[name="my_bet2"]').val())+1);
    if(parseFloat($('[name="my_bet2"]').val())>120){$('[name="my_bet2"]').val("120");}    
  });
  $('.bet_minus2').click(function(){
    $('[name="my_bet2"]').val(parseFloat($('[name="my_bet2"]').val())-1);
    if(parseFloat($('[name="my_bet2"]').val())>120){$('[name="my_bet2"]').val("120");}
  });



if(online_game){
  setInterval(function () {
    $.post( "/upd.php", function( data ) {

       let isChecked1 = $('[name="autobet1"]')[0].checked
          if(isChecked1){
            if($('.game_play').attr("disabled")!="disabled"){
              $('.game_play').click();
            }
          }           
       let isChecked2 = $('[name="autobet2"]')[0].checked
          if(isChecked2){
            if($('.game_play2').attr("disabled")!="disabled"){
              $('.game_play2').click();
            } 
          } 


      const game = data.split("_");
      const status=game[0];
      const game_id=47080+game[1];
      const time_next=game[2];
      const coef=game[3];
      const now_user_play=game[4];
      const time_next_max=game[5];

      display_coef=parseFloat($('.progress').html());
      // time_to_end=10;


            // if(display_coef<2){
            //   timing = 75;
            // }else if((display_coef>=2)&&(display_coef<10)){
            //   timing = 100/display_coef;
            // }else if(display_coef>=10){
            //   timing = 10/(display_coef*display_coef*display_coef);              
            // }
            //   time_to_end=(coef-display_coef)/(timing/1000);
            // if(display_coef!=coef){
            //   console.log("("+coef+"-"+display_coef+")/"+(timing/1000)+"="+time_to_end);
            // }else{
            //   //$.post( "/update_time_left.php",  { time_to_end: time_to_end}).done(function(data) {});
            //   console.log("no_upd");
            // }
            // //if((display_coef!=coef)&&(display_coef!=0)){
            //  // console.log("io");
            //   //$.post( "/update_time_left.php",  { time_to_end: time_to_end}).done(function(data) {});
            // //}


      if(time_next>8){
        $('.game__board__preloader__progressbar').fadeOut(0);
        $('.game__board__preloader').find('h5').html('Подключение к серверу');
      }else{
        $('.game__board__preloader').find('h5').html('Ожидание <span class="wait_sec" style="display:none;">'+time_next+'</span> следующего раунда');
        $('.game__board__preloader__progressbar').fadeIn(0);        
      }
      $('.wait_sec').html(time_next);
      $('.wait_sec_max').html(time_next_max);
      //console.log(coef+"|||"+time_next);
      if(status=="play"){
           $.post( "/get_users_bids.php", function( data ) {
            $('.user_bid_content').html(data);

            // new code 3s

            document.querySelectorAll(".user_bid_content .bet__user__avatar").forEach((avatar, i) => {
              avatar.classList.add("color" + (i%4+1))
            })

            // end new code 3

            $('.bets-lent').html($('.user_bid_content').find("li").length);
           });
         play_animation(now_user_play,coef);
      }
    });

  
     $.post( "/update_my_bids.php", function( data ) {
      const dataElement = document.createElement("div");
      dataElement.innerHTML = data;

      dataElement.querySelectorAll(".bets-list__item").forEach((bet) => {
        if(bet.querySelector(".coef").innerText != "lose"){
          bet.classList.add("win_bet");
          bet.querySelector(".coef").classList.add("coef_purple");
        }
      });

      // console.log(dataElement);
      $('.my_bid_content').html(dataElement.innerHTML);
     });

  
     $.post( "/update_top_bids.php", function( data ) {

      // new code 3

      const dataElement = document.createElement("div");
      dataElement.innerHTML = data;
      
      dataElement.querySelectorAll(".bet__user__avatar").forEach((avatar, i) => {
        avatar.classList.add("color" + (i%4+1));


        const right_frame_cont = document.createElement("div");
        right_frame_cont.classList.add("rightFrame_bet_container");

        const right_frame_buttons = document.createElement("div");
        right_frame_buttons.classList.add("right_frame_buttons");

        const button1 = document.createElement("a"); button1.classList.add("rightFrame_button", "rightFrame_button1");
        const button2 = document.createElement("a"); button2.classList.add("rightFrame_button", "rightFrame_button2", "popuper");
        button2.href = "#integrity-check";


        let svg1 = document.createElement("svg");
        svg1.width = "12"; svg1.height = "12";
        svg1.viewBox = "0 0 12 12";
        svg1.xmlns = "http://www.w3.org/2000/svg";
        svg1.innerHTML = `<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 6.00001C11.9999 9.31392 9.31386 12 5.99995 12C2.68603 12 0 9.31392 0 6.00001C0 2.68609 2.68603 6.10352e-05 5.99995 6.10352e-05C9.31386 6.10352e-05 11.9999 2.68609 11.9999 6.00001ZM6.64768 4.52262L6.6482 6.35169L6.64921 9.92262L5.35193 9.92299L5.35092 6.35206L5.3504 4.52299L6.64768 4.52262ZM5.99999 3.36492C6.35555 3.36492 6.64379 3.07668 6.64379 2.72112C6.64379 2.36556 6.35555 2.07732 5.99999 2.07732C5.64442 2.07732 5.35618 2.36556 5.35618 2.72112C5.35618 3.07668 5.64442 3.36492 5.99999 3.36492Z"></path>`;

        let svg2 = document.createElement("svg");
        svg2.width = "12"; svg2.height = "12";
        svg2.viewBox = "0 0 12 12";
        svg2.xmlns = "http://www.w3.org/2000/svg";
        svg2.innerHTML = `<path fill-rule="evenodd" clip-rule="evenodd" d="M6 0L0 2.21538C0 2.21538 -3.39746e-05 2.21538 0.857143 7.38462C1.28572 9.96915 3.64273 11.9999 5.99979 12C8.357 12.0001 10.7143 9.96931 11.1429 7.38462L12 2.21538L6 0ZM5.62047 7.82977L8.94214 4.92331L8.20132 4.07666L5.523 6.42019L4.16607 5.52971L3.54883 6.47026L5.62047 7.82977Z"></path>`;

        let description1 = document.createElement("div");
        description1.classList.add("rightFrame_button_description");

        const descr_item1 = document.createElement("div");
        descr_item1.classList.add("descr_item");
        const descr_item1_key = document.createElement("span");
        const descr_item1_value = document.createElement("span");
        descr_item1_key.innerText = "Дата";
        descr_item1_value.innerText = "22 июня";
        descr_item1.append(descr_item1_key, descr_item1_value);

        const descr_item2 = document.createElement("div");
        descr_item2.classList.add("descr_item");
        const descr_item2_key = document.createElement("span");
        const descr_item2_value = document.createElement("span");
        descr_item2_key.innerText = "Раунд";
        descr_item2_value.innerText = "1153.53x";
        descr_item2.append(descr_item2_key, descr_item2_value);

        const descr_item3 = document.createElement("div");
        descr_item3.classList.add("descr_item");
        const descr_item3_key = document.createElement("span");
        const descr_item3_value = document.createElement("span");
        descr_item3_key.innerText = "Ставка";
        descr_item3_value.innerText = "120.64$";
        descr_item3.append(descr_item3_key, descr_item3_value);
        
        description1.append(descr_item1, descr_item2, descr_item3);
        button1.append(description1);

        let description2 = document.createElement("div");
        description2.classList.add("rightFrame_button_description");

        const descr_item4 = document.createElement("div");
        descr_item4.classList.add("descr_item");
        const descr_item4_key = document.createElement("span");
        descr_item4_key.innerText = "Проверка на честность";
        descr_item4.append(descr_item4_key);

        description2.append(descr_item4);
        button2.append(description2);

        button1.append(svg1);
        button2.append(svg2);

        right_frame_buttons.append(button1, button2);

        const right_frame = document.createElement("div");
        right_frame.classList.add("rightFrame_bet");

        const bet = avatar.parentElement.parentElement;
        
        const bet_win = document.createElement("div");
        const bet__coefficient = document.createElement("div");
        const bet__all_win = document.createElement("div");

        bet_win.innerText = "Ставка: ";
        bet__coefficient.innerText = "Коэфф: ";
        bet__all_win.innerText = "Выигрыш: ";

        bet.querySelector(".bet__win").prepend(bet_win);
        bet.querySelector(".bet__coefficient").prepend(bet__coefficient);
        bet.querySelector(".bet__all-win").prepend(bet__all_win);

        right_frame.append(bet.querySelector(".bet__win"), bet.querySelector(".bet__all-win"), bet.querySelector(".bet__coefficient"));
        const user = bet.querySelector(".bet__user");
        right_frame_cont.append(right_frame, right_frame_buttons);
        bet.innerHTML = "";
        bet.append(user, right_frame_cont);

        console.log(bet)
      })

      // end new code 3

      $('.top_bid_content').html(dataElement.innerHTML);

      document.querySelectorAll(".rightFrame_button").forEach(item => {
        item.onmouseenter = () => {
          item.querySelector(".rightFrame_button_description").classList.add("hoverActive");
        }

        item.onmouseleave = () => {
          item.querySelector(".rightFrame_button_description").classList.remove("hoverActive");
        }
      });
      
      dataElement.remove();
     });

  }, 1000);
}

});




function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}








