let logo = document.getElementsByClassName('logo');

let toHide = document.querySelector('#toHide');


anime({
  targets: '#lineDrawing .lines path',
  strokeDashoffset: [anime.setDashoffset, 0],
  easing: 'easeInOutSine',
  duration: 3000,
  delay: function(el, i) { return i},
  direction: 'normal',
});

anime({
    targets: logo,
    delay: 4500,
    easing: 'easeInOutSine',
    translateX: -660,
    translateY: -220,
    scale : 0.25
});



