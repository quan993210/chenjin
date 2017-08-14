window.onload = function () {
  let shareBtn = document.querySelector('.btn-share'),
      shareEl = document.querySelector('.share'),
      getBtn = document.querySelectorAll('.btn-get'),
      getEl = document.querySelector('.get'),
      music = document.querySelector('.music'),
      moreBtn = document.querySelector('.btn-more'),
      modules = document.querySelector('.modules'),
      cancelBtn = document.querySelector('.cancel')

  for (let i = 0; i < getBtn.length; i++) {
    addEvent(getBtn[i], 'click', () => {
      if (getBtn[i].classList.contains('geted')) {
        return ;
      } else {
        getEl.style.display = 'block'
        getBtn[i].classList.add('geted')
        music.play()
        setTimeout(() => {
          getEl.style.display = 'none'
        }, 800)
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

  // 退出弹框
  addEvent(cancelBtn, 'click', () => {
    modules.style.display = 'none'
  })

  // 点击礼品弹出展示块 new
  let productList = document.querySelectorAll('.product-item'),
      productModule = document.querySelector('.product-module')

  for (let i = 0; i < productList.length; i++) {
    addEvent(productList[i], 'click', () => {
      productModule.style.display = 'block'
    })
  }

  addEvent(productModule, 'click', () => {
    productModule.style.display = 'none'
  })
}