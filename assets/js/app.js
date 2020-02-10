const api=new API

/**
 * event listeners
 */
const form = document.getElementById('payment-form');

form.addEventListener('submit',processCardData);




document.addEventListener('DOMContentLoaded', ()=>{
	api.getAlbums()
	.then(datos=>{
         /**
          * The data is sent to another function
          */
         
        processData(datos);   

         



     });
})

function processData (datos) {
	/**
	 * process the data and show it in the view
	 */
	
	const cardGroup= document.getElementById('cardGroup');

	

	/**
	 * The data obtained to show the albums are traversed.
	 */
	const albums=datos.respuesta;

	for (var i = 0; i < 100; i++) {
		const div= document.createElement('div');
		div.classList.add('col','mb-4');
		div.innerHTML=`
			    <div class="card" style="width: 18rem; margin: 0 auto">
			    <a target="_blank" href="${albums[i].url}">
			  	<img src="${albums[i].thumbnailUrl}" class="card-img-top" alt="...">
			  	</a>
			  	<div class="card-body">
			    <h5 class="card-title">${albums[i].title}</h5>
			    <h6 class="card-subtitle mb-2 text-muted">55 USD</h6>
			    <button onclick="buyItem(this)" data-id="${albums[i].id}" data-price="55"  class="btn btn-primary">Buy Now</button>

			  </div>
			</div>`;
		cardGroup.appendChild(div)
	}
	
	
}

function buyItem(e){
	const productId=e.dataset.id;
	const productPrice=e.dataset.price;


	document.getElementById('productId').value=productId;
	document.getElementById('amount').value=productPrice;

	$('#exampleModal').modal('show');

	const form = document.getElementById('payment-form');

}







function processCardData(e){
	e.preventDefault();
	$('#exampleModal').modal('hide');

	api.sendForm(e.target)
	.then(datos=>{
		console.log(datos);

         if (datos.resultado.message=="succeeded") {
         	Swal.fire({
			  position: 'top-end',
			  type: 'success',
			  title: 'congratulations, your purchase has been successfully processed',
			  showConfirmButton: false,
			  timer: 3000
			})
         }else{

         	Swal.fire({
			  position: 'top-end',
			  type: 'error',
			  html: '<h2>'+datos.resultado.message+'</h2>',
			  showConfirmButton: false,
			  timer: 3000
			})
         }
         



     });
	
	/**
	 * send de form
	 */
	
	
}


