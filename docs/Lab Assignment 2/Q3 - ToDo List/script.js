const taskInput = document.getElementById('taskInput');
const addButton = document.getElementById('addButton');
const taskList = document.getElementById('taskList');

// Loading existing data from localStorage
let tasks = JSON.parse(localStorage.getItem('myTasks')) || []; // either existing tasks, or return an empty array

// adding task func
function addTask() {
    const text = taskInput.value.trim();

    if (text === '') return; // no empty items allowed
    tasks.push({
        text: text,
        completed : false
    });

    taskInput.value = '';
    renderTasks();
}

// toggle task func
function toggleTask(index) {
    tasks[index].completed = !tasks[index].completed;
    renderTasks();
}

function deleteTask(index) {
    tasks.splice(index, 1);
    renderTasks();
}

addButton.onclick = addTask;

taskInput.onkeypress = (e) => {
    if (e.key === 'Enter') addTask();
}

function renderTasks() {
    taskList.innerHTML = ''; // clear existing things

    tasks.forEach((task, index)=> {
        const li = document.createElement('li');

        // Creation of Checkbox START
        const checkBox = document.createElement('input');
        checkBox.type = 'checkbox';
        checkBox.checked = task.completed;
        // Creation of Checkbox END

        checkBox.onclick = () => toggleTask(index); // toggle checkbox

        // create text container
        const taskText = document.createElement('span');
        taskText.textContent = task.text;
        if (task.completed) {
            taskText.className = 'completed';
        }

        // create of delete button
        const deleteButton = document.createElement('button')
        deleteButton.textContent = 'Delete';
        deleteButton.className = 'deleteButton';
        deleteButton.onclick = () => deleteTask(index);

        // every button in list
        li.appendChild(checkBox)
        li.appendChild(taskText)
        li.appendChild(deleteButton)

        // append li in ul
        taskList.appendChild(li);
        }
    );

    localStorage.setItem('myTasks', JSON.stringify(tasks));
};

renderTasks();