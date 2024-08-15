
AOS.init();

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 300) {
        $("header").addClass("darkHeader");
    }
    else{
        $("header").removeClass("darkHeader");
        // $(".btns_wrap").removeClass("btns_wrap_hover");
    }
});






let num = document.querySelectorAll(".counterup");
let numArray = Array.from(num)

numArray.map((item)=>{
    let count = 0
    function counterup(){
        count++
        item.innerHTML = count

        if(count == item.dataset.number){
            clearInterval(stop)
        }
    }

    let stop = setInterval(function(){
        counterup()
    },100)
})






// active page

$(document).ready(function () {
  var url = window.location.pathname;
  var filename = url.substring(url.lastIndexOf('/') + 1);
  if (filename == "") {
    filename = "index.php"
  }
  $(`.nav-item .nav-link[href="${filename}"]`).addClass("active")
})