export default {
    state: {
        task: [],
    },
    getters: {
        getTask(state){
            return state.task;
        }
    },
    actions: {
        allTask(context){
            axios.get('/show-task')
                .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('tasks',response.data.tasks);
                });
        }
    },
    mutations: {
        tasks(state,data){
            return state.task = data;
        }
    }
}