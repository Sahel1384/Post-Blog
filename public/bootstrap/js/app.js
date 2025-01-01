$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  }); 

  $(document).ready(function() {
    $('#utoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#utoWidth').removeClass('S-hidden');
        } 
    });  
  }); 
  $(document).ready(function() {
    $('#toWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#toWidth').removeClass('S-idden');
        } 
    });  
  }); 
  $(document).ready(function() {
    $('#oWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#oWidth').removeClass('S-idden');
        } 
    });  
  });   

  let scrollt = document.getElementById('fiiixed')
  window.addEventListener('scroll',()=>{
    if(window.pageYOffset > 3500){
      scrollt.style.display = 'block'
    }
    else{
      scrollt.style.display = 'none'
    }
  })

  let scrolltt = document.getElementById('in')
  window.addEventListener('scroll',()=>{
    if(window.pageYOffset > 3600){
      scrolltt.style.display = 'block'
    }
    else{
      scrolltt.style.display = 'none'
    }
  })

  let scrollt1 = document.getElementById('we')
  window.addEventListener('scroll',()=>{
    if(window.pageYOffset > 3800){
      scrollt1.style.display = 'block'
    }
    else{
      scrollt1.style.display = 'none'
    }
  })

let scrollt2 = document.getElementById('inn')
window.addEventListener('scroll',()=>{
if(window.pageYOffset > 3950){
    scrollt2.style.display = 'block'
}
else{
    scrollt2.style.display = 'none'
}
})