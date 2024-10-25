const navMainMenuToggle = document.querySelector(".nav-main-menu-toggle");

navMainMenuToggle.addEventListener("click", (e) => {
    e.preventDefault();
    const ariaControls = navMainMenuToggle.getAttribute("aria-controls");
    if (navMainMenuToggle.getAttribute("aria-expanded") === "false") {
        navMainMenuToggle.setAttribute("aria-expanded", "true");
        navMainMenuToggle.setAttribute("aria-label", "Close menu");
        navMainMenuToggle.parentElement.querySelector(`#${ariaControls}`).toggleAttribute("hidden");
    } else {
        navMainMenuToggle.setAttribute("aria-expanded", "false");
        navMainMenuToggle.setAttribute("aria-label", "Open menu");
        navMainMenuToggle.parentElement.querySelector(`#${ariaControls}`).toggleAttribute("hidden");
    }
});
