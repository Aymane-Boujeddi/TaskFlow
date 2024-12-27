document.addEventListener('DOMContentLoaded', function () {
    // Task Manager Class
    class TaskManager {
        constructor() {
            this.tasks = [
                {
                    id: 1,
                    title: "Implémenter l'authentification",
                    type: "feature",
                    status: "todo",
                    assignee: "John Doe",
                    description: "Mettre en place le système d'authentification"
                },
                {
                    id: 2,
                    title: "Corriger le bug d'affichage",
                    type: "bug",
                    status: "in_progress",
                    assignee: "Jane Smith",
                    description: "Résoudre le problème d'affichage sur mobile"
                },
                {
                    id: 3,
                    title: "Ajouter la pagination",
                    type: "task",
                    status: "done",
                    assignee: "Mike Johnson",
                    description: "Implémenter la pagination des résultats"
                }
            ];
            this.initializeApp();
        }

        initializeApp() {
            this.renderKanbanBoard();
            this.initializeModal();
            this.initializeEventListeners();
        }

        renderKanbanBoard() {
            const columns = [
                { status: 'todo', title: 'À faire' },
                { status: 'in_progress', title: 'En cours' },
                { status: 'done', title: 'Terminé' }
            ];

            const taskContainer = document.querySelector('.task-container');
            taskContainer.innerHTML = `
                <div class="kanban-board">
                    ${columns.map(column => this.renderColumn(column)).join('')}
                </div>
            `;

            this.renderTasks();
        }

        renderColumn({ status, title }) {
            const taskCount = this.tasks.filter(t => t.status === status).length;
            return `
                <div class="kanban-column">
                    <div class="column-header">
                        <span>${title}</span>
                        <span class="task-count">${taskCount}</span>
                    </div>
                    <div class="task-list" data-status="${status}"></div>
                </div>
            `;
        }

        renderTasks() {
            const taskLists = document.querySelectorAll('.task-list');

            taskLists.forEach(list => {
                const status = list.dataset.status;
                const filteredTasks = this.tasks.filter(task => task.status === status);

                list.innerHTML = filteredTasks.map(task => this.renderTaskCard(task)).join('');
            });

            this.addTaskEventListeners();
        }

        renderTaskCard(task) {
            return `
                <div class="task-item" data-task-id="${task.id}">
                    <div class="task-content">
                        <div class="task-header">
                            <div class="task-title">${task.title}</div>
                            <span class="task-type ${task.type}">${task.type}</span>
                        </div>
                        <div class="task-description">${task.description}</div>
                        <div class="task-meta">
                            ${this.renderStatusSelect(task)}
                            <span class="task-assignee">
                                <i class="fas fa-user"></i>
                                ${task.assignee}
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
            `;
        }

        renderStatusSelect(task) {
            const statuses = [
                { value: 'todo', label: 'À faire' },
                { value: 'in_progress', label: 'En cours' },
                { value: 'done', label: 'Terminé' }
            ];

            return `
                <select class="task-status-select ${task.status}" data-task-id="${task.id}">
                    ${statuses.map(status => `
                        <option value="${status.value}" ${task.status === status.value ? 'selected' : ''}>
                            ${status.label}
                        </option>
                    `).join('')}
                </select>
            `;
        }

        addTaskEventListeners() {
            // Status change listeners
            document.querySelectorAll('.task-status-select').forEach(select => {
                select.addEventListener('change', (e) => this.handleStatusChange(e));
            });

            // Edit button listeners
            document.querySelectorAll('.task-action.edit').forEach(button => {
                button.addEventListener('click', (e) => this.handleEditTask(e));
            });

            // Delete button listeners
            document.querySelectorAll('.task-action.delete').forEach(button => {
                button.addEventListener('click', (e) => this.handleDeleteTask(e));
            });
        }

        handleStatusChange(e) {
            const taskId = parseInt(e.target.dataset.taskId);
            const newStatus = e.target.value;

            e.target.className = `task-status-select ${newStatus}`;

            const task = this.tasks.find(t => t.id === taskId);
            if (task) {
                task.status = newStatus;
                const taskElement = e.target.closest('.task-item');
                taskElement.style.opacity = '0';

                setTimeout(() => {
                    this.renderKanbanBoard();
                }, 300);
            }
        }

        handleEditTask(e) {
            const taskId = parseInt(e.target.closest('.task-item').dataset.taskId);
            const task = this.tasks.find(t => t.id === taskId);
            if (task) {
                // Implement edit functionality
                console.log('Edit task:', task);
            }
        }

        handleDeleteTask(e) {
            const taskId = parseInt(e.target.closest('.task-item').dataset.taskId);
            if (confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')) {
                this.tasks = this.tasks.filter(t => t.id !== taskId);
                this.renderKanbanBoard();
            }
        }

        initializeModal() {
            const modal = document.getElementById('taskModal');
            const newTaskBtn = document.getElementById('newTaskBtn');
            const closeBtn = document.querySelector('.close-btn');
            const cancelBtn = document.getElementById('cancelBtn');
            const taskForm = document.getElementById('taskForm');

            newTaskBtn.addEventListener('click', () => modal.classList.add('active'));
            closeBtn.addEventListener('click', () => modal.classList.remove('active'));
            cancelBtn.addEventListener('click', () => modal.classList.remove('active'));

            taskForm.addEventListener('submit', (e) => this.handleNewTask(e));
        }

        handleNewTask(e) {
            e.preventDefault();

            const newTask = {
                id: this.tasks.length + 1,
                title: document.getElementById('taskTitle').value,
                type: document.getElementById('taskType').value,
                description: document.getElementById('taskDescription').value,
                status: 'todo',
                assignee: document.getElementById('taskAssignee').value
            };

            this.tasks.push(newTask);
            this.renderKanbanBoard();
            document.getElementById('taskModal').classList.remove('active');
            e.target.reset();
        }
    }

    // Initialize the application
    new TaskManager();
});