 if ($('#cities')) {
     const town_area = x => parseInt(x / 1000);
     const area_city = x => parseInt(x / 100) * 100;
     const city_province = x => parseInt(x / 1000) * 1000;
     var computeArea = function(addr_id) {
         //console.log(addr_id.length);
         var data = {
             province: '',
             city: '',
             area: '',
             town: ''
         }
         //350000->370100->370402->370404001
         if (addr_id == '')
             return data;
         //town
         if (addr_id.length == 9) {
             data.town = addr_id;
             data.area = town_area(data.town);
             data.city = area_city(data.area);
             data.province = city_province(data.city);
         } else if (addr_id % 1000 == 0) {
             // province
             data.province = addr_id;
         } else if (addr_id % 100 == 0) {
             //city
             data.city = addr_id;
             data.province = city_province(data.city);
         } else {
             //area
             data.area = addr_id;
             data.city = area_city(data.area);
             data.province = city_province(data.city);
         }
         return data;
     };

     var town = $('#cities select[name="town"]');
     var townFormat = function(info, select_town) {
         //console.log(info);
         $(town).hide().empty();
         if (info['code'] % 100 && info['code'] < 710000) {
             $.ajax({
                 url: '/data_location/town/' + info['code'] + '.json',
                 dataType: 'json',
                 success: function(town_data) {
                     $(town).show();
                     $(town).append('<option value=""> - 请选择 - </option>');
                     for (i in town_data) {
                         ////console.log(i, select_town)
                         if (select_town == i) {
                             $(town).append('<option selected  value="' + i + '">' + town_data[i] + '</option>');
                         } else {
                             $(town).append('<option  value="' + i + '">' + town_data[i] + '</option>');
                         }
                     }
                     render_area_search();
                 }
             });
         }
     };

     // 根据服务器的纪录确定该地区的所以为位置值
     var data = {};
     if ($('input[name=addr_id]').length > 0) {
         data = computeArea($('input[name=addr_id]').val());
     } else {
         data = computeArea('');
     }
     //console.log(data);
     $('#cities').citys({
         required: false,
         province: data.province,
         city: data.city,
         area: data.area,
         town: data.town,
         onChange: function(info) {
             townFormat(info, '');
         }
     }, function(api) {
         // 初始化函数
         var info = api.getInfo();
         townFormat(info, data.town);
         render_area_search();
     });
 }

 if($('#area-search').length > 0){
    $('select[name="province"]').on('change', function(){
        $('input[name=addr_id]').val($(this).val()).change();
    })
    $('select[name="city"]').on('change', function(){
        $('input[name=addr_id]').val($(this).val()).change();
    })
    $('select[name="area"]').on('change', function(){
        $('input[name=addr_id]').val($(this).val()).change();
    })
    $('select[name="town"]').on('change', function(){
        $('input[name=addr_id]').val($(this).val()).change();
    })
 }
 let areaContains = ['.province', '.city', '.area', '.town'];
 function render_area_search(){
    //console.log(1);
    if($('#area-search').length <= 0)
        return;
    $('.province').html('');
    const lableVale = x => $(x).attr('value') == $(x).parent().val() ? 'label-success' : 'label-info';
    const alink = (x,y) =>  '<a data-code=' + $(y).attr('value') + ' class="label ' + x + '" >' + $(y).text() + '</a>';

    $('select[name="province"]').find('option').each(function(){
        if($(this).attr('value') == '')
            return;
        let s = lableVale($(this))
        $('.province').append(alink(s, $(this)));
    });
    $('.city').html('');
    $('select[name="city"]').find('option').each(function(){
        if($(this).attr('value') == '')
            return;
        let s = lableVale($(this))
        $('.city').append(alink(s, $(this)));
    });
    $('.area').html('');
    $('select[name="area"]').find('option').each(function(){
        if($(this).attr('value') == '')
            return;
        let s = lableVale($(this));
        $('.area').append(alink(s, $(this)));
    });
    $('.town').html('');
    $('select[name="town"]').find('option').each(function(){
        if($(this).attr('value') == '')
            return;
        let s = lableVale($(this));
       $('.town').append(alink(s, $(this)));
    });
    
    for(x in areaContains){
        $(areaContains[x]).show();
        if($(areaContains[x]).html() == ''){
            $(areaContains[x]).hide();
        }
    }
 }