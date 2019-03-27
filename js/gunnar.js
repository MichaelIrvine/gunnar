// *****************************************************************************
// FRONT PAGE
// *****************************************************************************


// Front Page Pre Loader
// (function(){
// const cover = document.querySelector(".cover-loader");

// setTimeout(() => {
//   cover.classList.add("fade-out");
//   cover.addEventListener("transitionend", function() {
//     cover.classList.add("is-hidden");
//   });
// }, 1500);
// })();

// // Front Page Methods
const frontPageMethods = {
        displayMenu: function(){
            const siteFooter = document.querySelector('.site-footer');
            const body = document.querySelector("body");
            const bodyIsHome = body.classList.contains('home');

            if(!bodyIsHome) {
            
            siteFooter.classList.remove("front-page__footer");
                
            }
        },
}


frontPageMethods.displayMenu();


