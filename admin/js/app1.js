$(document).ready(function(){

  //add product ajax
  $("#productform").on('submit',function(e){
    e.preventDefault();
    // console.log('hello');
    $.ajax({
      type :"POST",
      url :"../controller/newproductcontroller.php",
      data : new FormData(this),
      contentType : false,
      cache : false,
      processData : false,
      beforeSend : function(){
         $(".btn1").attr("disabled","disabled");
         $("#productform").css("opacity","0.5");
        
      },
      success : function(res){
        window.alert('Successfully!!!');
        $(".btn1").removeAttr("disabled");
        $("#productform").css("opacity","1");


        $("#productname").val() = "";
        $("#category option:selected").val() = choose;
        $("#productid").val() = "";
        $("#prouductprice").val() = "";
        $("#productinitprice").val() = "";
        $("#productrating").val() = "";
        $("#productmanu").val() = "";
        $("#productimage").val() = "";
        $("#productdesc").val() = "";
      }, 
      error : function(err){
        window.alert(err.message);
      }
    }

    )
  });

// product change
  $("#sorting").on('change',function(){
    console.log('hello');
  console.log( $("#category option:selected").val());

  if($("#category option:selected").val() == "0" ){
    console.log('hello');
        location.reload();

  }  
        $.ajax({
          type : "POST",
          url : "../controller/prouductcontroller.php",
          data : "name=" + $("#category").find(":selected").val(),
          success : function(data){
             
              
          
            
            $("#cart-box").empty();
              
              // console.log(data);
              let jsonData = JSON.parse(data);
              console.log(jsonData);
              // let rating = 0;
              // let count = 5;

            for (const iterator of jsonData) {
              // console.log(iterator.name);
               let  rating2 =  loopingStart(iterator.rating);
               let quantity2 = addStock(iterator.quantity);
                let price  = numberWithCommas(iterator.salePrice);
                
               console.log(rating2);
               console.log(quantity2);
               console.log(iterator.image);

              $("#cart-box").append(
                `
                  <div class="col-3">
                  <div class="card ms-3 m-4 cardbgs">
                  <img src="../../upload/${iterator.image}" alt="strawberry" min-height="230px !important" class="p-3 imgs">
                  <h5 class="card-title ms-2 fw-bold">${iterator.name}</h5>
                  <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">${iterator.p_id}</small>
                  <p class="m-3">${iterator.description}</p>
                  <small class="card-subtitle ms-2 mb-2 text-primary fw-bold">${price} Ks</small>
                  <div class="d-flex m-2">
                  
                  ${rating2}
                  
                  </div>
                  ${quantity2}
                 
                     
                
                 
                `
              )
            }
            
              
          }
        });
  });


  //customer table search
  $("#search1").keypress(function(){
    console.log($("#search1").val());
      $.ajax({
          type : "POST",
          url : "../controller/searchController.php",
          data : {
            "name" : $("#search1").val()
          },
          success : function(res){
              console.log(res);
              let serverdata = JSON.parse(res);
           let count = 1;
            $(".tablerow").remove();
            for (const iterator of serverdata) {
              let price = numberWithCommas(iterator.total_price);
              let rating2 = loopingStart(iterator.rating);
              let membership = checkMembership(iterator.membership);
              if(iterator.feedback == null || iterator.feedback == ""){
                  iterator.feedback = "-";
            }
            $(".fontsizes2").append(`
                
                <tr class="tablerow">  
                <td>${count++}</td>
                <td>${iterator.name}</td>
                <td>${iterator.email}</td>
                <td>${iterator.phone}</td>
                <td>${iterator.address}</td>
                <td>${membership}</td>
                <td>${price}</td>
                <td>${rating2}</td>
                <td>${iterator.feedback}</td>
                </tr>
              
            
            `)
              
            }
          },
          error : function(err){
            console.log(err);
          }
      })

  });


  
 // order table search
  $("#search2").keypress(function(){
    let count = 1;
   
      $.ajax({
          type : "POST",
          url : "../controller/ordersearchController.php",
          data : {
            "name" : $("#search2").val()
          },
          success : function(res){
              console.log(res);
              let serverdata = JSON.parse(res);
              let count = 1;
              let saleprice = 0 ;
            $(".tablerow").remove();
            for (const iterator of serverdata) {
                saleprice = iterator.quantity * iterator.total_price;
                console.log(iterator.price);
              let saleprice1 = numberWithCommas(saleprice);
              let price = numberWithCommas(iterator.grandPrice);
           
            
            $(".fontsizes2").append(`
                
                <tr class="tablerow">  
                <td>${count++}</td>
                <td>${iterator.order_id}</td>
                <td>${iterator.customer_name}</td>
                <td>${iterator.name}</td>
                <td>${iterator.quantity}</td>
                <td>${saleprice1}</td>
                <td>${price}</td>   
                <td>${iterator.buy_date}</td>
                </tr>
              
            
            `)
              
            }
          },
          error : function(err){
            console.log(err);
          }
      })

  });


  
// member table search
  $("#search3").keypress(function(){

      $.ajax({
          type : "POST",
          url : "../controller/searchMemberController.php",
          data : {
            "name" : $("#search3").val()
          },
          success : function(res){
            console.log(res);
            let serverdata = JSON.parse(res);
         let count = 1;
          $(".tablerow").remove();
          for (const iterator of serverdata) {
          
            let rating2 = loopingStart(iterator.rating);
            
            if(iterator.feedback == null || iterator.feedback == ""){
                iterator.feedback = "-";
          }
          $(".fontsizes3").append(`
              
              <tr class="tablerow">  
              <td>${count++}</td>
              <td>${iterator.name}</td>
              <td>${iterator.email}</td>
              <td>${iterator.phone}</td>
              <td>${rating2}</td>
              <td>${iterator.feedback}</td>
              <td>${iterator.create_date}</td>
              </tr>
            
          
          `)
            
          }
        },
         
          error : function(err){
            console.log(err);
          }
      })

  });

});
function numberWithCommas(price) {
  return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// check member
function checkMembership(membership){
    let memberstatus = "";  
  if(membership == 0){
        memberstatus = `<td>No</td>`;
       }else{
        memberstatus = `<td>Yes</td>`;
       }

       return memberstatus;
    }
  

// check quantity
function addStock(quantity){
    let quantityControl = "";

    if(quantity == 0){
      quantityControl = ` <p class='fs-6 m-2 fw-bold'>Quantity : <span class='text-danger'> Out of Stock </span></p>  

      </div>
      <div class='d-flex justify-content-end me-4'>
       <button type='button' class='btn btn-outline-warning'><a href='newproduct.php' class='text-dark fw-bold'>Add Stock</a></button>
      </div>
     </div>  `;

    }else {
      quantityControl = ` <p class="fs-6 m-2 fw-bold">Quantity : <span>${quantity}</span></p>
                   
      </div>
     
      </div>`;
    }

    return quantityControl;
}

//count rating start
function loopingStart(rating){
  let stars = "";
    console.log(stars);
    for(let index = 0; index < Number(rating);index++){
       stars  +=  ` <span><i class="fas fa-star fa-sm text-warning"></i> </span>`
    }
    
    if(rating != 5){
        for(let index =0 ; index < 5 - Number(rating);index++){
          stars +=   "<span><i class='fas fa-star fa-sm'></i> </span>";
          }
    }

    return stars;

}