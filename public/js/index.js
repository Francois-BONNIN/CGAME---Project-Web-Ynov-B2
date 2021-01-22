document.getElementsByClassName('cgameLogo')[0].classList.add('logoNav');

anime({
  targets: '#lineDrawing .lines path',
  strokeDashoffset: [anime.setDashoffset, 0],
  easing: 'easeInOutSine',
  duration: 3000,
  delay: function(el, i) { return i},
  direction: 'normal'
});

setTimeout(()=>{
  document.getElementsByClassName('logo')[0].className = 'hidden';
}, 4200);

setTimeout(()=>{
  document.getElementsByClassName('logoNav')[0].classList.replace('logoNav', 'visible');
},5000);
