const league = document.getElementById('form-league')
const _command = document.getElementById('form-command')
const games = document.getElementById('form-games')
const storage = window.localStorage

const send = async function(data) {
    return await fetch('/controllers/controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => { return response.json() });
}

league.league.onchange = async function (e) {
    e.preventDefault();
    await send({ event: 'league', league: this.value })
        .then(value => league.children[2].outerHTML = value)
    storage.setItem('league', this.value)
}

if (storage.getItem('league')) {
    league.league.value = storage.getItem('league');
    league.league.dispatchEvent(new Event('change'));
}

_command.team.onchange = async function (e) {
    e.preventDefault();
    await send({ event: 'command', command: this.value })
        .then(value => _command.children[2].innerHTML = value)
}
games.team.onchange = async function (e) {
    e.preventDefault();
    await send({ event: 'games', command: this.value })
        .then(value => games.children[2].innerHTML = value)
}