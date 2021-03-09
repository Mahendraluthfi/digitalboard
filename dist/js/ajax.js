(function ($) {
 
  'use strict'

  
    $(document).ready(function(){   
        view_request();
        view_ongoing();
        view_running();
        view_npi();

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
                    "<td>"+
                    '<button type="button" class="btn btn-success btn-sm edit-request" data="'+data[i].id+'"><i class="icon fa fa-edit"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-danger btn-sm del-request" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
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
                    "<td>"+data[i].units+"</td>"+
                    "<td>";
                for(var location of data[i].location){   
                        html += '<badge class="badge badge-success">'+location.location+'</badge>&nbsp;' 
                    }
                html +=  "</td>"+
                    "<td>"+data[i].remarks+"</td>"+                        
                    "<td>"+
                    '<button type="button" class="btn btn-primary btn-sm loc-running" data="'+data[i].id+'" data-prname="'+data[i].projectname+'"><i class="icon fa fa-map-marker-alt"></i></button>&nbsp;' +
                    '<button type="button" class="btn btn-warning text-white btn-sm check-running" data="'+data[i].id+'"><i class="icon fa fa-clipboard-check"></i></button>&nbsp;' +
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
            // alert('ok');
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
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/project/del_running')?>",
            dataType : "JSON",
            data : {id: id},
            success: function(data){                        
                view_running();
            }
        });                                          
    });


    $('#show_running').on('click','.check-running',function(){
        // var id = $(this).attr('data');                        
        // $.ajax({
        //     type : "POST",
        //     url  : "<?php echo base_url('index.php/project/del_running')?>",
        //     dataType : "JSON",
        //     data : {id: id},
        //     success: function(data){                        
        //         view_running();
        //     }
        // });
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
                    '<button type="button" class="btn btn-danger btn-sm del-loc" data="'+data[i].id+'" data-idrun="'+data[i].id_running+'"><i class="icon fa fa-trash"></i></button>' +
                    "</td></tr>";                                       
            }
            $('#list-location').html(html);    
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
                $('#frm-location')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });

    });


    $('#show_running').on('click','.loc-running',function(){
        var id = $(this).attr('data');                       
        var prname = $(this).attr('data-prname');                       
        list_location(id);
        $('[name="id_loc"]').val(id);
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




    });



})