const { createApp } = Vue;

createApp({
    data() {
        return {
            myAPI: 'server.php',
            newTask: '',
            list: []
        }
    },
    methods: {
        addTask() {
            let obj = {
                item: this.newTask,
                done: false
            }

            axios.post(this.myAPI, obj, 
                {headers: {'Content-Type': 'multipart/form-data'}
            }).then((response) => {
                this.list = response.data.data;
            })
        }
    },
    mounted() {
        axios.post(this.myAPI).then((response) => {
            this.list = response.data.data;
        })
    },
}).mount('#app')