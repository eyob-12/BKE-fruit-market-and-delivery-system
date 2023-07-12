let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total'); 

let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'apple',
        image: 'apple.jpg',
        price: 55
    },
    {
        id: 2,
        name: 'mango',
        image: 'mango.jpg',
        price: 50
    },
    {
        id: 3,
        name: 'avocado',
        image: 'avocado.jpg',
        price: 40
    },
    {
        id: 4,
        name: 'orange',
        image: 'orange1.jpg',
        price: 35
    },
    {
        id: 5,
        name: 'lemon',
        image: 'lemon1.jpg',
        price: 20
    },
    {
        id: 6,
        name: 'pinapple',
        image: 'pinapple1.jpg',
        price: 70
    },
    {
        id: 7,
        name: 'sweet-Package-1',
        image: 'fruit1.jpg',
        price: 90
    },
    {
        id: 8,
        name: 'sweet-Package-2',
        image: 'fruit2.jpg',
        price: 120
    },
    {
        id: 9,
        name: 'sweet-Package-3',
        image: 'unamed.jpg',
        price: 200
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img style=" width:140px; height:150px; border-radius:50%;" src="img1/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
        
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img style="width:100px; height:100px; border-radius:50%;" src="img1/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    const shopButton = document.querySelector('.button-cart');
    shopButton.addEventListener('click', () => {
    var totalprice= total.innerHTML;

      localStorage.setItem("myvalue",totalprice);
    window.location.href="checkout.php";  
    
    });
    
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}



