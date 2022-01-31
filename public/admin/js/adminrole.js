$(document).ready(function() {
    $("#usersupdates").click(function() {
    $("#UpdateData").toggle();
    });
});

// $("#admin-table").on('click', 'td', function (){
//     $("#hideform").toggle();
// });


$(document).ready(function(){ 
   var table = $('#admin-table').DataTable({
        ajax: "admindata",
        columns: [ 
            {
                data: 'name',
                name: 'name' 
            },
            {
                data: 'email',
                name: 'email'
            },
            
        ]
    });
 
    $('#AdminBack').click(function (e) { 
        e.preventDefault()
        $('#editAdmin').animate({ width: "100%" });
        $("#admineditform").hide(); 
        $('#userroleForm').hide();
        $('#admineditform').hide();
        
        $('#imgInp').val("");
        // $('#blah').ajaxForm({target: '.preview'}).submit();
    });
     
   
    $("#admin-table").on('click', 'td', function (stay){  
        var data =  table.row( this ).data();
        console.log(data);    
        jQuery.ajax({
            url:"editAdmin",
            type: "get",
            data: data,
            success:function(response){   
                console.log(response); 
                $('#editAdmin').animate({ width: "55%" });
                
                $(".UpdateAdminData").show();
                $('#userroleForm').show();
                if( $.each(response.data, function( index, value ) {  
                    $("#userid").val(value.id);
                    $("#username").val(value.name);
                    $("#adminemail").val(value.email);
                    $("#img").html('<img src="http://127.0.0.1:8000/admin/img/'+value.image+'"width="50px" height="40px" id="blah">');
                    
                }));    
            } 
        });
        stay.preventDefault(); 
    });





    // =-=-=-=-=-=-=-=-=-=-=-=-=-= [ For Image ] =-=-=-=-=-=-=-=-=--=-=-=-=
    // $('#image').change(function(){
    //     let reader = new FileReader();
    //     reader.onload = (e) => { 
    //         $('#image_preview_container').attr('src', e.target.result); 
    //     }
    //     reader.readAsDataURL(this.files[0]); 
    // });

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          blah.src = URL.createObjectURL(file)
        }
      }

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-[ Update Admin Data ] =-=-======-==--=-=-=-=-= 
    $('.UpdateAdminData').submit(function(e) {   
        e.preventDefault();      
        var formData = new FormData(this);
        var adminname = $('#username').val();  
        var adminnames = $("#username").val().length; 
        var adminEmail = $('#adminemail').val();
        var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(adminname == ""){ 
            $("#adminName").text("Enter User Name ");
        }
        if( adminname == "" || adminEmail =="" || !adminEmail.match(regExp)  )
        { 
            var adminname = $("#username").val();
            var emails = $("#adminemail").val();
            if(adminname == ""){ 
                $("#adminName").text("Enter User Name ");
            }
            var emails = $("#adminemail").val().length;
            if (emails == 0) { 
                $('#adminEmail').text('Enter Email ');
            }  
            
            $("#username").keydown(function (event) {
                var adminname = $("#username").val().length;
                if (adminname < 2) {
                    $("#adminName").text("Enter Minumum 3 charactor ");
              
                }else if (adminname > 2) {
                    $("#adminName").text(" ");
                }
            });  
            $('input').keyup(function () {
                var email = $("#adminemail").val();
                var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (!email.match(regExp)) {
                    $('#adminEmail').text('Invalid Email');
                }
                else if (email != "" && email.match(regExp)) {
                    $('#adminEmail').text(''); 
                }
            }); 
            if(adminnames < 4){
                $("#adminName").text("Enter User Name ");
                return false;
            }if(adminnames > 2){
                 $("#adminName").text("");
             }
        }
        else{
            $.ajax({
                type:'post',
                url: "updateAdmin",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function (response) {     
                console.log(response.value);    
                   if( $.each(response.data, function( index, value ) {  
                        $("#admineditform").hide(); 
                        $("#userroleForm").hide();
                        $("#data-table").show();
                        $('#editAdmin').animate({ width: "100%" });
                        // $("#adminname").text(value.name);
                        // $('#adminemail').text(value.email); 
                        $("#imgInp").val("");
                        $('#admin-table').DataTable().ajax.reload();
                        toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.success("Update  Data");
                    })); 
                  else{
                        toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error(" Fill Image Type ");
                  }   
                      
                },
              });   
          }    
    }); 

    //  ==-----------------= [End Doccument] =------------------=
});       

 