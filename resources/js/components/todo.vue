<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#Sl</th>
                                <th>Task Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(task,index) in getallTask" :key="task.id">
                                <td>{{ index+1 }}</td>
                                <td>{{ task.title}}</td>
                                
                                <td>
                                    <a href="" @click.prevent="doneTask(task.id)" class="btn btn-warning"><i class="fas fa-check"></i></a>
                                    <a href="" @click.prevent="deleteTask(task.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        
                        <!-- form start -->
                        <form role="form" @submit.prevent="addTask()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Task Name</label>
                                    <input v-model="form.title" type="text" name="title"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                            </div>
                            <!-- /.card-body -->
        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "todo",
        data() {
            return {
                form: new Form({
                    title: ''
                })
            }
        },
        
        mounted()
        {
            this.$store.dispatch("allTask");
        },
    
        computed: {
            getallTask()
            {
                return this.$store.getters.getTask;
            }
        },
        
        methods:{
            addTask(){
                this.form.post('/add-task')
                    .then((response)=>{
                        
                        Toast.fire({
                            type: 'success',
                            title: 'Task Added successfully'
                        })
                        location.reload();
                    })
                    .catch(()=>{
                    })
            },
            
            deleteTask(id)
            {
                //console.log(id);
                axios.get('/delete_task/'+id)
                    .then(()=>{
                        this.$store.dispatch("allTask");
                        Toast.fire({
                            type: 'success',
                            title: 'Task Delete successfully'
                        })
                    })
                    .catch(()=>{
            
                    });
            },
            
            doneTask(id)
            {
                //console.log(id);
                axios.get('/done_task/'+id)
                    .then(()=>{
                        this.$store.dispatch("allTask");
                        Toast.fire({
                            type: 'success',
                            title: 'Task Done successfully'
                        })
                    })
                    .catch(()=>{
            
                    });
            }
        }
    }
</script>

<style scoped>

</style>