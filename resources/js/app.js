import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// // Trovo l'elemento image-input
// const imageInput = document.getElementById('image-input');
// const imagePreview = document.getElementById('image-preview');
// // Se trovo l'elemento
// if(imageInput && imagePreview); {
//     //      Al cambio del valore dell'input
//     imageInput.addEventListener('change', function() {
//         //      Prelevo l'image selezionata
//         const selectedFile = this.files[0];
//         const reader = new FileReader();
//         reader.addEventListener('load', function() {

//             //      Metto il file nell'src del contenitore image-preview
//             //      visualizzo l'image
//             imagePreview.src = reader.result;
//             imagePreview.classList.remove('d-none')
//         });
//         reader.readAsDataURL(selectedFile);
//     });
// }