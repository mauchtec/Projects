$(document).ready(function(){

    //Edit sim card
    $(document).on('click', '.editsim-btn', function(e){
        e.preventDefault();
       
        var id = $(this).attr('data-id');
        var imageName;
        $.ajax({
            type: 'GET',
            enctype: 'multipart/form-data',
            url:'/simedit/'+id,
            contentType: false,
            processData: false,
            success: function(data) {
                
                console.log(data.sim);
                
                imageName = data.sim.image;
                //console.log(data);
                $('#image-container').html('<img src="storage/images/' + imageName + '">');
                $('#simserial').val(data.sim.Serial);
                $('#id').val(data.sim.id);
                //$('#edit-modal').modal('show');
                $('#sites').val(data.sites.sitename);
                $.each(data.sites, function (indexInArray, site) {
                    $('#sitenames').append('<option value="' +site.sitename+'">' +site.sitename+'</option>');
                    
                   
                    console.log(site.sitename);
                });
                
                // Add other fields you want to edit
            }
        });


        
    });

//Update simcard details

    $(document).on('submit','.updatesim', function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        var id = $('#id').val();
       
        
        $.ajax({
            url: '/simupdate/' + id,
            type: 'PUT',
            data: formData,
            success: function(data) {
                $('#EditSimcard'). modal('hide');
                location.reload();
                
            },
            error: function(data) {
                // Do something on error
            }
        });
     });
//view sims
     $(document).ready(function(){
        $(document).on('click', '.viewsim-btn', function(e){
            e.preventDefault();
                     
            var id = $(this).attr('data-id');
    
            $.ajax({
                type: 'GET',
                enctype: 'multipart/form-data',
                url:'/simedit/'+id,
                contentType: false,
                processData: false,
                success: function(data) {
                    
                    $('#image-contain').html('<img src="storage/images/' + data.sim.image + '">');
                    $('#simser').append('<b>Serial:</b> '+data.sim.Serial);
                    $('#purposed').append('<b>Purpose:</b>'+data.sim.Purpose);
                    $('#site').append('<b>Site-Name:</b>'+data.sim.sitename);
                    
                   
                    
                    // Add other fields you want to edit
                }
            });
            $('#site').text("");
          $('#simser').text("");
          $('#purposed').text("");
        });
      });
    


      //Get users sims

      $("#flexSwitchCheckDefault").change(function() {
        if ($(this).is(":checked")) {
            //ON
            console.log("on");



            var id = $(this).attr('user-id');
       
        $.ajax({
            type: 'GET',
            enctype: 'multipart/form-data',
            url:'/usersim/'+id,
            contentType: false,
            processData: false,
            success: function(data) {
                
                console.log(data);
                $('#simstable tbody').empty();
               
                $.each(data, function (indexInArray, sim) { 
                    $('#simstable tbody').append('<tr><td>'+sim.Serial+'</td>'
                    +'<td>'+sim.sitename+'</td>'
                    +'<td>'+sim.Purpose+'</td>'
                    +'<td>'+sim.active+'</td>'
                    +'<td><a href="#" data-toggle="modal" data-target="#ViewSim"  data-id="'+sim.id+'"class="viewsim-btn"><i class="material-icons">&#xE417;</i></a>'
                    +'<a href="#" data-toggle="modal" data-target="#EditSimcard" data-id="'+sim.id+'" class="editsim-btn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'
                    +'<a href="#" data-toggle="modal" data-target="#deletesim"   data-id="'+sim.id+'" class="edit-btn"><i class="material-icons" style="color:red">&#xE872;</i></a></td>'); 
                });
            }
        });
          } else {
            //OFF
            location.reload();
          }
      });
    
    

      //Delete site
 $(document).ready(function () {
    $('.deletesim').click(function (e) { 
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).attr('sim-id');
        $.ajax({
            type: "DELETE",
            url: '/deletesim/'+id,   
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

  });