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