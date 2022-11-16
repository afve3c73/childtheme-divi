<?php
get_header();
?>
<template>
      <article>
        <img src="" alt=""/>
        
          <h2></h2>
          <p class="beskrivelse"></p>
          <p class= "storrelse"></p>
		  <p class= "bane"></p>
        
      </article>
    </template>
	<section id="primary" class= "content-area">
<main id="main" class="site-main"> 
	<nav id="filtrering"></nav>
<section class= "fodboldcontainer">
</section>
</main>
	<script>
		let fodbold;
		let categories;
		

	const url = "https://madelene.dk/kea/09_cms/norrebro-united/wp-json/wp/v2/fodbold?fodbold?per_page=100";
	const caturl = "https://madelene.dk/kea/09_cms/norrebro-united/wp-json/wp/v2/categories";
	
async function getJson () {
	const data = await fetch (url);
	const catdata = await fetch (caturl);
	fodbold = await data.json();
	categories = await catdata.json();
	console.log(categories);
	visFodbold();
	opretknapper ();
}

function opretknapper () {
	categories.forEach(cat => {
		document.querySelector("#filtrering").innerHTML += '<button class="filter" data-fodbold="${cat.id}">${cat.name}</button>'

	})

	addEventlistenersToButtons();

}



function visFodbold() {
	let temp =document.querySelector("template");
	let container = document.querySelector(".fodboldcontainer");
    fodbold.forEach(hold => {
		
      let klon = temp.cloneNode(true).content;
      klon.querySelector("h2").textContent = hold.title.rendered;
	  klon.querySelector("img").src = hold.holdbillede.guid; 
	  klon.querySelector(".beskrivelse").textContent = hold.beskrivelse;
	 klon.querySelector(".storrelse").textContent = hold.holdstorrelse;
	 klon.querySelector(".bane").textContent = hold.bane;
	// klon.querySelector("article").addEventlistener("click", () => {location.href =hold.link; }) 
      container.appendChild(klon);
	
    });

}
getJson ();
</script>
	
</section>

<?php

get_footer();
