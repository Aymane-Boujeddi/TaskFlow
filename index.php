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
                    <li class="active">
                        <a href="#"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-users"></i> Utilisateurs</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
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

                ?>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Tâches</h3>
                        <p>24</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon bug">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Bugs</h3>
                        <p>7</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon feature">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Features</h3>
                        <p>12</p>
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
                <?php

                $tasks = new Task("", "", "", "");
                $allTasks = $tasks->showTask();

                ?>
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
                        <div class="task-list" data-status="todo">
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Implémenter l'authentification</div>
                                        <span class="task-type task">feature</span>
                                    </div>
                                    <div class="task-description">Mettre en place le système d'authentification</div>
                                    <div class="task-meta">
                                        <select class="task-status-select todo">
                                            <option value="todo" selected>À faire</option>
                                            <option value="in_progress">En cours</option>
                                            <option value="done">Terminé</option>
                                        </select>
                                        <span class="task-assignee">
                                            <i class="fas fa-user"></i>
                                            John Doe
                                        </span>
                                    </div>
                                </div>
                                <div class="task-actions">
                                    <button class="task-action edit" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="task-action delete" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
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
                        <div class="task-list" data-status="in_progress">
                            <!-- Similar task-item structure for in-progress tasks -->
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Implémenter l'authentification</div>
                                        <span class="task-type feature">feature</span>
                                    </div>
                                    <div class="task-description">Mettre en place le système d'authentification</div>
                                    <div class="task-meta">
                                        <select class="task-status-select todo">
                                            <option value="todo" selected>À faire</option>
                                            <option value="in_progress">En cours</option>
                                            <option value="done">Terminé</option>
                                        </select>
                                        <span class="task-assignee">
                                            <i class="fas fa-user"></i>
                                            John Doe
                                        </span>
                                    </div>
                                </div>
                                <div class="task-actions">
                                    <button class="task-action edit" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="task-action delete" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Implémenter l'authentification</div>
                                        <span class="task-type feature">feature</span>
                                    </div>
                                    <div class="task-description">Mettre en place le système d'authentification</div>
                                    <div class="task-meta">
                                        <select class="task-status-select todo">
                                            <option value="todo" selected>À faire</option>
                                            <option value="in_progress">En cours</option>
                                            <option value="done">Terminé</option>
                                        </select>
                                        <span class="task-assignee">
                                            <i class="fas fa-user"></i>
                                            John Doe
                                        </span>
                                    </div>
                                </div>
                                <div class="task-actions">
                                    <button class="task-action edit" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="task-action delete" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
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
                        <div class="task-list" data-status="done">
                            <!-- Similar task-item structure for done tasks -->
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Implémenter l'authentification</div>
                                        <span class="task-type bug">bug</span>
                                    </div>
                                    <div class="task-description">Mettre en place le système d'authentification</div>
                                    <div class="task-meta">
                                        <select class="task-status-select todo">
                                            <option value="todo" selected>À faire</option>
                                            <option value="in_progress">En cours</option>
                                            <option value="done">Terminé</option>
                                        </select>
                                        <span class="task-assignee">
                                            <i class="fas fa-user"></i>
                                            John Doe
                                        </span>
                                    </div>
                                </div>
                                <div class="task-actions">
                                    <button class="task-action edit" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="task-action delete" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="users-container">
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
        </main>
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

    <!-- <script src="main.js"></script> -->
    <script>
        const modal = document.getElementById('taskModal');
        const newTaskBtn = document.getElementById('newTaskBtn');
        const closeBtn = document.querySelector('.close-btn');
        const cancelBtn = document.getElementById('cancelBtn');
        const taskForm = document.getElementById('taskForm');

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
    </script>

</body>

</html>