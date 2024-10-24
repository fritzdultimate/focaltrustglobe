// const notAllowed = ['login', 'register', 'f']

document.querySelector('.menu-close').addEventListener('click', () => {
    document.querySelector('#mainnav').classList.add('slideleft');
    document.querySelector('#mainnav').classList.remove('slideright');
    document.querySelector('.mbc').classList.remove('menu-backdrop');

});

document.querySelector('.menu-open').addEventListener('click', () => {
    document.querySelector('#mainnav').classList.add('slideright');
    document.querySelector('#mainnav').classList.remove('slideleft');

    document.querySelector('.mbc').classList.add('menu-backdrop');
    
    // slideleft 1s ease-in

    // document.querySelector('#mainnav').style.animationFillMode = 'backwards';
    // document.querySelector('#mainnav').style.animationDirection = 'reverse';


    console.log('clicked')
});



/// ==============================================
/// AOS
/// ==============================================
AOS.init();

/// ==============================================
/// Menubar scrolled
/// ==============================================
// When the user scrolls down 20px from the top of the document, show the alternative menu design
let handleScrolledMenu = function () {
    let header = document.getElementById('header');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        header.classList.add('scrolled');
    }
    else {
        header.classList.remove('scrolled');
    }
};

(location.pathname == '/') && window.addEventListener('scroll', handleScrolledMenu);

/// ==============================================
/// Transitions between sections
/// ==============================================
let isOnScreenBottom = (element, offset) => {
    return (window.pageYOffset >= (window.innerHeight - element.offsetTop) + offset);
}

let isOnScreenTop = (element, offset) => {
    return (window.pageYOffset >= element.offsetTop - offset);
}

let mission = document.getElementById("mission");
let homeTitle = document.querySelector("#home .content");
let home = document.getElementById("home");

let handleScrolledSections = function () {
    if (isOnScreenTop(homeTitle, 50)) { /// Turn on lights
        if (mission.classList.contains("loading")) mission.classList.remove("loading");
        //if (!home.classList.contains("inverted")) home.classList.add("inverted");
    }

    if (!isOnScreenTop(homeTitle, 50)) { /// Turn off lights
        if (!mission.classList.contains("loading")) mission.classList.add("loading");
        //if (home.classList.contains("inverted")) home.classList.remove("inverted");
    }
};

!!mission && window.addEventListener('scroll', handleScrolledSections);

/// ==============================================
/// Parallax
/// ==============================================
/* let images = document.querySelectorAll('.parallax-scroll');
new simpleParallax(images, {
    overflow: true,
    scale: 2
});

let bgs = document.querySelectorAll('.parallax-bgs');
new simpleParallax(bgs, {
    overflow: true,
    scale: 2,
    orientation: 'down',
    delay: 0.8
}); */
/// ==============================================
/// Smooth scrolling for menu items
/// ==============================================
let offset = 0;
(function () {
    let elements = document.getElementsByClassName('menu-item');

    let scrollTo = (element) => {
        window.scroll({
            behavior: 'smooth',
            left: 0,
            top: element.offsetTop
        });
    }

    [].forEach.call(elements, function (element) {
        element.addEventListener('click', event => {
            let anchor = element.getAttribute("scrollto");
            scrollTo(document.getElementById(anchor));
        });
    });

})();


/// ==============================================
/// Carousel
/// ==============================================
window.addEventListener('load', initCarousel);

function initCarousel() {
    var menu_items = document.querySelectorAll('.track .app-bar .nav-menu li');
    var pages = document.querySelectorAll('.track .viewport .pages-container .page');
    var pages_container = document.querySelectorAll('.track .viewport .pages-container')[0];
    var track = document.getElementsByClassName('track')[0];
    var viewport = document.getElementsByClassName('viewport')[0];
    var selectedIndex = -1;
    var mode = 0;

    var scrollToPage = (index) => {
        var trackRect = track.getBoundingClientRect();
        var start = trackRect.top + window.scrollY;
        var scrollPosY = start + trackRect.height * (index / menu_items.length);
       
        window.scrollTo({ left: 0, top: scrollPosY, behavior: 'smooth' });
    }

    var selectMenu = (index, previous) => {
        if (previous >= 0) {
            menu_items[selectedIndex].classList.remove('active');
        }
        menu_items[index].classList.add('active');
    };

    var selectPage = (index, previous) => { 
        pages[index].classList.add('visible');
        if (previous>index){
            pages[previous].classList.remove('visible');
        }
    }

    var init_pages = ()=>{
        pages.forEach((page, index, list)=>{
            //Inician ocultos, dependiendo del scroll se muestran o no.
            page.classList.add('zoom-far');
        });
    };

    var scrollListener = (event) => {
         if(location.pathname == '/'){
            var value = elementAsScrollValue(track);
            var index = Math.min(Math.floor(value * menu_items.length), menu_items.length - 1);
            //Modo movil
            if (window.matchMedia("(max-width: 992px)").matches){
                //Codigo a a ejecutar cuando se detecta el cambio de modo
                if (mode != 1){
                    mode = 1;
                    pages_container.style.setProperty('transform', 'translate(0px)');
                }
            }
            //Modo escritorio
            else{
                if (mode != 2){
                    mode = 2;
                }
                var offsetX = -value * (viewport.getBoundingClientRect().width)* (pages.length - 1)
                pages_container.style.setProperty('transform', `translate(${offsetX}px)`); 
            }
            if (index != selectedIndex){
                selectMenu(index, selectedIndex);
                selectPage(index, selectedIndex);
                selectedIndex = index;
            }
        } else {
            let height = document.querySelector('header').clientHeight;
            document.querySelector('main').style.paddingTop = height + 'px';
        }
    };


    var onClickListener = function (event) {
        let index = this.getAttribute('data-index');
        scrollToPage(index);
    };

    menu_items.forEach((menu_item, currentIndex, list) => {
        menu_item.setAttribute('data-index', currentIndex);
        menu_item.addEventListener('click', onClickListener);
    });

    init_pages();
    scrollListener();
    window.addEventListener('scroll', scrollListener);
    window.addEventListener('resize', scrollListener);
}

function elementAsScrollValue(element) {
    var vh = (window.innerHeight || document.documentElement.clientHeight);
    var vw = (window.innerWidth || document.documentElement.clientWidth);
    const rectElement = element.getBoundingClientRect();
    var percent;
    var availableY = rectElement.height - vh;
    if (rectElement.top > 0) {
        percent = 0;
    }
    else if (rectElement.bottom < vh) {
        percent = 1;
    }
    else {
        percent = (-rectElement.top) / availableY;
    }
    return percent;
}

// const loginButton = document.querySelector('.btn');

// loginButton.addEventListener('click', () => {
//     loginButton.classList.add('loading');
//     myTimeout = setTimeout(()=> {
//         loginButton.classList.remove('loading');
//     }, 5000);
// });

// const mobileLoginButton = document.querySelector('.mobile-login');
// mobileLoginButton.addEventListener('click', () => {
//     mobileLoginButton.classList.add('loading');
//     myTimeout = setTimeout(()=> {
//         mobileLoginButton.classList.remove('loading');
//     }, 5000);
// });
