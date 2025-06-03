
Dropzone.autoDiscover = false;

$(document).ready(function(){
    var base_url = $("#url").val();
    var sizeofArr = js_tasks.length;
    
    function helper_upload(url, data) {
        $.post(base_url + url, data, function(data, status) {
            console.log("Data: " + data + "\nStatus: " + status);
            });
    }

    let myDropzone = new Dropzone("div#dZUpload", {
        url: "hn_SimpeFileUploader.ashx",
        addRemoveLinks: true,
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });

    let table = new DataTable('.datatable');


    $( function() {
        $( ".datepicker" ).datepicker();
    });

    
    for(i=0; i < sizeofArr; i++){
        var table_content_string = 
        `<tr>
            <td class="task-name">${js_tasks.task_name}</td>
            <td class="task-desc">${js_tasks.task_desc}</td>
            <td class="task-status>${js_tasks.status_name}</td>
            <td class="task-start>${js_tasks.task_start}</td>
            <td class="task-due">${js_tasks.task_due}</td>
            <td class="task-notes">${js_tasks.task_notes}</td>
            <td class="text-center task-actions">
                <a id="btn-edit-task" class="btn btn-primary" data-id=<?= $row -> id?> data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <button id="btn-delete-task" class="btn btn-danger my-2 btn-delete-task" data-id=<?= $row -> id?> data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                <a id="btn-archive-task" class="btn btn-secondary" data-id=<?= $row -> id?> data-bs-toggle="modal" data-bs-target="#archiveModal">Archive</a>
            </td>
        </tr>`;

        if (js_tasks.task_status == '1' || js_tasks.task_status == '2' || js_tasks.task_status == '3'){
            $("#table-tasks-current tbody").append(table_content_string);
        }
        else if (js_tasks.task_status == '4'){
            $("#table-tasks-archived tbody").append(table_content_string);
        }
        else if (js_tasks.task_status == '5'){
            $("#table-tasks-deleted tbody").append(table_content_string);
        }

    }                 
  
    $(document).on('click', '.p-viewer', function(){
        console.log('btn pressed')
        $(".inputPassword").attr("type", "password");
        $(".inputRPassword").attr("type", "password");
        $("i").removeClass("fa-eye");
        $("i").addClass("fa-eye-slash"); 
    });

    $('.btn-back').click(function(){
        var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
        location.replace(base_url);
    });

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        let input = $("#inputPassword");
        input.attr("type", input.attr("type") === "password" ? "text" : "password");
    });
  
    $(".toggle-repeat-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    let input = $("#inputRPassword");
    input.attr("type", input.attr("type") === "password" ? "text" : "password");
    });

    $(document).on('click', '#nav-tab-task', function()
    {
        console.log("Tasks");
          $('#tbl-archived').addClass('d-none');
          $('#tbl-deleted').addClass('d-none');
          $('#tbl-tasks').removeClass('d-none');
          $('#tab-tasks').addClass('active');
          $('#tab-delete').removeClass('active');
          $('#tab-archive').removeClass('active');

    });

    $(document).on('click', '#nav-tab-archive', function()
    {
        console.log("archive");
          $('#tbl-archived').removeClass('d-none');
          $('#tbl-deleted').addClass('d-none');
          $('#tbl-tasks').addClass('d-none');
          $('#tab-archive').addClass('active');
          $('#tab-delete').removeClass('active');
          $('#tab-tasks').removeClass('active');
    });

    $(document).on('click', '#nav-tab-delete', function()
      {
        console.log("archive");
          $('#tbl-archived').addClass('d-none');
          $('#tbl-deleted').removeClass('d-none');
          $('#tbl-tasks').addClass('d-none');
          $('#tab-delete').addClass('active');
          $('#tab-archive').removeClass('active');
          $('#tab-tasks').removeClass('active');

    });

    $(document).on('click', '#btn-delete-task', function(){
        let task_id = $(this).attr('data-id');
        console.log(task_id);
        helper_upload('delete_task', {id: task_id});
    });

    $(document).on('click', '#btn-archive-task', function(){
        let task_id = $(this).attr('data-id');
        console.log(task_id);
        helper_upload('archive_task', {id: task_id});
  
    })

    $(document).on('click', '#btn-edit-task', function(){
        let task_id = $(this).attr('data-id');
        $("#rowId").val(task_id);
        var temp_row = $(this).closest('tr');
        console.log(temp_row);

        if(temp_row.find('td:eq(2)').text() == "To Do")
        {
            $('#dropdown-status').val("1");
        }
        
        if(temp_row.find('td:eq(2)').text() == "In Progress")
        {
            $('#dropdown-status').val("2");
        }
      
        if (temp_row.find('td:eq(2)').text() == "Done")
        {
            $('#dropdown-status').val("3");
        }

        $('#editTaskName').val(temp_row.find('td:eq(0)').text());
        $('#editTaskDesc').val(temp_row.find('td:eq(1)').text());
        $('#editTaskStart').val(temp_row.find('td:eq(3)').text());
        $('#editTaskDue').val(temp_row.find('td:eq(4)').text());
        $('#editTaskNotes').val(temp_row.find('td:eq(5)').text());
        $('#editTaskStatus').val($('#dropdown-status').val());

        $(document).on('click', '.dropdown-status', function(){
            $('#editTaskStatus').val($('#dropdown-status').val());
        })

        $('.form-update-task').submit(function(){
            var formData = 
            {
                rowId: $('#rowId').val(),
                task_name: $('#editTaskName').val(),
                task_desc: $('#editTaskDesc').val(),
                task_start: $('#editTaskStart').val(),
                editTaskStatus: $('#editTaskStatus').val(),
                task_due: $('#editTaskDue').val(),
                task_notes: $('#editTaskNotes').val()
            }
            
            helper_upload('update_task', formData);
        }); 
    });
    });

    $(".form-add-task").submit(function(){

        var formData = new FormData();

        formData.append("task_name", $('#inputTaskName').val());
        formData.append("task_desc", $('#inputTaskDesc').val());
        formData.append("task_start", $('#inputTaskStart').val());
        formData.append("task_due", $('#inputTaskDue').val());
        formData.append("task_notes",$('#inputTaskNotes').val())

        $.each(myDropzone.files, function(i, files){
            formData.append("task_files[]", files)
        })

        var quilltext = quill.getText();
        var quillhtml = quill.root.innerHTML;

        helper_upload('add_task', formData);
    })


        
        


