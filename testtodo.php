<?php
// Include the database connection file
require 'dbcon.php'; // Assuming your file is named `db_connection.php`

// Add Task
if (isset($_POST['add'])) {
    $task = htmlspecialchars($_POST['task']);
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $sql = "INSERT INTO tasks (task_name, due_date, priority) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $task, $due_date, $priority);
    $stmt->execute();
    header("Location: testtodo.php");
}

// Mark as Done
if (isset($_GET['done'])) {
    $id = $_GET['done'];
    $sql = "UPDATE tasks SET is_done = 1 WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: testtodo.php");
}

// Delete Task
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: testtodo.php");
}

// Fetch Tasks
$sql = "SELECT * FROM tasks ORDER BY due_date ASC";
$result = $con->query($sql);
$tasks = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

// Get Priority Class
function getPriorityClass($priority) {
    return match ($priority) {
        'High' => 'badge bg-danger text-white',
        'Medium' => 'badge bg-warning text-dark',
        'Low' => 'badge bg-success text-white',
        default => '',
    };
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .todo-container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .todo-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .todo-header h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #007bff;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .todo-header h1 i {
            margin-right: 10px;
        }

        .todo-form {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .todo-form input {
            flex-grow: 1;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .todo-form button {
            border-radius: 50px;
            padding: 10px 20px;
        }

        .todo-list {
            margin-top: 30px;
        }

        .todo-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .todo-item:hover {
            background-color: #f1f1f1;
        }

        .todo-item.completed {
            background-color: #e9f7e9;
        }

        .todo-item.completed span {
            text-decoration: line-through;
            color: #28a745;
        }

        .todo-item .task-priority {
            font-size: 0.9rem;
            border-radius: 50px;
            padding: 5px 10px;
        }

        .priority-high {
            background-color: #dc3545;
            color: white;
        }

        .priority-medium {
            background-color: #ffc107;
            color: white;
        }

        .priority-low {
            background-color: #28a745;
            color: white;
        }

        .todo-item .task-date {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .todo-item .task-btns a {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="todo-container">
        <!-- Header -->
        <div class="todo-header">
            <h1><i class="fas fa-check-square"></i> My Todo-s</h1>
            <div class="filters">
                <select class="form-select form-select-sm" id="filter">
                    <option value="all">All</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
        </div>

        <!-- Add Task Form -->
        <form class="todo-form" action="testtodo.php" method="POST">
            <input type="text" name="task" placeholder="Add new .." required>
            <input type="date" name="due_date" required>
            <select name="priority" class="form-select">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
            <button type="submit" name="add" class="btn btn-primary">Add</button>
        </form>

        <!-- Task List -->
        <div class="todo-list">
            <!-- Loop through tasks here -->
            <?php foreach ($tasks as $task): ?>
                <div class="todo-item <?php echo $task['is_done'] ? 'completed' : ''; ?>">
                    <div class="task-info">
                        <span><?php echo $task['task_name']; ?></span>
                        <span class="task-date"><i class="fas fa-calendar-alt"></i> <?php echo $task['due_date']; ?></span>
                    </div>
                    <div class="task-btns">
                        <span class="task-priority <?php echo getPriorityClass($task['priority']); ?>">
                            <?php echo $task['priority']; ?>
                        </span>
                        <?php if (!$task['is_done']): ?>
                            <a href="testtodo.php?done=<?php echo $task['id']; ?>" class="btn btn-success btn-sm">Done</a>
                        <?php endif; ?>
                        <a href="testtodo.php?delete=<?php echo $task['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
