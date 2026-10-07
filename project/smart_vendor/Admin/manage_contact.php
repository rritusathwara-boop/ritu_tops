<?php
include_once('header.php');
?>
    

        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Contacts List</h2>
                <p class="text-sm text-slate-500 mt-1">Manage and view all contacts on the platform.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
									<th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($contact_arr as $data)
							{
							?>
								<tr>
                                    <td><?php echo $data->id;?></td>
                                    <td><?php echo $data->name;?></td>
                                    <td class="fw-bold"><?php echo $data->email;?></td>
                                    <td><?php echo $data->message;?></td>
                                    <td>
									    <a href="delete?del_contact=<?php echo $data->id;?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
							<?php
							}
							?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
