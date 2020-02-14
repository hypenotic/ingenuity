export default function (to, from, savedPosition) {
    if (savedPosition) {
        return savedPosition;
    }

    const findEl = async (hash, x = 0) => {
        return (
            document.querySelector(hash) ||
            new Promise(resolve => {
                if (x > 50) {
                    return resolve(document.querySelector("#app"));
                }
                setTimeout(() => {
                    resolve(findEl(hash, ++x || 1));
                }, 100);
            })
        );
    };

    if (to.hash) {
        findEl(to.hash).then(el=>{
            console.log(el)
            el.focus()
            if ("scrollBehavior" in document.documentElement.style) {
                return window.scrollTo({
                    top: el.getBoundingClientRect().top - 55,
                    // behavior: "smooth"
                });
            } else {
                return window.scrollTo(0, el.offsetTop);
            }
        });
    }

    return {
        x: 0,
        y: 0
    };
}