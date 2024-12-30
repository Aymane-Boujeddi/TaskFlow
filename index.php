<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>TaskFlow</h1>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="main-nav-btn active">
                        <a onclick="showContainer('.main-content')"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="users-nav-btn">
                        <a onclick="showContainer('.users')"><i class="fas fa-users"></i> Utilisateurs</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content cont">
            <header class="content-header">
                <div class="header-left">
                    <h2>Tableau de bord</h2>
                </div>
                <div class="header-right">
                    <button class="btn-primary" id="newTaskBtn">
                        <i class="fas fa-plus"></i> Nouvelle Tâche
                    </button>
                </div>
            </header>

            <div class="stats-container">
                <?php
                require_once "Classes/Connect";
                require_once "Classes/Task";
                require_once "Classes/Render";
                $tasks = new Task("", "", "", "");
                $allTasks = $tasks->showTask();
                $taskcount = $tasks->tasksCount('basic');
                $bugsCount = $tasks->tasksCount('bug');
                $featCount = $tasks->tasksCount('feature');
                ?>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Tâches</h3>
                        <p><?php  echo $taskcount ;?></p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon bug">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Bugs</h3>
                        <p><?php echo $bugsCount;?></p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon feature">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Features</h3>
                        <p><?php echo $featCount;?></p>
                    </div>
                </div>
            </div>

            <!-- Task List -->
            <!-- <div class="task-container">
                <div class="task-header">
                    <h3>Tâches Récentes</h3>
                    <div class="task-filters">
                        <button class="filter-btn active">Toutes</button>
                        <button class="filter-btn">En cours</button>
                        <button class="filter-btn">Terminées</button>
                    </div>
                </div>
                <div class="task-list">

                </div>
            </div> -->
            <div class="task-container">
                
                <div class="kanban-board">
                    <div class="kanban-column">
                        <div class="column-header">
                            <span>À faire</span>
                            <span class="task-count"></span>
                        </div>
                        <?php
                        foreach ($allTasks as $task) {
                            if ($task["task_status"] === "to-do") {
                                echo Render::RenderTask($task);
                            }
                        }
                        ?>
                       
                    </div>
                    <!-- En cours (In Progress) Column -->
                    <div class="kanban-column">
                        <div class="column-header">
                            <span>En cours</span>
                            <span class="task-count"></span>
                        </div>
                        <?php
                        foreach ($allTasks as $task) {
                            if ($task["task_status"] === "pending") {
                                echo Render::RenderTask($task);
                            }
                        }
                        ?>
                        
                    </div>

                    <!-- Terminé (Done) Column -->
                    <div class="kanban-column">
                        <div class="column-header">
                            <span>Terminé</span>
                            <span class="task-count"></span>
                        </div>
                        <?php
                        foreach ($allTasks as $task) {
                            if ($task["task_status"] === "done") {
                                echo Render::RenderTask($task);
                            }
                        }
                        ?>
                        
                    </div>
                </div>
            </div>

            
        </main>
        <section class="users cont"  style="display: none;">
        <div class="users-container ">
                <div class="section-header">
                    <h3>Utilisateurs et leurs tâches</h3>
                </div>
                <div class="users-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Tâches en cours</th>
                                <th>Tâches terminées</th>
                                <th>Total des tâches</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tasks = new Task("", "", "", "");
                            $users = $tasks->getUsersWithTaskCount();

                            foreach ($users as $user) {
                                echo "<tr>
                                        <td>{$user['user_name']}</td>
                                        <td>{$user['pending_tasks']}</td>
                                        <td>{$user['completed_tasks']}</td>
                                        <td>{$user['total_tasks']}</td>
                                      </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    <div class="modal" id="taskModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Nouvelle Tâche</h3>
                <button class="close-btn">&times;</button>
            </div>
            <form id="taskForm" class="task-form" action="./includes/addTask.inc.php" method="POST">
                <div class="form-group">
                    <label for="taskTitle">Titre</label>
                    <input type="text" id="taskTitle" name="taskTitle" required>
                </div>
                <div class="form-group">
                    <label for="taskType">Type</label>
                    <select id="taskType" name="taskType" required>
                        <option value="basic">Task</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Description</label>
                    <textarea id="taskDescription" name="taskDescription" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="taskAssignee">Assigné à</label>
                    <input type="text" name="taskAssignee">
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn-primary" name="submit">Créer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('taskModal');
        const newTaskBtn = document.getElementById('newTaskBtn');
        const closeBtn = document.querySelector('.close-btn');
        const cancelBtn = document.getElementById('cancelBtn');
        const taskForm = document.getElementById('taskForm');
        const containers = document.querySelectorAll('.cont');

                        
        newTaskBtn.addEventListener('click', () => {
            modal.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.remove('active');
            taskForm.reset();
        });
        function showContainer(selector){
            const mainBtn = document.querySelector('.main-nav-btn')
            const usersBtn = document.querySelector('.users-nav-btn')
            containers.forEach(container =>{container.style.display = 'none'})
            document.querySelector(selector).style.display = 'block'
            if(selector == '.main-content'){
                usersBtn.classList.remove('active')
                mainBtn.classList.add('active')
            }else{
                mainBtn.classList.remove('active')
                usersBtn.classList.add('active')
            }
        }
    </script>

</body>

</html>