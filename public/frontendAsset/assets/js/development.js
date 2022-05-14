var city =  document.querySelector('.nice-select');
// city.style.background= 'green';
console.log(city);




// Route list
$('#sortFilter').change(ProductFiler);
$('#PriceFilter').click(PriceFilter);
$('.singleCategory').click(CategorFilter);
$('.singleSubCategory').click(SubCategorFilter);
            

// Controllers

function ProductFiler(){

    var sortby = $(this).val();
    $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    }) ;
    // ajax resource start
    $.ajax({
         type : 'get',
         url : `/product/filtering/${sortby}`,
         success : function (data){
            $('#newarrivaleProduct').html(data.newarrivaleProduct);
            
         }
    }) ;
    // ajax resource end
    }


    // categoryfilering

    function CategorFilter(){
        var slug = $(this).attr('data-credit');
      //   slug.style.color = 'green';
        var url = `/category/${slug}`;
        $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
       }) ;
       // ajax resource start
       $.ajax({
            type : 'get',
            url : `/category/${slug}`,
            success : function (data){
               $('#newarrivaleProduct').html(data.newarrivaleProduct);
               
            }
       }) 
       window.history.pushState("object or string", "Title", `/category/${slug}`);
    }

    // categoryfilering

    function SubCategorFilter(){
        var slug = $(this).attr('data-credit');
      //   slug.style.color = 'green';
        var url = `/subcategory/${slug}`;
        $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
       }) ;
       // ajax resource start
       $.ajax({
            type : 'get',
            url : `/subcategory/${slug}`,
            success : function (data){
               $('#newarrivaleProduct').html(data.newarrivaleProduct);
               
            }
       }) 
       window.history.pushState("object or string", "Title", `/subcategory/${slug}`);
    }

    // filter from price
    function PriceFilter(){
        var minprice = document.querySelector('.range-slider span .irs-from').textContent;
        var maxprice = document.querySelector('.range-slider span .irs-to').textContent;
        $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
       }) ;
       // ajax resource start
       $.ajax({
            type : 'post',
            url : '/product/filter/from/price',
            data:{minprice:minprice,maxprice:maxprice},
            success : function (data){
               $('.bs-canvas-overlay').hide()
               $('.bs-canvas').hide()
               $('#newarrivaleProduct').html(data.newarrivaleProduct);
            }
       }) ;
      //  window.history.pushState("object or string", "Title", `new/arrivals`);
     }
     
     // paginate arrow controlling start
     if (document.querySelector('.pagination .page-item:last-child .page-link').textContent == '›') {
        document.querySelector('.pagination .page-item:last-child .page-link').innerHTML='Next &#8594;';
         document.querySelector('.pagination .page-item:first-child .page-link').innerHTML='&#8592; Previous';
      }
      
      // paginate arrow controlling end
      //  var pageURL = $(location).attr("href");
      //  alert(pageURL);
  

   
   