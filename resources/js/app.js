import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-drawer-target]").forEach((trigger) => {
        const drawer = document.getElementById(trigger.dataset.drawerTarget);

        trigger.addEventListener("click", () => {
            drawer.showModal();
            document.body.classList.add("overflow-hidden");
        });

        drawer.addEventListener("mousedown", (event) => {
            const rect = drawer.getBoundingClientRect();
            const isClickOutside =
                event.clientX < rect.left ||
                event.clientX > rect.right ||
                event.clientY < rect.top ||
                event.clientY > rect.bottom;

            if (isClickOutside) {
                drawer.close();
                document.body.classList.remove("overflow-hidden");
            }
        });

        drawer.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                event.preventDefault();
                drawer.close();
                document.body.classList.remove("overflow-hidden");
            }
        });
    });

    document.querySelectorAll("[data-drawer-close]").forEach((trigger) => {
        trigger.addEventListener("click", () => {
            trigger.closest("dialog").close();
            document.body.classList.remove("overflow-hidden");
        });
    });
});
