<?php
get_header();
?>
<template>
      <article id="hold">
        <img src="" alt=""/>
        
          <h2></h2>
          <p class="kort_beskrivelse"></p>
          <p class= "traeningstider"></p>
		  <p class= "bane"></p>
        
      </article>
    </template>

	<div id="popup">
      <article class="artikel">
       
	   <div> <h2></h2>
        <p class="beskrivelse"></p></div>	
		<div> <img src="" alt="" />
	   <p class="traeningstider"></p>
        <p class="bane"></p></div>
      </article>
    </div>


	<section id="primary" class= "content-area">
<main id="main" class="site-main"> 
	<section class="hvid">
		<p> hello</p>
	</section>
<div><h1 class="rubrik">Fodbold</h1></div>	
<nav id="filtrering"><button class ="alle" data-fodbold="alle">Alle</button></nav>
<div class="knap">
<a href="https://madelene.dk/kea/09_cms/norrebro-united/indmelding/"><button class="knap"> Till indmeldning</button></a>
</div>
<section class= "fodboldcontainer">
</section>
  
	
	<script>
		let fodbold;
		let categories;
		let filter = "alle";
		

	const url = "https://madelene.dk/kea/09_cms/norrebro-united/wp-json/wp/v2/fodbold?per_page=100";
	const caturl = "https://madelene.dk/kea/09_cms/norrebro-united/wp-json/wp/v2/categories";
	
async function getJson () {
	const data = await fetch (url);
	const catdata = await fetch (caturl);
	fodbold = await data.json();
	categories = await catdata.json();
	console.log(fodbold);
	visFodbold();
	opretknapper ();
}

function opretknapper () {
	categories.forEach(cat => {
		if (cat.name !="Nyheder"&&cat.name !="fodbold"){
		document.querySelector("#filtrering").innerHTML += '<button class="filter" data-fodbold="'+cat.id+'">'+cat.name+'</button>'
	}
		
	})

	addEventlistenersToButtons();
}

function addEventlistenersToButtons () {
document.querySelectorAll("#filtrering button"). forEach(elm => {
	elm.addEventListener("click", filtrering);
})
}

function filtrering (){
filter = this.dataset.fodbold;
console.log(filter);

visFodbold();
}



function visFodbold() {
	let temp = document.querySelector("template");
	let container = document.querySelector(".fodboldcontainer");
	container.innerHTML=" ";
    fodbold.forEach(hold => {
		if ((filter == "alle"  || hold.categories.includes(parseInt(filter)))) {
		
      let klon = temp.cloneNode(true).content;
      klon.querySelector("h2").textContent = hold.title.rendered;
	  klon.querySelector("img").src = hold.holdbillede.guid; 
	  klon.querySelector(".kort_beskrivelse").textContent = hold.kort_beskrivelse;
	  klon.querySelector(".traeningstider").textContent = "Træningstider: " + hold.traeningstider;
	 klon.querySelector(".bane").textContent = "Træningsted: " + hold.bane;
	 klon.querySelector("article").addEventListener("click", () => visHold(hold));
	// klon.querySelector("article").addEventListener("click", () => {location.href =hold.link; }) 
      container.appendChild(klon);

}
    });

}

document.querySelector("#popup").addEventListener("click", () => (popup.style.display = "none"));

function visHold(visOplysninger) {
  console.log("visOplysninger");
  const popup = document.querySelector("#popup");
  popup.style.display = "flex";
  popup.querySelector("h2").textContent = visOplysninger.title.rendered;
  popup.querySelector("img").src = visOplysninger.holdbillede.guid; 
  popup.querySelector(".bane").textContent = "Træningsted: " + visOplysninger.bane;
  popup.querySelector(".beskrivelse").textContent = visOplysninger.beskrivelse;
  popup.querySelector(".traeningstider").textContent = "Træningstider: " + visOplysninger.traeningstider;
}

getJson ();
</script>
	
</section>

<?php

get_footer();
