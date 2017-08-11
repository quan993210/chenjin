window.onload = function () {
  let shareBtn = document.querySelector('.btn-share'),
      shareEl = document.querySelector('.share'),
      getBtn = document.querySelectorAll('.btn-get'),
      getEl = document.querySelector('.get'),
      music = document.querySelector('.music'),
      moreBtn = document.querySelector('.btn-more'),
      modules = document.querySelector('.modules')
	 

  for (let i = 0; i < getBtn.length; i++) {
    addEvent(getBtn[i], 'click', () => {
      if (getBtn[i].classList.contains('geted')) {
        return ;
      } else {
		  var merchant_id = getBtn[i].id;
		          $.getJSON('main.php?action=receive', {merchant_id: merchant_id}, function(data){
          if(data){
            getEl.style.display = 'block'
            getBtn[i].classList.add('geted')
            getBtn[i].innerHTML = '领取成功';
            music.play()
            setTimeout(() => {
              getEl.style.display = 'none'
          }, 800);
          }else{
            alert('数据错误！')
          }
        });
      }
    })
  }
  console.log(getBtn)

  addEvent(shareBtn, 'click', () => {
    shareEl.style.display = 'none'
  })

  addEvent(moreBtn, 'click', () => {
    modules.style.display = 'block'
  })
}