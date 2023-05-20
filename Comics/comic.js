
const onbtnClick = (value) => {
  const cardDiv = document.getElementById("cardDiv");
  const cardTitle = document.getElementById("cardTitle");
  const cardText = document.getElementById("cardText");
  const cardImg = document.getElementById("cardImg");
  console.log(cardImg)

  if (value == 1) { //Avengers: Ultron Unlimited
      cardImg.src = "img/comic1.png"
      cardTitle.innerText = "Avengers: Ultron Unlimited";
      cardText.innerText = "Ultron is the Avengers greatest foe, his personal rivalry with the team fueling his hatred of humanity and spurring on his reprehensible deeds." +
      "Avengers: Ultron Unlimited, by writer Kurt Busiek and artist George Perez, presents his most heinous act, slaughtering the country of Slorenia in minutes, and the Avengers mobilizing to stop him." +
      "Busiek and Perezs run on the title is probably the best in recent memory, two amazing creators at the tops of their game and this story is its highlight. Its the finest Ultron story of all, which" +
      "puts it in rarefied air, and showcases everything that makes a great Avengers story work.";
    } else if (value == 2) { //Dark Avengers: Assemble
      cardImg.src = "img/comic2.png"
      cardTitle.innerText = "Dark Avengers: Assemble";
      cardText.innerText = "Dark Avengers: Assemble, by writer Brian Michael Bendis and artist Mike Deodato Jr., is one of the highlights of Bendis's long run on the Avengers' books. In the aftermath of Secret Invasion, Norman Osborn is given the keys to the kingdom, assembling a team of powerful villains and putting them in familiar heroic mantles. Their first mission- stop evil sorceress Morgan Le Fay.";
    } else if (value == 3) { //Avengers Disassembled
      cardImg.src = "img/comic3.png"
      cardTitle.innerText = "Avengers Disassembled";
      cardText.innerText = "Brian Michael Bendis's first foray into the Avengers was Avengers Disassembled. Joined on art by David Finch, the story had a mysterious foe attacking the team, immediately drawing blood by killing Ant-Man and the Vision. Things only get worse from there, as the reserves assemble and the Avengers are caught up in one of their biggest battles.";
    } else if (value == 4) { //Avengers Forever
      cardImg.src = "img/comic4.png"
      cardTitle.innerText = "Avengers Forever";
      cardText.innerText = "Avengers Forever, by writers Kurt Busiek and Roger Stern and artist Carlos Pacheco, is both an exciting Avengers story and a trip through the team's history. Pitting a team of Avengers from the past, present, and future against machinations of the Time Keepers and Immortus, one of Kang the Conqueror's many guises, it's a story perfect for new and long time fans.";
    } else { //Avengers: The Kree-Skrull War
      cardImg.src = "img/comic5.png"
      cardTitle.innerText = "Avengers: The Kree-Skrull War";
      cardText.innerText = "The Avengers had always been Marvel's foremost superhero team but Avengers: The Kree-Skrull War, by writer Roy Thomas and artist Neal Adams and John Buscema, eclipsed everything that came before it. When the ancient rivalry between the Kree and Skrull heats up again and the Earth is caught in the middle, the Avengers do their best to limit the damage to humanity and end the conflict.";
    }

    if(cardDiv.style.display == '' || cardDiv.style.display == 'none'){ //make it visible
      cardDiv.style.display = 'block';
    }
};

let subMenu  = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}


