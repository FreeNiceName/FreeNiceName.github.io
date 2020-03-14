$(function () {
    $('button').click(function () {
        const min = $('#min').val();
        const max = $('#max').val();

        if (!min || !max) {
            alert('Все поля должны быть заполнены!')
        } else if (min > max) {
            alert('Минимальное значение не может быть больше максимального')
        } else {
            let div = $('#table_create');
            div.html(create_table(+min, +max))
        }
        clear_input();
    });

    function create_table(min, max) {
        let div = '<table>';
        for (let i = 0; i < 10; i++) {
            div += '<tr>';
            for (let j = 0; j < 10; j++) {
                const style = (i + j) % 2 ? 'black' : 'white';
                const rand = Math.floor(min + Math.random() * (max + 1 - min));
                div += `<td style="background-color:${style};">${rand}</td>`
            }
            div += '</tr>';
        }
        div += '</table>';
        return div;
    }

    function clear_input() {
        $('#min').val('');
        $('#max').val('');
    }
});