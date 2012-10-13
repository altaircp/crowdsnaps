function upload(){
//alert($('#photo-file').length);
//return;
    //FileSelectHandler($('input[type=file]'));
    var xhr = new XMLHttpRequest();
    xhr.upload.addEventListener('progress',function(ev){
        console.log((ev.loaded/ev.total)+'%');
    }, false);
    xhr.onreadystatechange = function(ev){
        // Blah blah blah, you know how to make AJAX requests
    };
    var url = "http://api.crowdsnaps.com/api/upload";
    xhr.open('POST', url, false);
    var file = document.getElementById('photo-file').files[0];
    var data = new FormData();
    data.append('file', file);
    xhr.send(data);
}
