import 'bootstrap';
console.log("js caricato");

document.addEventListener('DOMContentLoaded', () => {
    const formatTimes = () => {
        const timeElements = document.querySelectorAll('.local-time');

        timeElements.forEach(el => {
            const timestamp = el.getAttribute('data-timestamp');
            if (timestamp) {
                const date = new Date(timestamp);

                const day = date.getDate().toString().padStart(2, '0');
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const year = date.getFullYear();
                const hours = date.getHours().toString().padStart(2, '0');
                const minutes = date.getMinutes().toString().padStart(2, '0');

                el.textContent = `${day}/${month}/${year} alle ${hours}:${minutes}`;
            }
        });
    };

    // Run on load
    formatTimes();

    // In case Livewire navigates
    document.addEventListener('livewire:navigated', formatTimes);
});

document.addEventListener('DOMContentLoaded', () => {
    const undoBox = document.getElementById('undoBox');
    if (undoBox) {

        setTimeout(() => {
            undoBox.classList.add('d-none');

        }, 2000);

    }
});


