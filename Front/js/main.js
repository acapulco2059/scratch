// Main Game Play
let cardElements = document.getElementsByClassName('game-card');
let cardElementsArray = [...cardElements];
let imgElements = document.getElementsByClassName('game-card-img');
let imgElementsArray = [...imgElements];
let gameInfo = document.getElementById('game_info');
let gameZone = document.getElementById("game_zone");
let playerInfo = document.getElementById("player_info");
let authForm = document.getElementById("auth_form");
let openedCards = [];
let lastPlayList = [];
let urlAPI = "../../Back/service";
let user = "";
let play = "";
let count = "";
let stateGame = "";
let lastPlayTable = "";

window.onload = function () {
    gameZone.style.display = "none";
    playerInfo.style.display = "none";
    gameInfo.style.display = "none";
};

function auth() {
    $data = {
        'pseudo': $("#pseudo").val(),
        'password': $("#password").val()
    };

    $.ajax(
        urlAPI+'/authService.php',
        {
            type : 'POST',
            headers : {
                "content-Type": "application/json",
                "dataType": "json",
            },
            data : JSON.stringify($data),
            success: function(result){
                user = result;
                if(user.success == true){
                    authForm.style.display = "none";
                    gameZone.style.removeProperty('display');
                    playerInfo.style.removeProperty('display');
                    document.getElementById("player_name").textContent = user.user.pseudo;
                    countGame();
                } else {
                    document.getElementById("auth_error").textContent = user.message;
                }
            },
            error: function () {
                console.log('ne fonctionne pas');
            }
        }
    )
}

function lastPlay() {
    $.ajax(
        urlAPI+'/listPlayerService.php',
        {
            type : 'GET',
            dataType : "json",
            success: function(result){
                lastPlayList = result;
                countGame();
                templateTable();
            }
        }
    );
}

function addPlay() {
    $data = {
        "user_id": parseInt(user.user.id),
        "state": stateGame
    };
    $.ajax(
        urlAPI+'/addPlayService.php',
        {
            type : 'POST',
            headers : {
                "content-Type": "application/json",
                "dataType": "json",
            },
            data : JSON.stringify($data),
            success: function(result){
                play = result;
            },
            error: function () {
                console.log('ne fonctionne pas');
            }
        }
    )
}

function countGame() {
    $data = {
        "user_id": parseInt(user.user.id),
    };
    $.ajax(
        urlAPI+'/userCountGameService.php',
        {
            type : 'POST',
            headers : {
                "content-Type": "application/json",
                "dataType": "json",
            },
            data : JSON.stringify($data),
            success: function(test){
                count = test;
                startGame();
            },
            error: function () {
                console.log('ne fonctionne pas');
            }
        }
    )
}

function shuffle(array) {
    let currentIndex = array.length,
        temporaryValue,
        randomIndex;

    while (currentIndex !==0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

function startGame() {
    if(count.count.partPlay < 3)
    {
        launchGame()
    } else {
        gameZone.classList.add('disabled');
    }
}

function launchGame() {
    document.getElementById('remaining_attempt').textContent = 3 - parseInt(count.count.partPlay);
    openedCards = [];
    document.getElementById('play_again').style.display = "none";
    //shuffle cards
    let shuffledImages = shuffle(imgElementsArray);

    for(let i = 0; i<shuffledImages.length; i++) {
        //remove all images from previous games from each card (if any)
        cardElements[i].innerHTML = "";

        //add the shuffled images to each card
        cardElements[i].appendChild(shuffledImages[i]);
        cardElements[i].type = `${shuffledImages[i].alt}`;

        //remove all extra classes for game play
        cardElements[i].classList.remove("show", "disabled");
        cardElements[i].children[0].classList.remove("show-img");
    }

    //listen for events on the cards
    for(let i = 0; i < cardElementsArray.length; i++) {
        cardElementsArray[i].addEventListener("click", displayCard)
    }
}

function displayCard() {
    if(openedCards.length <= 2) {
        this.children[0].classList.toggle('show-img');
        this.classList.toggle("disabled");
        cardOpen(this);
    } else {
        endGame();
    }
}

function cardOpen(card) {
    openedCards.push(card);
    let len = openedCards.length;
    if(len === 3) {
        if(openedCards[0].type === openedCards[1].type && openedCards[1].type === openedCards[2].type) {
            matched();
        } else {
            unmatched();
        }
    }
}

function matched() {
    stateGame = true;
    addPlay();
    endGame();
}

function unmatched() {
    stateGame = false;
    addPlay();
    endGame();
}

function endGame() {
    lastPlay();
    gameInfo.style.removeProperty('display');
    document.getElementById('play_again').style.removeProperty('display');
}

function templateTable(){
    document.getElementById('lastPlay_grid').innerHTML = "";
    for(var j = 0; j < lastPlayList.length; j++) {
        var myTr = document.createElement('tr');
        myTr.classList.add('player_list_table_row');
        var myPseudo = document.createElement('td');
        myPseudo.classList.add('player_list_table');
        var myPlayDate = document.createElement('td');
        myPlayDate.classList.add('player_list_table');
        var myState = document.createElement('td');
        myState.classList.add('player_list_table');

        let state = "";
        if(lastPlayList[j].state = 0){
            state = "Perdu"
        } else if (lastPlayList[j].state = 1){
            state = "Gagné"
        }
        myPseudo.textContent = lastPlayList[j].pseudo;
        myState.textContent = state;
        myPlayDate.textContent = lastPlayList[j].play_date;
        myTr.appendChild(myPseudo);
        myTr.appendChild(myState);
        myTr.appendChild(myPlayDate);

        document.getElementById('lastPlay_grid').appendChild(myTr);

    }
}
