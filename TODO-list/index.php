<?php 
	
	$errors = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'todo');

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
			$task=$_POST['task'];
		if (empty($task)) {
			$errors = "You must fill in the task";
		}else{
			
			$task = $_POST['task'];
			$priority = $_POST['priority'];
			$query = "INSERT INTO tasks (task) VALUES ('$task')";
			$sql = "INSERT INTO tasks (task,priority) VALUES ('$task','$priority')";
			mysqli_query($db,$sql);
			
			
			header('location: index.php');
		}
	}	

	// delete task
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
		header('location: index.php');
	}

	// select all tasks if page is visited or refreshed
	$tasks = mysqli_query($db, "SELECT * FROM tasks");

?>
<!DOCTYPE html>
<html>

<head>
	<title>ToDo List Application PHP and MySQL database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">TO-DO LIST</h2>
	</div>


	<form method="post" action="index.php" class="input_form">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<input type="text" name="task" class="task_input" placeholder="Task...">
	
		<select name="priority" class="priority_input">
    <option value="Low">Low</option>
    <option value="Medium">Medium</option>
    <option value="High">High</option>
        </select>
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
		<button type="submit" name="submit1" id="add_btn" class="add_btn" onclick="page()"><a  href="homepage.html"  target="_blank" >Home</a></button>
		
		
</form>


	<table>
		<thead>
			<tr>
				<th>N</th>
				<th style="width: 560px;">Tasks</th>
				<th style="width: 200px">Priority</th>
				<th>Delete</th>
				
			</tr>
		</thead>

		<tbody id ="table">
			<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr >
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="priority"> <?php echo $row['priority']; ?> </td>
					<td class="delete"> 
						<a href="index.php?del_task=<?php echo $row['id'] ?>"><button type="submit" id="del_btn" name="submit">Delete</button> </a>
						

					</td>
				</tr>
			<?php $i++; } ?>	
		</tbody>
	</table>

</body>
</html>