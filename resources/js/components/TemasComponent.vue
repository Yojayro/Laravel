<template>
    <div class="row justify-content-center form-group">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <input v-if="editMode" type="text" class="form-control form-control-sm" v-model="tema.titulo">
                <b v-else>{{tema.titulo}}</b>

                </div>
                <div class="card-body">
                    <ul>
                        <li><b>Descripcion:</b>
                            <textarea v-if="editMode" class="form-control form-control-sm" v-model="tema.descripcion" rows="1"></textarea>
                            <p v-else>{{tema.descripcion}}</p>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Fecha de Inicio: </b>
                                    <input v-if="editMode" type="date" class="form-control form-control-sm" v-model="tema.fecha">
                                     <p v-else>{{tema.fecha}}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>Asesor:</b>
                                    <input v-if="editMode" type="text" class="form-control form-control-sm" v-model="tema.asesor">
                                     <p v-else>{{tema.asesor}}</p>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="row" v-if="editMode">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-sm btn-outline-primary" v-on:click="onUpdateSave()"> Guardar</button>
                            <button type="button" class="btn btn-sm btn-outline-dark" v-on:click="onCancel()"> Cancelar</button>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-sm btn-outline-dark" v-on:click="onUpdate()"> Actualizar</button>
                            <button type="button" class="btn btn-sm btn-outline-danger" v-on:click="onDelete()"> Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['tema'],
        data() {
            return {
                editMode: false
            }
        },
        mounted() {
            console.log('list.', this.tema)
        },
        methods: {
            onUpdate() {
                this.editMode = true;
            },
            onDelete() {
                axios.delete(`/tema/${this.tema.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onUpdateSave() {
                const params = {
                    titulo: this.tema.titulo,
                    descripcion: this.tema.descripcion,
                    fecha: this.tema.fecha,
                    asesor: this.tema.asesor,
                };
                axios.put(`/tema/${this.tema.id}`, params).then(response => {
                    this.editMode = false;
                    const tema = response.data;
                    this.$emit('update', tema);
                });

            },
            onCancel() {
               this.editMode = false;
            },
        }
    }
</script>
