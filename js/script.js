const { createApp } = Vue;

createApp({
    data() {
        return {
            myAPI: 'server.php',
            newTask: '',
            list: '',
            errorMessage: ''
        }
    },
    methods: {
        addTask() {
            if(this.newTask.trim() != '' && this.newTask != '') {
                const obj = {
                    item: this.newTask.trim()
                }
    
                axios.post(this.myAPI, obj, 
                    {headers: {'Content-Type': 'multipart/form-data'}
                }).then((response) => {
                    this.list = response.data.data;
                })
    
                this.newTask = '';
                this.errorMessage = ''
            }
            else {
                this.newTask = '';
                this.errorMessage = 'Non puoi inserire una stringa vuota'
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
        },
        removeTask(value) {
            const obj = {
                removeIndex: value
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