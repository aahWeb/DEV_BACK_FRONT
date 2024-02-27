function createTaskList() {
    const tasks = [];
  
    return {
      addTask: function(task) {
        tasks.push(task);
      },
      getTasks: function() {
        return tasks;
      }
    };
  }
  
  const taskList = createTaskList();
  taskList.addTask('Faire les courses');
  taskList.addTask('Répondre aux emails');
  console.log(taskList.getTasks()); // Résultat: ['Faire les courses', 'Répondre aux emails']