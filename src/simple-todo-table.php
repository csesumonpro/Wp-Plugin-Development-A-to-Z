<h2>Todo List</h2>
<table class="table">
	<thead>
	<tr>
		<th scope="col">ID</th>
		<th scope="col">Title</th>
		<th scope="col">Description</th>
		<th scope="col">Shortcode</th>
		<th scope="col">Action</th>
	</tr>
	</thead>
	<tbody>
    <?php
        foreach ($todos as $todo) {
            ?>
	<tr>
		<th scope="row"><?php esc_html_e($todo->id); ?></th>
		<td><?php esc_html_e($todo->title); ?></td>
		<td><?php esc_html_e($todo->description); ?></td>
		<td>[simple_todo id="<?php esc_attr_e($todo->id); ?>"]</td>
		<td>
            <a href="#" class="btn btn-primary">Edit</a>
            <a href="<?php echo admin_url('admin.php?page=simple-todo&action=delete&id='. esc_html($todo->id));?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger">Delete</a>
        </td>
	</tr>
    <?php } ?>
	</tbody>
</table>
