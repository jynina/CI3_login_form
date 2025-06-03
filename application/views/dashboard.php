<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <input type="hidden" id="url" value="<?php echo base_url();?>">
        <a class="navbar-brand" href="#">Dashboard</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
            </ul>
            <span>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal">Logout</button>
            </span>
        </div>
    </div>
</nav>
<div class="container my-5">
    <div class="text-end">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item" id="nav-tab-task">
            <a class="nav-link active" id="tab-tasks" style="cursor: pointer;">Tasks</a>
        </li>
        <li class="nav-item" id="nav-tab-archive">
            <a class="nav-link" id="tab-archive" style="cursor: pointer;">Archived</a>
        </li>
        <li class="nav-item" id="nav-tab-delete">
            <a class="nav-link" id="tab-delete" style="cursor: pointer;">Recently Deleted</a>
        </li>
    </ul>
    <div id="tbl-tasks">
<table id="table-tasks-current" class="datatable" class="display">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Status</th>
                <th>Task Start</th>
                <th>Task Due</th>
                <th>Task Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($rows as $row){
                if ($row -> task_status == 1 || $row -> task_status == 2 || $row -> task_status == 3)
                {
                    
            ?>
                <tr>
                    <td class="task-name" ><?= $row -> task_name?></td>
                    <td class="task-desc"><?= $row -> task_desc?></td>
                    <td class="task-status" value=<?= $row -> task_status?>><?= $row -> status_name?></td>
                    <td class="task-start"><?= $row -> task_start?></td>
                    <td class="task-due" ><?= $row -> task_due?></td>
                    <td class="task-notes" ><?= $row -> task_notes?></td>
                    <td class="text-center task-actions" >
                        <a id="btn-edit-task" class="btn btn-primary" value="<?= $row -> task_id?>" data-id=<?= $row -> task_id?> data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                        <button id="btn-delete-task" class="btn btn-danger my-2 btn-delete-task" value="<?= $row -> task_id?>" data-id=<?= $row -> task_id?> data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        <a id="btn-archive-task" class="btn btn-secondary" value="<?= $row -> task_id?>" data-id=<?= $row -> task_id?> data-bs-toggle="modal" data-bs-target="#archiveModal">Archive</a>
                        
                    </td>
                </tr>
                <?php
                }
                    }
                ?>
        </tbody>
    </table>
    </div>
    <div class="d-none" id="tbl-archived">
    <table id="table-tasks-archived" class="datatable">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Status</th>
                <th>Task Start</th>
                <th>Task Due</th>
                <th>Task Notes</th>
                <th>Archived At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row){
                if ($row -> task_status == 4)
                {
            ?>
                <tr style="text-align: left;">
                    <td class="text-start" value="<?= $row -> task_name?>"><?= $row -> task_name?></td>
                    <td class="text-start" value="<?= $row -> task_desc?>"><?= $row -> task_desc?></td>
                    <td value="<?= $row -> status_name?>"><?= $row -> status_name?></td>
                    <td value="<?= $row -> task_start?>"><?= $row -> task_start?></td>
                    <td value="<?= $row -> task_due?>"><?= $row -> task_due?></td>
                    <td value="<?= $row -> task_notes?>"><?= $row -> task_notes?></td>
                    <td value="<?= $row -> updated_at?>"><?= $row -> updated_at?></td>
                    <td class="text-center" id="task-actions">
                        <a id="btn-retrieve-task" class="btn btn-primary" data-id=<?= $row -> task_id?> data-bs-toggle="modal" data-bs-target="#retrieveModal">Retrieve</a>
                        <button id="btn-delete-task" class="btn btn-danger my-2 btn-delete-task" data-id=<?= $row -> task_id?> data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </td>
                </tr>
                <?php
                }
                    }
                ?>
        </tbody>
    </table>
    </div>
    <div class="d-none" id="tbl-deleted">
    <table id="table-tasks-deleted" class="datatable">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Status</th>
                <th>Task Start</th>
                <th>Task Due</th>
                <th>Task Notes</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row){
                if ($row -> task_status == 5)
                {
            ?>
                <tr>
                    <td value="<?= $row -> task_name?>"><?= $row -> task_name?></td>
                    <td value="<?= $row -> task_desc?>"><?= $row -> task_desc?></td>
                    <td value="<?= $row -> status_name?>"><?= $row -> status_name?></td>
                    <td value="<?= $row -> task_start?>"><?= $row -> task_start?></td>
                    <td value="<?= $row -> task_due?>"><?= $row -> task_due?></td>
                    <td value="<?= $row -> task_notes?>"><?= $row -> task_notes?></td>
                    <td value="<?= $row -> deleted_at?>"><?= $row -> deleted_at?></td>
                    <td class="text-center">
                        <a id="btn-retrieve-task" class="btn btn-primary" data-id=<?= $row -> task_id?> data-bs-toggle="modal" data-bs-target="#retrieveModal">Retrieve</a>
                    </td>
                </tr>
                <?php
                }
                    }
                ?>
        </tbody>
    </table>
    </div>
</div>
<!-- modals -->

<!-- logout -->
<div class="modal fade" id="confirmationModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel" color:black;>Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black;">Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <?= form_open('logout') ?>    
                    <button type="submit" class="btn btn-primary">Yes</button>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>

<!-- add -->
<div class="modal fade" id="addModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel" color:black;>Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url();?>add_task" method="POST" class="form-add-task" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="inputTaskName" name="task_name" class="form-control mb-3" placeholder="Task Name" required>
                        <textarea name="task_desc" id="inputTaskDesc" class="form-control mb-3" placeholder="Task Description" ></textarea>
                        <input type="text" id="inputTaskStart"name="task_start" class="form-control mb-3 datepicker" placeholder="Task Start" required>
                        <input type="text"  id="inputTaskDue" name="task_due" class="form-control mb-3 datepicker" placeholder="Task Due" required>
                        <input type="text" id="inputTaskNotes" name="task_notes" class="form-control mb-3 inputTaskNotes" placeholder="Task Notes">
                        <p class="fs-5">Files:</p>
                        <hr>
                        <div id="dZUpload" class="dropzone form-control-lg">
                        <div class="dz-default dz-message"> Drop files here... </div>
                    </div>
                    </div>
                     <div class="mt-2 text-end">
                    <input type="submit" name="add_task" value="Save" class="btn btn-primary btn-add-task">
                </div>
                </form>
               
            </div>
        </div>
    </div>
</div>

<!-- delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel" color:black;>Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black;">This task will be deleted</p>
            </div>
            <div class="modal-footer">
                <?= form_open('delete_task') ?>    
                    <button type="submit" class="btn btn-primary">OK</button>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>

<!-- edit -->
<div class="modal fade" id="editModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel" color:black;>Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url();?>update_task" method="POST" class="form-update-task">
                    <div class="form-group ">
                        <input type="text" id="rowId" name="rowId" class="form-control mb-3"  value="" hidden>
                        <input type="text" id="editTaskName" name="task_name" class="form-control mb-3" placeholder="Task Name">
                        <textarea name="task_desc" id="editTaskDesc" class="form-control mb-3" placeholder="Task Description"></textarea>
                        <input type="text" id="editTaskStatus" name="editTaskStatus" value="" hidden>

                        <select id="dropdown-status" class="dropdown-status form-control mb-3">
                            <option value="1">To Do</option>
                            <option value="2">In Progress</option>
                            <option value="3">Done</option>
                        </select>
                        <input type="text" id="editTaskStart"name="task_start" class="form-control mb-3 datepicker" placeholder="Task Start">
                        <input type="text"  id="editTaskDue" name="task_due" class="form-control mb-3 datepicker" placeholder="Task Due">
                        <textarea type="text" id="editTaskNotes" name="task_notes" class="form-control mb-3" placeholder="Task Notes"></textarea>
                    </div>
                    <div class="text-end">
                    <input type="submit" name="update_task" value="Save" class="btn btn-primary btn-update-task">
                    </div>
                </form>
            </div>
            <!-- logs -->

            <div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- archive -->
<div class="modal fade" id="archiveModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="archiveModalLabel" color:black;>Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black;">This task will be archived</p>
            </div>
            <div class="modal-footer">  
                <?= form_open('archive_task') ?>   
                <input type="hidden" id="archive-id">
                <button type="submit" class="btn btn-primary">OK</button>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>

<!-- retrieve -->
<div class="modal fade" id="retrieveModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="retrieveModalLabel" color:black;>Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black;">This task will be retrieved</p>
            </div>
            <div class="modal-footer">
                <?= form_open('retrieve_task') ?>    
                    <button type="submit" class="btn btn-primary">OK</button>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>