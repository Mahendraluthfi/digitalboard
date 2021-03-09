<script>  

$(document).ready(function(){   
        view_request();
        view_ongoing();
        view_running();
        view_npi();
        view_location();
        view_smv();

    function view_location() {
        var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
        $.ajax({
        url : "<?php echo site_url('index.php/project/table_location')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr class='text-center'>"+
                    "<td width='1%'>"+no+++"</td>"+
                    "<td>"+data[i].location+"</td>"+                   
                    "<td>"+
                    '<button type="button" class="btn btn-success btn-sm editlokasi" data="'+data[i].id+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm hapuslokasi" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#table-location').html(html);    
            $('#tb').DataTable();                                
            // console.log(data.length);      
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $('#table-location').on('click','.editlokasi', function(){
        $('#editlokasi').removeAttr('style');
        $('#tambahlokasi').attr('style','display:none;');
        $('.titlelokasi').text('Edit Location');
        var idlokasi = $(this).attr('data');
        $.ajax({
        url : "<?php echo site_url('index.php/project/getlokasi/')?>"+idlokasi,
        type: "GET",
        dataType: "JSON",
        success: function(data){            
            $('[name="lokasiedit"]').val(data.location);
            $('[name="idlokasi"]').val(data.id);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    });

    $('#table-location').on('click','.hapuslokasi', function(){        
        var idlokasi = $(this).attr('data');
        var x = confirm('Are you sure ?');
        if (x == 1) {            
            $.ajax({
            url : "<?php echo site_url('index.php/project/hapuslokasi/')?>"+idlokasi,
            type: "GET",
            dataType: "JSON",
            success: function(data){            
                view_location();
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
                }
            });
        }
    });


    $('.savelokasi').on('click', function(){
        $.ajax({
            url : '<?php echo base_url('project/tambahlokasi') ?>',
            type: "POST",
            data: $('#tambahlokasi').serialize(),            
            dataType: "JSON",
            success: function(data)
            {               
                view_location();                
                $('#tambahlokasi')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $('.editlokasi').on('click', function(){
        $.ajax({
            url : '<?php echo base_url('project/editlokasi') ?>',
            type: "POST",
            data: $('#editlokasi').serialize(),            
            dataType: "JSON",
            success: function(data)
            {               
                // console.log(data);
                view_location();                
                $('#tambahlokasi').removeAttr('style');
                $('#editlokasi').attr('style','display:none;');
                $('.titlelokasi').text('Add Location');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $('.bataledit').on('click', function(){
        $('#tambahlokasi').removeAttr('style');
        $('#editlokasi').attr('style','display:none;');
        $('.titlelokasi').text('Add Location');
    });

    $('.data-lokasi').on('click',function(){     
        $('#modal-data-location').modal('show');
    })

    function list_location(id) {
        $.ajax({
        url : "<?php echo site_url('index.php/project/get_location/')?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr>"+
                    
                    "<td>"+data[i].location+"</td>"+                                        
                    "<td width='1%'>"+                    
                    '<button type="button" class="btn btn-danger btn-sm del-loc" data="'+data[i].idhave+'" data-idrun="'+data[i].id_running+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#list-location').html(html);  
            // console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });

        $.ajax({
        url : "<?php echo site_url('index.php/project/get_remaining_loc/')?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<option value='"+data[i].id+"'>"+data[i].location+"</option>";                                                        
            }
            $('.sel-location').html(html);  
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $(".add-location").click(function(){ 
        $.ajax({
            url : '<?php echo base_url('project/add_location') ?>',
            type: "POST",
            data: $('#frm-location').serialize(),            
            dataType: "JSON",
            success: function(data)
            {               
                list_location(data);
                view_running();
                // $('#frm-location')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });

    });

    function view_request() {
        $.ajax({
        url : "<?php echo site_url('index.php/project/get_request')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr class='text-center'>"+
                    "<td>"+no+++"</td>"+
                    "<td>"+data[i].projectname+"</td>"+
                    "<td>"+data[i].department+"</td>"+
                    "<td>"+data[i].category+"</td>"+
                    "<td>"+data[i].remarks+"</td>"+                        
                    "<td>"+data[i].total+"</td>"+                        
                    "<td>"+
                    '<button type="button" class="btn btn-success btn-sm edit-request" data="'+data[i].id_request+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-primary btn-sm score-request" data="'+data[i].id_request+'"><i class="icon fa fa-star"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm del-request" data="'+data[i].id_request+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#show_request').html(html);                     
            // console.log(data.length);      
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $(".add-request").click(function(){        
            // alert('ok');
            $.ajax({
                url : '<?php echo base_url('project/add_request') ?>',
                type: "POST",
                data: $('#frm_request').serialize(),            
                dataType: "JSON",
                success: function(data)
                {               
                    view_request();
                    $('.textarea').summernote('reset');
                    $('#frm_request')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        });

    $(".edit-request-save").click(function(){        
            // alert('ok');
            $.ajax({
                url : '<?php echo base_url('project/edit_request') ?>',
                type: "POST",
                data: $('#frm_request_edit').serialize(),            
                dataType: "JSON",
                success: function(data)
                {               
                    view_request();
                    $('.textarea').summernote('reset');
                    $('#modal-request').modal('hide');                    
                    // $('#frm_request')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        });

    $('#show_request').on('click','.score-request',function(){
        var id = $(this).attr('data');           
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/project/get_score')?>",
            dataType : "JSON",
            data : {id: id},
            success: function(data){
                $('[name="id_score"]').val(id);
                $('[name="projectname_score"]').val(data.projectname);
                $('[name="safety"]').val(data.safety);
                $('[name="quality"]').val(data.quality);
                $('[name="delivery"]').val(data.delivery);
                $('[name="cost"]').val(data.cost);
                $('[name="morale"]').val(data.morale);
                $('[name="roi"]').val(data.roi);
                $('[name="delivery_time"]').val(data.delivery_time);
                $('[name="urgency"]').val(data.urgency);
                $('[name="safety"]').trigger('change');
                $('[name="quality"]').trigger('change');
                $('[name="delivery"]').trigger('change');
                $('[name="cost"]').trigger('change');
                $('[name="morale"]').trigger('change');
                $('[name="roi"]').trigger('change');
                $('[name="delivery_time"]').trigger('change');
                $('[name="urgency"]').trigger('change');
                $('#modal-score').modal('show');
                // view_request();
            }
        });                                          
    });    

    $('#show_request').on('click','.del-request',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/project/del_request')?>",
            dataType : "JSON",
            data : {id: id},
            success: function(data){                        
                view_request();
            }
        });                                          
    });

    $('#show_request').on('click','.edit-request',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            url : "<?php echo site_url('index.php/project/get_request_id')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_request"]').val(id);
                $('[name="projectname_request"]').val(data.projectname);
                $('[name="department_request"]').val(data.department);
                $('[name="category_request"]').val(data.category);
                $('[name="category_request"]').trigger('change');
                $('[name="remarks_request"]').summernote("code", data.remarks);
                $('#modal-request').modal('show');
            }
        });                                          
    });

    function view_ongoing() {
        $.ajax({
        url : "<?php echo site_url('index.php/project/get_ongoing')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr class='text-center'>"+
                    "<td>"+no+++"</td>"+
                    "<td>"+data[i].projectname+"</td>"+
                    "<td>"+data[i].champion+"</td>"+
                    "<td>"+data[i].finishdate+"</td>"+
                    "<td>"+data[i].remarks+"</td>"+                        
                    "<td>"+
                    '<button type="button" class="btn btn-success btn-sm edit-ongoing" data="'+data[i].id+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm del-ongoing" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#show_ongoing').html(html);                     
            // console.log(data.length);      
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $(".add-ongoing").click(function(){        
            // alert('ok');
            $.ajax({
                url : '<?php echo base_url('project/add_ongoing') ?>',
                type: "POST",
                data: $('#frm_ongoing').serialize(),            
                dataType: "JSON",
                success: function(data)
                {               
                    view_ongoing();
                    $('.txt-ongoing').summernote('reset');
                    $('#frm_ongoing')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        });

    $(".edit-ongoing-save").click(function(){        
            // alert('ok');
            var projectname_ongoing = $('[name="projectname_ongoing"]').val();
            var champion_ongoing = $('[name="champion_ongoing"]').val();
            var finishdate_ongoing = $('[name="finishdate_ongoing"]').val();
            var remarks_ongoing = $('[name="remarks_ongoing"]').val();
            var id_ongoing = $('[name="id_ongoing"]').val();
            $.ajax({
                url : '<?php echo base_url('project/edit_ongoing') ?>',
                type: "POST",
                data: {projectname_ongoing: projectname_ongoing, champion_ongoing:champion_ongoing, finishdate_ongoing: finishdate_ongoing, remarks_ongoing:remarks_ongoing, id_ongoing:id_ongoing},            
                dataType: "JSON",
                success: function(data)
                {               
                    view_ongoing();
                    $('.textarea').summernote('reset');
                    $('#modal-ongoing').modal('hide');                    
                    // $('#frm_ongoing')[0].reset();
                    // console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
            // console.log(projectname_ongoing);
        });

    $('#show_ongoing').on('click','.del-ongoing',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/project/del_ongoing')?>",
            dataType : "JSON",
            data : {id: id},
            success: function(data){                        
                view_ongoing();
            }
        });                                          
    });

    $('#show_ongoing').on('click','.edit-ongoing',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            url : "<?php echo site_url('index.php/project/get_ongoing_id')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_ongoing"]').val(id);
                $('[name="projectname_ongoing"]').val(data.projectname);
                $('[name="champion_ongoing"]').val(data.champion);
                $('[name="finishdate_ongoing"]').val(data.finishdate);                
                $('[name="remarks_ongoing"]').summernote("code", data.remarks);
                $('#modal-ongoing').modal('show');
            }
        });                                          
    });


    function view_running() {
        $.ajax({
        url : "<?php echo site_url('index.php/project/get_running')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr class='text-center'>"+
                    "<td>"+no+++"</td>"+
                    "<td>"+data[i].projectname+"</td>"+
                    "<td>"+data[i].total_loc+"</td>"+
                    "<td>";
                for(var location of data[i].location){   
                        html += '<badge class="badge badge-success">'+location.location+'</badge>&nbsp;' 
                    }
                html +=  "</td>"+
                    "<td>"+data[i].remarks+"</td>"+                        
                    "<td>"+
                    '<button type="button" class="btn btn-primary btn-sm loc-running" data="'+data[i].id+'" data-prname="'+data[i].projectname+'"><i class="icon fa fa-map-marker-alt"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-warning text-white btn-sm check-running" data="'+data[i].id+'" data-prname="'+data[i].projectname+'"><i class="icon fa fa-clipboard-check"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-success btn-sm edit-running" data="'+data[i].id+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm del-running" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#show_running').html(html);                     
            // console.log(data);      
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $(".add-running").click(function(){        
            
            $.ajax({
                url : '<?php echo base_url('project/add_running') ?>',
                type: "POST",
                data: $('#frm_running').serialize(),            
                dataType: "JSON",
                success: function(data)
                {               
                    view_running();
                    $('.txt-running').summernote('reset');
                    $('#frm_running')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        });

    $(".edit-running-save").click(function(){        
            // alert('ok');
            var projectname_running = $('[name="projectname_running"]').val();
            var units_running = $('[name="units_running"]').val();
            var locations_running = $('[name="locations_running"]').val();
            var remarks_running = $('[name="remarks_running"]').val();
            var id_running = $('[name="id_running"]').val();
            $.ajax({
                url : '<?php echo base_url('project/edit_running') ?>',
                type: "POST",
                data: {projectname_running: projectname_running, units_running:units_running, locations_running: locations_running, remarks_running:remarks_running, id_running:id_running},            
                dataType: "JSON",
                success: function(data)
                {               
                    view_running();
                    $('.textarea').summernote('reset');
                    $('#modal-running').modal('hide');                    
                    // $('#frm_running')[0].reset();
                    // console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
            // console.log(projectname_running);
        });

    $('#show_running').on('click','.del-running',function(){
        var id = $(this).attr('data');                        
        var x = confirm('Are you sure ?');
        if (x == 1) {
          $.ajax({
              type : "POST",
              url  : "<?php echo base_url('index.php/project/del_running')?>",
              dataType : "JSON",
              data : {id: id},
              success: function(data){                        
                  view_running();
              }
          });                                                    
        }
    });

    $('#show_running').on('click','.check-running',function(){
        var id = $(this).attr('data');                        
        var prname = $(this).attr('data-prname');  
        $('[name="id_search"]').val(id);                              
        $('.prname').text(prname+' Checklist');
        $('#list-search-check').html('');
        $('#modal-running-check').modal('show');                                          
    });

    $('#show_running').on('click','.edit-running',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            url : "<?php echo site_url('index.php/project/get_running_id')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_running"]').val(id);
                $('[name="projectname_running"]').val(data.projectname);
                $('[name="units_running"]').val(data.units);
                $('[name="locations_running"]').val(data.locations);                
                $('[name="remarks_running"]').summernote("code", data.remarks);
                $('#modal-running').modal('show');
            }
        });                                          
    });


    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day, month].join('-');
    }


    $('#show_running').on('click','.loc-running',function(){
        var id = $(this).attr('data');                       
        var prname = $(this).attr('data-prname');                       
        list_location(id);
        $('[name="id_running"]').val(id);
        $('.prname').text('Location '+prname);
        $('#modal-running-location').modal('show');        
    });

    $('#list-location').on('click','.del-loc',function(){
        var id = $(this).attr('data');                        
        var id_running = $(this).attr('data-idrun');                        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/project/del_location')?>",
            dataType : "JSON",
            data : {id: id},
            success: function(data){                        
                list_location(id_running);
                view_running();                
            }
        });                                          
    });

    $('#list-location').on('click','.edit-loc',function(){
        var id = $(this).attr('data');                        
        var id_running = $(this).attr('data-idrun');                        
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('index.php/project/get_location_id/')?>"+id,
            dataType : "JSON",
            // data : {id: id},
            success: function(data){
                $('[name="location_edit"]').val(data.location);
                $('[name="id_loc_edit"]').val(data.id);
                $('[name="id_running_edit"]').val(id_running);
                $('#modal-info').modal('show');
            }
        });                                          
    });

    $(".edit-location").click(function(){ 
        $.ajax({
            url : '<?php echo base_url('project/edit_location') ?>',
            type: "POST",
            data: $('#frm-location-edit').serialize(),            
            dataType: "JSON",
            success: function(data)
            {               
                list_location(data);
                view_running();
                // $('#frm-location')[0].reset();
                $('#modal-info').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
        // console.log("Tes");
    });
    

    $(".btn-search-check").click(function(){ 
        $.ajax({
            url : '<?php echo base_url('check/get_check_history') ?>',
            type: "POST",
            data: $('#frm-search').serialize(),            
            dataType: "JSON",
            success: function(data)
            {               
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){                      
                    if(data[i].cb == 1){
                        var cb = '<i class="fa fa-check"></i>';
                    }else{
                        var cb = '';
                    }

                    html += "<tr class='text-center'>"+
                        
                        "<td>"+cb+"</td>"+                    
                        "<td>"+data[i].location+"</td>"+  
                        "<td>"+formatDate(data[i].date)+"</td>"+ 
                        "<td>"+data[i].reason+"</td>"+                                            
                        "</tr>";                                       
                }
                $('#list-search-check').html(html); 
                $('#frm-search')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });

    });


    function view_npi() {
        $.ajax({
        url : "<?php echo site_url('index.php/project/get_npi')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr class='text-center'>"+
                    "<td>"+no+++"</td>"+
                    "<td>"+data[i].product+"</td>"+
                    "<td>"+data[i].style+"</td>"+
                    "<td>"+data[i].pdra+"</td>"+
                    "<td>"+data[i].provo+"</td>"+                        
                    "<td>"+data[i].integration+"</td>"+                        
                    "<td>"+data[i].pp+"</td>"+                        
                    "<td>"+data[i].pilot+"</td>"+                        
                    "<td>"+data[i].psd+"</td>"+                        
                    "<td>"+data[i].remarks+"</td>"+                        
                    "<td>"+
                    '<button type="button" class="btn btn-success btn-sm edit-npi" data="'+data[i].id+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm del-npi" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#show_npi').html(html);                     
            // console.log(data.length);      
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $(".add-npi").click(function(){        
            // alert('ok');
            $.ajax({
                url : '<?php echo base_url('project/add_npi') ?>',
                type: "POST",
                data: $('#frm_npi').serialize(),            
                dataType: "JSON",
                success: function(data)
                {               
                    view_npi();
                    $('#frm_npi')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        });

    $(".edit-npi-save").click(function(){        
            // alert('ok');
            var product_npi = $('[name="product_npi"]').val();
            var style_npi = $('[name="style_npi"]').val();
            var pdra_npi = $('[name="pdra_npi"]').val();
            var provo_npi = $('[name="provo_npi"]').val();
            var pp_npi = $('[name="pp_npi"]').val();
            var integration_npi = $('[name="integration_npi"]').val();
            var pilot_npi = $('[name="pilot_npi"]').val();
            var psd_npi = $('[name="psd_npi"]').val();
            var remarks_npi = $('[name="remarks_npi"]').val();
            var id_npi = $('[name="id_npi"]').val();
            $.ajax({
                url : '<?php echo base_url('project/edit_npi') ?>',
                type: "POST",
                data: {
                        product_npi: product_npi, 
                        style_npi:style_npi, 
                        pdra_npi: pdra_npi, 
                        provo_npi:provo_npi, 
                        integration_npi:integration_npi, 
                        pilot_npi:pilot_npi, 
                        pp_npi:pp_npi, 
                        psd_npi:psd_npi, 
                        remarks_npi:remarks_npi, 
                        id_npi:id_npi
                    },            
                dataType: "JSON",
                success: function(data)
                {               
                    view_npi();
                    // $('.textarea').summernote('reset');
                    $('#modal-npi').modal('hide');                    
                    // $('#frm_npi')[0].reset();
                    // console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
            // console.log(projectname_npi);
        });

    $('#show_npi').on('click','.del-npi',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/project/del_npi')?>",
            dataType : "JSON",
            data : {id: id},
            success: function(data){                        
                view_npi();
            }
        });                                          
    });

    $('#show_npi').on('click','.edit-npi',function(){
        var id = $(this).attr('data');                        
        $.ajax({
            url : "<?php echo site_url('index.php/project/get_npi_id')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_npi"]').val(id);
                $('[name="product_npi"]').val(data.product);
                $('[name="style_npi"]').val(data.style);
                $('[name="pdra_npi"]').val(data.pdra);                
                $('[name="provo_npi"]').val(data.provo);                                
                $('[name="integration_npi"]').val(data.integration);                                
                $('[name="pp_npi"]').val(data.pp);                                
                $('[name="pilot_npi"]').val(data.pilot);                                
                $('[name="psd_npi"]').val(data.psd);                                
                $('#modal-npi').modal('show');
            }
        });                                          
    });
    
    var save_method;
    var gid;

    function view_smv() {
        $.ajax({
        url : "<?php echo site_url('index.php/project/get_smv')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var html = '';
            var i;
            var no = 1;
            for(i=0; i<data.length; i++){   
                html += "<tr class='text-center'>"+
                    "<td>"+no+++"</td>"+
                    "<td>"+data[i].styleno+"</td>"+
                    "<td>"+data[i].smv_prev+"</td>"+
                    "<td>"+data[i].smv_reduc+"</td>"+
                    "<td>"+data[i].smv_final+"</td>"+                        
                    "<td>"+data[i].percentage+" %</td>"+                        
                    "<td>"+data[i].customer+"</td>"+                        
                    "<td>"+data[i].psd+"</td>"+                        
                    "<td>"+data[i].running+"</td>"+                        
                    "<td>"+data[i].improvement+"</td>"+                        
                    "<td>"+
                    '<button type="button" class="btn btn-success btn-sm edit-smv" data="'+data[i].id+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm del-smv" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#show_smv').html(html);                     
            // console.log(data.length);      
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });
    }

    $('.add-smv').on('click',function(){
        $('#modal-smv').modal('show');
        $('.modal-title-smv').text('Add New SMV Reduction');
        save_method = 'add';
        // console.log(save_method);
    })

    $('.smv-save').on('click',function(){
          var url;      
          // var x = document.forms["form"]["kodejenis"].value;
          if(save_method == 'add'){
              url = "<?php echo site_url('index.php/project/save_smv')?>";          
          }else{          
              url = "<?php echo site_url('index.php/project/edit_smv/')?>" + gid;         
          }    

          // console.log(save_method);
           // ajax adding data to database
              $.ajax({
                url : url,
                type: "POST",
                data: $('#frm_smvreduction').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    $('#frm_smvreduction')[0].reset(); // reset form on modals

                   view_smv();
                   $('#modal-smv').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
    })

    $('#show_smv').on('click','.edit-smv',function(){
          save_method = 'update';
          // console.log(save_method);
          gid = $(this).attr('data');
          $('.modal-title-smv').text('Edit SMV Reduction');

          $('#frm_smvreduction')[0].reset(); // reset form on modals
          //Ajax Load data from ajax
          $.ajax({
            url : "<?php echo site_url('index.php/project/get_smv_id')?>/" + gid,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {            
                $('[name="styleno"]').val(data.styleno);                            
                $('[name="smv_prev"]').val(data.smv_prev);                            
                $('[name="smv_reduc"]').val(data.smv_reduc);                            
                $('[name="customer"]').val(data.customer);                            
                $('[name="psd"]').val(data.psd);                            
                $('[name="running"]').val(data.running);                            
                $('[name="improvement"]').val(data.improvement);                            
                $('#modal-smv').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    })

     $('#show_smv').on('click','.del-smv',function(){
        // view_smv();
        var id = $(this).attr('data');
        $.ajax({
            url : "<?php echo site_url('index.php/project/del_smv/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                view_smv();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
        // console.log(id);
     });



});





</script>
