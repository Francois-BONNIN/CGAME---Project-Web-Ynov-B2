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
  document.getElementsByClassName('parent')[0].classList.add('hidden');
}, 4200);

setTimeout(()=>{
  document.getElementsByClassName('parent')[0].className = 'delete';
}, 5000);

setTimeout(()=>{
  document.getElementsByClassName('logoNav')[0].classList.replace('logoNav', 'visible');
},5000);

setTimeout(()=>{
  document.getElementsByClassName('album')[0].classList.replace('hidden', 'visible');
},5000);

document.getElementsByClassName('py-4')[0].className = 'delete';