<template>

    <div class="container">
        
        <!-- {{ personas }} -->

        <div class="panel-body">

            <b-button @click.prevent="agregarPersona()">Agregar nueva persona</b-button>

        </div>
        <div>
            <template>
                <div>
                    <p class="mt-3">Pagina actual: {{ currentPage }}</p>

                    <b-table 
                        id="my-table"
                        responsive 
                        striped 
                        hover 
                        :per-page="perPage"
                        :current-page="currentPage"
                        :fields="fields" 
                        :items="items"
                        :sort-by.sync="sortBy"
                        :sort-desc.sync="sortDesc"
                        >
                        <template v-slot:cell(Nombre)="data">
                            {{ data.value }}
                        </template>
                        <template v-slot:cell(Edad)="data">
                            {{ data.value }}
                        </template>
                        <template v-slot:cell(Email)="data">
                            {{ data.value }}
                        </template>
                        <template v-slot:cell(Telefono)="data">
                            {{ data.value }}
                        </template>
                        <template v-slot:cell(Estado_id)="data">
                            <!-- {{ data.value }} -->
                            <!-- {{ estadosLIst[data.value].Nombre }} -->
                            <div v-if="estadosLIst[data.value-1]">{{estadosLIst[data.value-1].Nombre}}</div>
                        </template>
                        <template v-slot:cell(Editar)="data">
                            <b-button size="sm" variant="info">
                                <div v-for="(client, index) in items"  :key="index">
                                    <div v-if="client.id == data.value" @click.prevent="editarPersona(client)">
                                        Editar
                                        <!-- Editar {{ data.value }} --- {{ client }} -->
                                    </div>
                                </div>
                            </b-button>
                        </template>
                        <template v-slot:cell(Eliminar)="data">
                            <b-button size="sm" variant="danger" @click.prevent="eliminarPersona(data.value)">Eliminar</b-button>
                        </template>
                    </b-table>

                    <b-pagination
                        v-model="currentPage"
                        :total-rows="rows"
                        :per-page="perPage"
                        first-number
                        last-number
                        aria-controls="my-table">
                    </b-pagination>

                    

                </div>
            </template>

            <div>
                
                <b-modal id="modal-1" size="lg" title="">
                    <h4>{{ tituloModal }}</h4>
                    <form action="" v-on:submit.prevent="newPersona(typePeticion)">
                        <div class="form-group">
                            <!-- <label for="persona">Nombre de la persona:</label> -->
                            <!-- <input type="text" class="form-control" name="Nombre" v-model="nombrePersona"> -->

                            <p>
                                <label for="Nombre">Nombre</label>
                                <input
                                id="Nombre"
                                v-model="nombrePersona"
                                type="text"
                                name="Nombre"
                                class="form-control"
                                required
                                >
                            </p>

                            <!-- <label for="edad">Edad de la persona:</label> -->
                            <!-- <input type="number" class="form-control" name="Edad" v-model="Edad"> -->

                            <p>
                                <label for="Edad">Edad</label>
                                <input
                                id="Edad"
                                v-model="Edad"
                                type="number"
                                name="Edad"
                                class="form-control"
                                required
                                min="1"
                                max="110">
                            </p>

                            <!-- <label for="password">Contraseña:</label> -->
                            <!-- <input type="text" class="form-control" name="Password" v-model="Password"> -->
                            
                            <!-- <p>
                                <label for="password">Contraseña</label>
                                <b-button size="sm" @click.prevent="showPassword()">Ver contraseña</b-button>
                                <label>{{ msnPassUpdate }}</label>
                                <input
                                id="password"
                                v-model="Password"
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                            </p> -->
                            <p>
                                <label for="password">Contraseña</label>
                                <b-alert v-if="msnPassUpdate != ''" show variant="success">{{ msnPassUpdate }}</b-alert>
                                <b-form-input
                                    id="password"
                                    class="form-control"
                                    type="password"
                                    v-model="Password"
                                    placeholder="Introduce tu contraseña"
                                    min="6"
                                    :required="isRequired"
                                >
                                </b-form-input>
                                <b-button size="sm" @click.prevent="showPassword()">Ver contraseña</b-button>
                            </p>

                            <!-- <label for="email">Email:</label> -->
                            <!-- <input type="text" class="form-control" name="Email" v-model="Email"> -->

                            <p>
                                <label for="Email">Correo electronico</label>
                                <input
                                id="Email"
                                v-model="Email"
                                type="Email"
                                name="Email"
                                class="form-control"
                                required>
                            </p>

                            <!-- <label for="telefono">Telefono:</label> -->
                            <!-- <input type="text" class="form-control" name="Telefono" v-model="Telefono"> -->
                            
                            <p>
                                <label for="telefono">Teléfono (10 Digitos)</label>
                                <input
                                id="telefono"
                                v-model="Telefono"
                                type="number"
                                name="telefono"
                                class="form-control"
                                max="9999999999"
                                required>
                            </p>

                            <!-- <label for="estado">Estado:</label> -->
                            <!-- <input type="text" class="form-control" name="Estado" v-model="Estado"> -->

                            <!-- <p>
                              <label for="Estado">Estado</label>
                              <select
                                id="Estado"
                                v-model="Estado"
                                name="Estado"
                                class="form-control"
                                required
                              >
                                <option value="">Selecciona un estado</option>
                                <option v-for="estado in estadosLIst" v-bind:key="estado.id" :value="estado.id">{{ estado.Nombre }}</option>

                              </select>
                            </p> -->
                            <p>
                                <label for="">Estados</label>
                                <b-form-select v-model="Estado" :options="estadosLIst" value-field="id" text-field="Nombre"></b-form-select>
                            </p>

                            <br>
                            <button type="submit" class="btn btn-primary">
                                Guardar persona
                            </button>
                            
                        </div>
                    </form>
                </b-modal>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                tituloModal: '',
                updatePersona : 'tito',
                typePeticion : '',
                isRequired: true,
                msnPassUpdate: '',
                nombrePersona: '',
                Edad: '',
                Password: '',
                Email: '',
                Telefono: '',
                Estado: '',
                sortBy: 'Nombre',
                sortDesc: false,
                perPage: 10,
                currentPage: 1,
                fields: [
                    {key: 'Nombre', sortable: true}, 
                    {key: 'Edad', sortable: true}, 
                    {key: 'Email', sortable: true}, 
                    {key: 'Telefono', sortable: true}, 
                    {key: 'Estado_id', sortable: true}, 
                    {
                        key: 'Editar',
                        label : 'Editar persona'
                    }, 'Eliminar'],
                items: [],
                estadosLIst: [],
                estadoLista: []
            }
        },
        computed: {
            rows() {
                return this.items.length
            }
        },
        mounted() {
            this.refreshTable()
            this.getEstados()
        },
        methods: {
            newPersona(tipoPeticion) {

                let params = {
                    Nombre : this.nombrePersona,
                    Edad : this.Edad,
                    Password : this.Password,
                    Email : this.Email,
                    Telefono : this.Telefono,
                    Estado_id : this.Estado
                }
                console.log(params)
                console.log(tipoPeticion)
                // return false

                if(tipoPeticion == "create"){
                    
                    axios.post('http://127.0.0.1:8000/api/personas', params)
                        .then((response) => {
                            this.items.push(params)
                            alert("Persona guardada")
                            this.refreshTable()
                            this.$bvModal.hide('modal-1')
                        })
                        .catch(error => {
                            if(error.response.data.errors.Email) {
                                // console.log(error.response.data.errors)
                                $('#Email').focus();
                                alert(error.response.data.errors.Email)
                            }
                            if(error.response.data.errors.Password) {
                                $('#Password').focus();
                                alert(error.response.data.errors.Password)
                            }
                        })

                } 
                if(tipoPeticion == "update"){
                    axios.put('http://127.0.0.1:8000/api/personas/'+this.updatePersona, params)
                        .then(response => {
                            this.items.push(params)
                            alert("Persona actualizada ID: "+this.updatePersona)
                            this.refreshTable()
                            this.$bvModal.hide('modal-1')
                        })
                        .catch(error => {
                            if(error.response.data.errors.Email) {
                                // console.log(error.response.data.errors)
                                $('#Email').focus();
                                alert(error.response.data.errors.Email)
                            }
                            if(error.response.data.errors.Password) {
                                $('#Password').focus();
                                alert(error.response.data.errors.Password)
                            }
                        })
                    console.log(this.updatePersona)
                }

            },
            refreshTable() {
                axios.get('http://127.0.0.1:8000/api/personas')
                    .then(response => {

                        let tabla = []
                        // Reconstruir el objeto con dos elementos
                        response.data.map(function(value, key) {
                            value.Editar = value.id
                            value.Eliminar = value.id
                            value.EstadoName = value.Estado_id
                            tabla.push(value)
                        //     console.log(tabla)
                        });
                        // this.items = response.data
                        this.items = tabla
                        // console.log(tabla);
                    })
            },
            editarPersona(data) {
                this.$bvModal.show('modal-1')
                this.nombrePersona = data.Nombre
                this.Edad = data.Edad
                this.Password = ""
                this.Email = data.Email
                this.Telefono = data.Telefono
                this.Estado = data.Estado_id
                this.isRequired = false
                this.typePeticion = 'update'
                this.msnPassUpdate = "Si no deceas cambiar tu contraseña, deja vacio el campo"
                this.updatePersona = data.id
                this.tituloModal = "Actualizar registro"
            },
            eliminarPersona(id) {
                axios.delete('http://127.0.0.1:8000/api/personas/'+id)
                    .then(response => {
                        alert("Eliminar"+id)
                    })
                this.refreshTable()
            },
            agregarPersona() {
                this.$bvModal.show('modal-1')
                this.msnPassUpdate = ""
                this.nombrePersona = ""
                this.Edad = ""
                this.Password = ""
                this.Email = ""
                this.Telefono = "555"
                this.Estado = ''
                this.isRequired = true
                this.typePeticion = 'create'
                this.tituloModal = "Nuevo registro"
            },
            getEstados() {
                axios.get('http://127.0.0.1:8000/api/estados')
                    .then(response => {
                        let estadoLista = []
                        let newData = []
                        response.data.map(function(value, key) {
                            newData.valor = key
                            estadoLista[key+1] = value.Nombre
                        });
                        console.log(estadoLista);
                        this.estadosLIst = response.data
                        // this.estadoLista = estadoLista
                })
            },
            getPersona() {
                axios.get('http://127.0.0.1:8000/api/personas/4')
                    .then(response => {
                        console.log(respose.data);
                    })
            },
            showPassword() {
                if($('#password').attr('type') == "password") $('#password').attr('type', "text")
                else $('#password').attr('type', "password")
            }
        }
    }
</script>