async function getUsers() {
    let res = await fetch('http://localhost:8000/adm');
    let users = await res.json();

    document.querySelector('.cards_wrap').innerHTML = '';

    users.forEach((user) => {
        console.log(user);
        document.querySelector('.cards_wrap').innerHTML +=
        
       `<div class="card_item"> 
            <div class="card_inner"> 
                <div class="user_name"> ${user.username} </div> 
                <div class="password">${user.password}</div> 
            </div> 
        </div>`
    })
}

getUsers() 