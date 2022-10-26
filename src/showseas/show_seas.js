async function getSeas() {
    let res = await fetch('http://localhost:8000/seas');
    let seas = await res.json();

    document.querySelector('.cards_wrap').innerHTML = '';

    seas.forEach((sea) => {
        document.querySelector('.cards_wrap').innerHTML +=
        
       `<div class="card_item"> 
            <div class="card_inner"> 
                <div class="sea_name"> ${sea.seasname} </div> 
                <div class="date">${sea.dat}</div> 
                <a href="#" onClick="removeSea(${sea.ID})">Удалить</a>
                <a href="#" onClick="selectSea('${sea.ID}', '${sea.seasname}', '${sea.dat}')">Редактировать</a>
            </div> 
        </div>`
    })
}

async function addSea() {
    const title = document.getElementById('title').value,
        body = document.getElementById('body').value;
    
    let formData = new FormData();
    formData.append(`title`, title);
    formData.append(`body`, body);

    const res = await fetch('http://localhost:8000/seas', {
        method: `POST`, 
        body: formData
    });

    const data = await res.json();

    if (data.status === true) {
        await getSeas();
    }

}

async function removeSea(id) {
    const res = await fetch(`http://localhost:8000/seas/${id}`, {
        method: "DELETE"
    });

    const data = await res.json();

    if(data.status === true) {
        await getSeas();
    }
}

let selected_id = null;
function selectSea(id, title, body) {
    selected_id = id;
    document.getElementById('title-edit').value = title;
    document.getElementById('body-edit').value = body;
}

async function updateSea() {
    console.log('a');
    const title = document.getElementById('title-edit').value,
        body = document.getElementById('body-edit').value;

    // PATCH не поддерживает form data как post => используем json
    const data = {
        title: title,
        body: body
    };
    const res = await fetch(`http://localhost:8000/seas/${selected_id}`, {
        method: `PATCH`, 
        body: JSON.stringify(data)
    });

    console.log('aa');
    let resData = res.json();

    console.log(resData.status);

    getSeas()
    console.log('aaa');
    if (resData.status === true) {
        await getSeas();
    }

}

getSeas();