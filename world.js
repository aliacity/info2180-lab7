window.onload = () => {
    const button = document.getElementById('lookup');
    const result = document.getElementById('result');
    const selectall = document.getElementById('all');
    const searchfield = document.getElementById('country');
    
    const httprequest= new XMLHttpRequest();
    
    button.onclick = () => {
        httprequest.onreadystatechange = handleRequest;
        if (selectall.checked) {
            httprequest.open('GET', 'world.php?all=true', true);
        } else {
            httprequest.open('GET', `world.php?country=${searchfield.value}`, true);
        }
        httprequest.send();
    }
    
    const handleRequest = () => {
        if (httprequest.readyState === XMLHttpRequest.DONE) {
            if (httprequest.status === 200) {
                result.innerHTML = httprequest.responseText;
            } else {
                alert('There was a problem processing this request.');
            }
        } 
    }
}