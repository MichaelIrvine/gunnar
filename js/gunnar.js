// *****************************************************************************
// FRONT PAGE
// *****************************************************************************
const body = document.querySelector("body");
const bodyIsHome = body.classList.contains("home");


// // Front Page Methods
const frontPageMethods = {
  displayMenu: function() {
    const siteFooter = document.querySelector(".site-footer");
    

    if (!bodyIsHome) {
      siteFooter.classList.remove("front-page__footer");
    }
  },

  disableJumpLink: function() {
    const footerJumpLink = document.querySelector(".fp-colophon-link");

    if (bodyIsHome) {
    if (window.scrollY >= 100) {
      footerJumpLink.classList.replace("is-active", "disabled");
      document.querySelector(".fp-video-cover").classList.add("filter");
    } else {
      footerJumpLink.classList.replace("disabled", "is-active");
      document.querySelector(".fp-video-cover").classList.remove("filter");
      }
    }
  },


};

frontPageMethods.displayMenu();
window.addEventListener("scroll", frontPageMethods.disableJumpLink);

// *****************************************************************************
// FOOTER TOGGLE
// *****************************************************************************

// // Debouncer
function debounce(func, wait = 20, immediate = true) {
  var timeout;
  return function() {
    var context = this,
      args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}


const footerElms = document.querySelectorAll(".footer-el");
const footerNav = document.querySelectorAll(".menu-item");
const footerContact = document.querySelectorAll(".contact-info-item");

const allFooterElms = [...footerElms, ...footerNav, ...footerContact];

const footerArr = Array.from(allFooterElms);

const homeDisplayFooter = function() {
  if (bodyIsHome){
    if (window.scrollY >= 8) {
      footerArr.forEach(el => {
        setTimeout(() => {
          el.style.opacity = 1;
          setTimeout(() => {
            el.style.filter = "blur(0)";  
          }, 300);
        }, 500);
      });
    }
  }
};

const displayFooter = function(){
  if(!bodyIsHome){
    footerArr.forEach(el => {
      setTimeout(() => {
          el.style.opacity = 1;
          setTimeout(() => {
            el.style.filter = "blur(0)";
          }, 300);
        }, 500);
      })
    }
  };



displayFooter();
window.addEventListener("scroll", debounce(homeDisplayFooter));
