document.addEventListener("DOMContentLoaded", () => {

    // If page has class .splide load Splide Slider
    if (document.querySelector('.splide')) {
        new Splide('.splide', {
            type: 'loop',
            autoplay: 'true',
            perPage: 1,
        }).mount();
    }
});
