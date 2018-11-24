<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">My Task</div>

                    <div class="card-body">
                       
                       <!-- .input-group>input.form-control+span.input-group-btn>button.btn.btn-success -->
                        <div class="input-group">
                           <input type="text" class="form-control" 
                                v-model="inputTask.name"
                                @keydown.enter="createTask">
                           &nbsp;
                           <span class="input-group-btn">
                               <button type="button" class="btn btn-success" @click="createTask">Add</button>
                            </span>
                        </div>

                        <div class="task-list">
                            <div class="alert alert-danger" v-if="!tasks.length">
                                You have no tasks!
                            </div>

                            <!-- ul.list-unstyled>li*3>.checkbox>label -->
                            <ul class="list-unstyled">
                                <li v-for="tk in tasks" :key="tk.id" :class="{ done: tk.completed }">
                                    <div class="row">
                                        <div class="checkbox col">
                                            <label>
                                                <input type="checkbox" v-model="tk.completed" @click="doneTask(tk)"> 
                                                {{ tk.name }} 
                                            </label>
                                        </div>

                                        <div class="col" style="text-align: right;">
                                            <a href="#" @click.prevent="deleteTask(tk)">X</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                       
                    </div>
                    <div class="p-3" v-if="tasks.length">
                        <span class="badge badge-info">Have {{ tasks.length }} tasks</span>
                        <span class="badge badge-warning">{{ remainingTask() }} tasks left</span>
                        <span class="badge badge-success">{{ completedTask() }} tasks completed</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchDataTask()
        },
        data(){
            return {
                tasks: [],
                inputTask: {
                    name: ''
                }
            }
        }, 
        methods: {
            //filter()
            remainingTask() {
                return this.tasks.filter(
                            task => { return !task.completed }
                        ).length
            },
            completedTask() {
                return this.tasks.filter(
                            task => { return task.completed }
                        ).length
            },

            // CRUD
            fetchDataTask() {
                //Get
                axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data //Get Set value data for tasks
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            createTask() {
                //Add
                axios.post('/api/tasks', this.inputTask)
                    .then((res) => {
                        this.tasks.unshift(res.data)   //unshift() value data for tasks
                        this.inputTask.name = ''
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            doneTask(tk) {
                //Update //field completed in table tasks
                axios.put(`/api/tasks/${tk.id}`, {completed: !tk.completed} )
                    .then((res) => {
                        console.log('Task update')
                        console.log(res)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            deleteTask(tk) {
                //Delete
                axios.delete(`/api/tasks/${tk.id}`)
                    .then((res) => {
                        const taskIndex = this.tasks.indexOf(tk)  //
                        //console.log(this.tasks) array data 0,1,2,3 etc
                        //console.log(taskIndex)

                        this.tasks.splice(taskIndex, 1)  //This make the line gone 
                        //splice() method adds/removes items to/from an array, and returns the removed item(s).
                        
                        console.log('Delete')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>

<style>
    body, .task-list{
        padding-top: 20px;
    }
    .done label {
        text-decoration: line-through;
    }
</style>