let province = $('#provinces');
let nameTheater = $('#tenRap');
function filterAuto() {
    var dataSearch = {
        'province': province.val(),
        'nameTheater': nameTheater.val()
    }
    $.ajax({
        type: "GET",
        url: "/get-rap-by-province",
        data: dataSearch,
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.theaters)
            if(response.theaters.length > 0){
                $('.list-theater-search').empty()
                response.theaters.forEach(function (theater) {
                    var row = `  <div class="border-bottom region-item" data-region="1" data-name="${theater.tenRap}"
                    data-alias="${theater.tenRap}"
                    data-address="${theater.diaChi}">
                   <div class="row align-items-center pl-4 pr-4 pb-3 pt-3 ">
                       <div class="col-auto">
    
                           <a href="/rap/galaxy-trung-chanh/" class="avatar avatar-sm">
                               <img src="${response.imageTheater}"
                                    data-src="https://cdn.moveek.com/storage/media/cache/square/5fffb30b3194c340097683.png"
                                    alt="Galaxy Trung Chánh" class="lazyload avatar-img rounded-circle"
                                    style="width: 50px"
                               >
                           </a>
    
                       </div>
                       <div class="col ml-n2">
    
                      
                           <h4 class="card-title mb-1">
                               <a href="/rap/${theater.slug}" class="name">${theater.tenRap}</a>
    
                           </h4>
    
                           <!-- Time -->
                           <p class="card-text small text-muted address mb-0">
                               ${theater.diaChi}
                           </p>
    
                          
                       </div>
                   </div>
               </div>`
               $('.list-theater-search').append(row);
                })
            } else {
                $('.list-theater-search').html('<h5 style="padding:10px; text-align:center">Không có rạp nào thỏa mãn điều kiện tìm kiếm </h5>')
            }
        },
    });
}

function clickSearch() { 
    province.on('change', function () {
        filterAuto()
    });
    nameTheater.on('change', function () {
        filterAuto()
    })
 }

$(document).ready(function () {
    filterAuto();
    clickSearch();
});
