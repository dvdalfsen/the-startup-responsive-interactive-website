  var elem = document.querySelector('.main-carousel');
  var flkty = new Flickity( elem, {
    // options
    cellAlign: 'center',
    // contain: true,
    prevNextButtons: false,
    draggable: true,
    wrapAround: true,
    autoPlay: true,
  });
  
  // element argument can be a selector string
  //   for an individual element
  var flkty = new Flickity( '.main-carousel', {
    // options
   
  });