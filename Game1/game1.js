let potezat = ["-", "-", "-", "-", "-", "-", "-", "-", "-"]
let step = 0
let shenja
let play = (pozita) => {
    if (step % 2 == 0) {
        shenja = "<img src=\"img/shield.png\"  width=\"400px\" height=\"150px\" >"
        //"<img src = \"img/shield.png\" > "
    } else {
        shenja = "<img src=\"img/iron-man.png\"  width=\"400px\" height=\"150px\" >"
    }
    if (document.getElementById(pozita).innerHTML == "-") {
        document.getElementById(pozita).innerHTML = shenja;

        potezat[pozita] = shenja
        step++
        checkWinner()
        console.log(potezat)
    }

}

let checkWinner = () => {
    if ((potezat[0] == shenja) && (potezat[1] == shenja) && (potezat[2] == shenja)) {
       showWinner(0,1,2)
    }
    else if ((potezat[3] == shenja) && (potezat[4] == shenja) && (potezat[5] == shenja)) {
       showWinner(3,4,5)
    }
    else if ((potezat[6] == shenja) && (potezat[7] == shenja) && (potezat[8] == shenja)) {
       showWinner(6,7,8)
    }
    else if ((potezat[0] == shenja) && (potezat[3] == shenja) && (potezat[6] == shenja)) {
       showWinner(0,3,6)
    }
    else if  ((potezat[1] == shenja) && (potezat[4] == shenja) && (potezat[7] == shenja)) {
       showWinner(1,4,7)
    }
    else if ((potezat[2] == shenja) && (potezat[5] == shenja) && (potezat[8] == shenja)) {
       showWinner(2,5,8)
    }
    else if ((potezat[0] == shenja) && (potezat[4] == shenja) && (potezat[8] == shenja)) {
       showWinner(0,4,8)
    }
    else if ((potezat[2] == shenja) && (potezat[4] == shenja) && (potezat[6] == shenja)) {
       showWinner(2,4,6)
    }
    else{
        console.log("Nuk ka ende fitus")
    }
}

let showWinner =(x,y,z)=>{
    document.getElementById(x).style.background = "green"
    document.getElementById(y).style.background = "green"
    document.getElementById(z).style.background = "green"
    stopGame()

}

let stopGame =()=>{
    let buttons = document.getElementsByTagName("button")

    for(let i=0; i<buttons.length;i++){
        buttons[i].disabled = true
    }
}