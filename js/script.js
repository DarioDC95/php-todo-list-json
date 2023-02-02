const { createApp } = Vue;

createApp({
    data() {
        return {
            myAPI: 'server.php',
            newTask: '',
            list: '',
            errorMessage: '',
            editItem: '',
            errorEdit: ''
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
        },
        openEdit(value) {
            let string = this.list[value].item;
            if(this.list[value].item == string && this.list[value].item != false) {
                axios.post(this.myAPI).then((response) => {
                    this.list = response.data.data;
                    this.list[value].item = false;
                })
            }
            else {
                axios.post(this.myAPI).then((response) => {
                    this.list = response.data.data;
                })
                this.editItem = '';
            }
            this.errorEdit = '';
        },
        editTask(value, string) {
            if(this.editItem.trim() != '' && this.editItem != '') {
                const obj = {
                    editIndex: value,
                    editItem: string.trim()
                }
    
                axios.post(this.myAPI, {edit: JSON.stringify(obj)}, 
                    {headers: {'Content-Type': 'multipart/form-data'}
                }).then((response) => {
                    this.list = response.data.data;
                    this.editItem = '';
                    this.errorEdit = '';
                })
            }
            else {
                this.editItem = '';
                this.errorEdit = 'Non puoi inserire una stringa vuota'
            }
        }
    },
    mounted() {
        axios.post(this.myAPI).then((response) => {
            this.list = response.data.data;
        })
    },
}).mount('#app')