window.onload = function () {
  let shareBtn = document.querySelector('.btn-share'),
      shareEl = document.querySelector('.share'),
      getBtn = document.querySelectorAll('.btn-get'),
      getEl = document.querySelector('.get'),
      music = document.querySelector('.music'),
      moreBtn = document.querySelector('.btn-more'),
      modules = document.querySelector('.modules'),
      cancelBtn = document.querySelector('.cancel'),
      productList = document.querySelectorAll('.product-item'),
      productModule = document.querySelectorAll('.product-module')
  for (let i = 0; i < getBtn.length; i++) {
    addEvent(getBtn[i], 'click', () => {
    if (getBtn[i].classList.contains('geted')) {
      shareEl.style.display = 'block';
      return ;
    } else {
      var merchant_id = getBtn[i].id;
      var receive = getBtn[i].parentNode.id;
      if(window.XMLHttpRequest) {
        var oAjax = new XMLHttpRequest();//创建ajax对象
      }else{
        var oAjax = new ActiveXObject("Microsoft.XMLHTTP");//IE6浏览器创建ajax对象
      }
      oAjax.open("GET","main.php?action=receive&merchant_id="+merchant_id+"&receive="+receive,true);//加上t='+new Date().getTime()"的目的是为了消除缓存，每次的t的值不一样。
      oAjax.send();
      oAjax.onreadystatechange=function() {
        if(oAjax.readyState==4)
        {
          if(oAjax.status==200) {
            getEl.style.display = 'block'
            getBtn[i].classList.add('geted')
            getBtn[i].innerHTML = '领取成功';
            document.getElementById("gold").innerHTML=oAjax.responseText;
            music.play()
            setTimeout(() => {getEl.style.display = 'none'}, 1500);
          }else{
            console.log("失败");
          }
        }
      };
    }
  })
  }
  console.log(getBtn)

  addEvent(shareBtn, 'click', () => {
    shareEl.style.display = 'none'
  })

  if(moreBtn){
    addEvent(moreBtn, 'click', () => {
      modules.style.display = 'block'
  })
  }

  // 退出弹框
  addEvent(cancelBtn, 'click', () => {
    modules.style.display = 'none'
})

  for (let i = 0; i < productList.length; i++) {
    addEvent(productList[i], 'click', () => {
      productModule[i].style.display = 'block'
    })

  }

  for (let i = 0; i < productModule.length; i++) {
    addEvent(productModule[i], 'click', () => {
      productModule[i].style.display = 'none'
  })
  }


}