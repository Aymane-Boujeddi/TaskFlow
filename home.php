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
                        <a href="#"><i class="fas fa-list-check"></i> Mes Tâches</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-bug"></i> Bugs</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-star"></i> Features</a>
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
                <div class="kanban-board">
                    <div class="kanban-column">
                        <div class="column-header">
                            <span>À faire</span>
                            <span class="task-count">5</span>
                        </div>
                        <div class="task-list" data-status="todo">
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Implémenter l'authentification</div>
                                        <span class="task-type feature">Feature</span>
                                    </div>
                                    <div class="task-description">
                                        Mettre en place le système d'authentification des utilisateurs
                                    </div>
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

                    <div class="kanban-column">
                        <div class="column-header">
                            <span>En cours</span>
                            <span class="task-count">3</span>
                        </div>
                        <div class="task-list" data-status="in_progress">
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Corriger le bug d'affichage</div>
                                        <span class="task-type bug">Bug</span>
                                    </div>
                                    <div class="task-description">
                                        Résoudre le problème d'affichage sur mobile
                                    </div>
                                    <div class="task-meta">
                                        <select class="task-status-select in_progress">
                                            <option value="todo">À faire</option>
                                            <option value="in_progress" selected>En cours</option>
                                            <option value="done">Terminé</option>
                                        </select>
                                        <span class="task-assignee">
                                            <i class="fas fa-user"></i>
                                            Jane Smith
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

                    <div class="kanban-column">
                        <div class="column-header">
                            <span>Terminé</span>
                            <span class="task-count">2</span>
                        </div>
                        <div class="task-list" data-status="done">
                            <div class="task-item">
                                <div class="task-content">
                                    <div class="task-header">
                                        <div class="task-title">Ajouter la pagination</div>
                                        <span class="task-type task">Task</span>
                                    </div>
                                    <div class="task-description">
                                        Implémenter la pagination des résultats
                                    </div>
                                    <div class="task-meta">
                                        <select class="task-status-select done">
                                            <option value="todo">À faire</option>
                                            <option value="in_progress">En cours</option>
                                            <option value="done" selected>Terminé</option>
                                        </select>
                                        <span class="task-assignee">
                                            <i class="fas fa-user"></i>
                                            Mike Johnson
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
        </main>
    </div>


    <div class="modal" id="taskModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Nouvelle Tâche</h3>
                <button class="close-btn">&times;</button>
            </div>
            <form id="taskForm" class="task-form">
                <div class="form-group">
                    <label for="taskTitle">Titre</label>
                    <input type="text" id="taskTitle" required>
                </div>
                <div class="form-group">
                    <label for="taskType">Type</label>
                    <select id="taskType" required>
                        <option value="task">Tâche Simple</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Description</label>
                    <textarea id="taskDescription" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="taskAssignee">Assigné à</label>
                    <select id="taskAssignee">
                        <option value="">Sélectionner un utilisateur</option>
                        <option value="user1">John Doe</option>
                        <option value="user2">Jane Smith</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <div class="kanban-column">
        <div class="column-header">
            <span></span>
            <span class="task-count"></span>
        </div>
        <div class="task-list" data-status="${status}"></div>
    </div>
    <script src="main2.js"></script>
</body>

</html>