/* eslint-disable */
const clientID = 'rnlfn3zp206qq18fb8nrncvjqcq0uv'
const acceptType = 'application/vnd.twitchtv.v5+json'
const GetStreamUrl = 'https://api.twitch.tv/kraken/streams'
const GetTopUrl = 'https://api.twitch.tv/kraken/games/top/?limit=5'
const limit = 20

function getTopgame(clientID, acceptType, GetTopUrl) {
    fetch(GetTopUrl, {
        method: 'GET',
        headers: new Headers({
            'Client-ID': clientID,
            'Accept': acceptType
        })
    }).then(Res => {
        return Res.json()
    }).then(json => {
        topGamerender(json)
        addEventtopGames()
    }).catch(err => {
        console.log('err:', err)
    })
}

function getStream(gameName, GetStreamUrl, clientID, limit, acceptType) {
    fetch(GetStreamUrl + `/?game=${gameName}&limit=${limit}`, {
        method: 'GET',
        headers: new Headers({
            'Client-ID': clientID,
            'Accept': acceptType
        })
    }).then(Res => {
        return Res.json()
    }).then(json => {
        top20Streamerrender(json)
    }).catch(err => {
        console.log('err:', err)
    })
}

function topGamerender(json){
    for (let i = 0; i < json.top.length; i++) {
        let li = document.createElement('li')
        let text = json.top[i].game.name
        li.innerHTML = `
            <a herf="#" class='list_btn'>${text}</a>
        `
        document.querySelector('.navbar_list').appendChild(li)
    }
}

function addEventtopGames() {
    const check_btn = document.querySelectorAll('.list_btn')
    if (check_btn) {
        for (let i = 0; i < check_btn.length; i++) {
            check_btn[i].addEventListener("click", function() {
                let currentTitle = document.querySelector('.title h2')
                if(currentTitle) {
                    currentTitle.remove();
                }
                let h2 = document.createElement('h2')
                h2.innerHTML = `
                    ${check_btn[i].innerText}
                `
                document.querySelector('.title').prepend(h2)
                let gameName = check_btn[i].innerText
                let blocks = document.querySelectorAll('.block')
                if (blocks) {
                    for (let i = 0; i < blocks.length; i++) {
                        blocks[i].remove('.block');
                    }
                }
                getStream(gameName, GetStreamUrl, clientID, limit, acceptType)
            });
        }
    }
}

function top20Streamerrender(json){
    for (let i = 0; i < json.streams.length; i++) {
        let div = document.createElement('div')
        div.classList.add('block')
        let desc = json.streams[i].channel.status
        let channelID = json.streams[i].channel.display_name
        let logoUrl = json.streams[i].channel.logo
        let previewUrl = json.streams[i].preview.medium
        div.innerHTML = `
            <img class='bgc' src = ${previewUrl}> 
            <div class="info">
                <img src = ${logoUrl}>
                <div class="channel">
                    <div class="ch_Name">${desc}</div>
                    <div class="ch_streamer">${channelID}</div>
                </div>
            </div>
        `
        document.querySelector('.container').appendChild(div)
    }
}



$( document ).ready(() => {
    getTopgame(clientID, acceptType, GetTopUrl)
})