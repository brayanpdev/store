/**
 * File to manipulate the API
 */
class API {

    async getAlbums(){
        /**
         * Get data from the API
         */
        const datos= await fetch('https://jsonplaceholder.typicode.com/albums/1/photos');

        // response json
        const respuesta= await datos.json();

        return {
            respuesta
        }

    }

    async sendForm(form){
      var myHeaders = new Headers();
    myHeaders.append('pragma', 'no-cache');
    myHeaders.append('cache-control', 'no-cache');

       const data = new FormData(document.getElementById('payment-form'));
       
       var myInit = { method: 'POST',
                       headers: myHeaders,
                       mode:  'cors',
                       cache: 'reload',
                       body:  data };
        const url=`http://localhost/store/Home/buyAlbum`;

        const urlConvertir= await fetch(url,myInit);


        const resultado= await urlConvertir.json();
        return { resultado }

    }

    
}