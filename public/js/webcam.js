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

  });