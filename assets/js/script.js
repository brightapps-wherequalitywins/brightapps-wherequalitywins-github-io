if (window.innerWidth >= 992) {
    setTimeout(() => {
        let $elements = document.querySelectorAll(".light-box");

        $elements.forEach((element, index, parent) => {
            let elementHeight = element.offsetHeight;
            let halfarraylength = parent.length / 2;
            if (index >= halfarraylength) {
                let parelementHeight = parent[index - 3].offsetHeight;
                if (parelementHeight > elementHeight) {
                    element.style.height = `${parelementHeight}px`;
                }
            }
            if (index < halfarraylength) {
                let parelementHeight = parent[index + 3].offsetHeight;
                if (parelementHeight > elementHeight) {
                    element.style.height = `${parelementHeight}px`;
                }
            }
            return true;
        });
    }, 100);
}

setTimeout(() => {
    const swiftUpElements = document.querySelectorAll('.swift-up-text');
    swiftUpElements.forEach(elem => {
        const words = elem.textContent.split(' ');
        elem.style.visibility = 'visible';
        elem.innerHTML = '';

        words.forEach((el, index) => {
            words[index] = `<span><i>${words[index]}</i></span>`;
        });

        elem.innerHTML = words.join(' ');

        const children = document.querySelectorAll('.swift-up-text span > i');
        children.forEach((node, index) => {
            node.style.animationDelay = `${index * .2}s`;
        });

    });
}, 200);

document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('#main-slide', {
        arrows: false,
    });
    if (window.innerWidth < 992) {
        splide.on('visible', (visible) => {
            let child = document.querySelector('#main-slide .splide__slide.is-active.is-visible .container');
            let parent = document.querySelector('#main-slide .splide__list');
            parent.style.transition = "0.5s ease";
            parent.style.height = `${child.offsetHeight + 60}px`;
        });
    }
    splide.mount();

    new Splide('#tech-stack-carrousel', {
        type: 'loop',
        autoWidth: true,
        autoScroll: {
            speed: 0.5,
        },
        arrows: false,
        pagination: false
    }).mount(window.splide.Extensions);
});