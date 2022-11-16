<?php
get_header();
?>
<template>
      <article>
        <img src="" alt=""/>
        
          <h2></h2>
          <p></p>
          <p></p>
        
      </article>
    </template>
	<section id="primary" class= "content-area">
<main id="main" class="site-main">
<section class= "kvindercontainer">
</section>
</main>
	<script>
	const url = "https://madelene.dk/kea/09_cms/norrebro-united/wp-json/wp/v2/kvinder"
	
async function getJson () {
	const data = await fetch (url);
	kvinder = await data.json();
	console.log();
	visKvinder();
}

function visKvinder() {
	let temp =document.querySelector("template");
	let container = document.querySelector(".kvindercontainer");
    kvinder.forEach(kvinde => {

      let klon = temp.cloneNode(true).content;
      klon.querySelector("h2").textContent = kvinde.title.rendered;

      container.appendChild(klon);
    });
}
getJson ();
</script>
	
</section>

<?php

get_footer();
