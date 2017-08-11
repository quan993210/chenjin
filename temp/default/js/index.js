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
      console.log('可以点击')
    if (getBtn[i].classList.contains('geted')) {
      return ;
    } else {
      var merchant_id = getBtn[i].id;
      if(window.XMLHttpRequest) {
        var oAjax = new XMLHttpRequest();//创建ajax对象
      }else{
        var oAjax = new ActiveXObject("Microsoft.XMLHTTP");//IE6浏览器创建ajax对象
      }
      oAjax.open("GET","main.php?action=receive&merchant_id="+merchant_id,true);//加上t='+new Date().getTime()"的目的是为了消除缓存，每次的t的值不一样。
      oAjax.send();
      oAjax.onreadystatechange=function() {
        if(oAjax.readyState==4)
        {
          if(oAjax.status==200) {
            getEl.style.display = 'block'
            getBtn[i].classList.add('geted')
            getBtn[i].innerHTML = '领取成功';
            music.play()
            setTimeout(() => {
              getEl.style.display = 'none'
             }, 800);
          }else{
            alert("失败");
          }
        }
      };
      console.log(99999)
      /*$.getJSON('main.php?action=receive', {merchant_id: merchant_id}, function(data){
        console.log(data)
        if(data){
          getEl.style.display = 'block'
          getBtn[i].classList.add('geted')
          getBtn[i].innerHTML = '领取成功';
          music.play()
          setTimeout(() => {
            getEl.style.display = 'none'
        }, 800);
        }else{
          // alert('数据错误！')
          console.log('error')
        }
      });*/
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