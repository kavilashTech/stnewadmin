/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */

// const jqueryForm = require("../../Temp/js/jquery.form");

    // 
// Scripts
// 

$('#cmbStaytypeCategory').select2({
    theme:'classic',
    width:'100%'
});
$('#cmbLocation').select2({
    theme:'classic',
    width:'100%'
});
$('#cmbArea').select2({
    theme:'classic',
    width:'100%'
});
$('#cmbExclusivity').select2({
    theme:'classic',
    width:'100%'
});

$('#cmbAmenity').select2({
    theme:'classic',
    width:'100%'
});
$('#cmbAmenityList').select2({
    theme:'classic',
    width:'100%'
});
$('#cmbRoomAmenity').select2({
    theme:'classic',
    width:'100%'
});
$('#cmbRoomAmenityList').select2({
    theme:'classic',
    width:'100%'
});



window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


// ajax script for getting Location / Area
$(document).on('change','#cmbLocation', function(){
    var locationId = $(this).val();
    // console.log(locationId);
    if(locationId){
        
        $.ajax({
            type:'POST',
            url:'dependantcombo.php',
            data:{'location_id':locationId},
            success:function(result){
                $('#cmbArea').html(result);
                $("#cmbArea").val(0).trigger('change');

            }
        }); 
        
    }else{
        $('#cmbArea').html('<option value="">Area</option>');
        // $('#city').html('<option value=""> State 1</option>'); 
    }
});




// ajax script for getting Property Level Amenity List
$(document).on('change','#cmbAmenity', function(){
    var amenityId = $(this).val();
    // console.log(locationId);
    if(amenityId){
        
        $.ajax({
            type:'POST',
            url:'dependantcombo.php',
            data:{'amenity_id':amenityId},
            success:function(result){
                $('#cmbAmenityList').html(result);
                $("#cmbAmenityList").val(0).trigger('change');
                // console.log(location_id);

               
            }
        }); 
        
    }else{
        $('#cmbAmenityList').html('<option value="">Amenity List</option>');
        // $('#city').html('<option value=""> State 1</option>'); 
    }
});


// ajax script for getting Room Level Amenity List
$(document).on('change','#cmbRoomAmenity', function(){
    var roomAmenityId = $(this).val();
    // console.log(locationId);
    if(roomAmenityId){
        
        $.ajax({
            type:'POST',
            url:'dependantcombo.php',
            data:{'room_amenity_id':roomAmenityId},
            success:function(result){
                $('#cmbRoomAmenityList').html(result);
                // console.log(location_id);

               
            }
        }); 
        
    }else{
        $('#cmbRoomAmenityList').html('<option value="">Amenity List</option>');
        // $('#city').html('<option value=""> State 1</option>'); 
    }
});











  // ajax script for getting  city data
//  $(document).on('change','#state', function(){
//     var stateID = $(this).val();
//     if(stateID){
//         $.ajax({
//             type:'POST',
//             url:'backend-script.php',
//             data:{'state_id':stateID},
//             success:function(result){
//                 $('#city').html(result);
               
//             }
//         }); 
//     }else{
//         $('#city').html('<option value="">City</option>');
        
//     }
// });


// Upload multiple images using jqueryForm.form.js Start


// $(document).ready(function(){
$(function(){
    $('#uploadForm').ajaxForm({
        target:'#imagesPreview',
        beforeSubmit:function(){
            // $('#uploadStatus').html('<img src="css/uploading.gif"/>');
        },
        success:function(){
            $('#images').val('');
            $('#uploadStatus').html('');
        },
        error:function(){
            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
        }
    });
});



// Upload multiple images using jqueryForm.form.js Start
