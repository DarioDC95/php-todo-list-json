const { createApp } = Vue;

createApp({
    data() {
        return {
            myAPI: 'server.php',
            list: ''
        }
    },
    methods: {
        addTask() {
            
        }
    },
    mounted() {
        axios.post(this.myAPI).then((response) => {
            this.list = response.data.data;
        })
    },
}).mount('#app')