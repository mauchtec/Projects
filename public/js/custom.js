$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });



$(document).ready(function(){
    $(document).on('click', '.edit-btn', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            enctype: 'multipart/form-data',
            url:'/edit/'+id,
            contentType: false,
            processData: false,
            success: function(data) {
                //console.log(data);
                $('#first_name').val(data.name);
                //$('#edit-modal').modal('show');
                $('#email').val(data.email);
                $('#last_name').val(data.surname);
                
                // Add other fields you want to edit
            }
        });
    });
  });


  $(document).ready(function() {
    $('#updateForm').submit(function(e) {
        var id = $('#id').val();
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: '/update/' + id,
            type: 'PUT',
            data: formData,
            success: function(data) {
                
                $('#exampleModal'). modal('hide');
                location.reload();
            },
            error: function(data) {
                // Do something on error
            }
        });
    });
});

$(document).ready(function () {
    $('.btn-delete').click(function (e) { 
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $('#id').val();
        $.ajax({
            type: "DELETE",
            url: '/delete/'+id,   
            data: { "id": id,
                    "_token":token,
                },      
            
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    location.reload();
                  } else {
                    alert(response.message);
                  }
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
              }
        });
        
    });
});


//sites




$(document).ready(function(){
    $(document).on('click', '.location',function(e){
        e.preventDefault();
        
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    $('#email').val("Geolocation is not supported by this browser.") ;
  }


function showPosition(position) {
    console.log(position.coords.latitude + 
        " " + position.coords.longitude);
  $('#coodinates').val(position.coords.latitude + 
  " " + position.coords.longitude)
}

    });



    $(document).on('click', '.btn-create', function(e){
        e.preventDefault();
        
        var user_id = $('#user_id').val();
        var sitename = $('#sitename').val();
        var contactperson = $('#contactperson').val();
        var sitenumber = $('#sitenumber').val();
        var coodinates = $('#coodinates').val();
        var email = $('#email').val();
        var link = $('#link').val();
        var address = $('#address').val();
        var notes = $('#notes').val();
        $.ajax({
            type: "post",
            url: "sites",
            data: {
                user_id:user_id,
                link:link,
                sitename:sitename,
                contactperson:contactperson,
                sitename:sitename,
                sitenumber:sitenumber,
                coodinates:coodinates,
                email:email,
                address:address,
                notes:notes
            },
            
            success: function (response) {
                $('#addsite').modal('hide');
                location.reload();
                var message = response.statuss;
                console.log(message);
        $("#message").text(message);
                
            }
            
        });
    });
  });

//get ssims

  $(document).ready(function(){
    $(document).on('click', '.editsite', function(e){
        e.preventDefault();
       
        var id = $(this).attr('site-id');

       
        $.ajax({
            type: 'GET',
            enctype: 'multipart/form-data',
            url:'/site/'+id,
            contentType: false,
            processData: false,
            success: function(data) {
               
                $('#site_id').val(data.id);
                $('#sitenames').val(data.sitename);
                $('#contactpersons').val(data.contactperson);
                $('#sitenumbers').val(data.sitenumber);
                $('#coodinate').val(data.coodinates);
                $('#emails').val(data.email);
                $('#addres').val(data.siteaddress);
                $('#links').val(data.link);
                $('#note').val(data.notes);
                
                // Add other fields you want to edit
            }
        });
    });
  });



  //View one site
  $(document).ready(function(){
    $(document).on('click', '.view', function(e){
        e.preventDefault();
       
        var id = $(this).attr('site-id');
       $.ajax({
            type: 'GET',
            enctype: 'multipart/form-data',
            url:'/site/'+id,
            contentType: false,
            processData: false,
            success: function(data) {
              
                $('#site').val(data.sitename);
                $('#contact').val(data.contactperson);
                $('#number').val(data.sitenumber);
                $('#coodinated').val(data.coodinates);
                $('#mail').val(data.email);
                $('#addr').val(data.siteaddress);
                $('#linked').val(data.link);
                $('#noted').val(data.notes);
                
                // Add other fields you want to edit
            }
        });
    });
  });

  //update site

 $(document).on('submit','.updatesite', function(e){
    e.preventDefault();
    var formData = $(this).serialize();
    var id = $('#site_id').val();
    
    $.ajax({
        url: '/site/' + id,
        type: 'PUT',
        data: formData,
        success: function(data) {
            $('#editsite'). modal('hide');
            location.reload();
            
        },
        error: function(data) {
            // Do something on error
        }
    });
 });

//Get sims for deletion
$(document).ready(function(){
    $('.deletesite').click(function (e){
        e.preventDefault();
      
        var id = $(this).attr('site-del');       
        $.ajax({
            type: 'GET',
            enctype: 'multipart/form-data',
            url:'/site/'+id,
            contentType: false,
            processData: false,
            success: function(data) {

                console.log(data.id);
                $('#siteid').val(data.id);
                $('.sitenames').append(data.sitename);
                
                
                // Add other fields you want to edit
            }
        });
    });
  });
 //Delete site
 $(document).ready(function() {
    $('#delete-site').click(function(e) {
      e.preventDefault();
      var token = $("meta[name='csrf-token']").attr("content");
      var id = $('#siteid').val();
     
      $.ajax({
        type: "DELETE",
        url: '/deletesite/' + id,
        data: {
          "id": id,
          "_token": token,
        },
        success: function(response) {
            if (response.success) {
               
                $('#deletesiteModal'). modal('hide');
                location.reload();
                
              }
        },
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    });
  });
  





//Search

$(document).ready(function () {
    
    $('#searchsite').on('keyup', function() {

        var searchsite = $(this).val();
        

        $.ajax({
            type: "get",
            url: "/searchsite",
            dataType: "json",
            data: {searchsite: searchsite},
            
            success: function (response) {
                $('#sitestable tbody').empty();
               
                $.each(response, function (indexInArray, site) { 
                    $('#sitestable tbody').append('<tr><td>'+site.sitename+'</td>'
                    +'<td>'+site.siteaddress+'</td>'
                    +'<td><a href="mailto:' +site.email+'"><i class="fa fa-envelope" aria-hidden="true"></i></a></td>'
                   
                    
                    +'<td <a href="https://api.whatsapp.com/send?phone=27'+site.sitenumber+'"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>'
                    +'<a href="tel:+27>'+site.sitenumber+'"><i class="fa fa-phone" aria-hidden="true"></i></a> </td>'
                
                    +'<td> <a href="https://www.google.com/search?q='+site.coodinates+'"><i class="fa fa-map-marker" aria-hidden="true"></i></i></a></td>'
                    +'<td> <a href="'+site.link+'"><i class="fa fa-link" aria-hidden="true"></i></a></td>'
                    +'<td> <a href="#"  class="view" title="View" data-toggle="modal" data-target="#exampleModal" site-id="'+site.id+'"><i class="material-icons">&#xE417;</i></a>'
                    +'<a href="#" data-toggle="modal" data-target="#editsite" site-id="'+site.id+'" class="editsite" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'
                    +'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td></tr>');
                });
                
            }
        });
    });
});

//Logout
$(document).ready(function () {
    $('#logout-btn').click(function(e){
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: 'logout',
            type: 'post',
            data: { 
                    "_token":token,
                },     
            success:function(response){
                window.location.href='/login';
            }
        })
    })
});