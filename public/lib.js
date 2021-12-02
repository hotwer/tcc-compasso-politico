// indetificacao

function updateIdentificacao(param, value) {
    let i = JSON.parse(localStorage.getItem('identificacao'));

    if (!i) {
        i = {};
    }

    i[param] = value;

    localStorage.setItem('identificacao', JSON.stringify(i));
}

function getIdentificacao() {
    return JSON.parse(localStorage.getItem('identificacao'))
}


// misc
function uuidv4() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}

function getIpInfo(callback) {
    axios
        .get('http://www.geoplugin.net/json.gp')
        .then(callback);
}