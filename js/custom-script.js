var $ = jQuery.noConflict();
$(document).ready(function () {
	$('.rs_add_to_cart').on("click", function(e) {
        var product_id = jQuery(this).attr("data-product_id");
       
        //ajax
       $.ajax({
             type : "POST",
             url : "submit-cart.php",
             data : "product_id=" + product_id + "&rs_addtocart=result",
             success: function(response) {
                   console.log(response);
                     if(response == 1){
                     	alert("Product is added to your cart");
						location.reload(true);
                        //jQuery('.add_to_cart_responce').html("Product is added on our cart");
                    }
                    else if(response == 2) {
                        alert("Product is already added to your cart!");
						location.reload(true);
                    }
                    else if(response == 3) {
                        alert("Product is added to your cart!");
						location.reload(true);
                    }
                }
        }); 
    });
});