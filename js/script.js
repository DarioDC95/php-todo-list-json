const { createApp } = Vue;

createApp({
    data() {
        return {
            myAPI: 'server.php',
            newTask: '',
            list: ''
        }
    },
    methods: {
        addTask() {
            if(this.newTask != '') {
                const obj = {
                    item: this.newTask
                }
    
                axios.post(this.myAPI, obj, 
                    {headers: {'Content-Type': 'multipart/form-data'}
                }).then((response) => {
                    this.list = response.data.data;
                })
    
                this.newTask = ''
            }
        },
        DoneTask(value) {
            const obj = {
                index: value
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