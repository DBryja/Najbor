document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.prace-archive__item');
    if(!items) return;
    items.forEach(item => {
        const shape = item.getAttribute('data-shape');
        let startColumn, endColumn, span;

        switch (shape) {
            case 'thin':
                span = 3;
                break;
            case 'square':
                span = 5;
                break;
            case 'wide':
                span = 7;
                break;
            case 'very-wide':
                span = 10;
                break;
            default:
                span = 5;
                break;
        }
        startColumn = Math.floor(Math.random() * (10 - span + 1)) + 1;
        endColumn = startColumn + span;

        item.style.gridColumnStart = startColumn;
        item.style.gridColumnEnd = endColumn;
    });
});

