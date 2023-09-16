

document.addEventListener("alpine:init", () => {
  Alpine.data("toggleSidebar", () => ({
    open: false,

    toggle() {
      this.open = !this.open;
    },
  })),
    Alpine.data("toggleSubmenu", () => ({
      open: false,

      toggle() {
        this.open = !this.open;
      },
    })),
    Alpine.data("sideScroller", () => ({

        navEnd:false,
        navStart:false,
        scrollHeight : document.querySelector('.post').scrollHeight - (document.querySelector('.info-post').scrollHeight),
        scroll(){
          this.navEnd = document.documentElement.scrollTop > this.scrollHeight && (document.documentElement.clientWidth > 992) ? true : false ;
          this.navStart = document.documentElement.scrollTop > 70 && !(document.documentElement.scrollTop > this.scrollHeight) && (document.documentElement.clientWidth > 992) ? true : false;

        }

    }))
});

function myFunction(x) {
    x.classList.toggle("change");
  }



document.addEventListener("alpine:init", () => {
  Alpine.data("toggleSidebar", () => ({
    open: false,

    toggle() {
      this.open = !this.open;
    },
  })),
    Alpine.data("toggleSubmenu", () => ({
      open: false,

      toggle() {
        this.open = !this.open;
      },
    }));
});







function scroll_top() {

    $("html, body").animate({ scrollTop: 0 }, "slow");
}

document.addEventListener('scroll',function(){
    document.documentElement.scrollTop > 400 ? $('#scrollTop').animate({ bottom: 10 }, 100) : $('#scrollTop').animate({ bottom: -200 }, 100);

});







window.onload = function () {
  document.querySelector('.loading').remove();
}




