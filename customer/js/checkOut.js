const itemBoxContainer = document.querySelector(".itemBoxContainer");

const price = document.getElementById("price"),
        deliveryprice = document.getElementById("deliveryprice"),
        totalprice = document.getElementById("totalprice");

const orderbtn = document.querySelector(".orderbtn"),
        cancelbtn = document.querySelector(".cancelbtn");

const nameel = document.getElementById("name"),
    emailel = document.getElementById("email"),
    phoneel = document.getElementById("phnumber"),
    addressel = document.getElementById("address");

const ratingcontainer = document.querySelector(".rating-container"),
    ratingBox = document.querySelector("#ratingBox");

const loading = document.querySelector(".loading"),
    complete = document.querySelector(".complete"),
    survey = document.querySelector(".survey"),
    feedbackform = document.querySelector(".feedbackform"),
    response = document.querySelector(".response");
const surveys = document.querySelector(".surveys"),
    homes = document.querySelector(".homes"),
    nextbtn = document.querySelector(".nextbtn"),
    submitbtn = document.querySelector(".submitbtn"),
    okbtn = document.querySelector(".okbtn");


// global variable
let itemprice = 0,
    itemquantity = 0,
    customer_id = 0;


function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function removeCommas(nStr){
    return nStr.replace(",","");
}

// initial check login


let checklogin = ()=>{
    console.log(showData);
    let customer = showData[showData.length-1].length;
    let customerinfo = showData[showData.length-1][0];
    
    if(customer != 0){
        console.log("have");
        console.log(customerinfo.phone);
        document.getElementById("name").readOnly = true;
        document.getElementById("name").value = customerinfo.name;
        document.getElementById("email").readOnly = true;
        document.getElementById("email").value = customerinfo.email;
        document.getElementById("phnumber").readOnly = true;
        document.getElementById("phnumber").value = customerinfo.phone;
    }else{
        console.log("don't have");
        document.getElementById("name").readOnly = false;
        document.getElementById("email").readOnly = false;
        document.getElementById("phnumber").readOnly = false;
    }
}

checklogin();

// calculate item price function
let calPrice = (ammount,quantity)=>{
    itemquantity = Number(ammount.replace(",","")) * Number(quantity);
    itemprice += itemquantity;
    price.innerHTML = addCommas(itemprice);
    totalprice.innerText = addCommas(itemprice + Number(deliveryprice.innerText.replace(",","")));
}

// append buy item data from index.php
let appenddata = ()=>{
    for(let i = 0;i < showData.length - 1;i++){
        itemBoxContainer.innerHTML += `
                      <div class="itemBox" id="${i}">
                           <img src="${showData[i].img}" alt="" class="itemImg">
                            <p class="itemName">${showData[i].pname}</p>
                            <p class="itemPrice"><span>${showData[i].price}</span> Ks</p>
                            <p class="itemNum">${showData[i].quantity}</p>
                            <p class="d-none">${showData[i].pid}</p>
                      </div>
            `;
        // callback cal function
        calPrice(showData[i].price,showData[i].quantity);
        showData[i].price = removeCommas(showData[i].price);
    }
}

 // callback appenddata function
appenddata();

// add EventListener
orderbtn.addEventListener("click",(e)=>{
    let name = nameel.value,
        email = emailel.value,
        phone = phoneel.value,
        address = addressel.value;
    if(name == "" ){
        nameel.classList.add("fill");
    }else if (email == ""){
        nameel.classList.remove("fill");
        emailel.classList.add("fill");
    }else if(phone == ""){
        emailel.classList.remove("fill");
        phoneel.classList.add("fill");
    }else if (address == ""){
        phoneel.classList.remove("fill");
        addressel.classList.add("fill");
    }else{
        addressel.classList.remove("fill");
        orderinfor();
    }
});

function orderinfor(){
    let userrecord = {};
    let customer = showData[showData.length-1].length;
    if(customer != 0){
        userrecord = {
            "id" :  showData[showData.length-1][0].customer_id,
            "name" : $("#name").val(),
            "email" : $("#email").val(),
            "phone" : $("#phnumber").val(),
            "address" : $("#address").val(),
            "totalprice" : $("#totalprice").text().replace(",",""),
            "items" : showData
        };
    }else{
        userrecord = {
            "id" : "",
            "name" : $("#name").val(),
            "email" : $("#email").val(),
            "phone" : $("#phnumber").val(),
            "address" : $("#address").val(),
            "totalprice" : $("#totalprice").text().replace(",",""),
            "items" : showData
        };
    }

    $.ajax({
        type : "POST",
        url : `../controller/ordercontroller.php`,
        data : {send : JSON.stringify(userrecord)},
        beforeSend : function (){
            ratingcontainer.style.display = "block";
            ratingBox.style.display = "block";
            loading.style.display = "flex";
        },
        success : function (res){
            let returndata = JSON.parse(res);
            if(returndata.checks == "0"){
                if(returndata.buy == false){
                    ratingcontainer.style.display = "none";
                    ratingBox.style.display = "none";
                    loading.style.display = "none";
                    window.alert(`We only have ${returndata.laststock} ${returndata.pname} left in our shop.`);
                    $(`#${returndata.buyid}`).addClass("fill");
                }else {
                    loading.style.display = "none";
                    complete.style.display = "flex";
                    customer_id = returndata;
                }
            }else{
                window.location.href = "../index.php";
            }
        },
        error : function (err){
            ratingcontainer.style.display = "none";
            ratingBox.style.display = "none";
            loading.style.display = "none";
        }
    });
}

nameel.addEventListener("click",()=>{
    nameel.classList.remove("fill");
});

emailel.addEventListener("click",()=>{
    emailel.classList.remove("fill");
});

phoneel.addEventListener("click",()=>{
    phoneel.classList.remove("fill");
});

addressel.addEventListener("click",()=>{
    addressel.classList.remove("fill");
});

 cancelbtn.addEventListener("click",()=>{
     const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
             confirmButton: 'btn btn-success',
             cancelButton: 'btn btn-danger'
         },
         buttonsStyling: false
     })

     swalWithBootstrapButtons.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Yes, Sure',
         cancelButtonText: 'No, cancel!',
         reverseButtons: true
     }).then((result) => {
         if (result.isConfirmed) {
             // swalWithBootstrapButtons.fire(
             //     'Deleted!',
             //     'Your file has been deleted.',
             //     'success'
             // );
             window.location.href = "../index.php";
         } else if (
             /* Read more about handling dismissals below */
             result.dismiss === Swal.DismissReason.cancel
         ) {
             swalWithBootstrapButtons.fire(
                 'Cancelled',
                 'Your imaginary file is safe :)',
                 'error'
             )
         }
     })
 });


surveys.addEventListener("click",()=>{
    complete.style.display = "none";
    survey.classList.add("ani");
    $("#user").text($("#name").val());
})

homes.addEventListener("click",()=>{
    window.location.href = "../index.php";
})

nextbtn.addEventListener("click",()=>{
    survey.classList.remove("ani");
    feedbackform.classList.add("ani");
})

submitbtn.addEventListener("click",(e)=>{
    e.preventDefault();
    console.log(customer_id);
    let formadata = {};
    let customer = showData[showData.length-1].length;
    if(customer != 0){
        formdata = {
            "customerid" : showData[showData.length-1][0].customer_id,
            "stars" :   $("#rating").val(),
            "name" : $("#fname").val(),
            "feedback" : $("#feedback").val()
        };
    }else{
        formdata = {
            "customerid" : customer_id[0].customerid,
            "stars" :   $("#rating").val(),
            "name" : $("#fname").val(),
            "feedback" : $("#feedback").val()
        };
    }

    $.ajax({
        type : "POST",
        url : `../controller/ratingInsertController.php`,
        data : {send : JSON.stringify(formdata)},
        beforeSend : function (){
            loading.style.display = "flex";
        },
        success : function (res){
            loading.style.display = "none";
            feedbackform.classList.remove("ani");
            response.classList.add("ani");
        },
        error : function (err){
            loading.style.display = "none";
            feedbackform.style.display = "block";
        }
    });
})

okbtn.addEventListener("click",()=>{
    window.location.href = "../index.php";
})


