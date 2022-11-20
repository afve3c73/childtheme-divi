<?php
get_header();
?>
<section id="primary" class= "content-area">


<main id="main" class="site-main">	
<article>
        <img src="" alt=""/>
        
          <h2></h2>
          <p class="beskrivelse"></p>
          <p class= "storrelse"></p>
		  <p class= "bane"></p>
        
      </article> 

</main>
	<script>
		let fodbold;
		

	const url = "https://madelene.dk/kea/09_cms/norrebro-united/wp-json/wp/v2/fodbold/"+<?php echo get_the_ID() ?>;
	
	
async function getJson () {
	const data = await fetch (url);
	
	fodbold = await data.json();
	console.log(fodbold);
	visFodbold();
	
}


function visFodbold() {
	
      document.querySelector("h2").textContent = hold.title.rendered;
	  document.querySelector("img").src = hold.holdbillede.guid; 
	  document.querySelector(".beskrivelse").textContent = hold.beskrivelse;
	  document.querySelector(".storrelse").textContent = hold.holdstorrelse;
	  document.querySelector(".bane").textContent = hold.bane;
	


}
getJson ();
</script>
	
</section>

<?php

get_footer();
