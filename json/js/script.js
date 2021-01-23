let mahasiswa = {
    nama: "Saiful Labib",
    nim: "17090144",
    email: "xenrath89@gmail.com"
}

// object ke json
// console.log(JSON.stringify(mahasiswa));

// json ke object
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function(){
//     if(xhr.readyState == 4 && xhr.status == 200){
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true);
// xhr.send();

$.getJSON('coba.json', function (data) {
   console.log(data); 
});