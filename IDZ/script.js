$(function () {
    let player_1;
    let player_2;
    let step = 0;
    let first_step = 1;

    $('#start').click(function () {
        player_1 = $('#player-info-1').val();
        player_2 = $('#player-info-2').val();

        if (!player_2 || !player_1) {
            alert('Not all player are listed.');
        } else {
            $('#game').css('display', 'block');
            $('#player-info').css('display', 'none');
            clear_btn();
            $('#player-1-name').text(player_1);
            $('#player-2-name').text(player_2);
        }
    });

    $('button').click(function () {
        const btn = $(this);
        if (check_step(btn)) {
            btn.text(step ? 'O' : 'X');
            $('#player-name').text(step ? player_1 : player_2);
	    $('#step').text(step ? 'X' : 'O');

            if (check_win()) {
                alert(`Player ${step ? player_2 : player_1} won!`);
                const won_player = $(`#player-${step + 1}-score`);
                won_player.text(+won_player.text() + 1);
                clear_btn();
		return;
            }
			
	    if (check_tie()) {
                alert('Draw!');
                clear_btn();
                return;
            }
            step = !step;
        }
    });

    $('#change_name').click(function () {
        $('#game').css('display', 'none');
        $('#player-info').css('display', 'block');
    });

    function check_win() {
        const mark = step ? 'O' : 'X';

        if ($('#00').text() === mark && $('#01').text() === mark && $('#02').text() === mark)
            return true;
        else if ($('#10').text() === mark && $('#11').text() === mark && $('#12').text() === mark)
            return true;
        else if ($('#20').text() === mark && $('#21').text() === mark && $('#22').text() === mark)
            return true;
        else if ($('#00').text() === mark && $('#10').text() === mark && $('#20').text() === mark)
            return true;
        else if ($('#01').text() === mark && $('#11').text() === mark && $('#21').text() === mark)
            return true;
        else if ($('#02').text() === mark && $('#12').text() === mark && $('#22').text() === mark)
            return true;
        else if ($('#00').text() === mark && $('#11').text() === mark && $('#22').text() === mark)
            return true;
        else if ($('#02').text() === mark && $('#11').text() === mark && $('#20').text() === mark)
            return true;
        return false;
    }

    function check_tie() {
        let counter = 0;
        $('button').each(function () {
            if ($(this).text() !== "'") {
                counter++;
            }
        });
        return counter === 9;
    }

    function check_step(btn) {
        return btn.text() === "'";
    }

    function clear_btn() {
	first_step = !first_step;
        step = first_step;
	$('#player-name').text(step ? player_2 : player_1);
	$('#step').text(step ? 'O' : 'X');

        $('button').each(function () {
            $(this).text("'");
        });
    }
});
