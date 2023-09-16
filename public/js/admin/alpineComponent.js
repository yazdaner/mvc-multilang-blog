document.addEventListener('alpine:init', () => {
    Alpine.data('toggleSidebar', () => ({
        open: window.innerWidth >= 992 ? true :false,

        toggle() {
            this.open = ! this.open
        }
    })),
    Alpine.data('toggleSubmenu', () => ({
        open: false,

        toggle() {
            this.open = ! this.open
        }
    }))
})
