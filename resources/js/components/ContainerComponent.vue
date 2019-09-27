<template>
    <div class="container">
        <form-component @new="addThema"></form-component>
        <hr>
        <temas-component v-for="(tema, index) in temas"
                         :key="tema.id"
                         :tema="tema"
                         @update="updateThema(index, ...arguments)"
                         @delete="deleteThema(index)">
        </temas-component>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                temas: []
            }
        },
        mounted() {
            this.listThema();
        },
        methods: {
           listThema() {
                axios.get('/tema').then(response => {
                    this.temas = response.data.data;
                });
           },
            addThema(theme) {
                this.temas = theme.data;
            },
            updateThema(index, thema) {
                this.temas[index] = thema;
            },
            deleteThema(index) {
                this.temas.splice(index, 1);
            }
        }
    }
</script>

