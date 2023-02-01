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
            }

            axios.post(this.myAPI, {obj}).then((response) => {
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